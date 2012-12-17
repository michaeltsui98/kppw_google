<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-推广赚钱
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_prom extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'prom';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/account/prom');
	}
}