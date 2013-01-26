<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �����̨�����б�
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_dtender_admin_list extends Control_admin_task_list{
	/**
	 * @var ģ�ʹ���
	 */
	public  $_model_code   = 'dtender';
 
	/**
	 * �����б�ҳ
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	//Ҫ��ʾ���ֶ�,��SQl��SELECTҪ�õ����ֶ�
    	$fields = ' `task_id`,`task_title`,`username`,`task_cash`,`model_id`,`task_status`,`indus_id`,`work_num`,`contact`,`start_time`,`is_top`';
    	//Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
    	$query_fields = array('task_id'=>$_lang['id'],'task_title'=>$_lang['name'],'task_cash'=>$_lang['cash']);
    	//�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
    	$count = intval($_GET['count']);
    	//����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
    	$base_uri = $this->_base_uri;
    	//��ӱ༭��uri,add���action �ǹ̶���
    	$add_uri =  $base_uri.'/add';
    	//ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
    	$del_uri = $base_uri.'/del';
    	//Ĭ�������ֶΣ����ﰴʱ�併��
    	$this->_default_ord_field = 'task_id';
    	//����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
    	extract($this->get_url($base_uri));
    	//��ָ�����͵�����
    	$model_id = DB::select('model_id')->from('witkey_model')->where("model_code='$this->_model_code'")->get_count()->execute();
    	$where  .= " and model_id = $model_id";
    	//��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
    	$data_info = Model::factory('witkey_task')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
    	//�б�����
    	$list_arr = $data_info['data'];
    	//��ҳ����
    	$pages = $data_info['pages'];
    	
    	$task_status = Control_task_dtender_trade::get_task_status();
     	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/list');
    }
    /**
     * ����༭
     */
    public function action_add(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	 //��ȡ������Ϣ
        $task_info = $this->get_task_info();
         
        $base_uri = $this->_base_uri;
        $process_arr = Control_admin_task_list::can_operate($task_info['task_status']);
        $indus_option_arr = Sys_indus::get_indus_tree($task_info['indus_id']);
        //��������״̬
        $status_arr = Control_task_dtender_trade::get_task_status();
        //��ȡ�������ֵ��
        $payitem_list = Sys_payitem::get_task_payitem($this->_task_id);
        
        $file_list = Control_admin_task_list::get_task_file($this->_task_id);
         
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_edit');
    }
    
    /**
     * ���񱣴�
     */
    public function action_save(){
    	$task_id = $_POST['task_id'];
    	if(!$task_id){
    		return FALSE;
    	}
    	Keke::formcheck($_POST['formhash']);
    	$array = array('task_title'=>$_POST['task_title'],
    			'indus_id'=>$_POST['slt_indus_id'],
    			'task_desc'=>$_POST['task_desc']);
    	$where = "task_id = $task_id";
    	Model::factory('witkey_task')->setData($array)->setWhere($where)->update();
    	$this->request->redirect($this->request->referrer());
    	
    }
    
    /**
     * �����Ƽ�
     */
    public function action_recommend(){
    	 $this->set_recommend();
    }
    /**
     * ȡ�������Ƽ�
     */
    public function action_unrecommend(){
    	//�ı������is_top Ϊ0
    	$this->set_unrecommend();
    }
    /**
     * ���񶳽�
     * ����task,����״̬Ϊ!('6','7','8','10','11')
	 * (2,3,4,5) ���Զ��� ,����ģ�����ж�
     */
    public function action_freeze(){
    	$this->set_freeze();
    }
    /**
     * ����ⶳ
     */
    public function action_unfreeze(){
    	 $this->set_unfreeze();
    }
    /**
     * ͨ����ˣ�����״̬��1->2
     */
    public function action_pass(){
    	$this->set_pass();
    }
    /**
     * ��ͨ����� 
     * ״̬״̬1->10 ���ʧ��
     */
    public function action_no_pass(){
    	 $this->set_no_pass();
    }
    /**
     * ɾ������
     */
    public function  action_del(){
    	//ɾ��������
    	$where = "task_id = $this->_task_id";
    	DB::delete('witkey_task_work')->where($where)->execute();
    	echo DB::delete('witkey_task')->where($where)->execute();
    }
    /**
     * �������б�ҳ
     */
    public function action_work(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	//��ȡ������Ϣ
    	$task_info = $this->get_task_info();
    	$base_uri = $this->_base_uri;
        $sql = "SELECT a.bid_id,a.message,a.task_id ,a.username,a.bid_status,\n".
                "a.quote,a.cycle,a.bid_time,\n".
				"a.hidden_status,a.comment_num\n".
				"from ".TABLEPRE."witkey_task_bid as a \n".
				"left join ".TABLEPRE."witkey_task as d\n".
				"on a.task_id = d.task_id\n";
				 
        //Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
        $query_fields = array('bid_id'=>$_lang['id'],'message'=>$_lang['name'],'username'=>$_lang['username']);
        //�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
        $count = intval($_GET['count']);
        //����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
        $base_uri = $this->_base_uri;
        //ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
        $del_uri = $base_uri.'/del';
        //Ĭ�������ֶΣ����ﰴʱ�併��
        $this->_default_ord_field = 'bid_id';
        //����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
        extract($this->get_url($base_uri.'/work?task_id='.$this->_task_id));
        
        //��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����

        $data_info = Model::sql_grid($sql,"d.task_id=".$task_id,$uri,$order,"GROUP BY a.bid_id");
        //�б�����
        $list_arr = $data_info['data'];
        //��ҳ����
        $pages = $data_info['pages'];
        $satus_arr = Control_task_dtender_task::get_work_status();
	 
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_work');
    }
    /**
     * �����ϸҳ
     */
    public function action_work_detail(){
    	global $_K,$_lang;
    	$work_id = $_GET['work_id'];
    	//�����Ϣ
    	$work_info = DB::select()->from('witkey_task_bid')->where("bid_id = '$work_id'")->get_one()->execute();
    	//�������
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$work_id' and obj_type='bid'")->execute();
    	
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/work_detail');
    }
    /**
     * ɾ��ָ�����
     * ɾ�������ͬʱҪɾ��������Ա����������,����
     */
    public function action_work_del(){
    	$work_id = $_GET['work_id'];
    	//ɾ����Ӧ���ļ�
    	$files = DB::select('save_name')->from('witkey_file')->where("obj_id = '$work_id' and obj_type='bid'");
    	foreach ($files as $v){
           $path = S_ROOT.$v['save_name'];
           if(file_exists($path)){
           	  unlink($path);
           } 		
    	}
    	//ɾ�����������ű�
    	$sql = "delete a,b,c from ".TABLEPRE."witkey_task_bid as a \n".
				"left join ".TABLEPRE."witkey_comment as b\n".
				"on b.obj_id = a.bid_id and b.obj_type='bid'\n".
				"left join ".TABLEPRE."witkey_file as c \n".
				"on a.bid_id = c.obj_id and c.obj_type='bid'\n".
				"where a.bid_id = '$work_id'";
		echo DB::query($sql,Database::DELETE)->execute();				
    }
    /**
     * ���������б�ҳ
     */
    public function action_comment(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	$base_uri = $this->_base_uri;
    	//��ȡ������Ϣ
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$task_id' and obj_type='task' ")->execute(); 
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_comment');
    }
    /**
     * ɾ����������
     */
    public function action_comment_del(){
    	$comment_id = $_GET['comment_id'];
    	echo DB::delete('witkey_comment')->where("comment_id = '$comment_id'")->execute();
    }
    /**
     * �������б�ҳ
     */
    public function action_mark(){
    	global  $_K ,$_lang;
    	$task_id = $this->_task_id;
    	$base_uri = $this->_base_uri;
    	//��ȡ������Ϣ
    	//$task_info = $this->get_task_info();
    	$where = "model_code = '$this->_model_code' and origin_id = '$task_id'";
    	$marks = DB::select()->from('witkey_mark')->where($where)->execute();
    	//����״̬
    	$mark_status = Keke_user_mark::get_mark_status();
    	//������
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/task_mark');
    }
    
  

    
}