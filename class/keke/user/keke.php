<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 客客的用户信息
 * 
 * @author Michael
 * @version 2.2
 *          2012-11-12
 *         
 */
class Keke_user_keke extends Keke_user {
	function get_user_info($uid, $fields = '*', $isuid = 1) {
		if ($isuid === 1) {
			$where = "uid='$uid'";
		} else {
			$where = "username='$uid'";
		}
		return DB::select ( $fields )->from ( 'witkey_space' )->where ( $where )->get_one ()->execute ();
	}
	function get_avatar($uid, $size = 'middle') {
		return Keke_user_avatar::get_avatar ( $uid, $size );
	}
	function del_user($uid) {
		$sql = "DELETE a,b,c,d,e,f,g,h,i,j,k from :Pwitkey_member as a \n" . "LEFT JOIN :Pwitkey_space as b on a.uid = b.uid\n" . "LEFT JOIN :Pwitkey_member_auth as c on a.uid =c.uid\n" . "LEFT JOIN :Pwitkey_member_black as d on a.uid = d.uid\n" . "LEFT JOIN :Pwitkey_member_ext as e on a.uid = e.uid\n" . "LEFT JOIN :Pwitkey_member_oltime as f on a.uid = f.uid\n" . "LEFT JOIN :Pwitkey_msg as g on a.uid = g.uid\n" . "LEFT JOIN :Pwitkey_comment as h on a.uid = h.uid\n" . "LEFT JOIN :Pwitkey_shop as i on a.uid = i.uid\n" . "LEFT JOIN :Pwitkey_shop_case as j on i.shop_id = j.shop_id\n" . "LEFT JOIN :Pwitkey_shop_member as k on i.shop_id = k.shop_id\n" . "where a.uid = '$uid'";
		DB::query ( $sql, Database::DELETE )->tablepre ( ':P' )->execute ();
		// 删除用户头象
		$home_dir = Keke_user_avatar::get_home ( $uid );
		// 删除这个目录下的文件
		keke_file_class::delete_files ( $home_dir, TRUE );
	}
	/**
	 * 上传头象的flash
	 * 
	 * @param int $uid        	
	 * @return string HTML
	 */
	function avatar_flash($uid) {
		return Keke_user_avatar::avatar_html ( $uid );
	}
 	/**
	 * 检查安全码 ,检查安全码的地方都需要用到
	 * @param  $pwd
	 * @return boolean
	 */
	function check_safe($pwd,$uid=NULL){
		if($uid===NULL){
			$uid = $_SESSION['uid'];
		}
		$member = DB::select()->from('witkey_member')->where("uid=$uid")->get_one()->execute();
		return (bool)(hash_hmac('md5', $pwd, $member['salt']) == $member['sec_code']);
	}
	/**
	 * 更新安全码,找回密码可以用这个方法重置安全码
	 * @param string $pwd
	 * @param int uid
	 */
	function update_safe($pwd,$uid=NULL){
		if($uid===NULL){
			$uid = $_SESSION['uid'];
		}
		$salt = Keke::randomkeys(6);
		$sec_code = hash_hmac('md5', $pwd, $salt);
		return (bool) DB::update('witkey_member')->set(array('salt','sec_code'))->value(array($salt,$sec_code))->where("uid=$uid")->execute();
	}
}
