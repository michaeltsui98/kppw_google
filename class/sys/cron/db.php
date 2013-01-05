<?php defined('IN_KEKE') OR die('access deiend');
/**
 * 数据库优化处理
 * @author Michael
 *
 */
Class Sys_cron_db {
	
	
	public static function batch_run(){

		$table_arr = DB::query ( "SHOW TABLE STATUS FROM `" . DBNAME . "` LIKE '" . TABLEPRE . "%'" )->execute();
		foreach ($table_arr as $v){
			DB::query( "OPTIMIZE TABLE " . $v['Name'],Database::UPDATE)->execute();
		}
		 
		//清除过期的临时任务信息
		$sql = "delete from :keke_witkey_task_temp where DATE(FROM_UNIXTIME(on_time))<=DATE_SUB(CURDATE(),INTERVAL 1 day)";
		
		DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
	}
	
}