<?php  define ( "IN_KEKE", true );


require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

$pay_config = Sys_payment::factory('chinabank')->get_pay_config();

$key=$pay_config['key'];	
$v_oid     =trim($_POST['v_oid']);       // 商户发送的v_oid定单编号   
$v_pmode   =trim($_POST['v_pmode']);    // 支付方式（字符串）   
$v_pstatus =trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
$v_pstring =trim($_POST['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）； 
$v_amount  =trim($_POST['v_amount']);     // 订单实际支付金额
$v_moneytype  =trim($_POST['v_moneytype']); //订单实际支付币种    
$remark1   =trim($_POST['remark1' ]);      //备注字段1
$remark2   =trim($_POST['remark2' ]);     //备注字段2
$v_md5str  =trim($_POST['v_md5str' ]);   //拼凑后的MD5校验值  

/**
 * 重新计算md5的值
 */
                           
$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));

/**
 * 判断返回信息，如果支付成功，并且支付结果可信，则做进一步的处理
 */


if ($v_md5str==$md5string)
{
	if($v_pstatus=="20")
	{
		
		list ($uid, $order_id ,$rid ) = explode ( '-', $v_oid, 3 );
		//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
		if(Sys_payment::set_recharge_status($uid,$rid, '', $v_amount,'网银在线')===FALSE){
			Keke::show_msg('不要重复刷新',Cookie::get('last_page'),'error');
		}
		
		if($order_id>0){
			//处理订单信息
		}
		
		//商户系统的逻辑处理（例如判断金额，判断支付状态，更新订单状态等等）......
		Keke::show_msg('即时到帐支付成功,付款金额：'.$v_amount,Cookie::get('last_page'));
	}else{
		//echo "支付失败";
		Keke::show_msg('即时到帐支付失败',Cookie::get('last_page'),'error');
	}
}else{
	Keke::show_msg('校验失败,数据可疑',Cookie::get('last_page'),'error');
}
