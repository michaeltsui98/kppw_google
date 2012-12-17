<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 站内短信
 * 
 * @author Michael
 * @version 2.2
 *          2012-11-02
 *         
 */
class Keke_msg_keke extends Keke_msg {
	
	 
	protected $_userinfo;
	/**
	 * 
	 * @var 模板信息
	 */
	protected $_tpl_info;
	/**
	 * @var 模板变量
	 */
	protected static $_var = array();

	/**
	 * 设定发送模板
	 * 
	 * @param string $msg_type 短信模板代码 (task_pub...)        	
	 * @return Keke_msg_keke
	 */
	function set_tpl($msg_type) {
		self::$_tpl = $msg_type;
		return $this;
	}
	/**
	 * 设定收件人
	 * @param int $uid
	 * @param string $username
	 * @return Keke_msg_keke
	 */
	function to_user($uid) {
		$this->_userinfo = DB::select('uid,username,mobile,email')->from('witkey_space')->where("uid='$uid'")->get_one()->execute();
		self::$_var['{用户名}'] = $this->_userinfo['username'];
		self::$_var['{网站名称}']= Keke::$_sys_config['website_name']; 
		return $this;
	}
	/**
	 * 模板对应的私有变量数组
	 * @param array $val ('{任务名称}'=>'xxxx')
	 * @return Keke_msg_keke
	 */
	function set_var(array $arr){
		self::$_var += $arr;
		$where = "k = '".self::$_tpl."'";
		$this->_tpl_info = DB::select()->from('witkey_msg_tpl')->where($where)->get_one()->execute();
		return $this;
	}
	/**
	 * 发送模板信息
	 * @see Keke_msg::send()
	 */
	function send() {
		
		(bool)$this->_tpl_info['send_msg'] and $this->send_msg();
		(bool)$this->_tpl_info['send_sms'] and $this->send_sms();
		(bool)$this->_tpl_info['send_mail'] and $this->send_mail();
		return TRUE;
	}
	/**
	 * 发送站内信
	 */
	function send_msg($uid=NULL,$title=NULL,$content=NULL){
		if($uid===NULL){
			$uid = $this->_userinfo['uid'];
			$to_uid = NULL;
			$to_username = NULL;
		}else{
			$to_uid = $_SESSION['uid'];
			$to_username = $_SESSION['username'];
		}
		if($content===NULL){
			$content = strtr($this->_tpl_info['msg_tpl'],self::$_var);
		}
		if($title===NULL){
			$title = $this->_tpl_info['desc'];
		}
		$columns = array('uid','to_uid','to_username','title','content','on_time');
		$values = array($uid,$to_uid,$to_username,$title,$content,time());
		return DB::insert('witkey_msg')->set($columns)->value($values)->execute();
		
	}
	/**
	 * 发送手机短信
	 */
	function send_sms($mobile=NULL,$content=NULL){
		if($mobile===NULL){
			$mobile = $this->_userinfo['mobile'];
		}
		if($content===NULL){
			 $content = strtr($this->_tpl_info['sms_tpl'],self::$_var);
		}
		return Keke_sms::instance()->send($mobile, $content);
	}
	/**
	 * 发送邮件
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
		
		return Keke::send_mail($email, $title, $content);
		
	}
}
 