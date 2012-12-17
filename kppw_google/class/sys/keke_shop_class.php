<?php
/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-28下午16:59:00
 */
Keke_lang::load_lang_class('keke_shop_class');
class keke_shop_class {
	
	/**
	 * 
	 * 获取商品信息
	 * @param int $sid 服务编号
	 * @return array $service_arr
	 */
	public static function get_service_info($sid) {
		return dbfactory::get_one ( sprintf ( " select * from %switkey_service where service_id=%d", TABLEPRE, $sid ) );
	}
	
	/**
	 * 消息通知
	 */
	public static function notify_user($uid, $username, $action, $title, $v_arr = array()) {
		$msg_obj = new keke_msg_class ();
		$contact = self::get_contact ( $uid );
		$msg_obj->send_message ( $uid, $username, $action, $title, $v_arr, $contact ['email'], $contact ['mobile'] );
	}
	/**
	 * 获取用户联系方式 email,mobile
	 */
	public static function get_contact($uid) {
		return dbfactory::get_one ( sprintf ( " select mobile,email from %switkey_space where uid = '%d'", TABLEPRE, $uid ) );
	}
	/**
	 * 返回当前用户关于此服务（作品）的最新订单状态
	 * 有未完成订单则更具订单状态确定跳转步骤
	 * 无未完成订单则进入订单确认页面
	 * @param int $sid 服务编号
	 * @param int $s_uid 卖家UID
	 * @param int $model_id 模型ID
	 */
	public static function access_check($sid, $s_uid, $model_id) {
		global $uid, $kekezu;
		global $_lang;
		$uid == $s_uid and Keke::keke_show_msg ( "index.php?do=shop", $_lang['seller_not_to_order_page'], 'error' );
		$order_info = self::check_has_buy ( $sid, $uid );
		$order_status = $order_info ['order_status'];
		$order_id = intval ( $order_info ['order_id'] );
		$model_code = Keke::$_model_list [$model_id] ['model_code'];
		if (! $order_status) {
			return true;
		} else {
			if ($order_status == 'close') {
				return true;
			} elseif ($order_status == 'confirm') {
				if ($model_code == 'goods') {
					Keke::keke_show_msg ( "index.php?do=user&view=finance&op=order&obj_type=service&role=2&order_id=" . $order_id, $_lang['you_has_buy_work'], 'error' );
				} else {
					return true;
				}
			} else {
				Keke::keke_show_msg ( "index.php?do=user&view=finance&op=order&obj_type=service&role=2&order_id=" . $order_id, $_lang['your_order_not_process_complete'], 'error' );
			}
		}
	}
	
