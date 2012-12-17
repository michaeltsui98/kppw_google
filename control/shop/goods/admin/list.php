<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台配置列表
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_shop_goods_admin_list extends Control_shop_list{
	/**
	 * @var 模型代码
	 */
	public  $_model_code   = 'goods';
 
	/**
	 * 商品列表页
	 */
    function action_index(){
    	global $_K,$_lang;
    	
    	//要显示的字段,即SQl中SELECT要用到的字段
    	$fields = ' `sid`,`title`,`username`,`price`,`unite_price`,`service_time`,`unit_time`,`sale_num`,`status`,`on_time`,`is_top`';
    	//要查询的字段,在模板中显示用的
    	$query_fields = array('sid'=>$_lang['id'],'title'=>$_lang['title'],'price'=>$_lang['cash']);
    	//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
    	$count = intval($_GET['count']);
    	//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
    	$base_uri = $this->_base_uri;
    	//添加编辑的uri,add这个action 是固定的
    	$add_uri =  $base_uri.'/add';
    	//删除uri,del也是一个固定的，写成其它的，你死定了
    	$del_uri = $base_uri.'/del';
    	//默认排序字段，这里按时间降序
    	$this->_default_ord_field = 'sid';
    	//这里要口水一下，get_url就是处理查询的条件
    	extract($this->get_url($base_uri));
    	//查指定类型的商品
    	$model_id = DB::select('model_id')->from('witkey_model')->where("model_code='$this->_model_code'")->get_count()->execute();
    	$where  .= " and model_id = $model_id";
    	//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
    	$data_info = Model::factory('witkey_service')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
    	//列表数据
    	$list_arr = $data_info['data'];
    	//分页数据
    	$pages = $data_info['pages'];
    	
    	$shop_status = Control_shop_goods_base::get_goods_status();
    
     	require Keke_tpl::template('control/shop/'.$this->_model_code.'/tpl/admin/list');
    }
    /**
     * 商品编辑
     */
    public function action_add(){
    	global  $_K ,$_lang;
    	$sid = $this->_sid;
    	 //获取商品信息
        $service_info = $this->get_service_info();
        
        $base_uri = $this->_base_uri;
        
        $process_arr = Control_shop_list::can_operate($service_info['shop_status']);
        
        $indus_option_arr = Sys_indus::get_indus_tree($service_info['indus_id']);
        //单赏商品状态
        $status_arr = Control_shop_goods_base::get_goods_status();
        //获取商品的增值项
        $payitem_list = Sys_payitem::get_service_payitem($this->_sid);
        
        $file_list = Control_shop_list::get_service_file($this->_sid);
         
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
    	 $this->set_recommend();
    }
    /**
     * 下架
     */
    public function action_unrecommend(){
    	//改变商品的is_top 为0
    	$this->set_unrecommend();
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
    	$count = intval($_GET['count']);
    
    	$data = Model::sql_grid($sql,$where,$uri,$order,$group,$page,$count,$_GET['page_size']);
    	$list_arr = $data['data'];
    	$pages = $data['pages'];
    	$order_status = Control_shop_goods_base::get_order_status();
     
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