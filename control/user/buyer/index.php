<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心首页
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_user_buyer_index extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'index';
	
	protected  static $_model_list = array();
	
	function before(){
		self::init_nav();
	}
	
	
	function action_index(){
		
		$this->action_task();
	}
	/**
	 * 转到指定任务的控制器中
	 */
	function action_task(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'sreward';
		}
        $class = "Control_task_{$_GET['t']}_user";		
		$obj =  new $class($this->request, $this->response);
		$obj->action_index();
	}
	
	/**
	 * 转到指定商城的控制器
	 */
	function action_shop(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'goods';
		}
		$class = "Control_shop_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_buyer();
	}
	
	static function init_nav(){
		Keke::init_model();
		foreach (Keke::$_model_list as $k=>$v){
			if($v['model_status']==1 AND $v['model_type']=='shop'){
			  $model[2]=array($v['model_code']=>array('我买的'.$v['model_name']=> 'buyer_index/shop?t='.$v['model_code']));
			}elseif($v['model_status']==1 AND $v['model_type']=='task'){
				 
			  $t[$v['model_code']]['我发布的'.$v['model_name']]= 'buyer_index/task?t='.$v['model_code'];
			}
			$model[1] = $t;
		}
		self::$_buyer_nav = $model+self::$_buyer_nav;
		ksort(self::$_buyer_nav);
		 
	}

	
}