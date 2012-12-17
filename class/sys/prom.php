<?php
/**
 * 推广类
 * Enter description here ...
 * @author Administrator
 *
 */
Keke_lang::load_lang_class('sys_prom');
class Sys_prom {
	public $_prom_open;
	public $_prom_period;
	public $_auth_step;
	
	public static function get_instance() {
		static $obj = null;
		if ($obj == null) {
			$obj = new Sys_prom ();
		}
		return $obj;
	}
	public function __construct() {
		global $kekezu;
		$this->_prom_open = intval ( Keke::$_sys_config ['prom_open'] );//判断后台是否开启推广
		$this->_prom_period = intval ( Keke::$_sys_config ['prom_period'] );//推广的有效期限
		$this->auth_step_init();
	}
	/**
	 * 认证生效步骤初始化
	 */
	public function auth_step_init(){
		$reg_config = $this->get_prom_rule("reg");
		$this->_auth_step = $reg_config['auth_step'];//获取推广注册成功所需要做的认证
	
	}
	/**
	 *@初始推广规则配置 
	 */
	public static function get_prom_rule($prom_code) {
		$p_config = dbfactory::get_one(sprintf(" select * from %switkey_prom_rule where prom_code='%s'",TABLEPRE,$prom_code));//获取相应的推广配置
		$p_config ['config'] and $config = unserialize ( $p_config ['config'] ) or $config = array ();
		return array_merge ( $p_config, $config );
	}
	/**
	 * 链接参数获取
	 */
	public function url_data_format($query_string) {
		$format_data = array ();
		parse_str ( $query_string, $format_data );
		$format_data ['p'] and $format_data ['p'] = $format_data ['p'] or $format_data ['p'] = 'reg';
		$format_data ['l'] and $format_data ['l'] = $format_data ['l'] or $format_data ['l'] = 'register';
		return $format_data;
	}
	/**
	 * 获取下线的推广关系
	 * (关系有效期类才会返回)
	 *@param int $uid 下线uid
	 *@param string $prom_type 推广类型
	 */
	public function get_prom_relation($uid, $prom_type) {
		$sql = " select * from %switkey_prom_relation where uid='%d' and prom_type='%s'";
		$p_relation = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, $uid, $prom_type ) );
		if(!$p_relation){//查找注册关系
			$p_relation or $p_relation = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, $uid, 'reg' ) );
			$reg_event = $this->get_prom_event($uid, $uid,$this->_auth_step);//查找未结算的注册认证事件
			$reg_event and $p_relation['relation_status']=4;//注册注册事件未结算、关系状态设为失效状态、阻止其他事件产生
		}
		//判断关系有效时间
		if ($this->_prom_period&&$p_relation) { //有时间限制
			$valid_time = time () - $p_relation ['on_time'] - $this->_prom_period * 24 * 3600;
			$valid_time >0 and $this->set_relation_status ( $p_relation ['relation_id'], 3 ); //重置关系为过期
		}
		return $p_relation;
	}
	/**
	 * 获取下线推广事件
	 * @param $uid 下线uid
	 * @param $action 推广动作=>reg,pub_task,realname_auth,....
	 * @param $obj_id 推广对象ID
	 * @param $event_status 推广事件状态 1=>未结算  2=>已结算,3=>失败
	 */
	function get_prom_event($obj_id, $uid, $action, $event_status = '1') {
		$sql = " select a.*,b.relation_id from %switkey_prom_event a 
				left join %switkey_prom_relation b on a.uid=b.uid where a.obj_id='%d'
				and a.action='%s'  and a.uid='%d' and a.event_status='%d'";
		return dbfactory::get_one ( sprintf ( $sql, TABLEPRE,TABLEPRE, $obj_id, $action, $uid, $event_status ) );
	}
	/**
	 * 计算推广相关金额项
	 * （用于推广事件产生时计算对象金额、用户可得现金、可得金币项）
	 * @param array $prom_type 推广关系类型
	 * @param int $obj_id 对象ID
	 * @param float $cash 对象现金
	 * @param float $credit 对象金币
	 * @return array 
	 */
	public function get_income_rule($prom_type, $obj_id, $cash = 0, $credit = 0) {
		$income_rule = array ();
		$p_config = $this->get_prom_rule ( $prom_type); //对应类型的推广配置
		switch ($prom_type) {
			case "reg" : //注册
				$auth_type = $p_config ['auth_step'];
				$auth_p_config = $this->get_prom_rule ( $auth_type ); //相应认证的推广配置
				$rake_cash = $auth_p_config ['cash'];
				$rake_credit = $auth_p_config ['credit'];
				$event_desc = $p_config['prom_item']."+".$auth_p_config['prom_item'];
				$action     = $auth_p_config['prom_code'];
				break;
			case "pub_task" : //任务发布
			case "bid_task" : //承接任务
			case "service" : //购买服务
				$obj_info = $this->get_prom_obj_info ( $prom_type, $obj_id ); //对象信息
				$cash or $cash = $obj_info['cash'];
				//推广提成比例
				$rate = $p_config ['rate'] * $obj_info ['profit_rate'] / 10000;
				/** 可获现金、金币*/
				$rake_cash   = $cash * $rate;
				$rake_credit = $credit * $rate;
				if ($prom_type == 'pub_task') {
					if ($p_config ['pub_task_rake_type'] == 1) { //固定金额
						$rake_cash = $p_config ['cash']; //上线独得
						$rake_credit = $p_config ['credit']; //上线独得
					}else{
						$rake_cash = $cash*$p_config['rate']/100; //上线独得
						$rake_credit = 0;
					}
				}
				$event_desc = $p_config['prom_item'];
				$action     = $p_config['prom_code'];
				break;
		}
		$income_rule ['rake_cash'] = floatval ( $rake_cash );
		$income_rule ['rake_credit'] = floatval ( $rake_credit );
		$income_rule ['event_desc'] = $event_desc;
		$income_rule ['action'] = $action;
		return $income_rule;
	}
	/**
	 * 推广关系产生 
	 *@param int $uid 推广下线id
	 *@param string 下线名称
	 *@param $url_data 由推广链接获取的参数
	 *@param $relation_status 关系状态 默认为未生效
	 */
	function create_prom_relation($uid, $username, $url_data, $relation_status = 1) {
		global $_lang;
		$relate_obj =  new Keke_witkey_prom_relation ();
		if ($this->_prom_open) {
			if ($url_data ['uid'] == $uid) { //无法推广自己
				Keke::notify_user ( $_lang['prom_fail'], $_lang['you_can_not_prom_self'], $url_data ['u'] );
				return false;
			} else {
				$prom_relation = $this->get_prom_relation ( $uid, $url_data ['p'] ); //获取此下线推广关系
				$r_status      = intval($prom_relation['relation_status']);
				$r_status==3||$r_status==0 and $p_status =1 or $p_status=2;//没有失效则阻止
				if ($p_status==2) { //已有推广关系
					Keke::notify_user ( $_lang['prom_fail'], $_lang['your_prom_user_has_promer'], $url_data ['u'] );
				} else {
					$p_info = Keke::get_user_info ( $url_data ['u'] ); //上线用户信息
					$relate_obj->setUid ( $uid );
					$relate_obj->setUsername ( $username );
					$relate_obj->setProm_uid ( $p_info ['uid'] );
					$relate_obj->setProm_username ( $p_info ['username'] );
					$relate_obj->setProm_type ( $url_data ['p'] );
					$relate_obj->setRelation_status ( intval ( $relation_status ) );
					$relate_obj->setOn_time ( time () );
					return $relate_obj->create ();
				}
			}
		} else {
			Keke::notify_user ( $_lang['prom_fail'], $_lang['prom_system_closed'], $url_data ['u'] );
			return false;
		}
	}
	/**
	 * 推广事件产生
	 * @param $action 推广动作 reg,pub_task....
	 * @param $uid 下线id
	 * @param $obj_id 推广对象编号
	 * @param float $cash 对象现金
	 * @param float $credit 对象金币
	 * @param $event_status 事件状态  1=>未完成,2=>已结算,3=>此次事件失败。
	 * @return boolen 
	 */
	function create_prom_event($action, $uid, $obj_id, $cash = 0, $credit = 0, $event_status = '1') {
		$result = FALSE;
		if ($this->_prom_open) {
			$prom_relation = $this->get_prom_relation ( $uid, $action ); //获取下线推广关系
			$r_status      = intval($prom_relation['relation_status']);
			if ($prom_relation&&$r_status!=3&&$r_status!=4 && $prom_relation ['prom_uid'] != $uid) { //关系未失效且上线不是自己
				/**事件产生限制。。当uid。在此prom_type,$obj_id限制下存在未完成事件时。禁止事件产生**/
				if (! $this->get_prom_event ( $obj_id, $uid, $action, $event_status )) {
					//根据规则获取金额收益
					$income_rule = $this->get_income_rule ( $action, $obj_id, $cash, $credit );
					//创建推广事件
					$event_obj = new Keke_witkey_prom_event ();
					$event_obj->setEvent_desc ( $income_rule ['event_desc'] );
					$event_obj->setUid ( $uid );
					$event_obj->setUsername ( $prom_relation ['username'] );
					$event_obj->setParent_uid ( $prom_relation ['prom_uid'] );
					$event_obj->setParent_username ( $prom_relation ['prom_username'] );
					$event_obj->setObj_id ( $obj_id );
					$event_obj->setAction($income_rule ['action']);
					$event_obj->setRake_cash ( $income_rule ['rake_cash'] );
					$event_obj->setRake_credit ( $income_rule ['rake_credit'] );
					$event_obj->setEvent_time ( time () );
					$event_obj->setEvent_status ( intval ( $event_status ) );
					$result = $event_obj->create();
					//清除cookie
					$this->clear_prom_cookie ();
				}
			}
		}
		return $result;
	}
	/**
	 * 事件结算
	 * @param $action 推广动作.
	 * @param $uid 下线id
	 * @param $obj_id 推广事件id
	 * @return boolen
	 */
	function dispose_prom_event($action, $uid, $obj_id) {
		$p_relation = $this->get_prom_relation ( $uid, $action );
		if ($p_relation&&$p_relation ['realtion_status'] !=3) { //关系未失效
			$prom_event = $this->get_prom_event ( $obj_id, $uid, $action ); //获取推广事件
		}
		if ($prom_event) {
			Sys_finance::cash_in ( $prom_event ['parent_uid'], $prom_event ['rake_cash'], $prom_event ['rake_credit'], "prom_" .$action);
			$p_relation ['relation_status'] == '1' and $this->set_relation_status ( $p_relation ['relation_id'], '2' ); //未生效的设置为生效
			return $this->set_prom_event_status ( $prom_event ['parent_uid'], $prom_event ['username'], $prom_event ['event_id'], 2 );
		}
	}
	/**
	 * 更改推广关系状态
	 * @param $relation_id 关系id
	 * @param $status 变更状态
	 */
	function set_relation_status($relation_id, $status) {
		return dbfactory::execute ( " update " . TABLEPRE . "witkey_prom_relation set relation_status ='$status' where relation_id ='$relation_id'" );
	}
	/**
	 * 更改事件状态
	 * @param $p_uid上线UID
	 * @param $username 下线用户名
	 * @param $event_id 事件id
	 * @param $status 事件变更状态
	 */
	function set_prom_event_status($p_uid, $username, $event_id, $status) {
		global $_lang;
		$res = dbfactory::execute ( " update " . TABLEPRE . "witkey_prom_event set event_status = '$status' where event_id= '$event_id'" );
		if ($res) {
			if ($status == 2) {
				$title = $_lang['prom_msg_notice'];
				$content = $_lang['you_prom_offline'] . $username . $_lang['complete_event_get_money_notice'];
			} elseif ($status == 3) {
				$title = $_lang['prom_msg_notice'];
				$content = $_lang['you_prom_offline'] . $username . $_lang['event_fail_notice'];
			}
			$title && $content and Keke::notify_user ( $title, $content, $p_uid );
		}
	}
	/**
	 * 推广收益查询
	 */
	function prom_income_rank() {
		return Keke::get_table_data ( " uid,username,sum(fina_cash) cash,sum(fina_credit) credit", "witkey_finance", " INSTR(fina_action,'prom_')", "", "uid", "", "uid", 3600 );
	}
	/**
	 * 创建推广cookie
	 * 参与点击结算。、登录时的关系创建
	 * @param $query_string 链接 参数
	 */
	function create_prom_cookie($query_string) {
		global $uid, $username;
		global $_lang;
		$url_data = $this->url_data_format ( $query_string ); 
		if ($uid) { //登录情况下产生推广关系
			if ($url_data ['u'] != $uid && $url_data ['p']) {
				if ($this->get_prom_relation ( $uid, $url_data ['p'] )) { //有上线了
					/** 通知用户*/
					Keke::notify_user ( $_lang['prom_fail'], $_lang['from_you_prom_website_user'] . "【".$username."】" . $_lang['already_exist_prom_promotion_fail'], $url_data ['u'] );
				} else {
					$this->create_prom_relation ( $uid, $username, $url_data,2 );
				}
			}
		} else { //记录推广费COOKIE
			setcookie ( "user_prom_event", serialize ( $url_data ), time () + 24 * 3600, COOKIE_PATH, COOKIE_DOMAIN );
		}
		$this->prom_jump ( $url_data ); //重定向至指定页面
	}
	/**
	 * 检测对象是否符合推广条件
	 */
	public function is_meet_requirement($prom_code, $obj_id) {
		$result = TRUE;
		$obj_info = self::get_prom_obj_info ($prom_code,$obj_id ); //对象信息
		if ($obj_info) {
			$prom_config = dbfactory::get_one ( sprintf ( " select * from %switkey_prom_rule where prom_code='%s'", TABLEPRE, $prom_code ) );
			$prom_config = unserialize ( $prom_config ['config'] );
			if ($prom_config ['indus_string']&&FALSE === strpos ( $prom_config ['indus_string'], $obj_info ['indus_id'] )) {
				$result = FALSE;
			}
			if ($prom_config ['model'] && FALSE === strpos ( $prom_config ['model'], $obj_info ['model_id'] )) {
				$result = FALSE;
			}
		}
		return $result;
	}
	/**
	 * 获取推广对象信息
	 * @param string $prom_type 推广类型
	 * @param int $obj_id 对象编号	
	 */
	public static function get_prom_obj_info($prom_type, $obj_id) {
		if ($prom_type == 'pub_task' || $prom_type == 'bid_task') {
			$obj_info = dbfactory::get_one ( sprintf ( " select model_id,indus_id,profit_rate,task_cash cash from %switkey_task where task_id='%d'", TABLEPRE, $obj_id ) );
		} elseif ($prom_type == 'service') {
			$obj_info = dbfactory::get_one ( sprintf ( " select model_id,indus_id,profit_rate,price cash from %switkey_service where service_id='%d'", TABLEPRE, $obj_id ) );
		}
		return $obj_info;
	}
	/**
	 * 反序列推广cookie
	 */
	function extract_prom_cookie() {
		isset ( $_COOKIE ['user_prom_event'] ) and $url_data = unserialize ( stripslashes ( $_COOKIE ['user_prom_event'] ) );
		return $url_data;
	}
	/**
	 * 清理推广cookie
	 */
	static function clear_prom_cookie() {
		if (isset ( $_COOKIE ['user_prom_event'] )) {
			setcookie ( 'user_prom_event', '', - 9999 );
			unset ( $_COOKIE ['user_prom_event'] );
		}
	}
	/**
	 * 推广跳转
	 * @param $url_data  链接参数
	 */
	function prom_jump($url_data) {
		global $_K;
		if (isset ( $url_data ['u'] ) && $url_data ['l']) {
			if ($url_data ['o']) {
				$url_data ['l']=='service' and $j = "&sid=" or $j = "&task_id=";
				header ( "Location:" . $_K ['siteurl'] . "/index.php?do=" . $url_data ['l'] .$j. $url_data ['o'] );
			} else {
				header ( "Location:" . $_K ['siteurl'] . "/index.php?do=" . $url_data ['l'] );
			}
		}
	}
	/**
	 * 获取推广关系状态
	 */
	public static function get_prelation_status(){
		global $_lang;
		return array("1"=>$_lang['not_take_effect'],"2"=>$_lang['has_task_effect'],"3"=>$_lang['has_over_time']);
	}
	/**
	 * 获取推广事件状态
	 */
	public static function get_pevent_status(){
		global $_lang;
		return array("1"=>$_lang['not_settlement'],"2"=>$_lang['has_settlement'],"3"=>$_lang['has_fail']);
	}
	/**
	 * 获取推广类型
	 */
	public static function get_prom_type(){
		return Keke::get_table_data("prom_code,prom_item,type","witkey_prom_rule","","","","","prom_code",3600);
	}
}