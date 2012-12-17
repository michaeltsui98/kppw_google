<?php
/**
 * @todo 商品上架（发布）路由控制
 * @author Chen
 * 2011 10:29 10:37
 */
defined ( 'IN_KEKE' ) or exit('Access Denied');
Keke::check_login();

Keke_lang::package_init("shop");
Keke_lang::loadlang("release");
$page_title= $_lang['pub_witkey_service'] . $_K ['html_title'];

$model_list = Keke::get_table_data ( '*', 'witkey_model', " model_type = 'shop' and model_status='1'", 'model_id asc ', '', '', 'model_id', 3600 );
$model_img_desc = array("6"=>$_lang['shang'],"7"=>$_lang['fu']);
if(!$model_id){
	$model_ids = array_keys($model_list);
	$model_id = $model_ids['0'];
}

$model_id and $model_info = $model_list[$model_id] or Keke::keke_show_msg("index.php",$_lang['now_no_goods_model'],"error");
/*阶段导航**/
$stage_nav=array("1"=>array("step1",$_lang['choose_goods_type'],$_lang['choose_model_to_confirm_trans']),
				"2"=>array("step2",$_lang['input_goods_description'],$_lang['from_description_to_confirm_detail']),
				"3"=>array("step3",$_lang['pub_success'],$_lang['complete_pub']));
$r_step or $r_step='step1';
//默认第一步
$basic_url = $_K['siteurl']."/index.php?do=shop_release&model_id=".$model_id."&r_step=".$r_step;

require "shop/".$model_info['model_dir']."/control/release.php";