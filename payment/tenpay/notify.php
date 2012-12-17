<?php  define ( "IN_KEKE", true );


require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');
require ("classes/ResponseHandler.class.php");
require ("classes/client/ClientResponseHandler.class.php");
require ("classes/client/TenpayHttpClient.class.php");



//Keke::$_log->add(Log::DEBUG, "进入后台回调页面")->write();

$pay_config = Sys_payment::factory('tenpay')->get_pay_config();


	/* 创建支付应答对象 */
		$resHandler = new ResponseHandler();
		$resHandler->setKey($pay_config['key']);

	//判断签名
		if($resHandler->isTenpaySign()) {
	
	//通知id
		$notify_id = $resHandler->getParameter("notify_id");
		
		//Keke::$_log->add(Log::DEBUG, "进入后台notify_id:$notify_id")->write();
	//通过通知ID查询，确保通知来至财付通
	//创建查询请求
		$queryReq = new RequestHandler();
		$queryReq->init();
		$queryReq->setKey($pay_config['key']);
		$queryReq->setGateUrl("https://gw.tenpay.com/gateway/simpleverifynotifyid.xml");
		$queryReq->setParameter("partner", $pay_config['pid']);
		$queryReq->setParameter("notify_id", $notify_id);
		
	//通信对象
		$httpClient = new TenpayHttpClient();
		$httpClient->setTimeOut(5);
	//设置请求内容
		$httpClient->setReqContent($queryReq->getRequestURL());
	
	//后台调用
		if($httpClient->call()) {
	//设置结果参数
			$queryRes = new ClientResponseHandler();
			$queryRes->setContent($httpClient->getResContent());
			$queryRes->setKey($pay_config['key']);
		   //Keke::$_log->add(Log::DEBUG, "进入后台notify_id:$notify_id")->write();
		if($resHandler->getParameter("trade_mode") == "1"){
			// 判断签名及结果（即时到帐）
			// 只有签名正确,retcode为0，trade_state为0才是支付成功
			if ($queryRes->isTenpaySign () && $queryRes->getParameter ( "retcode" ) == "0" && $resHandler->getParameter ( "trade_state" ) == "0") {
				//Keke::$_log->add(Log::DEBUG,"即时到帐验签ID成功")->write();
				//echo "success";
				//取结果参数做业务处理
				$out_trade_no = $resHandler->getParameter("out_trade_no");
				//财付通订单号
				$transaction_id = $resHandler->getParameter("transaction_id");
				//金额,以分为单位
				$total_fee = $resHandler->getParameter("total_fee");
				//如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
				//$discount = $resHandler->getParameter("discount");
				
				//------------------------------
				//处理业务开始
				//------------------------------
				list ($uid, $order_id ,$rid ) = explode ( '-', $out_trade_no, 3 );
				
				
				//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
				if(Sys_payment::set_recharge_status($uid,$rid, '', $total_fee/100,'财付通')===FALSE){
					return false;
				}
				
				if($order_id>0){
					//处理订单信息
				}
				
				echo 'success';
				//------------------------------
				//处理业务完毕
				//------------------------------
				//Keke::$_log->add(Log::DEBUG,"即时到帐后台回调成功")->write();
				
				
			} else {
	//错误时，返回结果可能没有签名，写日志trade_state、retcode、retmsg看失败详情。
	//echo "验证签名失败 或 业务错误信息:trade_state=" . $resHandler->getParameter("trade_state") . ",retcode=" . $queryRes->                         getParameter("retcode"). ",retmsg=" . $queryRes->getParameter("retmsg") . "<br/>" ;
			   //Keke::$_log->add(Log::DEBUG,"即时到帐后台回调失败")->write();
			   echo "fail";
			}
		} 
		
		
	//获取查询的debug信息,建议把请求、应答内容、debug信息，通信返回码写入日志，方便定位问题
	   
		/* $h =  "<br>------------------------------------------------------<br>";
		$h .=  "http res:" . $httpClient->getResponseCode() . "," . $httpClient->getErrInfo() . "<br>";
		$h .= "query req:" . htmlentities($queryReq->getRequestURL(), ENT_NOQUOTES, "GB2312") . "<br><br>";
		$h .= "query res:" . htmlentities($queryRes->getContent(), ENT_NOQUOTES, "GB2312") . "<br><br>";
		$h .= "query reqdebug:" . $queryReq->getDebugInfo() . "<br><br>" ;
		$h .= "query resdebug:" . $queryRes->getDebugInfo() . "<br><br>";
		
		Keke::$_log->add(Log::DEBUG,$h)->write(); */
	}else
	 {
		//通信失败
		echo "fail";
		//后台调用通信失败,写日志，方便定位问题
		echo "<br>call err:" . $httpClient->getResponseCode() ."," . $httpClient->getErrInfo() . "<br>";
	 } 
	
	
   } else {
    echo "<br/>" . "认证签名失败" . "<br/>";
    echo $resHandler->getDebugInfo() . "<br>";
}
