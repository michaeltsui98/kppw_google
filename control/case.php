<?php
/**
 * ³É¹¦°¸Àý
 * @copyright keke-tech
 * @author Chen
 * @version v 1.2
 * 2012-01-11 14:10:00
 */
defined ( 'IN_KEKE' ) or exit('Access Denied');

$nav_active_index = "case";
$page_title=$_lang['success_case'].'- '.$_K['html_title'];
$indus_arr = Keke::$_indus_arr;
$model_type_arr  = Keke_global::get_task_type();
$sql =sprintf( "SELECT a.*, c.service_id,c.views,b.view_num,b.indus_id as b_indus_id,b.model_id as b_model_id,c.model_id as c_model_id,b.indus_pid as b_indus_pid ,c.indus_id as c_indus_id ,c.indus_pid as c_indus_pid,c.sale_num,b.work_num FROM %switkey_case a  left join %switkey_service c on  
		a.obj_id= c.service_id and a.obj_type='service'
		left join %switkey_task b ON
		a.obj_id = b.task_id and a.obj_type='task' where ",TABLEPRE,TABLEPRE,TABLEPRE);

$sql .= " 1=1 order by a.on_time desc";
$url = "index.php?do=case&page_size=$page_size";
$page_size = 6; 
$count_sql = sprintf("select count(case_id) as c from `%switkey_case`",TABLEPRE);
$count = dbfactory::get_count($count_sql,0,null,3600);
intval($page) and $page= intval($page) or $page=1 ;
$pages = Keke::$_page_obj->getPages ( $count, $page_size, $page, $url );
$sql .=$pages['where'];
$case_arr = dbfactory::query($sql);

require Keke_tpl::template ( $do );