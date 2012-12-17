<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */
require_once S_ROOT.'client/weibo/netease/tblog.class.php';

class Keke_oauth_netease_client extends Keke_oauth_login{
     private static $_oauth_obj;
     private static $_weibo_obj;
     private static $_access_token;
     
	 function __construct(){
	 	if(self::$_oauth_obj==NULL){
	 		self::$_oauth_obj = new OAuth(self::$_key, self::$_secret);
	 	}
 	 }
	 public function get_auth_url($url){
	 	$request_token = self::$_oauth_obj->getRequestToken();
	 	$_SESSION['netease']['oauth_token'] = $request_token['oauth_token'];
	 	$_SESSION['netease']['oauth_token_secret'] = $request_token['oauth_token_secret'];
	 	return self::$_oauth_obj->getAuthorizeURL($request_token['oauth_token'],$url);
	 }
	 public function get_access_token(){
	 	self::$_oauth_obj = new OAuth(self::$_key, self::$_secret,$_SESSION['netease']['oauth_token'],$_SESSION['netease']['oauth_token_secret']);
	 	$token = self::$_oauth_obj->getAccessToken($_GET['oauth_token']);
	 	$_SESSION['netease_token']['access_token'] = $token['oauth_token'];
	 	$_SESSION['netease_token']['access_token_secret'] = $token['oauth_token_secret'];
	 	return $token['oauth_token'];
	 }
	 public function check_login(){
	 	//如果token没有没有值，表示没有通过oauth 认证
	 	if(!$_SESSION['netease_token']['access_token']){
	 		return FALSE;
	 	}else{
	 		return TRUE;
	 	}
	 }
	 /**
	  * 返回新浪微博用户信息
	  * @see Keke_oauth_weibo::get_login_info()
	  * @return 'following' => boolean false
  'blocking' => boolean false
  'followed_by' => boolean false
  'name' => string '无名qq' (length=6)
  'location' => string '' (length=0)
  'id' => string '9171245258049501663' (length=19)
  'description' => string '' (length=0)
  'email' => string 'xujiangchun@163.com' (length=19)
  'gender' => string '0' (length=1)
  'verified' => boolean false
  'url' => string '' (length=0)
  'created_at' => string 'Sat Jun 19 16:57:33 +0800 2010' (length=30)
  'profile_image_url' => string 'http://oimagea7.ydstatic.com/image?w=48&h=48&url=http%3A%2F%2Fimg1.cache.netease.com%2Ft%2Fimg%2Fdefault80.png' (length=110)
  'screen_name' => string 'xujiangchun' (length=11)
	  */
	 public function get_login_info(){
	 	if($this->check_login()){
	 	    self::$_weibo_obj = new TBlog(self::$_key, self::$_secret, $_SESSION['netease_token']['access_token'], $_SESSION['netease_token']['access_token_secret']);
	 	    $uinfo = self::$_weibo_obj->show_user_id('');
	 	}
	 	if(CHARSET == 'gbk'){
	 		$uinfo = Keke::utftogbk($uinfo);
	 	}
	 	return $uinfo;
	 }
	 public function format_user_info(){
	 	
	 }
	
}