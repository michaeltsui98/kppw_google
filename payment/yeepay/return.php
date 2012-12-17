<?php  define ( "IN_KEKE", true );
require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

$yeepay = Sys_payment::factory('yeepay');
 
#	解析返回参数.
$return = $yeepay->getCallBackValue($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);

#	判断返回签名是否正确（True/False）
$bRet = $yeepay->CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
#	以上代码和变量不需要修改.

$total_fee = Curren::output($r3_Amt);

#	校验码正确.
if($bRet===FALSE){
	echo "交易信息被篡改";
}
	if($r1_Code=="1"){
		
		if($r9_BType=="1"){
			
			list ($uid, $order_id ,$rid ) = explode ( '-', $r8_MP, 3 );
			//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
			//var_dump($r3_Amt);//die;
			if(Sys_payment::set_recharge_status($uid,$rid, '', $r3_Amt,'易宝支付')===FALSE){
				Keke::show_msg('不要重复刷新',Cookie::get('last_page'),'error');
			}
				
			if($order_id>0){
				//处理订单信息
			}
			
			//商户系统的逻辑处理（例如判断金额，判断支付状态，更新订单状态等等）......
			Keke::show_msg('即时到帐支付成功,付款金额：'.$total_fee,Cookie::get('last_page'));
			
			
		}elseif($r9_BType=="2"){
			#如果需要应答机制则必须回写流,以success开头,大小写不敏感.
			echo "success";
			echo "<br />交易成功";
			echo  "<br />在线支付服务器返回";
			
			
		}
	}
 
