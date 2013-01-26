<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台配置列表
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_shop_goods_admin_list extends Control_admin_shop_list{
	/**
	 * @var 模型代码
	 */
	public  $_model_code   = 'goods';
 
	/**
	 * 商品列表页
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	 
    	$fields = ' `sid`,`title`,`username`,`price`,`unite_price`,`service_time`,`unit_time`,`sale_num`,`status`,`on_time`,`is_top`';
    	 
    	$query_fields = array('sid'=>$_lang['id'],'title'=>$_lang['title'],'price'=>$_lang['cash']);
    	 
    	 
    	 
    	$base_uri = $this->_base_uri;
    	 
    	$add_uri =  $base_uri.'/add';
    	 
    	$del_uri = $base_uri.'/del';
     
    	$this->_default_ord_field = 'sid';
     
    	extract($this->get_url($base_uri));
    	 
    	$model_id = DB::select('model_id')->from('witkey_model')->where("model_code='$this->_model_code'")->get_count()->execute();
    	$where  .= " and model_id = $model_id";
    	 
    	$data_info = Model::factory('witkey_service')->get_grid($fields,$where,$uri,$order,$page);
    	 
    	$list_arr = $data_info['data'];
    	 
    	$pages = $data_info['pages'];
    	
    	$shop_status = Control_shop_goods_trade::get_goods_status();
    
     	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/list');
    }
    /**
     * 商品编辑
     */
    public function action_add(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	 
        $service_info = $this->get_service_info();
        
        $base_uri = $this->_base_uri;
        
         
        
        $indus_option_arr = Sys_indus::get_indus_tree($service_info['indus_id']);
        //商品状态
        $status_arr = Control_shop_goods_trade::get_goods_status();
        //获取商品的增值项
        $payitem_list = Sys_payitem::get_service_payitem($this->_sid);
        
        $file_list = Control_admin_shop_list::get_service_file($this->_sid);
         
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/edit');
    }
    
    /**
     * 商品保存
     */
    public function action_save(){
    	$sid = $_POST['sid'];
    	if(!$sid){
    		return FALSE;
    	}
    	Keke::formcheck($_POST['formhash']);
        $_POST = Keke_tpl::chars($_POST);
        $fds = $_POST['fds'];
        $fds['is_top'] = $fds['is_top']?'1':0;
    	$where = "sid = $sid";
    	Model::factory('witkey_service')->setData($fds)->setWhere($where)->update();
    	$this->request->redirect($this->request->referrer());
    	
    }
    
    /**
     * 上架
     */
    public function action_recommend(){
    	 //$this->set_recommend();
    	 Control_shop_goods_trade::up_down($this->_sid,1);
    }
    /**
     * 下架
     */
    public function action_unrecommend(){
    	 
    	Control_shop_goods_trade::up_down($this->_sid,0);
    }
     
    /**
     * 删除商品，如何商品没有进行中的订单，则可以删除
     */
    public function  action_del(){
    	echo $this->del_service();
    }
     
   
    /**
     * 商品留言列表页
     */
    public function action_comment(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	//获取商品信息
    	$comments = DB::select()->from('witkey_comment')->where("obj_id = '$sid' and obj_type='shop' ")->execute(); 
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_comment');
    }
    /**
     * 商品订单列表页
     */
    public function action_order(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	
    	$query_fields = array('b.order_id'=>$_lang['id'],'order_name'=>$_lang['title']);
    	
    	$this->_default_ord_field = 'order_time';
    	
    	$buri = $base_uri.'/order';
    	
    	$sql = "SELECT b.*,b.order_id as order_id,a.num FROM `:Pwitkey_order_detail` as a \n".
				"left join  :Pwitkey_order as b on a.order_id = b.order_id and a.obj_type = 'service'\n";
    	$sql  = DB::query($sql)->tablepre(':P')->__toString();
    	extract($this->get_url($buri));
    	$where .= " and a.obj_id = '$sid'";
    	$group = " GROUP BY b.order_id";
    	 
    
    	$data = Model::sql_grid($sql,$where,$uri,$order,$group);
    	$list_arr = $data['data'];
    	$pages = $data['pages'];
    	$order_status = Control_shop_goods_trade::get_order_status();
     
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_order');
    }
    /**
     * 删除商品留言
     */
    public function action_comment_del(){
    	$comment_id = $_GET['comment_id'];
    	echo DB::delete('witkey_comment')->where("comment_id = '$comment_id'")->execute();
    }
    /**
     * 商品互评列表页
     */
    public function action_mark(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	$base_uri = $this->_base_uri;
    	//获取商品信息
    	 
    	$where = "model_code = '$this->_model_code' and origin_id = '$sid'";
    	$marks = DB::select()->from('witkey_mark')->where($where)->execute();
    	//互评状态
    	$mark_status = Keke_user_mark::get_mark_status();
    	//互评项
    	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/s_mark');
    }
     
    
}