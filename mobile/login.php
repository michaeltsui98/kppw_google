<?php

/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-27早上9:55:00
 */
defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0);
$uid = intval($u_id);
if($action=='relogin'&&$uid){

	$logined = db_factory::get_one(sprintf(" select client_status,uid,username from %switkey_space where uid='%d'",TABLEPRE,$uid));
	if($logined['client_status']=='online'){
		$_SESSION ['uid'] = $logined['uid'];
		$_SESSION ['username'] = $logined['username'];
		db_factory::execute ( sprintf ( "update %switkey_member_oltime set last_op_time=%d where uid = %d", TABLEPRE, time (), $uid) );
		kekezu::echojson('',1);
	}else{
		kekezu::echojson(array('r'=>'Relogin fail'),0);
	}
	die();
}else{
	$login_obj = new keke_user_login_class();//初始化对象 
			
	$user_info = $login_obj->user_login($txt_account, md5($pwd_password),'',4); //用户登录 
		
	wap_base_class::update_load_status($user_info['uid']);//更新登陆状态
	$login_obj->save_user_info($user_info, '',3);//存储用户信息  
}