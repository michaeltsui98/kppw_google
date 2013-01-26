<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 互评任务
 * @author Michaeltsui98
 * @version v 3.0
 */
class Control_mark extends Control_front{
	
	function action_index(){
		
		$mark_id = (int)$_GET['id'];
		$by_uid = (int)$_GET['uid'];
		
		$mark_info = DB::select()->from('witkey_mark')->where(" mark_id = $mark_id and by_uid = $by_uid ")->get_one()->execute();
		if(Keke_valid::not_empty($mark_info)==FALSE){
			return  FALSE;
		}
		
		$aid_type = $mark_info['mark_type']=='buyer'?2:1;
		
		$aid_info = DB::select()->from('witkey_mark_aid')->where("aid_type=$aid_type")->execute();

		require Keke_tpl::template ( "mark" );
	}
	
	function action_save(){
		
		
	}
	
}

/* if ($sbt_mark) {
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
	//$aid_list = keke_user_mark_class::get_mark_aid ( $role_type );
	//相应角色的辅助配置
//} */


//require Keke_tpl::template ( "mark" );