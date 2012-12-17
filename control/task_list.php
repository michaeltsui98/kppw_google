<?php

/**
 * 任务大厅，任务列表页
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:15:51
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 初始化信息
 * @var unknown_type
 */


$nav_active_index = "task";
$page_title = $_lang ['task_list'] . '-' . $_K ['html_title'];
Keke_lang::package_init ( "task" );
Keke_lang::loadlang ( $do );
$feed_time = time () - 3600 * 24;
$dynamic_arr = Keke::get_feed ( " feedtype='pub_task' or feedtype='work_accept' and $feed_time>feed_time ", "feed_time desc", 10 ); // 动态信息
$cash_cove_arr = Keke::get_table_data ( '*', 'witkey_task_cash_cove', '', '', '', '', 'cash_rule_id', null );
$website_url = "index.php?" . $_SERVER ['QUERY_STRING']; // 当前连接
$task_cash_arr = keke_search_class::get_cash_cove (); // 任务赏金数组
$end_time_arr = Keke_global::get_taskstatus_desc ();
 
$where_arr = get_where_arr ();
if (isset ( $search_key )) { 
	$search_key = htmlspecialchars ( $search_key );
	$search_key = Keke::escape ( $search_key );
}
// 获取数组

$model_open = get_model (); // 开启的任务模型

$item_config = Sys_payitem::get_payitem_config ( null, null, null, 'item_id' );
// 微博平台图标
if (isset ( $path )) {
	$platform_arr = get_wbtask_info ( $path );
} else {
	$path = '';
}
$model_where = ' 1=1 and ';
if (isset ( $model_ids )&& $model_ids) {
	$model_val = implode ( ',', array_filter ( explode ( "M", $model_ids ) ) );
	$model_where = "  a.model_id in ($model_val) and ";
}

$sql = "select a.*,d.*,substring(
	payitem_time,
	instr(a.payitem_time,'top')+4+LENGTH('top'),10) as top_time, 
	substring(
	a.payitem_time,
	instr(a.payitem_time,'urgent')+4+LENGTH('urgent'),10)  as urgent_time  from " . TABLEPRE . "witkey_task as a left join " . TABLEPRE . "witkey_task_cash_cove d on a.task_cash_coverage=d.cash_rule_id where $model_where ";

// 查询
$where = get_where ( $path );

$page_size = isset ( $page_size ) ? intval ( $page_size ) : 20;
$url = "index.php?do=task_list&path=$path&min=$min&max=$max&model_ids=$model_ids&page_size=$page_size"; // 排序

$count = dbfactory::execute ( $sql . $where );
$page = isset($page) ? $page : 1;
$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
$limit = $pages ['where']; // 数组
                          
$task_list_arr = dbfactory::query ( $sql . $where . $limit );

// 查询条件
$check_arr = keke_search_class::get_path_url ( $where_arr, $path ); 

$check_url_arr = $check_arr ['url'];



$check_all = $check_arr ['all'];
$select_arr = $check_arr ['selected'];
$cookie_arr = array();
isset($_COOKIE ['save_cookie']) and $cookie_arr = unserialize ( $_COOKIE ['save_cookie'] ); // 获取cookie数组

isset($cookie_arr) and $cookie_arr = str_replace ( "&hid_save_cookie=1", "", $cookie_arr );
(isset($hid_save_cookie) || $path == 'H2') and keke_search_class::save_cookie ( $cookie_arr, $website_url, $select_arr, $hid_save_cookie, $search_key );

// 清空历史记录
if (isset($hid_del_cookie)) {
	$res = setcookie ( 'save_cookie', '' );
	$res and Keke::echojson ( '', 1 );
	die ();
}
// 获取任务金额条件
function get_cash_where($min_cash, $max_cash) {
	$where = " and ((a.task_cash_coverage >0  and d.end_cove <= $max_cash and d.start_cove>=$min_cash  ) or (a.task_cash_coverage =0 or isnull(a.task_cash_coverage) and a.task_cash>=$min_cash and a.task_cash<$max_cash))";
	return $where;
}

