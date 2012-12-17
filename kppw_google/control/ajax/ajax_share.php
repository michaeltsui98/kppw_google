<?php	defined ( 'IN_KEKE' ) or exit('Access Denied');
/**
 * ajax分享控制层,页面传递title过来即可
 */


$ops = array('site','center');
in_array($op,$ops) or $op='site';
$sina_app_id = $Keke->_sys_config['sina_app_id'];
$sohu_app_id = $Keke->_sys_config['sohu_app_id'];
$seo_title = $Keke->_sys_config['seo_title'];
intval($oid) or $oid = null;
switch ($op){
	case 'site':
		break;
	case 'center':
		$title = $_lang['task_share'];
		$tid = intval($task_id);
		if($tid){
			$plats = $Keke->_api_open;
				unset($plats['taobao']);
			$apis  = keke_glob_class::get_open_api();
			$url   = $_K['siteurl'].'/index.php?do=task&task_id='.$tid;
			$share_title = Dbfactory::get_count(sprintf(' select task_title from %switkey_task where task_id=%d',TABLEPRE,$tid));
		}
		break;
}
if($share_title){
	$share_title .= "@".$Keke->_sys_config['website_name'];
}else{
	$share_title = $title.'-'.$Keke->_sys_config['website_name'];
}
// strval($share_title) and $share_title .= "@".$Keke->_sys_config['website_name'] or $share_title = $Keke->_sys_config['website_name'];
//搜索的title 要作转码处理
strtolower(CHARSET)=='gbk' and $utitle = urlencode(Keke::gbktoutf($share_title)) or $utitle = urlencode($share_title);
require $Keke->_tpl_obj->template ( 'ajax/ajax_share' );