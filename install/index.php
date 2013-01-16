<?php
/**
 * ��װkppw2.0
 * @copyright keke-tech
 * @author hr
 * @version v 2.0
 * @date 2012-1-13 ����5:31:35
 * @encoding GBK
 */
	error_reporting(0);
  	define('IN_KEKE', TRUE);
  	session_start();
  	
  	define('INSTALL_ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);//��װĿ¼
  	define('KEKE_ROOT', dirname(INSTALL_ROOT).DIRECTORY_SEPARATOR);//��Ŀ¼
  	 
  	require_once KEKE_ROOT.'class/keke/base.php';
  	require_once KEKE_ROOT.'class/keke/tpl.php';
  	require_once KEKE_ROOT.'class/keke/lang.php';
  	require_once KEKE_ROOT.'class//helper/File.php';
  	require_once KEKE_ROOT.'config/keke_version.php';//�汾��Ϣ
  	require_once KEKE_ROOT.'config/config.inc.php';//������Ϣ
  	require_once INSTALL_ROOT.'install_function.php';//func
  	require_once INSTALL_ROOT.'install_var.php';//��������������
  	require_once INSTALL_ROOT.'install_mysql.php'; //db install class
  	require_once INSTALL_ROOT.'install_lang.php'; //language
  	
  	$lock_sign = KEKE_ROOT.'/data/install.lck';//lock sign
  	
  	$config_path = KEKE_ROOT.'config/config.inc.php';//������Ϣ
  	$sqlfile =  INSTALL_ROOT.'data/empty.sql';//��ʼ��
  	$sqldemofile = INSTALL_ROOT.'data/demo.sql';//����ʾ
//   	$sqlinitfile = INSTALL_ROOT.'data/keke_kppw_init.sql';//�����汾

  	$data_cache_path = KEKE_ROOT.'./data/cache/';
  	$tpl_cache_path = KEKE_ROOT.'./data/tpl_c/';
  	$_REQUEST['lang'] && $_SESSION['lang']=addslashes($_REQUEST['lang']);
  	$lan = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'cn';
  	header ( "Content-Type:text/html; charset=".CHARSET );
  	//�Ѱ�װ
  	file_exists($lock_sign) and exit(L('has_been_installed'));
  	
  	//sql�ļ�������
  	file_exists($sqlfile) or exit(L('main_sql_file_does_not_exist'));
  	
  	$step = $_REQUEST['step'] ? $_REQUEST['step'] : 'start';
  	switch ($step){
  		case 'start':
  			$license_path = INSTALL_ROOT.'data/license_'.$lan.'.txt';
  			$license = file_get_contents($license_path);
  			$license = nl2br(str_replace(' ', '&nbsp;', $license));
  			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step .'.tpl.php';
  			break;
  		case 'checkset'://�������ļ�Ȩ�ޣ������ȼ��
  			$error_num = 0;//������Ҫ��ĸ���
  			//�汾
  			$check_version = phpversion();//�汾
  			if($check_version < $env_items['php']['r']){
  				$error_num +=1;
  			}
  			//GD
  			$check_gd = function_exists('gd_info') ? gd_info() : array();//GD
  			$check_gd = $check_gd['GD Version'] ? $check_gd['GD Version'] : 0;
  			if ($check_gd < $env_items['gdversion']['r']){
  				$error_num +=1;
  			}
  			//Ŀ¼���ļ�ִ��Ȩ��
  			$check_dir = array();
  			foreach ($dirfile_items as $key => $value){
  				$dir_path = $value['path'];
  				$dir_perm = '';//�ļ�Ȩ��, 1��ʾ������0��ʾĿ¼����д��-1��ʾ������
  				if ($value['type']=='dir'){
  					if(!dir_writeable(KEKE_ROOT.$dir_path)) {
  						$dir_perm = is_dir(KEKE_ROOT.$dir_path) ? 0 : -1 ;//���is_dir==true��Ϊ����д,������ǲ����ڿ�
  						$error_num +=1;
  					} else {
  						$dir_perm = 1;
  					}
  				} else {
  					if(file_exists(KEKE_ROOT.$dir_path)) {
  						if(is_writable(KEKE_ROOT.$dir_path)) {
  							$dir_perm = 1;
  						} else {
  							$dir_perm = 0;
  							$error_num +=1;
  						}
  					} else {
  						if(dir_writeable(dirname(KEKE_ROOT.$dir_path))) {
  							$dir_perm = 1;
  						} else {
  							$dir_perm = -1;
  							$error_num +=1;
  						}
  					}
  				}
  				$check_dir[$dir_path]= $dir_perm;
  			}
  			//��������
  			$check_func = array();
  			foreach ($func_items as $value){
  				if (function_exists($value)){
  					$func_result = 1;
  				}else{
  					$func_result = 0;
  					$error_num +=1;
  				}
  				$check_func[$value] = $func_result;
  			}
  			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step .'.tpl.php';
  			break;
  		//���ݿ����Ϣ
  		case 'sql':
  			$defalut_config_path = INSTALL_ROOT.'data' . DIRECTORY_SEPARATOR . 'config.inc.php';
  			if (file_exists($defalut_config_path)){//Ĭ������
  				include $defalut_config_path;
  				$dbhost = $keke_config['db']['dbhost'];
  				$dbname = $keke_config['db']['dbname'];
  				$dbuser = $keke_config['db']['dbuser'];
  				$dbpw = $keke_config['db']['dbpass'];
  				$tablepre = $keke_config['db']['tablepre'];
  			}
  			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step .'.tpl.php';
  			break;
  		case 'sql_execute':
			$c_path =substr($_SERVER[REQUEST_URI],0,-34);
  			if (!$_POST){
  				include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
  				break;
  			}
  			extract($_POST);
  			//check database info
  			empty($dbhost) && $error_arr['dbhost'] = L('dbhost_cannot_be_null');
  			empty($dbname) && $error_arr['dbname'] = L('dbname_cannot_be_null');
  			empty($dbuser) && $error_arr['dbuser'] = L('dbaccount_cannot_be_null');
  			empty($dbpw) && $error_arr['dbpw'] = L('dbpwd_cannot_be_null');
  			//check admin account
  			empty($admin_account) && $error_arr['admin_account']=L('admin_account_cannot_be_null');
  			empty($admin_password) && $error_arr['admin_password']=L('admin_pwd_cannot_be_null');
  			(empty($admin_password2) || $admin_password2!=$admin_password) && $error_arr['admin_password2']= L('password_different_wrong');
  			empty($data_type) && $error_arr['data_type'] = L('select_init_type');
  			preg($dbname)==false && $error_arr['dbname'] = L('error_formate');
  			(strpos($tablepre, '.') !== false || preg($tablepre)==false) && $error_arr['tablepre'] = L('table_pre_error');
  			if ($error_arr){
  				include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
  				break;
  			}
  			if (!$link= mysql_connect($dbhost, $dbuser, $dbpw)){

  					$error_arr['dbpw']= L('connect_error_login_failed');
  					$error_arr['dbname']= L('connect_error_login_failed');
  					$error_arr['dbuser']= L('connect_error_login_failed');

  				include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
  				break;
  			}
  			$_SESSION['link'] = mysql_get_server_info();
  			//������ݿ��Ƿ����,����ʾ�Ƿ񸲸ǰ�װ
  			if (mysql_select_db($dbname, $link) && !$cover_data[0]=='cover'){
  				$error_arr['cover_data'] = L('cover_db_tips');//��ʾ�Ƿ��ظ���װ
  				include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
  				break;
  			}
  			if(mysql_get_server_info() > '4.1') {
  				mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET ".DBCHARSET, $link);
  			} else {
  				mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname`", $link);
  			}
  			if(mysql_errno()) {
  				$error_arr['dbname']='database_errno_1044'.mysql_error();
  				include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
  				break;
  			}
  			mysql_close($link);
  			$db = new db_tool();
  			$db->connect($dbhost, $dbuser, $dbpw, $dbname, DBCHARSET);
  			$temp_arr = array("dbhost"=>$dbhost, "dbname"=>$dbname, "dbuser"=>$dbuser,"dbpass"=>$dbpw,"tablepre"=>$tablepre,'cookie_path'=>$c_path);
  			$temp_arr['base_url'] = rtrim($c_path,'/');
  			$config_content = Keke_tpl::sreadfile($config_path);
  			foreach ($temp_arr as $key=>$value){
  				$key = strtoupper($key);
  					$config_content = preg_replace ( "/define\s?+\(\s?+'($key)'\s?+,\s?+.*'\s?+\);/i", "define ( '$key', '$value');", $config_content );
			}
  			Keke_tpl::swritefile($config_path,$config_content);//д�����ļ�

  			if ($data_type=='b'){//����ʾ�汾
  				$sqlfile = $sqldemofile;
  			}
  			$sql = file_get_contents($sqlfile);
  			$sql = str_replace("\r\n", "\n", $sql);
  			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step. '.tpl.php';
  			runquery($sql, $tablepre, $db);//ob
  			$password = md5($admin_password);
  			
			$slt = randomkeys( 6 );//�����
			$sec_code = get_password($password,$slt);
  			if ($data_type=='b'){//��ʾ�汾,��������
  				$db->query("update `{$tablepre}witkey_member` set username = '$admin_account',password = '$password',salt='$slt',sec_code='$sec_code' where uid = 1");
  				$db->query("update `{$tablepre}witkey_space` set username = '$admin_account',email = '$admin_email',group_id = 1,status = 1 where uid = 1");
  			}else {//�����汾����������
  				$db->query("replace INTO `{$tablepre}witkey_member`(`uid`,`username`,`password`,`salt`,`sec_code`) VALUES ('1', '$admin_account','$password','$slt','$sec_code')");
  				$db->query("replace INTO `{$tablepre}witkey_space` (`uid`,`username`,`email`,`group_id`,`status`,`reg_time`) VALUES('1','$admin_account','$admin_email','1','1','".time()."')");
  			}
  			$db->query("update `{$tablepre}witkey_config` set v = '$weburl' where k='website_url'");
  			
  			$file_obj = new File();
  			$file_obj->delete_files($data_cache_path);
  			$file_obj->delete_files($tpl_cache_path);
  			
  			$pars = array ('ac' =>'install','sitename' => '', 'siteurl' =>$weburl, 'charset' => CHARSET, 'version' =>KEKE_VERSION, 'release' =>KEKE_RELEASE, 'os' => PHP_OS, 'php' =>$_SERVER['SERVER_SOFTWARE'], 'mysql' =>mysql_get_server_info() , 'browser' => urlencode ( $_SERVER ['HTTP_USER_AGENT'] ), 'username' => urlencode ($_SESSION['username']), 'email' =>$admin_email,'ip'=>$_SERVER ['SERVER_ADDR']);
  			$data = http_build_query ( $pars );
//   			sleep(3);
  			echo "<script>window.location.replace('index.php?step=finish&$data');</script>";
  		
  			break;
  		//finally
  		case 'finish':
  			$str = md5(random(100).'_'.time()).'_keke_install.lck';
  			@touch($lock_sign);//�趨lock sign�ļ��ķ��ʺ��޸�ʱ��
  			file_put_contents($lock_sign,$str);
  			$version = $_SESSION['link'];
  			unset($_SESSION['link'],$_SESSION['lang']);
  			if(file_exists(KEKE_ROOT."./config/lic.php")){
  				require KEKE_ROOT."./config/lic.php";
  				$lic = $_K['ci'];
  			}
  			$data = http_build_query($_GET);
  			$verify = md5 ( $data . $lic);
  			$url= "http://www.kekezu.com/update.php?".$data."&lic=".$lic."&verify=".$verify."&p_name=".P_NAME;
  			
  			register_shutdown_function(array('base','curl_request'),$url);
  			/* if(function_exists('curl_init')){
  				base::curl_request($url);
  			}else{
  				base::socket_request($url);
  			} */
  			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR .$step. '.tpl.php';
  			break;
	}
	/**
	 * ��������ַ���
	 *
	 * @param Int $length        	
	 * @return String Time Elapsed
	 * @author shangjinglong
	 * @copyright keke-tech
	 */
	function randomkeys($length) {
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ'; // �ַ���
		for($i = 0; $i < $length; $i ++) {
			$key .= $pattern {mt_rand ( 0, 35 )}; // ����php�����
		}
		return $key;
	
	}
  	/**
	 * ��������
	 * @param ԭʼ���� $pwd
	 * @param ����� $slt
	 * @return  password
	 */
	function get_password($pwd, $slt) {
		if ($pwd && $slt) {
			$passwordmd5 = preg_match('/^\w{32}$/', $pwd) ? $pwd : md5($pwd);
			return md5 ( $passwordmd5 . $slt );
		} else {
			return false;
		}
	}
  	function preg($string){
  		if(preg_match("/\W+/i", $string)){
  			return false;
  		}
  		return true;
  	}
  	function L($lang_key) {
  		global $lan;//session�е������趨
  		global $lang;//install_lang.php�еĶ�Ӧ��array
  		$lang_c = $lang[$lan][$lang_key];
  		return $lang_c ? $lang_c : 'unknow';
  	}
 