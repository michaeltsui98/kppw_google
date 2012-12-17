<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 行业管理
 * @author Michael
 * @version 2.2
   2012-10-10
 */

class Control_admin_config_indus extends Control_admin{
    /**
     * 行业列表
     */    
	function action_index(){
		global $_K,$_lang;
		//获取所有的行业数据
		$indus_arr = DB::select()->from('witkey_industry')->execute();
		//排序
		sort ( $indus_arr );
		//删除uri
		$del_uri = BASE_URL.'/index.php/admin/config_indus/del';
		//添加，编辑uri
		$add_uri = BASE_URL.'/index.php/admin/config_indus/add';
		$t_arr = array ();
		//生成树开数组
		Keke::get_tree ( $indus_arr, $t_arr, 'cat', NULL, 'indus_id', 'indus_pid', 'indus_name' );
		$indus_tree_arr =$t_arr;
		unset ( $t_arr );
		
		$indus_index_arr = Sys_indus::get_indus_by_index ();
		
		require Keke_tpl::template("control/admin/tpl/config/indus");
	}
	
	/**
	 * 批量保存行业数据
	 */
	function action_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
		 
		//行业名称数组,indus_id => indus_name
		$names = $_POST['names'];
		$orders = $_POST['orders'];
		$no = array();
		//合并要更新的名称与排序
		foreach ($names as $k=>$v){
			$no[$k] = array('name'=>$v,'order'=>$orders[$k]);
		}
		//要更新的数据插入到数据库
		foreach ($no as $k=>$v){
			$columns = array('indus_name','listorder');
			$values = array($v['name'],$v['order']);
			$where = "indus_id = '$k'";
			$res += DB::update('witkey_industry')->set($columns)->value($values)->where($where)->execute();
		}
		//新增的行业排序
		$add_indus_name_listarr  = $_POST['add_indus_name_listarr'];
		//新增的行业名称
		$add_indus_name_arr = $_POST['add_indus_name_arr'];
		//合并新增的名称与排序
		$add_arr = array();
		if($add_indus_name_arr){
			foreach ($add_indus_name_arr as $k=>$v) {
				$t = array();
				foreach ($v as $i=>$j){
				  $t[] = array('pid'=>$k,'name'=>$v[$i],'order'=>$add_indus_name_listarr[$k][$i]);
				}
				$add_arr[$k] = $t;
			}
		}
		//新增的数据插入到库
		if($add_arr){
			foreach ($add_arr as $k=>$v){
				$columns = array('indus_pid','indus_name','listorder');
				foreach ($v as $v1){
					$values = array($v1['pid'],$v1['name'],$v1['order']);
					DB::insert('witkey_industry')->set($columns)->value($values)->execute();
				}
			}
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_indus','success');
	}
	/**
	 * 删除行业数据
	 */
	function action_del(){
		//删除子行业
		if($_GET['indus_id']){
			$indus_id = $_GET['indus_id'];
			echo DB::delete('witkey_industry')->where("indus_id = '$indus_id'")->execute();
		}
		//如果父行业,则 删除父下的子行业。
		if($_GET['indus_pid']<=0){
		    DB::delete('witkey_industry')->where("indus_pid = $indus_id")->execute();		
		}
		
	}
	/**
	 * 初始化行业添加页面
	 */
	function action_add(){
		global $_K,$_lang;
		
		$indus_pid = $_GET['indus_pid'];
		$indus_id = $_GET['indus_id'];
		
		$indus_arr = DB::select()->from('witkey_industry')->execute();
		//排序
		sort ( $indus_arr );
	 
		$temp_arr = array ();
		//生成树开数组
		Keke::get_tree ( $indus_arr, $temp_arr, 'option', $indus_pid, 'indus_id', 'indus_pid', 'indus_name' );
		if($indus_id){
        	$where = "indus_id = '$indus_id'";
			$indus_info= DB::select()->from('witkey_industry')->where($where)->get_one()->execute();
		}
		require Keke_tpl::template("control/admin/tpl/config/indus_add");
	}
	/**
	 * 单个行业的编辑，保存
	 */
	function action_add_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
		//不允许添加三级分类
		$check_pid = DB::select('indus_pid')->from('witkey_industry')->where("indus_id = {$_POST['slt_indus_pid']}")->get_count()->execute();
		if($check_pid>0){
			Keke::show_msg('只允计添加二级分类，系统不支持三级分类','admin/config_indus/add','warning');
		}
		$columns = array('indus_pid','indus_name','is_recommend','listorder');
		$values = array($_POST['slt_indus_pid'],$_POST['indus_name'],$_POST['is_recommend'],$_POST['listorder']);
		//编辑数据
		if($_POST['hdn_indus_id']){
			$where = "indus_id = '{$_POST['hdn_indus_id']}'";
			DB::update('witkey_industry')->set($columns)->value($values)->where($where)->execute();
			$uri  = "?indus_id={$_POST['hdn_indus_id']}&indus_pid={$_POST['slt_indus_pid']}";
		}else{
		//添加数据
			DB::insert('witkey_industry')->set($columns)->value($values)->execute();
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_indus/add'.$uri,'success');
	}
	/**
	 * 业务合并初始化页面
	 */
	function action_merge(){
		global $_K,$_lang;
		 //获取行业信息
		$indus_p_arr =  Keke::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', 0 );
		//提交合并信息
		if($_POST){
			$url = 'admin/config_indus/merge';
			//来源行业
			$slt_indus_id = $_POST['slt_indus_id'];
			//目标行业
			$to_indus_id = $_POST['to_indus_id'];
			//提交的参数不能为空!
			($to_indus_id or $slt_indus_id) or Keke::show_msg($_lang['target_industry_not_top'],$url,'warning');
			//相同的行业不能全并
			($slt_indus_id != $to_indus_id) or Keke::show_msg('同一个行业不能合并',$url,'warning'); 
			//更新原行业的子行业
			DB::update('witkey_industry')->set(array('indus_pid'))->value(array($to_indus_id))->where("indus_pid='$slt_indus_id'")->execute();
			//删除来源父行业
			DB::delete('witkey_industry')->where("indus_id = '$slt_indus_id'")->execute();
			Keke::show_msg($_lang['industry_union_success'],$url,'success');
		}
		
		require Keke_tpl::template('control/admin/tpl/config/indus_merge');
	}
}