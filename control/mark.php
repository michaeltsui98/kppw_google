<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 互评任务
 * @author Michaeltsui98
 * @version v 3.0
 */
class Control_mark extends Control_front{
	
	function action_index(){
		
		$mark_id = (int)$_GET['id'];
		$uid = self::$uid;
		
		$refer = $this->request->referrer();
		$mark_info = DB::select()->from('witkey_mark')
		//第二次互评，必须是中评与差评才可以
		->where(" mark_id = $mark_id and by_uid = $uid  and  mark_count <2 ")
		->get_one()->execute();
		
		if(Keke_valid::not_empty($mark_info)==FALSE or $mark_info['mark_status']==1){
			$this->refer();
		}
		
		$aid_type = $mark_info['mark_type']=='buyer'?1:2;
		
		$aid_info = DB::select()->from('witkey_mark_aid')->where("aid_type=$aid_type")->execute();
		
		if($mark_info['mark_count']==1 and $mark_info['mark_status']>1){
			//修改互评
			$aid_key = explode(',', $mark_info['aid']);
			$aid_value = explode(',', $mark_info['aid_star']);
			$aid_arr = array_combine($aid_key,$aid_value);
		}
		
		require Keke_tpl::template ( "mark" );
	}
	
	function action_save(){
		
		
		$mark_id = (int)$_POST['mark_id'];
		
		$mark_info = DB::select()->from('witkey_mark')->where(" mark_id = $mark_id ")->get_one()->execute();
		
		$by_uid = self::$uid;
		
		$uid = (int)$mark_info['uid'];
		
		$mark_type = $mark_info['mark_type'];
		
		$mark_status= (int)$_POST['mark_status'];
		
		$mark_content = Keke_tpl::chars($_POST['tar_content']);
		
		$mark_star = $_POST['star'];
		
		$aid =  implode(',', array_keys($mark_star));
		
		$aid_star = implode(',', array_values($mark_star));
		
		 
		//更新互评记录与用户的等级信息
		if((int)$mark_info['mark_count']==1){
			//第二次更改互评
			$old_mark_value = (int)$mark_info['mark_value'];
			$sql = "update keke_witkey_mark a \n".
					"left join  keke_witkey_task_work w \n".
					"on a.obj_id = w.work_id \n".
					"left join keke_witkey_task t\n".
					"on a.origin_id = t.task_id \n".
					"left join keke_witkey_model m \n".
					"on t.model_id = m.model_id\n".
					"left join keke_witkey_mark_config c\n".
					"on  c.obj = m.model_code and c.type = if(a.mark_type='buyer',2,1)\n".
					"left join keke_witkey_space s\n".
					"on a.uid = s.uid \n".
					"left join keke_witkey_mark_rule r \n".
					"on 1=1 and if(\n".
					"a.mark_type='seller',\n".
					"r.seller_value >= s.seller_credit + a.mark_value-$old_mark_value,\n".
					"r.buyer_value >= s.buyer_credit + a.mark_value-$old_mark_value\n".
					")\n".
					"set a.mark_status = $mark_status,\n".
					"a.mark_content = '$mark_content',\n".
					"a.mark_time = '".SYS_START_TIME."',\n".
					"a.aid = '$aid',\n".
					"a.aid_star = '$aid_star',\n".
					"a.mark_value = a.obj_cash*(case 2 WHEN 1 THEN c.good WHEN 2 THEN c.normal WHEN 3 THEN c.bad END )/100,\n".
					"a.mark_count = a.mark_count+1,\n".
					" \n".
					"s.buyer_good_num = if(a.mark_type='buyer' and a.mark_status=1,s.buyer_good_num+1,s.buyer_good_num),\n".
					"s.buyer_credit = if(a.mark_type='buyer',\n".
					"s.buyer_credit +a.mark_value-$old_mark_value ,s.buyer_credit),\n".
					" \n".
					"s.seller_good_num=if(a.mark_type='seller' and a.mark_status=1,s.seller_good_num+1,s.seller_good_num),\n".
					"s.seller_credit=if(a.mark_type='seller',\n".
					"s.seller_credit + a.mark_value-$old_mark_value ,s.seller_credit),\n".
					"s.buyer_level = if(a.mark_type='buyer',r.mark_rule_id,s.buyer_level),\n".
					"s.seller_level = if(a.mark_type='seller',r.mark_rule_id,s.seller_level)\n".
					"where  a.mark_id = $mark_id and a.by_uid = $by_uid  and a.uid = $uid";
			
		}else{
			//第一次互评
			$sql = "update keke_witkey_mark a \n".
					"left join  keke_witkey_task_work w \n".
					"on a.obj_id = w.work_id \n".
					"left join keke_witkey_task t\n".
					"on a.origin_id = t.task_id \n".
					"left join keke_witkey_model m \n".
					"on t.model_id = m.model_id\n".
					"left join keke_witkey_mark_config c\n".
					"on  c.obj = m.model_code and c.type = if(a.mark_type='buyer',2,1)\n".
					"left join keke_witkey_space s\n".
					"on a.uid = s.uid \n".
					"left join keke_witkey_mark_rule r \n".
					"on 1=1 and if(\n".
					"a.mark_type='seller',\n".
					"r.seller_value >= s.seller_credit + a.mark_value,\n".
					"r.buyer_value >= s.buyer_credit + a.mark_value\n".
					")\n".
					"set a.mark_status = $mark_status,\n".
					"a.mark_content = '$mark_content',\n".
					"a.mark_time = '".SYS_START_TIME."',\n".
					"a.aid = '$aid',\n".
					"a.aid_star = '$aid_star',\n".
					"a.mark_value = a.obj_cash*(case $mark_status WHEN 1 THEN c.good WHEN 2 THEN c.normal WHEN 3 THEN c.bad END )/100,\n".
					"a.mark_count = a.mark_count+1,\n".
					"s.buyer_total_num = if(a.mark_type='buyer',s.buyer_total_num+1,s.buyer_total_num),\n".
					"s.buyer_good_num = if(a.mark_type='buyer' and a.mark_status=1,s.buyer_good_num+1,s.buyer_good_num),\n".
					"s.buyer_credit = if(a.mark_type='buyer',\n".
					"s.buyer_credit +  a.mark_value,s.buyer_credit),\n".
					"s.seller_total_num = if(a.mark_type='seller',s.seller_total_num+1,s.seller_total_num),\n".
					"s.seller_good_num=if(a.mark_type='seller' and a.mark_status=1,s.seller_good_num+1,s.seller_good_num),\n".
					"s.seller_credit=if(a.mark_type='seller',\n".
					"s.seller_credit +  a.mark_value,s.seller_credit),\n".
					"s.buyer_level = if(a.mark_type='buyer',r.mark_rule_id,s.buyer_level),\n".
					"s.seller_level = if(a.mark_type='seller',r.mark_rule_id,s.seller_level)\n".
					"where  a.mark_id = $mark_id and a.by_uid = $by_uid  and a.uid = $uid";
		}
		$res = DB::query($sql,Database::UPDATE)->tablepre('keke_')
		//->compile(Database::instance());
		->execute();
		//var_dump($res);
		//print_r($res);die;
		Keke::show_msg('提交成功',$_POST['refer']);
		
	}
	
}