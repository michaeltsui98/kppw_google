<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 13:51:34
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$table_obj = keke_table_class::get_instance('witkey_service');
$indus_p_arr = $kekezu->_indus_p_arr;
$goods_status_arr = goods_shop_class::get_goods_status();
$status_arr = array("1"=>$_lang['wait_audit'],"4"=>$_lang['disable'],"5"=>$_lang['open']);
//检索条件
$wh = "model_id = 6";
$w['service_id'] and $wh .= " and service_id= ".$w['service_id'];
$w['title'] and $wh.=" and title like '%$w[title]%'";
$w['username'] and $wh.=" and username like '%$w[username]%' ";
$w['indus_pid'] and $wh .= " and indus_pid =" . $w['indus_pid'];
$w['service_status'] and $wh .= " and service_status=" . $w['service_status'];
$sbt_search and $wh.=" order by $ord" or $wh.=" order by service_id desc";
	

intval ( $page ) or $page = 1;
intval ( $w['page_size'] ) and $page_size = intval ( $w['page_size'] ) or $page_size = '10';
$url_str = "index.php?do=model&model_id=6&view=list&service_id={$w['service_id']}&service_status={$w['service_status']}&username={$w['username']}&w[indus_pid]={$w['indus_pid']}&ord[0]={$ord['0']}&ord[1]=$ord[1]&page=$page&w[page_size]=$page_size";

//查询
$table_arr = $table_obj->get_grid ( $wh, $url_str, $page, $page_size, null, 1, 'ajax_dom');
$goods_arr = $table_arr['data'];
$pages = $table_arr['pages'];

//操作 1.删除；2.启用；3.通过审核；4.禁用
if($ac){
	$service_arr  = db_factory::get_one(sprintf("select * from %switkey_service where service_id='%d' ",TABLEPRE,$service_id));
	$log_ac_arr = array("del"=>$_lang['delete'],"use"=>$_lang['open'],"disable"=>$_lang['disable'],"pass"=>$_lang['pass_audit']);
	$log_msg = $_lang['to_witkey_goods_name_is'].$service_arr['title'].$_lang['conduct'].$log_ac_arr[$ac].$_lang['operate'];
	kekezu::admin_system_log($log_msg);
	switch ($ac) {
		case 'del':
			goods_shop_class::set_on_sale_num($service_id,-1);
			$res = $table_obj->del('service_id', $service_id);
		 	$res and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_fail'],"warning");
			break;
		case 'pass'://上架
			$time = time()-$service_arr['on_time']; 
		 	keke_payitem_class::update_service_payitem_time($service_arr['payitem_time'], $time, $service_id);
		 	goods_shop_class::set_service_status($service_id, 2) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['goods_open_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['goods_open_fail'],"warning");
			break;
		case 'nopass'://下架
			goods_shop_class::set_service_status($service_id,3) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['goods_disable_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['goods_disable_fail'],"warning");
			break;
	}
}
//批量操作
if(isset($sbt_action)){
	$key_ids = $ckb;
	if(is_array($key_ids)){
		$action="aa";
		$log_mac_arr = array("del"=>$_lang['delete'],"user"=>$_lang['open'],"pass"=>$_lang['pass'],"disable"=>$_lang['disable']);
		$log_msg = $_lang['to_witkey_goods_conduct_mulit'].$log_mac_arr[$sbt_action].$_lang['operate'];
		kekezu::admin_system_log($log_msg);
		switch ($sbt_action){
			case $_lang['mulit_delete']:
				$res = $table_obj->del('service_id',$key_ids);
				$action=$_lang['delete'];				
				break;
			case $_lang['batch_shelves']: 
				foreach ($key_ids as $v) {
					$service_info = kekezu::get_table_data("*","witkey_service","service_id = $v");
					$service_info = $service_info['0'];
					$add_time = time()-$service_info['on_time'];
					keke_payitem_class::update_service_payitem_time($service_info['payitem_time'], $add_time, $v); 
				}
				$res = goods_shop_class::set_service_status($key_ids, 2);
				$action = $_lang['shelves'];
				break;
			case $_lang['batch_off_the_shelf']:
				$res = goods_shop_class::set_service_status($key_ids, 3);
				$action = $_lang['off_the_shelf'];
				break;
		}
		$res and kekezu::admin_show_msg($_lang['mulit'].$action.$_lang['success'],$url_str,2,$_lang['mulit'].$action.$_lang['success']) or kekezu::admin_show_msg($_lang['mulit'].$action.$_lang['fail'],$url_str,2,$_lang['mulit'].$action.$_lang['fail'],"error");
	}
}


require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/control/admin/tpl/goods_' . $view );