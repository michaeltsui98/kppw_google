<?php
 /**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-08ÏÂÎç02:57:33
 */

defined ( 'IN_KEKE' ) or exit('Access Denied');

intval($page) or $page = 1;
$url_str = "index.php?do=$do&view=$view&op=$op&opp=$opp";
$msg_obj = keke_table_class::get_instance("witkey_msg");
$msg_m = new Keke_witkey_msg_class();


/*É¾³ı¶¯×÷*/
if($ac=='del'&&$msg_id){
     $msg_m->setMsg_status(1);
	 $msg_m->setMsg_id($msg_id);
	 $res = $msg_m->edit_keke_witkey_msg();
	
    $res and Keke::show_msg( $_lang['delete_success'],$url_str."&page=$page",3,'','success') or Keke::show_msg( $_lang['delete_fail'],$url_str."&page=$page",3,"","warning");
}elseif($ckb){
   $res = $msg_obj->del("msg_id", array_filter($ckb));
   if($ckb){
	   	$sql = "update ".TABLEPRE."witkey_msg set msg_status=1 where msg_id in(".implode(',', $ckb).")";
		$res = dbfactory::execute($sql);
	    $res and Keke::show_msg( $_lang['delete_selected_success'],$url_str."&page=$page",3,'','success') or Keke::show_msg( $_lang['select_null_for_delete'],$url_str."&page=$page",3,"","warning") ;
   }else{
    	Keke::show_msg( $_lang['select_null_for_delete'],$url_str."&page=$page",3,"","warning") ;
   }
}else{
	$where.="and uid=$uid and msg_status!=1 ";
	$res = $msg_obj->get_grid($where, $url_str, $page,12);
	$data = $res['data'];
	$pages = $res['pages'];
}
require Keke_tpl::template ( "user/" . $do . "_".$view."_$op");
 