// 获取查询条件
function get_where($path) {
	global $task_cash_arr, $search_key, $min, $max, $ord, $model_ids, $indus_id, $model_open;
	$url_info = keke_search_class::get_analytic_url ( $path );
	isset ( $url_info ['F'] ) or $where = " (a.task_status=2 or a.task_status=3)";
	if (isset ( $url_info ['F'] )) {
		switch ($url_info ['F']) {
			case 2 :
				$where = " a.task_status=2 ";
				break;
			case 3 :
				$where = "a.task_status=3";
				break;
			case 8 :
				$where = "a.task_status=8";
				break;
		}
	}
	$indus_id and $where .= sprintf ( " and   a.indus_id = %d", $indus_id );
	isset ( $url_info ['A'] ) and $where .= sprintf ( " and a.indus_pid = '%d'", $url_info ['A'] ); // 任务所属行业
	! isset ( $_COOKIE ['kekesearch_cash'] ) && isset ( $url_info ['C'] ) and $where .= get_cash_where ( $task_cash_arr [$url_info ['C']] ['min'], $task_cash_arr [$url_info ['C']] ['max'] ); // 获取赏金
	isset ( $url_info ['B'] ) && ! $model_ids and $where .= sprintf ( " and a.model_id = '%d'", intval ( $url_info ['B'] ) ); // 任务类型//
	if (isset ( $url_info ['D'] )) {
		switch ($url_info ['D']) { // 赏金托管
			case 1 :
				$where .= " and a.model_id = 4";
				break;
			case 2 :
				$where .= " and a.model_id != 4";
				break;
			case 3 :
				$where .= " and a.alipay_trust =1 ";
				break;
		}
	}
	if (isset ( $url_info ['E'] )) {
		switch ($url_info ['E']) {
			case 1 :
				$where .= " and DATE_ADD(CURDATE(),INTERVAL  7 day) >= date(from_unixtime(a.end_time)) ";
				break;
			case 2 :
				$where .= " and DATE_ADD(CURDATE(),INTERVAL 3 day) >= date(from_unixtime(a.end_time))  ";
				break;
			case 3 :
				$where .= " and DATE_ADD(CURDATE(),INTERVAL 30 day) >= date(from_unixtime(a.end_time)) ";
				break;
			case 4 :
				$time = time () + 24 * 3600;
				$where .= " and a.end_time<$time ";
				break;
		}
	}
	$model_open and $where .= " and a.model_id in ( $model_open) ";
	if (isset ( $url_info ['G'] )) {
		switch ($url_info ['G']) { // 其他
			case 1 :
				$where .= " and FIND_IN_SET( '1', a.pay_item ) ";
				break;
			case 2 :
				$where .= " and FIND_IN_SET( '2', a.pay_item ) and substring( payitem_time, instr(a.payitem_time,'top')+4+LENGTH('top'),10)>UNIX_TIMESTAMP() ";
				break;
			case 3 :
				$where .= " and FIND_IN_SET( '3', a.pay_item ) and substring( a.payitem_time, instr(a.payitem_time,'urgent')+4+LENGTH('urgent'),10)>UNIX_TIMESTAMP() ";
				break;
			case 4 :
				$where .= " and a.is_delay = 1 ";
				break;
		}
	}
	if (isset ( $_COOKIE ['kekesearch_cash'] )) {
		intval ( $min ) or $min = 0;
		intval ( $max ) or $max = 0;
		$min and $where .= " and a.task_cash>'$min' ";
		$max and $where .= " and a.task_cash < '$max' ";
		$where .= " and  (d.end_cove < $max and d.start_cove<$max )";
	}
	if (isset ( $url_info ['H'] )) {
		switch ($url_info ['H']) {
			case 1 :
				$where .= " and a.task_id = '$search_key'";
				break;
			case 2 :
				$where .= " and a.task_title like '%$search_key%'";
				break;
			case 3 :
				$where .= " and a.username = '$search_key'";
				break;
		}
	}
	switch ($ord) {
		case 1 :
			$order_by = " order by a.start_time desc";
			break;
		case 2 :
			$order_by = " order by a.start_time asc";
			break;
		case 3 :
			$order_by = " order by a.task_cash desc";
			break;
		case 4 :
			$order_by = " order by a.task_cash asc";
			break;
	}
	$ord or $order_by = " order by (CASE WHEN substring( payitem_time, instr(a.payitem_time,'top')+4+LENGTH('top'),10)>UNIX_TIMESTAMP() THEN a.start_time ELSE 0 END) desc,a.start_time  desc";

	return $where . $order_by;

}

/**
 *
 *
 *
 *
 * 搜索条件数组
 *
 * @param unknown_type $search_key        	
 */
