<?php   defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * 
 * �û�ע��
 * @author Michael
 * @version 3.0 2012-11-08
 *
 */
abstract class Keke_user_register {
   
	protected $_username;
	protected $_pwd;
	protected $_email;
	protected $_salt;

	public static $_instance = array();
	 
	/**
	 * �û�ע��ʵ��
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
	 * ���ע��
	 */
	function complete_reg($uid,$username){
		global $_K;
		$columns = array('uid','username','password','salt','sec_code');
		
		$scode = $this->gen_secode($this->_pwd);
		
		$values = array($uid,$username,md5($this->_pwd),$this->_salt,$scode);
		//var_dump($values);die;
		$uid = DB::insert('witkey_member')->set($columns)->value($values)->execute();
		//ע�ἤ���ж�
		if($_K['allow_reg_action']){
			$status = 3;
			$this->send_active_msg($uid);
		}else{
			$status =1;
			//kekeϵͳ������ɵ�¼��uc��pw ��һ����¼�����֪ͨ
			if($_K ['user_intergration']!=2){
				Keke_user_login::instance()->complete_login($uid, $username);
			}
		}
		
		$columns = array('uid','username','email','reg_time','reg_ip','last_login_time','status','buyer_level','seller_level');
		
		$values = array($uid,$username,$this->_email,time(),Keke::get_ip(),time(),$status,1,1);
		
		//������֤��¼��
		DB::insert('witkey_member_auth')->set(array('uid'))->value(array($uid))->execute();
		
		return (int)DB::insert('witkey_space')->set($columns)->value($values)->execute();
	}
	/**
	 * ���ͼ������
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
	 * ����ע���û�
	 */
	function active_reg_user($uid,$code){
		$where = "uid='$uid'";
		$pwd = DB::select('password')->from('witkey_member')->where($where)->get_count()->execute();
		$hash_code = hash_hmac('md5', $uid.$pwd, ENCODE_KEY);
		if($code !== $hash_code){
			//����������Ч
			return -1;
		}
		//������
		$sql = "replace into `:keke_witkey_auth_email`\n".
				"(uid,username,email,auth_time,auth_status)\n".
				"values\n".
				"(:uid,:username,:email,:auth_time,:auth_status) ";
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')
		->parameters(array(':uid'=>$uid,':username'=>$this->_username,
		':email'=>$this->_email,':auth_time'=>SYS_START_TIME,':auth_status'=>1))
		->execute();
		//����״̬״̬
		return (bool)DB::update('witkey_space')->set(array('status'))->value(array(1))->where($where)->execute();
	}
	/**
	 * ���ɰ�ȫ��
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
	 * ע���û���Ϣ
	 */
	abstract public function reg();
	
	/**
	 * ���username
	 * @return -1,�û������Ϸ�-2 �û���������-3�û����Ѿ�����
	 */
	abstract public function check_username($username);
	
	/**
	 * ���email
	 * @return -4 ��ʽ����,-5�ѱ�ע��
	 */
	abstract public function check_email($email);
     /**
      * ͬ����¼
      */	
	abstract public function syn_login($uid);
	/**
	 * get max uid
	 */
	abstract public function get_max_uid();
	/**
	 * ע�᷵�ص�״̬��
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