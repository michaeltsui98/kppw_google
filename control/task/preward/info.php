<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �Ƽ�������ϸ
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_preward_info extends Control_task{
	
	function action_index(){
		
		$base_url = PHP_URL.'/task/'.self::$task_info['task_id'];
		
		$task_info  = self::$task_info;
		
		$file_arr = $this->get_task_att($task_info['task_id']);
		 
		$buyer_leve =Keke_user_mark::get_title($task_info['uid'],'buyer');
		
		$work_status_arr = Control_task_preward_trade::work_status();
		
		$time_desc = $this->get_task_timedesc();
		
		register_shutdown_function(array(Control_task_preward_cron::factory('preward'),'run'),self::$conf);
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_info");
		Keke::async_request();
	}
	/**
	 * �������Ĳ���
	 */
	function task_op(){
		switch (self::$task_info['scode']){
			case 'tg':
				if(self::$uid !== self::$buyeruid){
					$html = "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/sub_work'>��Ҫ����</a>";
				}elseif(self::$uid == self::$buyeruid and self::$task_info['work_num']<=0){
					$html .= "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/task_delay'>���ڼӼ�</a>";
				}
				
			break;
		}
		return $html;
		
	}
	/**
	 * ����б�
	 */
	function action_work(){
		 $this->reward_work();
	}
	
	/**
	 * ���񽻸�
	 */
	function action_sub_work(){
		 
		if(Keke_valid::not_empty($_POST)){
			
			Keke::formcheck($_POST['formhash']);
			
			$res = Keke_validation::factory($_POST)
			->rule('work_desc', 'Keke_valid::not_empty',array(':value',$_POST['work_desc'],'�����������Ϊ��'))
			->rule('work_desc', 'Keke_valid::min_length',array($_POST['work_desc'],10,'��������������10����'))
			//->rule('tel', 'Keke_valid::phone',array($_POST['tel'],11,'����д�й������ֻ���'))
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
			//���¸�����
			$sql ="update keke_witkey_file set obj_id = :work_id where obj_id=0  and obj_type='work' and pid=:task_id";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')
			->param(':work_id', $work_id)
			->param(':task_id',self::$task_id)
			->execute();
			Keke::show_msg('�ύ�ɹ�','task/'.self::$task_id);
			
			
		}elseif(self::$task_info['scode']=='tg' and self::$uid != self::$buyeruid ){
			
			Keke_user::check_login();
			
			$flie_types = File::flash_upload_ext();
			
			$task_info = self::$task_info;
			
			require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/sub_work");
		}
	}
	/**
	 * �������ڼӼ�
	 */
	function action_task_delay(){
		
		if( Keke::formcheck($_POST['formhash'])){

			$arr = $this->delay_info();
			$res = Keke_validation::factory($_POST)
			->rule('delay_cash', 'Keke_valid::large',array($_POST['delay_cash'],$arr['delay_cash'],'���ڷ��ñ���>='.$arr['delay_cash']))
			->rule('delay_day', 'Keke_valid::less',array($_POST['delay_day'],$arr['delay_day'],'����ʱ�����<='.$arr['delay_day']))
			;
			if($res->check()===FALSE){
				Keke::show_msg($res->errors(),$this->request->referrer(),'error');
			}
			//�������ڼ�¼
			DB::insert('witkey_task_delay')
			->set(array('task_id','delay_cash','delay_day','uid','on_time'))
			->value(array(self::$task_info['task_id'],$_POST['delay_cash'],$_POST['delay_day'],self::$uid,SYS_START_TIME))
			->execute();
			//��������

			$sql = "update keke_witkey_task set sub_time = sub_time + :delay_day,
					delay_cash = delay_cash + :delay_cash,
					task_cash = task_cash+:delay_cash, 
					real_cash = real_cash+:delay_cash*(1-profit_rate/100) 
					where task_id = :task_id";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')->param(':delay_day', $_POST['delay_day']*3600*24)
			->param(':delay_cash', $_POST['delay_cash'])
			->param(':task_id', self::$task_info['task_id'])
			->execute();
			
			//���ڵķ��ü�¼
			
			Sys_finance::get_instance(self::$buyeruid)->set_action('task_delay')
		
			->set_mem(array(':task_id'=>self::$task_id,':task_title'=>self::$task_info['task_title']))
		
			->set_obj('task', self::$task_id)->cash_out($_POST['delay_cash']);
			
			$this->request->redirect($_POST['refer']);	
				
		}elseif(self::$task_info['scode']=='tg' and self::$buyeruid == self::$uid){
			$refer = $this->request->referrer();
			$arr = $this->delay_info();
			extract($arr);
			if($arr['use_delay']<0){
				Keke::show_msg('�Ѿ���������������',"task/".self::$task_id,'error');
			}
			require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_delay");
		}	
	}
	
	/**
	 * ���������,ֻ�й�����ͷ�����վ�����ܲ������
	 * @param array $work_info
	 * @return array
	 */
	function work_op($work_info,$task_info=NULL){
		if($task_info===NULL){
			$task_info = self::$task_info;
			$buyeruid = self::$buyeruid;
		}else{
			$buyeruid = $task_info['uid'];
		}
		
		$arr = array();
         
		switch ($task_info['scode']){
 	    	case 'tg':
 	    	case 'xg':
 	    		
	 	    	$a= Sys_task_trade::instance('preward')->work_status();
	 	    	unset($a[0]);
	 	    	
	 	    	switch ($work_info['work_status']){
	 	    		case 0:
	 	    		break;
	 	    		case 1;
	 	    		    if(self::$uid == $buyeruid OR self::$uid == $work_info['uid']){
	 	    		    	$arr[0]['a'] = $this->mark_link($work_info,$task_info);
	 	    		    }
	 	    		    return $arr;
	 	    		break;
	 	    		case 2;
	 	    		unset($a[2]);
	 	    		break;
	 	    		default:
	 	    			$a = array();
	 	    		break;
	 	    	}
	 	    	if(!(self::$uid == $buyeruid OR $_SESSION['group_id']==1 OR $_SESSION['group_id']==4 )){
	 	    		return $arr;
	 	    	}
	 	    	foreach ($a as $k=>$v){
	 	    		$arr[]['a'] = "<a href=\"".PHP_URL."/task/{$work_info['task_id']}/set_work?s=$k&w={$work_info['work_id']}\" 
 	    			onclick=\"return kconfirm(this);\">{$v['status']}</a>";
	 	    	}
 	    	break;	
 	    }
 	    return $arr;
 	   
	}
	/**
	 * ���ø��״̬ 
	 * @return boolean
	 */
	function action_set_work(){
		//ֻ�й�����վ�����ͷ��ſ��Բ������
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
	    	//���¸����Ϣ
	    	DB::update('witkey_task_work')
	    	->set(array('work_status','work_price'))
	    	->value(array($s,self::$task_info['single_cash']))
	    	->where("work_id = '$w'")
	    	->execute();
	    	
	    	//�б굽�е���ʾ
	    	if($s==1){
	    		$work_info = DB::select()->from('witkey_task_work')->where("work_id= $w")->get_one()->execute();
	    		$this->work_to_end($work_info);
	    	}
	    }	
	}
  
	/**
	 * �Ը�����н��㣬���ɻ���,����ﵽ����Ҫ������������
	 */
	function work_to_end($work_info,$task_info = NULL){
		if($task_info===NULL){
			$task_info = self::$task_info;
			$conf = self::$conf;
		}else{
			$conf = unserialize($task_info['config']);
		}
		$to_cash = $task_info['single_cash']*(1-$task_info['profit_rate']/100);
		//�����б���
		Sys_finance::get_instance($work_info['uid'])->set_action('task_bid')
		->set_mem(array(':task_id'=>$task_info['task_id'],':task_title'=>$task_info['task_title']))
		->set_obj('task', $task_info['task_id'])
		->cash_in($to_cash,0,$task_info['single_cash']-$to_cash);
		
		//���ɻ�����¼
		$array=array(
				'model_code'=>$task_info['model_code'],
				'origin_id'=>$task_info['task_id'],
				'obj_id'=>$work_info['work_id'],
				'obj_cash'=>$work_info['work_price'],
				'uid'=>$work_info['uid'],
				'username'=>$work_info['username'],
				'by_uid'=>$task_info['uid'],
				'by_username'=>$task_info['username'],
				'mark_status'=>0,
				'mark_value'=>0,
				'mark_max_time'=>SYS_START_TIME+($conf['max_mark']*3600*24),
				'mark_type'=>'seller'
		);
		
		Model::factory('witkey_mark')->setData($array)->create();
			
		$array['uid']=$task_info['uid'];
		$array['username']=$task_info['username'];
		$array['by_uid']=$work_info['uid'];
		$array['by_username']=$work_info['username'];
		$array['mark_type']='buyer';
			
		Model::factory('witkey_mark')->setData($array)->create();
		
		//��֪ͨ
		Keke_msg::instance()->to_user($work_info['uid'])
		->set_tpl('task_confirm_accept')
		->set_var(array('{�������}'=>$task_info['task_title'],'{�б���}'=>$to_cash))
		->send();
		
		//��������״̬�Ƿ����
		
		$sql = "update keke_witkey_task t \n".
				"left join (\n".
				"select count(*) as hg_num from keke_witkey_task a \n".
				"left join keke_witkey_task_work b \n".
				"on a.task_id = b.task_id \n".
				"where a.task_id = :task_id and b.work_status = 1\n".
				"group by b.work_id\n".
				") k\n".
				"on 1=1\n".
				"set t.task_status = if(k.hg_num=t.need_work,4,t.task_status)\n".
				"where t.task_id = :task_id";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')->param(':task_id', $task_info['task_id'])->execute();
		
	}
	
	
	/**
	 * ����׶�ʱ������
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