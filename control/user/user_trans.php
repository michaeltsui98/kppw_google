<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8下午06:42:39
 */


$transrights_object = keke_report_class::get_transrights_obj(); //交易维权对象
$objs = array_keys($transrights_object);
if($task_open==0){
	unset($objs[0],$objs[1],$transrights_object['task'],$transrights_object['work']);
}
if($shop_open==0){
	unset($objs[2],$objs[3],$transrights_object['service'],$transrights_object['order']);
}
$objs = array_merge($objs);
in_array($obj,$objs) or $obj =$objs[0]; //默认交易维权对象

/**
 * 子集菜单
 */
$sub_nav=array(
	array(
	   "rights"=>array('交易维权',"key"),
	   "report"=>array('交易举报',"shield"),
	   "complaint"=>array('投诉建议',"openid")))
	;
$ops = array('rights',"report","complaint");
in_array ( $op, $ops ) or $op = 'rights';
if($op=='complaint'){
  $obj = 'kppw21';
}
$ac_url = $origin_url . "&op=$op";

$role or $role = '1'; //交易维权角色   :1=>我发起的  ,2=>我收到的
intval ( $status ) or $status = ''; //默认状态为所有
$report_obj = new Keke_witkey_report_class (); //实例交易维权对象


$where = " 1 = 1 ";
intval ( $page ) or $page = "1";
intval ( $page_size ) or $page_size = "10";
$url = $ac_url . "&role=$role&status=$status&obj=$obj&ord=$ord&page_size=$page_size&page=$page";
if ($ac) {
	switch ($ac) {
		case "download" :
			keke_file_class::file_down ( $filename, $filepath );//下载相应文件
			break;
		case "del" :
			if ($report_id) {
				$res = Dbfactory::execute (sprintf(" delete from %switkey_report where report_id='%d'",TABLEPRE,$report_id));
				$filepath and keke_file_class::del_file($filepath);//删除相应文件
				$res and Keke::show_msg ( $_lang['system prompt'], $url."#userCenter", '1', $_lang['delete'] . $action_arr [$op] . $_lang['record_success'], 'alert_right' ) or Keke::show_msg ( $_lang['operate_notice'], $url."#userCenter", "1", $_lang['delete'] . $action_arr [$op] . $_lang['record_fail'],"alert_error" );
				//$res and Keke::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['delete'] . $action_arr [$op] . $_lang['record_success'],'success' ) or Keke::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['delete'] . $action_arr [$op] . $_lang['record_fail'],"warning" );
			} else
				Keke::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['please_select_delete'] . $action_arr [$op] . $_lang['record'], "alert_error" );
			break;
	}
} else {
	$transrights_status = keke_report_class::get_transrights_status (); //交易维权状态
	$transrights_type   = keke_report_class::get_transrights_type();//交易维权类型
	/**
	 *三级菜单 
	 */
	$third_title = Keke::lang($op.'_manage');
	//if($op!='complaint'){
	 $third_nav = array (
	  "launched" => array ($_lang['launch'].$_lang['de'].$transrights_type[$op]['1'],"",1),
	  "received" => array ($_lang['receive'].$_lang['de'].$transrights_type[$op]['1'],"",2)
	);

	
	//var_dump($op);
	/**
	 * @todo 排序
	 */

	$ord_arr = array (" report_id desc " => $action_arr[$op] . $_lang['num_desc'], " report_id asc " => $action_arr[$op] . $_lang['num_asc'], " on_time desc " => $_lang['submit_time_desc'], " on_time asc " => $_lang['submit_time_asc'] );
	$page_obj = $Keke->_page_obj; //分页对象
	$role == 1 and $where .= " and uid='$uid' " or $where .= " and to_uid='$uid' ";
	$status and $where .= " and report_status='$status'";
	$obj and $where .= " and obj='$obj'";
	$op and $where .= " and report_type = '".$transrights_type[$op]['0']."'";
	$ord and $where .= " order by $ord " or $where .= " order by on_time desc ";
	//var_dump($where);
	$report_obj->setWhere ( $where );
	$count = intval ( $report_obj->count_keke_witkey_report () ); //统计
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url, "#userCenter" );
	
	$report_obj->setWhere ( $where . $pages ['where'] );
	$report_list = $report_obj->query_keke_witkey_report ();
	//var_dump($report_list);
}

require keke_tpl_class::template ( "user/" . $do . "_" . $view);