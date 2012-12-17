<?php
/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-6-30早上11:59:00
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

if ($sbt_mark) {
	$tar_content = Keke::escape($tar_content);
	$aid = implode(",",array_keys($star));
	$aid_star = implode(",",array_values($star));
	keke_user_mark_class::exec_mark($mark_id, $tar_content,$mark_status,$aid,$aid_star);
	
} else {
	$mark_arr = keke_user_mark_class::get_mark_info ( array ('model_code' => $model_code, 'obj_id' => $obj_id,'by_uid'=>$uid) );
	$mark_info = $mark_arr ['mark_info'] ['0'];
     $mark_info or   Keke::show_msg($_lang['operate_notice'],"","",$_lang['mark_sya_busy_try_later'],"error"); 
	/**
	 * 辅助评价项读取
	 */
	$aid_list = keke_user_mark_class::get_mark_aid ( $role_type );
	//相应角色的辅助配置
}
require Keke_tpl::template ( "mark" );