<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );


/**
 * this not free,powered by keke-tech
 * @version 3.0
 * @auther xujie
 * 
 */

include 'base.php';
class Keke_core extends Keke_base {
	protected  static $_core_class = array ();
	protected static $_caching = TRUE;
	protected static $_files_changed = FALSE;
	
	/**
	 * 用于页面跳转提示
	 *@param $content 提示信息 $_lang['submit_success']提交成功,$_lang['submit_fail']提交失败
	 *@param $url 跳转url 
	 * @param $type string
	 *        success 成功  error 错误 info 警告/请示  confirm 确认
	 *@param $title 标题，默认为“系统提示”
	 *@param $time 跳转页显示时间，默认为3秒        
	 */
	static function show_msg( $content = "", $url = "",  $type = 'success',$title = NULL,$time = 3) {
		global $_K, $basic_config, $username, $uid, $nav_list, $_lang;
		$r = $_REQUEST;
		//$msgtype = $type;
		if($title===NULL){
			$title = $_lang['sys_tips'];
		}
		//没有http加上base_url
		if (strpos($url, '://') === FALSE){
			$url = URL::site($url);
		}
		require Keke_tpl::template ( 'show_msg' );
		die ();
	}

	public static function register_autoloader($callback = null) {
		spl_autoload_unregister ( array ('Keke_core','autoload') );
		isset ( $callback ) and spl_autoload_register ( $callback );
		spl_autoload_register ( array (	'Keke_core','autoload') );
	
	}
/* 	public static function keke_require_once($filename, $class_name = null) {
		isset ( $GLOBALS ['class'] [$filename] ) or (($GLOBALS ['class'] [$filename] = 1) and require $filename);
	} */
	
	public static function autoload($class_name) {
		
		    $class_name = strtolower($class_name);
		    
			$path = str_replace ( '_', '/', $class_name);
			if (strpos ( $class_name, '_class' )) {
				$path = str_replace ( '/class', '_class', $path );
			}
			
			if(($class=Keke::find_file('class', $path.EXT,$class_name.EXT))!=null){
				require $class;
				return true;
			}
		 
		return false;
 	}

	/**
	 * 本方法要缓存系统初始化加的类文件
	 *
	 * @example Keke::cache('name'); 获取缓存
	 * @example Keke::cache('name',$data); 写缓存
	 * @param string $name    	缓存名称
	 * @param string $data     	缓存内容
	 * @param int $lifetime    	缓存时间
	 */
	public static function cache($name, $data = NULL, $lifetime = NULL) {
		// 缓存文件
		$file = md5 ( $name ) . '.txt';
		// 缓存目录
		$dir = S_ROOT . 'data/cache' . DIRECTORY_SEPARATOR;
		if ($lifetime === NULL) {
			// 默认60分钟缓存
			$lifetime = 3600;
		}
		if ($data === NULL) {
			if (is_file ( $dir . $file )) {
				if ((time () - filemtime ( $dir . $file )) < $lifetime) {
					return  unserialize ( file_get_contents ( $dir . $file ) );
					
				} else {
					unlink ( $dir . $file );
				}
			}
			return NULL;
		}
		$data = serialize ( $data );
		return ( bool ) file_put_contents ( $dir . $file, $data, LOCK_EX );
	}
	
