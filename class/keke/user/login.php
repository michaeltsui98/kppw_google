<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );

/**
 * 用户登录基类
 * 
 * @author Michael
 * @version 2.2
 *          2012-11-06
 *         
 */
abstract class Keke_user_login   {
	
	protected $_uid;
	protected $_username;
	protected $_pwd ;

	protected $_session;
 
	/**
	 *
	 * @var 记录登录的时间单位天
	 */
	protected $_remember_day = 14;
	/**
	 *
	 * @var 默认不记登录状态
	 */
	protected $_remember_me = FALSE;
	
	/**
	 *
	 * @var 登录实例
	 */
	public static $_instance = array();
	/**
	 *
	 * @param string $name        	
	 * @return Keke_user_login_keke (keke,uc,pw)
	 */
	public static function instance($name = NULL) {
		global $_K;
		if ($name === NULL) {
			$name =  Keke_user::$_type[$_K ['user_intergration']];
		}
		if (isset ( self::$_instance[$name] )) {
			return self::$_instance[$name];
		}
		$class = "Keke_user_login_" . $name;
		self::$_instance[$name] = new $class ();
		return self::$_instance[$name];
	}
	public function __construct() {
		$this->_session = Keke_session::instance ();
	}
	/**
	 * 登入系统
	 */
	abstract public function login();

	/**
	 * 登出系统
	 *
	 * @return boolean
	 */
	abstract public function logout($destroy = FALSE);
	/**
	 * 登录账号
	 * @param string $username
	 * @return Keke_user_login_keke
	 */
	function set_username($username){
		$this->_username = $username;
		return $this;
	}
 	
	function set_pwd($pwd){
		$this->_pwd = $pwd;
		return $this;
	}
	/**
	 * 记住登录状态
	 * @param bool $var
	 */
	function set_remember_me($var){
		$this->_remember_me = (bool)$var;
		return $this;
	}
	function set_uid($var){
		$this->_uid = (int)$var;
		return $this;
	}
	/**
	 * 获取登录用户UID
	 * 
	 * @return Ambigous <string, multitype:>
	 */
	function get_user() {
		return $this->_session->get ( 'uid' );
	}
	/**
	 * 完成登录
	 * 
	 * @param int $uid        	
	 * @param string $username        	
	 * @return boolean
	 */
	function complete_login($uid, $username) {
		$this->_session->regenerate ();
		$this->_session->set ( 'uid', $uid );
		$this->_session->set ( 'username', $username );
		$columns = array('last_login_time','reg_ip');
		$values = array(time(),Keke::get_ip());
		$where = "uid = '$uid'";
		//更新登录时间
		return (bool)DB::update('witkey_space')->set($columns)->value($values)->where($where)->execute();
	}
	/**
	 * 判断是否登录
	 * 
	 * @return boolean
	 */
	function logged_in() {
		return ($this->get_user () !== NULL);
	}

	/**
	 * 记住登录状态
	 * @param int $uid
	 * @param string $username
	 * @param string $pwd
	 * @param int $login_time
	 * @return bool
	 */
	function remember_me($uid,$username,$pwd){
		if($this->_remember_me===FALSE){
			return FALSE;
		}
		$data = $uid.$username.$pwd.$_SERVER['HTTP_USER_AGENT'];
		$hash = hash_hmac('sha512', $data, ENCODE_KEY);
		$arr = array('uid'=>$uid,'username'=>$username,'hash'=>$hash);
		$c_str = base64_encode(serialize($arr));
		return (bool)Cookie::set('remember_me', $c_str,(int)$this->_remember_day*24*3600);
	}
	/**
	 * 自动登录
	 * @return boolean
	 */
	function auto_login(){
 		global $_K;
 		//已经登录了
 		if($this->logged_in()){
 			return TRUE;
 		}
 		//获取cookie
		$cdata = Cookie::get('remember_me');
		//remember me is NULL 
		if($cdata===NULL){
			return FALSE;
		}
		$c_arr = unserialize(base64_decode($cdata));
		$uid = $c_arr['uid'];
		$username = $c_arr['username'];
		$pwd = DB::select('password')->from('witkey_member')->where("uid='$uid' and username = '$username'")->get_count()->execute();
		//cookie的关键数据
		$data = $c_arr['uid'].$c_arr['username'].$pwd.$_SERVER['HTTP_USER_AGENT'];
		//数据完整性验证，防止伪造 
		$hash = hash_hmac('sha512', $data, ENCODE_KEY);
		
		
		if($hash != $c_arr['hash']){
			return FALSE;
		}
		//执行本地的登录
		
		return $this->complete_login($uid, $username);
		
		
	}
	function clear_session(){
		// 删除登录用户会话
		$this->_session->delete ( 'uid' );
		$this->_session->delete ( 'username' );
		//删除所有token 的值
		foreach ($this->_session->as_array() as $k=>$v){
			if(strpos(strtolower($k), '_token')!==FALSE){
				$this->_session->delete($k);
			}
		}
		// 重新生成会话
		$this->_session->regenerate ();
		Cookie::delete('remember_me');
	}
	/**
	 * 登录的返回状态 
	 */
	public static $_status = array(
			-1=>'user_not_exists',
			-2=>'password_error',
			-3=>'account_freeze',
			-4=>'account_not_allow',
			-5=>'password_empty',
			-6=>'account_not_active');
	
}
