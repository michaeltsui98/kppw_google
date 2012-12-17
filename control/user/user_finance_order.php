<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-9 12:10
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
Keke_lang::loadlang ( 'user_finance_order', 'user' );
if ($model_id) {

	/**
	 * 三级横向菜单
	 */
	if ($role == 1) { //卖家
		$order_count = Keke::get_table_data ( "model_id,count(order_id) count", "witkey_order", "model_id IN(6,7) and `seller_uid`=$uid ", "", "model_id=6,model_id=7", "", "model_id", 3600 );
	} else { //买家
		$order_count = Keke::get_table_data ( "model_id,count(order_id) count", "witkey_order", "model_id IN(6,7) and `order_uid`=$uid ", "", "model_id=6,model_id=7", "", "model_id", 3600 );
	}
	$third_nav = array ();
	foreach ( $model_list as $v ) {
		$third_nav [] = array ("1" => $v ['model_id'], "2" => $v ['model_name'], "3" => intval ( $order_count [$v ['model_id']] ['count'] ) );
	}
	$page = intval ( $page );
	$page or $page = 1;
	$page_size = intval ( $page_size );
	$page_size or $page_size = 10;
	$url = "index.php?do=user&view=$view&op=shop&model_id=$model_id&page_size=$page_size&status=$status&page=$page";
	if (isset ( $ac ) && $order_id && $model_id) {
		//var_dump($ac,$order_id,$model_id);die();
		$model_info = $Keke->_model_list [$model_id];
		$class_name = $model_info ['model_code'] . "_" . $model_info ['model_type'] . "_class";
		$obj = new $class_name ( $task_info );
		$res = $obj->dispose_order ( $order_id, $ac );
	} elseif ($mark) {
		$title = $_lang ['both_mark'];
		$obj_id = $obj_id;
		$order_id = $order_id;
		$model_code = $Keke->_model_list[$model_id]['model_code'];
		//var_dump($order_id);die();
		require S_ROOT . 'control/mark.php';
		die ();
	} elseif ($download) {
		$title = $_lang ['works_file_upload'];
		$view = "file";
		$ajax = "goods_filedown";
		require "control/ajax/ajax_file.php";
		die();
	} else {
		$model_list = $Keke->_model_list;
		$obj_arr = keke_order_class::get_order_obj (); //订单对象数组
		$sql = " select a.*,b.obj_type,b.obj_id,c.`submit_method`,d.`mobile` from " . TABLEPRE . "witkey_order a left join " . TABLEPRE . "witkey_order_detail b on a.order_id = b.order_id 
			left join " . TABLEPRE . "witkey_service c on c.`service_id`=b.`obj_id`
			left join " . TABLEPRE . "witkey_space d on d.`uid`=a.`seller_uid` where b.obj_type = 'service' ";
		$model_id and $sql .= " and a.`model_id`=$model_id ";
		$role == '1' and $sql .= " and seller_uid = '$uid' " or $sql .= " and order_uid = '$uid' ";
		/*服务订单状态*/
		$status_arr = array ("wait" => $_lang ['wait_buyer_pay'], "ok" => $_lang ['buyer_has_pay'], 'accept' => $_lang ['seller_has_accept'], "send" => $_lang ['seller_has_severice'], "confirm" => $_lang ['confirm_complete'], "close" => $_lang ['trans_close'], "arbitral" => $_lang ['order_arbitral'], 'arb_confirm' => $_lang ['confirm_complete'] );
		$role == 2 and $status_arr ['ok'] = $_lang ['has_pay'];
		/* 排序方式*/
		$ord_arr = array ('a.order_id desc' => $_lang ['order_id_desc'], "a.order_id asc" => $_lang ['order_id_asc'] );
		
		$order_obj = new Keke_witkey_order_class ();
		$page_obj = $Keke->_page_obj;
		
		$order_id && $order_id != $_lang ['please_input_order_id'] and $sql .= " and a.order_id = " . $order_id;
		$order_title && $order_title != $_lang ['please_input_order_name'] and $sql .= " and a.order_name like '%$order_title%'";
		$status and $sql .= " and a.order_status = '$status'";
		$ord and $sql .= " order by $ord " or $sql .= " order by order_id desc ";
		$count = intval ( Dbfactory::execute ( $sql ) );
		$pages = $page_obj->getPages ( $count, $page_size, $page, $url, '#userCenter' );
		$order_arr = Dbfactory::query ( $sql . $pages ['where'] );
//	var_dump($order_arr);
	}
	
	if ($action == 'delete') {
		$detail_obj = new Keke_witkey_order_detail_class ();
		$task_obj = new Keke_witkey_task_class ();
		//删除对应的订单  
		$order_obj->setWhere ( "order_id = $order_id" );
		$order_obj->del_keke_witkey_order ();
		
		$detail_obj->setWhere ( "order_id = $order_id" );
		$detail_info = $detail_obj->query_keke_witkey_order_detail ();
		$detail_info = $detail_info ['0'];
		
		$detail_obj->setWhere ( "order_id = $order_id" );
		$detail_obj->del_keke_witkey_order_detail ();
		//删除对应的任务
		$task_id = $detail_info ['obj_id'];
		$task_obj->setWhere ( "task_id = $task_id" );
		$res = $task_obj->del_keke_witkey_task ();
		Keke::echojson ( '', 1 );
	
	}
}
function get_mark_info($order_id, $obj_id, $order_uid, $seller_uid) {
	global $uid, $role;
	if ($role == 1) { //卖家
		$mark_type = 1;
		$auid = $order_uid;
	} else { //买家
		$mark_type = 2;
		$auid = $seller_uid;
	}
	$mark_info = Dbfactory::get_one ( sprintf ( "select * from %switkey_mark where obj_id=%d and origin_id=%d and mark_type=%d and uid=$auid and by_uid=$uid", TABLEPRE, $order_id, $obj_id, $mark_type ) );
	return $mark_info;
}

require keke_tpl_class::template ( "user/user_finance_order_service" );
//require keke_tpl_class::template ( "user/" . $do . "_" . $view . "_" . $op . "_" . $obj_type );

