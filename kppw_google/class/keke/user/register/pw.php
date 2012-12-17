<?php   defined('IN_KEKE') or die('access fail');
/**
 * phpWind 用户注册
 * @author Michael
 * @version 2.2 2012-11-09
 */

include_once S_ROOT.'client/pw_client/uc_client.php';

class Keke_user_register_pw extends Keke_user_register {

	function reg(){
		if(($res=$this->check_username($this->_username))!==1){
			return $res;
		}
		if(($res=$this->check_email($this->_email))!==1){
			return $res;
		}
		//判断uc_uid 比 keke_uid小时，更改uc_uid的值，否则冲突
		$uc_max_uid  = $this->get_max_uid();
		(int)$uc_max_uid = $uc_max_uid['uid'];
		(int)$keke_max_uid = Keke_user_register::instance('keke')->get_max_uid();
		
		if($uc_max_uid<$keke_max_uid){
			uc_user_update_increment($keke_max_uid);
		}
		
		$uid = uc_user_register($this->_username, md5($this->_pwd), $this->_email);
		
		if($uid<=0){
			return $uid;
		}
		//异步登录
		$user = $this->syn_login($uid);
		//状态1表示登录成功，否则出错
		$status = $user['status'];
		if($status<=0){
			return $status;
		}
		
		$this->complete_reg($uid, $this->_username);
		return $user['synlogin'];
		
	}
	
	function check_username($username){
		//username 是否与keke的username 一样
		$keke_username = Keke_user_register::instance('keke')->check_username($username);
		if($keke_username !==1){
			return $keke_username;
		}
		return uc_check_username($username);
	}
	
	function check_email($email){
		$keke_email = Keke_user_register::instance('keke')->check_email($email);
		if($keke_email !==1){
			return $keke_email;
		}
		return uc_check_email($email);
	}
	
	function syn_login($uid){
		return uc_user_login($this->_username, md5($this->_pwd), 0);
	}
	function get_max_uid(){
		return uc_check_maxuid();
	}
	
}
