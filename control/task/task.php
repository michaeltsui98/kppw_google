<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 任务父控制器
 * @author Michael
 * @version 2.2 2012-12-20
 *
 */
class Control_task_task extends Controller {
    
	/**
	 * @var 临时任务ID
	 */
	private $_tmp_task_id = NULL;
	/**
	 * @var 临时任务信息 
	 */
	protected  $_task_info = array();
	/**
	 * 设置临时任务ID
	 * @param int $id
	 */
	function set_tmp_task_id($id){
		$this->_tmp_task_id = $id;
		Cookie::set('tmp_task_id', $id);
	}
	/**
	 * 获取临时任务ID
	 * @return int $id;
	 */
	function get_tmp_task_id(){
		if($this->_tmp_task_id){
			return $this->_tmp_task_id;
		}
		return Cookie::get('tmp_task_id');
	}
	
}
