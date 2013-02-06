<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * Ucenter �û���¼
 * 
 * @author Michael
 * @version 3.0 2012-11-06
 */
require_once S_ROOT . 'client/pw_client/uc_client.php';
class Keke_user_login_pw extends Keke_user_login {
	/**
	 * phpWind�û���¼
	 * 
	 * @see Keke_user_login::login()
	 * @return -1�û�������,-2�������
	 */
	function login($type = 0) {
		
		$uc_info = uc_user_login ( $this->_username, md5($this->_pwd), $type );
		
		if ($uc_info ['status'] !== 1) {
			return $uc_info ['status'];
		}
		//�ж�keke���˺�
		$res = $this->check_account ( $uc_info['uid'] );
		if ($res !== 1) {
			return $res;
		}
		$this->remember_me($uc_info['uid'], $uc_info['username'], md5($this->_pwd));
		$this->complete_login ( $uc_info['uid'], $uc_info['username'] );
		// �첽��¼����
		return $uc_info['synlogin'];
	}
	/**
	 * phpWindow�û��˳�
	 * 
	 * @see Keke_user_login::logout()
	 */
	function logout($destroy = FALSE) {
		if ($destroy === TRUE) {
			$this->_session->destroy ();
		} else {
			 $this->clear_session();
		}
		 
		return uc_user_synlogout ();
	}
	/**
	 * kekeϵͳ�ж��˺��Ƿ����
	 * 
	 * @param int $uid        	
	 * @return string
	 */
	function check_account($uid) {
		$where = "uid ='$uid'";
		$res = DB::select('username,status,group_id,msg_num')->from('witkey_space')->where($where)->get_one()->execute();
		list ( $username, $status ) = array (
				$res ['username'],
				$res ['status'] 
		);
		// �˺Ų�����
		if (! Keke_valid::not_empty ( $username )) {
			return - 6;
		}
		if ($status == 2) {
			// �˺ű�����
			return - 3;
		} elseif ($status == 3) {
			// �˺�δ����
			return - 4;
		}
		$this->_session->set('group_id', $res['group_id']);
		$this->_session->set('msg_num', $res['msg_num']);
		
		return 1;
	}
}
