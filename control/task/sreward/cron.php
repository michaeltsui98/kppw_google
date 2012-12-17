<?php  defined('IN_KEKE') OR die('access denied');
/**
 * 单赏任务计划执行类 
 * @author Michael 
 * @version 3.0 
 *
 */
class Control_task_sreward_cron extends Sys_task_cron {
     /**
      * 执行
      */
     function run(){
     	Keke::$_log->add(log::DEBUG, __CLASS__.__FUNCTION__)->write();
     	
        $this->jg_to_xg();
        $this->xg_to_gs();
        $this->gs_to_jf();
        $this->jf_to_hp();
        $this->hp_to_end();	
     }
     
     function jg_to_xg(){}
     function xg_to_gs(){}
     function gs_to_jf(){
     	
     }
     function jf_to_hp(){
     	
     }
     function hp_to_end(){
     	
     }
	
}
