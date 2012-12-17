<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 任务相关的ajax调用
 * 2011-10-08下午02:57:33
 */

class Control_ajax_task extends Controller{
     function action_index(){
     	extract($_GET,EXTR_SKIP);
     	switch ($ajax) {
     		case "work_comment" : //稿件回复
     			$comment_info = keke_task_class::get_comment ( 'work', $task_id, $work_id, $work_uid );
     			break;
     		case "mark_aid" : //辅助评价
     			$aid_info = keke_user_mark_class::get_user_aid ( $auid, $mark_type, $mark_status, 1, null, $obj_id );
     			break;
     		case 'tao_goods' :  //淘宝客获取商品
     			$page_no or $page_no = 1;
     			$data = Sys_taobaoke::get_items_info ( $nick, $page_no );
     			break;
     	}
     	require Keke_tpl::template ( "ajax/ajax_task");
     }
}




