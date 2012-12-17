<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-服务商-店铺管理
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_seller_shop extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'shop';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/seller/shop');
	}
	function action_case(){
	
	
	
		require Keke_tpl::template('user/seller/shop_case');
	}
	function action_member(){
	
	
	
		require Keke_tpl::template('user/seller/shop_member');
	}
}