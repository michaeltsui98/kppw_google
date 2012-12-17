<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8下午06:42:39
 * @property 用户可以绑定多个oauth账号，账号绑定后登录 不用再行绑定，
 * 如果没有绑定 ，登录需要绑定一下，可以绑定已有账号，或者是新建账号
 * 本页面要处理账号的绑定与解除绑定北京
 */


//绑定表对象

$oauth_obj = new Keke_witkey_member_oauth_class();

/**
 * 获取绑定信息
 */ 
$api_name = keke_glob_class::get_open_api();
$oauth_url = $Keke->_sys_config['website_url']."/index.php?do=$do&view=$view&op=$op&ac=$ac&type=$type";
$res = Keke::get_table_data('*','witkey_member_oauth',"uid=$uid","","source",6,"source");
$url = "index.php?do=$do&view=$view&op=$op";
/**
 * 将绑账号信息$res与$r数组进行合并
 */
if (is_array ( $api_open )) {
	foreach ( $api_open as $key => $value ) {
		$value = array ("open" => $value );
		if ($res [$key]) {
			$t [$key] = array_merge ( $value, $res [$key] );
		} else {
			$t [$key] = $value;
		}
	}
}
switch ($ac) {
	case 'bind':   //绑定oauth账号
		if($type){
			switch($type=="alipay_trust"){
				case true:
					$interface = "sns_bind";
					require S_ROOT."/payment/alipay_trust/order.php";
					header("Location:".$request);
					break;
				case false:					
					$oa = new keke_oauth_login_class($type);
					if(!$_SESSION['auth_'.$type]['last_key']){						
						 $oauth_vericode = $oauth_vericode;
						 $oa->login($call_back,$oauth_url);						 						 
					}else{						
					   $oauth_user_info = $oa->get_login_user_info();
					}
					//检查这个用户是否已经绑定过
					$is_bind = Dbfactory::get_count("select count(id) from ".TABLEPRE."witkey_member_oauth  where source ='$type' and oauth_id='{$oauth_user_info['account']}' and uid='$uid'");
					$is_bind and Keke::show_msg($_lang['operate_notice'],$url,3,$_lang['account_been_bind'],'warning');
					//得到用户信息进行绑定
					$oauth_obj->setAccount($oauth_user_info['name']);
					
					//echo $oauth_user_info['name'];die();
					$oauth_obj->setOauth_id($oauth_user_info['account']);
					$oauth_obj->setSource($type);
					$oauth_obj->setUid($uid);
					$oauth_obj->setUsername($username);
					$oauth_obj->setOn_time(time());
					$oauth_obj->create_keke_witkey_member_oauth() and Keke::show_msg($_lang['operate_notice'],$url,2,$_lang['bind_success'],'success')  or Keke::show_msg($_lang['operate_notice'],$url,2,$_lang['bind_fail'],'warning');
			break;
			}
		}		
	break;
	case 'unbind':  //解除绑定
		if(abs(intval($id))){
			switch($type=="alipay_trust"){
				case true:
					$interface = "cancel_bind";
					require S_ROOT."/payment/alipay_trust/order.php";
					header("Location:".$request);
					break;
				case false:
				   unset($_SESSION['auth_'.$type]['last_key']);
				   $oauth_obj->setId($id);
				   $oauth_obj->del_keke_witkey_member_oauth() and Keke::show_msg($_lang['operate_notice'],$url,2,$_lang['unbind_success'],'success')  or Keke::show_msg($_lang['operate_notice'],$url,2,$_lang['unbind_fail'],'warning') ;
				break;
			}
		}
	break;
}

require keke_tpl_class::template ( "user/" . $do ."_" . $op );
