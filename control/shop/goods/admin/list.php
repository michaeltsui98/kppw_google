<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��̨�����б�
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_shop_goods_admin_list extends Control_admin_shop_list{
	/**
	 * @var ģ�ʹ���
	 */
	public  $_model_code   = 'goods';
 
	/**
	 * ��Ʒ�б�ҳ
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	//Ҫ��ʾ���ֶ�,��SQl��SELECTҪ�õ����ֶ�
    	$fields = ' `sid`,`title`,`username`,`price`,`unite_price`,`service_time`,`unit_time`,`sale_num`,`status`,`on_time`,`is_top`';
    	//Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
    	$query_fields = array('sid'=>$_lang['id'],'title'=>$_lang['title'],'price'=>$_lang['cash']);
    	//�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
    	$count = intval($_GET['count']);
    	//����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
    	$base_uri = $this->_base_uri;
    	//��ӱ༭��uri,add���action �ǹ̶���
    	$add_uri =  $base_uri.'/add';
    	//ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
    	$del_uri = $base_uri.'/del';
    	//Ĭ�������ֶΣ����ﰴʱ�併��
    	$this->_default_ord_field = 'sid';
    	//����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
    	extract($this->get_url($base_uri));
    	//��ָ�����͵���Ʒ
    	$model_id = DB::select('model_id')->from('witkey_model')->where("model_code='$this->_model_code'")->get_count()->execute();
    	$where  .= " and model_id = $model_id";
    	//��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
    	$data_info = Model::factory('witkey_service')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
    	//�б�����
    	$list_arr = $data_info['data'];
    	//��ҳ����
    	$pages = $data_info['pages'];
    	
    	$shop_status = Control_shop_goods_trade::get_goods_status();
    
     	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/list');
    }
    /**
     * ��Ʒ�༭
     */
    public function action_add(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	 //��ȡ��Ʒ��Ϣ
        $service_info = $this->get_service_info();
        
        $base_uri = $this->_base_uri;
        
        $process_arr = Control_shop_list::can_operate($service_info['shop_status']);
        
        $indus_option_arr = Sys_indus::get_indus_tree($service_info['indus_id']);
        //������Ʒ״̬
        $status_arr = Control_shop_goods_base::get_goods_status();
        //��ȡ��Ʒ����ֵ��
        $payitem_list = Sys_payitem::get_service_payitem($this->_sid);
        
        $file_list = Control_shop_list::get_service_file($this->_sid);
         
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/edit');
    }
    
    /**
     * ��Ʒ����
     */
    public function action_save(){
    	$sid = $_POST['sid'];
    	if(!$sid){
    		return FALSE;
    	}
    	Keke::formcheck($_POST['formhash']);
        $_POST = Keke_tpl::chars($_POST);
        $fds = $_POST['fds'];
        $fds['is_top'] = $fds['is_top']?'1':0;
    	$where = "sid = $sid";
    	Model::factory('witkey_service')->setData($fds)->setWhere($where)->update();
    	$this->request->redirect($this->request->referrer());
    	
    }
    
    /**
     * �ϼ�
     */
    public function action_recommend(){
    	 $this->set_recommend();
    }
    /**
     * �¼�
     */
    public function action_unrecommend(){
    	//�ı���Ʒ��is_top Ϊ0
    	$this->set_unrecommend();
    }
     
    /**
     * ɾ����Ʒ�������Ʒû�н����еĶ����������ɾ��
     */
    public function  action_del(){
    	echo $this->del_service();
    }
     
   
    /**
     * ��Ʒ�����б�ҳ
     */
    public function action_comment(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	//��ȡ��Ʒ��Ϣ
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$sid' and obj_type='shop' ")->execute(); 
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_comment');
    }
    /**
     * ��Ʒ�����б�ҳ
     */
    public function action_order(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	
    	$query_fields = array('b.order_id'=>$_lang['id'],'order_name'=>$_lang['title']);
    	
    	$this->_default_ord_field = 'order_time';
    	
    	$buri = $base_uri.'/order';
    	
    	$sql = "SELECT b.*,b.order_id as order_id,a.num FROM `:Pwitkey_order_detail` as a \n".
				"left join  :Pwitkey_order as b on a.order_id = b.order_id and a.obj_type = 'service'\n";
    	$sql  = DB::query($sql)->tablepre(':P')->__toString();
    	extract($this->get_url($buri));
    	$where .= " and a.obj_id = '$sid'";
    	$group = " GROUP BY b.order_id";
    	 
    
    	$data = Model::sql_grid($sql,$where,$uri,$order,$group);
    	$list_arr = $data['data'];
    	$pages = $data['pages'];
    	$order_status = Control_shop_goods_base::get_order_status();
     
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_order');
    }
    /**
     * ɾ����Ʒ����
     */
    public function action_comment_del(){
    	$comment_id = $_GET['comment_id'];
    	echo DB::delete('witkey_comment')->where("comment_id = '$comment_id'")->execute();
    }
    /**
     * ��Ʒ�����б�ҳ
     */
    public function action_mark(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	//��ȡ��Ʒ��Ϣ
    	 
    	$where = "model_code = '$this->_model_code' and origin_id = '$sid'";
    	$marks = DB::select()->from('witkey_mark')->where($where)->execute();
    	//����״̬
    	$mark_status = Keke_user_mark::get_mark_status();
    	//������
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_mark');
    }
    
  

    
}