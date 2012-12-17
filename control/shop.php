<?php
/**
 * this not free,powered by keke-tech
 * @author hr
 * @charset:GBK  last-modify 2012-1-7-下午3:29:50
 * @version V2.0
 */
 defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$nav_active_index = 'shop';
$page_title=$_lang['weike_shop'].'- '.$_K['html_title'];
 //$p_cat = $indus_p_arr;
 //$c_cat = $indus_c_arr;
/*  $indstry_sql = '(select b.indus_id,b.indus_pid,b.indus_name,b.is_recommend
 				 from '.TABLEPRE.'witkey_industry a left join '.TABLEPRE.'witkey_industry as b ON
 				 b.indus_pid = a.indus_id where a.indus_pid = 0  )
 				 UNION (select c.indus_id,c.indus_pid,c.indus_name,c.is_recommend from  '.TABLEPRE.'witkey_industry c
 				 where c.indus_pid = 0 and c.is_recommend = 1 )';
 $industry_arr = dbfactory::query($indstry_sql, true, 60*60); */

 $clean_industry_arr = array();
 Keke::get_tree(Keke::$_indus_arr, $clean_industry_arr, '');
 
 !$status && $status = 'hot' ;
 
 $fields = 'service_id,pic,ad_pic,leave_num,title,content,price,sale_num';
 $table = 'witkey_service';
 $where = 'service_status=2';
 switch ($status){
 	case 'latest' ://最新
 		$order = 'on_time desc';
 		break;
 	case 'highprice' ://最高金额
 		$order = 'price desc';
 		break;
 	case 'hot' ://默认最热
 		$order = 'views desc';
 }
 $services_list = $Keke -> get_table_data($fields, $table, $where, $order, '', '0,16', 'service_id', 60*60);
 $top2 = array_splice($services_list,0,2);

 //统计_交易中选稿中
 $sql = " select count(order_id) from %switkey_order where model_id in(6,7) and order_status in ('ok','accept','send') ";
$count_record = dbfactory::get_count ( sprintf($sql,TABLEPRE));
	require Keke::$_tpl_obj->template ('shop');
 