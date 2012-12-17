<?php   defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * 
 * 用户注册
 * @author Michael
 * @version 2.2 2012-11-08
 *
 */
abstract class Keke_user_register {
   
	protected $_username;
	protected $_pwd;
	protected $_email;
	protected $_salt;

	public static $_instance = array();
	 
	/**
	 * 用户注册实例
	 * @param string $name   (keke,uc,pw)
	 * @return Keke_user_register_keke
	 */
	public static function instance($name=NUll){
		global $_K;
		if ($name === NULL) {
			$name =  Keke_user::$_type[$_K ['user_intergration']];
		}
		if(isset(self::$_instance[$name])){
			return self::$_instance[$name];
		}
		$class = 'Keke_user_register_'.$name;
		self::$_instance[$name] = new $class;
		return self::$_instance[$name];
	}
  
	function set_username($var){
		$this->_username = $var;
		return $this;
	}
	function set_pwd($var){
		$this->_pwd = $var;
		return $this;
	}
	function set_email($var){
		$this->_email = $var;
		return $this;
	}
	/**
	 * 完成注册
	 */
	function complete_reg($uid,$username){
		global $_K;
		$columns = array('uid','username','password','salt','sec_code');
		
		$scode = $this->gen_secode($this->_pwd);
		
		$values = array($uid,$username,md5($this->_pwd),$this->_salt,$scode);
		//var_dump($values);die;
		$uid = DB::insert('witkey_member')->set($columns)->value($values)->execute();
		//注册激活判断
		if($_K['allow_reg_action']){
			$status = 3;
			$this->send_active_msg($uid);
		}else{
			$status =1;
			//keke系统才用完成登录，uc与pw 有一个登录请求的通知
			if($_K ['user_intergration']!=2){
				Keke_user_login::instance()->complete_login($uid, $username);
			}
		}
		
		$columns = array('uid','username','email','reg_time','reg_ip','last_login_time','status');
		
		$values = array($uid,$username,$this->_email,time(),Keke::get_ip(),time(),$status);
		
		return (int)DB::insert('witkey_space')->set($columns)->value($values)->execute();
	}
	/**
	 * 发送激活短信
	 * @param int $uid
	 */
	function send_active_msg($uid){
		global $_lang;
		
		$hash_code = hash_hmac('md5', $uid.md5($this->_pwd), ENCODE_KEY);
			
		$title = Keke::$_sys_config['website_name'] . '--' . $_lang['activate_the_account'];
			
		$body = '
			<font color="red">'.Keke::$_sys_config['website_name'].'--'.$_lang['activate_the_account'].'</font><br><br>
			&nbsp;&nbsp;&nbsp;'.$_lang['welcome_you_register'].Keke::$_sys_config['website_name'].$_lang['please_onclick_this_address_activate'].'
			<a href="'.Keke::$_sys_config['website_url'].'/index.php/login/active_email?code='.$hash_code.'&auid='.$uid.'" traget="_blank">
			'.$_lang['onclick_activate_account'].'
			</a>';

		Keke_msg::instance()->to_user($uid)->send_mail($this->_email,$title,$body);
	}
	/**
	 * 激活注册用户
	 */
	function active_reg_user($uid,$code){
		$where = "uid='$uid'";
		$pwd = DB::select('password')->from('witkey_member')->where($where)->get_count()->execute();
		$hash_code = hash_hmac('md5', $uid.$pwd, ENCODE_KEY);
		if($code !== $hash_code){
			//激活连接无效
			return -1;
		}
		return (bool)DB::update('witkey_space')->set(array('status'))->value(array(1))->where($where)->execute();
		
	}
	/**
	 * 生成安全码
	 */
	function gen_secode($str,$salt=NULL){
		if($salt===NULL){
			$this->_salt = Keke::randomkeys(6);
		}else{
			$this->_salt = $salt;
		}
		return hash_hmac('md5', $str, $this->_salt);
	}
	
	function get_salt(){
		return $this->_salt;
	}
	/**
	 * 注册用户信息
	 */
	abstract public function reg();
	
	/**
	 * 检查username
	 * @return -1,用户名不合法-2 用户名敏感了-3用户名已经存在
	 */
	abstract public function check_username($username);
	
	/**
	 * 检查email
	 * @return -4 格式错误,-5已被注册
	 */
	abstract public function check_email($email);
     /**
      * 同步登录
      */	
	abstract public function syn_login($uid);
	/**
	 * get max uid
	 */
	abstract public function get_max_uid();
	/**
	 * 注册返回的状态集
	 */
	public static $_status = array(
			-1=>'name_empty',
			-2=>'name_filter',
			-3=>'name_exists',
			-4=>'email_error',
			-5=>'email_exists',
			-6=>'email_exists',
			);
}