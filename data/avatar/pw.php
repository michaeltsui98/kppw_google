<?php  define('IN_KEKE', 1);
/**
 * phpwind 头象接收
 */
include '../../app_boot.php';
include S_ROOT.'config/config_pw.php';
$request = Request::factory()->initial();

if($_GET){
	$uri = "action=uploadicon&step=2&&url=images/facebg.jpg&imgsize=20480&filename=$_GET[filename]&";
	$data = $_SERVER['HTTP_RAW_POST_DATA'] ? $_SERVER['HTTP_RAW_POST_DATA'] : file_get_contents('php://input');
	$url = UC_API.'/job.php?'.$uri;
	if (!$data){
		return false;
	}
	$options = array(
			strtolower('http') => array(
					'method'     => 'get',
					'header'     => (string)$request->headers(),
					'content'    => $data
			)
	);

	// Create the context stream
	$context = stream_context_create($options);

	stream_context_set_option($context, $options);

 	$stream = fopen($url, 'r', FALSE, $context);

	fclose($stream);
	$request->redirect('user/account_basic/avatar');

} 