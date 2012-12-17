<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 支付配置
 * @author Michael	
 * @version v 2.2
 * 2012-10-01
 */
class Control_admin_config_payitembuy extends Control_admin{
	/**
	 * 增值服务购买记录列表
	 */
	function action_index(){
		global $_K,$_lang;
		//要显示的字段,即SQl中SELECT要用到的字段	<td>{$v['record_id']}</td>
		$fields = ' `record_id`,`item_code`,`use_type`,`username`,`obj_type`,`use_cash`,`use_num`,`on_time`';
		//要查询的字段,在模板中显示用的
		$query_fields = array('record_id'=>$_lang['id'],'item_code'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/config_payitembuy";
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
	 
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_payitem_record')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		
		$add_service_type = keke_global_class::get_value_add_type ();
		
		$buy_use_type = array ("buy" => $_lang['buy'], "spend" => $_lang['spend'] );
		
		//用户购买总金额
		
		$all_buy_pro =(float)DB::select('sum(use_cash*use_num)')->from('witkey_payitem_record')->where("use_type='buy'")->get_count()->execute();
		
		
		require Keke_tpl::template('control/admin/tpl/config/payitem_buy');
	}
	 
	
}