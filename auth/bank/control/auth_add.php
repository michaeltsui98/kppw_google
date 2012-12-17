<?php

/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-9-01下午2:37:13
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$page_title = $_lang['bank_auth'];
$step_arr = array ("step1" => array ($_lang['step_one'], $_lang['choose_account'] ), "step3" => array ($_lang['step_two'], $_lang['enter_throw_into_cash'] ), "step4" => array ($_lang['step_three'], $_lang['auth_pass'] ) );
//$auth_step= keke_auth_bank_class::get_auth_step($auth_step,$auth_info);

$auth_step and $auth_step=$auth_step or $auth_step='step1';

$verify = 0;// kekezu::reset_secode_session($ver?0:1);//安全码输入
$ac_url = $origin_url . "&op=$op&auth_code=$auth_code&ver=".intval($ver);
/*关联账号列表*/
//$account_list = kekezu::get_table_data("*","witkey_member_bank"," uid = '$uid' and bind_status='1'",'','','','bank_id');

$account_list1 = db_factory::query(sprintf("select a.*,b.bank_a_id,b.auth_status from %switkey_member_bank a left join %switkey_auth_bank b on a.bank_id = b.bank_id where a.uid=%d",TABLEPRE,TABLEPRE,$uid));
foreach($account_list1 as $k=>$v){
    $account_list[$v['bank_id']]=$v;
}

//var_dump($account_list);
$bank_arr=keke_glob_class::get_bank();//银行列表
//$auth_info[1] and $show='list';//存在多条认证记录。显示列表
switch ($auth_step) {
	case "step1" :
        $ac_url = "{$origin_url}&op={$op}&auth_code={$auth_code}&auth_step=step1&ver=1";		
		//$bind_list = kekezu::get_table_data("bank_id","witkey_auth_bank","uid='$uid' and auth_status!=2","","","","bank_id",null);
		$auth_bank = kekezu::get_table_data("bank_id","witkey_auth_bank","uid='$uid' and auth_status!=2","","","","bank_id",null);
		$bind_bank = kekezu::get_table_data("*","witkey_member_bank"," uid = '$uid' and bind_status='1'",'','','','bank_id');
           if($ac=='reauth'&&$bank_a_id){
			$res = db_factory::execute(sprintf(" delete from %switkey_auth_bank where bank_a_id='%d'",TABLEPRE,$bank_a_id));
			$res .=db_factory::execute(sprintf(" delete from %switkey_auth_record where ext_data='%d'",TABLEPRE,$bank_a_id));
			$res and kekezu::show_msg('消息提示',$ac_url."#userCenter",1,$_lang['unbind_successful'],'alert_right') or kekezu::show_msg('消息提示',$ac_url."#userCenter",1,$_lang['unbind_fail'],'alert_error');
		  }elseif($ac=='del_bind'&&$bank_id){
		  	//var_dump($bank_id);die();
        	$res = db_factory::execute(sprintf(" delete from %switkey_member_bank where bank_id='%d'",TABLEPRE,$bank_id));
        	//var_dump($res);die();
			$res and kekezu::show_msg('消息提示',$ac_url."#userCenter",1,'该银行卡号的绑定解除成功','alert_right') or kekezu::show_msg('消息提示',$ac_url."#userCenter",1,'该银行卡号的绑定解除失败','alert_error');        	
		  }
//		if($reset){
//			unset($_SESSION['auth_bank_id']);
//		}elseif($bank_id){
//			$_SESSION['auth_bank_id']=$bank_id;
//			header("Location:$ac_url&auth_step=step2&bank_id=$bank_id#userCenter");
//		}
		break;
	case "step2" :
		//var_dump($bank_id);die();
		if(!$bank_id){//检测是否选取过关联账户
			//$bank_id!=$_SESSION['auth_bank_id'] and kekezu::show_msg($_lang['warn_different_account'],$ac_url."&auth_step=step1",'3','','warning');
		//}else{
			kekezu::show_msg($_lang['warn_need_selected_the_associative_account'].'111',$ac_url."&auth_step=step1",'3','','warning');
		}else{
			//var_dump(111);die();
		   $account_info=$account_list[$bank_id];//当前选取的关联账户
		   $account_info or kekezu::show_msg($_lang['warn_associated_bank_account_inexistent'],$ac_url."&auth_step=step1",'3','','warning');		
		   //if(isset($formhash)&&kekezu::submitcheck($formhash)){ //认证申请提交
			$data['bank_name']=$account_info['bank_name'];
			$data['bank_account']=$account_info['card_num'];
			$data['deposit_area']=$account_info['bank_address'];
			$data['deposit_name']=$account_info['bank_sub_name'];
			$data['bank_id']=$account_info['bank_id'];
			$auth_obj->add_auth ($data); //认证申请提交		
		}				
		//}
		break;
	case "step3" :
		 $auth_bank_info = db_factory::get_one(sprintf("select * from %switkey_auth_bank where bank_a_id=%d",TABLEPRE,$show_id));
		$auth_info or kekezu::show_msg($_lang['warn_illegal_entry'],$ac_url."&auth_step=step1",'3','','warning');
		//var_dump($auth_info['pay_to_user_cash']);
		$account_info=$account_list[$auth_info['bank_id']];//当前认证的关联账户
		//var_dump($account_info);
		$user_get_cash and $auth_obj->auth_confirm($auth_info,$user_get_cash);//认证确认
		break;
	case "step4":
		if($show=='list'){
			$auth_info[1] and $auth_list = $auth_info or $auth_list=array($auth_info);
			//var_dump($auth_list);
		}else{
			//if($show_id||!$auth_info[1]){
				$account_info=$account_list[$auth_info['bank_id']];//当前认证的关联账户
				$account_info or kekezu::show_msg($_lang['tips_about_bank_account_inexistent'],$ac_url."&auth_step=step1",'3','','warning');
			//}
		}
//		if($ac=='reauth'&&$bank_a_id){
//			$ac_url = "{$origin_url}&op={$op}&auth_code={$auth_code}&step=step4&show=list&ver=1";
//			$res = db_factory::execute(sprintf(" delete from %switkey_auth_bank where bank_a_id='%d'",TABLEPRE,$bank_a_id));
//			$res .=db_factory::execute(sprintf(" delete from %switkey_auth_record where ext_data='%d'",TABLEPRE,$bank_a_id));
//			$res and kekezu::show_msg($_lang['unbind_successful'],$ac_url."#userCenter",3,'','success') or kekezu::show_msg($_lang['unbind_fail'],$ac_url."#userCenter",3,'','warning');
//		}
		
		if($auth_info['auth_status']==1){
			//通过认证
			$auth_tips =$_lang['congratulations_pass_mobile_auth'];
			$auth_style = 'success';
		}elseif($auth_info['auth_status']==2){
			//认证失败
			$auth_tips =$_lang['regrettably_not_pass_mobile_auth'];
			$auth_style = 'error';
		}
		break;
}

require keke_tpl_class::template ( 'auth/' . $auth_dir . '/tpl/' . $_K ['template'] . '/auth_add' );