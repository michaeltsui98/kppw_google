<?php

/**
 * @copyright keke-tech
 */

defined ( 'IN_KEKE' ) && defined ( 'ISWAP' ) && ISWAP or kekezu::echojson ($wap_msg, 0);

$task_id = intval ( $task_id );
if ($task_id) {
	$model_list = $kekezu->_model_list;
	$views = array ('index', 'work_list','work','work_hand',"work_info");
	in_array ( $view, $views ) or $view = 'index';
	$task_info = wap_base_class::get_task_info($task_id);
	$tmp_class = $model_list[$task_info['model_id']]['model_code'].'_wap_task_class';
	$Obj       = new $tmp_class($task_info); 
	switch ($view){
		case "index"://任务首页
			$data = $Obj->wap_info();
			$data and kekezu::echojson('',1,$data) or kekezu::echojson(array('r'=>'Task does not exist'),0);
			die();
			break;
		case "work_list"://稿件列表
			$Obj->wap_list();
			break;
		case "work":
			break;
		case "work_info"://稿件详细
			$Obj->wap_workinfo($work_id);
			break;
	}
	
	switch ($action){
		case "work_bid"://中标
		case "work_in"://入围
		case "work_out"://淘汰
			$Obj->wap_process($work_id,$action);
			break;
		case 'favor':
			$Obj->wap_favor();
			break; 
		case 'report':
			$Obj->wap_report($desc);
			break;
		case "work_hand"://交稿 
			$Obj->wap_hand($work_desc);
			break;
		case 'work_list':
			$Obj->wap_work_count();
			break;
		case 'reqedit': 
			$Obj->wap_reqedit($desc);
			break;
		case "upload": 
			
echo $_FILES[uploadedfile][name];die();
			$Obj->wap_upload('uploadedfile',$work_id);
			break;
	}
}else{
	kekezu::time2Units($time);
	kekezu::echojson (array('d'=>'Missing task id '),0);
}