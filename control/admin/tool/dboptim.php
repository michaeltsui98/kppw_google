<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 数据库优化
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-20下午13:25:13
 */
class Control_admin_tool_dboptim extends Control_admin{
	
	/**
	 * 表优化,加载模板用的
	 */
	function action_index(){
		global $_K,$_lang;
		//所有的表状态
		$table_arr = Dbfactory::query ( "SHOW TABLE STATUS FROM `" . DBNAME . "` LIKE '" . TABLEPRE . "%'" );
		//获取可以优化的表
		$optim_table_list = array();
		foreach ( $table_arr as $k => $v ) {
			//碎片数据大于>0的表 
			if($v ['Data_free'] > 0){
				$optim_table_list[$k]=$v;
			} 
		}
		require Keke_tpl::template('control/admin/tpl/tool/dboptim');
	}
	/**
	 * 表修复，加载模板用的
	 */
	function action_repair(){
		 
		require Keke_tpl::template('control/admin/tpl/tool/dbrepair');
	}
	/**
	 * 优化
	 */
	function action_optim(){
		global $_K,$_lang;
		$optimizetables = $_POST['optimizetables'];
		if(empty($optimizetables)){
			Keke::show_msg ( $_lang ['no_select_table'], 'admin/tool_dboptim',  'warning' );
		}
		 
		foreach ( $optimizetables as $v ) {
			//优化表
			Dbfactory::execute ( "OPTIMIZE TABLE " . $v ); 
		}
		Keke::show_msg ( $_lang ['operate_success'], 'admin/tool_dboptim',  'success' );
	}
	/**
	 * 修复
	 */
	function action_dbrepair(){
		global $_K,$_lang;
		
		$table_arr = Dbfactory::query ( " SHOW TABLES" );
		//修复表
		foreach ( $table_arr as $v ) {
			Dbfactory::execute ( "REPAIR TABLE " . $v ['Tables_in_' . DBNAME] );
		}
		Keke::show_msg (  $_lang ['operate_success'], 'admin/tool_dboptim/repair', 'success' );
	}
	
}