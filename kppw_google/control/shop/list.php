<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台列表管理基类
 * @author Michael
 * @version 2.2
   2012-10-21
 */
Keke_lang::loadlang ('list','shop');
abstract class Control_shop_list extends Control_admin{
    
	/**
	 *
	 * @var 服务id
	 */
	protected  $_sid ;
	protected  $_base_uri;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->_sid = intval($_GET['sid']);
		$this->_base_uri  = BASE_URL."/index.php/shop/".$this->_model_code."_admin_list";
	}
    /**
     * 任务推荐
     */
    public function set_recommend(){
    	//改变任务的is_top 为1
    	$where = "sid = '$this->_sid'";
    	DB::update('witkey_service')->set(array('is_top'))->value(array(1))->where($where)->execute();
    }
    /**
     * 取消任务推荐
     */
    public function set_unrecommend(){
    	//改变任务的is_top 为0
    	$where = "sid = '$this->_sid'";
    	DB::update('witkey_service')->set(array('is_top'))->value(array(0))->where($where)->execute();
    }
    /**
     * 是否可以删除 商品
     * 商品没有交易的订单方可删除  status(ok,send,confirm,arbitral),这些状态的不能删除
     * @return bool
     */
    public function has_del($sid=NULL){
    	if($sid===NULL){
    		$sid  = $this->_sid;
    	}
    	$sql = "SELECT c.order_status FROM `:Pwitkey_service` as a \n".
				"LEFT JOIN :Pwitkey_order_detail as b on a.sid = b.obj_id and b.obj_type = 'service'\n".
				"left join :Pwitkey_order as c on b.order_id = c.order_id\n".
				"where a.sid = :sid ";
    	$status = DB::query($sql)->tablepre(":P")->param(":sid", $sid)->get_count()->execute();
    	$status_arr = array('ok','send','confirm','arbitral');
    	return (bool)!in_array($status,$status_arr);
     
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
    	Keke::init_model();
    	$model_name = Keke::$_model_list[$task_info['model_id']]['model_name'];
    	$data = array($model_name,$task_info['task_title']);
    	Sys_finance::init_mem('task_fail', $data);
    	//只退还赏金，其它费用不退
    	Sys_finance::cash_in ( $task_info ['uid'], $task_info ['task_cash'], 0, 'task_fail', 'admin', 'task', $task_info ['sid'] );
    }
    
    
    /**
     * 获取任务信息
     * @param int $sid
     * @return Ambigous <string, unknown, Ambigous>
     */
    public function get_service_info($sid = NUll){
    	if($sid == NULL){
    		$where = "sid = '$this->_sid'";
    	}else{
    		$where = "sid = '$sid'";
    	}
    	return  DB::select()->from('witkey_service')->where($where)->get_one()->execute();
    }
    /**
     * 更新任务状态
     * @param int $status
     * @param int $sid
     */
    public function set_status($status,$sid=NULL){
    	if($sid===NULL){
    		$where = "sid = '$this->_sid'";
    	}else{
    		$where = "sid = '$sid'";
    	}
    	return (bool)DB::update('witkey_service')->set(array('task_status'))->value(array($status))->where($where)->execute();
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
     * 获取服务的附件
     * @param int $sid
     * @return Ambigous <string, unknown, Ambigous>
     */
    public static  function get_service_file($sid){
    	$where ="obj_type='service' and obj_id = '$sid'";
    	return DB::select()->from('witkey_file')->where($where)->execute();
    }

    /**
     * 删除指定服务,默认删除当前请求的服务
     * @return number
     */
    public function del_service($sid = NULL){
    	if($sid===NULL){
    		$sid = $this->_sid;
    	}
    	$where = "sid = '$sid'";
    	
    	//任务的附件
    	self::del_files_by_service($sid);
    	//要删除评论,服务表
    	$sql = "DELETE a,b from :Pwitkey_service as a LEFT JOIN :Pwitkey_comment as b\n".
				"on a.sid = b.obj_id and b.obj_type = 'service' \n".
				"where a.sid = :sid ";
    	
     	return (int)DB::query($sql,Database::DELETE)->param(":sid", $sid)->tablepre(":P")->execute();
    }
    /**
     * 删除任务+稿件的附件，+记录
     * @param int $sid
     */
    public static function del_files_by_service($sid){
    	$files = (array)self::get_task_file($sid);
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