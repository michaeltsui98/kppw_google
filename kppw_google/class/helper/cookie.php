<?php  defined ( 'IN_KEKE' ) or die ( 'Access Dinied' );
class Cookie {
	public static $_pre = COOKIE_PRE;
	public static $_expiration = COOKIE_TTL;
	public static $_path = COOKIE_PATH;
	public static $_domain = COOKIE_DOMAIN;
	public static $_secure = FALSE;
	public static $_httponly = TRUE;
	public static $_salt = ENCODE_KEY;
	public static function get($key, $default = NULL) {
		//前缀+key = 实际的KEY
		$key = self::$_pre . $key;
		//key不存在，返回空
		if (! isset ( $_COOKIE [$key] )) {
			return $default;
		}
		//cookie 的值
		$cookie = $_COOKIE[$key];
		//找出加密友与内容的分隔符
		$split = strlen(Cookie::salt($key, NULL));
		if (isset($cookie[$split]) AND $cookie[$split] === '~'){
			//分隔hash与value
			list ($hash, $value) = explode('~', $cookie, 2);
		    //将内容生成salt 再与hash比对
			if (Cookie::salt($key, $value) === $hash){
				// 有效的cookie值
				return $value;
			}
			// 验证无效，删除这个cookie 
			Cookie::delete($key);
		}
	    //返回默认值	
		return $default;
	}
	public static function set($name, $value, $expiration = NULL) {
		if ($expiration === NULL) {
			$expiration = Cookie::$_expiration;
		}
		if ($expiration !== 0) {
			$expiration += time ();
		}
		// 添加salt到cookie 的值中
		$name = self::$_pre.$name;
		$value = Cookie::salt($name, $value).'~'.$value;
		return setcookie ( $name, $value, $expiration, self::$_path, self::$_domain, self::$_secure, self::$_httponly );
	}
	public static function delete($name) {
		$name = self::$_pre.$name;
		//移除cookie 中的值
		unset ( $_COOKIE [$name] );
		//设置cookie 过期
		return setcookie ( $name, NULL, - 86400, self::$_path, self::$_domain, self::$_secure, self::$_httponly );
	}
	public static function salt($name, $value){
		// 验证salt值
		if ( ! Cookie::$_salt){
			throw new Keke_exception('salt not empty,plase set salt');
		}
		// 确定用户代码
		$agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : 'unknown';
		return sha1($agent.$name.$value.Cookie::$_salt);
	}
}