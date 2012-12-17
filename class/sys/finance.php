<?php defined('IN_KEKE') or die('access denied');

/**
 * @example 财务结算
  * @author Michael
 * @version 3.0 2012-11-27
 *
 */
Keke_lang::load_lang_class ( 'sys_finance' );
class Sys_finance {
	 
	/**
	 *@var 收支类型: in ,out
	 */
	private  $_type;
	/**
	 *@var 收支类目
	 */ 
	private  $_action;
	/**
	 * @var 用户信息
	 */
	private $_uinfo;
	/**
	 * @var 现金
	 */
	private  $_cash;
	/**
	 * @var 积分
	 */
	private $_credit;
	/**
	 * @var 收支事由
	 */
	private $_mem;
	
	public static $instance;
	
	public static function get_instance($to_uid){
		if(Keke_valid::not_empty(self::$instance)){
			return self::$instance;
		}
		return self::$instance = new Sys_finance($to_uid);
	}
	
	function __construct($to_uid){
		$this->_uinfo = Keke_user::instance()->get_user_info($to_uid,'uid,username,credit,balance');
		if(!$this->_uinfo){
			throw new Keke_exception('user not exists, access die');
			return false;
		}
	}
    /**
     * 收支类目
     * @param string $action
     */
	function set_action($action){
		$this->_action = $action;
		return $this;
	}
	/**
	 * 威客用户支出的计算处理
	 * @param float $cash
	 * @param float $profit
	 * @param string $obj_type
	 * @param int $obj_id
	 * @return boolean  (false 余额不足)
	 */
	public function cash_out( $cash, $profit = 0,$obj_type=NULL, $obj_id = null) {
		$user_info = $this->_uinfo;
		$res = false;
		$sys_config = Keke::$_sys_config;
		$fo = new Keke_witkey_finance;
		$fo->setFina_action ( $this->_action );
		$fo->setFina_type ( "out" );
		$fo->setObj_type ( $obj_type );
		$fo->setObj_id ( $obj_id );
		$fo->setSite_profit ( $profit );
		$fo->setUid ( $user_info ['uid'] );
		$fo->setUsername ( $user_info ['username'] );
		$action = $this->_action;
		$fo->setFina_mem ( $this->_mem );
		$user_balance = $user_info ['balance'];
		$user_credit = $user_info ['credit'];
		$credit_allow =  (int)$sys_config ['credit_is_allow'] + 0;
		if ($cash && $action) {
			try {
				// 判断积分是否开启
				$credit_allow == 2 and $user_credit = 0;
				// 是否有钱付款
				if ($user_balance + $user_credit < $cash) {
					return false;
				}
				$where = "uid ='{$user_info['uid']}'";
				// 提现判断,代金券不能用提现
				if ($action == 'withdraw') {
					// 扣除人个帐户
					Dbfactory::execute("update " . TABLEPRE . "witkey_space set balance = balance-".abs((float)$cash)." where $where");
					$fo->setFina_cash ( $cash );
					$fo->setFina_credit ( 0 );
					$fo->setUser_balance ( $user_balance - abs ( $cash ) );
				} else {
					// 计算剩余积分，先扣代金券
					$sy_credit = $user_credit - $cash;
					if ($sy_credit > 0) {
						// 更新用户积分
						Dbfactory::execute ( "update " . TABLEPRE . "witkey_space set credit = credit-{$cash} where $where" );
						$fo->setFina_credit ( $cash );
						$fo->setFina_cash ( 0 );
						$fo->setUser_balance ( $user_balance );
						$fo->setUser_credit ( $user_credit - $cash );
					} else {
						// 更新余额与积分
						Dbfactory::execute ( "update " . TABLEPRE . "witkey_space set credit = credit-{$user_credit},balance = balance-" . abs ( $sy_credit ) . " where $where" );
						$fo->setFina_credit ( $user_credit );
						$fo->setFina_cash ( abs ( $sy_credit ) );
						$fo->setUser_balance ( $user_balance - abs ( $sy_credit ) );
						$fo->setUser_credit ( 0 );
					}
				}
				$fo->setFina_time ( SYS_START_TIME );
				return (int) $fo->create ();
			} catch ( Exception $e ) {
				throw new Keke_exception( $e );
			}
		}
		 
	}
	/**
	 * 威客用户收入计算处理
	 * 
	 * @param float $cash -现金
	 * @param float $credit  积分
	 * @param float $profit  - 利润
	 * @param string $obj_type  task,service,order,vip
	 * @param id $obj_id        	
	 * @return int 
	 */
	public function cash_in( $cash, $credit = 0,$profit = 0, $obj_type = null, $obj_id = null) {
		$user_info = $this->_uinfo;
	 	$fo = new Keke_witkey_finance ;
		$fo->setFina_action ( $this->_action );
		$fo->setFina_type ( "in" );
		$fo->setObj_type ( $obj_type );
		$fo->setObj_id ( $obj_id );
		$fo->setFina_credit ( $credit );
		$fo->setFina_cash ( $cash );
		$fo->setUser_balance ( $user_info ['balance'] + $cash );
		$fo->setUser_credit ( $user_info ['credit'] + $credit );
		$fo->setUid ( $user_info ['uid'] );
		$fo->setUsername ( $user_info ['username'] );
		$fo->setSite_profit ( $profit );
		$fo->setFina_mem ( $this->_mem );
		
		$cash = (float)$cash;
		$credit = (float)$credit;
		$sql = "update " . TABLEPRE . "witkey_space set balance = balance+{$cash},
		credit = credit+{$credit} where uid ='{$user_info['uid']}'";
		$res = Dbfactory::execute($sql);
		if ($res) {
			$fo->setFina_time ( SYS_START_TIME );
			return (int) $fo->create ();
		} else {
			return false;
		}
	}
	
 
	/**
	 * 通过收支类目得到收支明细,收支明细中的变量数组array(':task_id'=>'12',':task_title'=>'任务标题')
	 * @param string $action  收支类目
	 * @param array or string $data 
	 */
	function set_mem($data) {
		$action_arr = self::get_action_tpl();
		$action_str = $action_arr [$this->_action];
		if (is_array ( $data )) { 
			//模板替换
			$this->_mem = strtr ( $action_str, $data );
		} elseif(is_string($data)) { 
			// 直接使用字符串拼接事由
			$this->_mem = $data;
		}elseif(empty($data)){
			// 如果没有初始化事由或者初始化失败,就调用默认简单的行为描述
			$action_arr = $this->get_finance_action($this->_action );
			$this->_mem = $action_arr [$this->_action];
		}
		return $this;
	}
	/**
	 *  收支类目的明细模板
	 * @var array $_action_arr	-所有事由定义
	 * key代表行为(action),value代表事由描述,:xxx代表要替换的变量
	 */
	public static function get_action_tpl() {
		global $_lang;
		return array (
		'pub_task' => $_lang ['release'] . ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>', 
		'task_delay' => $_lang ['extension_task'] . '<a href="index.php/task/:task_id">:task_title</a>', 
		'buy_service' => $_lang ['purchase_service_goods'] . '<a href="index.php/service/:service_id">:title</a>', 
		'payitem' => $_lang ['purchase'] . ':item_name' . $_lang ['value_add_services'], 
		'hosted_reward' => $_lang ['managed'] . ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['bounty'], 
		'task_fail' => ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['failure_refund'], 
		'host_deposit' => $_lang ['managed'] . ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['earnest_money'], 
		'task_bid' => $_lang ['involved_task'] . '<a href="index.php/task/:task_id">:task_title</a>，' . $_lang ['manuscript_selected_success'], 
		'task_auto_return' => ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['automate_return_remain'], 
		'sale_service' => $_lang ['sell_services_goods'] . '<a href="index.php/service&sid=:service_id">:title</a>' . $_lang ['income'], 
		'task_remain_return' => ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['settlement_balance_return'], 
		'task_hosted_return' => ':model_name' . $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['managed_balance_return'], 
		'order_cancel' => $_lang ['order'] . ':order_id' . $_lang ['terminate_rebate'], 
		'host_return' => $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['managed_commission_refund'], 
		'host_split' => $_lang ['task'] . '<a href="index.php/task/:task_id">:task_title</a>' . $_lang ['managed_commission_allocate'], 
		'withdraw' => ':pay_way' . $_lang ['account'] . ':pay_account' . $_lang ['user'] . ':pay_name' . $_lang ['to_cash'], 
		'withdraw_fail' => ':pay_way' . $_lang ['account'] . ':pay_account' . $_lang ['user'] . ':pay_name' . $_lang ['cash_failed_return_refund'], 
		'recharge' => ":bank 充值 :cash" );
	}
	/**
	 * 财类类目
	 * @return array
	 */
	public static function get_finance_action() {
		global $_lang;
		return array (
				"realname_auth" => $_lang['realname_auth'], 
				"bank_auth" => $_lang['bank_auth'], 
				"email_auth" => $_lang['email_auth'],
			    "mobile_auth" => $_lang['mobile_auth'], 
				"buy_vip" => $_lang['buy_vip'], 
				"buy_service" => $_lang['buy_service'],
			    "pub_task" => $_lang['pub_task'],
				"hosted_reward"=>$_lang['hosted_reward'], 
				"withdraw" => $_lang['withdraw'], 
				"task_delay" => $_lang['task_delay'], 
				//==========(in)=========
				"ext_cash"=>$_lang['ext_cash'],
				"recharge" => $_lang['online_recharge'], 
				"task_bid" => $_lang['task_bid'],
				"task_fail" => $_lang['task_fail'], 
				"task_prom_fail" => $_lang['task_prom_fail'],
				"sale_service" => $_lang['sale_service'], 
				"admin_recharge" => $_lang['admin_recharge'],
				"withdraw_fail" => $_lang['withdraw_fail'],
				"report"=>$_lang['report_processs'],
				"payitem"=>$_lang['payitem'],
				"prom_reg"=>$_lang['prom_reg'],
				"task_fj"=>$_lang['task_fj'],
				'rights_return'=>$_lang['rights_return'],
				"task_auto_return"=>$_lang['task_auto_return'],
				'order_cancel'=>$_lang['order_cancel'],
				"online_charge"=>$_lang['online_charge'],
				"order_charge"=>$_lang['order_charge'],
				'prom_pub_task'=>$_lang['prom_pub_task'],
				'prom_bid_task'=>$_lang['prom_bid_task'],
				'prom_service'=>$_lang['prom_service'],
				'prom_bank_auth'=>$_lang['prom_bank_auth'],
				'prom_realname_auth'=>$_lang['prom_realname_auth'],
				'prom_email_auth'=>$_lang['prom_email_auth'],
				'prom_mobile_auth'=>$_lang['prom_mobile_auth'],
				'prom_enterprise_auth'=>$_lang['prom_mobile_auth'],
				'enterprise_auth'=>$_lang['enterprise_auth'],
				'task_remain'=>$_lang['task_remain_return'],
				'hosted_return'=>$_lang['task_hosted_return'],
				'admin_charge'=>$_lang['admin_charge'],
				'host_deposit'=>$_lang['host_deposit'],
				'deposit_return'=>$_lang['deposit_return'],
				'host_return'=>$_lang['host_return'],
				'host_split'=>$_lang['host_split']
		);
	}
}