function get_where_arr() {
	global $model_list, $_lang,$search_key;
	$task_indus_type = Keke::get_industry ( 0 ); // 获取行业分类

	foreach ( $model_list as $v ) {
		if ($v ['model_id'] != 6 && $v ['model_id'] != 7) {
			$v['model_status']==1 and $display_model [$v ['model_id']] = $v;
		}
	}
	// 条件大数组
	$where_arr = array (
			"A" => $task_indus_type, // 任务分类
			"B" => $display_model, // 任务模式
			"C" => array ( // 任务赏金
					"1" => array (
							"name" => $_lang ['task_cash_s1'] 
					),
					"2" => array (
							"name" => "100-500" 
					),
					"3" => array (
							"name" => "500-1000" 
					),
					"4" => array (
							"name" => "1000-5000" 
					),
					"5" => array (
							"name" => "5000-20000" 
					),
					"6" => array (
							"name" => $_lang ['task_cash_s2'] 
					) 
			),
			"D" => array ( // 赏金托管
					"1" => array (
							"name" => $_lang ['no_trust'] 
					),
					"2" => array (
							"name" => $_lang ['trusted'] 
					),
					"3" => array (
							"name" => $_lang ['zfb_trust'] 
					) 
			),
			"E" => array ( // 发布时间
					"1" => array (
							"name" => $_lang ['in_week_end'] 
					),
					"2" => array (
							"name" => $_lang ['in_three_end'] 
					),
					"3" => array (
							"name" => $_lang ['in_month_end'] 
					),
					"4" => array (
							"name" => $_lang ['soon_end'] 
					) 
			),
			"F" => array ( // 任务状态
					"2" => array (
							"name" => $_lang ['working'] 
					),
					"3" => array (
							"name" => $_lang ['choosing'] 
					),
					"8" => array (
							"name" => $_lang ['ending'] 
					) 
			),
			"G" => array ( // 其他选项
					
					"2" => array (
							"name" => $_lang ['recomend'] 
					),
					"4" => array (
							"name" => $_lang ['delay_makeup'] 
					),
					"3" => array (
							"name" => $_lang ['hurried_task'] 
					) 
			),
			
			"H" => array (
					// 任务编号
					"1" => array (
							"name" => $_lang ['task_num'] . ":$search_key" 
					),
					// 任务标题
					"2" => array (
							"name" => $_lang ['task_title'] . ":$search_key" 
					), 
					//任务发布者
					"3" => array (
							"name" => $_lang ['task_releaser'] . ":$search_key" 
					) 
			) 
	);
	return $where_arr;
}
/**
 * 通过主键为task_id,得到对应的平台信息,返回平台图片
 *
 * @param unknown_type $task_id        	
 */
function get_wb_platform($task_id) {
	global $platform_arr;
	$str = '';
	isset($platform_arr [$task_id]) and $plat_str = $platform_arr [$task_id];
	if (! isset($plat_str)) {
		return;
	}
	$plat_arr = explode ( ',', $plat_str );
	foreach ( $plat_arr as $key => $value ) {
		$str .= '<img src="resource/img/ico/' . $value . '_t.gif" />';
	}
	return $str;
}
/**
 * 查询model_id为8、9的任务信息,返回结果是array('task_id'=>'platform')
 */
function get_wbtask_info($path) {
	$where = get_where ( $path );
	$result = array ();
	global $Keke;
	
	if (Keke::$_model_list ['8'] ['model_status'] && Keke::$_model_list ['9'] ['model_status']) {
		$sql = "SELECT d.*,a.task_id, concat(IFNULL(b.wb_platform,''),ifnull(c.wb_platform,'')) as platform  FROM `%switkey_task` a left join %switkey_task_wbzf b on  a.task_id = b.task_id LEFT JOIN  %switkey_task_wbdj c on a.task_id = c.task_id  
	  left join " . TABLEPRE . "witkey_task_cash_cove d on a.task_cash_coverage=d.cash_rule_id
	  where model_id =8 or model_id =9 and %s";
	} elseif (Keke::$_model_list ['8'] ['model_status']) {
		$sql = "SELECT d.*,a.task_id, IFNULL(b.wb_platform,'') as platform  FROM `%switkey_task` a left join %switkey_task_wbzf b on  a.task_id = b.task_id  
		left join " . TABLEPRE . "witkey_task_cash_cove d on a.task_cash_coverage=d.cash_rule_id
	  where model_id =8  and %s";
	} elseif (Keke::$_model_list ['9'] ['model_status']) {
		$sql = "SELECT d.*,a.task_id, ifnull(c.wb_platform,'') as platform  FROM `%switkey_task` a LEFT JOIN  %switkey_task_wbdj c on a.task_id = c.task_id 
		left join " . TABLEPRE . "witkey_task_cash_cove d on a.task_cash_coverage=d.cash_rule_id
	   where model_id =9 and %s";
	}
	if ($sql) {
		$result_arr = dbfactory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE, TABLEPRE, $where ) );
		while ( list ( $key, $value ) = each ( $result_arr ) ) {
			$result [$value ['task_id']] = $value ['platform'];
		}
	} else {
		$result = array ();
	}
	
	return $result;
}

function get_model() {
	global $model_list;
	foreach ( $model_list as $v ) {
		$v ['model_status'] == 1 and $model_arr [] = $v ['model_id'];
	}
	$res = implode ( ',', $model_arr );
	return $res;
}

require Keke::$_tpl_obj->template ( $do );