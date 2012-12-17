<?php defined('IN_KEKE') or 	exit('Access Denied');
/**
 * 单人悬赏任务初始化配置文件
 */
//子菜单ID
$sub_menu_arr[] = array(
		'resource_id'=>210,
		'resource_url'=>'index.php/shop/goods_admin_order',
		'resource_name'=>'作品订单',
		'submenu_id'=>66);
$sub_menu_arr[] = array(
		'resource_id'=>211,
		'resource_url'=>'index.php/shop/goods_admin_list',
		'resource_name'=>'作品列表',
		'submenu_id'=>66);
$sub_menu_arr[] = array(
		'resource_id'=>212,
		'resource_url'=>'index.php/shop/goods_admin_config',
		'resource_name'=>'作品配置',
		'submenu_id'=>66);
//父菜单ID
$menu_arr = array(
		//ID
		'submenu_id'=>'66',
		//中文件名称 
		'submenu_name'=>'卖家作品',
		//一级菜单code
		'menu_name'=>'shop',
		'listorder'=>'2'
);


$init_config = array(
	'model_id'=>6,
	'model_code'=>'goods',
	'model_name'=>'卖家作品',
	'model_type'=>'shop',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'on_time'=>'2012-10-20',
	'listorder'=>'1',
	//配置信息
	'config'=>array(
	)
);