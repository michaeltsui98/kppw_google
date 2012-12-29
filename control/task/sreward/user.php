<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心任务列表与编辑
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_sreward_user extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'sreward';
	
	function before(){
		parent::before();
		Control_user_buyer_index::init_nav();
	}
	/**
	 * 我发布的任务
	 */
	function action_index(){
		
		$model_name = Keke::$_model_list[1]['model_name'];
		
		$query_fields = array ('a.task_id' => '任务ID', 'a.task_title' => '任务标题');
		
		$data = $this->pub_task($_GET['status']);
		
		$uri = $this->_uri;
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		
		$list_arr = $data ['data'];
		
		$pages = $data ['pages'];
		
		require Keke_tpl::template('control/task/sreward/tpl/user/task_list');
	}
 
	/**
	 * 查询任务信息
	 * @param unknown_type $status
	 * @return array
	 */
	function pub_task($status){
		$sql = "SELECT a.task_id,a.task_cash,a.task_title,a.work_num,a.start_time,\n".
				"c.`status` task_status,c.scode task_scode,\n".
				"f.`status` work_status,e.uid wuid,e.username wusername\n".
				"FROM keke_witkey_task a  \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id \n".
				"left join keke_witkey_status c \n".
				"on c.model_code = b.model_code and  c.stype='task' and  c.sid = a.task_status\n".
				"left join keke_witkey_task_work e \n".
				"on a.task_id = e.task_id and work_status = 1 \n".
				"left JOIN  keke_witkey_status f \n".
				"on e.work_status = f.sid and f.stype='work' and c.model_code = b.model_code\n";
	
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
	
	
		$this->_default_ord_field = 'a.task_id';
	
		$base_uri = PHP_URL . "/task/sreward_user";
		$edit_uri = $base_uri."/edit";
		
		extract ( $this->get_url ( $base_uri ) );
		
		$status and $where .= " and  c.scode = '$status' ";
		
		$where .= "  and a.uid = $this->uid  and a.model_id = '1'";
		
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;
			
		return (array)Model::sql_grid($sql,$where,$uri,$order);
	}
	/**
	 * 发布的任务编辑
	 */
	function action_edit(){

		
		
		$base_uri = PHP_URL . "/task/sreward_user";
		
		$save_uri=$base_uri."/save";
		$file_down_uri=$base_uri."/file_down";
		$del_uri=$base_uri."/del_file";
		$task_id = (int)$_GET ['task_id'];
	
		$sql = "SELECT a.task_id,a.indus_id,a.task_status,a.task_title,a.contact,a.task_desc,a.att_desc,a.task_cash ,\n".
				"GROUP_CONCAT(b.save_name) save_name,\n".
				"GROUP_CONCAT(b.file_name) file_name,\n".
				"GROUP_CONCAT(conv(oct(b.file_id),8,10)) file_id FROM :keke_witkey_task a \n".
				"left join :keke_witkey_file b \n".
				"on a.task_id = b.obj_id  and obj_type = 'task'\n".
				"where a.task_id=:task_id\n".
				"group by a.task_id";
		$task_info = DB::query($sql)->tablepre(':keke_')->param(':task_id', $task_id)->get_one()->execute();
	
		$file_info =array_map(NULL,explode(',',$task_info['save_name']),
								   explode(',', $task_info['file_name']),
								   explode(',', $task_info['file_id']));
	
		$indus_arr = Sys_indus::get_indus_tree($task_info['indus_id']);
		if($file_info[0][0]){
			$length = 5-sizeof($file_info);
		}else{
			$length = 5;
		}
		$ext = File::flash_upload_ext();
	 
	
		require Keke_tpl::template('control/task/sreward/tpl/user/task_edit');
	}
	/**
	 * 保存任务信息
	 */
	function action_save(){
		
		Keke::formcheck ( $_POST ['formhash'] );
		$_POST = Keke_tpl::chars ( $_POST );
	
		$array=array(
				'indus_id'=>$_POST['sel_indus_id'],
				'task_title'=>$_POST['txt_task_title'],
				'contact'=>$_POST['txt_contact'],
				'task_desc'=>$_POST['txa_task_desc'],
				'att_desc'=>$_POST['txa_att_desc'],
		);
		$task_id = $_POST ['hdn_task_id'];
		Model::factory ( 'witkey_task' )->setData ( $array )->setWhere ( "task_id = '$task_id'" )->update ();
		
		$this->request->redirect ( "task/sreward_user/edit?task_id=$task_id" );
	}
	/**
	 * 删除任务
	 */
	function action_del(){
		$where = 'task_id='.$_GET['task_id'];
		DB::delete('witkey_task')->where($where)->execute();
	}
	/**
	 * 删除任务附件
	 */
	function action_del_file(){
		File::del_att_file($_GET['fid'],$_GET['file_path']);
	}
	
	/**
	 *
	 */
	function action_file_down(){
		$file_name=$_GET['file_name'];
		$file_path=$_GET['file_path'];
		File::file_down($file_name, $file_path);
	}
	
	/**
	 * 我参与的任务
	 */
	function action_seller(){
		self::$_default = 'seller';
		self::$_left = 'sreward';
		
		require Keke_tpl::template('control/task/sreward/tpl/user/task_seller');
	}
	
	
	
	
}