	/**
	 * 商品订单、财务记录产生产生  
	 * @param array $service_info 商品信息
	 * @param string $order_status 订单状态
	 * @param string $type 默认服务
	 */
	public static function create_service_order($service_info) {
		global $uid, $username, $_K;
		global $_lang;
		$uid == $service_info ['uid'] and Keke::keke_show_msg ( "index.php?do=shop", $_lang['seller_can_not_order_self'], 'error' );
		
		$oder_obj = new Keke_witkey_order_class (); //订单记录表对象
		$order_detail = new Keke_witkey_order_detail_class (); //订单详细对下岗
		$service_cash = $service_info ['price']; //订单总金
		switch ($service_info ['model_id']) {
			case "6" :
				$type = $_lang['work'];
				break;
			case "7" :
				$type = $_lang['service'];
				break;
		}
		/**订单产生**/
		$order_name = $service_info ['title']; //订单名称
		$order_body = $_lang['buy_goods']."<a href=\"index.php?do=service&sid=$service_info[service_id]\">" . $order_name . "</a>"; //订单备注
		/** 财务产生*/
		$fina_id = keke_finance_class::cash_out ( $uid, $service_cash, 'buy_service', '', 'service', $service_info ['service_id'] );
		$fina_id and $order_status = 'ok' or $order_status = 'wait'; //是否支付完成
		/** 订单产生**/
		$order_id = keke_order_class::create_order ( $service_info ['model_id'], $service_info ['uid'], $service_info ['username'], $order_name, $service_cash, $order_body, $order_status );
		if ($order_id) {
			/** 更新财务记录的订单号*/
			$fina_id and keke_order_class::update_fina_order ( $fina_id, $order_id );
			keke_order_class::create_order_detail ( $order_id, $order_name, 'service', intval ( $service_info [service_id] ), $service_cash );
			
			/**通知*/
			$msg_obj = new keke_msg_class (); //消息类
			$service_url = "<a href=\"" . $_K [siteurl] . "/index.php?do=service&sid=" . $service_info [service_id] . "\">" . $order_name . "</a>";
			$order_url = "<a href=\"" . $_K [siteurl] . "/index.php?do=user&view=finance&op=order&obj_type=service&role=1&order_id=" . $order_id . "#userCenter\">#" . $order_id . "</a>";
			$s_notice = array ($_lang['user_action'] => $username . $_lang['order_buy'], $_lang['service_name'] => $service_url, $_lang['service_type'] => $type, $_lang['order_link'] => $order_url );
			$contact = dbfactory::get_one ( sprintf ( " select mobile,email from %switkey_space where uid='%d'", TABLEPRE, $service_info [uid] ) );
			
			$msg_obj->send_message ( $service_info ['uid'], $service_info ['username'], "service_order", $_lang['you_has_new'] . $type . $_lang['order'], $s_notice, $contact ['email'], $contact ['mobile'] ); ////通知雇主
			$feed_arr = array ("feed_username" => array ("content" => $username, "url" =>"index.php?do=space&member_id=".$uid), "action" => array ("content" => $_lang['buy'], "url" => '' ), "event" => array ("content" => $order_name, "url" =>"index.php?do=service&sid=$service_info[service_id]" ) );
			Keke::save_feed ( $feed_arr, $uid, $username, 'service', $service_info ['service_id'], $service_url );
			if ($fina_id) {
				Keke::keke_show_msg ( 'index.php?do=user&view=finance&op=order&obj_type=service&role=2&order_id=' . $order_id, $_lang['order_produce_success'] );
			} else {
				header ( "location:index.php?do=pay&order_id=$order_id" );
				die ();
			}
		} else {
			Keke::keke_show_msg ( 'index.php?do=shop_order&sid=' . $service_info [service_id], $_lang['order_produce_fail'], "error" );
		}
	}
	/**
	 * 获取指定商品的购买记录
	 */
	public static function get_sale_info($sid, $w = array(), $p = array(), $order = null,$ext_condit) {
		global $kekezu;
		$where = " select a.order_status,a.order_uid,a.order_username,a.order_amount,a.order_time from " . TABLEPRE . "witkey_order a left join " . TABLEPRE . "witkey_order_detail b on a.order_id=b.order_id where
		b.obj_id='$sid' and b.obj_type = 'service' ";
		$ext_condit and $where.=" and ".$ext_condit;
		$arr = keke_table_class::format_condit_data ( $where, $order, $w, $p );
		$sale_info = dbfactory::query ( $arr ['where'] );
		$sale_arr ['sale_info'] = $sale_info;
		$sale_arr ['pages'] = $arr ['pages'];
		return $sale_arr;
	
	}
	/**
	 * 获取商品的留言
	 * @param int $sid
	 * @param array $w
	 * @param array $p
	 * @param string $order
	 * @return Ambigous <array(page,where), string>
	 */
	function get_service_comment($sid, $w = array(), $p = array(), $order = null) {
		global $kekezu;
		$comm_obj = new Keke_witkey_comment_class ();
		$where = " select * from " . TABLEPRE . "witkey_comment where obj_id = '$sid' and obj_type = 'service' ";
		$arr = keke_table_class::format_condit_data ( $where, $order, $w, $p );
		$comm_info = dbfactory::query ( $arr ['where'] );
		$comm_arr ['comm_info'] = $comm_info;
		$comm_arr ['pages'] = $arr ['pages'];
		return $comm_arr;
	}
	/**
	 * 商品(举报、投诉)
	 * @param $obj_id 对象编号
	 * @param $report_type 举报类型
	 * @param $to_uid 被举报人
	 * @param $to_username 被举报人姓名
	 * @param $file_name 上传文件路径
	 * @return json 
	 */
	public static function set_report($obj_id, $to_uid, $to_username, $report_type, $file_name, $desc) {
		global $uid;
		global $_lang;
		$service_info = self::get_service_info ( $obj_id );
		$transname = keke_report_class::get_transrights_name ( $report_type ); //举报投诉中文
		$service_info ['uid'] == $uid and Keke::keke_show_msg ( '', $_lang['can_not_to_self'] . $transname, 'error', 'json' );
		$user_type = '2'; //只能雇主对他发起
		$res = keke_report_class::add_report ( 'product', $obj_id, $to_uid, $to_username, $desc, $report_type, $service_info ['service_status'], $obj_id, $user_type, $file_name );
	}
	/**
	 * 统计互评各状态条数
	 * @param string $model_code 模型code
	 * @param int $sid 商品编号
	 * @return array();
	 */
	public static function get_mark_count($model_code, $sid) {
		return  Keke::get_table_data ( " count(mark_id) count,mark_status", "witkey_mark", "model_code='" . $model_code . "' and origin_id='$sid'", "", "mark_status", "", "mark_status", 3600 );
	}
	
