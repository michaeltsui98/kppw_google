<?php
//$star = microtime(true);
define ( 'IN_KEKE', TRUE );
include 'app_boot.php';

$e = -1;
$err = array(
		'-1'=>'用户名或密码错误',
		'-2'=>'余额不足',
		'-3'=>'号码太长，不能超过1000条一次提交',
		'-4'=>'无合法号码',
		'-5'=>'内容包含不合法文字',
		'-6'=>'内容太长',
		'-7'=>'内容为空',
		'-8'=>'定时时间格式不对',
		'-9'=>'修改密码失败',
		'-10'=>'用户当前不能发送短信',
		'-11'=>'Action参数不正确',
		'-100'=>'系统错误'
); 
 
$message = array(':e'=>$e,':err'=>$err[$e]);
Keke::$_log->add(Log::WARNING,"错误码::e,详细::err", $message)->write();

die;
 
if($_POST){
	 
/* 	if(  Keke::formcheck($formhash) ){
	  
	// 	表单验证的用法
		//$c = Keke_valid::email($code);
	    $p = Keke_validation::factory($_POST)->rule('code', 'Keke_valid::email',array(':value',$code))
	    //验证规则‘字段’,验证表达式,字段的值
	    ->rule('ip', 'Keke_valid::ip',array(':value',$ip))
	    ->rule('url', 'Keke_valid::url',array(':value',$url))
	    ->rule('phone', 'Keke_valid::phone',array(':value',$phone));
	    if($p->check()){
	    	Keke::show_msg('title','db_test.php','success','right');
	    }
	    	
	    $e = $p->errors();
	    
	   var_dump($e);
	   die();
		
		
	}  */ 
}	 
	//  die();
	 //Keke_captcha::valid($code);
 
/* }else{
	//验证码的用法
	$img =  Keke_captcha::instance()->render();
} */
 
/*  $b = array('ad_type','ad_name');
 $a  = array('9','update_name');
 $c = array_combine($b, $a);
 var_dump($c);
die(); 
 */
///$res = Model::factory('witkey_ad')->setData(array('ad_name'=>'sdsdsd','ad_content'=>'content'))->create();

//var_dump($res);
//对象对删除测试
// $res = DB::delete()->table('witkey_ad')->where('ad_id = :id')->param(":id", "261")->execute();
//对象化更新
/* $res = DB::update()->table('witkey_ad')
		->set(array('ad_type','ad_name'))
	  	->value(array('19','name'))
		->where('ad_id = 264')->execute(); */


//对象化插入
//$res = DB::insert()->into('witkey_ad')->set(array('ad_name','ad_content'))->value(array('10','ad_insert'))->execute();


//$res = DB::delete('witkey_ad')->where('ad_id=266')->execute();






/* $aas=new keke_witkey_ad();
$aas->setAd_content($value)->setAd_file($value)->setAd_name($value)->create(); */

// Cache::instance()->generate_id($id)->set(null, $val);

//DB::query($sql)->param($param, $value)->cached()->execute();

// DB::select()->from($table)->where($where)->execute();

/* Keke::$_log->add(Log::STRACE, 'debug_test')->write(); */


//var_dump($res);



/* $end = microtime(true);
echo $end-$star; */
//var_dump ( $end-$star,Keke::execute_time() );
//require Keke_tpl::template('en');

// $end = microtime(true);
 //var_dump ( $end-$star,Keke::execute_time() );

require Keke_tpl::template('en');
var_dump ( $end-$star,Keke::execute_time() );


 