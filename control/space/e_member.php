<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 个人空间商品展示
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */


$sm_obj = keke_table_class::get_instance('witkey_shop_member');
$url    = $_K['siteurl'].'/index.php?do=space&member_id='.$member_id.'&view=member';
$page   = max($page,1);
$data   = $sm_obj->get_grid('shop_id='.$e_shop_info['shop_id'],$url,$page,3,' order by member_id desc',1,'m_list');
$m_arr  = $data['data'];
$pages  = $data['pages'];

require keke_tpl_class::template ( SKIN_PATH . "/space/{$type}_{$view}" );

