<?php
 /**
 * @copyright keke-tech
 * @author Monkey
 * @version v 1.0
 * 2010-9-8ионГ10:14:10
 */

if(!defined('IN_KEKE')) {
	exit('Access Denied');
}

$v_mid = $payment_config['chinabank_seller_id'];
$v_url = $_K ['siteurl'] . '/js.php?op=payment&pay_op=return&pay_m='.$payment_config['pay_dir'];;
$key = $payment_config['chinabank_key'];



$v_oid = "charge-{$uid}-{$order_type}-{$obj_id}-{$model_id}";
$v_amount = $total_money;
$v_moneytype = 'CNY';
$text = $v_amount . $v_moneytype . $v_oid . $v_mid . $v_url . $key;

//echo  strtoupper ( md5 ( "12.00CNY711001http://localhost/kppw/js.php?op=payment&pay_op=return&pay_m=chinabanktest" ) );
$v_md5info = strtoupper ( md5 ( $text ) );


require_once Keke_tpl::template ( 'payment/chinabank/confirm' );
				