<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );

/**
 * Ucenter 用户登录
 * @author Michael
 * @version 2.2 2012-11-06
 */

require_once S_ROOT.'client/ucenter/client.php';

class Keke_user_login_uc extends Keke_user_login{
   
	/**
	 * Ucenter 登录
	 * @see Keke_user_login::login()
	 */
	function login($type=0){
	   list ($uid, $username, $password, $email) =  uc_user_login($this->_username, $this->_pwd,$type);
	   //大于0表示登录成功
	   if($uid>0){
	   		$res = $this->check_account($uid);
	   		
	   		//keke系统没有这个人，需要激活
	   		if($res === -6){
	   			Keke_user_register::instance('keke')->set_username($this->_username)->set_pwd($this->_pwd)->set_email($email)->reg();
	   		}
	   		if($res<0 and $res > -6){
	   			return $res;
	   		}
	   		$this->complete_login($uid, $username);
	   		$html = uc_user_synlogin($uid);
	   		return $html;
	   		
	   }else{
	   	     //ucenter 没有这个用户，查看本地是否有这个用户，如果本地有，判断本地的UID是否在uc是否存在，如果不存在，则添加到uc中,否则不做处理 
	   		if($uid == -1){
	   			 $username = Keke_user_login::instance('keke')->set_username($this->_username)->check_account(0);
	   			 //判断本地用户是否冻结，负数就返回
	   			 if((int)$username<0){
	   			 	return $uid;
	   			 }
	   			 
	   			 $md5pwd = md5($this->_pwd);
	   			 //keke用户信息
	   			 $keke_user_info = DB::select()->from('witkey_member')->where("username = '$username' and password='$md5pwd'")->get_one()->execute();
	   			 //keke用户信息为空，返回
	   			 if(!Keke_valid::not_empty($keke_user_info)){
	   			 	return $uid;
	   			 }
	   			 //通用keke_uid 查uc对应的uid的信息,如果没有，注册到uc中
	   			 $uc_user_info = uc_get_user($keke_user_info['username']);
	   			 //ucenter用户已存在，返回
	   			 if($uc_user_info!=0){
	   			 	return $uid;
	   			 }
	   			 $keke_uid = $keke_user_info['uid'];
	   			 $keke_username = $keke_user_info['username'];
	   			 $keke_info = DB::select('email,reg_time,reg_ip')->from('witkey_space')->where("uid = '$keke_uid'")->get_one()->execute();
	   			 if(!$keke_info['email']){
	   			     return $uid;
	   			 }
	   			 $config = array();
	   			 $config ['dbhost'] = UC_DBHOST;
	   			 $config ['dbname'] = UC_DBNAME;
	   			 $config ['dbuser']= UC_DBUSER;
	   			 $config ['dbpass'] = UC_DBPW;
	   			 $config ['dbcharset'] = UC_DBCHARSET;
	   			 $ucdb =  new  Keke_driver_mysql($config);
	   			  
	   			 $salt = Keke::randomkeys(6);
	   			 $password = md5(md5($this->_pwd).$salt);
	   			 
	   			 $member_sql = "INSERT  INTO ".UC_DBTABLEPRE."members SET uid='$keke_uid', username='$keke_username', 
	   			 		         password='$password',email='$keke_info[email]', 
	   			 				 regip='$keke_info[reg_ip]', regdate='$keke_info[reg_time]', salt='$salt'";
	   			 
	   			 $fields_sql = "INSERT  INTO ".UC_DBTABLEPRE."memberfields SET uid='$keke_uid'";
	   			 $ucdb->execute($member_sql);
	   			 
	   			 $ucdb->execute($fields_sql);
                 return $this->login(0); 
                 
	   	    } 
	   	    return $uid;
	   }	
	}
    /**
     * 登出的结果要在控制层显示
     * @see Keke_user_login::logout()
     */
	function logout($destroy = FALSE){
		if ($destroy === TRUE) {
			$this->_session->destroy();
		} else {
			// 删除登录用户会话
			$this->_session->delete ( 'uid' );
			$this->_session->delete ( 'username' );
			// 重新生成会话
			$this->_session->regenerate ();
		}
		Cookie::delete('remember_me');
		return  uc_user_synlogout();
	}
	
	/**
	 * keke系统判断账号是否存在
	 * @param int $uid
	 * @return string
	 */
	function check_account($uid){
        $where  = "uid ='$uid'";
		$res = DB::select('username,status')->from('witkey_space')->where($where)->get_one()->execute();
		list($username,$status) = array($res['username'],$res['status']);
		//账号不存在
		if(!Keke_valid::not_empty($username)){
			return -6;
		}
		if($status==2){
			//账号被冻结
			return -3;
		}elseif($status==3){
			//账号未激活
			return -4;
		}
		return 1;
	}

}//end
 