<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-账号安全
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_auth extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'auth';
	/**
	 * 实名认证
	 */
	function action_index(){
		
		require Keke_tpl::template('user/account/auth_realname');
	}
 
	/**
	 * 企业认证
	 */
	function action_enter(){
	
	
		require Keke_tpl::template('user/account/auth_enter');
	}

}