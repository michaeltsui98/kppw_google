<?php
//$star = microtime(true);
define ( 'IN_KEKE', TRUE );
include 'app_boot.php';

$values = array("tag_code"=>"{loop \$datalist \$k \$v}
<li><img src=\"{BASE_URL}/\$v['ad_file']\">\$v['ad_name']</li>
{/loop}");
$value = array("{loop \$datalist \$k \$v}
<li><img src=\"{BASE_URL}/\$v['ad_file']\">\$v['ad_name']</li>
{/loop}");
$where = "target_id = 26";
//DB::update('witkey_ad_target')->set(array('tag_code'))->value($value)->where($where)->execute();

Model::factory('witkey_ad_target')->setData($values)->setWhere($where)->update();

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


 