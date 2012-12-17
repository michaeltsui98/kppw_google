<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-9-01 11:35:13
 */
defined ( "IN_KEKE" ) or exit ( "Access Denied" ); //控制权限
kekezu::admin_check_role(77);
$mobile_obj = new keke_witkey_auth_mobile_class (); //实例化实名认证表
$url = "index.php?do=" . $do . "&view=" . $view . "&auth_code=" . $auth_code . "&w[page_size]=" . $w [page_size] . "&w[mobile_a_id]=" . $w [mobile_a_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; //跳转地址
if (isset ( $ac )) {
	switch ($ac) {
		case "pass" : //单条通过认证操作
			
			kekezu::admin_system_log($obj.$_lang['mobile_auth_pass']);
		
			$auth_obj->review_auth ( $record_id, 'pass' );
			break;
		case "not_pass" : //单条不通过认证操作
			kekezu::admin_system_log($obj.$_lang['mobile_auth_nopass']);
			$auth_obj->review_auth ( $record_id, 'not_pass' );
			break;
			;
		case 'del' : //单条删除认证申请
			kekezu::admin_system_log($obj.$_lang['mobile_auth_delete']);
			$auth_obj->del_auth ( $record_id );
			break;
	}
} elseif (isset ( $sbt_action )) {
	$keyids = $ckb;
	switch ($sbt_action) {
		case $_lang['mulit_delete']: //批量删除
			kekezu::admin_system_log($_lang['mulit_delete_mobile']);
			$auth_obj->del_auth ( $keyids );
			break;
			;
		case $_lang['mulit_pass']: //批量审核
			kekezu::admin_system_log($_lang['mulit_pass_mobile']);
			$auth_obj->review_auth ( $keyids, 'pass' );
			break;
			;
		case $_lang['mulit_nopass']: //批量不审核
			kekezu::admin_system_log($_lang['mulit_nopass_mobile']);
			$auth_obj->review_auth ( $keyids, 'not_pass' );
			break;
	}
} else //列表
{
	$where = " 1 = 1 "; //默认查询条件
	($w ['auth_status'] === "0" and $where .= " and auth_status = 0 ") or ($w ['auth_status'] and $where .= " and auth_status = '$w[auth_status]' "); //搜索认证状态
	intval ( $w ['mobile_a_id'] ) and $where .= " and mobile_a_id = " . intval ( $w ['mobile_a_id'] ) . ""; //搜索认证编号
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; //搜索认证标题
	$where.=" order by mobile_a_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; //每页显示多少条，默认10
	$mobile_obj->setWhere ( $where ); //查询统计
	$count = $mobile_obj->count_keke_witkey_auth_mobile();
	abs(intval ( $page )) or $page = 1 ;
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	 
	//查询结果数组
	$mobile_obj->setWhere ( $where . $pages [where] );
	$mobile_arr = $mobile_obj->query_keke_witkey_auth_mobile();
	require $kekezu->_tpl_obj->template ( "auth/" . $auth_dir . "/control/admin/tpl/auth_list" );
}