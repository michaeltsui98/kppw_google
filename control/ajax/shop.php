<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.1
 */
class Control_ajax_task extends Controller{
   function action_index(){
   	//$list = Dbfactory::query(' select price,title,service_id,pic from '.TABLEPRE.'witkey_service where shop_id = '.$shop_id.' and service_status=2 order by on_time desc limit 0,4');
	DB::select(' price,title,service_id,pic ')->from('witkey_service')
	->where(" shop_id = '.{$_GET['shop_id']}.' and service_status=2")
	->order(' on_time desc ')->limit(0,4)->execute();
   	require Keke_tpl::template ('ajax/ajax_shop');
   }
}
