<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$page_title=$pro_info['art_title'].' - '.$_K['html_title'];
$pro_ids = array(218,219,220,221);
!$pro_id||!in_array($pro_id, $pro_ids) and Keke::keke_show_msg('', $_lang['the_agreement_not_exist'],'error','normal');
$pro_info = dbfactory::get_one(sprintf("select * from %switkey_article where art_id='%d'",TABLEPRE,$pro_id));
$title = $pro_info['art_title'];
require Keke_tpl::template ( $do );