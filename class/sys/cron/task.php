<?php defined('IN_KEKE') or die('access deiend');
/**
 * 任务计划执行类，
 * @author Michael
 * @version 3.0 2012-12-07
 */

abstract  class Sys_cron_task {
    
	/**
	 * @var 默认为单赏
	 */
	private static $_default = 'sreward';
	/**
	 * @var 实例
	 */
	public static $instance = array();
	/**
	 * 
	 * @param string $name
	 * @return Control_task_sreward_cron
	 */
	public static function factory($name = NULL){
		if($name===NULL){
			$name = self::$_default;
		}
		if(self::$instance[$name]){
			return self::$instance[$name];
		}
		
		$class = "Control_task_{$name}_cron";
		return self::$instance[$name]  = new $class;
	}
	/**
	 * 交稿到选搞
	 */
	abstract public function jg_to_xg();
	/**
	 * 选搞到公示
	 */
	abstract public function xg_to_gs();
    /**
     * 公示到交付
     */	
	abstract public function gs_to_jf();
	/**
	 * 交付到结束
	 */
	abstract public function jf_to_end();
	/**
	 * 结束到互评
	 */
	abstract public function end_to_hp();
	/**
	 * 执行
	 */
	abstract  public function run($config);
	/**
	 * 批量执行
	 */
	public static function batch_run(){
		$where = "model_type='task' and model_status = 1";
		$models = DB::select('model_code,config')->from('witkey_model')->where($where)->cached(99999)->execute();
		foreach ($models as $v){
			Sys_cron_task::factory($v['model_code'])->run($v['config']);
		}
	}
	
	
	/**
	 * 任务退款
	 */
	function task_recash($task_arr){
		if(Keke_valid::not_empty($task_arr)==FALSE){
			return ;
		}
		foreach ($task_arr as $v){
			$cash = $v['task_cash']*(1-self::$config['task_fail_rate']/100);
			$credit = 0;
			if(self::$config['defeated']==2){
				$credit = $cash;
				$cash = 0;
			}
	
			Sys_finance::get_instance($v['uid'])->set_action('task_fail')
	
			->set_mem(array(':model_name'=>$v['model_name'],':task_id'=>$v['task_id'],':task_title'=>$v['task_title']))
	
			->set_obj('task', $v['task_id'])->cash_in($cash,$credit);
		}
	}
}//end