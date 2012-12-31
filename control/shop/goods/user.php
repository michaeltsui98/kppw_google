<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心任务列表与编辑
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_shop_goods_user extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'goods';
	
 	/**
	 * 我买的商品订单信息
	 */
  	function action_index(){
  		self::$_default = 'buyer';
		Control_user_buyer_index::init_nav();
	
		require Keke_tpl::template('control/shop/goods/tpl/user/buyer');
	}  
	
 	/**
	 * 我卖出的商品订单
	 */
	function action_seller(){
			
	
		require Keke_tpl::template('control/shop/goods/tpl/user/seller');
	}
	
	/**
	 * 发布的商品列表
	 */
	function action_pub(){
		 self::$_left .= 'pub';
		 
		require Keke_tpl::template('control/shop/goods/tpl/user/pub');
	}
	/**
	 * 商品编辑 
	 */
	function action_edit(){
		self::$_left .= 'pub';
		Control_user_seller_index::init_nav();
		require Keke_tpl::template('control/shop/goods/tpl/user/pub_edit');
	}
	
	
	
	
}