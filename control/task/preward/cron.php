<?php defined ( 'IN_KEKE' ) or die ( 'access denied' );
/**
 * 单赏任务计划执行类
 * @author Michael
 * @version 3.0
 */
class Control_task_preward_cron extends Sys_cron_task {
	private static $config = NULL;
	function run($config) {
		if(!is_array($config)){
			$config = unserialize($config);
		}
		self::$config =  $config ;
		
		$this->jg_to_xg ();
		
		$this->xg_to_gs ();
		
		$this->gs_to_jf ();
		
		$this->jf_to_end ();
		
		$this->end_to_hp();
	}
	function jg_to_xg() {
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"set a.end_time = :end_time,a.task_status = 3\n".
				"where b.model_code = 'preward' and a.task_status =2 \n".
				"and a.work_num >0 and  FROM_UNIXTIME(a.sub_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':end_time', SYS_START_TIME+(self::$config['choose_time']*3600*24))
		->execute();
		
		//如果选搞到期没有稿件，退款给买家
		$sql = "select * \n".
				"from keke_witkey_task a \n".
				"left join keke_witkey_model m \n".
				"on a.model_id = m.model_id and m.model_code = 'preward'\n".
				"where a.task_status = 2 \n".
				"and a.work_num <1 \n".
				"and from_unixtime(a.sub_time)<=now()";
		$task_arr = DB::query($sql)->tablepre('keke_')
		//->compile(Database::instance());
		->execute();
		//退款，改变任务状态为结束 
		if(sizeof($task_arr)>0){
			$this->task_recash($task_arr);
			$sql = "update \n".
					"keke_witkey_task a \n".
					"left join keke_witkey_model m \n".
					"on a.model_id = m.model_id and m.model_code = 'preward'\n".
					"set a.task_status = 4,a.sub_status = 1\n".
					"where a.task_status = 2 \n".
					"and a.work_num <1 \n".
					"and from_unixtime(a.sub_time)<=now()";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')->execute();
		}
	}
	/**
	 * 这里有三种情况:
	 * 1.有选中稿件，进入公示 5
	 * 2.没有稿件，结束任务，退款 7-1
	 * 3.有稿件，没有中标稿件，后台开启自动选稿，进入自动选稿后，进行公示5
	 * @see Sys_cron_task::xg_to_gs()
	 */
	function xg_to_gs() {
		//自动选稿,一稿没选的话才会自动选稿,自动选搞规则：最先交稿，交稿人的能力值最大
		$sql = "update   (\n".
				"select a.task_id,a.model_id,a.task_status,a.end_time,a.work_num,\n".
				"min(b.work_id) min_work_id,\n".
				"count(b.work_id) count_work_id,\n".
				"c.uid max_credit_seller_uid,\n".
				"sum(b.work_status) sum_work_status \n".
				"from keke_witkey_task a \n".
				"left join keke_witkey_task_work  b\n".
				"on a.task_id = b.task_id\n".
				"left join keke_witkey_space c\n".
				"on b.uid = c.uid\n".
				"group by a.task_id having max(c.seller_credit)\n".
				") t\n".
				"left join keke_witkey_model m \n".
				"on t.model_id = m.model_id and m.model_code = 'preward'\n".
				"left join keke_witkey_task_work w\n".
				"on t.task_id = w.task_id  and \n".
				"case \n".
				"when ".self::$config['auto_bid']."=1 and  '".self::$config['choose_rule']."'='first_work' and t.sum_work_status=0  then  w.work_id=t.min_work_id \n".
				"when ".self::$config['auto_bid']."=1 and  '".self::$config['choose_rule']."'='max_seller_credit' and t.sum_work_status = 0  then w.uid = t.max_credit_seller_uid\n".
				"else 1!=1\n".
				"end\n".
				"set \n".
				"w.work_status = 1\n".
				"where \n".
				"t.task_status = 3 \n".
				"and t.work_num >0 \n".
				"and from_unixtime(t.end_time) <now() ";
		//var_dump(self::$config);die;
		
		DB::query($sql,Database::UPDATE)->tablepre('keke_')->execute();
		
		//改变状态
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id and b.model_code = 'preward'\n".
				"left join keke_witkey_task_work w\n".
				"on w.task_id = a.task_id and w.work_status =1\n".
				"set \n".
				"a.sp_time = :sp_time,\n".
				"a.task_status = if( a.work_num>0 and w.work_status = 1,5,7),\n".
				"a.sub_status = if(a.work_num<1,1,0) \n".
				"where \n".
				"a.task_status = 3\n".
				"and FROM_UNIXTIME(a.end_time) <= NOW()";
		
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':sp_time', SYS_START_TIME+(self::$config['sp_time']*3600*24))
		->execute();
		
		//如果交易失败，退款给买家
		$sql = "select t.*,m.model_name,f.fina_id from keke_witkey_task t \n".
				"left join keke_witkey_model m \n".
				"on t.model_id = m.model_id and m.model_code = 'preward'\n".
				"left join keke_witkey_finance f \n".
				"on t.task_id  = f.obj_id \n".
				"and f.obj_type = 'task'\n".
				"and f.fina_type = 'in'\n".
				"and f.fina_action = 'task_fail'\n".
				"where \n".
				"t.task_status = 7 \n".
				"and \n".
				"t.sub_status = 1 and t.work_num>0\n".
				"and f.fina_id is null";
		$task_arr = DB::query($sql)->tablepre('keke_')
		 
