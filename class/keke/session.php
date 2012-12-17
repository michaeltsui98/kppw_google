<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */

abstract class Keke_session{
 
	public static $default = 'file';
 
	public static $instances = array();
	/**
	 * Session 的单例
	 * @param string  $type (file,mysql,memcache ...)
	 * @param String $id (Session id);
	 * @return keke_session
	 */
	public static function instance($type = NULL, $id = NULL){
		if ($type === NULL){
			$type = Keke_session::$default;
		}
		if ( ! isset(Keke_session::$instances[$type])){
			// 定义Session类的名称
			$class = 'Keke_session_'.$type;
			// 创建一个新的Session类的实例
			Keke_session::$instances[$type] = $session = new $class($id);
			// 写完Session后，关掉Session 实例
			register_shutdown_function(array($session, 'write'));
		}
		return Keke_session::$instances[$type];
	}
	
	/**
	 * @var  string  cookie name
	 */
	protected $_name = 'session';
	
	/**
	 * @var  int  cookie lifetime
	 */
	protected $_lifetime = 0;
	
	/**
	 * @var  bool  encrypt session data?
	 */
	protected $_encrypted = FALSE;
	
	/**
	 * @var  array  session data
	 */
	protected $_data = array();
	
	/**
	 * @var  bool  session destroyed?
	*/
	protected $_destroyed = FALSE;
	
	/**
	 * Overloads the name, lifetime, and encrypted session settings.
	 *
	 * [!!] Sessions can only be created using the [Session::instance] method.
	 *
	 * @param   string  session id
	 * @return  void
	 * @uses    Session::read
	 */
	public function __construct( $id = NULL){
			// Load the session
		$this->_lifetime = get_cfg_var ( "session.gc_maxlifetime" );
		$this->read($id);
	}
	public function __toString(){
		// Serialize the data array
		$data = serialize($this->_data);
		// Obfuscate the data with base64 encoding
		$data = base64_encode($data);
		return $data;
	}
	public function & as_array(){
		return $this->_data;
	}
	public function name(){
		return $this->_name;
	}
	public function get($key, $default = NULL){
		return array_key_exists($key, $this->_data) ? $this->_data[$key] : $default;
	}
	
	/**
	 * Get and delete a variable from the session array.
	 *
	 *     $bar = $session->get_once('bar');
	 *
	 * @param   string  variable name
	 * @param   mixed   default value to return
	 * @return  mixed
	 */
	public function get_once($key, $default = NULL){
		$value = $this->get($key, $default);
	
		unset($this->_data[$key]);
	
		return $value;
	}
	
	/**
	 * Set a variable in the session array.
	 *
	 *     $session->set('foo', 'bar');
	 *
	 * @param   string   variable name
	 * @param   mixed    value
	 * @return  $this
	 */
	public function set($key, $value){
		$this->_data[$key] = $value;
		return $this;
	}
	
	/**
	 * Set a variable by reference.
	 *
	 *     $session->bind('foo', $foo);
	 *
	 * @param   string  variable name
	 * @param   mixed   referenced value
	 * @return  $this
	 */
	public function bind($key, & $value)
	{
		$this->_data[$key] =& $value;
	
		return $this;
	}
	
	/**
	 * Removes a variable in the session array.
	 *
	 *     $session->delete('foo');
	 *
	 * @param   string  variable name
	 * @param   ...
	 * @return  $this
	 */
	public function delete($key)
	{
		$args = func_get_args();
	
		foreach ($args as $key)
		{
			unset($this->_data[$key]);
		}
	
		return $this;
	}
	
	/**
	 * Loads existing session data.
	 *
	 *     $session->read();
	 *
	 * @param   string   session id
	 * @return  void
	 */
	public function read($id = NULL)
	{
		$data = NULL;
	
		try
		{
			if (is_string($data = $this->_read($id)))
			{
				// Decode the base64 encoded data
				$data = base64_decode($data);
				// Unserialize the data
				$data = unserialize($data);
			}
			else
			{
				// Ignore these, session is valid, likely no data though.
			}
		}
		catch (Exception $e)
		{
			// Error reading the session, usually
			// a corrupt session.
			throw new Keke_Exception('Error reading session data.', NULL, 1);
		}
	
		if (is_array($data)){
			// Load the data locally
			$this->_data = $data;
		}
	}
	
	/**
	 * Generates a new session id and returns it.
	 *
	 *     $id = $session->regenerate();
	 *
	 * @return  string
	 */
	public function regenerate()
	{
		return $this->_regenerate();
	}
	
	/**
	 * Sets the last_active timestamp and saves the session.
	 *
	 *     $session->write();
	 *
	 * [!!] Any errors that occur during session writing will be logged,
	 * but not displayed, because sessions are written after output has
	 * been sent.
	 *
	 * @return  boolean
	 * @uses    Keke::$log
	 */
	public function write()
	{
		
		if (headers_sent() OR $this->_destroyed)
		{
			// Session cannot be written when the headers are sent or when
			// the session has been destroyed
			return FALSE;
		}
	
		// Set the last active timestamp
		$this->_data['last_active'] = time();
	
		try
		{
			return $this->_write();
		}
		catch (Exception $e)
		{
			// Log & ignore all errors when a write fails
			Keke::$log->add(Log::ERROR, Keke_exception::text($e))->write();
	
			return FALSE;
		}
	}
	
	/**
	 * Completely destroy the current session.
	 *
	 *     $success = $session->destroy();
	 *
	 * @return  boolean
	 */
	public function destroy()
	{
		if ($this->_destroyed === FALSE)
		{
			if ($this->_destroyed = $this->_destroy())
			{
				// The session has been destroyed, clear all data
				$this->_data = array();
			}
		}
	
		return $this->_destroyed;
	}
	
	/**
	 * Restart the session.
	 *
	 *     $success = $session->restart();
	 *
	 * @return  boolean
	 */
	public function restart()
	{
		if ($this->_destroyed === FALSE)
		{
			// Wipe out the current session.
			$this->destroy();
		}
	
		// Allow the new session to be saved
		$this->_destroyed = FALSE;
	
		return $this->_restart();
	}
	
	/**
	 * Loads the raw session data string and returns it.
	 *
	 * @param   string   session id
	 * @return  string
	 */
	abstract protected function _read($id = NULL);
	
	/**
	 * Generate a new session id and return it.
	 *
	 * @return  string
	*/
	abstract protected function _regenerate();
	
	/**
	 * Writes the current session.
	 *
	 * @return  boolean
	*/
	abstract protected function _write();
	
	/**
	 * Destroys the current session.
	 *
	 * @return  boolean
	*/
	abstract protected function _destroy();
	
	/**
	 * Restarts the current session.
	 *
	 * @return  boolean
	*/
	abstract protected function _restart();
	
}