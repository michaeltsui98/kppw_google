<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * Ucenter 用户登录
 * 
 * @author Michael
 * @version 2.2 2012-11-06
 */
require_once S_ROOT . 'client/pw_client/uc_client.php';
class Keke_user_login_pw extends Keke_user_login {
	/**
	 * phpWind用户登录
	 * 
	 * @see Keke_user_login::login()
	 * @return -1用户名错误,-2密码错误
	 */
	function login($type = 0) {
		
		$uc_info = uc_user_login ( $this->_username, md5($this->_pwd), $type );
		
		if ($uc_info ['status'] !== 1) {
			return $uc_info ['status'];
		}
		//判断keke的账号
		$res = $this->check_account ( $uc_info['uid'] );
		if ($res !== 1) {
			return $res;
		}
		 
		$this->complete_login ( $uc_info['uid'], $uc_info['username'] );
		// 异步登录代码
		return $uc_info['synlogin'];
	}
	/**
	 * phpWindow用户退出
	 * 
	 * @see Keke_user_login::logout()
	 */
	function logout($destroy = FALSE) {
		if ($destroy === TRUE) {
			$this->_session->destroy ();
		} else {
			// 删除登录用户会话
			$this->_session->delete ( 'uid' );
			$this->_session->delete ( 'username' );
			// 重新生成会话
			$this->_session->regenerate ();
		}
		Cookie::delete ( 'remember_me' );
		return uc_user_synlogout ();
	}
	/**
	 * keke系统判断账号是否存在
	 * 
	 * @param int $uid        	
	 * @return string
	 */
	function check_account($uid) {
		$where = "uid ='$uid'";
		$res = DB::select ( 'username,status' )->from ( 'witkey_space' )->where ( $where )->get_one ()->execute ();
		list ( $username, $status ) = array (
				$res ['username'],
				$res ['status'] 
		);
		// 账号不存在
		if (! Keke_valid::not_empty ( $username )) {
			return - 6;
		}
		if ($status == 2) {
			// 账号被冻结
			return - 3;
		} elseif ($status == 3) {
			// 账号未激活
			return - 4;
		}
		return 1;
	}
}
