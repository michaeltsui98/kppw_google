<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * �Ϳ�ϵͳ��վ�ڵ�¼
 * @author Michael	
 * @version 3.0 
 * 2012-11-06
 *
 */

class Keke_user_login_keke extends Keke_user_login {
    
 
    /**
     * �û���¼
     * @param int $type (��¼��ʽ0,1,2,3 �ֱ��ʾ���û�����UID,�����ַ,�ֻ��� )
     * @return int -1�˺Ų���,-2���벻��
     */
	function login($type=0){
		
		//����Ϊ��
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
		    //��ɵ�¼ 
			$this->complete_login($uid, $username);
		    //��¼�ɹ�
			return TRUE;
		}else{
			//�������
			return -2;
		}
	}
	/**
	 * �ǳ�ϵͳ
	 *
	 * @return boolean
	 */
	function logout($destroy = FALSE) {
		if ($destroy === TRUE) {
			$this->_session->destroy();
		} else {
			$this->clear_session();
		}
		// ���ǳ��Ƿ�ɹ�
		return ! $this->logged_in ();
	}
	/**
	 * �ж��˺��Ƿ����
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
	   //�˺Ų�����
		if(!Keke_valid::not_empty($username)){
			return -1;
		}
		if($status==2){
			//�˺ű�����
			return -3;
		}elseif($status==3){
			//�˺�δ����
			return -4;
		}
		$this->_session->set('group_id', $res['group_id']);
		return $username;
	}

	
	
}
