<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */
require_once S_ROOT.'client/weibo/sohu/SohuOAuth.php';


class Keke_oauth_sohu_client extends Keke_oauth_login{
     private static $_oauth_obj;
     private static $_weibo_obj;
     private static $_access_token;
     
	 function __construct(){
	 	if(self::$_oauth_obj==NULL){
	 		self::$_oauth_obj = new SohuOAuth(self::$_key, self::$_secret);
	 	}
 	 }
	 public function get_auth_url($url){
	 	//请求token
	 	$request_token = self::$_oauth_obj->getRequestToken($url);
	 	$_SESSION['sohu']['oauth_token'] = $token = $request_token['oauth_token'];
	 	$_SESSION['sohu']['oauth_token_secret'] = $request_token['oauth_token_secret'];
	 	//返回认证地址
	 	return self::$_oauth_obj->getAuthorizeUrl1($token, $url);
	 }
	 public function get_access_token(){
	 	$code = $_GET['oauth_verifier'];
	 	//$code 用户授权后产生的认证码,返回访问token s array("oauth_token" => "the-access-token", "oauth_token_secret" => "the-access-secret", "user_id" => "9436992", "screen_name" => "abraham") 
	 	self::$_oauth_obj = new SohuOAuth(self::$_key, self::$_secret,$_SESSION['sohu']['oauth_token'],$_SESSION['sohu']['oauth_token_secret']);
	 	//官方的方法注释是错误的，返回的结果与注释不一致要注意
	 	$token = self::$_oauth_obj->getAccessToken($code);
	 	$_SESSION['sohu_token']['access_token'] = $token['oauth_token'];
	 	$_SESSION['sohu_token']['oauth_token_secret'] = $token['oauth_token_secret'];
	 	return $token['access_token'];
	 }
	 public function check_login(){
	 	//如果token没有没有值，表示没有通过oauth 认证
	 	if(!$_SESSION['sohu_token']['access_token']){
	 		return FALSE;
	 	}else{
	 		return TRUE;
	 	}
	 }
 
	 /**
	  * 返回搜狐微博用户信息
	  * @see Keke_oauth_weibo::get_login_info()
	  * @return  array (size=28)
  'id' => string '236964765' (length=9)
  'screen_name' => string '徐九江' (length=6)
  'name' => string '' (length=0)
  'location' => string '北京市,海淀区' (length=13)
  'description' => string '' (length=0)
  'url' => string '' (length=0)
  'gender' => string '1' (length=1)
  'profile_image_url' => string 'http://s4.cr.itc.cn/i/3/avt48.png' (length=33)
 	*/
	 public function get_login_info(){
	 	if($this->check_login()){
	 		//获取当前的用户信息
	 		$url = 'http://api.t.sohu.com/users/show.json';
	 		self::$_oauth_obj = new SohuOAuth(self::$_key, self::$_secret,$_SESSION['sohu_token']['access_token'],$_SESSION['sohu_token']['oauth_token_secret']);
	 		$uinfo =self::$_oauth_obj->get($url);
	 	}
	 	if(CHARSET == 'gbk'){
	 		$uinfo = Keke::utftogbk($uinfo);
	 	}
	 	$uinfo = $this->format_user_info($uinfo);
	 	return $uinfo;
	 }
	 public function format_user_info($uinfo){
	 	return array('uid'=>$uinfo['id'],'username'=>$uinfo['screen_name'],'nick'=>$uinfo['name'],'email'=>'','avatar'=>$uinfo['profile_image_url']);
	 }
	
}