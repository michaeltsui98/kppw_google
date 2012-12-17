<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
//初始化配置 
$auth_config=array(  
  'auth_code'=>'email',
  'auth_title' =>$_lang['email_auth'],
  'auth_cash' =>'1-2',
  'auth_day' =>'1-2',
  'auth_dir'=>'email',
  'auth_expir' =>'0',
  'auth_small_ico' =>'',
  'auth_big_ico' =>'',
  'auth_desc' =>$_lang['email_auth_desc'],
  'auth_show' =>'0',
  'auth_open' =>'1',
  'update_time' =>'1306142382',
);
//后台菜单，主要为了控制操作权限，如果这个资源有存在就更新，否则创建
$menu_arr = array(
		'resource_id'=>71,
		'resource_url'=>'index.php/auth/email_admin_list',
		'resource_name'=>$_lang['email_auth'],
		'submenu_id'=>29);
