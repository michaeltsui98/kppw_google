<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 用户整合配置
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-7-16下午06:02:31
 * @example //1表示不整合  2 表示整合uc  3 表示整合pw
 */
class Control_admin_user_integrate extends Control_admin{
	/**
	 * 初始化整合的列表页
	 */
	function action_index(){
		global $_K,$_lang;
		
		require  Keke_tpl::template ( 'control/admin/tpl/user/integrate');
	}
	/**
	 * ucenter整合
	 */
	function action_uc(){
		global $_K,$_lang;
		//引用配置文件
		require  S_ROOT.'config/config_ucenter.php';
		//读取配置文件的内容
		$config_ucenter = keke_file_class::read_file(S_ROOT."config/config_ucenter.php");
		if(!$_POST){
			require  Keke_tpl::template ( 'control/admin/tpl/user/integrate_uc');
			die;
		}
		
		Keke::formcheck($_POST['formhash']);
		//读取
		$settingnew  = $_POST['settingnew'];
		//var_dump($settingnew);die;
		//用户正规更换配置的参数
		foreach ($settingnew as $k=>$v){
			$config_ucenter = preg_replace("/define\('$k',\s*'.*?'\);".PHP_EOL."/i", "define('$k', '$v');".PHP_EOL, $config_ucenter);
		}
		//写内容
		keke_file_class::write_file(S_ROOT."config/config_ucenter.php",$config_ucenter);
		//uc_server 的地址
		$bbserver = 'http://'.preg_replace("/\:\d+/", '', $_SERVER['HTTP_HOST']).($_SERVER['SERVER_PORT'] && $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '');
		//ucenter的地址
		$default_ucapi = $bbserver.'/ucenter';
		//应用类型
		$app_type = 'OTHER';
		//应用名称
		$app_name = $_K['website_name']?$_K['website_name']:P_NAME;
		//当前应用的地址
		$app_url = $_K['website_url']?$_K['website_url']:'http://localhost';
		//定uc 的api,如果系统有定义就用已定义的，否则就用默认的
		$ucapi = $settingnew['UC_API'] ? $settingnew['UC_API'] : (defined('UC_API') && UC_API ? UC_API : $default_ucapi);
		//ucenter的Ip默认可以为空
		$ucip = isset($settingnew['UC_IP']) ? $settingnew['UC_IP'] : '';
		//uc的密码
		$ucfounderpw = $_POST['uc_creater'];
		//没有定义就定义ucapi
		UC_API?UC_API:define(UC_API, $settingnew['UC_API']);
		//加载uc的client
		include S_ROOT.'client/ucenter/client.php';
		//用fopen获取ucenter的info
		$ucinfo = uc_fopen($ucapi.'/index.php?m=app&a=ucinfo&release='.UC_CLIENT_RELEASE, 500, '', '', 1, $ucip);
		//分解uc_info给对应的变量
		list($status, $ucversion, $ucrelease, $uccharset, $ucdbcharset, $apptypes) = explode('|', $ucinfo);
	    //如果非ok就是通讯失败
		if($status != 'UC_STATUS_OK') {
			//uc通讯失败
			Keke::show_msg($_lang['uc_communication_fail'],'admin/user_integrate/uc','warning');
		} else {
	        //通讯成功
	        //数据库编码
			$dbcharset = strtolower(DBCHARSET);
			$ucdbcharset = strtolower($settingnew['UC_DBCHARSET'] ? str_replace('-', '', $settingnew['UC_DBCHARSET']) : $settingnew['UC_DBCHARSET']);
			//uc客户端版本与服务端版本比较不一致，错误提示
			if(UC_CLIENT_VERSION > $ucversion) {
				Keke::show_msg($_lang['uc_different_version'],'admin/user_integrate/uc','warning');
			//比较ucenter的数据库编码与本地的数据库编码
			} elseif($ucdbcharset != $dbcharset) {
				Keke::show_msg($_lang['uc_different_coding'],'admin/user_integrate/uc','warning');
			}
		    //构造app添加的请求参数
			$p_arr = array('m'=>'app','a'=>'add',
					'ucfounderpw'=>$ucfounderpw,
					'apptype'=>$app_type,
					'appname'=>$app_name,
					'appurl'=>$app_url,
					'appip'=>$ucip,
					'appcharset'=>CHARSET,
					'appdbcharset'=>$dbcharset,
					'release'=>UC_CLIENT_RELEASE);
			$postdata = http_build_query($p_arr);
			//请求添加
			$ucconfig = uc_fopen($ucapi.'/index.php', 500, $postdata, '', 1, $ucip);
			
			//var_dump($postdata,$ucconfig);die;
			
	        //返回的值为空，则添加失败
			if(empty($ucconfig)) {
				Keke::show_msg($_lang['uc_app_fail_to_add'],'admin/user_integrate/uc','error');
			} elseif($ucconfig == '-1') {
				//负1为管理密码错误
				Keke::show_msg($_lang['uc_error_author_password'],'admin/user_integrate/uc','error');
			} else {
				list($appauthkey, $appid) = explode('|', $ucconfig);
				if(empty($appauthkey) || empty($appid)) {
					//添加无效
					Keke::show_msg($_lang['uc_app_invalid_to_add'],'admin/user_integrate/uc','error');
				}
			}
		}
	    //添加成功后，要写uckey,与uc_appid
		$ucconfig_info = explode('|', $ucconfig);
		$config_ucenter = keke_file_class::read_file(S_ROOT."config/config_ucenter.php");
		$config_ucenter = preg_replace("/define\('UC_KEY',\s*'.*?'\);/s", "define('UC_KEY', '".$ucconfig_info[0]."');", $config_ucenter);
		$config_ucenter = preg_replace("/define\('UC_APPID',\s*'*.*?'*\);/s", "define('UC_APPID', ".$ucconfig_info[1].");", $config_ucenter);
		//写uc的配置文件
		keke_file_class::write_file(S_ROOT."config/config_ucenter.php",$config_ucenter);
	    //更新数据库
	    DB::update('witkey_config')->set(array('v'))->value(array('2'))
	    ->where("k='user_intergration'")->execute();
		//更新缓存
		Cache::instance()->del('keke_config');
		//系统日志
		Keke::admin_system_log($_lang['uc_integrate_log']);
		Keke::show_msg($_lang['uc_integrate_success'],"admin/user_integrate/uc",'success');
		
	}
	/**
	 * Phpwind整合
	 */
	function action_pw(){
		global $_K,$_lang;
		require S_ROOT.'config/config_pw.php';
		if(!$_POST){
			require  Keke_tpl::template ( 'control/admin/tpl/user/integrate_pw' );
			die();
		}
		Keke::formcheck($_POST['formhash']);
		$config_ucenter = keke_file_class::read_file(S_ROOT."config/config_pw.php");
		$settingnew = $_POST['settingnew'];
		foreach ($settingnew as $k=>$v){
			$config_ucenter = preg_replace("/define\('$k',\s*'.*?'\);".PHP_EOL."/i", "define('$k', '$v');".PHP_EOL, $config_ucenter);
		}
		keke_file_class::write_file(S_ROOT."./config/config_pw.php",$config_ucenter);
	    
		DB::update('witkey_config')->set(array('v'))->value(array('3'))->where("k='user_intergration'")->execute();
	
		Keke::admin_system_log($_lang['pw_integrate_log']);
		//更新缓存
		Cache::instance()->del('keke_config');
		Keke::show_msg($_lang['phpwind_integrate_success'],"admin/user_integrate/pw",'success');
		
	 		
		 
	}
	function action_del(){
		global $_lang;
		//更新数据库
		DB::update('witkey_config')->set(array('v'))
		->value(array(1))
		->where("k='user_intergration'")
		->execute();
		//更新系统缓存
		Cache::instance()->del('keke_config');
		Keke::show_msg($_lang['success_uninstall'],"admin/user_integrate",'success');
	}
	
}

