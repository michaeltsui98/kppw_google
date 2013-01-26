<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * 任务详细页、任务首页的入口文件
 * @copyright keke-tech
 * @author Michael
 * @version 3.0
 */

class Control_task extends Control_front{
	
	static protected $task_info = NULL;
	static protected $conf = NULL;
	static protected $v = NULL;
	static protected $buyeruid =NULL;
	static protected $uid = NULL;
	static protected $task_id=NULL;
	
	function action_index(){
		global $_K;
		$task_id = $this->request->param('id');
		if(Keke_valid::not_empty($task_id)==false){
			Keke::show_msg('没有找到对应的任务','index.php','info');
		}
		self::$v = $this->request->param('v');
		self::$task_info =  $this->get_task_info($task_id);
		if(Keke_valid::not_empty(self::$task_info)===FALSE){
			Keke::show_msg('没有找到对应的任务','index.php','info');
		}
		self::$task_id = $task_id;
		self::$buyeruid = self::$task_info['uid'];
		self::$uid = $_SESSION['uid'];
		self::$conf = unserialize(self::$task_info['config']);
		
		$_K['page_title'] =self::$task_info['task_title'].'--'.$_K['html_title'];
		
		$_K['seo_keyword'] = self::$task_info['task_title'];
		
		$_K['seo_desc'] = self::$task_info['task_desc'];
		
		$model = self::$task_info['model_code'];
		$class = "Control_task_{$model}_info";
		$c = new $class($this->request, $this->response);
		
		if(self::$v){
			$a = 'action_'.self::$v;
			$c->$a();
		}else{
			$c->action_index();
		}
	}
	
	
	/**
	 * 获取任务+模型信息
	 * @param int $task_id
	 * @return array();
	 */
	function get_task_info($task_id){
		$sql = "select * from keke_witkey_task a\n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"left join keke_witkey_status c\n".
				"on c.model_code= b.model_code and c.stype='task' and a.task_status = c.sid\n".
				"where a.task_id = :task_id";
		return DB::query($sql)->tablepre('keke_')->param(':task_id', $task_id)->get_one()->execute();
	}
	/**
	 * 任务附件信息
	 * @param int $task_id
	 */
	function get_task_att($task_id){
		 $sql = "select file_id,file_name,save_name \n".
				"from keke_witkey_file \n".
				"where obj_type='task' \n".
				"and obj_id = :obj_id and pid = 0 ";
		 
		 return DB::query($sql)->tablepre('keke_')->param(':obj_id', $task_id)->execute();
	}
	
	//稿件要下载的文件
	function get_files($fnames,$fsnames){
		$fnames = explode(',', $fnames);
		$fsnames = explode(',', $fsnames);
		return array_map(NULL, $fnames,$fsnames);
	}
	
	
	
}
 