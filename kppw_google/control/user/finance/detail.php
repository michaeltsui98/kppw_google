<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页-收支明细
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_finance_detail extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'detail';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/finance/detail');
	}
}