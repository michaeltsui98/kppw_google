<?php define ( "IN_KEKE", TRUE );

class Control_beath extends Controller{
	
	function action_index(){
		set_time_limit(0);
		//10万写库
		for($i=0 ;$i<100000;$i++){
		
			//DB::insert('witkey_test')->set(array('name','content','on_time'))
			//->value(array("name$i","content$i",time()))->execute();
			$sql = "insert into %switkey_test (name,content,on_time) 
			values ('name%d','content%d',%d)";
			$sql=sprintf($sql,TABLEPRE,$i,$i,time());
			Database::instance()->execute($sql,1);
		}
		
		//10万数据的查询
		
		$js_time =  Keke::execute_time();
		var_dump($js_time);
	}
	
	function action_read(){
		//10万条记录的查询速度
		//$res = DB::select('count(*)')->from('witkey_test')->where('id>3000 and id<7000')->get_count()->execute();
		
		$sql = "select count(*) from %switkey_test where id>3000 and id<7000 ";
		$sql = sprintf($sql,TABLEPRE);
		
		$res = Database::instance()->get_count($sql);
		
		$js_time =  Keke::execute_time();
		var_dump($js_time,$res);
		
	}
	
}
