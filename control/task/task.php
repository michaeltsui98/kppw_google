<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ���񸸿�����
 * @author Michael
 * @version 3.0 2012-12-20
 *
 */
class Control_task_task extends Control_front {
    
	
	/**
	 * @var ��ʱ����ID
	 */
	private $_tmp_task_id = NULL;
	/**
	 * @var ��ʱ������Ϣ 
	 */
	protected  $_task_info = array();
	/**
	 * @var �����Ƿ����
	 */
	protected $_task_audio;
	/**
	 * @var ����Ҫ����Ǯ
	 */
	protected $_need_pay;
	/**
	 * @var ��ʽ����ID
	 */
	protected $_task_id;
	/**
	 * @var ����ģ������
	 */
	protected $_conf;
	/**
	 * @var ģ����Ϣ
	 */
	protected $_model_info;
	/**
	 * ������ʱ����ID
	 * @param int $id
	 */
	function set_tmp_task_id($id){
		$this->_tmp_task_id = $id;
		Cookie::set('tmp_task_id', $id);
	}
	/**
	 * ��ȡ��ʱ����ID
	 * @return int $id;
	 */
	function get_tmp_task_id(){
		if($this->_tmp_task_id){
			return $this->_tmp_task_id;
		}
		return Cookie::get('tmp_task_id');
	}
	

	/**
	 * ���ɶ�̬
	 * @param array $task_info
	 */
	static function pub_feed($task_info){
		Sys_feed::get_instance()->set_user($task_info['uid'], $task_info['username'])
		->set_action('����������')
		->set_obj('task', $task_info['task_id'], $task_info['task_title'],$task_info['task_cash'])
		->to_feed();
	}
	/**
	 * ���񸶿��
	 * @param array $task_info
	 */
	static function task_order($task_info){
			
		$order = array('order_name'=>$task_info['task_title'],'order_amount'=>(float)$task_info['task_cash']);
		$item = array('name'=>$task_info['task_title'],'obj_type'=>'task','obj_id'=>$task_info['task_id'],'model_id'=>$task_info['model_id'],
				'price'=>(float)$task_info['task_cash'],'num'=>1);
		return Sys_order::getinstance()->create_order($order,$item);
	
	}
	
	/**
	 * ���淢Ʊ��Ϣ
	 * @param array $fp_info
	 */
	static function save_fp_info($fp_info){
		if(Keke_valid::not_empty($fp_info['fp_title'])===FALSE){
			return FALSE;
		}
		$arr = array('uid'=>$_SESSION['uid'],
				'fp_title'=>$fp_info['fp_title'],
				'fp_linxiren'=>$fp_info['fp_linxiren'],
				'fp_zip'=>$fp_info['fp_zip'],
				'fp_address'=>$fp_info['fp_address'],
				'fp_mobile'=>$fp_info['fp_mobile'],
				'fp_use'=>$fp_info['fp_use'],
				'obj_type'=>'task',
				'obj_id'=>$fp_info['task_id']
		);
		DB::insert('witkey_invoice')->set(array_keys($arr))->value(array_values($arr))->execute();
	}
	
	/**
	 * ���񸶿�
	 * @param int $uid
	 * @param int $task_id
	 * @param string $task_title
	 * @param float $task_cash
	 * @param string $model_name
	 * @return  boolean, number
	 */
	static function task_pay($uid,$task_id,$task_title,$task_cash,$model_name){
	
		return Sys_finance::get_instance($uid)->set_action('pub_task')
	
		->set_mem(array(':model_name'=>$model_name,':task_id'=>$task_id,':task_title'=>$task_title))
	
		->set_obj('task', $task_id)->cash_out($task_cash);
	}
	
}
