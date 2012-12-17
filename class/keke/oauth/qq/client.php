<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */

class Keke_oauth_qq_client extends Keke_oauth_login{
     private static $_oauth_obj;
     private static $_weibo_obj;
     private static $_access_token;
     //登陆地址
     const AUTH_URL = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=%d&redirect_uri=%s&state=%s&scope=%s"; 
     //access_token
     const REQUEST_TOKEN_URL = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=%d&redirect_uri=%s&client_secret=%s&code=%s";
     //open_id
     const OPEN_ID_URL = "https://graph.qq.com/oauth2.0/me?access_token=%s";
	 //可进行授权的列表
     const SCOPE = "get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo";
     
 
	 public function get_auth_url($url){
	 	return $uri = sprintf(self::AUTH_URL,self::$_key,$url,FORMHASH,self::SCOPE);
	 }
	 public function get_access_token(){
	 	global $ouri;
	 	$code = $_GET['code'];
	 	//csrf
	 	if($_GET['state'] == FORMHASH){
	 		$token_url = sprintf(self::REQUEST_TOKEN_URL,self::$_key,$ouri,self::$_secret,$code);
	 		 
	 		$response = Keke::curl_request($token_url,true);
	 		if (strpos($response, "callback") !== false){
	 			$lpos = strpos($response, "(");
	 			$rpos = strrpos($response, ")");
	 			$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
	 			$msg = json_decode($response);
	 			if (isset($msg->error))
	 			{
	 				echo "<h3>error:</h3>" . $msg->error;
	 				echo "<h3>msg  :</h3>" . $msg->error_description;
	 				exit;
	 			}
	 		}
	 	
	 		$params = array();
	 		//string to array
	 		parse_str($response, $params);
	 	
	 		//debug
	 		//print_r($params);
	 	   
	 		//set access token to session
	 		$_SESSION['qq_token']["access_token"] = $params["access_token"];
	 	
	 	}else{
	 		exit("The state does not match. You may be a victim of CSRF.");
	 	}
        $this->get_open_id();
	 	//return $msg->access_token;
	 }
	 public function get_open_id(){
	 	$graph_url = sprintf(self::OPEN_ID_URL,$_SESSION['qq_token']['access_token']);
	 	$str  = Keke::curl_request($graph_url);
	 	if (strpos($str, "callback") !== false)
	 	{
	 		$lpos = strpos($str, "(");
	 		$rpos = strrpos($str, ")");
	 		$str  = substr($str, $lpos + 1, $rpos - $lpos -1);
	 	}
	 	
	 	$user = json_decode($str);
	 	if (isset($user->error))
	 	{
	 		echo "<h3>error:</h3>" . $user->error;
	 		echo "<h3>msg  :</h3>" . $user->error_description;
	 		exit;
	 	}
	 	
	 	//debug
	 	//echo("Hello " . $user->openid);
	 	
	 	//set openid to session
	 	$_SESSION['qq_token']["openid"] = $user->openid;
	 }
	 public function check_login(){
	 	//如果token没有没有值，表示没有通过oauth 认证
	 	if(!$_SESSION['qq_token']['openid']){
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
	 		$get_user_info = "https://graph.qq.com/user/get_user_info?"
	 				. "access_token=" . $_SESSION['qq_token']['access_token']
	 				. "&oauth_consumer_key=" . self::$_key
	 				. "&openid=" . $_SESSION['qq_token']["openid"]
	 				. "&format=json";
	 		
	 		$info = Keke::curl_request($get_user_info);
	 		$uinfo = json_decode($info, true);
	 		
	 	}
	 	if(CHARSET == 'gbk'){
	 		$uinfo = Keke::utftogbk($uinfo);
	 	}
	 	$uinfo = $this->format_user_info($uinfo);
	 	return $uinfo;
	 }
 	public function format_user_info($uinfo){
 		return array('uid'=>'','username'=>$uinfo['nickname'],'nick'=>'','email'=>'','avatar'=>$uinfo['figureurl']);
	 }
	public function do_post($url, $data){
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	    curl_setopt($ch, CURLOPT_POST, TRUE); 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    $ret = curl_exec($ch);
	
	    curl_close($ch);
	    return $ret;
	}
	
}
