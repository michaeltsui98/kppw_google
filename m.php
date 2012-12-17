<?php
define ( "IN_KEKE", TRUE );
spl_autoload_register ( 'module' ); 
define ( "ISWAP", True ); //wap_base_class::is_wrap()
include 'app_comm.php'; 

$wrap_msg = array (//wrap的全局msg提示数组，通讯失败情况下启用
'a' => 'forbidden', //通知客户端的后续动作
//forbidden禁止。终止后续操作。Android端失败后默认为禁止状态。所有当禁止操作时。a参数可以缺省
//relogin断线重连。
'r' => 'Access Denied' );//操作失败原因
//Access Denied 没有访问权限
//Connection timed out 连接超时 
ISWAP or kekezu::echojson ( $wrap_msg, 0 );
 
$dos = array ('config','check_version','get_indus','user', 'index', 'login', 'register', 'logout', 'upload', 'test', 'task', 'msg', 'release','search');
 
(! empty ( $do ) && in_array ( $do, $dos )) and $do=$do or $do = 'index'; 
$uid = intval($kekezu->_uid);
$username = $kekezu->_username;
$user_info = $kekezu->_userinfo;
 
function module($class_name) {
	try {
		$file = S_ROOT . '/lib/wap/' . $class_name . '.php';
		if (is_file ( $file )) {
			kekezu::keke_require_once ( $file, $class_name );
			return class_exists ( $file, false ) || interface_exists ( $file, false );
		}
	} catch ( Exception $e ) {
		keke_exception::handler ( $e );
	}
	return true;
} 
include S_ROOT . 'mobile/' . $do . '.php';


