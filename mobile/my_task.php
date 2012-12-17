<?php

/**
 * @copyright keke-tech
 * 我的任务
 */
defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0);
$sql = ' select * from '.TABLEPRE.'witkey_task where uid='.$uid;
$model_id = max($model_id,1);
$status and $status = intval($status) or $status=2;
$ls = max($ls,0);
$le = max($le,10);
$sql.=' and model_id='.$model_id;
$sql.=' and task_status='.$status;
$sql.=' limit '.$ls.','.$le; 
$data = db_factory::query($sql,1,3600);
kekezu::echojson('',1,$data);die();
