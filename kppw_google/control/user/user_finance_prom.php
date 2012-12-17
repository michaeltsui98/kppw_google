<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 用户中心推广
 * @copyright keke-tech
 * @author deng
 * @version v 2.0
 * 2011-10-9 12:10
 */


$shows = array ("relation", "income" );//关系。收益
in_array ( $show, $shows ) or $show = 'income';

$page_obj = $Keke->_page_obj;
$page_size and $page_size=intval ( $page_size ) or $page_size = '10';
$page and $page=intval ( $page ) or $page = '1';
$event_id and $event_id= intval($event_id);
$url = "index.php?do=user&view=finance&op=$op&show=$show&page_size=$page_size&page=$page";
switch($show){
	case "income":
		$status_arr = keke_prom_class::get_pevent_status();
		$event_obj=new Keke_witkey_prom_event_class();
		$ord_arr=array("event_id desc"=>$_lang['prom_id_desc'],"event_id asc"=>$_lang['prom_id_asc'],"rake_cash desc"=>$_lang['gain_cash_desc'],"rake_cash asc"=>$_lang['gain_cash_asc']);
		//查询获得的推广收益（已完成的）
		$where=" parent_uid='$uid'";
		$prom_count=Keke::get_table_data("sum(rake_cash) as cash ,sum(rake_credit) as credit","witkey_prom_event",$where);
		//搜索条件
		$event_id&&$event_id!=$_lang['input_prom_id'] and $where .= "and event_id= '$event_id'";
		$ord and $where .= "order by $ord" or $where .="order by event_id desc";
		$event_obj->setWhere($where);
		$count=intval($event_obj->count_keke_witkey_prom_event());
		$pages = $page_obj->getPages ( $count, $page_size, $page, $url, '#userCenter' );
		$event_obj->setWhere ( $where . $pages ['where'] );
		$event_arr = $event_obj->query_keke_witkey_prom_event ();	
		break;
	case "relation":
		$status_arr = keke_prom_class::get_prelation_status();
		$type_arr = keke_prom_class::get_prom_type();
		$relation_obj=new Keke_witkey_prom_relation_class();
		$ord_arr=array("on_time desc"=>$_lang['prom_time_desc'],"on_time asc"=>$_lang['prom_time_asc']);
		//搜索条件
        $where =  " prom_uid= '$uid' ";
		$relation_id&&$relation_id!=$_lang['please_input_relation_id'] and $where .="and relation_id ='$relation_id' ";
		$ord and $where .= "order by $ord" or $where .= " order by relation_id desc";
		$relation_obj->setWhere($where);
		$count=intval($relation_obj->count_keke_witkey_prom_relation());
		$pages=$page_obj->getPages($count, $page_size, $page, $url,'#userCenter');
		$relation_obj->setWhere($where . $pages['where']);
		$relation_arr=$relation_obj->query_keke_witkey_prom_relation();
		
		break;
}



require keke_tpl_class::template ( SKIN_PATH."/user/" . $do . "_" . $view . "_" . $op);