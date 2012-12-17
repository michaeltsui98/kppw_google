<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * Ucenter 的用户信息
 * @author Michael	
 * @version 2.2 
 * 2012-11-06
 *
 */
include_once S_ROOT.'client/ucenter/client.php';
class Keke_user_uc extends Keke_user {
    
	function get_user_info($uid,$fields='*', $isuid = 1){
	    return Keke_user::instance('keke')->get_user_info($uid,$fields,$isuid); 
	}
	
	function get_avatar($uid,$size='middle'){
		return $path =  UC_API . "/avatar.php?uid=$uid&size=$size";
	}
	
	function del_user($uid){
		Keke_user::instance('keke')->del_user($uid);
		uc_user_delete($uid);
		uc_user_deleteavatar($uid);
	}
	
	function avatar_flash($uid){
	   return uc_avatar($uid);	
	}
}
