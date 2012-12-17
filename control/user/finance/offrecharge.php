<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页-用户充值
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_finance_offrecharge extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'recharge';
	
	function action_index(){
		$fields = '`pay_id`,`payment`,`type`,`pay_user`,`pay_name`,`pay_account`,`pay_tel`,`status`';
		
		$base_uri = BASE_URL.'/index.php/finance/offrecharge';
		$del_uri = $base_uri.'/del';
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'pay_id';
		//获取分页条件
		extract($this->get_url($base_uri));
		//条件
		$where .= " and type = 'offline' and status = 1 ";
		
		$data_info = Model::factory('witkey_pay_api')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		
		//用户充值的最小金额限制
		$recharge_min =  DB::select('v')->from('witkey_pay_config')->where("k='recharge_min'")->get_count()->execute();
		
//		var_dump($data_list);
		//显示分页的页数
		$bank_pic = array_flip(Keke_global::get_bank_code());
		
		$pages = $data_info['pages'];
		
		require Keke_tpl::template('user/finance/offrecharge');
	}
	function action_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);//防sql注入
		$cert_pic = keke_file_class::upload_file('cert_pic');
		$array = array(
				 
				'uid'=>$_SESSION['uid'],
				'username'=>$_SESSION['username'],
				'pay_id'=>$_POST['pay_id'],
				'cash'=>$_POST['recharge_cash'],
				'status'=>'wait',
				'recharge_pic'=>$cert_pic,
				'pay_time'=>time(),
				);
				
		Model::factory('witkey_recharge')->setData($array)->create();
		$this->request->redirect('user/finance_recharges');
		
	}
	
}