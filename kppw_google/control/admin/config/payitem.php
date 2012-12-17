<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 支付配置
 * @author Michael	
 * @version v 2.2
 * 2012-10-01
 */
class Control_admin_config_payitem extends Control_admin{
	/**
	 * 增值项列表
	 */
	function action_index(){
		global $_K,$_lang;
		$type = $_GET['type']?$_GET['type']:'witkey';
		$unit = array ('times' =>$_lang['times'], 'month' =>$_lang['month'], 'year' =>$_lang['year'],'day'=>$_lang['day']);
		$type_arr = array("witkey"=>$_lang['witkey'],"employer"=>$_lang['employer']);
		$payitem_arr = keke_payitem_class::get_payitem_config ($type,null,null,0,null);
		require Keke_tpl::template('control/admin/tpl/config/payitem');
	}
	/**
	 * 配置增值项
	 */
	function action_add(){
		global $_K,$_lang;
		$item = $_GET['item_code'];
		$where = "item_code = '$item'";
		//获取指定item_code 的记录
		$payitem = DB::select()->from('witkey_payitem')->where($where)->execute();
		$payitem = $payitem[0];
		//模型列表
		Keke::init_model();
		$model_list = Keke::$_model_list;
		//模型代码数组
		$code_arr=explode(",",$payitem['model_code']);
		//增值类型
		$payitem_type = keke_global_class::get_payitem_type();
		//加载支付配置模板
		require Keke_tpl::template('control/admin/tpl/config/payitem_config');
	}
	/**
	 * 增值项保存
	 */
	function action_save(){
		global $_lang;
		//安全检查
		Keke::formcheck($_POST['formhash']);
		//过滤_POST
		$_POST = Keke_tpl::chars($_POST);
		$item_code = $_POST['hdn_code'];
		$item_id = $_POST['hdn_item_id'];
		if($item_id){
			$array = array('item_name'=>$_POST['item_name'],
							'user_type'=>$_POST['user_type'],
							'model_code'=>implode(',',(array)$_POST['model_code']),
							'item_cash'=>$_POST['item_cash'],
							'item_standard'=>$_POST['item_standard'],
							'item_limit'=>$_POST['item_limit'],
							'small_pic'=>$_POST['hdn_small_pic'],
							'big_pic'=>$_POST['hdn_big_pic'],
							'item_desc'=>$_POST['item_desc'],
							'is_open'=>$_POST['is_open']);
			$where = "item_id = '$item_id'";
			//更新数据库
			Model::factory('witkey_payitem')->setData($array)->setWhere($where)->update();
		}
		Keke::show_msg($_lang['submit_success'],'admin/config_payitem/add?item_code='.$item_code,'success');		
	}
	/**
	 * 删除图片时获取图片对应的fid
	 * @param  $path  e.g ...img.jpg?fid=1000
	 * @return boolean| fid
	 */
	static function get_fid($path){
		if(!path){
			return false;
		}
		parse_str($path, $query);
		list($k,$v) = each($query); 
		return (int)$v;
	}


	
	/**
	 * 改变支付接口的状态 
	 * @example 1 启用 2禁用
	 */
	function action_change_status(){
		global $_lang;
		//状态
		$status = $_GET['status'];
		//主键
		$item_id = $_GET['item_id'];
		//增值项类型 ,用来定义显示的选卡
		$type = $_GET['type'];
		//改变状态
		keke_payitem_class::payitem_edit ( $item_id, array ('is_open' => $status ) );
		
		Keke::show_msg($_lang['submit_success'],'admin/config_payitem?type='.$type,'success');
	}
	/**
	 * 安装增值项
	 */
	function action_install(){
		global $_lang;
		$res = keke_payitem_class::payitem_install ( $_POST['txt_item_code'] );
		$url = "admin/config_payitem";
		$res and Keke::show_msg ($_lang['payitem_install_success'], $url,'success' ) ;
	}
	/**
	 * 卸载
	 */
	function action_uninstall(){
		$item_id = $_GET['item_id'];
		echo  keke_payitem_class::payitem_uninstall ( $item_id );
	}
	
}