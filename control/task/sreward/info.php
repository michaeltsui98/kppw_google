<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �������񷢲�
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_sreward_info extends Control_task{
	
	
	function action_index(){
		
		$base_url = PHP_URL.'/task/'.self::$task_info['task_id'];
		
		$task_info  = self::$task_info;
		 
		
		$file_arr = $this->get_task_att($task_info['task_id']);
		 
		$buyer_leve =Keke_user_mark::get_title($task_info['uid'],'buyer');
		 
		
		$work_status_arr = Control_task_sreward_trade::work_status();
		
		register_shutdown_function(array(Control_task_sreward_cron::factory('sreward'),'run'),self::$conf);
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_info");
		Keke::async_request();
	}
	
	function task_op(){
		switch (self::$task_info['scode']){
			case 'tg':
				if(self::$uid !== self::$buyeruid){
					$html = "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/sub_work'>��Ҫ����</a>";
				}
				$html .= "<a href='".PHP_URL."/task/".self::$task_info['task_id']."/task_delay'>���ڼӼ�</a>";
			break;
		}
		return $html;
		
	}
	
	function action_work(){
		
		$sql ="SELECT a.*,\n".
				"c.`status`,\n".
				"e.uid,e.username,e.mobile,e.qq,\n".
				"r.m_title ,r.m_ico,\n".
				"cast((e.seller_good_num/e.seller_total_num)*100 as decimal(10,2)) seller_good_rate,\n".
				"GROUP_CONCAT(conv(oct(f.file_id),8,10)) fids,\n".
				"group_concat(f.file_name) fnames,\n".
				"GROUP_CONCAT(f.save_name) fsnames\n".
				"from keke_witkey_task_work a \n".
				"left join keke_witkey_task b \n".
				"on a.task_id = b.task_id \n".
				"left join keke_witkey_model m\n".
				"on b.model_id = m.model_id \n".
				"left join keke_witkey_status c\n".
				"on a.work_status = c.sid and c.model_code = m.model_code and c.stype = 'work'\n".
				"left join keke_witkey_space e \n".
				"on a.uid  = e.uid \n".
				"left join keke_witkey_mark_rule r \n".
				"on r.mark_rule_id = e.seller_level\n".
				"left join keke_witkey_file f\n".
				"on f.obj_type='work' and f.obj_id = a.work_id and f.pid = a.task_id\n";
				 
				
		$sql = DB::query($sql)->tablepre('keke_')->compile(Database::instance());
		
		$this->_default_ord_field = 'a.work_id';
		
		$base_uri = PHP_URL . "/task/".self::$task_info['task_id']."/work";
		
		extract ( $this->get_url ( $base_uri ) );
		
		$where .= " and  m.model_code = 'sreward' and b.task_id=".self::$task_info['task_id'];
		
		$group_by = ' group by a.work_id';
		
		$data = Model::sql_grid($sql,$where,$base_uri,$order,$group_by);
		
		$work_arr = $data['data'];
		 
		$pages = $data['pages']['page'];
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_work");
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
			->param(':task_id',self::$task_info['task_id'])
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
		
		if(Keke_valid::not_empty($_POST)){
			Keke::formcheck($_POST['formhash']);
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
					task_cash = task_cash+:delay_cash where task_id = :task_id";
			DB::query($sql,Database::UPDATE)->tablepre('keke_')->param(':delay_day', $_POST['delay_day']*3600)
			->param(':delay_cash', $_POST['delay_cash'])
			->param(':task_id', self::$task_info['task_id'])
			->execute();
				
				
		}elseif(self::$task_info['scode']=='tg' and self::$buyeruid == self::$uid){
			
			$arr = $this->delay_info();
			extract($arr);
			if($arr['use_delay']<0){
				Keke::show_msg('�Ѿ���������������',"task/".self::$task_id,'error');
			}
			require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_delay");
		}	
	}
	
	function delay_info (){
		//��ǰ�û���������Ϣ
		$where = " uid = ".self::$uid." and task_id = ".self::$task_info['task_id'];
		$user_delay = DB::select()->from('witkey_task_delay')->where($where)->execute();
	
		$used_delay = sizeof($user_delay);
		//��ǰ�Ĵ���
		$delay_num = $used_delay+1;
	
		$user_info = Keke_user::instance()->get_user_info(self::$uid,'balance,credit');
	
		if($GLOBALS['_K']['is_allow_credit']==2){
			$user_info['credit']= 0;
		}
	
		//���ڹ���
		$sql = "SELECT a.* FROM keke_witkey_task_delay_rule a\n".
				"left join keke_witkey_task b\n".
				"on b.model_id = a.model_id\n".
				"where b.task_id = :task_id";
		$delay_rule = DB::query($sql)->tablepre('keke_')
		->param(':task_id', self::$task_info['task_id'])
		->execute();
	
		$delay_rule = Arr::get_arr_by_key($delay_rule, 'defer_times');
	
		//��ǰ�����Ĺ�����Ϣ
		$rule_info = $delay_rule[$delay_num];
		//���ڽ��
		$delay_cash = self::$task_info['task_cash']*($rule_info['defer_rate']/100);
		//��������
		$delay_day = self::$conf['max_delay'];
	
		$max_rules = sizeof($delay_rule);
	
		//��Ҫ�����ڵĴ���
		$use_delay =$max_rules-$delay_num;
	
		$arr['user_info'] = $user_info;
		$arr['delay_num'] = $delay_num;
		$arr['delay_rule'] = $delay_rule;
		$arr['delay_cash'] = $delay_cash;
		$arr['delay_day'] = $delay_day;
		$arr['use_delay'] = $use_delay;
		return $arr;
	}
	/**
	 * ���������
	 * @param array $work_info
	 * @return array
	 */
	function work_op($work_info){
		
		$arr = array();
		
 	    switch (self::$task_info['scode']){
 	    	case 'tg':
 	    	case 'xg';
	 	    	if(!(self::$uid == self::$buyeruid or $_SESSION['group_id']==1 or $_SESSION['group_id']==4 )){
	 	    		return $arr;
	 	    	}
	 	    	switch ($work_info['work_status']){
	 	    		case 0;
	 	    		$arr[1] = '�б�';
	 	    		$arr[2] = '��ѡ';
	 	    		$arr[3] = '��̭';
	 	    		$arr[4] = '����';
	 	    		break;
	 	    		case 2;
	 	    		$arr[1] = '�б�';
	 	    		$arr[3] = '��̭';
	 	    		$arr[4] = '����';
	 	    		break;
	 	    	}
 	    	break;	
 	    		
 	    	case 'jf':
 	    		//var_dump($work_info );die;
 	    		if( (int)$work_info['work_status']==1 
 	    			and self::$uid == self::$buyeruid
 	    			and (int)self::$task_info['sub_status']==1
 	    		){
 	    			$arr['buyer_confirm'] = 'ȷ������';
 	    			
 	    		}elseif((int)$work_info['work_status']==1 
 	    			and self::$uid == $work_info['uid']
 	    			and (int)self::$task_info['sub_status']==0
 	    		){
 	    			
 	    			$arr['seller_confirm'] = 'ȷ�Ͻ���';
 	    		}
 	    	    
 	    		break;
 	    	case 'mark':
 	    		if( $work_info['work_status']==1
 	    			and ( 
	 	    			self::$uid == self::$buyeruid
	 	    			or  self::$uid == $work_info['uid']
 	    			)
 	    		){
 	    	    	$arr['task_mark'] = '������';
 	    		}
 	    		break;
 	    }
 	    
	    return $arr;
	}
	//���ø��״̬ 
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
	    	//�б굽�е���ʾ
	    	DB::update('witkey_task_work')->set(array('work_status'))->value(array($s))->where("work_id = '$w'")->execute();
	    	$this->task_to_gs();
	    }else{
	    	$this->$s($w);
	    }	
	}
    /**
     * ���ȷ�����ղ�����,��������¼
     * @param int $work_id
     */	
	function buyer_confirm($work_id){
		
		
	}
	/**
	 * ����ȷ�Ͻ���
	 * @param int $work_id
	 */
	function seller_confirm($work_id){
		
		$task_id= (int)self::$task_id;
		$where="task_id= '$task_id'";
		
		DB::update('witkey_task')
		->set(array('sub_status'))
		->value(array(1))
		->where($where)
		->execute();
		$this->refer();
	}
	
	/**
	 * �������
	 * @param int $work_id
	 */
	function task_mark($work_id){
		
		
	}
	
	
	/**
	 * ��������Ϊ��ʾ
	 */
	function task_to_gs(){
		$sp_time = (int)self::$conf['sp_time'];
		
		$sql ="update keke_witkey_task set task_status = 5 ,sp_time = :sp_time where task_id = :task_id";
		DB::query($sql,Database::UPDATE)->tablepre('keke_')
		->param(':sp_time', SYS_START_TIME+($sp_time*3600))
		->param(':task_id', self::$task_info['task_id'])
		->execute();
	}
	
	
	/**
	 * �������
	 */
	function action_work_comment(){
		
	}
	
	
	/* function action_mark(){
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_mark");
	} */
	 
}