<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8下午06:42:39
 */

Keke_lang::package_init ( 'auth' );
Keke_lang::loadlang ( 'auth_add' );  
$keys = array_keys ( $auth_item_list );
$auth_code or $auth_code = $keys ['0']; //默认认证项 
$auth_code or Keke::show_msg ( $_lang['param_error'], "index.php?do=auth",3,'','warning' );

if($auth_item_list[$auth_code]){
	$auth_class = "keke_auth_".$auth_code."_class";
	$auth_obj = new $auth_class ( $auth_code ); //初始化认证对象
	$auth_item = $auth_item_list [$auth_code]; //认证详细配置
	$auth_dir = $auth_item ['auth_dir']; //认证文件路径
	$auth_info = $auth_obj->get_user_auth_info ( $uid,0,$show_id); //用户认证信息;//本类认证记录
	require S_ROOT."./auth/$auth_code/control/auth_add.php";
}else{
	
	Keke::show_msg($_lang['param_unlaw_or_no_open'],"index.php",3,'','warning');
}