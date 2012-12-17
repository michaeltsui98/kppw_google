<?php
/**
 * 短信发送接口V2.0
 * @author Chen tao
 *
 */
class Keke_sms_ot extends Keke_sms{
	const GATEWAY="http://59.42.249.36/sms/http/Sms3.aspx?";
	static $charset = "utf-8";
	protected $_method;
	private $_action;
	private $_params;
	public $_error;
	
	public function __construct($mobiles,$content,$action='sendsms',$method="post"){
		$this->_action = $action;
		$this->_method = strtolower($method);
		$this->init_params($mobiles,$content);
	}
	private function init_params($mobiles,$content){
		strtolower(CHARSET)==self::$charset or $content = Keke::gbktoutf($content);
		$this->_params = array(
				'action'=>$this->_action,
				'username'=>Keke::$_sys_config['mobile_username'],
				'userpwd'=>Keke::$_sys_config['mobile_password'],
				'timing'=>'',
				'mobiles'=>$mobiles,
				'content'=>$content
		);
	}
	public function send(){
		$url = self::GATEWAY;
		$q   = http_build_query($this->_params);
		if(function_exists("curl_init")){
			$this->_method=='get' and $url.=$q;
			$m	 = Keke::curl_request($url,false,$this->_method,$this->_params);
		}elseif(function_exists('fsockopen')){
			$url.=$q;
			$m   = Keke::socket_request($url,false);
		}else{
			$url.=$q;
			$m 	 = file_get_contents($url);
		}
		return $this->error($m);
	}
	public function error($e){
		if($e<0){
			$err = array(
				'-1'=>'用户名或密码错误',
				'-2'=>'余额不足',
				'-3'=>'号码太长，不能超过1000条一次提交',
				'-4'=>'无合法号码',
				'-5'=>'内容包含不合法文字',
				'-6'=>'内容太长',
				'-7'=>'内容为空',
				'-8'=>'定时时间格式不对',
				'-9'=>'修改密码失败',
				'-10'=>'用户当前不能发送短信',
				'-11'=>'Action参数不正确',
				'-100'=>'系统错误'
			);
			if(KEKE_DEBUG){
				$message = array(':e'=>$e,':err'=>$err[$e]);
				Keke::$_log->add(Log::WARNING,"错误码::e,详细::err", $message)->write();
				
			}
		}
		return $e;
	}
}