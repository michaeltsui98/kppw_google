<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_seller_index extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'index';
	
	function before(){
		self::init_nav();
	}
	
	function action_index(){
	
		$this->action_task();
	}
	
	function action_task(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'sreward';
		}
		$class = "Control_task_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_seller();
	}
	
	function action_shop(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'goods';
		}
		$class = "Control_shop_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_seller();
	}
	function action_pub(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'goods';
		}
		$class = "Control_shop_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_pub();
	}
	
	
	static function init_nav(){
 		Keke::init_model();
		foreach (Keke::$_model_list as $k=>$v){
			if($v['model_status']==1 AND $v['model_type']=='shop'){
				$model[$v['model_code']] = array($v['model_name'].'订单','seller_index/shop?t='.$v['model_code']);
				$code = $v['model_code'].'pub';
				$model[$code] = array('我发布的'.$v['model_name'],'seller_index/pub?t='.$v['model_code']);
			}elseif($v['model_status']==1 AND $v['model_type']=='task'){
				$model[$v['model_code']] = array('我参与的'.$v['model_name'],'seller_index/task?t='.$v['model_code']);
			}
		}
		self::$_seller_nav = $model+self::$_seller_nav;
	}
}