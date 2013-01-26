<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-������-���̹���
 * @author ����
 * @version 3.0
   2012-12-26
 */

class Control_user_seller_shop extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'shop';
	
	function before(){
		parent::before();
		Control_user_seller_index::init_nav();
	}
	/**
	 * ���̿�ͨ����������
	 */
	function action_index(){
		global $_K,$_lang;
		//�Ƿ���֤
		$case_uri= USER_URL ."/seller_shop/case";
		$member_uri=USER_URL."/seller_shop/member";
					
		$is_auth = $this->get_is_auth();

		$shop_arr = DB::select()->from('witkey_shop')->where('uid = '.$_SESSION['uid'])->get_one()->execute();		
		
		require Keke_tpl::template('user/seller/shop');
	}
	/**
	 * �����б�
	 */
	function action_case(){
		$case_add_uri=USER_URL."/seller_shop/case_add";
		$case_del_uri=USER_URL."/seller_shop/case_del";
		$fields='`case_id`,`cate_id`,`shop_id`,`indus_id`,`case_type`,`service_id`,`case_name`,`case_desc`,`case_pic`,`case_url`,`start_time`,`end_time`,`on_time`';
		
		$query_fields = array (	'case_id' => '����ID',	'case_name' => '��������');
		$this->_default_ord_field='case_id';
		
		$base_uri = USER_URL.'/seller_shop/case';
		
		extract ( $this->get_url ( $base_uri ) );
		
		$data_info = Model::factory ( 'witkey_shop_case' )->get_grid ( $fields, $where, $uri, $order );
		
		$shop_case_list=$data_info['data'];

		$pages=$data_info['pages'];

		require Keke_tpl::template('user/seller/shop_case');
	}
	/**
	 * �����༭�����
	 */
	function action_case_add(){
		$case_save_uri=USER_URL."/seller_shop/case_save";
		$case_id = $_GET ['case_id'];
		$case_info = DB::select ()->from ( 'witkey_shop_case' )->where ( "case_id = '$case_id'" )->get_one ()->execute ();
		
		$shop_arr= DB::select ('shop_id')->from ( 'witkey_shop' )->where ( "uid = '$this->uid'" )->get_one ()->execute ();

		$indus_arr = Sys_indus::get_indus_tree($case_info['indus_id']);

		$service_arr = DB::select('sid,title')->from('witkey_service')->where("uid = $this->uid")->execute();	
		
		require Keke_tpl::template('user/seller/shop_case_add');
	}
	/**
	 * �������ݱ���
	 */
	function action_case_save(){
		Keke::formcheck ( $_POST ['formhash'] );
		$_POST = Keke_tpl::chars ( $_POST );
			
		$type = $_POST ['type'];
		$array=array(
				'indus_id'=>$_POST['sel_indus'],
				'case_type'=>$_POST['rad_casetype'],
				'case_desc'=>$_POST['txa_desc'],
				'case_url'=>$_POST['txt_url'],
				'shop_id'=>$_POST['hdn_shop_id'],
				'case_pic'=>File::upload_file('fil_pic','jpg|gif|png|jpeg'),
				);
		$arr=explode('@#',$_POST['sel_service']);
		$array['service_id']=$arr[0];
		$array['case_name']=$arr[1];

		
		if($_POST ['hdn_case_id']) {
			$case_id = $_POST ['hdn_case_id'];
			Model::factory ( 'witkey_shop_case' )->setData ( $array )->setWhere ( "case_id = '{$_POST['hdn_case_id']}'" )->update ();
			$this->request->redirect ( "/user/seller_shop/case_add?case_id=$case_id" );
		} else {
			Model::factory ( 'witkey_shop_case' )->setData ( $array )->create ();
			$this->request->redirect ( '/user/seller_shop/case' );
		}
	}
	/**
	 * ��������ɾ��
	 */
	function action_case_del(){
		if(isset($_GET['case_id'])){
			$where = 'case_id='.$_GET['case_id'];
		}
		DB::delete('witkey_shop_case')->where($where)->execute();
	}
	/**
	 * ��Ա�б�                                                                                  
	 */
	function action_member(){
		$member_add_uri=USER_URL."/seller_shop/member_add";
		$member_del_uri=USER_URL."/seller_shop/member_del";
		$fields='`member_id`,`shop_id`,`truename`,`member_pic`,`member_job`,`entry_age`,`top_eduction`,`school`,`member_desc`';
		$query_fields = array (	'member_id' => '��ԱID',	'truename' => '��Ա����');
		
		$this->_default_ord_field='member_id';
		 
		$base_uri = USER_URL.'/seller_shop/member';
		
		extract ( $this->get_url ( $base_uri ) );
		
		$data_info = Model::factory ( 'witkey_shop_member' )->get_grid ( $fields, $where, $uri, $order );
		
		$shop_member_list=$data_info['data'];
		
		$pages=$data_info['pages'];
		require Keke_tpl::template('user/seller/shop_member');
	}
	/**
	 * ��Ա�༭���
	 */
	function action_member_add(){
		$member_save_uri=USER_URL."/seller_shop/member_save";
		$member_id = $_GET ['member_id'];
		$shop_arr= DB::select ('shop_id')->from ( 'witkey_shop' )->where ( "uid = '$this->uid'" )->get_one ()->execute ();
		$member_info = DB::select ()->from ( 'witkey_shop_member' )->where ( "member_id = '$member_id'" )->get_one ()->execute ();
		//��ȡְλ����
		$inc_job=Control_user_account_detail::$inc_job;
		//��ȡ���
		$year = Date::get_year();
		list($s_year,$n_year) = explode(',', $member_info['entry_age']);
		$eduction=array('��ʿ','˶ʿ','����','��ר','����','����','Сѧ');
		require Keke_tpl::template('user/seller/shop_member_add');
	}
	/**
	 * ��Ա���ݱ���
	 */
	function action_member_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars ( $_POST );
		$array=array(
				'shop_id'=>$_POST['hdn_shop_id'],
				'truename'=>$_POST['txt_truename'],
				'member_pic'=>File::upload_file('fil_member_pic','jpg|gif|png|jpeg'),
				'member_job'=>$_POST['sel_member_job'],
				'member_desc'=>$_POST['txa_member_desc'],
				'top_eduction'=>$_POST['sel_top_eduction'],
				'school'=>$_POST['txt_school'],				
				);
		$array['entry_age']=$_POST['sel_left_entry_age'].",".$_POST['sel_right_entry_age'];

		if($_POST ['hdn_member_id']) {
			$member_id=$_POST ['hdn_member_id'];
			Model::factory ( 'witkey_shop_member' )->setData ( $array )->setWhere ( "member_id = '$member_id'" )->update ();
			$this->request->redirect ( "/user/seller_shop/member_add?member_id=$member_id" );
		} else {
			Model::factory ( 'witkey_shop_member' )->setData ( $array )->create ();
			$this->request->redirect ( '/user/seller_shop/member' );
		}
	}
	/**
	 *  ��Ա����ɾ��
	 */
	function action_member_del(){
		if(isset($_GET['member_id'])){
			$where = 'member_id='.$_GET['member_id'];
		}
		DB::delete('witkey_shop_member')->where($where)->execute();
	}
	/**
	 *  �������ݱ��� 
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		$arr = array('shop_name'=>$_POST['shop_name'],'shop_desc'=>$_POST['shop_desc'],
				'uid'=>$this->uid,'username'=>$this->username,'shop_type'=>$this->group_id==3?2:1
				);
		if($_POST['hdn_shop_id']){
			DB::update('witkey_shop')->set(array_keys($arr))->value(array_values($arr))->where("shop_id = '{$_POST['hdn_shop_id']}'")->execute();
		}else{
			DB::insert('witkey_shop')->set(array_keys($arr))->value(array_values($arr))->execute();
		}
		Keke::show_msg('�ύ�ɹ�','user/seller_shop');
	}
	
	/**
	 * �ж��Ƿ�ͨ����֤
	 * @return 
	 */
	function get_is_auth(){
		$info = DB::select()->from('witkey_member_auth')->where("uid = ".$_SESSION['uid'])->get_one()->execute();
		
		if($this->group_id==3){
			return (bool)$info['enterprise'];
		}else{
			return (bool)$info['realname'];
		}
	}
	
	
}