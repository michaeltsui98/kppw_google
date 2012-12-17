<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2010-11-23 下午16:59:00
 */
defined ( 'IN_KEKE' ) or exit('Access Denied');
Keke::check_login();
$agree_info = dbfactory::get_one(sprintf("select model_id,buyer_uid,seller_uid from %switkey_agreement where agree_id='%d'",TABLEPRE,$agree_id));

$agree_info or Keke::keke_show_msg("index.php",$_lang['illegal_in_no_exits'],'error');

$agree_info['buyer_uid']!=$uid&&$agree_info['seller_uid']!=$uid and Keke::keke_show_msg("index.php",$_lang['wain_you_no_double']);

$model_info = Keke::$_model_list[$agree_info['model_id']];
//任务模型
$model_info or Keke::keke_show_msg("index.php",$_lang['now_model_no_exits_no_in'],'error');

Keke_lang::package_init("task_".$model_info['model_dir']);
Keke_lang::loadlang("task_agreement");

require "task/".$model_info['model_dir']."/control/task_agreement.php";
