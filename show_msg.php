<?php   
/**
 *
 * @author Michael
 * @version 2.2
   2012-10-12
 */

define ( 'IN_KEKE', TRUE );
include 'app_boot.php';

$base_uri = BASE_URL.'/show_msg.php';
//$type = 'success';
if($_GET['type']){
	$type = $_GET['type'];
}
if($type){
	Keke::show_msg('content','http://localhost/kppw_google/show_msg.php',$type,'test',9);
}

//弹出框测试
require Keke_tpl::template('show_msg_ui');
//show_msg('成功提示的,内容','show_msg.php',$type);



/**
 * 用于页面跳转提示
 *@param $content 提示信息 $_lang['submit_success']提交成功,$_lang['submit_fail']提交失败
 *@param $url 跳转url
 * @param $type string
 *        	inajax
 *        	{'alert_info'=>'提示','alert_right'=>'成功','confirm_info'=>'确认','alert_error'=>'错误'}
 *        	非ajax {'info'=>默认,'success'=>'成功','warning'=>'警告'}
 *        success 成功  error 错误 warning 警告/请示  confirm 确认
 *@param $title 标题，默认为“系统提示”
 *@param $time 跳转页显示时间，默认为3秒
 */
 
 function show_msg( $content = "", $url = "",  $type = 'info',$title = NULL,$time = 3) {
	global $_K, $username, $uid,  $_lang;
	$r = $_REQUEST;
	$msgtype = $type;
	if($title===NULL){
		$title = $_lang['sys_tips'];
	}
	//没有http加上base_url
	if(strpos($url, 'http')===FALSE){
		$url = BASE_URL."/$url";
	}
	require Keke_tpl::template ( 'show_msg' );
}