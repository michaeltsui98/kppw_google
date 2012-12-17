<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心首页
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_user_buyer_index extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 *
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'index';
	function action_index(){
		global $_K,$_lang;
		 
		 
		
		require Keke_tpl::template('user/buyer/index');
	}
	function action_edit(){
		
		require Keke_tpl::template('user/buyer/task_edit');
	}
	
}