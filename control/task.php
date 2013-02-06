<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * ������ϸҳ��������ҳ������ļ�
 * @copyright keke-tech
 * @author Michael
 * @version 3.0
 */

class Control_task extends Control_front{
	
	static protected $task_info = NULL;
	static protected $conf = NULL;
	static protected $v = NULL;
	static protected $buyeruid =NULL;
	static protected $uid = NULL;
	static protected $task_id=NULL;
	
	function action_index(){
		global $_K;
		$task_id = $this->request->param('id');
		if(Keke_valid::not_empty($task_id)==false){
			Keke::show_msg('û���ҵ���Ӧ������','index.php','info');
		}
		self::$v = $this->request->param('v');
		self::$task_info =  $this->get_task_info($task_id);
		if(Keke_valid::not_empty(self::$task_info)===FALSE){
			Keke::show_msg('û���ҵ���Ӧ������','index.php','info');
		}
		self::$task_id = $task_id;
		self::$buyeruid = self::$task_info['uid'];
		self::$uid = $_SESSION['uid'];
		self::$conf = unserialize(self::$task_info['config']);
		
		$_K['page_title'] =self::$task_info['task_title'].'--'.$_K['html_title'];
		
		$_K['seo_keyword'] = self::$task_info['task_title'];
		
		$_K['seo_desc'] = self::$task_info['task_desc'];
		
		$model = self::$task_info['model_code'];
		$class = "Control_task_{$model}_info";
		$c = new $class($this->request, $this->response);
		
		if(self::$v){
			$a = 'action_'.self::$v;
			$c->$a();
		}else{
			$c->action_index();
		}
	}
	
	
	/**
	 * ��ȡ����+ģ����Ϣ
	 * @param int $task_id
	 * @return array();
	 */
	function get_task_info($task_id){
		$sql = "select * from keke_witkey_task a\n".
				"left join keke_witkey_model b \n".
				"on a.model_id = b.model_id\n".
				"left join keke_witkey_status c\n".
				"on c.model_code= b.model_code and c.stype='task' and a.task_status = c.sid\n".
				"where a.task_id = :task_id";
		return DB::query($sql)->tablepre('keke_')->param(':task_id', $task_id)->get_one()->execute();
	}
	/**
	 * ���񸽼���Ϣ
	 * @param int $task_id
	 */
	function get_task_att($task_id){
		 $sql = "select file_id,file_name,save_name \n".
				"from keke_witkey_file \n".
				"where obj_type='task' \n".
				"and obj_id = :obj_id and pid = 0 ";
		 
		 return DB::query($sql)->tablepre('keke_')->param(':obj_id', $task_id)->execute();
	}
	
	//���Ҫ���ص��ļ�
	function get_files($fnames,$fsnames){
		$fnames = explode(',', $fnames);
		$fsnames = explode(',', $fsnames);
		return array_map(NULL, $fnames,$fsnames);
	}
	/**
	 * ������Ϣ
	 * @return number
	 */
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
	 * ����˫���滥������
	 * @param array $work_info �����Ϣ
	 * @return string  <a href="mark?id=12">����</a>
	 */
	function mark_link($work_info,$task_info){
		if(self::$uid == $work_info['uid']){
			$where  = " mark_type='buyer' and by_uid = {$work_info['uid']} and obj_id = {$work_info['work_id']} and origin_id = {$work_info['task_id']}";
		}elseif(self::$uid ==$task_info['uid']){
			$where  = " mark_type='seller' and by_uid =".$task_info['uid']." and obj_id = {$work_info['work_id']} and origin_id = {$work_info['task_id']}";
		}
		$where .= " and mark_count <2";
		$mark_info = DB::select('mark_id,mark_count,mark_status')->from('witkey_mark')->where($where)->get_one()->execute();
		//�޸Ļ��������Ǻ�������ֻ���޸�һ�� 
		if($mark_info['mark_count']==1 and $mark_info['mark_status']>1){
			$str = "�޸Ļ���";
		}elseif(Keke_valid::not_empty($mark_info) and $mark_info['mark_count']==0){
			$str = "����";
		}
		return '<a href="'.PHP_URL."/mark/?id={$mark_info['mark_id']}\">$str</a>";
	
	}
	/**
	 * ��������͸��
	 */
	function reward_work(){
		$sql ="SELECT a.*,\n".
				"c.`status`,c.scode,\n".
				"e.uid,e.username,e.mobile,e.qq,\n".
				"r.m_title ,r.m_ico,\n".
				"ifnull(cast((e.seller_good_num/e.seller_total_num)*100 as decimal(10,2)),0) seller_good_rate,\n".
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
		
		$where .= " and  m.model_code = '".self::$task_info['model_code']."' and b.task_id=".self::$task_info['task_id'];
		
		$group_by = ' group by a.work_id';
		
		$data = Model::sql_grid($sql,$where,$base_uri,$order,$group_by);
		
		$work_arr = $data['data'];
			
		$pages = $data['pages']['page'];
		
		require Keke_tpl::template("control/task/".self::$task_info['model_code']."/tpl/task_work");
	}
	
	
}
 