	/**
	 * 获取来自雇主或者威客的评价信息
	 * *
	 */
   public static function get_mark_count_ext($model_code, $sid){
		return Keke::get_table_data ( " count(mark_id) count,mark_type", "witkey_mark", "model_code='" . $model_code . "' and origin_id='$sid'", "", "mark_type", "", "mark_type", 3600 );
	}
	/**
	 * 同类热销3条
	 */
	public static function get_hot_service($model_id, $sid, $indus_pid) {
		return Keke::get_table_data ( " sale_num,service_id,price,title,pic ", "witkey_service", " model_id = '$model_id' and service_id !='$sid' and indus_pid = '$indus_pid' and service_status='2' and sale_num>0", "sale_num desc", "", "3", "", 3600 );
	}
	/**
	 * 同类商品6条
	 */
	public static function get_related_service($model_id, $sid, $indus_id) {
		return Keke::get_table_data ( "pic,service_id,title", "witkey_service", " model_id = '$model_id' and service_id !='$sid' and indus_id = '$indus_id' and service_status='2'", "", "", "6", "", 3600 );
	}
	/**
	 * 店主更多商品5条
	 */
	public static function get_more_service($uid, $sid) {
		return Keke::get_table_data ( "service_id,title,pic", "witkey_service", " uid='$uid' and service_status='2' and service_id!='$sid'", "sale_num desc ", "", "5", "", 3600 );
	}
	/**
	 * 相关任务列表14条
	 */
	public static function get_task_info($indus_id) {
		return Keke::get_table_data ( "task_id,task_title,task_cash", "witkey_task", " indus_id = '$indus_id' and task_status='2'", "", "", "14", "", 3600 );
	}
	/**
	 * 更新浏览次数
	 */
	public static function plus_view_num($sid, $s_uid) {
		global $uid;
		if (! $_SESSION ['service_view_' . $sid . '_' . $uid] && $uid != $s_uid) {
			dbfactory::execute ( sprintf ( " update %switkey_service set views=views+1 where service_id='%d'", TABLEPRE, $sid ) );
			$_SESSION ['service_view_' . $sid . '_' . $uid] = '1';
		}
	}
	/**
	 * 更新出售次数和出售总金额
	 */
	public static function plus_sale_num($sid, $sale_cash) {
		return dbfactory::execute ( sprintf ( " update %switkey_service set sale_num=sale_num+1,total_sale=total_sale+'%f.2'", TABLEPRE, $sale_cash ) );
	}
	/**
	 * 任务评价数更新 每次+2
	 */
	public static function plus_mark_num($service_id) {
		return dbfactory::execute ( sprintf ( "update %switkey_service set mark_num=mark_num+2 where service_id ='%d'", TABLEPRE, $service_id ) );
	}
	/**
	 * 检测是否购买过作品
	 * 作品是不许重复购买的
	 */
	public static function check_has_buy($sid, $uid) {
		return dbfactory::get_one ( sprintf ( " select a.order_status,a.order_id from %switkey_order a left join %switkey_order_detail b
					on a.order_id = b.order_id where a.order_uid ='%d' and b.obj_id='%d' and obj_type='service'", TABLEPRE, TABLEPRE, $uid, $sid ) );
	}
}