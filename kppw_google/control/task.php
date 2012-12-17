<?php

/**
 * 任务详细页、任务首页的入口文件
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:05:04
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$nav_active_index = "task";
$page_title = $_lang ['task_index'] . '-' . $_K ['html_title'];
if (isset($task_id) && isset($r_task_id)) {
	$union_obj = new keke_union_class ( $task_id );
	$union_obj->view_task ();
	die ();
}

if (isset($task_id)) {
	$task_ext_obj = new Keke_witkey_task_ext_class ();
	$task_ext_obj->setWhere ( 'a.task_id=' . intval ( $task_id ) );
	$task_info = $task_ext_obj->query_keke_witkey_task ();
	$task_info = Keke::k_stripslashes ( $task_info ['0'] );
	$prom_rule = keke_prom_class::get_prom_rule ( "bid_task" );
	$task_info ['uid'] != $uid && $uid != ADMIN_UID && $task_info ['task_status'] == 1 and Keke::show_msg ( $_lang ['friendly_notice'], 'index.php?do=task_list', 2, $_lang ['task_auditing'] );
	$task_info ['uid'] != $uid &&$task_info ['task_status'] == 0 and Keke::show_msg ( $_lang ['friendly_notice'], 'index.php?do=task_list', 2, '任务未付款' );
	
	
	if (! $task_info) {
		Keke::show_msg ( $_lang ['operate_notice'], "index.php?do=index", '1', $_lang ['task_not_exsit_has_delete'], 'error' );
	}
	if ($task_info ['point']) {
		$point = explode ( ',', $task_info ['point'] );
		$px = $point ['0'];
		$py = $point ['1'];
	}
	$model_info = $model_list [$task_info ['model_id']];
	$model_code = $model_info ['model_code'];
	Keke_lang::package_init ( "task" );
	Keke_lang::loadlang ( $model_info ['model_dir'] );
	Keke_lang::loadlang ( "task_info" );
	$model_info and (require S_ROOT . "/task/" . $model_info ['model_dir'] . "/control/task_info.php") or Keke::show_msg ( $_lang ['error'], "index.php?do=index", 3, $_lang ['task_model_not_exist'], 'error' );
} else {
	  
	$clean_industry_arr = array ();
	Keke::get_tree(Keke::$_indus_arr, $clean_industry_arr, '');
	/**
	 * 进行中任务统计*
	 */
	$count_advance_task_sql = 'select count(task_id) count from ' . TABLEPRE . 'witkey_task where task_status in (2,3)';
	
 
	$advance_task = dbfactory::get_count ( $count_advance_task_sql, 0, null, 180 );
	
	$model_list = Keke::$_model_list; // 获取任务区间
	$task_cash_cove = Keke::get_table_data ( '*', 'witkey_task_cash_cove', '', '', '', '', 'cash_rule_id', 3600 );
	$task_obj = new Keke_witkey_task_class ();
	$page_obj = Keke::$_page_obj;
	$page_obj->setAjax ( 1 );
	$page_obj->setAjaxDom ( "task_list" );
	isset($page ) or $page = 1;
	isset ( $page_size ) or $page_size = 12;
	isset($t) or $t = 'new';
	$url = "index.php?do=task&t=$t";
	$sql = " 1 = 1 ";
	switch ($t) {
		
		case "new" :
			$sql = sprintf("  task_status=2 order by start_time desc ");
			 
			break;
		case "h" :
			/**
			 * 24小时任务
			 */
			$sql .= sprintf ( " and  sub_time<'%s' and task_status='2' order by start_time desc ", time () + 24 * 3600 );
			break;
		case "t" :
			/**
			 * 高金额任务*
			 */
			$sql .= " and task_status in (2,3) order by task_cash desc ";
			break;
		case "u" :
			/**
			 * 联盟任务*
			 */
			$sql .= " and task_status in (2,3) and `r_task_id` > '0'and task_union=2 order by start_time desc ";
			break;
	}
	
	$task_obj->setWhere ( $sql );
	$count = intval ( $task_obj->count_keke_witkey_task () );
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
	
	$task_obj->setWhere ( $sql . $pages ['where'] );
	$task_list = $task_obj->query_keke_witkey_task ( 1, 300 );
	
	function is_tender($model_code) {
		if (in_array ( $model_code, array (
				"dtender",
				"tender" 
		) )) {
			return 1;
		} else {
			return 0;
		}
	}
	
	require Keke_tpl::template ( "task" );
}