<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 多赏配置管理
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_mreward_admin_config extends Control_task_config{
	
	public  $_model_code   = 'mreward';
    /**
     * 基本配置
     */
	function action_index(){
    	global $_K,$_lang;
        $this->config_info();
    	$model_info = $this->_model_info;
    	$indus_index = $this->_indus_index;
    	$milist = $this->_milist;
    	$indus_arr = $this->_indus_arr;
    	//能过子分类得到同类子分类
    	$sub_indus = $this->_sub_indus;
    	
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/config');
    }
    /**
     * 流程配置
     */
    function action_control(){
    	global $_K,$_lang;
    	$model_info = $this->_model_info;
    	
    	//时间规则与延期规则，需要就调用
    	$time_rule = $this->get_tiem_rule();
   	    $delay_rule = $this->get_delay_rule();
   	    //删除时间的url
   	    $del_time_url = BASE_URL.'/index.php/task/'.$this->_model_code.'_admin_config/del_time';
   	    //删除延期的url
   	    $del_delay_url = BASE_URL.'/index.php/task/'.$this->_model_code.'_admin_config/del_delay';
   	    
    	require Keke_tpl::template('control/task/'.$this->_model_code.'/tpl/admin/control');
    }
    /**
     * 保存配置数据
     */
    function action_config_save(){
    	global $_lang;
    	$this->config_save();
    	Keke::show_msg($_lang['submit_success'],'task/'.$this->_model_code.'_admin_config');
    }
    /**
     * 保存流程配置 
     */
    function action_control_save(){
    	global $_lang;
    	$this->control_save();
    	Keke::show_msg($_lang['submit_success'],'task/'.$this->_model_code.'_admin_config/control');
    }
    /**
     * 删除时间规则
     */
    function action_del_time(){
      $this->del_time_rule();    	
    }
    /**
     * 删除延期规则
     */
    function action_del_delay(){
    	$this->del_delay_rule();
    }
}