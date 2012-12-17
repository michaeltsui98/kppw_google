<?php defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * flash 头象上接收
 * @author Administrator
 *
 */
class Control_avatar extends Controller{
	function action_index(){
		$a = $_GET['a'];
		if($a){
			$method = $a;
			$uid = $_GET['input'];
			$class = new keke_useravatar_class();
			echo $data=$class->$method($uid);
		}else{
			exit('上传参数错误!');
		}
	}
}

/* if ($a) {
	$method = $a;
	$uid = $input;
	$class = new keke_user_avatar_class();
	echo $data=$class->$method($uid);	
	exit ();
}else{
    exit('parame is error');
} */
