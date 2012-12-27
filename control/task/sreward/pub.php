<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 单赏任务发布
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_sreward_pub extends Control_task_task{
     
    private $_tpl = 'control/task/sreward/tpl/';
    /**
     * @var 任务是否审核
     */
    private $_task_audio;
	/**
	 * @var 还需要多少钱
	 */
    private $_need_pay;
    /**
     * @var 正式任务ID
     */
    private $_task_id;
    /**
     * @var 任务模型配置
     */
    private $_conf;
    
    function before(){
    	parent::before();
    	//临时任务信息,后退修改时用
    	$id = $this->get_tmp_task_id();
    	$this->_task_info = DB::select()->from('witkey_task_temp')->where("id='$id'")->get_one()->execute();
    	
    }
    /**
     * 第一步
     */
	function action_index(){
		/**
		 * 临时任务信息,后退时有用
		 */
		$this->before();

		$task_info = $this->_task_info;
		
		if($task_info){
			$this->set_tmp_task_id($task_info['id']);
		}
		
		require Keke_tpl::template($this->_tpl.'release1');
	}
	/**
	 * 第二步,创建临时任务，或者是更新临时任务
	 */
	function action_step2(){
		$task_info = $this->_task_info;
		
		if($_POST){
			if($task_info['id']){
				DB::update('witkey_task_temp')->set(array('task_cash','sub_time'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time']))
				->where("id='{$task_info['id']}'")->execute();
			}else{
				$task_id = DB::insert('witkey_task_temp')->set(array('task_cash','sub_time','model_code','on_time'))
				->value(array((float)$_POST['task_cash'],(int)$_POST['sub_time'],'sreward',SYS_START_TIME))->execute();
				$this->set_tmp_task_id($task_id);
			}
		}
		
		require Keke_tpl::template($this->_tpl.'release2');
	}
	/**
	 * 第三步，保存任务需求
	 */
	function action_step3(){
		
		if($_POST){
			$_POST = Keke_tpl::chars($_POST);
			$columns = array('task_title','task_desc','task_file','task_indus','task_contact');
			$values = array($_POST['task_title'],$_POST['task_desc'],$_POST['task_file'],$_POST['task_indus'],$_POST['task_contact']);
			$id= $this->get_tmp_task_id();
			DB::update('witkey_task_temp')->set($columns)->value($values)->where("id='$id'")->execute();
		}
		//附件直接写到附件表,保存附件的ID,任务发布成功后更新附件的obj_id,obj_type,
		
		$this->before();
		$task_info = $this->_task_info;
		
		require Keke_tpl::template($this->_tpl.'release3');
	}
	/**
	 *  第四步，保存开票信息，判断用户是否要登录，没有登录就跳到登录页面，
	 *  登录完后，成跳到这里，继续发布当前任务
	 */
	function action_step4(){
		if($_POST){
			$_POST = Keke_tpl::chars($_POST);
			//开票信息
			if((bool)$_POST['allow_fp']){
				$columns = array('fp_title','fp_linxiren','fp_address','fp_zip','fp_mobile','fp_use');
				$values = array($_POST['fp_title'],$_POST['fp_linxiren'],$_POST['fp_address'],$_POST['fp_zip'],$_POST['fp_mobile'],intval((bool)$_POST['fp_use']));
				$id= $this->get_tmp_task_id();
				DB::update('witkey_task_temp')->set($columns)->value($values)->where("id='$id'")->execute();
			}
		}
		//判断用户是否有登录
		if(Keke_user_login::instance()->logged_in()===FALSE){
			Cookie::set('last_page', $this->request->uri());
			$this->request->redirect('login');
		}
		$this->before();
		
		$this->pub_task($this->_task_info);
		
	}
	/**
	 * 发布任务信息
	 */
	function pub_task($task_info){
		 
		$this->save_task_info($task_info);
		
		//保存发票信息
		$this->save_fp_info($task_info);
		 
		
		//任务发布通知
		$this->task_msg($task_info);
		
		if($this->_need_pay){
			//待付款任务生成付款订单
			$order_id = $this->task_order($task_info);
			Keke::show_msg('用户余额不足,请先充值',"user/finance_recharge?order_id=$order_id&cash=$this->_need_pay",'error');
		}elseif($this->_task_audio){
			Keke::show_msg('任务审核中，后台会尽快完成审核!',"task/$this->_task_id",'info');				
		}else{
			Keke::show_msg('任务发布成功',"task/$this->_task_id");
		}
		
	}
	/**
	 * 保存任务信息
	 * @param array $task_info
	 * @return int $task_id
	 */
	function save_task_info($task_info){
		//任务的财务信息
		$uid = $_SESSION['uid'];
		
		$model_list = Keke::init_model();
		
		$model_info = $model_list[1];
		
		$this->_conf = $model_conf = unserialize($model_info['config']);
		
		$profit_rate = (int)$model_conf['task_rate'];
		$fail_rate = (int)$model_conf['task_fail_rate'];
		$auto_bid = $model_conf['auto_bid']=='yes'?1:0;
		$real_cash = $task_info['task_cash']*((int)$profit_rate/100);
		$sub_time = (int)$task_info['sub_time']*3600*24+SYS_START_TIME;
		//审核线
		$audit_cash = (float)$model_conf['audit_cash'];
		
		$columns = array('task_cash','real_cash','start_time','sub_time','model_id','profit_rate','fail_rate',
						 'task_title','task_desc','indus_id',
						 'uid','username','contact','is_auto_bid');
		$values = array($task_info['task_cash'],$real_cash,SYS_START_TIME,$sub_time,1,$profit_rate,$fail_rate,
						$task_info['task_title'],$task_info['task_desc'],$task_info['task_indus'],
						$uid,$_SESSION['username'],$task_info['task_contact'],$auto_bid	);
		
		//入库
		$task_id = (int)DB::insert('witkey_task')->set($columns)->value($values)->execute();
		//付款
		$ispay = Sys_finance::get_instance($uid)->set_action('pub_task')
		
		->set_mem(array(':model_name'=>'sreward',':task_id'=>$task_id,':task_title'=>$task_info['task_title']))
		
		->set_obj('task', $task_id)->cash_out($task_info['task_cash']);
		
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
	 * 保存发信息
	 * @param array $fp_info
	 */
	function save_fp_info($fp_info){
		if(Keke_valid::not_empty($fp_info['fp_title'])===FALSE){
			return FALSE;
		}
		$arr = array('uid'=>$_SESSION['uid'],
				'fp_title'=>$fp_info['fp_title'],
				'fp_linxiren'=>$fp_info['fp_linxiren'],
				'fp_zip'=>$fp_info['fp_zip'],
				'fp_address'=>$fp_info['fp_address'],
				'fp_mobile'=>$fp_info['fp_mobile'],
				'fp_use'=>$fp_info['fp_use'],
				'obj_type'=>'task',
				'obj_id'=>$this->_task_id				
				);
		DB::insert('witkey_invoice')->set(array_keys($arr))->value(array_values($arr))->execute();
	}
	/**
	 * 任务通知,任务动态生成
	 */
	function task_msg($task_info){
		$msg_type = 'task_pub';
		$arr = array('{任务编号}'=>$this->_task_id,'{任务标题}'=>$task_info['task_title']);
		$arr['{开始时间}'] = date('Y-m-d',SYS_START_TIME);
		if($this->_need_pay){
		   $arr['{任务状态}'] = "待付款";
		   $arr['{投稿结束时间}'] = 'NULL';
		   $arr['{选稿结束时间}'] = 'NULL';
		}elseif($this->_task_audio){
			$arr['{任务状态}'] = "待审核";
			$arr['{投稿结束时间}'] = 'NULL';
			$arr['{选稿结束时间}'] = 'NULL';
		}else{
			$arr['{任务状态}'] = "投稿中";
			$arr['{投稿结束时间}'] = date('Y-m-d',((int)$task_info['sub_time']*3600*24)+SYS_START_TIME);
			$arr['{选稿结束时间}'] = date('Y-m-d',(((int)$task_info['sub_time']+(int)$this->_conf['choose_time'])*3600*24)+SYS_START_TIME);
		}
		
		Keke_msg::instance()->to_user($_SESSION['uid'])->set_tpl($msg_type)->set_var($arr)->send();
		
	}
	/**
	 * 任务付款订单
	 * @param array $task_info
	 */
	function task_order($task_info){
		if($this->_need_pay){
			return Sys_order::create_order(1, '', '', $task_info['task_title'], $task_info['task_cash'], '','wait');
		}
		return FALSE;
	}
	
	/**
	 * 任务发布推广,任务中标推广，在任务结束的时候再处理
	 */
	
	
}