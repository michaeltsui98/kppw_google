<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��̨�б�������
 * @author Michael
 * @version 3.0
   2012-10-21
 */
Keke_lang::load_lang_class('list','task');
abstract class Control_admin_task_list extends Control_admin{
    
	/**
	 *
	 * @var ����id
	 */
	protected  $_task_id ;
	protected  $_base_uri;
	/**
	 * @var ����ģ������
	 */
	protected  $_conf;
	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->_task_id = intval($_GET['task_id']);
		$this->_base_uri  = BASE_URL."/index.php/task/".$this->_model_code."_admin_list";
		
		$model_list = Keke::init_model();
		 
		$model_info = $model_list[$this->_model_id];
		 
		$this->_conf = $model_conf = unserialize($model_info['config']);
	}
 
    /**
     * �����Ƽ�
     */
    public function set_recommend(){
    	//�ı������is_top Ϊ1
    	$where = "task_id = '$this->_task_id'";
    	DB::update('witkey_task')->set(array('is_top'))->value(array(1))->where($where)->execute();
    }
    /**
     * ȡ�������Ƽ�
     */
    public function set_unrecommend(){
    	//�ı������is_top Ϊ0
    	$where = "task_id = '$this->_task_id'";
    	DB::update('witkey_task')->set(array('is_top'))->value(array(0))->where($where)->execute();
    }
    /**
     * ���񶳽�
     * ����task,����״̬Ϊ!('6','7','8','10','11')
     * (2,3,4,5) ���Զ��� ,����ģ�����ж�
     */
    public function set_freeze(){
    	 
    	//���ɶ����¼
    	$task_info = $this->get_task_info();
    	$columns = array('frost_status','task_id','frost_time','admin_uid','admin_username');
    	$values = array($task_info['task_status'],$task_info['task_id'],time(),$_SESSION['admin_uid'],$_SESSION['admin_username']);
    
    	DB::insert('witkey_task_frost')->set($columns)->value($values)->execute();
    	//�ı�����״̬Ϊ7 freeze
    	$this->set_status(7);
    	 
    }
    /**
     * ����ⶳ
     */
    public function set_unfreeze(){
    	//�ı�����״̬����������Ľ���ʱ��
    	$where = "task_id = $this->_task_id";
    	$frost_info = DB::select()->from('witkey_task_frost')->where($where)->get_one()->execute();
    	$task_info = $this->get_task_info();
    	//�µ��������ʱ��
    	$end_time = (time () - $frost_info ['frost_time']) + $task_info['end_time'];
    	//�µĽ������ʱ��,��ǰʱ�������ʱ��Ĳ�ֵ����ԭ����ʱ����
    	$sub_time = (time () - $frost_info ['frost_time']) +$task_info['sub_time'];
    	$columns = array('sub_time','end_time','task_status');
    	$values = array($sub_time,$end_time,$frost_info['frost_status']);
    	DB::update('witkey_task')->set($columns)->value($values)->where($where)->execute();
    	//ɾ�������¼
    	DB::delete('witkey_task_frost')->where($where)->execute();
    	 
    }
    /**
     * ͨ����ˣ�����״̬��1->2
     */
    public function set_pass(){
    	global $_lang;
    	//��ȡ����ס��
    	$task_info =  $this->get_task_info();
    	//�ı�����״̬��������Ĳ�����ʱ�������ʱ��
    	$sub_time = $task_info['sub_time'] + (time()-$task_info['start_time']);
    	$where = "task_id = $this->_task_id ";
    	
    	DB::update('witkey_task')
    	->set(array('task_status','start_time','sub_time'))
    	->value(array(2,time(),$sub_time))
    	->where($where)->execute();
    	
    	//����������ֵ����Ľ���ʱ��
    	DB::update('witkey_payitem_record')
    	->set(array('end_time'))
    	->value(array('use_num*24*3600+'.time()))
    	->where("obj_type='task' and obj_id = '$this->_task_id'")->execute();
    	//������Ϣ
    	$this->task_msg($task_info);
    	//��������feed
    	Control_task_task::pub_feed($task_info);
     
    }
    /**
     * ����֪ͨ
     */
    function task_msg($task_info){
    	
    	$arr = array('{������}'=>$task_info['task_id'],'{�������}'=>$task_info['task_title']);
    	$arr['{��ʼʱ��}'] = date('Y-m-d',SYS_START_TIME);
    	$arr['{����״̬}'] = "Ͷ����";
    	$arr['{Ͷ�����ʱ��}'] = date('Y-m-d',((int)$task_info['sub_time']*3600*24)+SYS_START_TIME);
    	$arr['{ѡ�����ʱ��}'] = date('Y-m-d',(((int)$task_info['sub_time']+(int)$this->_conf['choose_time'])*3600*24)+SYS_START_TIME);
    	//���Ͷ���
    	Keke_msg::instance()->to_user($task_info['uid'])->set_tpl('task_pub')->set_var($arr)->send();
    }
    
    /**
     * ��ͨ�����
     * ״̬״̬1->10 ���ʧ��
     */
    public function set_no_pass(){
    	//�ı�����״̬
    	$this->set_status(10);
    	$task_info = $this->get_task_info();
    	//�˻������ͽ�
    	
    	$data = array($this->_conf['model_name'],$task_info['task_title']);
    	//ֻ�˻��ͽ��������ò���
    	
    	Sys_finance::get_instance($task_info['uid'])
    	->set_action('task_fail')
    	->set_mem($data)
    	->set_obj('task', $task_info['task_id'])
    	->cash_in($task_info['task_cash']);
    	
    }
    
    
    /**
     * ��ȡ������Ϣ
     * @param int $task_id
     * @return Ambigous <string, unknown, Ambigous>
     */
    public function get_task_info($task_id = NUll){
    	if($task_id == NULL){
    		$where = "task_id = '$this->_task_id'";
    	}else{
    		$where = "task_id = '$task_id'";
    	}
    	return  DB::select()->from('witkey_task')->where($where)->get_one()->execute();
    }
    /**
     * ��������״̬
     * @param int $status
     * @param int $task_id
     */
    public function set_status($status,$task_id=NULL){
    	if($task_id===NULL){
    		$where = "task_id = '$this->_task_id'";
    	}else{
    		$where = "task_id = '$task_id'";
    	}
    	return (bool)DB::update('witkey_task')->set(array('task_status'))->value(array($status))->where($where)->execute();
    }
    /**
     * ��̨����༭���Բ�������
     * @param int $status ����״̬
     * @return multitype:unknown Ambigous <>
     */
    public static function can_operate($status) {
    	global $_lang;
    	$operate = array ();
    	switch ($status) {
    		case "1" : //�����
    			$operate ['pass'] = $_lang['pass_audit'];
    			$operate ['nopass'] = $_lang['pass_audit'];
    			break;
    		case "2" : //Ͷ��
    		case "3" : //ѡ��
    		case "4" : //ͶƱ
    		case "5" : //��ʾ
    		case "6" : //����
    			$operate ['freeze'] = $_lang['freeze_task'];
    			break;
    		case "7" : //����
    			$operate ['unfreeze'] = $_lang['unfreeze_task'];
    	}
    	return $operate;
    }
    /**
     * ��ȡ����ĸ���
     * @param int $task_id
     * @return Ambigous <string, unknown, Ambigous>
     */
    public static  function get_task_file($task_id){
    	$where ="obj_type='task' and obj_id = '$task_id'";
    	return DB::select()->from('witkey_file')->where($where)->execute();
    }
    /**
     * ��ȡ�������ĸ���
     * @param int $task_id
     */
    public static function get_work_file($task_id){
    	$work_ids = DB::select('GROUP_CONCAT(work_id)')->from('witkey_task_work')
    	->where("task_id ='$task_id'")
    	->group("task_id")->get_count()
    	->execute();
    	if($work_ids){
    		$where = " obj_type='work' and obj_id in($work_ids)";
    		return DB::select()->from('witkey_file')->where($where)->execute();
    	}else{
    		return NULL;
    	}
    	
    }
    /**
     * ɾ��ָ������,Ĭ��ɾ����ǰ���������
     * @return number
     */
    public function del_task($task_id = NULL){
    	if($task_id===NULL){
    		$task_id = $this->_task_id;
    	}
    	$task_info = $this->get_task_info($task_id);
    	
    	$sql = "delete a.*,b.*,c.*,d.* \n".
				"FROM keke_witkey_task a \n".
				"left JOIN  keke_witkey_task_work b\n".
				"on a.task_id = b.task_id \n".
				"left join keke_witkey_task_bid c\n".
				"on a.task_id = c.task_id\n".
				"left join keke_witkey_comment d\n".
				"on a.task_id = d.obj_id and d.obj_type = 'task'\n".
				"where a.task_id = '$task_id' and a.uid = '{$task_info['uid']}'";
		//����ĸ���
        
    	File::del_file_by_task($task_id, $task_info['uid']);
    	
     	return (int)DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
    }
    /**
     * ɾ������+����ĸ�����+��¼
     * @param int $task_id
     */
    public static function del_files_by_task($task_id){
    	$files = (array)self::get_task_file($task_id)+(array)self::get_work_file($task_id);
    	$file_id = array();
    	foreach ($files as $v){
    		$path = S_ROOT.$v['save_name'];
    		if(is_file($path)){
    			unlink($path);
    		}
    		$file_id[] = $v['file_id'];
    	}
    	if(empty($file_id)){
    		return TRUE;
    	}
    	$ids = implode(',', $file_id);
    	$where = " file_id in($ids) ";
    	return DB::delete('witkey_file')->where($where)->execute();
    }
}