	/**
	 * $fileds,$where可以为数组 , $pk为@return数组的key , 对Dbfactory -> select()的改进,添加缓存
	 *
	 * @return array($pk => data)
	 */
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		return Dbfactory::get_table_data ( $fileds, $table, $where, $order, $group, $limit, $pk, $cachetime );
	}
	 
	/**
	 * 获取系统当前的模板
	 * @return Ambigous <string, unknown, Ambigous, unknown, number, multitype:multitype: >
	 */
	public static function get_tpl() {
		$res =  DB::select('tpl_title,tpl_pic')->from('witkey_template')
		       ->where('is_selected = 1')->limit(0, 1)
		       ->cached(66666,'keke_template')->execute();
		return $res[0];
	}
	static function execute_time() {
		$stime = explode ( ' ', SYS_START_TIME );
		$etime = explode ( ' ', microtime ( 1 ) );
		$ex_time = ($etime [0] - $stime[0]);
		$memory = sprintf ( ' memory usage: %s', Num::bytes_to_size ( memory_get_usage() ) );
		return array (	$ex_time,$memory);
	}
	
	static function lang($key) {
		return Keke_lang::lang ( $key );
	}
	
	// 获取用户最后操作时间
	static function update_oltime() {
		global $_K;
		$res = null;
		$login_uid = Keke::$_uid;
		$user_oltime = Dbfactory::get_one ( sprintf ( "select last_op_time from %switkey_member_oltime where uid = '%d'", TABLEPRE, $login_uid ) );
		if ((SYS_START_TIME - $user_oltime ['last_op_time']) > $_K ['timespan']) {
			$res = Dbfactory::execute ( sprintf ( "update %switkey_member_oltime set online_total_time = online_total_time+%d,last_op_time = '%d' where uid = '%d'", TABLEPRE, $_K ['timespan'], SYS_START_TIME, $login_uid ) );
		}
		return $res;
	}
	
	/**
	 * 错误监听
	 */
	static function error_handler($code, $error, $file = NULL, $line = NULL) {
		
		if ($code != 8 ) {
			ob_get_level () and ob_clean ();
			Keke_exception::handler ( new ErrorException ( $error, $code, 0, $file, $line ) );
		}
		return TRUE;
	}
	/**
	 * 异常监听
	 */
	static function shutdown_handler() {
		if(!Keke::$_inited){
			return ;
		}
		if (self::$_caching === TRUE AND self::$_files_changed === TRUE){
			Keke::cache('loader_class', self::$_core_class);
		}
		
		if (KEKE_DEBUG and $error = error_get_last () and in_array ( $error ['type'], array (
				E_PARSE,
				E_ERROR,
				E_USER_ERROR 
		) )) {
			ob_get_level () and ob_clean ();
			Keke_exception::handler ( new ErrorException ( $error ['message'], $error ['type'], 0, $error ['file'], $error ['line'] ) );
			exit ( 1 );
		}
	}

}
class Keke extends Keke_core {
	//检查文件头部的案例标记，没有就添加
	const FILE_SECURITY = '<?php defined (\'IN_KEKE\' ) or die ( \'Access Denied\' );';
	public static $_inited = false;
	public static $_safe_mode ;
	public static $_magic_quote;
	public static $_log;
	public static $_index_file = '';
	public static $_sys_config;
	public static $_uid;
	public static $_username;
	public static $_userinfo;
	public static $_template;
	public static $_model_list;
	public static $_nav_list;
	public static $_user_group;
	public static $_tpl_obj;
	public static $_cache_obj;
	public static $_page_obj;
	//任务是否开启
	public static $_task_open=0;
	//商城是否开启
	public static $_shop_open=0; 
	public static $_mark;
 
	public static $_messagecount;
	public static $_indus_p_arr;
	public static $_indus_c_arr;
	public static $_indus_arr;
	public static $_prom_obj;
	public static $_weibo_list;
	public static $_api_open;
	public static $_lang;
	public static $_lang_list;
	public static $_style_path;
	public static $_weibo_attent;
	public static $_attent_api_open;
	public static $_currency;
	public Static $_curr_list;
	//输出头
	public static $_expose= true;
	public static $_content_type= 'text/html'; 
	public static $_db;
 	
	protected static $_files = array ();
	public static $_errors = true;
	
	public static function get_instance() {
		static $obj = null;
		if ($obj === null) {
			$obj = new self();
		}
		return $obj;
	}
	function __construct() {
		$this->init_out_put ();
		$this->init ();
	}
	
