<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * @all 作者：dengkang 
 * @version v 2.0
 * @date 2012-10-7 
 */
class Control_admin_finance_all extends Control_admin {
	
	/**
	 * 财务管理初始化页面
	 * index 是必须的，否则路由找不到index，程序就挂了啊
	 * 坑爹的注释啊,这是必须要写的(*_*)!
	 */
	function action_index() {
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `fina_id`,`username`,`fina_action`,`fina_type`,`fina_cash`,`fina_cash`,`user_balance`,`fina_credit`,`user_credit`,`fina_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('fina_id'=>"财务编号",'username'=>"用户名",'fina_cash'=>"金额",'user_balance'=>"用户余额");
		
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/finance_all";
		
        //获取财务动作数组值
        $fina_action_arr = keke_global_class::get_finance_action();		
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'fina_id';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_finance')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$fina_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
			
		require Keke_tpl::template('control/admin/tpl/finance/detail');
	}
	

	/**
	 * 这里是删除的action 主要是处理要单条删除
	 * 与多条删除。
	 * 规矩，删除action的名称统一del,不要问为什么
	 * 单条删除，传主键名称与值就可以删除了
	 * 多条删除的，是前端js拼接好的ids传过来的值.js 只传ids 的哟。不要写成主键名称
	 * 
	 */
	function action_del(){
		//删除单条,这里的link_id 是在模板上的请求连接中有的
		if($_GET['fina_id']){  
			$where = 'fina_id = '.$_GET['fina_id'];
		//删除多条,这里的条件统一为ids哟，亲	
		}elseif($_GET['ids']){
			$where = 'fina_id in ('.$_GET['ids'].')';
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_finance')->setWhere($where)->del();
	}
	
}
