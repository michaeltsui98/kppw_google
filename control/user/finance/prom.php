<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ-�û���ֵ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_finance_prom extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'prom';
	
	function action_index(){
		
		
		
		require Keke_tpl::template('user/finance/prom_in');
	}
	/**
	 * �ƹ�����
	 */
	function action_relation(){
		
		require Keke_tpl::template('user/finance/prom_relation');
	}
}