<?php  define ( "IN_KEKE", true );

require (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_boot.php');

$pay_config = Sys_payment::factory('chinabank')->get_pay_config();

$key=$pay_config['key'];

$v_oid     =trim($_POST['v_oid']);      
$v_pmode   =trim($_POST['v_pmode']);      
$v_pstatus =trim($_POST['v_pstatus']);      
$v_pstring =trim($_POST['v_pstring']);      
$v_amount  =trim($_POST['v_amount']);     
$v_moneytype  =trim($_POST['v_moneytype']);     
$remark1   =trim($_POST['remark1' ]);     
$remark2   =trim($_POST['remark2' ]);     
$v_md5str  =trim($_POST['v_md5str' ]);     
/**
 * 重新计算md5的值
 */
                           
$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key)); //拼凑加密串
Keke::$_log->add(Log::DEBUG, '网银后台回调')->write();
if ($v_md5str==$md5string)
{
	Keke::$_log->add(Log::DEBUG, '网银后台回调状态成功')->write();	
   if($v_pstatus=="20")
	{
		list ($uid, $order_id ,$rid ) = explode ( '-', $v_oid, 3 );
		//改变充值记录,并判断这个打款有没有处理过，如果有处理过，则返回，否则继续
		if(Sys_payment::set_recharge_status($uid,$rid, '', $v_amount,'网银在线')===FALSE){
			return false;
		}
		
		if($order_id>0){
			//处理订单信息
		}
		
	}
  echo "ok";
	
}else{
	echo "error";
}
Keke::$_log->add(Log::DEBUG, '网银后台回调结束')->write();