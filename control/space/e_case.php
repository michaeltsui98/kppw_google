<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 个人空间商品展示
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */

$d_url = $Keke->_sys_config ['website_url'];

$member_id and $member_id = intval ( $member_id );

// 成功案例
$sql = "select a.*,a.indus_id in_id,b.* from " . TABLEPRE . "witkey_shop_case as a left join " . TABLEPRE . "witkey_service as b on a.service_id = b.service_id where  a.shop_id = " . $e_shop_info ['shop_id'] . " order by b.service_id desc ";

$url = "index.php?do=space&member_id=$member_id&view=case&page_size=$page_size";
$page_size = 3;
$count = Dbfactory::execute ( $sql );
$page = $page ? $page : 1;
$Keke->_page_obj->setAjax(1);
$Keke->_page_obj->setAjaxDom('case_list');
$pages = $Keke->_page_obj->getPages ( $count, $page_size, $page, $url );
$where = $pages ['where'];
$shop_arr = Dbfactory::query ( $sql . $where );
require keke_tpl_class::template ( SKIN_PATH . "/space/{$type}_{$view}" );

