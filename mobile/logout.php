<?php
/**
 * @copyright keke-tech
 */
defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0);
$_SESSION ['uid'] = '';
$_SESSION ['username'] = '';
$_SESSION['auid']="";
$_SESSION['user_info']="";
unset($_SESSION);
if (isset ( $_COOKIE ['user_login'] )) {
	setcookie ( 'user_login', '' );
}
if (isset ( $_COOKIE ['prom_cke'] )) {
	setcookie ( 'prom_cke', '' );
}
wap_base_class::update_load_status($u_id,2);//¸üÐÂµÇÂ½×´Ì¬
unset($_COOKIE);
session_destroy();
kekezu::echojson('',1);die();