<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

$views = array ('index', 'task', 'talent');

in_array ( $view, $views ) and $view or $view = 'index';
$nav_active_index = "prom";

$Keke->init_prom();
 //初始化推广
	
switch (isset ( $_COOKIE ['user_prom_event'] )){
	case 1:
		 $u and $url_data=Keke::$_prom_obj->extract_prom_cookie();
		 if($u==$url_data['u']){
			 Keke::$_prom_obj->prom_jump ( $url_data );
		 }else{
		 	Keke::$_prom_obj->create_prom_cookie ( $_SERVER ['QUERY_STRING'] );	
		 }
		break;
	case 0:
		$u and Keke::$_prom_obj->create_prom_cookie ( $_SERVER ['QUERY_STRING'] );
		break;
}
require "{$do}_{$view}.php";

 