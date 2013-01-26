<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * �û�����
 * @author michael
 * @version 3.0 
 * 2012-11-6
 *
 */
abstract class Keke_user {
 	
	/**
	 *
	 * @var �û�ʵ��
	 */
	public static $_instance = array();
	/**
	 *
	 * @var ��������
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
	 * ��ȡ�û���Ϣ��Ĭ�Ϸ���������Ϣ
	 * @param int $uid
	 * @param string $fields ָ�����û���Ϣ 
	 */
	abstract public function get_user_info($uid,$fields='*',$isuid = 1);
	/**
	 *  ɾ��kekeϵͳ���û���������Ϣ
	 * @param int $uid
	 */
	abstract public function del_user($uid);
	/**
	 * ��ȡ�û�ͷ��
	 * @param int $uid
	 * @param string $size (big,middle,small)
	 */
	abstract public function get_avatar($uid,$size='middle');
	/**
	 * �û�ͷ���ϴ�flash
	 * @param unknown $uid
	 */
	abstract public function avatar_flash($uid);
	
	public static function check_login(){
		if(Keke_user_login::instance()->logged_in()===FALSE){
			Cookie::set('last_page', Keke_Request::current()->uri());
			Keke_Request::current()->redirect('login');
		}
	}

}
