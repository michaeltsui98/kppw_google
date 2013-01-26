<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * keke ϵͳ�û�ע��
 * @author Michael	
 * @version 3.0 2012-11-08
 *
 */

class Keke_user_register_keke extends Keke_user_register {

	/**
	 * kekeϵͳע��
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
	 * ����û���
	 * @see Keke_user_register::check_username()
	 * @return  
	 */
	function check_username($username){
		if(!Keke_valid::not_empty($username)){
			//����Ϊ��
			return -1;
		}
		if(Keke::k_strpos($username)){
			//�û�������
			return -2;
		}
		if((bool)DB::select('count(*)')->from('witkey_member')->where("username='$username'")->get_count()->execute()){
			//�û�����
			return -3;
		}
		return 1;
	}
	/**
	 * ���,���UID�Ƿ����
	 * @param int $uid
	 * @return number 1 ���ڣ�0 ������
	 */
	function check_uid($uid){
       
		if((bool)DB::select('count(*)')->from('witkey_member')->where("uid='$uid'")->get_count()->execute()){
			//�û�����
			return 1;
		}
		
		return 0;
	}
	
	function check_email($email){
		if(!Keke_valid::email($email)){
			//�����ʽ����
			return -4;
		}
		if((bool)DB::select('count(*)')->from('witkey_space')->where("email='$email'")->get_count()->execute()){
			//�����Ѵ���
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
