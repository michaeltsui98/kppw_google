<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 单赏任务发布
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_mreward_pub extends Control_task_task{
     
     private $_tpl = 'control/task/mreward/tpl/';	
     
    
	function action_index(){
		 
		
		 
		
		require Keke_tpl::template($this->_tpl.'release1');
	}
	
	function action_step2(){
		require Keke_tpl::template($this->_tpl.'release2');
	}
	function action_step3(){
		require Keke_tpl::template($this->_tpl.'release3');
	}
	function action_step4(){
		require Keke_tpl::template($this->_tpl.'release4');
	}
	
	
}