<?php define ( "IN_KEKE", TRUE );

error_reporting(E_ALL);

/* abstract class a {
	abstract public function aa($i,$k=1);
}
class b extends a{
	function aa($i,$b){
		echo 'bb';
	}
} */
//$a = new a;
//$a->aa('ccc');
$a = 'a01234564a';
var_dump((int)$a);
 

//require Keke_tpl::template('test');

//var_dump(Cache::instance()->del('keke_config')); 
//var_dump(class_exists('Control_admin_main'));
// $sql = "select * from keke_witkey_space where uid =1 ";
//$res = DB::query($sql)->cached(5000)->execute();
// $res = DB::select('*')->from('witkey_space')->where(' uid = 1 ')->cached(3600)->execute();

/* $res = DB::select(' price,title,service_id,pic ')->from('witkey_service')
->where(" shop_id = '.{$_GET['shop_id']}.' and service_status=2")
->order(' on_time desc ')->limit(0,4)->execute(); */
// DB::select('*')->from($table)->where($where)->order($order)->limit($offset, $length)->execute();
// var_dump($res);