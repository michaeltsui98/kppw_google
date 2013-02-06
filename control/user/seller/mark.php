<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-服务商-发布的商品
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_seller_mark extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'mark';
	
	public  static $_mark = array(1=>'好评',2=>'中评',3=>'差评');
	protected $_uri ;
	protected $_ord_tag;
	protected $_ord_char;
	
	function action_index(){
		Control_user_seller_index::init_nav();
		
		//查询字段
		$query_fields = array ('by_uid' => 'UID', 'by_username' => '用户名');
		
		$status = (int)$_GET['status'];
		
		$data = $this->buyer_mark_data($status);
		
		$uri = $this->_uri;
		
		$ord_tag = $this->_ord_tag;
		
		$ord_char = $this->_ord_char;
		// 列表数据
		$list_arr = $data ['data'];
 
		// 分页数据
		$pages = $data ['pages'];
		
		require Keke_tpl::template('user/seller/mark');
	}
	/**
	 * 来自雇主的互评数据
	 */
	function buyer_mark_data($status=NULL){
		
		$sql = "SELECT a.mark_id,a.mark_status,a.mark_time,a.by_uid,a.by_username,a.mark_content,\n".
				"if(e.model_type='task',c.task_title,d.title) as obj_title,a.origin_id,\n".
				"if(e.model_type='task','任务','商品') as obj_type , e.model_name,\n".
				"group_concat(b.aid_name) as aid_name ,a.aid_star \n".
				"FROM `:keke_witkey_mark` a left join :keke_witkey_mark_aid b \n".
				"on FIND_IN_SET(b.aid,a.aid) \n".
				"LEFT JOIN :keke_witkey_model e \n".
				"on a.model_code = e.model_code \n".
				"left join :keke_witkey_task c\n".
				"on a.origin_id = c.task_id and e.model_type = 'task'\n".
				"LEFT JOIN :keke_witkey_service d\n".
				"on a.origin_id =  d.sid and e.model_type = 'service'\n";
		
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());

		$base_uri = PHP_URL . "/user/seller_mark";
		if($status !==NULL AND $status > 0){
			$base_uri .= '/?status='.$status;
		}
		
		 
		$this->_default_ord_field = 'mark_time';
		
		 
		extract ( $this->get_url ( $base_uri ) );
		
		$where .= " and a.mark_status >0 and a.mark_type = 'seller' and a.uid = ".self::$uid;
		
		$group = " group by a.mark_id";
		if($status >0 ){
			$where .= " and a.mark_status=".intval($status);
		}
		$this->_uri = $uri;
		$this->_ord_tag = $ord_tag;
		$this->_ord_char = $ord_char;
		return Model::sql_grid($sql,$where,$uri,$order,$group);
	}
 
}