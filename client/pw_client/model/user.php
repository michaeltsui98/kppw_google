<?php

class usermodel {

	var $base;
	var $db;
	var $user;

 

	function usermodel(&$base) {
		$this->base =& $base;
		$this->db =& $base->db;
	}

	function get_by_uid($uid) {
		$arr = $this->db->get_one("SELECT uid,username,password,icon,safecv,email,regdate FROM pw_members WHERE uid=" . UC::escape($uid));
		return $arr;
	}

	function get_by_username($username) {
		$arr = $this->db->get_one("SELECT uid,username,password,safecv,email,regdate FROM pw_members WHERE username=" . UC::escape($username));
		return $arr;
	}

	function get_by_email($email, $unique = true) {
		$query = $this->db->query("SELECT uid,username,password,safecv,email,regdate FROM pw_members WHERE email=" . UC::escape($email));
		$num = $this->db->num_rows($query);
		if ($unique) {
			$arr = $this->db->fetch_array($query);
		} else {
			$arr = array();
			while ($rt = $this->db->fetch_array($query)) {
				$arr[] = $rt;
			}
		}
		return array($arr, $num);
	}

	function check_email($email,$username) {
		$ucsql = $username ? " AND username<>" . UC::escape($username) : '';
		$count = $this->db->get_value("SELECT COUNT(*) AS sum FROM pw_members WHERE email=" . UC::escape($email) . $ucsql);
		return $count;
	}

	function add($username, $pwd, $email) {
		$this->db->update("INSERT INTO pw_members SET " . UC::sqlSingle(array(
			'username'	=> $username,
			'password'	=> $pwd,
			'email'		=> $email,
			'groupid'	=> 0,
			'regdate'	=> $this->base->time
		)));
		$uid = $this->db->insert_id();
	
		$this->db->update("INSERT INTO pw_memberdata SET " . $this->base->sqlSingle(array(
			'uid'		=> $uid,
			'lastvisit'	=> $this->base->time,
			'thisvisit'	=> $this->base->time,
			'onlineip'	=> $this->base->onlineip
		)));
		return $uid;
	}

	function delete($uids) {
		if ($uids) {
			$this->db->update("DELETE FROM pw_members WHERE uid IN (" . UC::implode($uids) . ')');
			return $this->db->affected_rows();
		}
		return 0;
	}

	function edit($uid, $username, $pwd, $email) {
		$user  = $this->get_by_uid($uid);
		$ucsql = array();
		$retv  = 0;
		if ($username && $user['username'] != $username) {
			$ucsql['username'] = $username;
			$retv++;
		}
		if ($pwd && $user['password'] != $pwd) {
			$ucsql['password'] = $pwd;
		}
		if ($email && $user['email'] != $email) {
			$ucsql['email'] = $email;
		}
		if ($ucsql) {
			$retv++;
			$this->db->update("UPDATE pw_members SET " . UC::sqlSingle($ucsql) . ' WHERE uid=' . UC::escape($uid));
		}
		return $retv;
	}
	
	function get_by_maxuid() {
		$arr = $this->db->get_one("SELECT uid FROM pw_members ORDER BY uid DESC LIMIT 0,1");
		return $arr;
	}
	function update_increment($id){
		$sql = "ALTER TABLE ".UC_DBTABLEPRE."members AUTO_INCREMENT=".($id+1);
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	function db_siteid(){
		$sql = "select db_value from pw_config where db_name='db_siteid' limit 0,1";
		$res = $this->db->get_one($sql);
		return $res['db_value'];
	}
}
?>