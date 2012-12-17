<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-信息-收件箱
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_msg_in extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'msg';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'in';
	
	function action_index($type='all'){
		//编号 发件人		主题 	时间
		$fields = '`msg_id`,`uid`,`username`,`to_uid`,`to_username`,`title`,`msg_status`,`view_status`,`on_time`';
		$query_fields = array('title'=>'主题','on_time'=>'时间');
		
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'on_time';
		$base_uri = BASE_URL.'/index.php/user/msg_in/'.$type;
		$del_uri = BASE_URL.'/index.php/user/msg_in/del';
		$read_uri = BASE_URL.'/index.php/user/msg_in/read';
		extract($this->get_url($base_uri));
		//收件	条件
		switch ($type){
			case "all"://全部
				$where .=" and msg_status<>1 and to_uid = ".$_SESSION['uid'];
				break;
			case "unread"://未读
				$where .=" and view_status<>1 and msg_status<>1 and to_uid = ".$_SESSION['uid'];
				break;
			case "sys"://系统
				$where .=" and to_uid = ".$_SESSION['uid']." and uid<1 and msg_status<>1 ";
				break;
			case "unsys"://非系统
				$where .=" and to_uid = ".$_SESSION['uid']." and uid>1 and msg_status<>1 ";
				break;
		}
		
		$data_info = Model::factory('witkey_msg')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		
		require Keke_tpl::template('user/msg/in');
	}
	function action_info(){
		$from = $_GET['from'];//用来判断是收件(in)还是发件(out)
		if(empty($_GET['msg_id'])){
			$this->request->redirect('user/msg_in');
		}
		 
		self::$_left=$from;
		 
		
		$date_arr = DB::select()->from('witkey_msg')->where('msg_id = '.$_GET['msg_id'])->get_one()->execute();
		
		$del_url = BASE_URL.'/index.php/user/msg_'.$from.'/del?msg_id='.$_GET['msg_id'].'&action='.$_GET['action'];
		$del_url .= '&status='.$date_arr['msg_status'].'&is_sys='.$date_arr['uid'].'&ac=view';
		
		if($_GET['msg_id']&& $date_arr['view_status']<1&&$from!='out'){
			
			$this->change_view_status($_GET['msg_id']);
		}
		require Keke_tpl::template('user/msg/info');
	}
	
 
	
	function action_del(){
		if($_GET['msg_id']){
			//删除命令是否来于查看页面
			if($_GET['ac'] == 'view'){
				//返回下一条id
				//var_dump($_GET['action']);die;
				$next_msg_id = $this->to_next_one($_GET['action'],$_GET['msg_id']);
				$this->del_msg_by_status($_GET['msg_id'], $_GET['status'], $_GET['is_sys']);
				//跳到下一条
				if($next_msg_id){
					$uri = 'user/msg_in/info?msg_id='.$next_msg_id.'&from=in&action='.$_GET['action'];
				}else{
					$uri = 'user/msg_in/'.$_GET['action'];
				}
				$this->request->redirect($uri);
			}else{
				$this->del_msg_by_status($_GET['msg_id'], $_GET['status'], $_GET['is_sys']);
			}
		}elseif($_GET['ids']){
			(array)$msg_arr = explode(',',$_GET['ids']);
			foreach ($msg_arr as $v){
				list($msg_id,$status,$is_sys) = explode('|', $v);
				$this->del_msg_by_status($msg_id, $status, $is_sys);
			}
		}
		 
	}
	/**
	 * 删除或者改为状态
	 * @param int $msg_id
	 * @param int $status
	 * @param bool $is_sys
	 * @return int 
	 */
 	function del_msg_by_status($msg_id,$status,$is_sys){
		if($status == 0 and $is_sys==TRUE){
			return DB::update('witkey_msg')->set(array('msg_status'))->value(array(1))->where("msg_id = '$msg_id'")->execute();
		}else{
			return DB::delete('witkey_msg')->where("msg_id = '$msg_id'")->execute();
		}
	}
	//所有消息
	function action_all(){
		$this->action_index('all');
	}
	//未读消息
	function action_unread(){
		$this->action_index('unread');
	}
	//系统消息
	function action_sys(){
		$this->action_index('sys');
	}
	//非系统消息
	function action_unsys(){
		$this->action_index('unsys');
	}
	/**
	 * 设为已读
	 */
	function action_read(){
		(array)$msg_arr = explode(',',$_GET['ids']);
		$id = array();
		foreach ($msg_arr as $v){
			list($msg_id,$status,$is_sys) = explode('|', $v);
		    array_push($id, $msg_id);
		}
		 
	    $this->change_view_status($id); 
	    	
	}
	/**
	 * 改状态为已读
	 * @param int/array  $msg_id
	 */
	function change_view_status($msg_id){
		if(is_array($msg_id)){
			$msg_ids = implode(',', $msg_id);
			 
			DB::update('witkey_msg')->set(array('view_status'))->value(array(1))->where("msg_id in ($msg_ids)")->execute();
		}else{
			DB::update('witkey_msg')->set(array('view_status'))->value(array(1))->where("msg_id = $msg_id")->execute();
		}
	}
	function to_next_one($action,$msg_id){
		$where = " 1=1";
		switch ($action){
			case 'all':
			case "index"://全部
				$where =" msg_status!=1 and to_uid = ".$_SESSION['uid'];
				break;
			case "unread"://未读
				$where =" view_status!=1 and msg_status!=1 and to_uid = ".$_SESSION['uid'];
				break;
			case "sys"://系统
				$where =" to_uid = {$_SESSION['uid']} and uid<1 and msg_status!=1 ";
				break;
			case "unsys"://非系统
				$where =" to_uid = {$_SESSION['uid']} and uid>1 and msg_status!=1 ";
				break;
		}
		$where .= ' and msg_id < '.$msg_id;
		return DB::select('msg_id')->from('witkey_msg')
		->where($where)->order('msg_id desc')->limit(0, 1)
		->get_count()->execute();
	}
	
}