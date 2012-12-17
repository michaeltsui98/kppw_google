<?php 
/**
 * 客客推广联盟，初始化配置类
 * @var unknown_type
 */
global $config,$_K;

$config['keke_app_id'] = '';//
//用户申请的联盟应用secret
$config['keke_app_secret'] = '';//

//默认签名方式
$config['sign_type'] = 'MD5';
//默认字符编码
$config['_input_charset'] = strtoupper(CHARSET);
//同步回调地址
$config['return_url'] = $_K['siteurl'].'/client/keke/return.php';
//异步回调地址
$config['notify_url'] = $_K['siteurl'].'/client/keke/notify.php';