<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��ҵ����
 * @author Michael
 * @version 3.0
   2012-10-10
 */

class Control_admin_config_indus extends Control_admin{
    /**
     * ��ҵ�б�
     */    
	function action_index(){
		global $_K,$_lang;
		//��ȡ���е���ҵ����
		$indus_arr = DB::select()->from('witkey_industry')->execute();
		//����
		sort ( $indus_arr );
		//ɾ��uri
		$del_uri = BASE_URL.'/index.php/admin/config_indus/del';
		//��ӣ��༭uri
		$add_uri = BASE_URL.'/index.php/admin/config_indus/add';
		//�ϲ�uri
		$merge_uri=BASE_URL.'/index.php/admin/config_indus/merge';
		$t_arr = array ();
		//������������
		Keke::get_tree ( $indus_arr, $t_arr, 'cat', NULL, 'indus_id', 'indus_pid', 'indus_name' );
		$indus_tree_arr =$t_arr;
		unset ( $t_arr );
		
		$indus_index_arr = Sys_indus::get_indus_by_index ();
		
		require Keke_tpl::template("control/admin/tpl/config/indus");
	}
	
	/**
	 * ����������ҵ����
	 */
	function action_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
		 
		//��ҵ��������,indus_id => indus_name
		$names = $_POST['names'];
		$orders = $_POST['orders'];
		$no = array();
		//�ϲ�Ҫ���µ�����������
		foreach ($names as $k=>$v){
			$no[$k] = array('name'=>$v,'order'=>$orders[$k]);
		}
		//Ҫ���µ����ݲ��뵽���ݿ�
		foreach ($no as $k=>$v){
			$columns = array('indus_name','listorder');
			$values = array($v['name'],$v['order']);
			$where = "indus_id = '$k'";
			$res += DB::update('witkey_industry')->set($columns)->value($values)->where($where)->execute();
		}
		//��������ҵ����
		$add_indus_name_listarr  = $_POST['add_indus_name_listarr'];
		//��������ҵ����
		$add_indus_name_arr = $_POST['add_indus_name_arr'];
		//�ϲ�����������������
		$add_arr = array();
		if($add_indus_name_arr){
			foreach ($add_indus_name_arr as $k=>$v) {
				$t = array();
				foreach ($v as $i=>$j){
				  $t[] = array('pid'=>$k,'name'=>$v[$i],'order'=>$add_indus_name_listarr[$k][$i]);
				}
				$add_arr[$k] = $t;
			}
		}
		//���������ݲ��뵽��
		if($add_arr){
			foreach ($add_arr as $k=>$v){
				$columns = array('indus_pid','indus_name','listorder');
				foreach ($v as $v1){
					$values = array($v1['pid'],$v1['name'],$v1['order']);
					DB::insert('witkey_industry')->set($columns)->value($values)->execute();
				}
			}
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_indus','success');
	}
	/**
	 * ɾ����ҵ����
	 */
	function action_del(){
		//ɾ������ҵ
		if($_GET['indus_id']){
			$indus_id = $_GET['indus_id'];
			echo DB::delete('witkey_industry')->where("indus_id = '$indus_id'")->execute();
		}
		//�������ҵ,�� ɾ�����µ�����ҵ��
		if($_GET['indus_pid']<=0){
		    DB::delete('witkey_industry')->where("indus_pid = $indus_id")->execute();		
		}
		
	}
	/**
	 * ��ʼ����ҵ���ҳ��
	 */
	function action_add(){
		global $_K,$_lang;
		
		$indus_pid = $_GET['indus_pid'];
		$indus_id = $_GET['indus_id'];
		
		$indus_arr = DB::select()->from('witkey_industry')->execute();
		//����
		sort ( $indus_arr );
	 
		$temp_arr = array ();
		//������������
		Keke::get_tree ( $indus_arr, $temp_arr, 'option', $indus_pid, 'indus_id', 'indus_pid', 'indus_name' );
		if($indus_id){
        	$where = "indus_id = '$indus_id'";
			$indus_info= DB::select()->from('witkey_industry')->where($where)->get_one()->execute();
		}
		require Keke_tpl::template("control/admin/tpl/config/indus_add");
	}
	/**
	 * ������ҵ�ı༭������
	 */
	function action_add_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
		//�����������������
		$check_pid = DB::select('indus_pid')->from('witkey_industry')->where("indus_id = {$_POST['slt_indus_pid']}")->get_count()->execute();
		if($check_pid>0){
			Keke::show_msg('ֻ�ʼ���Ӷ������࣬ϵͳ��֧����������','admin/config_indus/add','warning');
		}
		$columns = array('indus_pid','indus_name','is_recommend','listorder');
		$values = array($_POST['slt_indus_pid'],$_POST['indus_name'],$_POST['is_recommend'],$_POST['listorder']);
		//�༭����
		if($_POST['hdn_indus_id']){
			$where = "indus_id = '{$_POST['hdn_indus_id']}'";
			DB::update('witkey_industry')->set($columns)->value($values)->where($where)->execute();
			$uri  = "?indus_id={$_POST['hdn_indus_id']}&indus_pid={$_POST['slt_indus_pid']}";
		}else{
		//�������
			DB::insert('witkey_industry')->set($columns)->value($values)->execute();
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_indus/add'.$uri,'success');
	}
	/**
	 * ҵ��ϲ���ʼ��ҳ��
	 */
	function action_merge(){
		global $_K,$_lang;
		 //��ȡ��ҵ��Ϣ
		$indus_p_arr =  Keke::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', 0 );
		//�ύ�ϲ���Ϣ
		if($_POST){
			$url = 'admin/config_indus/merge';
			//��Դ��ҵ
			$slt_indus_id = $_POST['slt_indus_id'];
			//Ŀ����ҵ
			$to_indus_id = $_POST['to_indus_id'];
			//�ύ�Ĳ�������Ϊ��!
			($to_indus_id or $slt_indus_id) or Keke::show_msg($_lang['target_industry_not_top'],$url,'warning');
			//��ͬ����ҵ����ȫ��
			($slt_indus_id != $to_indus_id) or Keke::show_msg('ͬһ����ҵ���ܺϲ�',$url,'warning'); 
			//����ԭ��ҵ������ҵ
			DB::update('witkey_industry')->set(array('indus_pid'))->value(array($to_indus_id))->where("indus_pid='$slt_indus_id'")->execute();
			//ɾ����Դ����ҵ
			DB::delete('witkey_industry')->where("indus_id = '$slt_indus_id'")->execute();
			Keke::show_msg($_lang['industry_union_success'],$url,'success');
		}
		
		require Keke_tpl::template('control/admin/tpl/config/indus_merge');
	}
}