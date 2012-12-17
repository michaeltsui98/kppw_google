<?php

/**
 * @copyright keke-tech
 */
defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0); 


 //ÓïÑÔ°ü
Keke_lang::package_init("task");
Keke_lang::loadlang($do);
$pub_mode='professional';

$model_list = kekezu::get_table_data ( '*', 'witkey_model', " model_type = 'task' and model_status='1'", 'model_id asc ', '', '', 'model_id', 3600 );
if(!$model_id){
	$model_ids = array_keys($model_list);
	$model_id = $model_ids['0'];
}

$model_id and $model_info = $model_list[$model_id] or kekezu::keke_show_msg("index.php","{lang:no_model}","error");

if($ac=='pub_task'){
	$cl= $model_info['model_code']."_wap_release_class";
	$r_obj = new $cl($model_id,$pub_mode);
	$r_obj->wap_priv();
	$r_obj->wap_release();
}
