<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-买家-我买的商品
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_user_buyer_faver extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 *
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'faver';
	function action_index(){
		global $_K,$_lang;
		 
		 
		
		require Keke_tpl::template('user/buyer/faver_goods');
	}
	function action_task(){
		 
		require Keke_tpl::template('user/buyer/faver_task');
	}
}