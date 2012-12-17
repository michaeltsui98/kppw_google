<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-9-01 11:35:13
 */
defined ( "IN_KEKE" ) or exit ( "Access Denied" ); //控制权限
kekezu::admin_check_role(69);
$enterprise_obj     = new Keke_witkey_auth_enterprise_class( );//实例化企业认证表对象
$url = "index.php?do=" . $do . "&view=" . $view . "&auth_code=" . $auth_code . "&w[page_size]=" . $w [page_size] . "&w[enterprise_auth_id]=" . $w [enterprise_auth_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; //跳转地址
if (isset ( $ac )) {
	switch ($ac) {
		case "pass" : //单条通过认证操作
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_pass']);			
			$auth_obj->review_auth ( $enterprise_auth_id, 'pass' ,$url);
			break;
		case "not_pass" : //单条不通过认证操作
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_nopass']);
			$auth_obj->review_auth ( $enterprise_auth_id, 'not_pass',$url );
			break;
			;
		case 'del' : //单条删除认证申请
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_delete']);
			$auth_obj->del_auth ( $enterprise_auth_id,$url );
			break;
	}
} elseif (isset ( $sbt_action )) {
	$keyids = $ckb;
	switch ($sbt_action) {
		case $_lang['mulit_delete'] : //批量删除
			kekezu::admin_system_log($_lang['mulit_delete_enterprise_auth']);
			$auth_obj->del_auth ( $keyids,$url );
			break;
			;
		case $_lang['mulit_pass'] : //批量审核
			kekezu::admin_system_log($_lang['mulit_pass_enterprise_auth']);
			
			$auth_obj->review_auth ( $keyids, 'pass',$url );
			break;
			;
		case $_lang['mulit_nopass'] : //批量不审核
		
			kekezu::admin_system_log($_lang['mulit_nopass_enterprise_auth']);
			$auth_obj->review_auth ( $keyids, 'not_pass',$url );
			break;
	}
} else{//列表
	$where = " 1 = 1 "; //默认查询条件
	($w ['auth_status'] === "0" and $where .= " and auth_status = 0 ") or ($w ['auth_status'] and $where .= " and auth_status = '$w[auth_status]' "); //搜索认证状态
	intval ( $w ['enterprise_auth_id'] ) and $where .= " and enterprise_auth_id = " . intval ( $w ['enterprise_auth_id'] ) . ""; //搜索认证编号
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; //搜索认证标题
	$where.=" order by enterprise_auth_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; //每页显示多少条，默认10
	$enterprise_obj->setWhere ( $where ); //查询统计
	$count = $enterprise_obj->count_keke_witkey_auth_enterprise();
	intval ( $page ) or $page = 1 and $page = intval ( $page );
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	//查询结果数组
	$enterprise_obj->setWhere ( $where . $pages [where] );
	$enterprise_arr = $enterprise_obj->query_keke_witkey_auth_enterprise();
}
require $kekezu->_tpl_obj->template ( "auth/" . $auth_dir . "/control/admin/tpl/auth_list" );