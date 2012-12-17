<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 任务后台配置控制基类
 * @author Michael
 * @version 2.2
   2012-10-19
 */

abstract class Control_task_config extends Control_admin{
    
	/**
	 * @var 模型配置信息
	 */
	protected $_model_info ;
	/**
	 * @var 行业索引
	 */
	protected $_indus_index;
	/**
	 * @var 绑定行业;
	 */
	protected $_milist;
	/**
	 * @var 所有行业
	 */
	protected $_indus_arr;
	/**
	 * @var 绑定行业的同级行业
	 */
	protected $_sub_indus;
	/**
	 * 模型的基本配置信息
	 * @see Keke_Controller::before()
	 */
	function __construct($request, $response){
		parent::__construct($request, $response);
		Keke::init_model();
		$model_list = Keke::get_arr_by_key(Keke::$_model_list,'model_code');
		$model_info = $model_list[$this->_model_code];
		//模型信息
		$model_info += unserialize($model_info['config']);
		$this->_model_info = $model_info;
	}
 
	/**
	 * 任务配置信息
	 */
	public function config_info(){
		$model_info = $this->_model_info;
		$this->_indus_index =$indus_index = Sys_indus::get_indus_by_index();
			
		$this->_milist = $milist = explode(',',$model_info['indus_bid']);
		$this->_indus_arr = $indus_arr = Sys_indus::get_industry();
		//能过子分类得到同类子分类
		if($milist){
			$sql = "select indus_id ,indus_name from %switkey_industry a inner join
			(select  indus_pid  from %switkey_industry where indus_id in('%s') ) b
			on a.indus_pid = b.indus_pid";
			$sql = sprintf($sql,TABLEPRE,TABLEPRE,$model_info['indus_bid']);
			$this->_sub_indus = $sub_indus = DB::query($sql)->execute();
		}
	}
	/**
	 * 保存配置
	 * @return boolean
	 */
	public function config_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		$_POST['fds']['indus_bid'] = implode(',', $_POST['fds']['indus_bid']);
		Model::factory('witkey_model')->setData($_POST['fds'])->setWhere('model_id = '.$_POST['fds']['model_id'])->update();
		Cache::instance()->del('keke_model');
		return TRUE;
	}
	/**
	 * 时间规则
	 */
	function get_tiem_rule(){
		$where = "model_id = ".$this->_model_info['model_id'];
		return DB::select()->from('witkey_task_time_rule')->where($where)->execute();
	}
	/**
	 * 保存时间规则
	 */
	function set_time_rule(){
		$time_rule = $_POST['timeOld'];
		//先删除原来的规则
		$model_id = $this->_model_info['model_id'];
		$where = "model_id = '$model_id'";
		DB::delete('witkey_task_time_rule')->where($where)->execute();
		//添加新的规则
		if(is_array($time_rule)){
	
			foreach ($time_rule as $v){
				$columns = array('rule_cash','rule_day','model_id');
				$values = array($v['rule_cash'],$v['rule_day'],$model_id);
				DB::insert('witkey_task_time_rule')->set($columns)->value($values)->execute();
			}
		}
	}
	/**
	 * 删除时间规则
	 */
	function del_time_rule(){
		$rule_id = $_GET['rule_id'];
		if($rule_id){
			DB::delete('witkey_task_time_rule')->where("day_rule_id = $rule_id")->execute();
		}
	}
	/**
	 * 延期规则
	 */
	function get_delay_rule(){
		$where = "model_id = ".$this->_model_info['model_id'];
		return DB::select()->from('witkey_task_delay_rule')->where($where)->execute();
	}
	/**
	 * 保存延期规则
	 */
	function set_delay_rule(){
		$delay_rul = $_POST['delayOld'];
		//先删除原来的规则
		$model_id = $this->_model_info['model_id'];
		$where = "model_id = '$model_id'";
		DB::delete('witkey_task_delay_rule')->where($where)->execute();
		//添加新的规则
		if(is_array($delay_rul)){
			foreach ($delay_rul as $v){
				$columns = array('defer_times','defer_rate','model_id');
				$values = array($v['defer_times'],$v['defer_rate'],$model_id);
				DB::insert('witkey_task_delay_rule')->set($columns)->value($values)->execute();
			}
		}
	}
	/**
	 * 删除延期规则
	 */
	function del_delay_rule(){
		$rule_id = $_GET['rule_id'];
		if($rule_id){
			DB::delete('witkey_task_delay_rule')->where("defer_rule_id = $rule_id")->execute();
		}
	}
	/**
	 * 流程配置
	 */
	function control_save(){
		keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		$array = array('config'=>serialize($_POST['conf']));
		$where = "model_id =". $_POST['model_id'];
		//保存扩展配置
		Model::factory('witkey_model')->setData($array)->setWhere($where)->update();
		$this->set_time_rule();
		$this->set_delay_rule();
		Cache::instance()->del('keke_model');
	}
	
}