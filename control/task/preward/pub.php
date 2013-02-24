<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �Ƽ����񷢲�
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_preward_pub extends Control_task_task{
     
    private $_tpl = 'control/task/preward/tpl/';
    
    function before(){
    	parent::before();
    	//��ʱ������Ϣ,�����޸�ʱ��
    	$id = $this->get_tmp_task_id();
    	$this->_task_info = DB::select()->from('witkey_task_temp')->where("id='$id'")->get_one()->execute();
    	
    	$model_list = Keke::init_model();
    	
    	$this->_model_info = $model_list[3];
    	
    	$this->_conf = $model_conf = unserialize($this->_model_info ['config']);
    }
    /**
     * ��һ��
     */
	function action_index(){
		/**
		 * ��ʱ������Ϣ,����ʱ����
		 */
		$this->before();

		$task_info = $this->_task_info;
		
		if($task_info){
			$this->set_tmp_task_id($task_info['id']);
		}
		
		require Keke_tpl::template($this->_tpl.'release1');
	}
	/**
	 * �ڶ���,������ʱ���񣬻����Ǹ�����ʱ����
	 */
	function action_step2(){
		$task_info = $this->_task_info;
		
		if(Keke::formcheck($_POST['formhash'])){
			$ck = Keke_validation::factory($_POST)
			->rule('task_cash', 'Keke_valid::large',array($_POST['task_cash'],$this->_conf['min_cash'],'�����ͽ�������'.$this->_conf['min_cash']))
			->rule('need_work', 'Keke_valid::large',array($_POST['need_work'],1,'����Ҫ����������1'))
			;
			if($ck->check()===false){
				Keke::show_msg($ck->errors(),$this->request->referrer(),'error');
			}
			$task_cash = (float)$_POST['task_cash'];
			$single_cash = round($task_cash/(int)$_POST['need_work'],2);
			if($task_info['id']){
				DB::update('witkey_task_temp')->set(array('task_cash','sub_time','need_work','single_cash'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time'],(int)$_POST['need_work'],$single_cash))
				->where("id='{$task_info['id']}'")->execute();
			}else{
				$task_id = DB::insert('witkey_task_temp')->set(array('task_cash','sub_time','model_code','on_time','need_work','single_cash'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time'],'preward',SYS_START_TIME,
						(int)$_POST['need_work'],$single_cash))
				->execute();
				 
				$this->set_tmp_task_id($task_id);
			}
		}
		
		require Keke_tpl::template($this->_tpl.'release2');
	}
	/**
	 * ��������������������
	 */
	function action_step3(){
		
		if($_POST){
			$_POST = Keke_tpl::chars($_POST);
			$columns = array('task_title','task_desc','task_file','task_indus','task_contact');
			$values = array($_POST['task_title'],$_POST['task_desc'],$_POST['task_file'],$_POST['task_indus'],$_POST['task_contact']);
			$id= $this->get_tmp_task_id();
			DB::update('witkey_task_temp')->set($columns)->value($values)->where("id='$id'")->execute();
		}
		//����ֱ��д��������,���渽����ID,���񷢲��ɹ�����¸�����obj_id,obj_type,
		
		$this->before();
		$task_info = $this->_task_info;
		
		require Keke_tpl::template($this->_tpl.'release3');
	}
	/**
	 *  ���Ĳ������濪Ʊ��Ϣ���ж��û��Ƿ�Ҫ��¼��û�е�¼��������¼ҳ�棬
	 *  ��¼��󣬳������������������ǰ����
	 */
	function action_step4(){
		if($_POST){
			$_POST = Keke_tpl::chars($_POST);
			//��Ʊ��Ϣ
			if((bool)$_POST['allow_fp']){
				$columns = array('fp_title','fp_linxiren','fp_address','fp_zip','fp_mobile','fp_use');
				$values = array($_POST['fp_title'],$_POST['fp_linxiren'],$_POST['fp_address'],$_POST['fp_zip'],$_POST['fp_mobile'],intval((bool)$_POST['fp_use']));
				$id= $this->get_tmp_task_id();
				DB::update('witkey_task_temp')->set($columns)->value($values)->where("id='$id'")->execute();
			}
		}
		//�ж��û��Ƿ��е�¼
		if(Keke_user_login::instance()->logged_in()===FALSE){
			Cookie::set('last_page', $this->request->uri());
			$this->request->redirect('login');
			exit();
		}
		$this->before();
		
		$this->pub_task($this->_task_info);
		
	}
	/**
	 * ����������Ϣ
	 */
	function pub_task($task_info){
		 
		$this->save_task_info($task_info);
		$task_info['task_id'] = $this->_task_id;
		
		$task_info['model_id'] = 3;
		
		$task_info['model_code'] = 'preward';
		
		//���淢Ʊ��Ϣ
		self::save_fp_info($task_info);
		 
		//���񷢲�֪ͨ
		 
		$this->task_msg($task_info);
		
		if(Keke_valid::not_empty($this->_need_pay)){

			//�������������ɸ����
			$order_id = self::task_order($task_info);
			
			Keke::show_msg('�û�����,���ȳ�ֵ',"user/finance_recharge?order_id=$order_id&cash=$this->_need_pay",'error');
		}elseif($this->_task_audio){
			Keke::show_msg('��������У���̨�ᾡ��������!',"task/$this->_task_id",'info');				
		}else{
			//�����ɹ����ɶ�̬
			self::pub_feed($task_info);
			
			Keke::show_msg('���񷢲��ɹ�',"task/$this->_task_id");
		 
		}
		
	}
	/**
	 * ����������Ϣ
	 * @param array $task_info
	 * @return int $task_id
	 */
	function save_task_info($task_info){
		//����Ĳ�����Ϣ
		$uid = $_SESSION['uid'];
		
		$profit_rate = (int)$this->_conf['task_rate'];
		$fail_rate = (int)$this->_conf['task_fail_rate'];
		$auto_bid = $this->_conf['auto_bid']=='yes'?1:0;
		$real_cash = $task_info['task_cash']*(1-(int)$profit_rate/100);
		$sub_time = (int)$task_info['sub_time']*3600*24+SYS_START_TIME;
		//�����
		$audit_cash = (float)$this->_conf['audit_cash'];
		
		$columns = array('task_cash','real_cash','start_time','sub_time','model_id','profit_rate','fail_rate',
						 'task_title','task_desc','indus_id',
						 'uid','username','contact','is_auto_bid','need_work','single_cash');
		$values = array($task_info['task_cash'],$real_cash,SYS_START_TIME,$sub_time,3,$profit_rate,$fail_rate,
						$task_info['task_title'],$task_info['task_desc'],$task_info['task_indus'],
						$uid,$_SESSION['username'],$task_info['task_contact'],$auto_bid,$task_info['need_work'],$task_info['single_cash']);
		
		//���
		$task_id = (int)DB::insert('witkey_task')->set($columns)->value($values)->execute();
		//����
		$ispay = self::task_pay($uid, $task_id, $task_info['task_title'], $task_info['task_cash'], $this->_model_info['model_name']);
		
		$status = 0;
		
		if($ispay<0){
			$this->_need_pay = abs($ispay);
		}else{
			$status = $task_info['task_cash']>=$audit_cash?2:1;
		}
		
		if($status===1){
			$this->_task_audio = TRUE;
		}
		
		DB::update('witkey_task')->set(array('task_status'))->value(array($status))->where("task_id = '$task_id'")->execute();
		
		$this->_task_id = $task_id;
		
		return $task_id;
	}
	
	/**
	 * ����֪ͨ
	 */
	function task_msg($task_info){
		$msg_type = 'task_pub';
		$arr = array('{������}'=>$task_info['task_id'],'{�������}'=>$task_info['task_title']);
		$arr['{��ʼʱ��}'] = date('Y-m-d',SYS_START_TIME);
		if($this->_need_pay){
			$arr['{����״̬}'] = "������";
			$arr['{Ͷ�����ʱ��}'] = 'NULL';
			$arr['{ѡ�����ʱ��}'] = 'NULL';
		}elseif($this->_task_audio){
			$arr['{����״̬}'] = "�����";
			$arr['{Ͷ�����ʱ��}'] = 'NULL';
			$arr['{ѡ�����ʱ��}'] = 'NULL';
		}else{
			$arr['{����״̬}'] = "Ͷ����";
			$arr['{Ͷ�����ʱ��}'] = date('Y-m-d',((int)$task_info['sub_time']*3600*24)+SYS_START_TIME);
			$arr['{ѡ�����ʱ��}'] = date('Y-m-d',(((int)$task_info['sub_time']+(int)$this->_conf['choose_time'])*3600*24)+SYS_START_TIME);
		}
		//���Ͷ���
		Keke_msg::instance()->to_user($_SESSION['uid'])->set_tpl($msg_type)->set_var($arr)->send();
	
	}
 
}