<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * Ç°¶Ë¿ØÖÆÆ÷
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-08-30 09:51:34
 */
abstract  class Control_front extends Controller{
	 
	protected  static $uid =NULL;
	function before(){
		parent::before();
		$this->check_web_close();
		self::$uid = $_SESSION['uid'];
		
	}
	
	/**
	 * ÅÐ¶ÏÍøÕ¾ÊÇ·ñ¹Ø±Õ
	 */
	function check_web_close(){
		if (!Keke_valid::not_empty($_SESSION['admin_uid']) and Keke::$_sys_config ['is_close'] == 1) {
			require Keke_tpl::template('close');
			die;
		}
	}
}
