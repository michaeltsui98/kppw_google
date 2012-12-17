<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-08下午02:57:33
 */


/**
 * 处理订单维权的
 */
if ($op == 'report') {
	$title =$_lang['order_rights_submit'];
	$to_uid=intval($to_uid);
	$obj_id = intval($obj_id);
	if ($sbt_edit) {
		keke_order_class::set_report ( $obj_id, $to_uid, $to_username, $type, $file_url, $tar_content );
	} else {
		$order_info = keke_order_class::get_order_info ( $obj_id ); //订单信息
		if ($type == '1') { //这里传递的是role
			$to_uid = $order_info ['order_uid'];
			$to_username = $order_info ['order_username'];
		} else {
			$to_uid = $order_info ['seller_uid'];
			$to_username = $order_info ['seller_username'];
		}
		$type = "1"; //维权
		require keke_tpl_class::template ( "report" );
	}
	die ();
}
$ops = array ('detail', 'recharge', 'withdraw', 'order' ,'prom');

in_array ( $op, $ops ) or $op = "detail";
/**
 * 子集菜单
 */
$sub_nav = array(
	array ("detail" => array ($_lang['accounts_detail'], "chart-line" ),
 		//"order" => array ($_lang['order_trading'], "case-1" ),
		"prom" => array ($_lang['prom_make_money'], "emotion-smile" ) ),
	array (
 		"recharge" => array ($_lang['account_recharge'], "cur-yen" ),
 		"withdraw" => array ($_lang['account_withdraw'], "clipboard-copy" ))
	);
$pay_arr = Keke::get_table_data ( "k,v", "witkey_pay_config", '', '', '', '', 'k' ); //提现、充值配置
$payment_list = Keke::get_payment_config (); //线上支付接口配置
//$offline_pay_list = Keke::get_table_data ( "*", "witkey_pay_api", " type='offline'", '', '', '', 'payment' ); //线下支付方式


require 'user_' . $view . '_' . $op . '.php';

