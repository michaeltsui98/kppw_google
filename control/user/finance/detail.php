<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页-收支明细
 * @author Michael
 * @version 3.0
   2012-12-03
 */

class Control_user_finance_detail extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'detail';
	
	function action_index(){
		
		 $this->get_data();
	}
	
	function action_in(){
		$this->get_data('in');
	}
	function action_out(){
		$this->get_data('out');
	}
	
	/**
	 * 财务明细
	 * @param string $type (in,out)
	 */
	function get_data($type=NULL){
		
		$fields = "`fina_type`,`fina_cash`,`fina_credit`,`user_balance`,`user_credit`,`fina_mem`,`fina_time`";
		
		$query_fields = array('fina_cash'=>'金额','fina_mem'=>'事由','fina_time'=>'时间');
		
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'fina_time';
		$b_uri = BASE_URL.'/index.php/user/finance_detail';
		$base_uri = $b_uri.'/'.$type;
 
		extract($this->get_url($base_uri));
		
		$where .= ' and uid = '.$_SESSION['uid'];
		if($type!==NULL){
			//收入或才支出
			$where .= " and fina_type='$type'";
		}
		
		$data_info = Model::factory('witkey_finance')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		//echo $pages['page'];die;
		
		require Keke_tpl::template('user/finance/detail');
	}
	
	
	
}