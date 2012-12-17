<?php  define ( "IN_KEKE", true );

require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

require ("classes/ResponseHandler.class.php");

$pay_config = Sys_payment::factory('tenpay')->get_pay_config();

	/* 创建支付应答对象 */
	$resHandler = new ResponseHandler();
	$resHandler->setKey($pay_config['key']);

	//判断签名
	if($resHandler->isTenpaySign()===FALSE) {
		echo "<br/>" . "认证签名失败" . "<br/>";
		echo $resHandler->getDebugInfo() . "<br>";
		die;
	}
	
	//通知id
	$notify_id = $resHandler->getParameter("notify_id");
	//商户订单号
	$out_trade_no = $resHandler->getParameter("out_trade_no");
	//财付通订单号
	$transaction_id = $resHandler->getParameter("transaction_id");
	//金额,以分为单位
	$total_fee = $resHandler->getParameter("total_fee");
	//如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
	$discount = $resHandler->getParameter("discount");
	//支付结果
	$trade_state = $resHandler->getParameter("trade_state");
	//交易模式,1即时到账
	$trade_mode = $resHandler->getParameter("trade_mode");
	
	$total_fee = Curren::output($total_fee/100);
	//var_dump($resHandler->getAllParameters());die;
	if("1" == $trade_mode ) {
		if( "0" == $trade_state){ 
		 	Keke::show_msg('即时到帐支付成功,付款金额：'.$total_fee,Cookie::get('last_page'));
		} else {
			//当做不成功处理
			//echo "<br/>" . "即时到帐支付失败" . "<br/>";
			Keke::show_msg('即时到帐支付失败',Cookie::get('last_page'),'error');
		}
	} 
	
 