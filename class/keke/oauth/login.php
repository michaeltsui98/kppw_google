<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *
 * @author Michael
 * @version 3.0
   2012-10-9
 */
abstract  class Keke_oauth_login {
	public static $_key;
	public static $_secret;
	public static $default = 'sina';
	public static $instances = array ();
    /**
     * ����һ��΢���ӿڵ�ʵ��
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
	 * ��ȡ��֤��¼�Ľӿڵ�ַ
	 * @param redirect_uri $url  ��¼�ɹ����uri
	 * @return string ��¼�ĵ�ַ
	 */
	abstract  public function get_auth_url($url);
	
	abstract  public function get_access_token();
	
	abstract  public  function get_login_info();
	/**
	 * ��ʽ��oauth ��¼ ���û���Ϣ
	 * @return array  uid,username,nick,email,avatar
	 */
	abstract public function format_user_info($uinfo);
	
	
	
}

 