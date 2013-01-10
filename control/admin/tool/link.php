<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台友连管理的控制器
 * @author michael
 *
 */

class Control_admin_tool_link extends Control_admin {
	
	 
	function action_index() {
		 
		global $_lang;
		
		 
		$fields = ' `link_id`,`link_name`,`link_url`,`listorder`,`on_time` ';
		 
		$query_fields = array('link_id'=>$_lang['id'],'link_name'=>$_lang['name'],'on_time'=>$_lang['time']);
		 
		 
		$base_uri = BASE_URL."/index.php/admin/tool_link";
		
		 
		$add_uri =  $base_uri.'/add';
		 
		$del_uri = $base_uri.'/del';
		 
		$this->_default_ord_field = 'on_time';
		 
		extract($this->get_url($base_uri));
		 
		$data_info = Model::factory('witkey_link')->get_grid($fields,$where,$uri,$order);
		 
		$link_arr = $data_info['data'];
		 
		$pages = $data_info['pages']['page'];
 		
		require Keke_tpl::template('control/admin/tpl/tool/link');
	}
	
	//添加与编辑初始化
	function action_add(){
		
		
		if(isset($_GET['link_id'])){
			$link_id = $_GET['link_id'];
			$link_info = DB::select()->from('witkey_link')->where("link_id = '$link_id'")->get_one()->execute();
		}
		$link_pic = $link_info['link_pic'];
		if(strpos($link_pic, 'http')!==FALSE){
			$mode = 1;
		}else{
			$mode = 2;
		}
		
		require Keke_tpl::template('control/admin/tpl/tool/link_add');
	}
	/**
	 * 保存模板上提交到的数据到数据库中
	 * 这个acton 是通用的，不要随便定义这个名称
	 * 
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		
		Keke::formcheck($_POST['formhash']);
		
		if($_POST['showMode'] ==1){
			$link_pic = $_POST['txt_link_pic'];
		}elseif(!empty($_FILES['fle_link_pic']['name'])){
			
			$link_pic = File::upload_file('fle_link_pic');
		}
		$arr = array('link_name'=>$_POST['txt_link_name'],
				     'link_url'=>$_POST['txt_link_url'],
					 'link_pic'=>$link_pic,
					 'listorder' => $_POST['txt_listorder'],
				     'on_time'=>time(),				  
		);
       if($_POST['hdn_link_id']){
			$where = "link_id ='{$_POST['hdn_link_id']}'";
			DB::update('witkey_link')->set(array_keys($arr))->value(array_values($arr))->where($where)->execute();
			$this->request->redirect('admin/tool_link/add?link_id='.$_POST['hdn_link_id']);
		}else{
		 	DB::insert('witkey_link')->set(array_keys($arr))->value(array_values($arr))->execute();
			$this->request->redirect('admin/tool_link/add');
		}
	}
	/**
	 * 这里是删除的action 主要是处理要单条删除
	 * 与多条删除。
	 * 规矩，删除action的名称统一del,不要问为什么
	 * 单条删除，传主键名称与值就可以删除了
	 * 多条删除的，是前端js拼接好的ids传过来的值.js 只传ids 的哟。不要写成主键名称
	 * 
	 */
	function action_del(){
		if(isset($_GET['link_id'])){  
			$where = "link_id = '{$_GET['link_id']}'";
		}elseif(isset($_GET['ids'])){
			$where = "link_id in ('{$_GET['ids']}')";
		}
		echo DB::delete('witkey_link')->where($where)->execute();
	}
	
}
