<?php
/**
 * keke手机短信抽象类
 * @author Michael
 * 2012-10-08
 *
 */
abstract class  Keke_sms {
	/**
	 * @var 默认短信接口
	 */
	public static $default = 'd9';
	/**
	 * 
	 * @var 短信实例
	 */
	public static $instances = array ();
	/**
	 * 
	 * @param string $name 短信接口名称，默认为三三得九,e.g (d9,..)
	 * @return Keke_sms_d9
	 */
	public static function instance($name = null ) {
		if ($name === null) {
			$name = Keke_sms::$default;
		}
		if (isset ( Keke_sms::$instances [$name] )) {
			return Keke_sms::$instances [$name];
		}
		$class = "Keke_sms_{$name}";
		Keke_sms::$instances [$name] = new $class ();
		return Keke_sms::$instances [$name];
	}
	
	/**
	 * 发送短信
	 * @param $mobiles 手机号
	 * @param $content 短信内容
	 */
	abstract public function send($mobiles,$content);
	/**
	 * 错误记录
	 */
	abstract public function error($e);
	
}
