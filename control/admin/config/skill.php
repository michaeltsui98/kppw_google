<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ֧�ܹ���
 * @author Michael
 * @version 3.0
   2012-10-10
 */

class Control_admin_config_skill extends Control_admin{
    
	function action_index(){
    	global $_K,$_lang;
    	//ѡ��Ҫ��ѯ���ֶΣ������б�����ʾ
		$fields = '`skill_id`,`indus_id`,`skill_name`,`listorder`,`on_time`';
		//�������õ����ֶ�
		$query_fields = array('skill_id'=>'��ҵID','skill_name'=>'��������','on_time'=>$_lang['time']);
		//����uri
		$base_uri = BASE_URL.'/index.php/admin/config_skill';
		
		$del_uri = $base_uri.'/del';
		//ͳ�Ʋ�ѯ�����ļ�¼��������
		$count = intval($_GET['count']);
		//Ĭ�������ֶ�
		$this->_default_ord_field = 'on_time';
		//�����ѯ������
		extract($this->get_url($base_uri));
		//��ȡ��ҳ����ز���
		$data_info = Model::factory('witkey_skill')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//�б�����
		$skill_arr = $data_info['data'];
		$pages = $data_info['pages'];

		$indus_option_arr = DB::select()->from('witkey_industry')->execute();
		$indus_show_arr = Keke::get_arr_by_key($indus_option_arr,'indus_id');
    	require Keke_tpl::template("control/admin/tpl/config/skill");
    }
    
    function action_add(){
    	global $_K,$_lang;
    	if($_GET['skill_id']){
    		$sid = $_GET['skill_id'];
    		$skill_info = DB::select()->from('witkey_skill')->where("skill_id=$sid")->get_one()->execute();
    	}
    	//��ȡ���е���ҵ����
    	$indus_arr = DB::select()->from('witkey_industry')->execute();
    	$t_arr = array ();
    	//������������
    	Keke::get_tree ( $indus_arr, $t_arr, 'option', $skill_info['indus_id'], 'indus_id', 'indus_pid', 'indus_name' );
    	$indus_tree_arr =$t_arr;
    	unset ( $t_arr );
    	
    	require Keke_tpl::template('control/admin/tpl/config/skill_add');
    }
    function action_del(){
    	//ɾ������,�����case_id ����ģ���ϵ������������е�
		if($_GET['skill_id']){
			$where = 'skill_id = '.$_GET['skill_id'];
			//ɾ������,���������ͳһΪidsӴ����
		}elseif($_GET['ids']){
			$where = 'skill_id in ('.$_GET['ids'].')';
		}
		//���ִ��ɾ�����Ӱ��������ģ���ϵ�js �������ֵ���ж��Ƿ�����tr��ǩ��
		//ע���в��ܴ���������ȥע�͵Ĺ���ʧЧ,��ʹ�Ĺ��߰�!
		echo  Model::factory('witkey_skill')->setWhere($where)->del();
    }
    function action_save(){
    	$_POST = Keke_tpl::chars($_POST);
    	//��ֹ�����ύ���㶮��
    	Keke::formcheck($_POST['formhash']);
    	//������ô˵�أ���������sql ���ֶ�=>ֵ �����飬�㲻����������̫����.
    	$array = array(
    			'skill_name'=>$_POST['skill_name'],
    			'indus_id'=>$_POST['indus_id'],
    			'listorder' => $_POST['txt_listorder'],
    			'on_time'=>time(),
    	);
    	$skill_id=$_POST['hdn_skill_id'];
    	//���Ǹ������ֶΣ�Ҳ����������ֵ�����������ֵ������Ҫ�༭(update)���ݵ����ݿ�
    	if($skill_id){
    		Model::factory('witkey_skill')->setData($array)->setWhere("skill_id = '$skill_id'")->update();
    		//ִ�����ˣ�Ҫ��һ����ʾ��
    		Keke::show_msg('�ύ�ɹ�','admin/config_skill/add?skill_id='.$skill_id,'success');
    	}else{
    		//��Ҳ��Ȼ�������(insert)�����ݿ���
    		$cate_id = Model::factory('witkey_skill')->setData($array)->create();
    		
    		Keke::show_msg('�ύ�ɹ�','admin/config_skill/add','success');
    	}
    }
    
}