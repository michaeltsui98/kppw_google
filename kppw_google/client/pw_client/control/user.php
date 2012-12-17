<?php

define('UC_USER_REG_ILLEGAL_USERNAME', -2);
define('UC_USER_REG_USERNAME_SAME', -3);
define('UC_USER_REG_ILLEGAL_EMAIL', -4);
define('UC_USER_REG_EMAIL_SAME', -5);

define('UC_USER_NOT_EXISTS', -1);
define('UC_USER_CHECK_ERROR', -2);

class usercontrol {

	var $base;
	var $db;
	var $user;

	
	function usercontrol(&$base) {
		$this->base = $base;
		$this->db = $base->db;
		$this->user = $base->load('user');
	}

	function register($username, $pwd, $email) {
		if (($status = $this->checkName($username)) < 0) {
			return $status;
		}
		if (($status = $this->checkEmail($email)) < 0) {
			return $status;
		}
		$uid = $this->user->add($username, $pwd, $email);
		
		return $uid;
		
	}

	function login($username, $password, $logintype) {
		$num = 1;
	    switch ($logintype) {
			case 1:
				$user = $this->user->get_by_uid($username);break;
			case 2:
				list($user, $num) = $this->user->get_by_email($username);break;
			default:
				$user = $this->user->get_by_username($username);
		}
	
		$synlogin = '';
		if (empty($user)) {
			$status = -1;
		} elseif ($logintype == 2 && $num > 1) {
			$status = -3;
		} elseif ($password != $user['password'] && substr($password, 8, 16) != $user['password']) {
			$status = -2;
		} else {
			$status = 1;
			$this->base->appid && $synlogin = $this->synlogin($user['uid'], $user['username'], $password);
		}
		unset($user['password']);//返回除password外的所有用户信息，以便应用端注册
		$user['synlogin'] = $synlogin;
		$user['status'] = $status;
		return $user;
	}

	function synlogin($uid, $username, $password) {
		$synlogin = '';
		$mapp = $this->base->load('app');
		$list = $mapp->applist();
		foreach ($list as $appid => $app) {
			if ($appid != $this->base->appid) {
				$url = $mapp->urlformat($app['siteurl'], $app['interface'], $app['secretkey'], 'User', 'synlogin', array('user' => $this->base->strcode($uid . "\t" . $username . "\t" . $password . "\t" . $this->base->time, $app['secretkey'])));
				$synlogin .= "<script type=\"text/javascript\" src=\"$url\"></script>";
			}
		}
		return $synlogin;
	}

	function synlogout() {
		$synlogout = '';
		$mapp = $this->base->load('app');
		$list = $mapp->applist();
		foreach ($list as $appid => $app) {
			if ($appid != $this->base->appid) {
				$url = $mapp->urlformat($app['siteurl'], $app['interface'], $app['secretkey'], 'User', 'synlogout');
				$synlogout .= "<script type=\"text/javascript\" src=\"$url\"></script>";
			}
		}
		return $synlogout;
	}

	function get($username,$bytype) {
		switch ($bytype) {
			case 1:
				$user = $this->user->get_by_uid($username);break;
			case 2:
				list($user) = $this->user->get_by_email($username);break;
			default:
				$user = $this->user->get_by_username($username);
		}
		if ($user) {
			return array('uid' => $user['uid'], 'username' => $user['username'],'avatar' => $user['icon'], 'email' => $user['email']);
		}
		return array();
	}
	

	function edit($uid, $oldname, $pwd, $email) {

	
		if ($email && ($status = $this->checkEmail($email, $oldname)) < 0) {
			return $status;
		}

		if (($status = $this->user->edit($uid, $newname, $pwd, $email)) == 2) {
			$notify = $this->base->load('notify');
			$nid = $notify->add('altername', array('uid' => $uid, 'newname' => $newname), true);
			//$notify->send_by_id($nid);
		}
		return $status;
	}

	function delete($uids) {
		$this->user->delete($uids);
		$notify = $this->base->load('notify');
		$nid = $notify->add('deluser', array('uids' => $uids), true);
	}

	function checkName($username) {
		$S_key = array("\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n",'#','%','?');
		if (str_replace($S_key, '', $username) != $username) {
			return UC_USER_REG_ILLEGAL_USERNAME;
		}
		if ($this->user->get_by_username($username)) {
			return UC_USER_REG_USERNAME_SAME;
		}
		return 1;
	}

	function checkEmail($email, $username = '') {
		if (empty($email) || !Keke_valid::email($email)) {
			return UC_USER_REG_ILLEGAL_EMAIL;
		}
		if ($this->user->check_email($email, $username)) {
			return UC_USER_REG_EMAIL_SAME;
		}
		return 1;
	}

	function check($uid,$checkstr){
		$user = $this->user->get_by_uid($uid);
		if ($user) {
			$app = $this->base->load('app');
			$myapp = $app->applist($this->base->appid);
			if (md5($myapp['secretkey'] . $user['password']) != $checkstr) {
				$user['uid'] = UC_USER_CHECK_ERROR;
			}
		} else {
			$user['uid'] = UC_USER_NOT_EXISTS;
		}
		return $user;
	}
	
	function CheckMaxUid(){
		return $this->user->get_by_maxuid();
	}
	function update_increment($id){
		return $this->user->update_increment($id);
	}
}
?>