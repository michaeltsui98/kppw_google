<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * 客客系统的站内登录
 * @author Michael	
 * @version 2.2 
 * 2012-11-06
 *
 */

class Keke_user_login_keke extends Keke_user_login {
    
 
    /**
     * 用户登录
     * @param int $type (登录方式0,1,2,3 分别表示，用户名，UID,邮箱地址,手机号 )
     * @return int -1账号不对,-2密码不对
     */
	function login($type=0){
		
		//密码为空
		if (empty($this->_pwd)){
			return -5;
		}
		$username = $this->check_account($type);
		if($username<0){
			return $username;
		}
		$pwd = md5($this->_pwd);
		$where = "username = '$username' and password = '$pwd'";
		$uid = DB::select('uid')->from('witkey_member')->where($where)->get_count()->execute();
		if($uid){
			$this->remember_me($uid, $username, $pwd);
		    //完成登录 
			$this->complete_login($uid, $username);
		    //登录成功
			return TRUE;
		}else{
			//密码错误
			return -2;
		}
	}
	/**
	 * 登出系统
	 *
	 * @return boolean
	 */
	function logout($destroy = FALSE) {
		if ($destroy === TRUE) {
			$this->_session->destroy();
		} else {
			$this->clear_session();
		}
		// 检查登出是否成功
		return ! $this->logged_in ();
	}
	/**
	 * 判断账号是否存在
	 * @param int $type
	 * @return string 
	 */
	function check_account($type){
		if($type==0){
			$where = "username = '$this->_username'";
		}elseif($type == 3){
			$where = "mobile = '$this->_username'";
		}elseif($type==2){
			$where = "email = '$this->_username'";
		}elseif($type==1){
			$where = "uid = '$this->_username'";
		}
		$res = DB::select('username,status,group_id')->from('witkey_space')->where($where)->get_one()->execute();
		list($username,$status) = array($res['username'],$res['status']);
	   //账号不存在
		if(!Keke_valid::not_empty($username)){
			return -1;
		}
		if($status==2){
			//账号被冻结
			return -3;
		}elseif($status==3){
			//账号未激活
			return -4;
		}
		$this->_session->set('group_id', $res['group_id']);
		return $username;
	}

	
	
}
