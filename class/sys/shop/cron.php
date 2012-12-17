<?php defined('IN_KEKE') or die('access deiend');
/**
 * 服务计划执行类
 * @author Michael
 * @version 3.0 2012-12-07
 */
abstract  class Sys_shop_cron {
    
	/**
	 * @var 默认为单赏
	 */
	private static $_default = 'goods';
	/**
	 * @var 实例
	 */
	public static $instance = array();
	/**
	 * 
	 * @param string $name
	 * @return Sys_task_cron
	 */
	public static function factory($name = NULL){
		if($name===NULL){
			$name = self::$_default;
		}
		if(self::$instance[$name]){
			return self::$instance[$name];
		}
		
		$class = "Control_shop_{$name}_cron";
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
	 * 交付到位互评
	 */
	abstract public function jf_to_hp();
	/**
	 * 互评到结束
	 */
	abstract public function hp_to_end();
	/**
	 * 执行
	 */
	abstract  public function run();
	/**
	 * 批量执行
	 */
	public static function batch_run(){
		$where = "model_type='shop' and model_status = 1";
		$models = DB::select('model_code')->from('witkey_model')->where($where)->execute();
		foreach ($models as $v){
			Sys_shop_cron::factory($v['model_code'])->run();
		}
	}
}//end