<?php

/**
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-8-11上午08:05:04
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

$uid!=$task_info['uid'] and Keke::show_msg($_lang['friendly_notice'],'index.php?do=index',3,$_lang['cannot_access_page']); 

$payitem_arr = keke_payitem_class::get_payitem_info('employer',$model_list[$task_info['model_id']]['model_code']); //获取该任务所有的增值服务 
$exist_payitem_arr = keke_payitem_class::payitem_exists($uid,false ,'',$payitem_arr);//获取已购买的增值服务 
$payitem_arr_desc = unserialize($task_info['payitem_time']);//获取任务属性描述
$payitem_standard = keke_payitem_class::payitem_standard (); //收费标准

 
 foreach ($payitem_arr_desc as $k=>$v) { 
 	if($v>time()){
 		$sy_time_str = $v-time();
 		$sy_time_desc[$k] = Keke::time2Units($sy_time_str);
 	}else{
 		$sy_time_desc[$k] = '0'.$_lang['day'];
 	} 
 }

 if(Keke::submitcheck($formhash)){ 
 	if(!array_filter($payitem_num)){
 		Keke::show_msg($_lang['friendly_notice'],'index.php?do=task&task_id='.$task_id.'&view=tools',3,$_lang['no_choose_any_tools']);
 	} 	
 	$keys_arr = array_keys($payitem_arr_desc); 
 	$pay_item = $task_info['pay_item'];
 	foreach (array_filter($payitem_num) as $k=>$v) {  			
 			if(intval($v)>0&&!stristr($pay_item, "$k")){  							
 				$pay_item = $pay_item.",$k"; 				
 			}			
			if(in_array($payitem_arr[$k]['item_code'], $keys_arr)){
				//非地图的增值服务
				$payitem_arr_desc[$payitem_arr[$k]['item_code']]>time() and $payitem_arr_desc[$payitem_arr[$k]['item_code']] = 3600*24*$v+$payitem_arr_desc[$payitem_arr[$k]['item_code']] or $payitem_arr_desc[$payitem_arr[$k]['item_code']]=time()+3600*24*$v; 
			} else{
				//地图增值服务   
				dbfactory::execute(sprintf("update %switkey_task set point='%s',city='%s' where task_id=%d",TABLEPRE,$_POST['point'],$province,$task_id));
				//更新任务属性  
		  	} 
			$cost_res = keke_payitem_class::payitem_cost ( $payitem_arr[$k]['item_code'], $v, 'task', 'spend', $task_id, $task_id );
			//生成使用记录  
 	}   	
 	$pay_item = ltrim($pay_item,",");
 	if(strlen($pay_item)){
 		dbfactory::execute(sprintf("update %switkey_task set pay_item='%s' where task_id=%d",TABLEPRE,$pay_item,$task_id));//更新任务属性
 	}
	$res = keke_payitem_class::set_payitem_time($payitem_arr_desc, $task_id, 'task'); 
	//更新增值服务结束时间
 	$res||$cost_res and Keke::show_msg($_lang['operate_notice'],"index.php?do=task&task_id=$task_id&view=tools",'3',$_lang['operate_success'],'success'); 
 }
 
 

require Keke_tpl::template ( "payitem_tools" );
