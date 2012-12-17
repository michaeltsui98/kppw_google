<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 订单处理
 */
Keke_lang::load_lang_class ( 'keke_order_class' );
class Sys_order {
	
	
	
	
	
	/**
	 * 获取指定订单+详细信息
	 * @param int $order_id 订单编号
	 * @return array
	 */
	public static function get_order_info($order_id) {
		$sql = "select a.*,b.obj_type,b.obj_id from %switkey_order a left join
		%switkey_order_detail b on a.order_id=b.order_id where a.order_id='%d'";
		return Dbfactory::get_one ( sprintf ( $sql, TABLEPRE, TABLEPRE, $order_id ) );
	
	}
	/**
	 * 获取指定对象的订单编号
	 * @param $obj_type 对象类型
	 * @param int $obj_id 对象编号
	 * @return int
	 */
	public static function get_order_id($obj_type, $obj_id) {
		$sql = "select order_id from %switkey_order_detail where obj_type='%s' and obj_id='%d'";
		return Dbfactory::get_count ( sprintf ( $sql, TABLEPRE, $obj_type, $obj_id ) );
	}
	/**
	 * 获取订单的详细内容
	 * @param int $order_id
	 * @return 二维数组
	 */
	public static function get_order_detail($order_id) {
		$sql = "select * from %switkey_order_detail where order_id = '%d'";
		return Dbfactory::query ( sprintf ( $sql, TABLEPRE, $order_id ) );
	}
	
