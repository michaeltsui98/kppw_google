<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */

class Keke_session_mysql extends keke_session{
	public static  $_db;
	
	public function id() {
		return session_id ();
	}
	function __construct() {
		ini_set ( "session.save_handler", "user" );
		session_module_name ( "user" );
		session_set_save_handler ( array (&$this, "_open" ), array (&$this, "_close" ), array (&$this, "_read" ), array (&$this, "_write" ), array (&$this, "_destroy" ), array (&$this, "_gc" ) );
		session_set_Cookie_params($this->_lifetime, Cookie::$_path, Cookie::$_domain, Cookie::$_secure, Cookie::$_httponly);
		session_cache_limiter(false);
		session_start ();
	}
	function _restart(){
		// Fire up a new session
		$status = session_start ();
		
		// Use the $_SESSION global for storing data
		$this->_data = & $_SESSION;
		
		return $status;
	} 
	function _regenerate(){
		session_regenerate_id ();
		return session_id ();
	}
 	function _open($save_path, $sess_name) {
		 
		self::$_db = Database::instance();
		return true;
	}
	function _close() {
		return $this->_gc ( self::$_left_time );
	}
	function _read($session_id) {
		$sql = "select session_data from " . TABLEPRE . "witkey_session where session_id = '$session_id' and session_expirse>" . time ();
		$session_arr = $this->_db->query ( $sql, 1 );
		empty ( $session_arr ) and $session_data = '' or $session_data = $session_arr [0] ['session_data'];
		return $session_data;
	}
	function _write($session_id, $session_data) {
		$tablename = TABLEPRE . "witkey_session";
		if(isset($_SESSION['uid'])){
			$uid = $_SESSION['uid'];
		}else{
			$uid = NULL;
		}
		//$_SESSION ['uid'] > 0 and $uid = $_SESSION ['uid'] or $uid = 0;
		$data_arr = array ('session_id' => $session_id, 'session_data' => $session_data, 'session_expirse' => time () + self::$_left_time, 'session_ip' => Keke::get_ip (), 'session_uid' => $uid );
		return $this->_db->insert ( $tablename, $data_arr, 1, 1 );
		 
	}
	
	function _destroy($session_id) {
		$sql = "delete from " . TABLEPRE . "witkey_session where session_id ='$session_id' ";
		return $this->_db->execute( $sql );
	}
	function _gc($max_left_time) {
		$sql = "delete from " . TABLEPRE . "witkey_session where session_expirse <" . time ();
		return $this->_db->execute ( $sql );
	}
	
}