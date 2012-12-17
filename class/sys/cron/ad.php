<?php defined('IN_KEKE') OR die('access deiend');
/**
 * 广告到期时间，自动更新
 * @author Michael
 *
 */
Class Sys_cron_ad {
	
	/**
	 * 定时更新到期广告，将到期广告设为0,更新周期1天更新一次
	 */
	public static function batch_run(){

		Dbfactory::execute(sprintf("update %switkey_ad set is_allow='0' where  end_time>0 and end_time>%d",TABLEPRE,time()));
		
	}
	
}