<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * վ�ڶ���
 * 
 * @author Michael
 * @version 3.0
 *          2012-11-02
 *         
 */
class Keke_msg_keke extends Keke_msg {
	
	 
	protected $_userinfo;
	/**
	 * 
	 * @var ģ����Ϣ
	 */
	protected $_tpl_info;
	/**
	 * @var ģ�����
	 */
	protected static $_var = array();

	/**
	 * �趨����ģ��
	 * 
	 * @param string $msg_type ����ģ����� (task_pub...)        	
	 * @return Keke_msg_keke
	 */
	function set_tpl($msg_type) {
		self::$_tpl = $msg_type;
		$where = "k = '".self::$_tpl."'";
		$this->_tpl_info = DB::select()->from('witkey_msg_tpl')->where($where)->get_one()->execute();
		if(!Keke_valid::not_empty($this->_tpl_info)){
			throw new Keke_exception('ģ�����Ʋ����� �������ƣ� :tpl',array(':tpl'=>$msg_type));
		}
		return $this;
	}
	/**
	 * �趨�ռ���
	 * @param int $uid
	 * @param string $username
	 * @return Keke_msg_keke
	 */
	function to_user($uid) {
		$this->_userinfo = DB::select('uid,username,mobile,email')->from('witkey_space')->where("uid='$uid'")->get_one()->execute();
		self::$_var['{�û���}'] = $this->_userinfo['username'];
		self::$_var['{��վ����}']= Keke::$_sys_config['website_name']; 
		return $this;
	}
	/**
	 * ģ���Ӧ��˽�б�������
	 * @param array $val ('{��������}'=>'xxxx')
	 * @return Keke_msg_keke
	 */
	function set_var(array $arr){
		self::$_var += $arr;
		
		return $this;
	}
	/**
	 * ����ģ����Ϣ
	 * @see Keke_msg::send()
	 */
	function send() {
		
		(bool)$this->_tpl_info['send_msg']  and $this->send_msg();
		((bool)$this->_tpl_info['send_sms'] and Keke_valid::phone($this->_userinfo['mobile'],11)) and $this->send_sms();
		((bool)$this->_tpl_info['send_mail'] and Keke_valid::email($this->_userinfo['email'])) and $this->send_mail();
		return TRUE;
	}
	/**
	 * ����վ����
	 */
	function send_msg($uid=NULL,$title=NULL,$content=NULL){
		if($uid===NULL){
			$to_uid = $this->_userinfo['uid'];
			$to_username = $this->_userinfo['username'];
		}else{
			$to_uid = $uid;//�ռ�id
			$user_username = Keke_user::instance()->get_user_info($to_uid,'username',1);
			$to_username = $user_username['username'];//�ռ�id
			
		}
		$uid = $_SESSION['uid'];
		$username  = $_SESSION['username'];
		
		if($content===NULL){
			$content = strtr($this->_tpl_info['msg_tpl'],self::$_var);
		}
		if($title===NULL){
			$title = $this->_tpl_info['desc'];
		}
		$columns = array('uid','username','to_uid','to_username','title','content','on_time');
		$values = array($uid,$username,$to_uid,$to_username,$title,$content,time());
		return DB::insert('witkey_msg')->set($columns)->value($values)->execute();
		
	}
	/**
	 * �����ֻ�����
	 */
	function send_sms($mobile=NULL,$content=NULL){
		if($mobile===NULL){
			$mobile = $this->_userinfo['mobile'];
		}
		if($content===NULL){
			 $content = strtr($this->_tpl_info['sms_tpl'],self::$_var);
		}
		register_shutdown_function(array(Keke_sms::instance(),'send'),$mobile, $content);
		Keke::async_request();
	}
	/**
	 * �����ʼ�
	 */
	function send_mail($email=NULL,$title=NULL,$content=NULL){
		if($email===NULL){
			$email = $this->_userinfo['email'];
		}
		if($content===NULL){
			$content = strtr($this->_tpl_info['msg_tpl'],self::$_var);
		}
		if($title===NULL){
			$title = $this->_tpl_info['desc'];
		}
		register_shutdown_function(array(Keke,'send_mail'),$email,$title,$content);
		Keke::async_request(); 
		
	}
}
 