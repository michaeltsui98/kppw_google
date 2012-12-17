<?php defined('IN_KEKE') or 	exit('Access Denied');
/**
 * 多人悬赏任务初始化配置文件
 */
//子菜单ID
$sub_menu_arr[] = array(
		'resource_id'=>202,
		'resource_url'=>'index.php/task/mreward_admin_list',
		'resource_name'=>'任务列表',
		'submenu_id'=>61);
$sub_menu_arr[] = array(
		'resource_id'=>203,
		'resource_url'=>'index.php/task/mreward_admin_config',
		'resource_name'=>'任务配置',
		'submenu_id'=>61);
//父菜单ID
$menu_arr = array(
		//ID
		'submenu_id'=>'61',
		//中文件名称 
		'submenu_name'=>'多人悬赏',
		//一级菜单code
		'menu_name'=>'task',
		'listorder'=>'2'
);


$init_config = array(
	'model_id'=>2,
	'model_code'=>'mreward',
	'model_name'=>'多人悬赏',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'on_time'=>'2012-10-27',
	'listorder'=>'2',
	//配置信息
	'config'=>array(
	'audit_cash'=>10,
	'is_auto_adjourn'=>1,
	'adjourn_day'=>2,
	'deduct_scale'=>1,
	'defeated_money'=>2,
	'task_min_cash'=>10,
	'show_limit_time'=>1,
	'agree_sign_time'=>10,
	'agree_complete_time'=>5)
);