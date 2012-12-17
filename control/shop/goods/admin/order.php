<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台订单列表
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_shop_goods_admin_order extends Control_admin_shop_order{
	/**
	 * @var 模型代码
	 */
	public  $_model_code   = 'goods';
 
	/**
	 * 商品列表页
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	global  $_K ,$_lang;
    	$model_id  = 6;
    	
    	$base_uri = $this->_base_uri;
    	
    	$query_fields = array('b.order_id'=>$_lang['id'],'order_name'=>$_lang['title']);
    	
    	$this->_default_ord_field = 'order_time';
    	
    	 
    	
    	$sql = "SELECT b.*,b.order_id as order_id,a.num FROM `:Pwitkey_order_detail` as a \n".
				"left join  :Pwitkey_order as b on a.order_id = b.order_id and a.obj_type = 'service'\n";
    	$sql  = DB::query($sql)->tablepre(':P')->__toString();
    	extract($this->get_url($base_uri));
        $where .= " and b.model_id = '$model_id'";
    	$group = " GROUP BY b.order_id";
    	$count = intval($_GET['count']);
    
    	$data = Model::sql_grid($sql,$where,$uri,$order,$group,$page,$count,$_GET['page_size']);
    	$list_arr = $data['data'];
    	$pages = $data['pages'];
    	$order_status = Control_shop_goods_base::get_order_status();
     
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/order');
    }
       
}