<?php
/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-28早上10:20:00
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$page_title=$_lang['find_back_password'].'- '.$_K['html_title'];

$api_name = keke_global_class::get_open_api();
if (Keke::submitcheck($formhash)) {
	//判断账号是否存在
		$user_info = Keke::get_user_info($txt_account,true);
		
	//验证码判断
		$img = new Secode_class ();
		$check_code = $img->check ( $txt_code, 1 );
		$check_code or Keke::show_msg($_lang['friendly_notice'],"",3,$_lang['you_input_auth_code_error']);
	//获取找回密码的方式
		
		switch ($accout_type){
			case "email":
					$sql = "select * from %switkey_auth_email where uid=%d and auth_status=1";
					$sql = sprintf($sql,TABLEPRE,$user_info['uid']);
					$auth_arr = dbfactory::query($sql);
					
					if($auth_arr){
						$pass_info = reset_set_password($user_info);
						$v_arr = array($_lang['username']=>$user_info['username'],$_lang['website_name']=>Keke::$_sys_config['website_name'],$_lang['password']=>$pass_info['code'],$_lang['safe_code']=>$pass_info['sec_code'] ); 
						keke_shop_class::notify_user($user_info['uid'], $user_info['username'], 'get_password', $_lang['find_back_password'],$v_arr);
						Keke::show_msg($_lang['friendly_notice'],"",3,$_lang['your_new_password_in_email']);
					}else{
						Keke::show_msg($_lang['friendly_notice'],"",3,$_lang['no_email_auth_no_back']);
					}
				break;
				
				
			case "mobile":
					
					$mobile_auth = keke_auth_fac_class::auth_check ( 'mobile', $user_info['uid'] ); 
					if($mobile_auth){
						$pass_info = reset_set_password($user_info);
					
						$msg = new keke_msg_class();
						$msg_str = $_lang['password_is'] .$pass_info['code']."，". $_lang['your_safe_code_is'] .$pass_info['sec_code'];
						$mobile_auth and $msg->send_phone_sms($user_info['mobile'],$msg_str);
						
						Keke::show_msg($_lang['friendly_notice']," ",3,$_lang['password_has_send_to_phone']);
					}else{
						Keke::show_msg($_lang['friendly_notice']," ",3,$_lang['no_phone_auth_no_back']);
					}
				break;
		}
 
}
//重置密码
function reset_set_password($user_info){
	$code = Keke::randomkeys(6);
	//生成密码
	$user_code = md5($code);
	//生成随即数
	$slt = Keke::randomkeys(6);
	//生成安全码
	$user_seccode = keke_user_class::get_password($code, $slt);
	//更新密码信息
	$sql = "update %switkey_member set password = '%s' , rand_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$slt,$user_info['uid']); 
	$res = dbfactory::execute($sql);

	$sql = "update %switkey_space set  password = '%s' , sec_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$user_seccode,$user_info['uid']);
	dbfactory::execute($sql);
	$pass_info ['code'] = $code;
	$pass_info ['sec_code''] = $slt;
	return $pass_info; 
}

require Keke_tpl::template ( $do );