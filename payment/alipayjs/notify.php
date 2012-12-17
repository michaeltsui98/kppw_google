<?php  define ( "IN_KEKE", true );

require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');


//验证返回的结果
$verify_result = Sys_payment::factory('alipayjs')->get_alipay_notify()->verifyNotify();

///验证失败
if((bool)$verify_result===FALSE){
	echo 'error';
	return false;
}

echo "success";
//商户订单号
$out_trade_no = $_POST ['out_trade_no']; 
//打款金额
$total_fee = $_POST ['total_fee']; 
//打开账号
$buyer_email = $_POST['buyer_email']; 

//chmod('log.txt',7777);
//KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_POST, 1 ), FILE_APPEND );
if ($_POST ['trade_status'] == 'TRADE_FINISHED' || $_POST ['trade_status'] == 'TRADE_SUCCESS') { 
	//交易成功业务处理 
	list ($uid, $order_id ,$rid ) = explode ( '-', $out_trade_no, 3 );
	//KEKE_DEBUG AND file_put_contents ( 'log.txt', var_export ( $_POST, 1 ), FILE_APPEND );
	
	//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
	if(Sys_payment::set_recharge_status($uid,$rid, $buyer_email, $total_fee,'支付宝')===FALSE){
		return false;
	}
	
	if($order_id>0){
		//处理订单信息
	}
	//改变订单状态，以及订单对应的业务处理
	
	
	
}
 
