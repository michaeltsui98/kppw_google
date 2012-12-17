<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2010-11-23 10:41:01
 */


switch ($op){
	case "send"://·¢ËÍÏûÏ¢
		if ($sbt_edit) {
			$tar_title= Keke::escape($tar_title);
 			$tar_content = Keke::escape($tar_content);
			keke_msg_class::send_private_message($tar_title,$tar_content,$to_uid, $to_username,'','json');
		} else{
			$title = $_lang['send_msg'];
			CHARSET=='gbk' and $to_username = Keke::utftogbk($to_username);
			require keke_tpl_class::template ( 'message' );
		}
		die ();
		break;
}