<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 个人资料
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-上午11:04:44
 * @version V2.0
 */

$skill_obj = new Keke_witkey_member_ext_class();


//威客技能
//$skill_arr = explode(',', $member_info['skill_ids']); 

$indus_arr =  $Keke->_indus_arr ;

//技能证书 
 $skill_obj->setWhere(" uid = ".intval($member_id)." and type='cert' order by ext_id desc ");
 $skill_info = $skill_obj->query_keke_witkey_member_ext();
 foreach ($skill_info as $k=>$v) {
	$v['v1'] = preg_replace("/\..*/", "",  $v['v1']);
 	$skill_desc_arr[$k] = $v; 
 }

//个人经历
$skill_obj->setWhere("uid = ".intval($member_id)." and type='exp' order by ext_id desc limit 0, 5");
$skill_exp_arr = $skill_obj->query_keke_witkey_member_ext();
//获取保密
$sect_info = Keke::get_table_data ( "*", "witkey_member_ext", " type='sect' and uid='$member_id' ", "", "", "", "k" );
require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");

