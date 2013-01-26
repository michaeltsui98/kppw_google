<?php defined ( 'IN_KEKE' ) or exit('Access Denied');

class Control_pub extends Control_front{
	
	private $_default = 'sreward';
	/**
	 * 任务发布
	 */
	function action_index(){
		$model = $this->request->param('id');
		if($model){
			$class = "Control_task_{$model}_pub";
		}else{
			$class = "Control_task_{$this->_default}_pub";
		}
			
		$c = new $class($this->request,$this->response);
		
		require Keke_tpl::template('task_pub');
	}
	
}