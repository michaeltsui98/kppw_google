<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-12-25 ÏÂÎç   2:32:39
 */

$record_obj = new Keke_witkey_auth_record_class();

if (isset($formhash)&&Keke::submitcheck($formhash)){
	$shop_obj = keke_table_class::get_instance ( "witkey_shop" );
	 
	$conf ['uid'] = $uid;
	$conf ['username'] = Keke::escape($username);
	$conf ['shop_name'] = Keke::escape($shop_name);
	$conf ['shop_type'] = Keke::escape($shop_type);
	intval($shop_info['shop_id']) or $conf['shop_background'] = $file_temp;
	$shop_slogans and $conf ['shop_slogans'] = Keke::escape($shop_slogans);
	
	
	
 	$sql = sprintf("select shop_id from %switkey_shop where uid=%d ",TABLEPRE,$uid); 
	$shop_info = Dbfactory::query($sql);
	$pk['shop_id'] = $shop_info['0']['shop_id']; 
	$res = $shop_obj->save ($conf, $pk );
	Keke::show_msg ( $_lang['system prompt'], "index.php?do=space&member_id=$uid", '1', $_lang['submit success'], 'alert_right' ) ;
	//Keke::show_msg ( $_lang['operate_notice'], "index.php?do=space&member_id=$uid", 3, $_lang['edit_space_success'], 'success');
	// or Keke::show_msg ( $_lang['operate_notice'], $ac_url, 3, $_lang['edit_space_fail'], 'warning' );
	
}

// var_dump($shop_backstyle);

require keke_tpl_class::template ( "user/" . $do . "_" . $op . "_" . $opp );