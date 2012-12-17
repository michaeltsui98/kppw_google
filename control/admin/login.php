<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
class Control_admin_login extends Controller {
	 
	
 
	/**
	 * 判断有没有登录，如果登录了，跳到index.php
	 * 如果没有登录跳到初始化登录页面
	 */
	function action_index() {
		global $_K, $_lang;
		// group_id > 0 表示是
		if ($_SESSION ['admin_uid'] and Keke_admin::get_user_roles()) {
			// 已经登录了，跳到首页
			$this->request->redirect('/admin/index');
		} else {
			// 初始化登录页面
			$admin_obj = new Keke_admin ;
			$login_limit = $_SESSION ['login_limit']; // 用户登录限制时间
			$remain_times = $login_limit - time (); // 允许再次登录时差
			$allow_times = $admin_obj->times_limit ();
			require Keke_tpl::template ( 'control/admin/tpl/login' );
		}
	}
	/**
	 * 用户登录
	 */
	function action_login() {
		
		Keke::formcheck ( $_POST ['formhash'] ); 
		$admin_obj = new Keke_admin ;
			// 验证用户与密码不能为空!
			$p = Keke_validation::factory ( $_POST )->rule ( 'user_name', 'Keke_valid::not_empty' )->rule ( 'pass_word', 'Keke_valid::not_empty' );
			if (!$p->check ()) {
				$e = $p->errors ();
				Keke::admin_show_msg ( '系统提示', 'index.php/admin/login', $e, 2, 'warning' );
			}
			
			$user_name = Keke::utftogbk ( $_POST ['user_name'] );
			
			$admin_obj->admin_login ( $_POST ['user_name'], $_POST ['pass_word'], $_POST ['allow_num'], $_POST ['token'] );
		}
	
}
//end
 