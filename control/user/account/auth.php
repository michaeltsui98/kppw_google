<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź���-�˺Ű�ȫ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_account_auth extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'auth';
	/**
	 * ʵ����֤
	 */
	function action_index(){
		
		$auth_info = DB::select()->from('witkey_auth_realname')->where("uid= ".self::$uid)->get_one()->execute();
		
		
		$gid = DB::select('group_id')->from('witkey_space')->where("uid= ".self::$uid)->get_count()->execute();
		if($gid==3){
			$this->action_enter();
		}else{
			require Keke_tpl::template('user/account/auth_realname');
		}
	}
	function action_real_save(){
		
		Keke::formcheck($_POST['formhash']);
		
		$realname = $_POST['realname'];
		
		$id_code = $_POST['id_code'];
		if($this->check_realname($id_code)===TRUE){
			Keke::show_msg('������֤�Ѿ���֤����','user/account_auth','error');
		}
		//����ͼƬ
		$id_pic = File::upload_file('id_pic');
		 
		//����ͼƬ
		$pic = File::upload_file('pic');
		
		$sql = "replace into `:keke_witkey_auth_realname`\n".
				"(uid,username,realname,id_code,pic,id_pic,start_time,auth_status) \n".
				"values (:uid,:username,:realname,:id_code,:pic,:id_pic,:start_time,:auth_status)";
		$params = array(':uid'=>self::$uid,':username'=>$this->username,':realname'=>$realname,
				      ':id_code'=>$id_code,':pic'=>$pic,':id_pic'=>$id_pic,
					  ':start_time'=>SYS_START_TIME,':auth_status'=>0);
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->parameters($params)->execute();
		
		Keke::show_msg('�ύ�ɹ�','user/account_auth');
	}
	/**
	 * �ж����֤�������ù���
	 * @param string $code
	 * @return bool
	 */
    function check_realname($code){
    	return (bool)DB::select('count(*)')->from('witkey_auth_realname')
    	->where("id_code='$code' and auth_status =0")->get_count()->execute();
    	
    }
	/**
	 * ��ҵ��֤
	 */
	function action_enter(){
		
		$auth_info = DB::select()->from('witkey_auth_enterprise')->where("uid=".self::$uid)->get_one()->execute();
	     
		require Keke_tpl::template('user/account/auth_enter');
	}
	/**
	 * ��ҵ��֤�ύ
	 */
	function action_enter_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		$licen_num = $_POST['licen_num'];
		if($this->check_enter($licen_num)===TRUE){
			Keke::show_msg('���պ��Ѿ���֤����','user/account_auth/enter','error');
		}
		$licen_num = $_POST['licen_num'];
		$company = $_POST['company'];
		$licen_pic = File::upload_file('licen_pic');
		$start_time = SYS_START_TIME;
		$legal = $_POST['legal'];
		$url = $_POST['url'];
		$id_code = $_POST['id_code'];
		$id_pic = File::upload_file('id_pic');
		$pic = File::upload_file('pic');

		$sql ="replace into  `:keke_witkey_auth_enterprise` \n".
				"(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)\n".
				"VALUES\n".
				"(".self::$uid.",'$this->username','$company','$licen_num','$licen_pic','$start_time',0,'$legal','$url','$id_code','$id_pic','$pic')";
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
		
		
		Keke::show_msg('�ύ�ɹ�','user/account_auth/enter');
	}
	/**
	 * ��������ҵ�Ƿ���֤����
	 * @param string $code
	 * @return boolean
	 */
	function check_enter($code){
		return(bool)DB::select('count(*)')->from("witkey_auth_enterprise")
		->where("licen_num='$code' and auth_status =0")->get_count()->execute();
	}

}