<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心任务列表与编辑
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_mreward_user extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'mreward';
	
	private  static $task_id ;
	
	/**
	 * 我发布的任务
	 */
	function action_index(){
		 
		Control_user_buyer_index::init_nav();
		
		$model_name = Keke::$_model_list[2]['model_name'];
		
		$query_fields = array ('a.task_id' => '任务ID', 'a.task_title' => '任务标题');
		
		$data = $this->pub_task($_GET['status']);
		
		$base_uri = PHP_URL . "/task/sreward_user";
		
		$uri = $this->_uri;
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		
		$list_arr = $data ['data'];
		$pages = $data ['pages'];
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_list');
	}
	/**
	 * 发布的任务信息
	 * @param string $status
	 * @return array
	 */
	function pub_task($status,$cond=NULL){
		$sql = "select a.task_id,a.model_id,a.task_status,a.task_title,a.start_time,a.task_cash,a.work_num,\n".
				" b.`status`\n".
				" from :keke_witkey_task a\n".
				" left join :keke_witkey_status b\n".
				" on b.sid=a.task_status and b.model_code='mreward' and b.stype='task'";
	
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
	
		$this->_default_ord_field = 'a.task_id';
	
		$base_uri = PHP_URL . "/task/sreward_user";
		$edit_uri = $base_uri."/edit";
	
		extract ( $this->get_url ( $base_uri ) );
	
		$where .= "  and a.uid = ".self::$uid;
	
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;
	
		return (array)Model::sql_grid($sql,$where,$uri,$order,'group by a.task_id');
	}
	/**
	 *  获取稿件信息
	 */
	function action_get_work(){
		self::$_default = 'buyer';
		self::$_left = 'mreward';
		Control_user_buyer_index::init_nav();
		self::$task_id = (int)$_GET['task_id'];
		$query_fields = array ('c.work_id' => '任务ID', 'c.work_desc' => '任务标题');
		
	   $sql="select a.task_id,a.task_status,\n".
		   	"c.work_id,c.uid,c.work_desc,c.work_price,	c.work_status,c.work_time,\n".
			"d.`status`,\n".
			"b.username,b.mobile,b.qq\n".
			"from :keke_witkey_task a\n".
			"left join :keke_witkey_task_work c\n".
			"on c.task_id=a.task_id\n".
			"left join :keke_witkey_status d\n".
			"on d.sid=c.work_status and d.model_code='mreward' and d.stype='work'\n".
	   		"left join :keke_witkey_space b\n".
	   		"on b.uid=c.uid";
			$sql=DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
			$this->_default_ord_field = 'c.work_id';
			
			$base_uri = PHP_URL . "/task/mreward_user/get_work";
			
			extract ( $this->get_url ( $base_uri ) );
			$task_id=self::$task_id;
			$where .= " and c.task_id = $task_id";
			if($_GET['status']){
				$where .=" and d.scode='{$_GET['status']}'";
			}
			$this->_uri = $uri;
			$this->_ord_tag = $ord_tag;
			$this->_ord_char = $ord_char;
			$data=Model::sql_grid($sql,$where,$uri,$order);
			$work_list=$data['data'];
			$pages=$data['pages'];
			 
			require Keke_tpl::template('control/task/mreward/tpl/user/work_list');
	}
	/**
	 * 设置奖项
	 */
	function action_change_status(){
		$prize = (int)$_GET['prize'];
		$work_id= (int)$_GET['work_id'];
		$task_id=(int)$_GET['task_id'];
		$sql="update :keke_witkey_task_work a  \n".
				"left join :keke_witkey_task b\n".
				"on a.task_id=b.task_id\n".
				"set a.work_price = (\n".
				"select (prize_cash/prize_count)\n".
				"from :keke_witkey_task_prize \n".
				"where task_id=:task_id and prize=:prize),\n".
				"a.work_status=:prize\n".
				"where a.work_id = :work_id and b.uid=:uid";
		$arr = array(':task_id'=>$task_id,':prize'=>$prize,':work_id'=>$work_id,':uid'=>self::$uid);
		$sql=DB::query($sql,Database::UPDATE)->tablepre(':keke_')->parameters($arr)->execute();
		$this->refer();
	}
	/**
	 * 发布的任务编辑  
	 */
	function action_edit(){
		self::$_default = 'buyer';
		self::$_left = 'mreward';
		Control_user_buyer_index::init_nav();
		
		$base_uri = PHP_URL . "/task/mreward_user/edit";
		$save_uri = PHP_URL . "/task/mreward_user/save";
		$file_down_uri = PHP_URL . "/task/mreward_user/file_down";
		$del_uri = PHP_URL . "/task/mreward_user/del_file";
		$task_id = (int)$_GET ['task_id'];
		
		$sql =  "SELECT a.task_id,a.task_title,a.task_desc,a.indus_id,a.contact,a.att_desc,\n".
				"GROUP_CONCAT(conv(oct(b.file_id),8,10)) file_id,\n".
				"GROUP_CONCAT(b.save_name) save_name,\n".
				"GROUP_CONCAT(b.file_name) file_name,\n".
				"c.prize,c.prize_count,c.prize_cash\n".
				"FROM keke_witkey_task a \n".
				"left join keke_witkey_file b \n".
				"on b.obj_id = a.task_id and b.obj_type = 'task'\n".
				"LEFT JOIN (\n".
				"select GROUP_CONCAT(conv(oct(prize),8,10)) prize , \n".
				"GROUP_CONCAT(conv(oct(prize_count),8,10)) prize_count,\n".
				"GROUP_CONCAT(conv(oct(prize_cash),8,10)) prize_cash \n".
				"from keke_witkey_task_prize where task_id = :task_id\n".
				") c \n".
				"on 1 = 1\n".
				"where a.task_id=:task_id \n".
				"group by a.task_id";
		$task_info = DB::query($sql)->tablepre(':keke_')->param(':task_id', $task_id)->get_one()->execute();
		$file_info =array_map(NULL,explode(',',$task_info['save_name']),
				explode(',', $task_info['file_name']),
				explode(',', $task_info['file_id']));
		$cash_info =array_map(NULL,explode(',',$task_info['prize']),
				explode(',', $task_info['prize_count']),
				explode(',', $task_info['prize_cash']));
		
		$indus_arr = Sys_indus::get_indus_tree($task_info['indus_id']);
		if($file_info[0][0]){
			$length = 5-sizeof($file_info);
		}else{
			$length = 5;
		}
		$ext = File::flash_upload_ext();
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_edit');
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
	
		$this->request->redirect ( "task/mreward_user/edit?task_id=$task_id" );
	}
	/**
	 * 删除任务附件
	 */
	function action_del_file(){
		File::del_att_file($_GET['fid'],$_GET['file_path']);
	}
	
	/**
	 *附近下载
	 */
	function action_file_down(){
		$file_name=$_GET['file_name'];
		$file_path=$_GET['file_path'];
		File::file_down($file_name, $file_path);
	}
	/**
	 * 删除任务
	 */
	function action_del(){
		$sql = "delete a.*,b.*,c.*,d.* \n".
				"FROM keke_witkey_task a \n".
				"left JOIN  keke_witkey_task_work b\n".
				"on a.task_id = b.task_id \n".
				"left join keke_witkey_task_bid c\n".
				"on a.task_id = c.task_id\n".
				"left join keke_witkey_comment d\n".
				"on a.task_id = d.obj_id and d.obj_type = 'task'\n".
				"where a.task_id = '{$_GET['task_id']}' and a.uid = ".self::$uid;
		//删除任务与稿件
		DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
		//删除任务与稿件的附件
		File::del_file_by_task($_GET['task_id'],self::$uid);
	}
	
	/**
	 * 我参与的任务
	 */
	function action_seller(){
		self::$_default = 'seller';
		self::$_left = 'mreward';
		Control_user_seller_index::init_nav();
		$query_fields = array ('a.task_id' => '任务ID', 'b.task_title' => '任务标题');
		
		$sql =  "SELECT a.work_id, a.work_time,a.work_status,\n".
				"b.task_id,b.model_id,b.task_status,b.sub_status,b.task_title,b.task_cash,\n".
				"a.work_price * (1-(b.profit_rate/100)) as bid_cash, a.work_price,\n".
				"c.`status`,c.scode work_scode,\n".
				"d.mark_status,d.mark_id,\n".
				"e.uid,e.username,e.mobile,e.qq,\n".
				"f.scode task_scode\n".
				"from :keke_witkey_task_work a \n".
				"left join :keke_witkey_task b \n".
				"on a.task_id = b.task_id \n".
				"left join :keke_witkey_model m\n".
				"on b.model_id = m.model_id \n".
				"left join :keke_witkey_mark d\n".
				"on d.origin_id=a.task_id and d.obj_id=a.work_id and d.uid=a.uid and d.mark_type=1 \n".
				"left join :keke_witkey_status c\n".
				"on a.work_status = c.sid and c.stype = 'work' and c.model_code='mreward'\n".
				"left join :keke_witkey_status f\n".
				"on b.task_status = f.sid and f.stype = 'task'\n".
				"left join :keke_witkey_space e\n".
				"on b.uid  = e.uid\n";
		
		$base_uri = PHP_URL . "/task/sreward_user";
		
		extract ( $this->get_url ( $base_uri ) );
		
		if($_GET['status']){
			$where .= " and  c.scode ='{$_GET['status']}' ";
		}
		
		$where .= "  and a.uid = ".self::$uid." and b.model_id = '2'";
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
		$group_by=" GROUP BY a.task_id ";
		
		$data=Model::sql_grid($sql,$where,$uri,$order,$group_by);
		
		$work_list=$data['data'];
		$pages=$data['pages'];
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_seller');
	}


	
}