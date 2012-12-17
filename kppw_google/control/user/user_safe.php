<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-08下午02:57:33
 */


$opps = array ('change_password', "sec_code" );

in_array ( $opp, $opps ) or $opp = "change_password";
$ac_url = "index.php?do=$do&view=$view&op=$op";
/**
 * 子集菜单
 */
$third_nav = array ("change_password" => array ($_lang['change_pwd'], $_lang['change_pwd'] ),
				   "sec_code" => array ($_lang['safe_code_set'], $_lang['change_safe_code'] ) 
				) ;
switch ($opp) {
	case "change_password" :
		if ($check_old) {
			if(md5($check_old)==$user_info['password']){
				$notice = true;
			}else{
				$notice = $_lang['pwd_enter_err'];
				//CHARSET=='gbk' and $notice =  Keke::gbktoutf($notice);
			}
			echo $notice;
			die();
		}
		if ($new_password) {
			$old_pass = $old_password;
			$new_pass = $new_password;
			$new_equal = $new_equal;
			if ($basic_config ['user_intergration'] != "2" && $old_pass == $new_pass) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_pwd_fail'], $ac_url."&opp=$opp", 3, $_lang['old_new_pwd_like'], 'warning' );
			} elseif ($basic_config ['user_intergration'] != "2" && md5 ( $old_pass ) != $user_info ['password']) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_pwd_fail'], $ac_url."&opp=$opp", 3, $_lang['current_pwd_err'], 'warning' );
			} elseif ($new_pass != $new_equal) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_pwd_fail'], $ac_url."&opp=$opp", 3, $_lang['pwd_enter_not_consistent'], 'warning' );
			}
			$v = array ($_lang['new_pwd'] => $new_pass );
			keke_msg_class::notify_user($user_info ['uid'], $user_info ['username'], 'update_password', $_lang['change_pwd'],$v);
			$user_obj = new Keke_witkey_space_class ();
			$user_obj->setWhere ( "uid='$uid'" );
			$user_obj->setPassword ( md5 ( $new_password ) );
			$user_obj->edit_keke_witkey_space ();
			$member_obj = new Keke_witkey_member_class ();
			$member_obj->setWhere ( "uid='$uid'" );
			$member_obj->setPassword ( md5 ( $new_password ) );
			$res = $member_obj->edit_keke_witkey_member ();
			
			$flag = keke_user_class::user_edit ( $username, $old_password, $new_password, '', 0 ) > 0 ? 1 : 0;
			
			if ($flag && $res == 1){
				unset ( $_SESSION );
			}
			$flag && $res == 1 ? Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit success'], 'alert_right' ) : Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
			//$flag && $res == 1 ? Keke::show_msg ( $_lang['operate_notice'], $ac_url."&opp=$opp", 3, $_lang['pwd_modify_success'],'success' ) : Keke::show_msg ( $_lang['modify_pwd_fail'], $ac_url."&opp=$opp", 0, "", 'warning' );
		}
		break;
	case "sec_code" :
		if ($check_old) {
			$pwd = keke_user_class::get_password ( $check_old, $user_info ['rand_code'] );
			if($pwd==$user_info['sec_code']){
				$notice = true;
			}else{
				$notice = $_lang['safe_code_enter_err'];
				CHARSET=='gbk' and $notice =  Keke::gbktoutf($notice);
			}echo $notice;
			die();
		}
		if ($new_sec_code) {
			$pwd = keke_user_class::get_password ( $old_sec_code, $user_info ['rand_code'] );
			if ($pwd != $user_info ['sec_code']) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_safe_code_fail'], $ac_url."&opp=$opp", 3, $_lang['current_safe_code_err'], 'warning' );
			} elseif ($new_sec_code == $old_sec_code) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_safe_code_fail'], $ac_url."&opp=$opp", 3, $_lang['please_enter_again'], 'warning' );
			} elseif ($new_sec_code != $new_equal) {
				Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
				//Keke::show_msg ( $_lang['modify_safe_code_fail'], $ac_url."&opp=$opp", 3, $_lang['safe_code_enter_inconsistent'], 'warning' );
			}
			
			$message_obj = new keke_msg_class ();
			$v = array ($_lang['safe_code'] => $new_sec_code );
			$message_obj->send_message ( $user_info ['uid'], $user_info ['username'], 'update_sec_code', $_lang['change_safe_code'], $v, $user_info ['email'], $user_info ['mobile'] );
			
			$user_obj = new Keke_witkey_space_class ();
			$user_obj->setWhere ( "uid='$uid'" );
			$user_obj->setSec_code ( keke_user_class::get_password ( $new_sec_code, $user_info ['rand_code'] ) );
			$res = $user_obj->edit_keke_witkey_space ();
			$res and Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit success'], 'alert_right' )  or Keke::show_msg ( $_lang['system prompt'], $ac_url . "&opp=$opp", '1', $_lang['submit failure'], 'alert_error' ) ;
			//$res and Keke::show_msg ( $_lang['operate_notice'], $ac_url."&opp=$opp", 3, $_lang['safe_code_modify_success'],'success' ) or Keke::show_msg ( $_lang['modify_safe_code_fail'], $ac_url."&opp=$opp", 3, "", 'warning' );
		}
		break;
}
require keke_tpl_class::template('user/user_'.$op.'_' . $opp);

