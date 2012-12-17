<?php
/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-26早上11:49:00
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

$link_obj = new Keke_witkey_link_class();

/*图片友情链接  */
$link_obj->setWhere(" link_pic !='0'  order by listorder asc");
$pic_link_arr = $link_obj->query_keke_witkey_link();

/*文字友情链接  */
$link_obj->setWhere("  link_pic ='0'  order by listorder asc");
$word_link_arr = $link_obj->query_keke_witkey_link();



require Keke_tpl::template ( $do );