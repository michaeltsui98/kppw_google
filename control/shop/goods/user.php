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
	protected static $_default = 'buyer';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'goods';
	
	
	function action_index(){
		
		
		require Keke_tpl::template('control/shop/goods/tpl/user/shop_list');
	}
	
	
	function action_edit(){
		
		require Keke_tpl::template('control/shop/goods/tpl/user/shop_edit');
	}
	
	
	
	
}