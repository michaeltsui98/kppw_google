<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-9-01 11:35:13
 */
defined ( "IN_KEKE" ) or exit ( "Access Denied" ); //控制权限
kekezu::admin_check_role(70);
$realname_obj = new Keke_witkey_auth_realname_class (); //实例化实名认证表
$url = "index.php?do=" . $do . "&view=" . $view . "&auth_code=" . $auth_code . "&w[page_size]=" . $w [page_size] . "&w[realname_a_id]=" . $w [realname_a_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; //跳转地址
if (isset ( $ac )) {
	switch ($ac) {
		case "pass" : //单条通过认证操作
			kekezu::admin_system_log($obj.$_lang['pass_realname_auth']);
			$auth_obj->review_auth ( $realname_a_id, 'pass' );
			break;
		case "not_pass" : //单条不通过认证操作
			kekezu::admin_system_log($obj.$_lang['nopass_realname_auth']);
			$auth_obj->review_auth ( $realname_a_id, 'not_pass' );
			break;
			;
		case 'del' : //单条删除认证申请
			kekezu::admin_system_log($obj.$_lang['delete_realname_auth']);
			$auth_obj->del_auth ( $realname_a_id );
			break;
	}
} elseif (isset ( $sbt_action )) {
	$keyids = $ckb;

	switch ($sbt_action) {
		case $_lang['mulit_delete'] : //批量删除
			kekezu::admin_system_log($_lang['mulit_delete_realname_auth']);
			$auth_obj->del_auth ( $keyids );
			break;
			;
		case $_lang['mulit_pass'] : //批量审核
			kekezu::admin_system_log($_lang['mulit_pass_realname_auth']);
			$auth_obj->review_auth ( $keyids, 'pass' );
			break;
			;
		case $_lang['mulit_nopass'] : //批量不审核
				
			kekezu::admin_system_log($_lang['mulit_nopass_realname']);
			$auth_obj->review_auth ( $keyids, 'not_pass' );
			break;
	}
} else //列表
{
	$where = " 1 = 1 "; //默认查询条件
	($w ['auth_status'] === "0" and $where .= " and auth_status = 0 ") or ($w ['auth_status'] and $where .= " and auth_status = '$w[auth_status]' "); //搜索认证状态
	intval ( $w ['realname_a_id'] ) and $where .= " and realname_a_id = " . intval ( $w ['realname_a_id'] ) . ""; //搜索认证编号
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; //搜索认证标题
	$where.=" order by realname_a_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; //每页显示多少条，默认10
	$realname_obj->setWhere ( $where ); //查询统计
	$count = $realname_obj->count_keke_witkey_auth_realname ();
	intval ( $page ) or $page = 1 and $page = intval ( $page );
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	//查询结果数组
	$realname_obj->setWhere ( $where . $pages [where] );
	$realname_arr = $realname_obj->query_keke_witkey_auth_realname ();
	require $kekezu->_tpl_obj->template ( "auth/" . $auth_dir . "/control/admin/tpl/auth_list" );
}