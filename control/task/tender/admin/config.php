<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �������ù���
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_tender_admin_config extends Control_admin_task_config{
	
	public  $_model_code   = 'tender';
    /**
     * ��������
     */
	function action_index(){
    	global $_K,$_lang;
        $this->config_info();
    	$model_info = $this->_model_info;
    	$indus_index = $this->_indus_index;
    	$milist = $this->_milist;
    	$indus_arr = $this->_indus_arr;
    	//�ܹ��ӷ���õ�ͬ���ӷ���
    	$sub_indus = $this->_sub_indus;
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/config');
    }
    /**
     * ��������
     */
    function action_control(){
    	global $_K,$_lang;
    	$model_info = $this->_model_info;
   	    
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/control');
    }
    /**
     * ������������
     */
    function action_config_save(){
    	global $_lang;
    	$this->config_save();
    	Keke::show_msg($_lang['submit_success'],'task/'.$this->_model_code.'_admin_config');
    }
    /**
     * ������������ 
     */
    function action_control_save(){
    	global $_lang;
    	$this->control_save();
    	Keke::show_msg($_lang['submit_success'],'task/'.$this->_model_code.'_admin_config/control');
    }

}