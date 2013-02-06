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
	
	private static $task_info = array();
	
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
		
		$base_uri = PHP_URL . "/task/sreward_user";
		
		$uri = $this->_uri;
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		
		$list_arr = $data ['data'];

		$pages = $data ['pages'];
		
		require Keke_tpl::template('control/task/sreward/tpl/user/task_list');
	}
 
	/**
	 * 发布的任务信息
	 * @param string $status
	 * @return array
	 */
	function pub_task($status,$cond=NULL){
		$sql = "SELECT a.task_id,a.task_cash,a.task_title,a.work_num,a.start_time,\n".
				"a.task_status status_id,a.sub_status,a.real_cash,a.uid,a.username,\n".
				"b.model_code,b.config,\n".
				"c.`status` task_status,c.scode status_scode,\n".
				"f.`status` work_status,e.uid wuid,e.username wusername,\n".
				"e.work_id,e.work_price,\n".
				"g.mobile,g.qq,\n".
				"k.mark_status,k.mark_id,\n".
				"o.order_id,o.price,o.num\n".
				"FROM :keke_witkey_task a  \n".
				"left join :keke_witkey_model b \n".
				"on a.model_id = b.model_id \n".
				"left join :keke_witkey_status c \n".
				"on c.model_code = b.model_code and  c.stype='task' and  c.sid = a.task_status\n".
				"left join :keke_witkey_task_work e \n".
				"on a.task_id = e.task_id and work_status = 1 \n".
				"left JOIN  :keke_witkey_status f \n".
				"on e.work_status = f.sid and f.stype='work' and c.model_code = b.model_code\n".
				"left join :keke_witkey_space g \n".
				"on e.uid = g.uid\n".
				"left join :keke_witkey_mark k \n".
				"on a.task_id = k.origin_id and b.model_code = k.model_code and k.mark_type = 'seller' and k.by_uid = a.uid\n".
				"left join :keke_witkey_order_detail o \n".
				"on a.task_id = o.obj_id and o.obj_type = 'task'";
				
	
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
		
		$this->_default_ord_field = 'a.task_id';
	
		$base_uri = PHP_URL . "/task/sreward_user";
		$edit_uri = $base_uri."/edit";
		
		extract ( $this->get_url ( $base_uri ) );
		
		if( $status =='hp'){
			 $where .= " and k.mark_status =0 ";	
		}elseif( $status == 'jf'){
			 $where .= " and a.task_status = 6 and a.sub_status = 1";
		}elseif ($status=='xg'){
			$where .= " and  (c.scode = '$status' or c.scode='tg') ";
		}elseif($status){
			$where .= " and  c.scode = '$status' ";
		}
		if($cond){
			
			$where .= " and $cond";
		}
		
		$where .= "  and a.uid = ".self::$uid."  and a.model_id = '1'";
		
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;

		return (array)Model::sql_grid($sql,$where,$uri,$order,'group by a.task_id');
	}
	/**
	 * 任务状态的信息处理
	 * @param array $task_info
	 */
	function pub_task_status($task_info){
		$str = '';
		if($task_info['status_scode']=='jf' AND $task_info['sub_status']==1){
			$str .= '<p><a onclick="return kdel(this,\'确认验收后，将付款给中标用户？\')" href="'.PHP_URL.'/task/sreward_user/gz_confirm/'.$task_info['task_id'].'" >确认验收</a></p>';
		}elseif($task_info['status_scode']=='wait'){
			$str .='<p>';
			$str .='<a href="'.USER_URL.'/finance_recharge?order_id='.$task_info['order_id'].'&cash='.$task_info['price'].'">付款</a>';
			$str .='</p>';
		}elseif($task_info['status_scode']=='hp' and $task_info['mark_id']>0){
			$str = '<p><a href="'.PHP_URL.'/mark/?id='.$task_info['mark_id'].'">互评</a></p>';
		}
		return $str;
	}
	/**
	 * 中标人的信息处理
	 * @param array $task_info
	 */
	function pub_task_bid($task_info){
		$str  = '';
		if(in_array($task_info['status_scode'],array('jf','end','hp'))){
			$str .= '<p>';
			$str .= '<a href="#">'.$task_info['wusername'].'</a>';
			$str .= '</p>';
			$str .='<p>'.$task_info['mobile'].'</p>';
			if($task_info['qq']){
				$str .='<p>';
				$str .=	'<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='.$task_info['qq'].'&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:253773980:46"></a>';
				$str .='</p>';
			}
		}
		return $str;
	}
	
	function action_buyer_work(){
		$task_id  = (int)$_GET['task_id'];
		$status = $_GET['status'];
		$sql ="SELECT a.*,\n".
				"c.`status`,c.scode,\n".
				"e.uid,e.username,e.mobile,e.qq,\n".
				"r.m_title ,r.m_ico,\n".
				"cast((e.seller_good_num/e.seller_total_num)*100 as decimal(10,2)) seller_good_rate,\n".
				"GROUP_CONCAT(conv(oct(f.file_id),8,10)) fids,\n".
				"group_concat(f.file_name) fnames,\n".
				"GROUP_CONCAT(f.save_name) fsnames\n".
				"from keke_witkey_task_work a \n".
				"left join keke_witkey_task b \n".
				"on a.task_id = b.task_id \n".
				"left join keke_witkey_model m\n".
				"on b.model_id = m.model_id \n".
				"left join keke_witkey_status c\n".
				"on a.work_status = c.sid and c.model_code = m.model_code and c.stype = 'work'\n".
				"left join keke_witkey_space e \n".
				"on a.uid  = e.uid \n".
				"left join keke_witkey_mark_rule r \n".
				"on r.mark_rule_id = e.seller_level\n".
				"left join keke_witkey_file f\n".
				"on f.obj_type='work' 
				and f.obj_id = a.work_id and b.uid = ".self::$uid."
				and f.pid = a.task_id\n";
			
		
		$sql = DB::query($sql)->tablepre('keke_')->compile(Database::instance());
		
		$this->_default_ord_field = 'a.work_id';
		
		$base_uri = PHP_URL.'/task/sreward_user/buyer_work?task_id='.$task_id;
		
		extract ( $this->get_url ( $base_uri ) );
		
		 
		if($status){	
			$where .= " and c.scode='$status' ";
		}
		
		$where .= " and  m.model_code = 'sreward' and b.task_id=".$task_id;
		
		$group_by = ' group by a.work_id';
		
		$data = Model::sql_grid($sql,$where,$base_uri,$order,$group_by);
		
		$work_list = $data['data'];
			
		$pages = $data['pages']['page'];
		
		self::$task_info = $this->get_task_info($task_id);
		
		require Keke_tpl::template('control/task/sreward/tpl/user/buyer_work');
	}
	
	function work_op($work_info){

	 
		$task_obj = new Control_task_sreward_info($this->request, $this->response);
		return $task_obj->work_op($work_info,self::$task_info);
		 
	}
	
	
	function get_task_info($task_id){
		
		$task_obj = new Control_task($this->request, $this->response);
		return $task_obj->get_task_info($task_id);
	}
	
	/**
	 * 雇主确认验收,打款给威客，结束任务交易，双方进行互评
	 */
	function action_gz_confirm(){
		$task_id = $this->request->param('id');
		$data = $this->pub_task('jf'," a.task_id = '$task_id'");
		$task_info = $data['data'][0];
		
		$task_config = unserialize($task_info['config']);
		//打款给中标者
		Sys_finance::get_instance($task_info['wuid'])->set_action('task_bid')
		->set_mem(array(':task_id'=>$task_id,':task_title'=>$task_info['task_title']))
		->set_obj('task', $task_id)
		->cash_in($task_info['real_cash'],0,$task_info['task_cash']-$task_info['real_cash']);
		
		//改变任务状态
		DB::update('witkey_task')
		->set(array('task_status','sub_status'))->value(array('7','3'))
		->where("task_id = $task_id and uid = ".self::$uid)
		->execute();
		
		//生成互记录,如果是一对多的话，这里要注意
		$array=array(
				'model_code'=>$task_info['model_code'],
				'origin_id'=>$task_info['task_id'],
				'obj_id'=>$task_info['work_id'],
				'obj_cash'=>$task_info['work_price'],
				'uid'=>$task_info['wuid'],
				'username'=>$task_info['wusername'],
				'by_uid'=>$task_info['uid'],
				'by_username'=>$task_info['username'],
				'mark_status'=>0,
				'mark_value'=>0,
				'mark_max_time'=>SYS_START_TIME+($task_config['max_mark']*3600*24),
				'mark_type'=>'seller'
		);
		
		Model::factory('witkey_mark')->setData($array)->create();
			
		$array['uid']=$task_info['uid'];
		$array['username']=$task_info['username'];
		$array['by_uid']=$task_info['wuid'];
		$array['by_username']=$task_info['wusername'];
		$array['mark_type']='buyer';
			
		Model::factory('witkey_mark')->setData($array)->create();
		
		//发通知
		Keke_msg::instance()->to_user($task_info['wuid'])
		->set_tpl('task_confirm_accept')
		->set_var(array('{任务标题}'=>$task_info['task_title'],'{中标金额}'=>(float)$task_info['real_cash']))
		->send();
		
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
		Model::factory ( 'witkey_task' )->setData ( $array )
		->setWhere ( "task_id = '$task_id'" )->update ();
		
		$this->request->redirect ( "task/sreward_user/edit?task_id=$task_id" );
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
				"where a.task_id = '{$_GET['task_id']}' and a.uid = self::$uid";
		//删除任务与稿件
		DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
		//删除任务与稿件的附件
		File::del_file_by_task($_GET['task_id'],self::$uid);
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
	 * 我参与的任务
	 */
	function action_seller(){
		self::$_default = 'seller';
		self::$_left = 'sreward';
		Control_user_seller_index::init_nav();
		$query_fields = array ('b.task_id' => '任务ID', 'b.task_title' => '任务标题');
		
		$model_name = Keke::$_model_list[1]['model_name'];
		
		$status = $_GET['status'];
		
		$base_uri = PHP_URL . "/task/sreward_user/seller";
		
		$seller_work_uri = PHP_URL.'/task/sreward_user/seller_work';
		
		$sql = "SELECT \n".
				"a.work_id, a.work_time, \n".
				"b.task_id,b.model_id,b.task_status,b.sub_status,b.task_title,b.task_cash, \n".
				"c.`status` tstatus,\n".
				"e.uid,e.username,e.mobile,e.qq\n".
				"from keke_witkey_task_work a  \n".
				"left join keke_witkey_task b  \n".
				"on a.task_id = b.task_id  \n".
				"left join keke_witkey_model m \n".
				"on b.model_id = m.model_id \n".
				"left join keke_witkey_status c\n".
				"on b.task_status = c.sid and c.model_code = m.model_code and c.stype = 'task'\n".
				"left join keke_witkey_mark k \n".
				"on a.work_id = k.obj_id \n".
				"and k.origin_id = b.task_id \n".
				"and k.mark_type='buyer'".
				"left join keke_witkey_space e\n".
				"on b.uid  = e.uid\n";
				//"where a.uid = :uid and m.model_code = 'sreward' \n";
		$sql= DB::query($sql)->tablepre('keke_')->compile(Database::instance());		 
	    	
		extract ( $this->get_url ( $base_uri ) );
		
		if( $status =='hp'){
			$where .= " and k.mark_status =0 ";
		}elseif( $status == 'jf'){
			$where .= " and b.task_status = 6 and b.sub_status = 1";
		}elseif ($status=='xg'){
			$where .= " and  (c.scode = '$status' or c.scode='tg') ";
		}elseif($status){
			$where .= " and  c.scode = '$status' ";
		}
		
		$where .= "  and  a.uid = ".self::$uid." and m.model_code = 'sreward'";
		
		$data = (array)Model::sql_grid($sql,$where,$uri,$order,'group by a.task_id');
		
		$list_arr = $data ['data'];
		
		$pages = $data ['pages']['page'];
		
		
		require Keke_tpl::template('control/task/sreward/tpl/user/task_seller');
	}
	/**
	 * 我参与任务的稿件
	 */
	function action_seller_work(){
		self::$_default = 'seller';
		self::$_left = 'sreward';
		Control_user_seller_index::init_nav();
		$query_fields = array ('a.work_id' => '稿件ID', 'b.work_desc' => '稿件内容');
		$base_uri = PHP_URL.'/task/sreward_user/seller_work?task_id='.$_GET['task_id'];
		$sql="SELECT \n".
				"a.work_id, a.work_time,a.work_desc, \n".
				"b.task_id,b.model_id,b.task_status,b.sub_status,b.task_title,b.task_cash, \n".
				"c.`status` work_status,c.scode work_scode, \n".
				"d.mark_status,d.mark_id, \n".
				"e.uid,e.username,e.mobile,e.qq, \n".
				"f.scode task_scode \n".
				"from keke_witkey_task_work a  \n".
				"left join keke_witkey_task b  \n".
				"on a.task_id = b.task_id  \n".
				"left join keke_witkey_model m \n".
				"on b.model_id = m.model_id \n".
				"left join keke_witkey_mark d\n".
				"on d.origin_id=a.task_id and d.obj_id=a.work_id and d.by_uid=a.uid and d.mark_type='buyer'\n".
				"left join keke_witkey_status c\n".
				"on a.work_status = c.sid and c.model_code = m.model_code and c.stype = 'work'\n".
				"left join keke_witkey_status f\n".
				"on b.task_status = f.sid and f.model_code = m.model_code and f.stype = 'task'\n".
				"left join keke_witkey_space e\n".
				"on b.uid  = e.uid";
		
		extract ( $this->get_url ( $base_uri ) );
		
		if($_GET['status']=='jf'){
			$where.="and b.task_status=6 and b.sub_status<1";
		}elseif($_GET['status']=='hp'){
			$where.="and d.mark_status < 1";
		}elseif($_GET['status']) {
			$where .= " and  c.scode ='{$_GET['status']}' ";
		}
		
		$where .= "  and a.uid = self::$uid and a.task_id = {$_GET['task_id']} and m.model_code = 'sreward'  ";
		
		$sql = DB::query($sql)->tablepre('keke_')->compile(Database::instance());
		
		$data=Model::sql_grid($sql,$where,$uri,$order);
		
		$work_list=$data['data'];
		$pages=$data['pages'];
		
		require Keke_tpl::template('control/task/sreward/tpl/user/seller_work');
	}
	
	function action_wk_confirm(){
		$task_id = (int)$this->request->param('id');
		$where="task_id= '$task_id'";
		Model::factory('witkey_task')->setData(array('sub_status'=>1))->setWhere($where)->update();
		//$this->request->redirect ( "task/sreward_user/seller?status=jf" );
	}
	/**
	 * 我参与搞件的操作
	 * @param array $v work_info
	 * @return string
	 */
	function join_task_op($v){
		if($v['task_status']=='6' && $v['sub_status']=='0'){
			$str = '<p><a onclick="return kdel(this,\'是否确认交付？\')" href="'.PHP_URL.'/task/sreward_user/wk_confirm/'.$v['task_id'].'" >确认交付</a></p>';
		}elseif($v['task_status']=='6' && $v['sub_status']=='1'){
			$str = '<p><a href="#" >提醒验收</a></p>';
		}elseif($v['task_status']=='7' and $v['mark_id']>0){
			$str = '<p><a href="'.PHP_URL.'/mark/?id='.$v['mark_id'].'">互评</a></p>';
		}else{
			$str = "<p>{$v['work_status']}</p>";
		}
		return $str;
	}
	
	
	
	
}