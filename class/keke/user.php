<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * 用户基类
 * @author michael
 * @version 2.2 
 * 2012-11-6
 *
 */
abstract class Keke_user {
 	
	/**
	 *
	 * @var 用户实例
	 */
	public static $_instance = array();
	/**
	 *
	 * @var 整合类型
	 */
	public static $_type = array (
			1 => 'keke',
			2 => 'uc',
			3 => 'pw'
	);
	/**
	 *
	 * @param string $name
	 * @return Keke_user_keke (keke,uc,pw)
	*/
	static public  function instance($name=NUll){
		global $_K;
		if ($name === NULL) {
			$name =  Keke_user::$_type[$_K ['user_intergration']];
		}
		if(isset(self::$_instance[$name])){
			return self::$_instance[$name];
		}
		$class = 'Keke_user_'.$name;
		self::$_instance[$name] = new $class;
		return self::$_instance[$name];
	}

	/**
	 * 获取用户信息，默认返回所有信息
	 * @param int $uid
	 * @param string $fields 指定的用户信息 
	 */
	abstract public function get_user_info($uid,$fields='*',$isuid = 1);
	/**
	 *  删除keke系统中用户的所有信息
	 * @param int $uid
	 */
	abstract public function del_user($uid);
	/**
	 * 获取用户头象
	 * @param int $uid
	 * @param string $size (big,middle,small)
	 */
	abstract public function get_avatar($uid,$size='middle');
	/**
	 * 用户头象上传flash
	 * @param unknown $uid
	 */
	abstract public function avatar_flash($uid);

}
