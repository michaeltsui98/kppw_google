<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 个人空间商品展示
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */


// 商品展示
$sql = "select * from " . TABLEPRE . "witkey_service where ";
$csql = sprintf ( "select count(service_id) as c  from `%switkey_service` where", TABLEPRE );
$where = " uid=" . intval ( $member_id ) . " and  service_status = 2 ";
$title&&$title!==$_lang['to_search_product_name'] and $where .= " and title like '%" . $title . "%'";
//分类区域显示需要的查询
$searh_sql = sprintf(' select count(service_id) c,indus_id,indus_pid from %switkey_service where %s group by indus_id',TABLEPRE,$where);
$searh_arr = Dbfactory::query($searh_sql);
$indus_id and $where .= " and indus_id = $indus_id";
$i_c  = Dbfactory::query(sprintf(' select count(service_id) c,indus_id,indus_pid from %switkey_service where %s group by indus_id',TABLEPRE,$where));

$where.=" order by on_time desc";
$page_size = 8;
$page = $page ? $page : 1;
$url = "index.php?do=space&member_id=$member_id&view=goods&indus_id=$indus_id";
$count = intval ( Dbfactory::get_count ( $csql . $where, 0, null, 3600 ) );
$Keke->_page_obj->setAjax(1);
$Keke->_page_obj->setAjaxDom('goods');
$pages = $Keke->_page_obj->getPages ( $count, $page_size, $page, $url );
$where .= $pages ['where'];
$shop_arr = Dbfactory::query ( $sql . $where );

$indus_arr = $Keke->_indus_arr;
require keke_tpl_class::template ( SKIN_PATH . "/space/{$type}_{$view}" );

