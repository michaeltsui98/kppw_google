<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �������ù���
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_mreward_admin_config extends Control_admin_task_config{
	
	public  $_model_code   = 'mreward';
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
    	
    	//ʱ����������ڹ�����Ҫ�͵���
    	$time_rule = $this->get_tiem_rule();
   	    $delay_rule = $this->get_delay_rule();
   	    //ɾ��ʱ���url
   	    $del_time_url = BASE_URL.'/index.php/task/'.$this->_model_code.'_admin_config/del_time';
   	    //ɾ�����ڵ�url
   	    $del_delay_url = BASE_URL.'/index.php/task/'.$this->_model_code.'_admin_config/del_delay';
   	    
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
    /**
     * ɾ��ʱ�����
     */
    function action_del_time(){
      $this->del_time_rule();    	
    }
    /**
     * ɾ�����ڹ���
     */
    function action_del_delay(){
    	$this->del_delay_rule();
    }
}