<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

class Control_admin_main extends Control_admin {
	
	function action_index(){
		global $_lang,$_K;
		 
		$file_obj = new keke_file_class ();
		$file_size = $file_obj->getdirsize ( S_ROOT . '/data/uploads' );
		$file_size = intval ( $file_size / 1024 / 1024 ); // 获取当前附件大小
		
		$tables = Dbfactory::query ( "SHOW TABLE STATUS " );
		foreach ( $tables as $table ) { // 数据库大小
			$dbsize += $table ['Data_length'] + $table ['Index_length'];
		}
		
		$dbsize = round ( $dbsize / 1024 / 1024, 2 ); // 转换单位
		$mysql_ver = mysql_get_server_info (); // 获得 MySQL 版本
		 
		
		/* 系统信息 */
		$sys_info ['os'] = PHP_OS;
		$sys_info ['ip'] = $_SERVER ['SERVER_ADDR'];
		$sys_info ['web_server'] = mb_strcut($_SERVER ['SERVER_SOFTWARE'],0,-10);
		$sys_info ['php_ver'] = PHP_VERSION;
		$sys_info ['mysql_ver'] = $mysql_ver;
		$sys_info ['safe_mode'] = ( boolean ) ini_get ( 'safe_mode' ) ? $_lang ['yes'] : $_lang ['no'];
		$sys_info ['safe_mode_gid'] = ( boolean ) ini_get ( 'safe_mode_gid' ) ? $_lang ['yes'] : $_lang ['no'];
		$sys_info ['timezone'] = function_exists ( 'date_default_timezone_set' ) ? date_default_timezone_set ( 'Asia/Shanghai' ) : date_default_timezone_set ( 'Asia/Shanghai' );
		
// 		var_dump(ini_get_all());
		
		/* 允许上传的最大文件大小 */
		$sys_info ['max_filesize'] = ini_get ( 'upload_max_filesize' );
		$sys_info ['file_uploads'] = ini_get ( 'file_uploads' );
		//是否开启上传
		$info['allow_upload'] = (bool)ini_get('file_uploads')?'yes':'no';
		//安全模式
		$info['safe_mode'] = Keke::$_safe_mode?'yes':'no';
		
		
		$pars = array (
				'ac' => 'run',
				'sitename' => urlencode ( $_K ['website_name'] ),
				'siteurl' => htmlentities ( $_K ['website_url'] ),
				'charset' => $_K ['charset'],
				'version' => KEKE_VERSION,
				'release' => KEKE_RELEASE,
				'os' => PHP_OS,
				'php' => $_SERVER ['SERVER_SOFTWARE'],
				'mysql' => $mysql_ver,
				'browser' => urlencode ( $_SERVER ['HTTP_USER_AGENT'] ),
				'username' => urlencode ( $_SESSION ['username'] ),
				'email' => $_K ['email'] ? $_K ['email'] : 'noemail',
				'p_name' => P_NAME
		);
		
		$data = http_build_query ( $pars );
		$filename= S_ROOT.'config/lic.php';
		is_file($filename) and include $filename;
		$lic = $_K ['ci'];
		$str_lic = Keke::set_star ( $lic, 5, 5, '3', '*' );
		$verify = md5 ( $data . $lic );
		$notice = "http://www.Kekezu.com/update.php?" . $data . "&lic=" . urlencode ( $lic ) . "&verify=" . $verify;
		$sys = array (
				"ac" => "sysinfo",
				'charset' => $_K ['charset'],
				'p_name' => P_NAME
		);
		$sysinfo = "http://www.Kekezu.com/news.php?" . http_build_query ( $sys );
		
		require Keke_tpl::template ( 'control/admin/tpl/main' );
	}
}

?>