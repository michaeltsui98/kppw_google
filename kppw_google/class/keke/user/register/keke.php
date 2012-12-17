<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * keke 系统用户注册
 * @author Michael	
 * @version 2.2 2012-11-08
 *
 */

class Keke_user_register_keke extends Keke_user_register {

	/**
	 * keke系统注册
	 * @see Keke_user_register::reg()
	 */
	function reg(){
		if(($res = $this->check_username($this->_username))<1){
			return $res;
		}
		if(($res= $this->check_email($this->_email))<1){
			return $res;
		}
		$uid = $this->complete_reg(NULL, $this->_username);
		
		return $uid;
		
	}
	/**
	 * 检查用户名
	 * @see Keke_user_register::check_username()
	 * @return  
	 */
	function check_username($username){
		if(!Keke_valid::not_empty($username)){
			//用名为空
			return -1;
		}
		if(Keke::k_strpos($username)){
			//用户名敏感
			return -2;
		}
		if((bool)DB::select('count(*)')->from('witkey_member')->where("username='$username'")->get_count()->execute()){
			//用户存在
			return -3;
		}
		return 1;
	}
	/**
	 * 检查,这个UID是否存在
	 * @param int $uid
	 * @return number 1 存在，0 不存在
	 */
	function check_uid($uid){
       
		if((bool)DB::select('count(*)')->from('witkey_member')->where("uid='$uid'")->get_count()->execute()){
			//用户存在
			return 1;
		}
		
		return 0;
	}
	
	function check_email($email){
		if(!Keke_valid::email($email)){
			//邮箱格式不对
			return -4;
		}
		if((bool)DB::select('count(*)')->from('witkey_space')->where("email='$email'")->get_count()->execute()){
			//邮箱已存在
			return -5;
		}
		return 1;
	}
	function get_max_uid(){
		 return DB::select('max(uid)')->from('witkey_member')->get_count()->execute();
	}
	function syn_login($uid){
		
	}
	
}
