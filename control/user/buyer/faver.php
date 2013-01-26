<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-买家-我买的商品
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_user_buyer_faver extends Control_user{
    
	
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'buyer';
	/**
	 *
	 * @var 二级菜单选中项,空值不做选择
	 */
	protected static $_left = 'faver';
	
	function before(){
		Control_user_buyer_index::init_nav();
	}
	
	/**
	 * 服务
	 */
	function action_index(){
		
		$query_fields = array ('a.origin_id' => '商品ID', 'c.title' => '商品名称');
		
		$data = $this->favor_service();
		
		$uri = $this->_uri;
		
		$del_uri = USER_URL.'/buyer_faver/del';
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		
		$list_arr = $data ['data'];
		 
		$pages = $data ['pages'];
		
		require Keke_tpl::template('user/buyer/faver_goods');
	}
	
	
	
	function action_task(){
		 
		$query_fields = array ('a.origin_id' => '任务ID', 'c.task_title' => '任务名称');
		
		$data = $this->favor_task();
		
		$uri = $this->_uri;
		
		$del_uri = USER_URL.'/buyer_faver/del';
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		
		$list_arr = $data ['data'];
		
		
		$pages = $data ['pages'];
		
		require Keke_tpl::template('user/buyer/faver_task');
	}
	/**
	 * 删除
	 */
	function action_del(){
		if(isset($_GET['id'])){
			$where = 'fid='.$_GET['id'];
		}
		if(isset($_GET['ids'])){
			$where = 'fid in ('. $_GET['ids'].')';
		}
		DB::delete('witkey_favorite')->where($where)->execute();
	}
	/**
	 *	用户收藏商品数据
	 * @return array
	 */
	function favor_service(){
		$sql = "SELECT a.fid,a.origin_id, b.model_code,b.model_id,\n".
				"c.title,c.price,c.unite_price,c.pic \n".
				"FROM `:keke_witkey_favorite` a \n".
				"left JOIN :keke_witkey_model b \n".
				"on a.obj_type = b.model_code and b.model_type = 'shop'\n".
				" join :keke_witkey_service c \n".
				"on b.model_id = c.model_id and c.sid = a.origin_id\n";
	
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
	
		
		$this->_default_ord_field = 'a.fid';
	
		$base_uri = PHP_URL . "/user/buyer_faver";
	
		extract ( $this->get_url ( $base_uri ) );
	
		$where .= "  and a.uid = $this->uid and b.model_type='shop'";
			
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;
		 
		return (array)Model::sql_grid($sql,$where,$uri,$order);
	}
	/**
	 *用户收藏任务数据
	 * @return array
	 */
	function favor_task(){
		$sql = "SELECT a.fid,a.origin_id, b.model_code,\n".
				"c.task_title ,c.task_status,c.task_id,d.status,\n".
				"c.task_cash \n".
				"FROM `:keke_witkey_favorite` a \n".
				"left JOIN :keke_witkey_model b \n".
				"on a.obj_type = b.model_code and b.model_type = 'task'\n".
				"join :keke_witkey_task c \n".
				"on  c.task_id = a.origin_id  and  b.model_id = c.model_id  \n".
				"LEFT JOIN :keke_witkey_status d\n".
				"on c.task_status = d.sid and b.model_code = d.model_code and d.stype='task'";
	
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());
	
		$this->_default_ord_field = 'a.fid';
	
		$base_uri = PHP_URL . "/user/buyer_faver/task";
	
		extract ( $this->get_url ( $base_uri ) );
	
		$where .= " and  b.model_type='task' and a.uid = $this->uid ";
			
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;
	
		return (array)Model::sql_grid($sql,$where,$uri,$order);
	}
	
}