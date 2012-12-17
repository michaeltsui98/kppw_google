<?php

/**
 * @copyright keke-tech
 */
defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0);
$views = array('list','send');
in_array($view,$views) or $view='list';

switch ($view){
	case "list"://ÊÕ
		$ops = array('get','send');
		in_array($op,$ops) or $op='get';
		$ls = max($ls,0);
		$le = max($le,10);
		$sql = 'select * from %switkey_msg where 1=1 ';
		$op=='get' and $sql.=' and to_uid=%d' or $sql.=' and uid=%d';
		$sql.=' limit %d,%d';
		$info = db_factory::query(sprintf($sql,TABLEPRE,$uid,$ls,$le));
		$count = db_factory::execute(sprintf($sql,TABLEPRE,$uid,$ls,$le));
		kekezu::echojson($count,1,$info);
		break;
	case "send"://·¢
		$title= kekezu::escape($title);
 		$content = kekezu::escape($content);
		keke_msg_class::send_private_message($title,$content,$to_uid, $to_username,'','json');
		break;
}
die();
