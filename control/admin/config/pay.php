<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 支付配置
 * @author Michael	
 * @version v 2.2
 * 2012-10-01
 */
class Control_admin_config_pay extends Control_admin{
	/**
	 * 支付配置
	 */
	function action_index(){
		global $_lang;
		//非提交时
		if(!$_POST){
			//获取要编辑的数据
			$res = DB::select('k,v')->from('witkey_pay_config')->execute();
			//健值重组
			$pay_config = Arr::get_arr_by_key($res,'k');
			//加载支付配置模板
			require Keke_tpl::template('control/admin/tpl/config/pay');
			die;
		}
		//表单安全检查
		Keke::formcheck($_POST['formhash']);
		//去掉formhash
		unset($_POST['formhash']);
		//批量更新
		foreach ($_POST as $k=>$v){
			DB::update('witkey_pay_config')->set(array('v'))->value(array($v))
			->where("k = '$k'")->execute();
		}
		//跳转
		Keke::show_msg($_lang['submit_success'],'admin/config_pay','success');
	}
	 
	/**
	 * 在线支付
	 */
	function action_online(){
		global $_K,$_lang;
		$payment_list = DB::select()->from('witkey_pay_api')->where("type='online'")->execute();
		//加载支付配置模板
		require Keke_tpl::template('control/admin/tpl/config/pay_online');
	}
	/**
	 * 线下支付列表 
	 */
	function action_offline(){
		global $_K,$_lang;
		//条件
		$where = "type='offline'";
		//线下银行列表
		$payment_list = DB::select()->from('witkey_pay_api')->where($where)->execute();
		//银行数组
		$bank_arr = Keke_global::get_bank();
		//加载支付配置模板
		require Keke_tpl::template('control/admin/tpl/config/pay_offline');
	}
	/**
	 * 线下支付添加编辑
	 */
	function action_offline_add(){
		global $_K,$_lang;
		if($_GET['pay_id']){
			$payment_config = self::get_pay_config($_GET['pay_id']);
			
		}
		$bank_arr   = Keke_global::get_bank();
	 
		//加载支付配置模板
		require Keke_tpl::template('control/admin/tpl/config/pay_offline_add');
	}
	
	/**
	 * 线下支付数据保存
	 */
	function action_offline_save(){
		global $_K,$_lang;
		//表单安全检查
		Keke::formcheck($_POST['formhash']);
		$array = array('pay_name'=>$_POST['pay_name'],
						'payment'=>$_POST['payment'],
						'status'=>$_POST['status'],
						'pay_user'=>$_POST['pay_user'],
						'pay_tel'=>$_POST['pay_phone'],
						'pay_account'=>$_POST['pay_account'],
						'type'=>'offline');
		if($_POST['hdn_pay_id']){
			$where = "pay_id = '{$_POST['hdn_pay_id']}'";
			Model::factory('witkey_pay_api')->setData($array)->setWhere($where)->update();
			$url = "?pay_id={$_POST['hdn_pay_id']}";
		}else{
			Model::factory('witkey_pay_api')->setData($array)->create();
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_pay/offline_add'.$url,'success');
	}
	
	/**
	 * 改变支付接口的状态 
	 * @example 0 禁用 1 启用
	 */
	function action_change_status(){
		global $_lang;
		//状态
		$status = $_GET['status'];
		//主键
		$pay_id = $_GET['pay_id'];
		//默认为在线接口
		$type = $_GET['type']?$_GET['type']:'online';
		//改变状态
		DB::update('witkey_pay_api')->set(array('status'))->value(array($status))
		->where("pay_id='$pay_id'")->execute();
		Keke::show_msg($_lang['submit_success'],'admin/config_pay/'.$type,'success');
	}
	/**
	 * 线上接口编辑
	 */
	function action_add(){
		global $_K,$_lang;
		if($_GET['pay_id']){
			$payment_config = self::get_pay_config($_GET['pay_id']);
			//支付的名称也就是目录
			$dir = $payment_config['payment'];
			$pay_basic = array();
			//初始化配置数组
			include S_ROOT.'payment/'.$dir.'/config.php';
			//初始化配置数量 $pay_basic 是config.php 中的数组
			$init_param = $pay_basic ['initparam'];
			$items = array();
			foreach (explode(';', $init_param) as $v){
				$it = explode ( ":", $v );
				//k 为键,V为值，值是序列化，保成在数据库中config字段,这里为什么要这样做，是因为每个在线支付接口的参数都不一样
				$items [] = array ('k' => $it ['0'], 'name' => $it ['1'], 'v' => $payment_config [$it ['0']] );
			}
		}
		 
		//加载支付配置模板
		require Keke_tpl::template('control/admin/tpl/config/pay_add');
	}
	
	
	static function get_pay_config($pay_id){
		//查询条件
		$where = "pay_id = '".intval($pay_id)."'";
		//执行查询
		return  DB::select()->from('witkey_pay_api')->where($where)->get_one()->execute();
		
	}
	/**
	 * 在线接口的配置保存
	 */
	function action_online_save(){
		global  $_lang;
		//form 安全检查
		Keke::formcheck($_POST['formhash']);
		//这里只只执行update
		if($_POST['hdn_pay_id']){
			//要更新字段
			$columns= array_keys($_POST['fds']);
			//更新的值
			$values =array_values($_POST['fds']);
			//执行条件
			$where = "pay_id='{$_POST['hdn_pay_id']}'";
			//开始执行
			DB::update('witkey_pay_api')->set($columns)->value($values)->where($where)->execute();
			
			Keke::show_msg($_lang['submit_success'],"admin/config_pay/add?pay_id={$_POST['hdn_pay_id']}",'success');
		} 
		
	}
	/**
	 * 线下接口删除
	 */
	function action_del(){
		$pay_id = $_GET['pay_id'];
		//删除线下提定的接口
		echo DB::delete('witkey_pay_api')->where("pay_id = '$pay_id' and type='offline'")->execute();
	}
	
}