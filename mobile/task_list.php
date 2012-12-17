<?php

/**
 * @copyright keke-tech
 */
defined ( 'IN_KEKE' ) && defined ( 'ISWAP' ) && ISWAP or kekezu::echojson ( $wap_msg, 0 );
 
$sql = " select * from " . TABLEPRE . "witkey_task where task_status in (2,3) ";
intval($model_id)&& $sql = "and model_id".intval($model_id);

intval ( $indus_id ) && $sql .= " and indus_id='" . intval ( $indus_id ) . "' ";
intval ( $indus_pid ) && $sql .= " and indus_pid='" . intval ( $indus_pid ) . "' ";
trim ( $search_key ) && $sql .= " and task_title like '%" . $search_key . "%'";
switch ($order) {
	case 2 :
		$sql .= " order by start_time desc";
		break;
	case 3 :
		$sql .= " order by task_cash asc";
		break;
	case 4 :
		$sql .= " order by task_cash desc";
		break;
	default :
		$sql .= " order by start_time asc";
}
file_put_contents ( 'a.txt', $sql );
$limit_start && $limit_end and $sql .= " limit $limit_start,$limit_end";
$data = db_factory::query ( $sql );
kekezu::echojson ( '', 1, $data );
die ();