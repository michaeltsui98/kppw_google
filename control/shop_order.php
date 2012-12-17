<?php

/**
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:05:04
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

Keke::check_login ();
$nav_active_index = 'shop';
Keke_lang::package_init ( "shop" );
Keke_lang::loadlang ( "info");
$sid and $sid = intval($_GET['sid']);

if ($sid) {
	$service_info  = keke_shop_class::get_service_info($sid);
	$model_info  = $model_list [$service_info['model_id']];
	$service_info or Keke::show_msg ( $_lang['operate_notice'], "index.php?do=shop", '1', $_lang['goods_not_exist'], 'error' );
	keke_shop_class::access_check($sid,$service_info['uid'],$service_info['model_id']);
	//页面进入检测
	$op or $op = 'buy';
	switch ($op) {
		case "buy" : 
			//进入购买页面
			/** 店主部分信息获取*/
			$owner_info = Keke::get_user_info ( $service_info ['uid'] );
			 //店主信息
			$user_level = unserialize ( $owner_info ['seller_level'] );
			/** 认证记录**/
			$auth_info = keke_auth_fac_class::get_submit_auth_record ( $owner_info ['uid'], 1 );
			break;
		case "confirm" : 
			//订单提交
			keke_shop_class::create_service_order($service_info);
			break;
	}
 
	require Keke_tpl::template ( "shop/order_sub" );
} else {
	Keke::show_msg ( $_lang['operate_notice'], "index.php?do=shop", '1', $_lang['param_error'], 'error' );
}