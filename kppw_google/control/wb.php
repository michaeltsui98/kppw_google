<?php
/**
 * this not free,powered by keke-tech
 * @author jiujiang
 * @charset:GBK  last-modify 2012-1-3-ÏÂÎç5:21:28
 * @version V2.0
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/*ÍøÕ¾¼Ó¹Ø×¢*/
if($wb_type && $focus){
	$url = Keke::$_sys_config['website_url']."/index.php?do=$do&focus=$focus&wb_type=$wb_type";
	$weibo_obj = new keke_weibo_class($wb_type,$call_back,$url);
	if($weibo_obj->focus_by_uid($focus)){
		Keke::show_msg($_lang['operate_notice'],"index.php",2,$_lang['focus_success']);
	}else{
		Keke::show_msg($_lang['operate_notice'],"index.php",20,$_lang['focus_exists'],"error");
	}
}
die();