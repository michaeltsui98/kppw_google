<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_seller_index extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'index';
	
	function before(){
		self::init_nav();
	}
	
	function action_index(){
	
		$this->action_task();
	}
	/**
	 * ���������
	 */
	function action_task(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'sreward';
		}
		$class = "Control_task_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_seller();
	}
	/**
	 * �����Ķ���
	 */
	function action_shop(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'goods';
		}
		$class = "Control_shop_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_seller();
	}
	/**
	 * ��������Ʒ
	 */
	function action_pub(){
		if(!isset($_GET['t'])){
			$_GET['t'] = 'goods';
		}
		$class = "Control_shop_{$_GET['t']}_user";
		$obj =  new $class($this->request, $this->response);
		$obj->action_pub();
	}
	
	/**
	 * ��ʼ�������˵�
	 */
	static function init_nav(){
 		Keke::init_model();
 		
		foreach (Keke::$_model_list as $k=>$v){
			if($v['model_status']==1 AND $v['model_type']=='shop'){
				
				$model[2]=array($v['model_code'].'order'=>
						array($v['model_name'].'����'=>'seller_index/shop?t='.$v['model_code']),
						$v['model_code'].'pub'=>array('�ҷ�����'.$v['model_name']=>'seller_index/pub?t='.$v['model_code']),
						);				
			}elseif($v['model_status']==1 AND $v['model_type']=='task'){
				$t[$v['model_code']]['�Ҳ����'.$v['model_name']]= 'seller_index/task?t='.$v['model_code'];
			}
			$model[1] = $t;
		}
		self::$_seller_nav = self::$_seller_nav+$model;
// 		sort(self::$_seller_nav,);
		ksort(self::$_seller_nav);
		//var_dump(self::$_seller_nav);
		//die;
	}
}