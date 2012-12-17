<?php

/**
 * 订单充值页面
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:05:04
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
Keke::check_login ();
$page_title=$_lang['order_pay'].'- '.$_K['html_title'];
$payment_list = Keke::get_payment_config ();
$obj_type&&$obj_id and $order_id = keke_order_class::get_order_id($obj_type,$obj_id);
$order_id = intval ( $order_id );
$order_id and $order_info = keke_order_class::get_order_info ( $order_id );
$order_amount = number_format ( $order_info ['order_amount'], 2 );
function get_href($order_info) {
	switch ($order_info ['obj_type']) {
		case 'task' :
			$a = "index.php?do=task&task_id={$order_info['obj_id']}";
			break;
		case 'service' :
			$a = "index.php?do=service&sid={$order_info['obj_id']}";
			break;
	}
	return $a;
}
$href = get_href ( $order_info );
//计算用户余额
Keke::$_sys_config ['credit_is_allow'] == 1 and $user_balance = $user_info ['credit'] + $user_info ['balance'] or $user_balance = $user_info ['balance'];
//应付金额
$pay_amount = (float)$order_info ['order_amount'] - (float)$user_balance;
$pay_amount < 0 and Keke::show_msg ( $_lang['operate_notice'], "index.php?do=user&view=finance&op=order", 2, $_lang['this_order_need_pay'] );
//确认支付方式，返回请求的url
if (isset($pay_mode)) {
	$payment_config = Keke::get_payment_config($pay_mode);
	require S_ROOT . "/payment/" . $pay_mode . "/order.php";
	$from = get_pay_url('order_charge',$pay_amount, $payment_config, $order_info['order_name'], $order_id,$model_id,$order_info['obj_id']);
	$title=$_lang['confirm_pay'];
	require Keke_tpl::template ( "pay_cash");die();
}
require Keke::$_tpl_obj->template ( $do );