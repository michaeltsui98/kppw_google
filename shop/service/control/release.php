<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$std_cache_name = 'service_cache_'.$model_id.'_' . substr ( md5 ( $uid ), 0, 6 );
$release_obj = service_release_class::get_instance ( $model_id );
$payitem_arr = Sys_payitem::get_payitem_info('employer','service'); //获取该任务所有的增值服务  
$payitem_standard = Sys_payitem::payitem_standard (); //收费标准

$release_obj->get_service_obj ( $std_cache_name ); //获取服务信息对象
$release_info = $release_obj->_std_obj->_release_info; //服务发布信息
$service_config = $release_obj->_service_config; //服务配置
$ext = '*.jpg;*.jpeg;*.gif;*.png;*.bmp';
switch ($r_step) { //服务发布步骤
	case "step1" :
		if(kekezu::submitcheck($formhash)){
			$release_info and $_POST = array_merge ( $release_info, $_POST );
			$_POST['txt_price'] = Curren::convert($_POST['txt_price'],0,true);
			$release_obj->save_service_obj ( $_POST, $std_cache_name ); //信息保存
			header ( "location:index.php?do=shop_release&model_id={$model_id}&r_step=step2" );
			die ();
		}
		break;
	case "step2" :
		if (kekezu::submitcheck($formhash)) {
			$release_info and $_POST = array_merge ( $release_info, $_POST,$_FILES);
			$_POST['txt_title']  = kekezu::escape($txt_title);
			$_POST['tar_content'] =  $tar_content ;
			$_POST['txt_price'] = Curren::convert($_POST['txt_price'],0,true);
			$release_obj->save_service_obj ( $_POST, $std_cache_name ); //信息保存
			header ( "location:index.php?do=shop_release&model_id={$model_id}&r_step=step3" );
			die ();
		} else {
			$release_obj->check_access ( $r_step, $model_id, $release_info ); //页面进入权限检测
			$kf_info	 = $release_obj->_kf_info; //随机客服
			$indus_p_arr = $release_obj->get_bind_indus(); //父级行业
			$indus_arr   = $release_obj->get_service_indus($release_info ['indus_pid']); //子集行业
			$price_unit  = $release_obj->get_price_unit();//价格单位
			$service_unit= $release_obj->get_service_unit();//工时单位
 		}
		break;
	case "step3" :
		switch ($ajax) {
			case "save_payitem" : 
			
				$release_obj->save_pay_item ( $item_id, $item_code, $item_name, $item_cash, $std_cache_name ,$item_num);
				break;
			case "rm_payitem" :	
				$release_obj->remove_pay_item ( $item_id, $std_cache_name );
				break;
		}
		
		if (kekezu::submitcheck($formhash)) {
		//if($formhash){
			$release_info and $_POST = array_merge ( $release_info, $_POST );
			$release_obj->save_service_obj ( $_POST, $std_cache_name ); //信息保存
			$service_id = $release_obj->pub_service();//发布服务
			$release_obj->update_service_info($service_id, $std_cache_name);
			die ();
		} else {
			$release_obj->check_access ( $r_step, $model_id, $release_info ); //页面进入权限检测
			$item_list = Sys_payitem::get_payitem_info ('employer',$model_info[model_code] );//雇主增值服务项
			
			$standard = Sys_payitem::payitem_standard ();//增值服务收费标准中文
			$item_info = $release_obj->get_pay_item (); //附加项获取
			$total_cash = $release_obj->get_payitem_cash ( 0); //任务总金额
		}
		break;
	case "step4" :
		$service_info = $release_obj->check_access ( $r_step, $model_id, $release_info,$service_id ); //页面进入权限检测
		break;
}
require keke_tpl_class::template ( 'shelves' );
		