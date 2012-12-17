<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * keke短信抽象类
 * @author Michael
 * 2012-10-08
 *
 */
abstract class  Keke_msg {
	
	/**
	 * @var 默认接口
	 */
	public static $default = 'keke';
	/**
	 * @var 模板
	 */
	public static $_tpl ;
	/**
	 * @var 实例
	 */
	public static $instances = array ();
	/**
	 * @param string $name 
	 * @return Keke_msg_keke
	 */
	public static function instance($name = null ) {
		if ($name === null) {
			$name = Keke_msg::$default;
		}
		
		if (isset ( Keke_msg::$instances [$name] )) {
			return Keke_msg::$instances [$name];
		}
		$class = "Keke_msg_{$name}";
		Keke_msg::$instances [$name] = new $class ();
		//var_dump(Keke_msg::$instances [$name]);die;
		return Keke_msg::$instances [$name];
	}
	
	abstract public function send();
	
 
}
