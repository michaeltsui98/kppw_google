<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 3.0
   2012-10-9
 */
require_once S_ROOT.'client/weibo/ten/Tencent.php';


class Keke_oauth_ten_client extends Keke_oauth_login{
     private static $_oauth_obj;
     private static $_weibo_obj;
     private static $_access_token;
     
	 function __construct(){
	 	 OAuth::init(self::$_key, self::$_secret); //new SaeTOAuthV2(self::$_key, self::$_secret);
 	 }
	 public function get_auth_url($url){
	 	return  OAuth::getAuthorizeURL($url); // self::$_oauth_obj->getAuthorizeURL($url);
	 }
	 public function get_access_token(){
	 	global $ouri;
	 	$code = $_GET['code'];
	 	$openid = $_GET['openid'];
	 	$openkey = $_GET['openkey'];
	 	$url = OAuth::getAccessToken($code, $ouri);
	 	$r = Http::request($url);
	 	parse_str($r, $out);
	 	$s = array();
	 	//�洢��Ȩ����
	 	if ($out['access_token']) {
	 		$s['access_token'] = $out['access_token'];
	 		$s['refresh_token'] = $out['refresh_token'];
	 		$s['expire_in'] = $out['expire_in'];
	 		$s['code'] = $code;
	 		$s['openid'] = $openid;
	 		$s['openkey'] = $openkey;
	 		$_SESSION['ten_token'] = $s;
	 	}
	 	return $s['access_token'];
	 }
	 public function check_login(){
	 	//���tokenû��û��ֵ����ʾû��ͨ��oauth ��֤
	 	if(!$_SESSION['ten_token']['access_token']){
	 		return FALSE;
	 	}else{
	 		return TRUE;
	 	}
	 }
	 /**
	  * ������Ѷ΢���û���Ϣ
	  * @see Keke_oauth_weibo::get_login_info()
	  *  'head' => string 'http://app.qlogo.cn/mbloghead/93373da53594fed9410c' (length=50)
         'name' => string 'michaeltsui98' (length=13)
         'nick' => string '��Ž�' (length=6)
         'email' => string '' (length=0)
	  */
	 public function get_login_info(){
	 	if($this->check_login()){
	 		//Tencent::$debug = true;
	 	    $r = Tencent::api('user/info');
	 	    $uinfo = (json_decode($r, true));
	 	}else{
	 		return FALSE;
	 	}
	 	if(CHARSET == 'gbk'){
	 		$uinfo = Keke::utftogbk($uinfo);
	 	}
	 
	 	$uinfo = $this->format_user_info($uinfo['data']);
	 	return $uinfo;
	 }
	 /**
	  * �û���Ϣ��ʽ��
	  */
	 public function format_user_info($uinfo){
	 	return array('uid'=>'','username'=>$uinfo['name'],'nick'=>$uinfo['nick'],'email'=>$uinfo['email'],'avatar'=>$uinfo['head'].'/100');
	 }
	
}