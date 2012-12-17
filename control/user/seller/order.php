<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-服务商-发布的商品
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_seller_order extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'order';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/seller/order');
	}
 
}