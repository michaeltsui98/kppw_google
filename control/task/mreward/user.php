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
	
	/**
	 * 我发布的任务
	 */
	function action_index(){
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_list');
	}
	/**
	 * 发布的任务编辑  
	 */
	function action_edit(){
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_edit');
	}
	/**
	 * 我参与的任务
	 */
	function action_seller(){
		self::$_default = 'seller';
		self::$_left = 'mreward';
		
		
		require Keke_tpl::template('control/task/mreward/tpl/user/task_seller');
	}
	
	
}