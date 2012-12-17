<?php define ( "IN_KEKE", true );
require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

$paypal = Sys_payment::factory('paypal');

// Enable test mode if needed
//$myPaypal->enableTestMode ();
$valid  = $paypal->validateIpn();


if ($valid===FALSE) {
  Keke::show_msg('校验失败,数据可疑',Cookie::get('last_page'),'error');
}
if ($paypal->ipnData ['payment_status'] == 'Completed') {
	list ($uid, $order_id ,$rid ) = explode ( '-', $paypal->ipnData ['custom'], 3 );
	//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
	if(Sys_payment::set_recharge_status($uid,$rid, '', $paypal->ipnData ['mc_gross'],'paypal')===FALSE){
		Keke::show_msg('不要重复刷新',Cookie::get('last_page'),'error');
	}
	
	if($order_id>0){
		//处理订单信息
	}
	
	Keke::show_msg('即时到帐支付成功,付款金额：'.$paypal->ipnData['mc_gross '],Cookie::get('last_page'));
}elseif($paypal->ipnData ['payment_status'] == 'Pending'){
	Keke::show_msg('您的付款还需要收款方确认',Cookie::get('last_page'));
} else {
	Keke::show_msg('即时到帐支付失败',Cookie::get('last_page'),'error');
}
 