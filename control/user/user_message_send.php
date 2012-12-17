<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8ÏÂÎç06:42:39
 */



$url = "index.php?do=$do&view=$view&op=$op&msg_type=$msg_type"; 
Keke_lang::loadlang ( "user_message_send" );
if (isset($formhash)&&Keke::submitcheck($formhash)){
	$msg_obj = new Keke_witkey_msg_class ();
	$space_obj = new Keke_witkey_space_class ();
	$space_info = Keke::get_user_info ( $txt_to_username, 1 );
	if (! $space_info) {
		Keke::show_msg ( $_lang['fail_to_send_instation_messages'], $url, 1, $_lang['the_user_does_not_exist'], 'alert_error' );
	} elseif ($space_info ['uid'] == $uid) {
		Keke::show_msg ( $_lang['fail_to_send_instation_messages'], $url, 1, $_lang['can_not_send_messages_to_yourself'], 'alert_error' );
	}
	intval ( $hdn_pid ) and $msg_obj->setMsg_pid ( $hdn_pid );
	$msg_obj->setUid ( $uid );
	$msg_obj->setUsername ( $username );
	$msg_obj->setTo_uid ( $space_info ['uid'] );
	$msg_obj->setTo_username ( $space_info ['username'] );
	if (! $txt_msg_title) {
		Keke::show_msg ( $_lang['fail_to_send_instation_messages'], $url, 1, $_lang['input_the_title'], 'alert_error' );
	}
	$msg_obj->setTitle ( Keke::str_filter ( Keke::escape($txt_msg_title) ) );
	if (! $txt_msg_content) {
		Keke::show_msg ( $_lang['fail_to_send_instation_messages'], $url, 1, $_lang['input_the_content'], 'alert_error' );
	}
	$msg_obj->setContent ( Keke::str_filter (Keke::escape($txt_msg_content) ) );
	$msg_obj->setOn_time ( time () );
	$res = $msg_obj->create_keke_witkey_msg();
	if ($res) {
		Keke::show_msg ( $_lang['success_to_send_instation_messages'], $url, 1, $_lang['station_message_has_been_successfully_sent_to'] . $space_info ['username'],'alert_right');
	} else {
		Keke::show_msg ( $_lang['fail_to_send_instation_messages'], $url, 1, $_lang['fail_to_send_instation_messages'], 'alert_error' );
	}
}

require keke_tpl_class::template ( "user/user_message_send" );