	function init() {
 		global  $_K;
		if(self::$_inited==TRUE){
			return;
		}
		self::$_inited = TRUE;
		define ( 'LIB', S_ROOT . 'class' . DIRECTORY_SEPARATOR );
		define ( 'EXT', '.php' );
		include (S_ROOT . 'config/config.inc.php');
		
		define ( 'KEKE_VERSION', '3.0' );
		define ( 'KEKE_RELEASE', '2012-06-2' );
		define ( "P_NAME", 'KPPW' );
		if(Keke::$_caching === true){
			Keke::$_core_class = Keke::cache('loader_class');
		}
		
		self::register_autoloader ();
		
		if (( int ) KEKE_DEBUG == 1) {
			set_exception_handler ( array (	'Keke_exception','handler' ) );
			set_error_handler ( array ('Keke_core','error_handler' ) );
		}
		register_shutdown_function ( array ('Keke_core','shutdown_handler') );
		register_shutdown_function(array('Sys_cron','run'));

		if(ini_get('register_globals')){
			self::globals();
		}
		if(function_exists('mb_internal_encoding')){
			mb_internal_encoding(CHARSET);
		}
		//安全模式
		Keke::$_safe_mode  = (bool)ini_get('safe_mode');
		Keke::$_magic_quote = (bool)get_magic_quotes_gpc();
		
		if((bool)get_magic_quotes_runtime()===TRUE){
			ini_set('magic_quotes_runtime','Off');
		}
		self::check_install();
		//处理全局变量
		$_GET = Keke::k_stripslashes($_GET);
		$_POST = Keke::k_stripslashes($_POST);
		$_COOKIE = Keke::k_stripslashes($_COOKIE);
			 
		Keke::init_session ();
		$this->init_lang ();
		$this->init_curr();
		$this->init_config ();
		
		Keke::$_cache_obj = Cache::instance ();
		 
	
		self::$_log = log::instance()->attach(new keke_log_file());
		$this->init_user();
	}
	/**
	 * 初始化配置信息
	 */
	function init_config() {
		global $_lang, $_K;
		$config_arr = array ();
		if(($config_arr = Cache::instance()->get('keke_config'))==NULL){
			$basic_arr = DB::select('`k`,`v`')->from('witkey_config')->execute();
			$size = sizeof ( $basic_arr );
			for($i = 0; $i < $size; $i ++) {
				$config_arr [$basic_arr [$i] ['k']] = $basic_arr [$i] ['v'];
			}
			Cache::instance()->set('keke_config', $config_arr,60000);
		}
		Keke::$_sys_config = $config_arr ;
		
		Keke::$_template = $config_arr ['template'];
		$map_config = unserialize ( $config_arr ['map_api_open'] );
		$map_api = "baidu";
		$_K ['timestamp'] = $_SERVER['REQUEST_TIME'];
		$_K ['charset'] = CHARSET;
		$_K ['template'] = $config_arr ['template'];
		$_K ['theme'] = $config_arr ['theme'];
		$_K ['sitename'] = $config_arr ['website_name'];
		$_K ['siteurl'] = $config_arr ['website_url'];
		$_K ['inajax'] = 0;
		$_K ['block_search'] = array ();
		$_K ['is_rewrite'] = $config_arr ['is_rewrite'];
		$_K ['map_api'] = $map_api;
		$_K ['google_api'] = $config_arr ['google_api'];
		$_K ['baidu_api'] = $config_arr ['baidu_api'];
		$_K ['timespan'] = '600';
		$_K ['i'] = 0;
		$_K ['refer'] = "index.php";
		$_K ['block_search'] = $_K ['block_replace'] = array ();
		$_lang = array ();
		
		$config_arr ['seo_title'] and $_K ['html_title'] = $config_arr ['seo_title'] or $_K ['html_title'] = $config_arr ['website_name'];
		define ( 'SKIN_PATH', 'tpl/' . $_K ['template'] );
		define ( 'UPLOAD_RULE', date ( 'Y/m/d/' ) );
		define ( 'UPLOAD_ROOT', S_ROOT . '/data/uploads/' . UPLOAD_RULE ); // 附件保存物理路径
		define ( 'UPLOAD_ALLOWEXT', '' . $config_arr ['file_type'] ); // 允许上传的文件后缀，多个后缀用“|”分隔
		define ( 'UPLOAD_MAXSIZE', '' . $config_arr ['max_size'] * 1024 * 1024 ); // 允许上传的附件最大值
		define ( "CREDIT_NAME", $config_arr ['credit_name']);
		define ( 'FORMHASH', Keke::formhash () );
		Keke::$_sys_config = $config_arr;
		Keke::$_style_path = $_K ['siteurl'] . "/" . SKIN_PATH;
		$_K = $_K+Keke::$_sys_config;
		$_K['model_list'] = Keke::$_model_list;
		$_K['nav_arr'] = Keke::$_nav_list;
		$_K['lang_list'] = Keke::$_lang_list;
		$_K['lang']      = Keke::$_lang;
		$_K['api_open']   = Keke::$_api_open;
		$_K['weibo_list'] = Keke::$_weibo_list;
		$_K['attent_api_open'] = Keke::$_attent_api_open;
		$_K['attent_list'] = Keke::$_weibo_attent;
		$_K['style_path'] = Keke::$_style_path;
		$_K['style_path']=SKIN_PATH;
		if(Keke::$_index_file){
			define('PHP_URL',BASE_URL.'/'.Keke::$_index_file);
		}elseif(empty(Keke::$_index_file) OR $config_arr['is_rewrite']){
			define('PHP_URL',BASE_URL);
		}
	
	}
	/**
	 * 初始化用户
	 */
	function init_user() {
		
		if (Keke_user_login::instance()->logged_in()) {
			Keke::$_uid = $_SESSION ['uid'];
			Keke::$_username = $_SESSION ['username'];
			Keke::$_user_group = $_SESSION ['group_id'];
		} elseif ( Cookie::get('remember_me')) {
			//Keke::$_log->add(Log::INFO, Cookie::get('remember_me'))->write();
			Keke_user_login::instance()->auto_login();
		}
	}
	/**
	 * 初始化推广实例，按需加载
	 */
	static function init_prom() {
		Keke::$_prom_obj = Sys_prom::get_instance ();
	}
	/**
	 * 初始化行业,按需加载
	 */
	static function init_industry() {
		
		Keke::$_indus_p_arr =  Keke::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', 3600 );
		Keke::$_indus_c_arr = Keke::get_table_data ( '*', 'witkey_industry', 'indus_type=1 and indus_pid >0', 'listorder', '', '', 'indus_id', 3600 );
		Keke::$_indus_arr = Keke::get_table_data ( '*', 'witkey_industry', '', 'listorder', '', '', 'indus_id', 3600 );
	
	}
	/**
	 * 初始化导航，按需要加载，不在core 里加载
	 */
	static function init_nav(){
		global $_K;
		$nav_list = DB::select('*')->from('witkey_nav')->cached(6000,'keke_nav')->execute();
		$nav_list = Keke::get_arr_by_key($nav_list,'nav_id');
		Keke::$_nav_list = $nav_list; 
		$_K['nav_arr'] = $nav_list;
	}
	/**
	 * 初始化微博认证开关
	 */
	static public  function init_oauth() {
		
		foreach ( Keke::$_basic_arr as $k => $v ) {
			($v ['type'] == 'weibo' || $v ['type'] == 'interface') and Keke::$_weibo_list [$v ['k']] = $v ['v'];
		}
		Keke::$_api_open = unserialize ( Keke::$_sys_config ['oauth_api_open'] );
	
	}
	/**
	 * 初始化,微博关注，按需要加载
	 */
	static public function init_weibo_attent() {
		foreach ( Keke::$_basic_arr as $k => $v ) {
			$v ['type'] == 'attention' and Keke::$_weibo_attent [$v ['k']] = $v ['v'];
		}
		Keke::$_attent_api_open = unserialize ( Keke::$_sys_config ['attent_api_open'] );
	}
	//初始化语言
	function init_lang() {
		Keke::$_lang = Keke_lang::get_lang ();
	}
	//初始化货币
	function init_curr() {
		if ($_SESSION ['currency']) {
			Keke::$_currency = $_SESSION ['currency'];
		} else {
			Keke::$_currency = Keke::$_sys_config ['currency'];
			$_SESSION ['currency'] = Keke::$_sys_config ['currency'];
		}
		Keke::$_curr_list = Keke_lang::get_curr_list ();
	}
	/**
	 * 初始化任务model,按需加载
	 */
	static public function init_model() {
		$model_arr = db::select ( '*' )->from ( 'witkey_model' )->order("listorder asc")->cached (3600,'keke_model')->execute ();
		Keke::$_model_list = Keke::get_arr_by_key ( $model_arr, 'model_id' );
		foreach ( Keke::$_model_list as $v ) {
			if ($v ['model_type'] == 'task') {
				Keke::$_task_open = (Keke::$_task_open or $v ['model_status']);
			} else {
				Keke::$_shop_open = (Keke::$_shop_open or $v ['model_status']);
			}
		}
		//Keke::nav_filter ();
	}
	/**
	 * 导航过滤
	 */
	public static function nav_filter() {
		global $_K;
		Keke::init_nav();
		$nav_arr = Keke::$_nav_list;
		if ((Keke::$_task_open and  Keke::$_shop_open) == FALSE) {
			foreach ( $nav_arr as $k => $v ) {
				if (Keke::$_task_open == FALSE) {
					if (in_array ( $_K ['action'], array ('task', 'task_list', 'weibo' ) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if (Keke::$_shop_open == FALSE) {
					if (in_array ( $_K ['action'], array ('shop', 'shop_list', 'seller_list' ) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if (Keke::$_shop_open == FALSE  and Keke::$_task_open == FALSE) {
					if ($_K ['action'] == 'case') {
						unset ( $nav_arr [$k] );
					}
				}
			}
		}
		Keke::$_nav_list = $nav_arr;
	}
	 
	public static function init_session() {
		$session = Keke_session::instance();
		$_SESSION = & $session->as_array();
		
	}
	/**
	 * 初始划计划任务
	 */
	public static function init_cron(){
		
	}
	function init_out_put() {
		 ob_start();
	}
	/**
	 * 查指定目录中的文件
	 *
	 * @param string $dir        	
	 * @param string $file        	
	 */
	public static function find_file($dir,$file,$class_name) {
		$path = $dir . DIRECTORY_SEPARATOR . $file;
		//有缓存，直接返回
		if (Keke::$_caching===true and isset ( Keke::$_core_class [$path] )) {
			return Keke::$_core_class [$path];
		}
		$class = S_ROOT . $path ;
		
		$helper =S_ROOT.$dir.DIRECTORY_SEPARATOR.'helper'.DIRECTORY_SEPARATOR.$class_name;
		$sys =  S_ROOT.$dir.DIRECTORY_SEPARATOR.'sys'.DIRECTORY_SEPARATOR.$class_name;
		$model = S_ROOT.$dir.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.$class_name;
		
		$control = S_ROOT.$file;
		$models = array ('cache','database','image');
		$found = false;
		if (is_file ( $class )) {
			$found = $class;
		}elseif(is_file($model)){
			$found = $model;
		}elseif(is_file($helper)){
			$found = $helper;
		}elseif(is_file($sys)){
			$found = $sys;
		}elseif(is_file($control)){
			$found = $control;
		} elseif(isset($models)) {
			foreach ( $models as $d ) {
				$class = S_ROOT . $dir . DIRECTORY_SEPARATOR . $d.DIRECTORY_SEPARATOR.$file ;
			 	if (is_file ( $class )) {
					$found = $class;
					break;
				}
			}
		}
		 
		if(Keke::$_caching===true){
			Keke::$_core_class[$path] = $found;
			Keke::$_files_changed = true;
		}
		return $found;
	
	}
	public function deinit() {
		if (self::$_inited) {
			spl_autoload_unregister ( array (
					'Keke_core',
					'autoload' 
			) );
			if (Keke::$_errors) {
				restore_error_handler ();
				restore_exception_handler ();
			}
			self::$_inited = false;
		}
	}
 
	/**
	 * 删除全局变量
	 * @return void();
	 */
	public static function globals(){
		if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])){
			echo "Global variable overload attack detected! Request aborted.\n";
			exit(1);
		}
		// 获取变量名通过全局变量
		$global_variables = array_keys($GLOBALS);
	
		// 删除下列标准的全局变量
		$global_variables = array_diff($global_variables, array(
				'_COOKIE','_ENV','_GET','_FILES','_POST','_REQUEST','_SERVER','_SESSION','GLOBALS',
		));
		foreach ($global_variables as $name){
			// 删除全局变量
			unset($GLOBALS[$name]);
		}
	}

}

Keke::get_instance ();
