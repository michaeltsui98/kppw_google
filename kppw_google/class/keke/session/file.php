<?php

defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
 *          2012-10-9
 */
class Keke_session_file extends Keke_session {
	
	/**
	 *
	 * @return string
	 */
	public function id() {
		return session_id ();
	}
	
	/**
	 *
	 * @param string $id
	 *        	session id
	 * @return null
	 */
	protected function _read($id = NULL) {
		$path = S_ROOT . 'data' . DIRECTORY_SEPARATOR . 'session';
		ini_set ( 'session.save_handler', 'files' );
		session_save_path ( $path );
		// Sync up the session cookie with Cookie parameters
		session_set_cookie_params ( $this->_lifetime, Cookie::$_path, Cookie::$_domain, Cookie::$_secure, Cookie::$_httponly );
		
		// Do not allow PHP to send Cache-Control headers
		session_cache_limiter ( FALSE );
		
		// Set the session cookie name
		session_name ( $this->_name );
		
		if ($id) {
			// Set the session id
			session_id ( $id );
		}
		
		// Start the session
		session_start ();
		
		// Use the $_SESSION global for storing data
		$this->_data = & $_SESSION;
		
		return NULL;
	}
	
	/**
	 *
	 * @return string
	 */
	protected function _regenerate() {
		// Regenerate the session id
		session_regenerate_id ();
		
		return session_id ();
	}
	
	/**
	 *
	 * @return bool
	 */
	protected function _write() {
		// Write and close the session
		//session_write_close ();
		
		return TRUE;
	}
	
	/**
	 *
	 * @return bool
	 */
	protected function _restart() {
		// Fire up a new session
		$status = session_start ();
		
		// Use the $_SESSION global for storing data
		$this->_data = & $_SESSION;
		
		return $status;
	}
	
	/**
	 *
	 * @return bool
	 */
	protected function _destroy() {
		// Destroy the current session
		session_destroy ();
		
		// Did destruction work?
		$status = ! session_id ();
		
		if ($status) {
			// Make sure the session cannot be restarted
			Cookie::delete ( $this->_name );
		}
		
		return $status;
	}
}