<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 *  企业空间的首页
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */


$level        = unserialize($member_info['seller_level']);

/**卖家辅助评价**/
$seller_aid = keke_user_mark_class::get_user_aid ( $member_id, '2', null, '1' );

//威客好评率
$good_rate  = get_witkey_good_rate($member_info);
function get_witkey_good_rate($user_info){
	$st = $user_info['seller_total_num'];
	return $st?(number_format($user_info['seller_good_num']/$st,2)*100).'%':'0%'; 
}
//任务模型
$model_list = $Keke->_model_list; 
$indus_arr = $Keke->_indus_arr;
/*热门商品分类*/
$rs = Keke::get_table_data('indus_id,service_id','witkey_service',"uid=$member_id",'views desc','','','indus_id');
$hot_cat = array_intersect_key($indus_arr, $rs);

//发布的任务
$sql = sprintf("select * from %switkey_task where uid=%d and task_status!=0 and task_status!=1 order by start_time desc limit 0,5",TABLEPRE,$member_id);
$pub_task_arr = Dbfactory::query($sql);

$cash_cove = Keke::get_cash_cove('',true);//区间
//$auth_info = keke_auth_fac_class::get_auth_imghtm('', $member_id);

$member_info['user_type']==2 and $w=" auth_code!='realname' "  or $w='';
 isset($w) and $auth_item_list = keke_auth_base_class::get_auth_item ( null, null, 1 ,$w);
$auth_temp = array_keys ( $auth_item_list );
$t = implode ( ",", $auth_temp );
$auth_info = Dbfactory::query ( " select a.auth_code,a.auth_status,b.auth_title,b.auth_small_ico,b.auth_small_n_ico from " . TABLEPRE . "witkey_auth_record a left join " . TABLEPRE . "witkey_auth_item b on a.auth_code=b.auth_code where a.uid ='$uid' and FIND_IN_SET(a.auth_code,'$t')", 1, -1 ); 
$auth_info = Keke::get_arr_by_key ( $auth_info, "auth_code" );
$e_desc    = preg_replace("/<img(.*)\/>/iU",'', $e_shop_info['shop_desc']);

//商品展示
$sql = sprintf("select * from %switkey_service where uid = %d and  service_status = 2 order by  service_id desc limit 0,6",TABLEPRE,$member_id);
$shop_arr = Dbfactory::query($sql);

//获取认证项
$cert = Dbfactory::query(sprintf("select * from %switkey_member_ext where uid=%d and type='cert'",TABLEPRE,$member_id));

require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");