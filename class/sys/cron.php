<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 计划任务的处理
 * 
 * @author Michael
 * @version 3.0 2012-11-19
 *        
 */
abstract class Sys_cron {
	/**
	 * @var 自动执行计划的时间 1小时
	 */
	protected static $_crontime = 3600;
	
	private static $_name = 'Sys_task_cron';
 
	
	/**
	 * 执行计划
	 */
	static public function run() {
		 $where = "nextruntime <= ".SYS_START_TIME ." and allow =1";
		 
		 $cron = DB::select()->from('witkey_cron')->where($where)
		 ->limit(0, 1)->get_one()->execute();
		 
		//Keke::$_log->add(Log::DEBUG, $cron['cron_name'])->write();
		
		//判断计划是否有值
		if(Keke_valid::not_empty($cron)===FALSE){
			return TRUE;
		}
		
		
		
		ignore_user_abort ( TRUE );
		set_time_limit ( 1000 );
		
		Keke::$_log->add(Log::INFO, $cron['cron_name'])->write();
		
		//执行计划任务,文件名为空则不执行
		if(!$cron['filename']){
			return TRUE;
		}
			 /* $class = new $cron['filename'];
			 $class ->batch_run(); */
		call_user_func($cron['filename'] .'::batch_run');
		
		self::set_next_time($cron);
	}
	
	/**
	 * 更新下次计划执行的时间
	 */
	static function set_next_time($cron) {
		DB::update('witkey_cron')->set(array('nextruntime'))
		->value(array(SYS_START_TIME+(int)$cron['span']))
		->where("cron_id = {$cron['cron_id']}")->execute(); 
	}
	/**
	 * 批量执行
	 */
	abstract public function batch_run();
	
	/**
	 * 进程锁定
	 */
	static function is_lock(){
		
	}
	/**
	 * 进程解锁
	 */
	static function un_lock(){
		
	}
	
}