	/**
	 * 交易订单生成
	 * @param int $model_id 模型ID
	 * @param string $order_name 订单名,有多项是用#分隔
	 * @param float $order_amount 订单总金额
	 * @param string $order_body   订单备注
	 * @param string $order_status   wait,ok,fail,close 默认为ok
	 */
	public static function create_order($model_id, $seller_uid, $seller_username, $order_name, $order_amount, $order_body, $order_status = 'ok') {
		global $uid, $username;
		$order_obj = new Keke_witkey_order ();
		$order_obj->setModel_id ( $model_id );
		$order_obj->setOrder_name ( $order_name );
		$order_obj->setOrder_uid ( $uid );
		$order_obj->setOrder_username ( $username );
		$order_obj->setSeller_uid ( $seller_uid );
		$order_obj->setSeller_username ( $seller_username );
		$order_obj->setOrder_body ( $order_body );
		$order_obj->setOrder_amount ( $order_amount );
		$order_obj->setOrder_status ( $order_status );
		$order_obj->setOrder_time ( SYS_START_TIME );
		return $order_obj->create ();
	}
	/**
	 * 用户余额充值订单生个
	 * @param string $order_type 充值类型 online_charge offline_charge
	 * @param string $pay_type  支付类型 alipay 中国工商银行
	 * @param float $money  金额
	 * @param int $obj_id   对象编号 任务付款、商品付款时使用
	 * @param string $order_status 充值状态 默认 wait   （wait,ok,fail,close）
	 * @return $order_id
	 */
	public static function create_user_charge_order($order_type, $pay_type, $money, $obj_id = null, $pay_info = '', $order_status = 'wait', $uid = '', $username = '') {
		global $user_info;
		$uid or $uid = $user_info ['uid'];
		$username or $username = $user_info ['username'];
		$sql = "select order_id,order_status from %switkey_order_charge where uid='%d' and pay_type='%s'";
		$obj_id and $sql .= " and obj_id='$obj_id'";
		$order_info = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, $uid, $pay_type ) );
		$status = $order_info ['order_status'];
		$order_id = $order_info ['order_id'];
		
		if ($obj_id) { //是任务、商品付款
			$order_id and ($status == 'wait' and $update = true);
		} else {
			$order_id and ($status == 'wait' and $update = true or $create = true);
		}
		$order_id or $create = true; //需创建
		$update and dbfactory::execute ( sprintf ( " update %switkey_order_charge set pay_money='%.2f',pay_time='%s' where order_id='%d'", TABLEPRE, $money, time (), $order_id ) );
		if ($create) {
			$order_obj = new Keke_witkey_order_charge ();
			$order_obj->_order_id = null;
			$order_obj->setOrder_type ( $order_type );
			$order_obj->setUid ( $uid );
			$pay_info = Keke::unescape ( $pay_info );
			$order_obj->setPay_info ( $pay_info );
			$order_obj->setPay_type ( $pay_type );
			$order_obj->setObj_id ( $obj_id );
			$order_obj->setUsername ( $username );
			$order_obj->setPay_money ( $money );
			$order_obj->setPay_time ( time () );
			$order_obj->setOrder_status ( $order_status );
			$order_id = $order_obj->create_keke_witkey_order_charge ();
		}
		return $order_id;
	}
	/**
	 * 产生订单详细记录
	 * @param int $order_id   所属订单编号
	 * @param string $detail_name 详细名称
	 * @param string $obj_type 对象类型
	 * @param int $obj_id  对象编号
	 * @param float $price   单价
	 * @param int $num    数量 默认为1
	 */
	public static function create_order_detail($order_id, $detail_name, $obj_type, $obj_id, $price, $num = '1') {
		$detail_obj = new Keke_witkey_order_detail ();
		
		$detail_obj->_detail_id = null;
		$detail_obj->setOrder_id ( $order_id );
		$detail_obj->setDetail_name ( $detail_name );
		$detail_obj->setObj_id ( $obj_id );
		$detail_obj->setObj_type ( $obj_type );
		$detail_obj->setPrice ( $price );
		$detail_obj->setNum ( $num );
		return $detail_obj->create ();
	}
	/**
	 * 订单删除
	 */
	public static function del_order($order_id, $url = '', $output = 'normal') {
		global $_lang;
		$res = dbfactory::execute ( sprintf ( " delete from %switkey_order where order_id='%d'", TABLEPRE, $order_id ) );
		$res *= dbfactory::execute ( sprintf ( " delete from %switkey_order_detail where order_id = '%d'", TABLEPRE, $order_id ) );
		$res and Keke::keke_show_msg ( $url, $_lang['order_delete_success'], "", $output ) or Keke::keke_show_msg ( $url, $_lang['order_delete_fail'], "error", $output );
	}
	/**
	 * 更新订单状态
	 * @param int $order_id 订单ID
	 * @param string $to_status 变更状态
	 */
	public static function set_order_status($order_id, $to_status) {
		return Dbfactory::execute ( sprintf ( " update %switkey_order set order_status='%s' where order_id='%d'", TABLEPRE, $to_status, $order_id ) );
	}
	/**
	 * 交易终止返款
	 * @param $order_id 订单编号
	 */
	public static function order_cancel_return($order_id) {
		$fina_info = dbfactory::get_one ( sprintf ( " select uid,fina_cash,fina_credit from %switkey_finance where order_id ='%d'", TABLEPRE, $order_id ) );
		if ($fina_info) {
			//根据此条财务记录来进行返款
			return Sys_finance::cash_in ( $fina_info ['uid'], $fina_info ['fina_cash'], $fina_info ['fina_credit'], "order_cancel", '', 'order', $order_id );
		} else {
			return true;
		}
	}
 
	/**
	 * 更新财务记录的订单号
	 * 
	 */
	public static function update_fina_order($fina_id, $order_id) {
		return dbfactory::execute ( sprintf ( " update %switkey_finance set order_id = '%d' where fina_id = '%d'", TABLEPRE, $order_id, $fina_id ) );
	}
	
	/**
	 * 任务订单状态
	 * 只针对任务的订单是否有附款
	 * 商品订单的状态定义不一样
	 * 
	 */
	public static function task_order_status() {
		global $_lang;
		return array ("wait" => $_lang['wait_confirm'], "ok" => $_lang['has_pay'], 'fail' => $_lang['pay_fail'], "close" => $_lang['trans_close'] );
	}
	
	public static function get_order_obj() {
		global $_lang;
		return array ("task" => $_lang['task_trans'], "payitem" => $_lang['payitem_service'], "service" => $_lang['goods_trans'], "hosted" => $_lang['bounty_hosting'] );
	}

}