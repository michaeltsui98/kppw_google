<?php define ( "IN_KEKE", TRUE );

include 'app_boot.php';
 
//ĞÂÄ£ĞÍ²âÊÔ


$ad = new Keke_witkey_ad();

//$res = $ad->query();
//$res = $ad->count();
 $res = $ad->setTarget_id(329)->setAd_type('text')->setAd_name('test')
->setAd_file('testt')->setAd_content('content')->setAd_url('www.163.com')
->setEnd_time('123456')->setListorder(2)->setWidth(10)->setHeight(20)
->setOn_time(123456)->create();

 
 
var_dump($res);

die;
