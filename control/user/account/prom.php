<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź���-�ƹ�׬Ǯ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_account_prom extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'prom';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/account/prom');
	}
}