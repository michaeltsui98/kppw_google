<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 计件后台配置列表
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_preward_admin_list extends Control_admin_task_list{
	/**
	 * @var 模型代码
	 */
	public  $_model_code   = 'preward';
 
	/**
	 * 任务列表页
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	//要显示的字段,即SQl中SELECT要用到的字段
    	$fields = ' `task_id`,`task_title`,`username`,`task_cash`,`model_id`,`task_status`,`indus_id`,`work_num`,`contact`,`start_time`,`is_top`';
    	//要查询的字段,在模板中显示用的
    	$query_fields = array('task_id'=>$_lang['id'],'task_title'=>$_lang['name'],'task_cash'=>$_lang['cash']);
    	//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
    	$count = intval($_GET['count']);
    	//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
    	$base_uri = $this->_base_uri;
    	//添加编辑的uri,add这个action 是固定的
    	$add_uri =  $base_uri.'/add';
    	//删除uri,del也是一个固定的，写成其它的，你死定了
    	$del_uri = $base_uri.'/del';
    	//默认排序字段，这里按时间降序
    	$this->_default_ord_field = 'task_id';
    	//这里要口水一下，get_url就是处理查询的条件
    	extract($this->get_url($base_uri));
    	//查指定类型的任务
    	$model_id = DB::select('model_id')->from('witkey_model')->where("model_code='$this->_model_code'")->get_count()->execute();
    	$where  .= " and model_id = $model_id";
    	//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
    	$data_info = Model::factory('witkey_task')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
    	//列表数据
    	$list_arr = $data_info['data'];
    	//分页数据
    	$pages = $data_info['pages'];
    	
    	$task_status = Control_task_preward_trade::get_task_status();
     	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/list');
    }
    /**
     * 任务编辑
     */
    public function action_add(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	 //获取任务信息
        $task_info = $this->get_task_info();
         
        $base_uri = $this->_base_uri;
        $process_arr = Control_admin_task_list::can_operate($task_info['task_status']);
        $indus_option_arr = Sys_indus::get_indus_tree($task_info['indus_id']);
        //计件任务状态
        $status_arr = Control_task_preward_trade::get_task_status();
        //获取任务的增值项
        $payitem_list = Sys_payitem::get_task_payitem($this->_task_id);
        
        $file_list = Control_admin_task_list::get_task_file($this->_task_id);
         
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_edit');
    }
    
    /**
     * 任务保存
     */
    public function action_save(){
    	$task_id = $_POST['task_id'];
    	if(!$task_id){
    		return FALSE;
    	}
    	Keke::formcheck($_POST['formhash']);
    	$array = array('task_title'=>$_POST['task_title'],
    			'indus_id'=>$_POST['slt_indus_id'],
    			'task_desc'=>$_POST['task_desc']);
    	$where = "task_id = $task_id";
    	Model::factory('witkey_task')->setData($array)->setWhere($where)->update();
    	$this->request->redirect($this->request->referrer());
    	
    }
    
    /**
     * 任务推荐
     */
    public function action_recommend(){
    	 $this->set_recommend();
    }
    /**
     * 取消任务推荐
     */
    public function action_unrecommend(){
    	//改变任务的is_top 为0
    	$this->set_unrecommend();
    }
    /**
     * 任务冻结
     * 冻结task,任务状态为!('6','7','8','10','11')
	 * (2,3,4,5) 可以冻结 ,这里模板上判断
     */
    public function action_freeze(){
    	$this->set_freeze();
    }
    /**
     * 任务解冻
     */
    public function action_unfreeze(){
    	 $this->set_unfreeze();
    }
    /**
     * 通过审核，任务状态由1->2
     */
    public function action_pass(){
    	$this->set_pass();
    }
    /**
     * 不通过审核 
     * 状态状态1->10 审核失败
     */
    public function action_no_pass(){
    	 $this->set_no_pass();
    }
    /**
     * 删除任务
     */
    public function  action_del(){
    	echo $this->del_task();
    }
    /**
     * 任务搞件列表页
     */
    public function action_work(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	//获取任务信息
    	$task_info = $this->get_task_info();
    	$base_uri = $this->_base_uri;
        $sql = "SELECT a.work_id,a.work_desc,a.task_id ,a.username,a.work_status,\n".
				"a.work_time,a.hide_work,a.vote_num,a.comment_num,\n".
				"count(distinct(c.file_id)) as file_num\n".
				"from ".TABLEPRE."witkey_task_work as a \n".
				"left join ".TABLEPRE."witkey_file as c \n".
				"on  c.obj_id = a.work_id and c.obj_type = 'work'\n".
				"left join ".TABLEPRE."witkey_task as d\n".
				"on a.task_id = d.task_id\n";
				 
        //要查询的字段,在模板中显示用的
        $query_fields = array('work_id'=>$_lang['id'],'work_desc'=>$_lang['name'],'username'=>$_lang['username']);
        //总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
        $count = intval($_GET['count']);
        //基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
        $base_uri = $this->_base_uri;
        //删除uri,del也是一个固定的，写成其它的，你死定了
        $del_uri = $base_uri.'/del';
        //默认排序字段，这里按时间降序
        $this->_default_ord_field = 'work_id';
        //这里要口水一下，get_url就是处理查询的条件
        extract($this->get_url($base_uri.'/work?task_id='.$this->_task_id));
        
        //获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
//      $data_info = Model::factory('witkey_task')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
        $data_info = Model::sql_grid($sql,"d.task_id=".$task_id,$uri,$order,"GROUP BY a.work_id",$page,$count,$_GET['page_size']);
        //列表数据
        $list_arr = $data_info['data'];
        //分页数据
        $pages = $data_info['pages'];
        $satus_arr = Control_task_preward_task::get_work_status();
	 
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_work');
    }
    /**
     * 稿件详细页
     */
    public function action_work_detail(){
    	global $_K,$_lang;
    	$work_id = $_GET['work_id'];
    	//稿件信息
    	$work_info = DB::select()->from('witkey_task_work')->where("work_id = '$work_id'")->get_one()->execute();
    	//稿件留言
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$work_id' and obj_type='work'")->execute();
    	//稿件的附件
    	$files = DB::select()->from('witkey_file')->where("obj_id = '$work_id' and obj_type='work'")->execute();
    	
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/work_detail');
    }
    /**
     * 删除指定搞件
     * 删除稿件的同时要删除稿件留言表，稿件附件表,附件
     */
    public function action_work_del(){
    	$work_id = $_GET['work_id'];
    	//删除对应的文件
    	$files = DB::select('save_name')->from('witkey_file')->where("obj_id = '$work_id' and obj_type='work'");
    	foreach ($files as $v){
           $path = S_ROOT.$v['save_name'];
           if(file_exists($path)){
           	  unlink($path);
           } 		
    	}
    	//删除关联的三张表
    	$sql = "delete a,b,c from ".TABLEPRE."witkey_task_work as a \n".
				"left join ".TABLEPRE."witkey_comment as b\n".
				"on b.obj_id = a.work_id and b.obj_type='work'\n".
				"left join ".TABLEPRE."witkey_file as c \n".
				"on a.work_id = c.obj_id and c.obj_type='work'\n".
				"where a.work_id = '$work_id'";
		echo DB::query($sql,Database::DELETE);				
    }
    /**
     * 任务留言列表页
     */
    public function action_comment(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	$base_uri = $this->_base_uri;
    	//获取任务信息
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$task_id' and obj_type='task' ")->execute(); 
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_comment');
    }
    /**
     * 删除任务留言
     */
    public function action_comment_del(){
    	$comment_id = $_GET['comment_id'];
    	echo DB::delete('witkey_comment')->where("comment_id = '$comment_id'")->execute();
    }
    /**
     * 任务互评列表页
     */
    public function action_mark(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	$base_uri = $this->_base_uri;
    	//获取任务信息
    	//$task_info = $this->get_task_info();
    	$where = "model_code = '$this->_model_code' and origin_id = '$task_id'";
    	$marks = DB::select()->from('witkey_mark')->where($where)->execute();
    	//互评状态
    	$mark_status = Keke_user_mark::get_mark_status();
    	//互评项
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_mark');
    }
    
  

    
}