<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 单赏任务发布
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_sreward_info extends Control_task{
	
	function action_index(){
		
		$base_url = PHP_URL.'/task/'.self::$task_info['task_id'];
		
		$task_info  = self::$task_info;
		
		$file_arr = $this->get_task_att($task_info['task_id']);
		 
		$buyer_level =Keke_user_mark::user_level($task_info['uid']);
		
	 	
		$work_status_arr = Control_task_sreward_trade::work_status();
		
		$time_desc = $this->get_task_timedesc();
		
		register_shutdown_function(array(Control_task_sreward_cron::factory('sreward'),'run'),self::$conf);
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_info");
		Keke::async_request();
	}
	/**
	 * 针对任务的操作
	 */
	function task_op(){
		switch (self::$task_info['scode']){
			case 'tg':
				if(self::$uid !== self::$buyeruid){
					$html = "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/sub_work'>我要交稿</a>";
				}elseif(self::$uid == self::$buyeruid){
					$html .= "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/task_delay'>延期加价</a>";
				}
				
			break;
		}
		return $html;
		
	}
	/**
	 * 稿件列表
	 */
	function action_work(){
		 $this->reward_work();
	}
	
	/**
	 * 任务交稿
	 */
	function action_sub_work(){
		 
		if(Keke_valid::not_empty($_POST)){
			
			Keke::formcheck($_POST['formhash']);
			
			$res = Keke_validation::factory($_POST)
			->rule('work_desc', 'Keke_valid::not_empty',array(':value',$_POST['work_desc'],'稿件描述不能为空'))
			->rule('work_desc', 'Keke_valid::min_length',array($_POST['work_desc'],10,'稿件描述必须大于10个字'))
			//->rule('tel', 'Keke_valid::phone',array($_POST['tel'],11,'请填写中国区的手机号'))
			 ;
			if($res->check()===FALSE){
				Keke::show_msg($res->errors(),$this->request->referrer(),'error');
			}
			
			$work_desc = Keke_tpl::chars($_POST['work_desc']);
			$arr = array('task_id'=>self::$task_info['task_id'],
					     'uid'=>self::$uid,
						 'username'=>$_SESSION['username'],
						 'work_desc'=>nl2br($work_desc),
					     'work_time'=>SYS_START_TIME,
					     'hide_work'=>(int)$_POST['hide_work'],
					     'work_status'=>0
			);
			$work_id = Model::factory('witkey_task_work')->setData($arr)->create();
			
			$sql = "update keke_witkey_task set work_num = work_num+1 where task_id = :task_id";
			
			DB::query($sql,Database::UPDATE)->tablepre('keke_')
			->param(':task_id', self::$task_id)
			->execute();
			//更新附件表
			$sql ="update keke_witkey_file set obj_id = :work_id where obj_id=0  and obj_type='work' and pid=:task_id";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')
			->param(':work_id', $work_id)
			->param(':task_id',self::$task_info['task_id'])
			->execute();
			Keke::show_msg('提交成功','task/'.self::$task_id);
			
			
		}elseif(self::$task_info['scode']=='tg' and self::$uid != self::$buyeruid ){
			
			Keke_user::check_login();
			
			$flie_types = File::flash_upload_ext();
			
			$task_info = self::$task_info;
			
			require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/sub_work");
		}
	}
	/**
	 * 任务延期加价
	 */
	function action_task_delay(){
		
		if( Keke::formcheck($_POST['formhash'])){

			$arr = $this->delay_info();
			$res = Keke_validation::factory($_POST)
			->rule('delay_cash', 'Keke_valid::large',array($_POST['delay_cash'],$arr['delay_cash'],'延期费用必须>='.$arr['delay_cash']))
			->rule('delay_day', 'Keke_valid::less',array($_POST['delay_day'],$arr['delay_day'],'延期时间必须<='.$arr['delay_day']))
			;
			if($res->check()===FALSE){
				Keke::show_msg($res->errors(),$this->request->referrer(),'error');
			}
			//生成延期记录
			DB::insert('witkey_task_delay')
			->set(array('task_id','delay_cash','delay_day','uid','on_time'))
			->value(array(self::$task_info['task_id'],$_POST['delay_cash'],$_POST['delay_day'],self::$uid,SYS_START_TIME))
			->execute();
			//更新任务

			$sql = "update keke_witkey_task set sub_time = sub_time + :delay_day,
					delay_cash = delay_cash + :delay_cash,
					task_cash = task_cash+:delay_cash, 
					real_cash = real_cash+:delay_cash*(1-profit_rate/100) 
					where task_id = :task_id";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')->param(':delay_day', $_POST['delay_day']*3600*24)
			->param(':delay_cash', $_POST['delay_cash'])
			->param(':task_id', self::$task_info['task_id'])
			->execute();
			
			//延期的费用记录
			
			Sys_finance::get_instance(self::$buyeruid)->set_action('task_delay')
		
			->set_mem(array(':task_id'=>self::$task_id,':task_title'=>self::$task_info['task_title']))
		
			->set_obj('task', self::$task_id)->cash_out($_POST['delay_cash']);
			
			$this->request->redirect($_POST['refer']);	
				
		}elseif(self::$task_info['scode']=='tg' and self::$buyeruid == self::$uid){
			$refer = $this->request->referrer();
			$arr = $this->delay_info();
			extract($arr);
			if($arr['use_delay']<0){
				Keke::show_msg('已经超过延期限制了',"task/".self::$task_id,'error');
			}
			require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_delay");
		}	
	}
	
	/**
	 * 稿件操作项,只有雇主与客服或者站长才能操作稿件
	 * @param array $work_info
	 * @return array
	 */
	function work_op($work_info,$task_info=NULL){
		if($task_info===NULL){
			$task_info = self::$task_info;
		}
		
		$buyeruid = $task_info['uid'];
		 
		$arr = array();
		switch ($task_info['scode']){
 	    	case 'tg':
 	    	case 'xg';
	 	    	if(!(self::$uid == $buyeruid or $_SESSION['group_id']==1 or $_SESSION['group_id']==4 )){
	 	    		return $arr;
	 	    	}
	 	    	$a= Sys_task_trade::instance('sreward')->work_status();;
	 	    	unset($a[0]);
	 	    	switch ($work_info['work_status']){
	 	    		case 0;
	 	    		break;
	 	    		case 2;
	 	    		unset($a[2]);
	 	    		break;
	 	    		default:
	 	    		$a = array();
	 	    		break;
	 	    	}
	 	    	foreach ($a as $k=>$v){
	 	    		$arr[]['a'] = "<a href=\"".PHP_URL."/task/{$work_info['task_id']}/set_work?s=$k&w={$work_info['work_id']}\" 
 	    			onclick=\"return kconfirm(this);\">$v</a>";
	 	    	}
	 	    	
	 	    	
 	    	break;	
 	    		
 	    	case 'jf':
 	    		
 	    		if( (int)$work_info['work_status']==1 
 	    			and self::$uid == $buyeruid
 	    			and (int)$task_info['sub_status']==1
 	    		){
 	    			
 	    			$arr[0]['a'] = "<a href=\"".PHP_URL."/task/{$work_info['task_id']}/set_work?s=buyer_confirm\" 
 	    			onclick=\"return kconfirm(this);\">确认验收</a>";
 	    			
 	    		}elseif((int)$work_info['work_status']==1 
 	    			and self::$uid == $work_info['uid']
 	    			and (int)$task_info['sub_status']==0
 	    		){
 	    			
 	    			$arr[0]['a'] = "<a href=\"".PHP_URL."/task/{$work_info['task_id']}/set_work?s=seller_confirm\"
 	    			 onclick=\"return kconfirm(this);\">确认交付</a>";
 	    		}
 	    	    
 	    		break;
 	    	case 'end':
 	    		if( $work_info['work_status']==1
 	    			and ( 
	 	    			self::$uid == $buyeruid
	 	    			or  self::$uid == $work_info['uid']
 	    			)
 	    		){
 	    			
 	    	    	$arr[0]['a'] = $this->mark_link($work_info,$task_info);
 	    		}
 	    		break;
 	    }
 	    
	    return $arr;
	}
	/**
	 * 设置稿件状态 
	 * @return boolean
	 */
	function action_set_work(){
		//只有雇主与站长及客服才可以操作稿件
		if(!(self::$uid = self::$buyeruid 
				OR $_SESSION['group_id']==1 
				OR $_SESSION['group_id']==4 
				OR self::$task_info['task_status']==3
				OR self::$task_info['task_status']==2
			)){
			return false;
		}
		$s =$_GET['s'];
		$w =(int)$_GET['w'];
		
	    if((int)$s>0){
	    	//更新稿件信息
	    	DB::update('witkey_task_work')
	    	->set(array('work_status','work_price'))
	    	->value(array($s,self::$task_info['task_cash']))
	    	->where("work_id = '$w'")
	    	->execute();
	    	
	    	//中标到切到公示
	    	if($s==1){
	    		$this->task_to_gs();
	    	}
	    }else{
	    	//$s=buyer_confirm,seller_conrim,task_mark
	    	$this->$s($w);
	    }	
	}
    /**
     * 买家确认验收并付款,生互评记录
     * @param int $work_id
     */	
	function buyer_confirm($work_id){
		
		$user = new Control_task_sreward_user($this->request,$this->response);
		$user->action_gz_confirm();
	}
	/**
	 * 卖家确认交付
	 * @param int $work_id
	 */
	function seller_confirm($work_id){
		$user = new Control_task_sreward_user($this->request,$this->response);
		$user->action_wk_confirm();
	}
	/**
	 * 将任务置为公示
	 */
	function task_to_gs(){
		$sp_time = (int)self::$conf['sp_time'];
		
		$sql ="update keke_witkey_task set task_status = 5 ,sp_time = :sp_time where task_id = :task_id";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':sp_time', SYS_START_TIME+($sp_time*3600*24))
		->param(':task_id', self::$task_info['task_id'])
		->execute();
	}
	/**
	 * 任务阶段时间描述
	 */
	function get_task_timedesc() {
		global $_lang;
		$time_desc = array ();
		switch (self::$task_info['scode']) {
			case "wait":
				$time_desc ['ext_desc'] = $_lang['task_nopay_can_not_look'];
				break;
			case "audit":
				$time_desc ['ext_desc'] = $_lang['wait_patient_to_audit'];
				break;
			case "tg" :
				$time_desc ['time_desc'] = $_lang ['from_hand_work_deadline'];
				$time_desc ['time'] = self::$task_info['sub_time'];
				$time_desc ['ext_desc'] = $_lang['hand_work_and_reward_trust'];
				break;
			case "xg" :
				$time_desc ['time_desc'] = $_lang ['from_choose_deadline'];
				$time_desc ['time'] = self::$task_info['end_time'];
				$time_desc ['ext_desc'] = $_lang['work_choosing_and_wait_employer_choose'];
				 
				break;
			case "gs" :
				$time_desc ['time_desc'] = $_lang ['from_gs_deadline'];
				$time_desc ['time'] = self::$task_info ['sp_time'];
				$time_desc ['ext_desc'] = $_lang['task_gs_and_emplyer_have_choose'];
				break;
			case "jf" :
				$time_desc ['time_desc'] = $_lang ['jf_deadline'];
				$time_desc ['time'] = self::$task_info ['end_time'];
				$time_desc ['ext_desc'] = $_lang['employer_and_witkey_jf'];
				break;
			case "dj" :
				$time_desc ['ext_desc'] =$_lang['task_frozen_can_not_operate'];
				break;
			case "end" :
				$time_desc ['ext_desc'] =$_lang['task_haved_complete'];
				break;
		
		}
		return $time_desc;
	}
}