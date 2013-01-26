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
	 * ����ҳ����ת��ʾ
	 *@param $content ��ʾ��Ϣ $_lang['submit_success']�ύ�ɹ�,$_lang['submit_fail']�ύʧ��
	 *@param $url ��תurl 
	 * @param $type string
	 *        success �ɹ�  error ���� info ����/��ʾ  confirm ȷ��
	 *@param $title ���⣬Ĭ��Ϊ��ϵͳ��ʾ��
	 *@param $time ��תҳ��ʾʱ�䣬Ĭ��Ϊ3��        
	 */
	static function show_msg( $content = "", $url = "",  $type = 'success',$title = NULL,$time = 3) {
		global $_lang;
		$r = $_REQUEST;
		//$msgtype = $type;
		if($title===NULL){
			$title = $_lang['sys_tips'];
		}
		//û��http����base_url
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
	 * ������Ҫ����ϵͳ��ʼ���ӵ����ļ�
	 *
	 * @example Keke::cache('name'); ��ȡ����
	 * @example Keke::cache('name',$data); д����
	 * @param string $name    	��������
	 * @param string $data     	��������
	 * @param int $lifetime    	����ʱ��
	 */
	public static function cache($name, $data = NULL, $lifetime = NULL) {
		// �����ļ�
		$file = md5 ( $name ) . '.txt';
		// ����Ŀ¼
		$dir = S_ROOT . 'data/cache' . DIRECTORY_SEPARATOR;
		if ($lifetime === NULL) {
			// Ĭ��60���ӻ���
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
	 * $fileds,$where����Ϊ���� , $pkΪ@return�����key , ��Dbfactory -> select()�ĸĽ�,��ӻ���
	 *
	 * @return array($pk => data)
	 */
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		return Dbfactory::get_table_data ( $fileds, $table, $where, $order, $group, $limit, $pk, $cachetime );
	}
	 
	/**
	 * ��ȡϵͳ��ǰ��ģ��
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
		$memory = sprintf ( '%s', Num::bytes_to_size ( memory_get_usage() ) );
		
		return array (	$ex_time,$memory,Database::instance()->get_query_num());
	}
	
	static function lang($key) {
		return Keke_lang::lang ( $key );
	}
	
	// ��ȡ�û�������ʱ��
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
	 * �������
	 */
	static function error_handler($code, $error, $file = NULL, $line = NULL) {
		
		if ($code != 8 ) {
			ob_get_level () and ob_clean ();
			Keke_exception::handler ( new ErrorException ( $error, $code, 0, $file, $line ) );
		}
		return TRUE;
	}
	/**
	 * �쳣����
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
	//����ļ�ͷ���İ�����ǣ�û�о����
	const FILE_SECURITY = '<?php defined (\'IN_KEKE\' ) or die ( \'Access Denied\' );';
	public static $_inited = false;
	public static $_safe_mode ;
	public static $_magic_quote;
	public static $_log;
	public static $_index_file ;
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
	//�����Ƿ���
	public static $_task_open=0;
	//�̳��Ƿ���
	public static $_shop_open=0; 
	 
 
	public static $_indus_p_arr;
	public static $_indus_c_arr;
	public static $_indus_arr;
	
	public static $_weibo_list;
	public static $_api_open;
	public static $_lang;
	public static $_lang_list;
	public static $_style_path;
	public static $_weibo_attent;
	public static $_attent_api_open;
	public static $_currency;
	public Static $_curr_list;
	//���ͷ
	public static $_expose= TRUE;
	public static $_content_type= 'text/html'; 
	//public static $_db;
 	
	protected static $_files = array ();

	/**
	 * ϵͳ��ʼ�� �����б�
	 *
	 * Type      | Setting    | Description                                    
	 * ----------|------------|-----------------------------
	 * `string`  | index_file | This is usually `index.php`. 
	 * `boolean` | caching    | `FALSE`
	 *
	 * @param array $set
	 */
	public static  function init(array $set=NULL) {
 		global  $_K;
 	
		if(self::$_inited==TRUE){
			return;
		}
		Keke_base::check_install();
		self::$_inited = TRUE;
		if(isset($set['index_file'])){
			Keke::$_index_file = rtrim($set['index_file'],'/');
		}
		self::init_out_put();
		define ( 'LIB', S_ROOT . 'class' . DIRECTORY_SEPARATOR );
		define ( 'EXT', '.php' );
		require (S_ROOT . 'config/config.inc.php');
		
		define ( 'KEKE_VERSION', '3.0' );
		define ( 'KEKE_RELEASE', '2012-06-2' );
		define ( "P_NAME", 'KPPW' );
		
		if (isset($set['caching'])){
			Keke::$_caching = (bool) $set['caching'];
		}
		
		if(Keke::$_caching === TRUE){
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
		//��ȫģʽ
		Keke::$_safe_mode  = (bool)ini_get('safe_mode');
		Keke::$_magic_quote = (bool)get_magic_quotes_gpc();
		
		if((bool)get_magic_quotes_runtime()===TRUE){
			ini_set('magic_quotes_runtime','Off');
		}
		self::check_install();
		//����ȫ�ֱ���
		$_GET = Keke::k_stripslashes($_GET);
		$_POST = Keke::k_stripslashes($_POST);
		$_COOKIE = Keke::k_stripslashes($_COOKIE);
			 
		self::init_lang ();
		Keke::init_session ();
		self::init_config ();
		
		
		self::init_curr();
		Keke::$_cache_obj = Cache::instance ();
		 
	
		self::$_log = log::instance()->attach(new keke_log_file());
		self::init_user();
		
	}
	/**
	 * ��ʼ��������Ϣ
	 */
	public static function init_config() {
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
		$_K['session_id'] = session_id();
		$_lang = array ();
		
		$config_arr ['seo_title'] and $_K ['html_title'] = $config_arr ['seo_title'] or $_K ['html_title'] = $config_arr ['website_name'];
		define ( 'SKIN_PATH', 'tpl/' . $_K ['template'] );
		define ( 'UPLOAD_RULE', date ( 'Y/m/d/' ) );
		define ( 'UPLOAD_ROOT', S_ROOT . '/data/uploads/' . UPLOAD_RULE ); // ������������·��
		define ( 'UPLOAD_ALLOWEXT', '' . $config_arr ['file_type'] ); // �����ϴ����ļ���׺�������׺�á�|���ָ�
		define ( 'UPLOAD_MAXSIZE', '' . $config_arr ['max_size'] * 1024 * 1024 ); // �����ϴ��ĸ������ֵ
		define ( "CREDIT_NAME", $config_arr ['credit_name']);
		define ( 'FORMHASH', Keke::formhash () );
		Keke::$_sys_config = $config_arr;
		//Keke::$_style_path = $_K ['siteurl'] . "/" . SKIN_PATH;
		$_K = $_K+Keke::$_sys_config;
		
		$_K['model_list'] = Keke::$_model_list;
		$_K['nav_arr'] = Keke::$_nav_list;
		 
		$_K['lang']      = Keke::$_lang;
		
		$_K['api_open']   = Keke::$_api_open;
		$_K['weibo_list'] = Keke::$_weibo_list;
		
		$_K['attent_api_open'] = Keke::$_attent_api_open;
		$_K['attent_list'] = Keke::$_weibo_attent;
	 
		$_K['style_path']=SKIN_PATH;
		if(Keke::$_index_file){
			define('PHP_URL',BASE_URL.'/'.Keke::$_index_file);
		}elseif(empty(Keke::$_index_file) OR $config_arr['is_rewrite']){
			define('PHP_URL',BASE_URL);
		}
	
	}
	/**
	 * ��ʼ���û�
	 */
	public static function init_user() {
		
		if (Keke_user_login::instance()->logged_in()) {
			Keke::$_uid = $_SESSION ['uid'];
			Keke::$_username = $_SESSION ['username'];
			Keke::$_user_group = $_SESSION ['group_id'];
		} elseif ( Cookie::get('remember_me')) {
			Keke_user_login::instance()->auto_login();
		}
	}
	/**
	 * ��ʼ���ƹ�ʵ�����������
	 */
	static function init_prom() {
		Keke::$_prom_obj = Sys_prom::get_instance ();
	}
	/**
	 * ��ʼ����ҵ,�������
	 */
	static function init_industry() {
		
		Keke::$_indus_p_arr =  Keke::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', 3600 );
		Keke::$_indus_c_arr = Keke::get_table_data ( '*', 'witkey_industry', 'indus_type=1 and indus_pid >0', 'listorder', '', '', 'indus_id', 3600 );
		Keke::$_indus_arr = Keke::get_table_data ( '*', 'witkey_industry', '', 'listorder', '', '', 'indus_id', 3600 );
	
	}
	/**
	 * ��ʼ������������Ҫ���أ�����core �����
	 */
	static function init_nav(){
		global $_K;
		$nav_list = DB::select('*')->from('witkey_nav')->cached(6000,'keke_nav')->execute();
		$nav_list = Keke::get_arr_by_key($nav_list,'nav_id');
		Keke::$_nav_list = $nav_list; 
		$_K['nav_arr'] = $nav_list;
	}
	/**
	 * ��ʼ��΢����֤����
	 */
	static public  function init_oauth() {
		
		foreach ( Keke::$_basic_arr as $k => $v ) {
			($v ['type'] == 'weibo' || $v ['type'] == 'interface') and Keke::$_weibo_list [$v ['k']] = $v ['v'];
		}
		Keke::$_api_open = unserialize ( Keke::$_sys_config ['oauth_api_open'] );
	
	}
	/**
	 * ��ʼ��,΢����ע������Ҫ����
	 */
	static public function init_weibo_attent() {
		foreach ( Keke::$_basic_arr as $k => $v ) {
			$v ['type'] == 'attention' and Keke::$_weibo_attent [$v ['k']] = $v ['v'];
		}
		Keke::$_attent_api_open = unserialize ( Keke::$_sys_config ['attent_api_open'] );
	}
	//��ʼ������
	public static function init_lang() {
		Keke::$_lang = Keke_lang::get_lang ();
		Keke::$_lang_list = Keke_lang::$lang_list;
	}
	//��ʼ������
	public static function init_curr() {
		if ($_SESSION ['currency']) {
			Keke::$_currency = $_SESSION ['currency'];
		} else {
			Keke::$_currency = Keke::$_sys_config ['currency'];
			$_SESSION ['currency'] = Keke::$_sys_config ['currency'];
		}
		 
		Keke::$_curr_list = Keke_lang::get_curr_list ();
	}
	/**
	 * ��ʼ������model,�������
	 */
	static public function init_model() {
		$model_arr = db::select ()->from ( 'witkey_model' )->order("listorder asc")->cached (3600,'keke_model')->execute ();
		Keke::$_model_list = Keke::get_arr_by_key ( $model_arr, 'model_id' );
		foreach ( Keke::$_model_list as $v ) {
			if ($v ['model_type'] == 'task') {
				Keke::$_task_open = (Keke::$_task_open or $v ['model_status']);
			} else {
				Keke::$_shop_open = (Keke::$_shop_open or $v ['model_status']);
			}
		}
		return Keke::$_model_list;
		//Keke::nav_filter ();
	}
	/**
	 * ��������
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

	public static function init_out_put() {
		 ob_start();
	} 
	/**
	 * ��ָ��Ŀ¼�е��ļ�
	 *
	 * @param string $dir        	
	 * @param string $file        	
	 */
	public static function find_file($dir,$file,$class_name) {
		$path = $dir . DIRECTORY_SEPARATOR . $file;
		//�л��棬ֱ�ӷ���
		if (Keke::$_caching===TRUE and isset ( Keke::$_core_class [$path] )) {
			return Keke::$_core_class [$path];
		}
		$class = S_ROOT . $path ;
		
		$helper =S_ROOT.$dir.DIRECTORY_SEPARATOR.'helper'.DIRECTORY_SEPARATOR.$class_name;
		$sys =  S_ROOT.$dir.DIRECTORY_SEPARATOR.'sys'.DIRECTORY_SEPARATOR.$class_name;
		$model = S_ROOT.$dir.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.$class_name;
		
		$control = S_ROOT.$file;
		$models = array ('cache','database','image','minify');
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
				$class2 = S_ROOT . $dir . DIRECTORY_SEPARATOR . $d.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.$file ;
			 	if (is_file ( $class )) {
					$found = $class;
					break;
				}elseif(is_file($class2)){
					$found = $class2;
					break;
				}
			}
		}
		 
		if(Keke::$_caching===TRUE){
			Keke::$_core_class[$path] = $found;
			Keke::$_files_changed = TRUE;
		}
		return $found;
	
	}
	public function deinit() {
		if (self::$_inited) {
			spl_autoload_unregister ( array (
					'Keke_core',
					'autoload' 
			) );
			if (KEKE_DEBUG) {
				restore_error_handler ();
				restore_exception_handler ();
			}
			self::$_inited = false;
		}
	}
 
	/**
	 * ɾ��ȫ�ֱ���
	 * @return void();
	 */
	public static function globals(){
		if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])){
			echo "Global variable overload attack detected! Request aborted.\n";
			exit(1);
		}
		// ��ȡ������ͨ��ȫ�ֱ���
		$global_variables = array_keys($GLOBALS);
	
		// ɾ�����б�׼��ȫ�ֱ���
		$global_variables = array_diff($global_variables, array(
				'_COOKIE','_ENV','_GET','_FILES','_POST','_REQUEST','_SERVER','_SESSION','GLOBALS',
		));
		foreach ($global_variables as $name){
			// ɾ��ȫ�ֱ���
			unset($GLOBALS[$name]);
		}
	}
	/**
	 * �첽ִ�У�php-fpm�����󣬲�Ӱ���������飬ֱ��register_shutdown_functionִ�����
	 */
	public static function async_request(){
		if (function_exists('fastcgi_finish_request()')) {
			fastcgi_finish_request();
		}
	}
	
	

}