<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-д��
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_msg_index extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'msg';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'index';
	
	function action_index(){
		
		require Keke_tpl::template('user/msg/index');
	}
	
   function action_check_username(){
       $username = $this->request->param('id');
       $where = "username = '$username'";
       (int)$res = DB::select('uid')->from('witkey_member')->where($where)->get_count()->execute();
       if($res > 0){
       	  echo  true;
       }else{
       	  echo 'user_not_exists';
       }
   }
   
   function action_send(){
      	Keke::formcheck($_POST['formhash']);
	   	//��sqlע��
	   	$_POST=Keke_tpl::chars($_POST);
	   	//ȡ���û���
	   	(int)$to_uid = DB::select('uid')->from('witkey_member')->where("username='{$_POST['txt_to_username']}'")->get_count()->execute();
	   	//������Ϣ
	   	Keke_msg::instance()->send_msg($to_uid,$_POST['txt_title'],$_POST['txt_content']);
	   	keke::show_msg('���ͳɹ�','user/msg_out');
   }
 
	
}