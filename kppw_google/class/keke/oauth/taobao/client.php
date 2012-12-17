<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */ 
class Keke_oauth_taobao_client extends Keke_oauth_login{
     private static $_oauth_obj;
     private static $_weibo_obj;
     private static $_access_token;
     const AUTH_URL = "https://oauth.taobao.com/authorize?";
     const TOKEN_URL = "https://oauth.taobao.com/token";
	 
	 public function get_auth_url($url){
	 	$data  = array('client_id'=>self::$_key,
					'response_type'=>'code',
	 				'redirect_uri'=>$url);
	 	return $url = self::AUTH_URL.http_build_query($data,'','&');
	 	 
	 	return self::$_oauth_obj->getAuthorizeURL($url);
	 }
	 public function get_access_token(){
	 	global $ouri;
	 	$code = $_GET['code'];
	 	$ouri = urldecode($ouri);
	 	$postfields= array(
	 			'grant_type'=> 'authorization_code',
	 			'client_id'     => self::$_key,
	 			'client_secret' => self::$_secret,
	 			'code'          => $code,
	 			'redirect_uri'  => $ouri
	 	);
	 	$response_token = Keke::curl_request(self::TOKEN_URL,true,'post',$postfields);
	 	//$response_token = $this->curl(self::TOKEN_URL,$postfields);
	 	$token = json_decode($response_token,true);
	 	
	 	$_SESSION['tabao_token']['access_token'] = $token['access_token'];
	 	$_SESSION['tabao_token']['uid'] = $token['taobao_user_id'];
	 	$_SESSION['tabao_token']['username'] = $token['taobao_user_nick'];
	 	return $token['access_token'];
	 }
	 public function check_login(){
	 	//如果token没有没有值，表示没有通过oauth 认证
	 	if(!$_SESSION['tabao_token']['access_token']){
	 		return FALSE;
	 	}else{
	 		return TRUE;
	 	}
	 }
	 /**
	  * 返回新浪微博用户信息
	  * @see Keke_oauth_weibo::get_login_info()
	  */
	 public function get_login_info(){
	 	if($this->check_login()){
	 	    $uinfo = array('username'=>$_SESSION['tabao_token']['username'],
	 	    		'uid'=>$_SESSION['tabao_token']['uid']);
	 	    
	 	}
	 	if(CHARSET == 'gbk'){
	 		$uinfo = Keke::utftogbk($uinfo);
	 	}

	 	return $uinfo;
	 }
 		public function format_user_info($uinfo){
	 	return array('uid'=>'','username'=>$uinfo['name'],'nick'=>$uinfo['nick'],'email'=>$uinfo['email'],'avatar'=>$uinfo['head']);
	 }
	
 	 function curl($url, $postFields = null)
	 {
	 	$ch = curl_init();
	 	curl_setopt($ch, CURLOPT_URL, $url);
	 	curl_setopt($ch, CURLOPT_FAILONERROR, false);
	 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	 	curl_setopt($ch, CURLOPT_ENCODING, "");
	 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	 
	 	if (is_array($postFields) && 0 < count($postFields))
	 	{
	 		$postBodyString = "";
	 		foreach ($postFields as $k => $v)
	 		{
	 			$postBodyString .= "$k=" . urlencode($v) . "&";
	 		}
	 		unset($k, $v);
	 		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	 		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	 		curl_setopt($ch, CURLOPT_POST, true);
	 		curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
	 	}
	 	$reponse = curl_exec($ch);
	 	if (curl_errno($ch)){
	 		throw new Exception(curl_error($ch),0);
	 	}
	 	else{
	 		$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	 		if (200 !== $httpStatusCode){
	 			throw new Exception($reponse,$httpStatusCode);
	 		}
	 	}
	 	curl_close($ch);
	 	return $reponse;
	 }
	
}