<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-基本资料
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_detail extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'detail';
	/**
	 * 工作经历
	 */
	function action_index(){
		
		require Keke_tpl::template('user/account/work_list');
	}
	/**
	 * 技能证书
	 */
	function action_skill(){
		
		
		require Keke_tpl::template('user/account/skill');
	}
	/**
	 * 持能标签
	 */
	function action_skill_tag(){

		require Keke_tpl::template('user/account/skill_tag');
	}
}