<?php

/**
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:05:04
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
Keke_lang::package_init("shop");
Keke_lang::loadlang("info");
$nav_active_index = "shop"; 
$sid=intval($_GET['sid']); 
if ($sid) { 
	$service_info = keke_shop_class::get_service_info ( $sid );
	if ($service_info ['point']) {
		$point = explode (',', $service_info['point'] );
		$px = $point ['0'];
		$py = $point ['1'];
	} 
	if ($uid != $service_info ['uid']&&$service_info ['service_status']!=2) {
		
		$uid == ADMIN_UID or Keke::show_msg ( $_lang['operate_notice'], "index.php?do=shop", '1', $_lang['goods_not_exist'], 'error' );
	}
	
	$indus_p_arr = Keke::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', NULL );
	$indus_arr   = Keke::get_table_data ( '*', 'witkey_industry', '', 'listorder', '', '', 'indus_id', NULL );
	$model_id    = $service_info ['model_id'];
	$model_info  = $model_list [$model_id];
	$model_code  = $model_info['model_code'];
	/**
	 *店主部分信息获取
	 */
	$owner_info  = Keke::get_user_info($service_info['uid']);
	//店主信息
	$user_level  = unserialize($owner_info['seller_level']);
	/** 认证记录**/
	
	$auth_info  = keke_auth_fac_class::get_submit_auth_record($owner_info['uid'],1);
	/*店主更多*/
	$more_list = keke_shop_class::get_more_service($service_info['uid'], $sid);
	/*感兴趣*/
	$related_list = keke_shop_class::get_related_service($model_id, $sid, $service_info['indus_id']);
	/*同类热销*/
	$hot_list = keke_shop_class::get_hot_service($model_id, $sid, $service_info['indus_pid']);
	/** 同类任务*/
	$task_list = keke_shop_class::get_task_info($service_info['indus_id']);
	/** 语言包**/
	Keke_lang::package_init("shop");
	Keke_lang::loadlang($model_info ['model_dir']);
	Keke_lang::loadlang("service_info");
} else {
	
	Keke::show_msg ( $_lang['operate_notice'], "index.php?do=index", '1', $_lang['param_error'], 'error' );
}
$model_info and ( require S_ROOT . "/shop/" . $model_info ['model_dir'] . "/control/service_info.php") or Keke::show_msg ( $_lang['error'], "index.php?do=index", 3, $_lang['goods_not_exist'], 'error' );
