<?php defined('IN_KEKE') or 	exit('Access Denied');
/**
 * 订金招标任务初始化配置文件
 */
//子菜单ID
$sub_menu_arr[] = array(
		'resource_id'=>208,
		'resource_url'=>'index.php/task/dtender_admin_list',
		'resource_name'=>'任务列表',
		'submenu_id'=>64);
$sub_menu_arr[] = array(
		'resource_id'=>209,
		'resource_url'=>'index.php/task/dtender_admin_config',
		'resource_name'=>'任务配置',
		'submenu_id'=>64);
//父菜单ID
$menu_arr = array(
		//ID
		'submenu_id'=>'64',
		//中文件名称 
		'submenu_name'=>'订金招标',
		//一级菜单code
		'menu_name'=>'task',
		'listorder'=>'5'
);


$init_config = array(
	'model_id'=>5,
	'model_code'=>'dtender',
	'model_name'=>'订金招标',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'on_time'=>'2012-10-27',
	'listorder'=>'1',
	//配置信息
	'config'=>array(
	)
);