<?php  defined('IN_KEKE') OR die('access denied');
/**
 * 多赏任务计划执行类 
 * @author Michael 
 * @version 3.0 
 *
 */
class Control_task_mreward_cron extends Sys_task_cron {

     function run(){
     	Keke::$_log->add(log::DEBUG, __CLASS__.__FUNCTION__)->write();
     }
     function jg_to_xg(){
     	
     }
     function xg_to_gs(){
     	
     }
     function gs_to_jf(){}
     function jf_to_hp(){}
     function hp_to_end(){}
	
}
