<?php defined('IN_KEKE') or 	exit('Access Denied');
/**
 * 普通招标任务初始化配置文件
 */
//子菜单ID
$sub_menu_arr[] = array(
		'resource_id'=>206,
		'resource_url'=>'index.php/task/tender_admin_list',
		'resource_name'=>'任务列表',
		'submenu_id'=>63);
$sub_menu_arr[] = array(
		'resource_id'=>207,
		'resource_url'=>'index.php/task/tender_admin_config',
		'resource_name'=>'任务配置',
		'submenu_id'=>63);
//父菜单ID
$menu_arr = array(
		//ID
		'submenu_id'=>'63',
		//中文件名称 
		'submenu_name'=>'普通招标',
		//一级菜单code
		'menu_name'=>'task',
		'listorder'=>'4'
);


$init_config = array(
	'model_id'=>4,
	'model_code'=>'tender',
	'model_name'=>'普通招标',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'on_time'=>'2012-10-20',
	'listorder'=>'1',
	//配置信息
	'config'=>array(
	 
	'is_auto_adjourn'=>1,
	'adjourn_day'=>2,
	'deduct_scale'=>1,
	'defeated_money'=>2,
	 
	'vote_limit_time'=>2
	  )
);