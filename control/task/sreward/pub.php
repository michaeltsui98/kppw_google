<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 单赏任务发布
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_sreward_pub extends Control_task_task{
     
    private $_tpl = 'control/task/sreward/tpl/';	
    
    function before(){
    	parent::before();
    	//临时任务信息,后退修改时用
    	$id = $this->get_tmp_task_id();
    	$this->_task_info = DB::select()->from('witkey_task_temp')->where("id='$id'")->get_one()->execute();
    	
    }
    
	function action_index(){
		$this->before();

		$task_info = $this->_task_info;
		
		if($task_info){
			$this->set_tmp_task_id($task_info['id']);
		}
		
		require Keke_tpl::template($this->_tpl.'release1');
	}
	
	function action_step2(){
		$task_info = $this->_task_info;
		
		if($_POST){
			if($task_info['id']){
				DB::update('witkey_task_temp')->set(array('task_cash','sub_time'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time']))
				->where("id='{$task_info['id']}'")->execute();
			}else{
				$task_id = DB::insert('witkey_task_temp')->set(array('task_cash','sub_time','model_code','on_time'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time'],'sreward',SYS_START_TIME))->execute();
				$this->set_tmp_task_id($task_id);
			}
		}
		
		require Keke_tpl::template($this->_tpl.'release2');
	}
	
	function action_step3(){
		$task_info = $this->_task_info;
		$id = $this->_task_info['id'];
		if($_POST){
			$columns = array('task_title','task_desc','task_file','task_indus','task_contact');
			$_POST = Keke_tpl::chars($_POST);
			$values = array($_POST['task_title'],$_POST['task_desc'],$_POST['task_file'],$_POST['task_indus'],$_POST['task_contact']);
			DB::update('witkey_task_temp')->set($columns)->value($values)->where("id='$id'")->execute();
		}
		
		require Keke_tpl::template($this->_tpl.'release3');
	}
	
	function action_step4(){
		
		//require Keke_tpl::template($this->_tpl.'release4');
	}
	
	
}