<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * ÓÃ»§×¢²á
 * @copyright keke-tech
 * @author Michael
 * @version v 2.2 2012-11-06
 */
class Control_register extends Control_front{
	
	function action_index(){
		global $_K, $_lang;
	 
		var_dump($_SESSION);
		
		$uid = $_SESSION['uid'];
		
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
	 * ÓÃ»§×¢²á
	 */
	function action_reg(){
		$_POST = Keke_tpl::chars($_POST);
		Keke::formcheck($_POST['formhash']);
		$username = $_POST['txt_account'];
		$pwd  = $_POST['pwd_password'];
		$email = $_POST['txt_email'];
		$res = Keke_user_register::instance()->set_username($username)->set_pwd($pwd)->set_email($email)->reg();
		$msg = '×¢²á³É¹¦';
		$t = 'success';
		if($res<0){
			$msg = '×¢²áÊ§°Ü:'.Keke_user_register::$_status[$res];
			$t = 'error';
		}elseif (Keke_valid::numeric($res) and $res>0){
			
		}else{
			$msg .= $res;
		}
		Keke::show_msg($msg,'register',$t);
	}
	
}