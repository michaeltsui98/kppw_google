<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 作品业务处理类
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_shop_goods_base extends Control_shop_base{
    
	/**
	 * 商品状态
	 * 上架和下架状态是对发布者而言，禁用和启用是针对管理员而言
	 */
	public static function get_goods_status() {
		global $_lang;
		return array ("2" => $_lang ['on_shelf'], "3" => $_lang ['down_shelf']);
	}
	
	/**
	 * 返回作品订单状态
	 * Enter description here ...
	 */
	public static function get_order_status() {
		global $_lang;
		return array ('wait' => $_lang ['wait_buyer_pay'], 'ok' => $_lang ['buyer_haved_pay'], 'send' => $_lang ['seller_haved_service'], 'confirm' => $_lang ['trade_complete'], 'close' => $_lang ['trade_close'], 'arbitral' => $_lang ['order_arbitrate'], 'complete' => $_lang ['trade_complete'] );
	}
 
}