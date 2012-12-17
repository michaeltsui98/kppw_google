<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
class Control_admin_user_group extends Control_admin{
	function action_index(){
		//加载全局变量和语言包
		global $_K,$_lang;
		//需要显示的字段
		$list_arr = DB::select()->from('witkey_member_group')->where('1=1')->execute();
		//页面uri
		$base_uri = BASE_URL.'/index.php/admin/user_group';
		//编辑uri
		$edit_uri = $base_uri.'/edit';
		//删除uri
		$del_uri = $base_uri.'/del';
		require keke_tpl::template("control/admin/tpl/user/group");
	}
	function action_add(){
		global $_K,$_lang;
		//一级标题
		$menus_arr = Keke_admin::get_admin_menu();
 
		//权限中加黑部分语言包
		$menu_arr = array (
				'config' => $_lang['global_config'],
				'article' => $_lang['article_manage'],
				'task' => $_lang['task_manage'],
				'shop' => $_lang['shop_manage'],
				'finance' => $_lang['finance_manage'],
				'user' => $_lang['user_manage'],
				'tool' => $_lang['system_tool'],
		);
		//获取group_id，存在判断是编辑
		$group_id=$_GET['group_id'];
		if ($group_id){
			$groupinfo_arr = DB::select()->from('witkey_member_group')->where('group_id ='. $group_id)->get_one()->execute();
		
		}
		$grouprole_arr = explode ( ',', $groupinfo_arr ['group_roles'] );
		require keke_tpl::template("control/admin/tpl/user/group_add");
	}
	function action_save(){
		//防止sql注入，
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交
		keke::formcheck($_POST['formhash']);
		//获取选中的多选条件的group_id，为数组
		$group_roles = $_POST['chb_resource'];
		//将数组转化为字符串
		
		$group_roles = implode(",", (array)$group_roles);
		
		if($_POST['txt_groupname']){
			$txt_groupname = $_POST['txt_groupname'];
		}else{
			Keke::show_msg('组名不能为空！！','admin/user_group/add','warning');
		}
		//需要进行存储的字段
		$array = array('group_id'=>$_POST['group_id'],
				'groupname'=>$txt_groupname,
				'group_roles'=>$group_roles,
				'on_time'=>time()
				);
		if ($_POST['hdn_gid']){
			//编辑情况下提交，更新
			Model::factory('witkey_member_group')->setData($array)->setWhere('group_id = '.$_POST['hdn_gid'])->update();
			Keke::show_msg('编辑成功','admin/user_group/add?group_id='.$_POST['hdn_gid'],'success');
		}else{
			//添加情况下提交，直接插入
			Model::factory('witkey_member_group')->setData($array)->create();
			Keke::show_msg('提交成功','admin/user_group/add','success');
		}
	}
	/*
	 * 通过group_id来删除需要删除的一行数据，无多行删除
	 *  @group_id int
	 **/
	function action_del(){
		if($_GET['group_id']){
			$where = 'group_id ='.$_GET['group_id'];
		}
		echo Model::factory('witkey_member_group')->setWhere($where)->del();
	}
}

