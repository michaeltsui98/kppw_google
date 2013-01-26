<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );

/**
 * �û���¼����
 * 
 * @author Michael
 * @version 3.0
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
	 * @var ��¼��¼��ʱ�䵥λ��
	 */
	protected $_remember_day = 14;
	/**
	 *
	 * @var Ĭ�ϲ��ǵ�¼״̬
	 */
	protected $_remember_me = FALSE;
	
	/**
	 *
	 * @var ��¼ʵ��
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
	 * ����ϵͳ
	 */
	abstract public function login();

	/**
	 * �ǳ�ϵͳ
	 *
	 * @return boolean
	 */
	abstract public function logout($destroy = FALSE);
	/**
	 * ��¼�˺�
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
	 * ��ס��¼״̬
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
	 * ��ȡ��¼�û�UID
	 * 
	 * @return Ambigous <string, multitype:>
	 */
	function get_user() {
		return $this->_session->get ( 'uid' );
	}
	/**
	 * ��ɵ�¼
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
		//���µ�¼ʱ��
		return (bool)DB::update('witkey_space')->set($columns)->value($values)->where($where)->execute();
	}
	/**
	 * �ж��Ƿ��¼
	 * 
	 * @return boolean
	 */
	function logged_in() {
		return ($this->get_user () !== NULL);
	}

	/**
	 * ��ס��¼״̬
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
	 * �Զ���¼
	 * @return boolean
	 */
	function auto_login(){
 		global $_K;
 		//�Ѿ���¼��
 		if($this->logged_in()){
 			return TRUE;
 		}
 		//��ȡcookie
		$cdata = Cookie::get('remember_me');
		//remember me is NULL 
		if($cdata===NULL){
			return FALSE;
		}
		$c_arr = unserialize(base64_decode($cdata));
		$uid = $c_arr['uid'];
		$username = $c_arr['username'];
		$pwd = DB::select('password')->from('witkey_member')->where("uid='$uid' and username = '$username'")->get_count()->execute();
		//cookie�Ĺؼ�����
		$data = $c_arr['uid'].$c_arr['username'].$pwd.$_SERVER['HTTP_USER_AGENT'];
		//������������֤����ֹα�� 
		$hash = hash_hmac('sha512', $data, ENCODE_KEY);
		
		
		if($hash != $c_arr['hash']){
			return FALSE;
		}
		//ִ�б��صĵ�¼
		
		return $this->complete_login($uid, $username);
		
		
	}
	function clear_session(){
		// ɾ����¼�û��Ự
		$this->_session->delete ( 'uid' );
		$this->_session->delete ( 'username' );
		//ɾ������token ��ֵ
		foreach ($this->_session->as_array() as $k=>$v){
			if(strpos(strtolower($k), '_token')!==FALSE){
				$this->_session->delete($k);
			}
		}
		// �������ɻỰ
		$this->_session->regenerate ();
		Cookie::delete('remember_me');
	}
	
	/**
	 * ��¼�ķ���״̬ 
	 */
	public static $_status = array(
			-1=>'user_not_exists',
			-2=>'password_error',
			-3=>'account_freeze',
			-4=>'account_not_allow',
			-5=>'password_empty',
			-6=>'account_not_active');
	
}
