<?php define ( "IN_KEKE", TRUE );

include 'app_boot.php';
 
//��ģ�Ͳ���


$ad = new Keke_witkey_ad();

//$res = $ad->query();
//$res = $ad->count();
 $res = $ad->setTarget_id(329)->setAd_type('text')->setAd_name('test')
->setAd_file('testt')->setAd_content('content')->setAd_url('www.163.com')
->setEnd_time('123456')->setListorder(2)->setWidth(10)->setHeight(20)
->setOn_time(123456)->create();

 
 foreach ($querys as $v){
 	$v = strtr($v,array("keke_"=>TABLEPRE));
 	db_factory::execute($v);
 }
 
 
 
 
var_dump($res);

die;
