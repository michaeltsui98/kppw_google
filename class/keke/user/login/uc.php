<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );

/**
 * Ucenter �û���¼
 * @author Michael
 * @version 3.0 2012-11-06
 */

require_once S_ROOT.'client/ucenter/client.php';

class Keke_user_login_uc extends Keke_user_login{
   
	/**
	 * Ucenter ��¼
	 * @see Keke_user_login::login()
	 */
	function login($type=0){
	   list ($uid, $username, $password, $email) =  uc_user_login($this->_username, $this->_pwd,$type);
	   //����0��ʾ��¼�ɹ�
	   if($uid>0){
	   		$res = $this->check_account($uid);
	   		
	   		//kekeϵͳû������ˣ���Ҫ����
	   		if($res === -6){
	   			Keke_user_register::instance('keke')->set_username($this->_username)->set_pwd($this->_pwd)->set_email($email)->reg();
	   		}
	   		if($res<0 and $res > -6){
	   			return $res;
	   		}
	   		$this->remember_me($uid, $username, md5($this->_pwd));
	   		$this->complete_login($uid, $username);
	   		$html = uc_user_synlogin($uid);
	   		return $html;
	   		
	   }else{
	   	     //ucenter û������û����鿴�����Ƿ�������û�����������У��жϱ��ص�UID�Ƿ���uc�Ƿ���ڣ���������ڣ�����ӵ�uc��,���������� 
	   		if($uid == -1){
	   			 $username = Keke_user_login::instance('keke')->set_username($this->_username)->check_account(0);
	   			 //�жϱ����û��Ƿ񶳽ᣬ�����ͷ���
	   			 if((int)$username<0){
	   			 	return $uid;
	   			 }
	   			 
	   			 $md5pwd = md5($this->_pwd);
	   			 //keke�û���Ϣ
	   			 $keke_user_info = DB::select()->from('witkey_member')->where("username = '$username' and password='$md5pwd'")->get_one()->execute();
	   			 //keke�û���ϢΪ�գ�����
	   			 if(!Keke_valid::not_empty($keke_user_info)){
	   			 	return $uid;
	   			 }
	   			 //ͨ��keke_uid ��uc��Ӧ��uid����Ϣ,���û�У�ע�ᵽuc��
	   			 $uc_user_info = uc_get_user($keke_user_info['username']);
	   			 //ucenter�û��Ѵ��ڣ�����
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
     * �ǳ��Ľ��Ҫ�ڿ��Ʋ���ʾ
     * @see Keke_user_login::logout()
     */
	function logout($destroy = FALSE){
		if ($destroy === TRUE) {
			$this->_session->destroy();
		} else {
			$this->clear_session();
		}
		
		return  uc_user_synlogout();
	}
	
	/**
	 * kekeϵͳ�ж��˺��Ƿ����
	 * @param int $uid
	 * @return string
	 */
	function check_account($uid){
        $where  = "uid ='$uid'";
		$res = DB::select('username,status')->from('witkey_space')->where($where)->get_one()->execute();
		list($username,$status) = array($res['username'],$res['status']);
		//�˺Ų�����
		if(!Keke_valid::not_empty($username)){
			return -6;
		}
		if($status==2){
			//�˺ű�����
			return -3;
		}elseif($status==3){
			//�˺�δ����
			return -4;
		}
		return 1;
	}

}//end
 