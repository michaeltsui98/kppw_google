<?php defined ( 'IN_KEKE' ) or die ( 'access denied' );
/**
 * 单赏任务计划执行类
 * @author Michael
 * @version 3.0
 */
class Control_task_sreward_cron extends Sys_cron_task {
	private static $config = NULL;
	function run($config) {
		if(!is_array($config)){
			$config = unserialize($config);
		}
		self::$config =  $config ;
		
		
		$this->jg_to_xg ();
		
		$this->xg_to_gs ();
		
		$this->gs_to_jf ();
		
		$this->jf_to_hp ();
		
		$this->hp_to_end ();
	}
	function jg_to_xg() {
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"set a.end_time = :end_time,a.task_status = 3\n".
				"where b.model_code = 'sreward' \n".
				"and FROM_UNIXTIME(a.sub_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':end_time', SYS_START_TIME+(self::$config['choose_time']*3600))
		->execute();
	}
	
	function xg_to_gs() {
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"set a.sp_time = :sp_time,a.task_status = 5\n".
				"where b.model_code = 'sreward' \n".
				"and a.task_status = 3\n".
				"and FROM_UNIXTIME(a.end_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':sp_time', SYS_START_TIME+(self::$config['sp_time']*3600))
		->execute();
	}
	function gs_to_jf() {
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"set a.end_time = :end_time,a.task_status = 6,a.sub_status = 0\n".
				"where b.model_code = 'sreward' \n".
				"and a.task_status = 5\n".
				"and FROM_UNIXTIME(a.sp_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':end_time', SYS_START_TIME+(self::$config['max_send']*3600))
		->execute();
	}
	function jf_to_hp() {
		$sql = "select k.uid,k.username,k.work_price * (1-(a.profit_rate/100)) work_cash,\n".
				"k.task_id,a.task_title,a.task_cash,a.uid tuid,a.username tusername,
				m.model_code,k.work_id
				from  keke_witkey_task a\n".
				"left join keke_witkey_model m \n".
				"on a.model_id = m.model_id \n".
				"left join keke_witkey_task_work k\n".
				"on k.task_id = a.task_id\n".
				"where m.model_code = 'sreward' \n".
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
					'mark_max_time'=>SYS_START_TIME+(self::$config['max_mark']*3600),
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
				"set a.end_time = :end_time,a.task_status = 7\n".
				"where b.model_code = 'sreward' \n".
				"and a.task_status = 6\n".
				"and FROM_UNIXTIME(a.end_time) <= NOW()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':end_time', SYS_START_TIME+(self::$config['max_mark']*3600))
		->execute();
		
	}
	/**
	 * 改变任务状态为结束,更新互评记录,这一步状态为7 的模型不需要再次执行
	 * @see Sys_cron_task::hp_to_end()
	 */
	function hp_to_end() {
		$sql = "update keke_witkey_task a \n".
				"left join keke_witkey_model m\n".
				"on a.model_id = m.model_id\n".
				"left join keke_witkey_mark b \n".
				"on b.model_code = b.model_code \n".
				"and b.mark_status =0 \n".
				"and FROM_UNIXTIME(b.mark_max_time)<=now()\n".
				"set a.task_status = 8,\n".
				"b.mark_status = 1,b.mark_value = b.obj_cash,\n".
				"b.aid = if(b.mark_type='seller','1,2,3','4,5'),\n".
				"b.aid_star = if(b.mark_type ='seller','5.0,5.0,5.0','5.0,5.0')\n".
				"where a.task_status = 7 \n".
				"and FROM_UNIXTIME(a.end_time)<now()";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->execute();
	}
}
