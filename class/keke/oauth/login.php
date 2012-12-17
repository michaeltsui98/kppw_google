<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-9
 */
abstract  class Keke_oauth_login {
	public static $_key;
	public static $_secret;
	public static $default = 'sina';
	public static $instances = array ();
    /**
     * 创建一个微博接口的实例
     * @param string $name   e.g: sina,ten,qq
     * @return Keke_oauth_sina_client
     */
	public static function instance($name = null ) {
		global $_K;
		if ($name === null) {
			$name = Keke_oauth_login::$default;
		}
		if (isset ( Keke_oauth_login::$instances [$name] )) {
			return Keke_oauth_login::$instances [$name];
		}
		$class = "Keke_oauth_{$name}_client";
		self::$_key = $_K[$name.'_app_id'];
		self::$_secret = $_K[$name.'_app_secret'];
		Keke_oauth_login::$instances [$name] = new $class ();
		return Keke_oauth_login::$instances [$name];
	}
	
	/**
	 * 获取认证登录的接口地址
	 * @param redirect_uri $url  登录成功后的uri
	 * @return string 登录的地址
	 */
	abstract  public function get_auth_url($url);
	
	abstract  public function get_access_token();
	
	abstract  public  function get_login_info();
	/**
	 * 格式化oauth 登录 的用户信息
	 * @return array  uid,username,nick,email,avatar
	 */
	abstract public function format_user_info($uinfo);
	
	
	
}

 