<?php  define ( "IN_KEKE", true );
require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

//验证结果
$verify_result = Sys_payment::factory('alipayjs')->get_alipay_notify()->verifyReturn();

$total_fee = Curren::output($_GET ['total_fee']);

if ($verify_result) {
	Keke::show_msg('付款成功,付款金额：'.$total_fee,Cookie::get('last_page'));
}else{
	Keke::show_msg('付款失败',Cookie::get('last_page'),'error');
}