		->execute();
		
		 $this->task_recash($task_arr);
		
		
		
	}
	function gs_to_jf() {
	 
	}
	function jf_to_end() {
		 $sql = "select k.uid,k.username,k.work_price * (1-(a.profit_rate/100)) work_cash,\n".
				"k.task_id,a.task_title,a.task_cash,a.uid tuid,a.username tusername,
				m.model_code,k.work_id
				from  keke_witkey_task a\n".
				"left join keke_witkey_model m \n".
				"on a.model_id = m.model_id \n".
				"left join keke_witkey_task_work k\n".
				"on k.task_id = a.task_id\n".
				"where m.model_code = 'preward' \n".
				"and a.task_status = 6\n".
				"and k.work_status = 1\n".
				"and FROM_UNIXTIME(a.end_time) <= NOW()";
		$arr = DB::query($sql)->tablepre('keke_')->execute();
		if(Keke_valid::not_empty($arr)==false){
			return false;
		}
		foreach ($arr as $v){
			//打款给中标者
			Sys_finance::get_instance($v['uid'])->set_action('task_bid')
			->set_mem(array(':task_id'=>$v['task_id'],':task_title'=>$v['task_title']))
			->set_obj('task', $v['task_id'])
			->cash_in($v['work_cash'],0,$v['task_cash']-$v['work_cash']);
			//生成互记录,如果是一对多的话，这里要注意
			$array=array(
					'model_code'=>$v['model_code'],
					'origin_id'=>$v['task_id'],
					'obj_id'=>$v['work_id'],
					'obj_cash'=>$v['work_price'],
					'uid'=>$v['uid'],
					'username'=>$v['username'],
					'by_uid'=>$v['tuid'],
					'by_username'=>$v['tusername'],
					'mark_status'=>0,
					'mark_value'=>0,
					'mark_max_time'=>SYS_START_TIME+(self::$config['max_mark']*3600*24),
					'mark_type'=>'seller'
			);
			Model::factory('witkey_mark')->setData($array)->create();
			
			$array['uid']=$v['tuid'];
			$array['username']=$v['tusername'];
			$array['by_uid']=$v['uid'];
			$array['by_username']=$v['username'];
			$array['mark_type']='buyer';
			
			Model::factory('witkey_mark')->setData($array)->create();
			
		}
		//改变任务状态
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"set a.end_time = :end_time,a.task_status = 7,a.sub_status=3\n".
				"where b.model_code = 'preward' \n".
				"and a.task_status = 6\n".
				"and FROM_UNIXTIME(a.end_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':end_time', SYS_START_TIME+(self::$config['max_mark']*3600*24))
		->execute();
		
	}
	/**
	 * 到期没有互评的自动互评,并计算用户的等级
	 * @see Sys_cron_task::hp_to_end()
	 */
	function end_to_hp() {
		
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model m\n".
				"on a.model_id = m.model_id\n".
				"left join keke_witkey_mark b \n".
				"on b.model_code = b.model_code \n".
				"and b.mark_status =0 \n".
				"and FROM_UNIXTIME(b.mark_max_time)<=now()\n".
				"left join keke_witkey_mark_config c\n".
				"on  c.obj = m.model_code and c.type = if(b.mark_type='buyer',2,1)\n".
				"left join keke_witkey_space s\n".
				"on b.uid = s.uid \n".
				"left join keke_witkey_mark_rule r\n".
				"on 1=1 and if(\n".
				"b.mark_type='seller',\n".
				"r.seller_value >= s.seller_credit + b.mark_value,\n".
				"r.buyer_value >= s.buyer_credit + b.mark_value\n".
				")\n".
				"set \n".
				"a.sub_status = 4,\n".
				"b.mark_status = 1,\n".
				"b.mark_value = b.obj_cash*(case 1 WHEN 1 THEN c.good WHEN 2 THEN c.normal WHEN 3 THEN c.bad END )/100,\n".
				"b.aid = if(b.mark_type='seller','1,2,3','4,5'),\n".
				"b.aid_star = if(b.mark_type ='seller','5.0,5.0,5.0','5.0,5.0'),\n".
				"b.mark_count = b.mark_count+1,\n".
				"b.mark_content = '系统自动好评',\n".
				"s.buyer_total_num = if(b.mark_type='buyer',s.buyer_total_num+1,s.buyer_total_num),\n".
				"s.buyer_good_num = if(b.mark_type='buyer' and b.mark_status=1,s.buyer_good_num+1,s.buyer_good_num),\n".
				"s.buyer_credit = if(b.mark_type='buyer',\n".
				"s.buyer_credit + b.mark_value,s.buyer_credit),\n".
				"s.seller_total_num = if(b.mark_type='seller',s.seller_total_num+1,s.seller_total_num),\n".
				"s.seller_good_num=if(b.mark_type='seller' and b.mark_status=1,s.seller_good_num+1,s.seller_good_num),\n".
				"s.seller_credit=if(b.mark_type='seller',\n".
				"s.seller_credit + b.mark_value,s.seller_credit),\n".
				"s.buyer_level = if(b.mark_type='buyer',r.mark_rule_id,s.buyer_level),\n".
				"s.seller_level = if(b.mark_type='seller',r.mark_rule_id,s.seller_level)\n".
				"where a.task_status = 7 and a.sub_status=3";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->execute();
	}

}
