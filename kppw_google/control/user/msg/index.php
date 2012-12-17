<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-写信
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_msg_index extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'msg';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'index';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/msg/index');
	}
}