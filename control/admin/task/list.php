<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台列表管理基类
 * @author Michael
 * @version 3.0
   2012-10-21
 */
Keke_lang::load_lang_class('list','task');
abstract class Control_admin_task_list extends Control_admin{
    
	/**
	 *
	 * @var 任务id
	 */
	protected  $_task_id ;
	protected  $_base_uri;
	/**
	 * @var 任务模型配置
	 */
	protected  $_conf;
	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->_task_id = intval($_GET['task_id']);
		$this->_base_uri  = BASE_URL."/index.php/task/".$this->_model_code."_admin_list";
		
		$model_list = Keke::init_model();
		 
		$model_info = $model_list[$this->_model_id];
		 
		$this->_conf = $model_conf = unserialize($model_info['config']);
	}
 
    /**
     * 任务推荐
     */
    public function set_recommend(){
    	//改变任务的is_top 为1
    	$where = "task_id = '$this->_task_id'";
    	DB::update('witkey_task')->set(array('is_top'))->value(array(1))->where($where)->execute();
    }
    /**
     * 取消任务推荐
     */
    public function set_unrecommend(){
    	//改变任务的is_top 为0
    	$where = "task_id = '$this->_task_id'";
    	DB::update('witkey_task')->set(array('is_top'))->value(array(0))->where($where)->execute();
    }
    /**
     * 任务冻结
     * 冻结task,任务状态为!('6','7','8','10','11')
     * (2,3,4,5) 可以冻结 ,这里模板上判断
     */
    public function set_freeze(){
    	$sql = "INSERT INTO keke_witkey_task_frost(frost_status,task_id,frost_time,admin_uid,admin_username) \n".
    			"SELECT task_status,task_id,UNIX_TIMESTAMP(),'{$_SESSION['admin_uid']}','{$_SESSION['admin_username']}' \n".
    			"FROM keke_witkey_task where task_id = '{$_GET['task_id']}'";
    	DB::query($sql,Database::INSERT)->tablepre('keke_')->execute();
    	$this->set_status(8);
    }
    /**
     * 任务解冻
     */
    public function set_unfreeze(){
    	//改变任务状态，加上任务的结束时间
    	$where = "task_id = $this->_task_id";
    	$frost_info = DB::select()->from('witkey_task_frost')->where($where)->get_one()->execute();
    	$task_info = $this->get_task_info();
    	//新的任务结束时间
    	$end_time = (time () - $frost_info ['frost_time']) + $task_info['end_time'];
    	//新的交稿结束时间,当前时间减冻结时间的差值加在原来的时间上
    	$sub_time = (time () - $frost_info ['frost_time']) +$task_info['sub_time'];
    	$columns = array('sub_time','end_time','task_status');
    	$values = array($sub_time,$end_time,$frost_info['frost_status']);
    	DB::update('witkey_task')->set($columns)->value($values)->where($where)->execute();
    	//删除冻结记录
    	DB::delete('witkey_task_frost')->where($where)->execute();
    	 
    }
    /**
     * 通过审核，任务状态由1->2
     */
    public function set_pass(){
    	global $_lang;
    	//获取任务住处
    	$task_info =  $this->get_task_info();
    	//改变任务状态，及任务的产发布时间与结束时间
    	$sub_time = $task_info['sub_time'] + (time()-$task_info['start_time']);
    	$where = "task_id = $this->_task_id ";
    	
    	DB::update('witkey_task')
    	->set(array('task_status','start_time','sub_time'))
    	->value(array(2,time(),$sub_time))
    	->where($where)->execute();
    	
    	//更新任务增值服务的结束时间
    	DB::update('witkey_payitem_record')
    	->set(array('end_time'))
    	->value(array('use_num*24*3600+'.time()))
    	->where("obj_type='task' and obj_id = '$this->_task_id'")->execute();
    	//发送信息
    	$this->task_msg($task_info);
    	//生成推送feed
    	Control_task_task::pub_feed($task_info);
     
    }
    /**
     * 任务通知
     */
    function task_msg($task_info){
    	
    	$arr = array('{任务编号}'=>$task_info['task_id'],'{任务标题}'=>$task_info['task_title']);
    	$arr['{开始时间}'] = date('Y-m-d',SYS_START_TIME);
    	$arr['{任务状态}'] = "投稿中";
    	$arr['{投稿结束时间}'] = date('Y-m-d',((int)$task_info['sub_time']*3600*24)+SYS_START_TIME);
    	$arr['{选稿结束时间}'] = date('Y-m-d',(((int)$task_info['sub_time']+(int)$this->_conf['choose_time'])*3600*24)+SYS_START_TIME);
    	//生送短信
    	Keke_msg::instance()->to_user($task_info['uid'])->set_tpl('task_pub')->set_var($arr)->send();
    }
    
    /**
     * 不通过审核
     * 状态状态1->10 审核失败
     */
    public function set_no_pass(){
    	//改变任务状态
    	$this->set_status(10);
    	$task_info = $this->get_task_info();
    	//退还任务赏金
    	
    	$data = array($this->_conf['model_name'],$task_info['task_title']);
    	//只退还赏金，其它费用不退
    	
    	Sys_finance::get_instance($task_info['uid'])
    	->set_action('task_fail')
    	->set_mem($data)
    	->set_obj('task', $task_info['task_id'])
    	->cash_in($task_info['task_cash']);
    	
    }
    
    
    /**
     * 获取任务信息
     * @param int $task_id
     * @return Ambigous <string, unknown, Ambigous>
     */
    public function get_task_info($task_id = NUll){
    	if($task_id == NULL){
    		$where = "task_id = '$this->_task_id'";
    	}else{
    		$where = "task_id = '$task_id'";
    	}
    	return  DB::select()->from('witkey_task')->where($where)->get_one()->execute();
    }
    /**
     * 更新任务状态
     * @param int $status
     * @param int $task_id
     */
    public function set_status($status,$task_id=NULL){
    	if($task_id===NULL){
    		$where = "task_id = '$this->_task_id'";
    	}else{
    		$where = "task_id = '$task_id'";
    	}
    	return (bool)DB::update('witkey_task')->set(array('task_status'))->value(array($status))->where($where)->execute();
    }
    /**
     * 后台任务编辑可以操作的项
     * @param int $status 任务状态
     * @return multitype:unknown Ambigous <>
     */
    public static function can_operate($status) {
    	global $_lang;
    	$operate = array ();
    	switch ($status) {
    		case "1" : //待审核
    			$operate ['pass'] = $_lang['pass_audit'];
    			$operate ['nopass'] = $_lang['pass_audit'];
    			break;
    		case "2" : //投稿
    		case "3" : //选稿
    		case "4" : //投票
    		case "5" : //公示
    		case "6" : //交付
    			$operate ['freeze'] = $_lang['freeze_task'];
    			break;
    		case "7" : //冻结
    			$operate ['unfreeze'] = $_lang['unfreeze_task'];
    	}
    	return $operate;
    }
    /**
     * 获取任务的附件
     * @param int $task_id
     * @return Ambigous <string, unknown, Ambigous>
     */
    public static  function get_task_file($task_id){
    	$where ="obj_type='task' and obj_id = '$task_id'";
    	return DB::select()->from('witkey_file')->where($where)->execute();
    }
    /**
     * 获取任务稿件的附件
     * @param int $task_id
     */
    public static function get_work_file($task_id){
    	$work_ids = DB::select('GROUP_CONCAT(work_id)')->from('witkey_task_work')
    	->where("task_id ='$task_id'")
    	->group("task_id")->get_count()
    	->execute();
    	if($work_ids){
    		$where = " obj_type='work' and obj_id in($work_ids)";
    		return DB::select()->from('witkey_file')->where($where)->execute();
    	}else{
    		return NULL;
    	}
    	
    }
    /**
     * 删除指定任务,默认删除当前请求的任务
     * @return number
     */
    public function del_task($task_id = NULL){
    	if($task_id===NULL){
    		$task_id = $this->_task_id;
    	}
    	$task_info = $this->get_task_info($task_id);
    	
    	$sql = "delete a.*,b.*,c.*,d.* \n".
				"FROM keke_witkey_task a \n".
				"left JOIN  keke_witkey_task_work b\n".
				"on a.task_id = b.task_id \n".
				"left join keke_witkey_task_bid c\n".
				"on a.task_id = c.task_id\n".
				"left join keke_witkey_comment d\n".
				"on a.task_id = d.obj_id and d.obj_type = 'task'\n".
				"where a.task_id = '$task_id' and a.uid = '{$task_info['uid']}'";
		//任务的附件
        
    	File::del_file_by_task($task_id, $task_info['uid']);
    	
     	return (int)DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
    }
    /**
     * 删除任务+稿件的附件，+记录
     * @param int $task_id
     */
    public static function del_files_by_task($task_id){
    	$files = (array)self::get_task_file($task_id)+(array)self::get_work_file($task_id);
    	$file_id = array();
    	foreach ($files as $v){
    		$path = S_ROOT.$v['save_name'];
    		if(is_file($path)){
    			unlink($path);
    		}
    		$file_id[] = $v['file_id'];
    	}
    	if(empty($file_id)){
    		return TRUE;
    	}
    	$ids = implode(',', $file_id);
    	$where = " file_id in($ids) ";
    	return DB::delete('witkey_file')->where($where)->execute();
    }
}