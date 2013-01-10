<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心任务列表与编辑
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_shop_goods_user extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
	/**
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'goods';
	
 	/**
	 * 我买的商品订单信息
	 */
  	function action_buyer(){
  		self::$_default = 'buyer';
		Control_user_buyer_index::init_nav();
	
		require Keke_tpl::template('control/shop/goods/tpl/user/buyer');
	}  
	
 	/**
	 * 我卖出的商品订单
	 */
	function action_seller(){
		self::$_left = 'goodsorder';	
		

		Control_user_seller_index::init_nav();
		
		$query_fields = array('a.order_id'=>'订单号','a.order_name'=>'订单名');
		
		$base_uri = PHP_URL."/shop/goods_user/seller";
		$sql="select a.order_id,a.order_name,a.order_time,a.order_amount,a.order_status,
			 a.order_body,a.order_uid,a.order_username,a.seller_uid,a.seller_username,\n".
			 "b.detail_id,b.obj_type,b.obj_id,b.price,b.num,b.model_id,\n".
			 " c.mobile,c.qq\n".
			 "from keke_witkey_order a\n".
			 "left join keke_witkey_order_detail b\n".
			 "on a.order_id=b.order_id and b.model_id=6\n".
			 "left join :keke_witkey_space c\n".
			 "on a.order_uid=c.uid\n";		

		$order_ststus=Sys_order::task_order_status();
		
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
				
		$base_uri = PHP_URL."/shop/goods_user/seller";
		$redirect_uri = "/shop/goods_user/seller";
		extract ( $this->get_url ( $base_uri ) );
		
		$where .= " and a.seller_uid=$this->uid";
		if($_GET['status']){
			$status=$_GET['status'];
			$where .=" and a.order_status= '$status'";
		}
		$this->_default_ord_field = 'a.order_id';
		$this->_uri = $uri;
		
		$data =Model::sql_grid($sql,$where,$uri,$order);
		$order_arr=$data['data'];
		require Keke_tpl::template('control/shop/goods/tpl/user/seller');
	}
	function buyer_status($status,$order_id){
		$html = "";
		switch ($status){
			case "wait":
				$hmtl = "<a href='{PHP_URL}/shop/goods_user/buyer_order?a=pay&id=$order_id' onclick='return kconfirm()'>付款</a>";
				break;
				
		}
		return $html;
	}
	
	function seller_status($status){
		return "";
	}
	
	function action_buyer_order(){
		$code = $this->request->param('id');
		call_user_func(array(Control_shop_goods_trade,$code),$this->uid,$order_info);
		$this->refer();
	}
	
	/**
	 * 发布的商品列表
	 */
	function action_pub(){
		 self::$_left = 'goodspub';
		 Control_user_seller_index::init_nav();
		 $fields = '`sid`,`pic`,`title`,`price`,`unite_price`,`sale_num`,`status`,`on_time`,`model_id`';
		 $query_fields = array('sid'=>'商品ID','title'=>'商品标题');
		 $base_uri = PHP_URL."/shop/goods_user/pub";
		 extract ( $this->get_url ( $base_uri ) );
		 $where .= " and uid='$this->uid' and model_id='6'";
		 if($_GET['status']){
		 	$status=$_GET['status'];
			$where .="and status =$status";
		 }
		 $data_info = Model::factory('witkey_service')->get_grid( $fields, $where, $uri, $order);
		 $list_arr = $data_info['data'];
		 $pages = $data_info['pages'];
		require Keke_tpl::template('control/shop/goods/tpl/user/pub');
	}
	/**
	 * 上下架商品
	 */
	function action_change_status(){
		$sid=(int)$_GET['sid'];
		$status=(int)$_GET['status']==1?2:1;
		DB::update('witkey_service')->set(array('status'))->value(array($status))->where("sid='$sid'")->execute();
		$this->request->redirect ( "shop/goods_user/pub?status={$_GET['status']}" );
	}
	/**
	 * 删除商品
	 */
	function action_del(){
		DB::delete('witkey_service')->where("sid='{$_GET['sid']}'")->execute();
	}
	/**
	 * 商品编辑 
	 */
	function action_edit(){
		self::$_left = 'goodspub';
		Control_user_seller_index::init_nav();
		$sid=$_GET['sid'];
		$sql="select a.sid,a.indus_id,a.title,a.price,a.service_time,a.unit_time,a.content,\n".
			 "GROUP_CONCAT(conv(oct(b.file_id),8,10)) file_id,GROUP_CONCAT(b.file_name) file_name,GROUP_CONCAT(b.save_name) save_name\n".
			 "from	:keke_witkey_service a\n".
			 "LEFT JOIN	:keke_witkey_file b\n".
			 "on a.sid = b.obj_id\n".
			 "WHERE a.sid=:sid";
		$service_info = DB::query($sql)->tablepre(':keke_')->param(':sid', $sid)->get_one()->execute();
		
		$file_info =array_map(NULL,explode(',',$service_info['save_name']),
				explode(',', $service_info['file_name']),
				explode(',', $service_info['file_id']));
		if($file_info[0][0]){
			$length = 5-sizeof($file_info);
		}else{
			$length = 5;
		}
		$ext =  "*.jpg;*.gif;*.bmp;*.png";
		$indus_arr = Sys_indus::get_indus_tree($service_info['indus_id']);
		require Keke_tpl::template('control/shop/goods/tpl/user/pub_edit');
	}
	/**
	 * 商品保存
	 */
	function action_save(){
		
		Keke::formcheck ( $_POST ['formhash'] );
		$_POST = Keke_tpl::chars ( $_POST );
	
		$array=array(
				'indus_id'=>$_POST['slt_indus_id'],
				'title'=>$_POST['txt_title'],
				'content'=>$_POST['txt_content'],
				'price'=>$_POST['txt_price'],
				'service_time'=>$_POST['txt_service_time'],
				'unit_time'=>$_POST['slt_unit_time'],
		);
		$sid = $_POST ['hdn_sid'];

		Model::factory ( 'witkey_service' )->setData ( $array )->setWhere ( "sid = '$sid'" )->update ();
		
		$this->request->redirect ( "shop/goods_user/edit?sid=$sid" );
	}
	/**
	 * 删除商品附件
	 */
	function action_del_file(){
		File::del_att_file($_GET['fid'],$_GET['file_path']);
	}
	
}