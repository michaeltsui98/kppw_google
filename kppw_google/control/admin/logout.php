<?php   defined ( "IN_KEKE" ) or die ( "Access Denied" );
class Control_admin_logout extends Controller {

	function action_index(){
		//$_SESSION ['uid'] = "";
		$_SESSION ['admin_username'] = "";
		$_SESSION ['admin_uid'] = "";
		$_SESSION ['admin_gid'] = "";
		//$_SESSION ['user_info'] = "";
		
		Cookie::delete('user_login');
		
		$this->request->redirect('/admin');
		
	}
	
	
}