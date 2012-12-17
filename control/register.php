<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 用户注册
 * @copyright keke-tech
 * @author Michael
 * @version v 2.2 2012-11-06
 */
class Control_register extends Control_front{
	
	function action_index(){
		global $_K;
		$api_open = unserialize($_K['oauth_api_open']);
		$api_name = Keke_global::get_open_api();
 		require Keke_tpl::template('register');
	}
	
	function action_check_username(){
		$username = $_GET['username'];
		$res = Keke_user_register::instance()->check_username($username);
		if($res>0){
			echo TRUE;
		}else{
			echo Keke_user_register::$_status[$res];
		}
	}
	
	function action_check_email(){
		$email = $_GET['email'];
		$res = Keke_user_register::instance()->check_email($email);
		if($res>0){
			echo TRUE;
		}else{
			echo Keke_user_register::$_status[$res];
		}
	}
	/**
	 * 用户注册
	 */
	function action_reg($is_bind=FALSE){
		$_POST = Keke_tpl::chars($_POST);
		Keke::formcheck($_POST['formhash']);
		$username = $_POST['txt_account'];
		$pwd  = $_POST['pwd_password'];
		$email = $_POST['txt_email'];
		$res = Keke_user_register::instance()->set_username($username)->set_pwd($pwd)->set_email($email)->reg();
		
		$msg = '注册成功';
		$t = 'success';
		if($res<0){
			$msg = '注册失败:'.Keke_user_register::$_status[$res];
			$t = 'error';
		}elseif (Keke_valid::numeric($res) and $res>0){
			
		}else{
			$msg .= $res;
		}
		if($is_bind===TRUE and (int)$res>0){
			$u = Keke_oauth_login::instance($_POST['type'])->get_login_info();
			$bind_info = Control_login::check_bind($_POST['type'], $u['username']);
			if(!Keke_valid::not_empty($bind_info)){
				Control_login::user_bind($_POST['type']);
			}
		}
		Keke::show_msg($msg,'register',$t);
	}
	/**
	 * oauth 注册
	 */
	function action_oauth(){
		global $_K;
		$api_open = unserialize($_K['oauth_api_open']);
		$api_name = Keke_global::get_open_api();
		$type = $_GET['type'];
		if(Keke_valid::not_empty($type)){
			$u = Keke_oauth_login::instance($type)->get_login_info();
			//如果这个账号绑定过，则直接登录成功
			$bind_info = Control_login::check_bind($type, $u['username']);
			if(Keke_valid::not_empty($bind_info)){
				Keke_user_login::instance()->complete_login($bind_info['uid'], $bind_info['username']);
				$this->request->redirect(Cookie::get('last_page'));
			}
		}
		require Keke_tpl::template("oauth_register");
	}
	/**
	 * oauth 注册绑定
	 */
	function action_bind(){
		$this->action_reg(TRUE);
	}
	
	
}