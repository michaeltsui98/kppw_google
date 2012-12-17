<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * Ç°¶Ë¿ØÖÆÆ÷
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-08-30 09:51:34
 */
abstract  class Control_front extends Controller{
	 
	function before(){
	    global $_K; 
		$res = Keke_user_login::instance()->auto_login();
	     	 
	}
	
}
