<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8下午06:42:39
 */


$ops = array ('basic', 'picture','credit', 'safe','fina_account', 'account_bind','space');

in_array ( $op, $ops ) or $op = "basic";
/**
 * 子集菜单
 */
$sub_nav =array(
	 array (
			"basic" => array ( $_lang['basics'], "contact-card" ),
	 		"picture" => array ( $_lang['head_icon_setting'], "picture" ),
			//"credit" => array ( $_lang['credit_grade'], "cert" )
	 ),
	 array (
			"safe" => array ( $_lang['safe_set'], "shield" )
	 ),
	 array (
			"account_bind" => array ( $_lang['accoutn_bind'], "openid" ),
	 		//"fina_account"=>array ($_lang['bank_account'], "notepad")
	 ),
	 array (
			"space" => array ($_lang['space_set'], "browser" )
	 )
	 );

require 'user_' . $op . '.php';




