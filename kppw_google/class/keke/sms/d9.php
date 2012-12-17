<?php
/**
 * 短信发送接口V2.2
 * 三三得九的短信接口
 * @author Michael
 * 2012-10-08
 *
 */
class Keke_sms_d9 extends Keke_sms {
	
    const GATE = 'http://ws.iems.net.cn/GeneralSMS/ws/SmsInterface?wsdl';
	private static $_params;
	public static  $_error;
	
	private static function init_params($mobiles,$content){
		global $_K;
		if(CHARSET=='gbk'){
			$content = Keke::gbktoutf($content);
		}
		self::$_params = array(
				'username'=>$_K['mobile_username'].":admin", //机构代码+账号"
				'password'=>$_K['mobile_password'], 
				'to'=>$mobiles,
				'content'=>$content
		);
	}
	/**
	 * 发送手机短信
	 * @see Keke_sms::send()
	 */
	public function send($mobiles,$content){
		self::init_params($mobiles,$content);
	    $client = new nusoap(self::GATE,true);
		$client->soap_defencoding = 'utf-8';
		$client->decode_utf8 = false;
		$client->xml_encoding = 'utf-8';
		$parameters	= array(self::$_params['username'],self::$_params['password'],'',self::$_params['to'],self::$_params['content'],'','0|0|0|0');
		$str=$client->call('clusterSend',$parameters);
		if (!($err=$client->getError())==null) {
			die("sms send error:".$err);
		}
		
		$obj = simplexml_load_string($str);
		$code = (int)$obj->code;
		if($code){
			return $this->error($code);
		}else{
			throw new Keke_exception($str);
		}
	}
 
	public static function  get_userinfo(){
		self::init_params('', '');
		$client = new nusoap(self::GATE,true);
		$client->soap_defencoding = 'utf-8';
		$client->decode_utf8 = false;
		$client->xml_encoding = 'utf-8';
		
		$parameters	= array(self::$_params['username'],self::$_params['password']);
		$str=$client->call('getUserInfo',$parameters);
		if (!($err=$client->getError())==null) {
			throw new Keke_exception("sms api error:".$err);
		}
		if(CHARSET == 'gbk'){
			$str = Keke::utftogbk($str);
		}
		$obj = simplexml_load_string($str);
		$arr  =Keke::objtoarray($obj);
		$user = array();
		$user['balance'] = (float)$obj->balance;
		$user['price'] =(float) $obj->smsPrice;
		return $user;
	}
	public function error($e){
		$err = array(
				'1000'=>'操作成功',
				'1001'=>'用户不存在或密码出错',
				'1002'=>'用户被停用',
				'1003'=>'余额不足',
				'1004'=>'请求频繁',
				'1005'=>'内容超长',
				'1006'=>'非法手机号码',
				'1007'=>'关键字过滤',
				'1008'=>'接收号码数量过多',
				'1009'=>'帐户过期',
				'1010'=>'参数格式错误',
				'1011'=>'其它错误',
				'1012'=>'数据库繁忙',
				'1013'=>'非法发送时间');
		return $err[$e];
	}
}