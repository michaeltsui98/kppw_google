<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 个人空间的首页
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */


 
/**信誉等级**/
$credit_level = unserialize($member_info['seller_level']);
 

$indus_arr = $Keke->_indus_arr;
if($shop_open){
	//商品展示
	 $service_obj = new Keke_witkey_service_class();
	 $service_obj->setWhere("uid = ".intval($member_id)." order by on_time desc limit 0,6 ");
	 $service_arr = $service_obj->query_keke_witkey_service();
}
$auth_arr = get_auth($member_info);
//认证信息
function get_auth($user_info){
	$auth_item = keke_auth_base_class::get_auth_item ();
	$auth_temp = array_keys ( $auth_item );
	$user_info ['user_type'] == 2 and $un_code = 'realname' or $un_code = "enterprise";
	$t = implode ( ",", $auth_temp );
	$auth_info = Dbfactory::query ( " select a.auth_code,a.auth_status,b.auth_title,b.auth_small_ico,b.auth_small_n_ico from " . TABLEPRE . "witkey_auth_record a left join " . TABLEPRE . "witkey_auth_item b on a.auth_code=b.auth_code where a.uid ='".$user_info['uid']."' and FIND_IN_SET(a.auth_code,'$t')", 1, -1 );
	$auth_info = Keke::get_arr_by_key ( $auth_info, "auth_code" );
	return array('item'=>$auth_item,'info'=>$auth_info,'code'=>$un_code);
}

//威客好评率
$good_rate  = get_witkey_good_rate($member_info);
function get_witkey_good_rate($user_info){
	$st = $user_info['seller_total_num'];
	return $st?(number_format($user_info['seller_good_num']/$st,2)*100).'%':'0%'; 
}
if($task_open){
	$task_obj = keke_table_class::get_instance('witkey_task');
	$w = sprintf(' uid = %d',$member_id);

	$page or $page = 1;
	$limit=10;
	$task = $task_obj->get_grid($w,$p_url, $page,$limit,' order by start_time desc',1,'task_list');
	$count = $task_obj->_count;
	
	$task_list = $task['data'];
	$pages     = $task['pages'];
	$cash_cove = Keke::get_cash_cove('',true);
}
require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");

