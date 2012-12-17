<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后面实名认证列表页
 * @author Michael
 * @version 2.2
   2012-10-11
 */
class Control_auth_realname_admin_list extends Controller {
	protected  $_page;
	protected  $_uri ;
	function before(){
		$this->_page = $_GET['page'];
		$this->_uri = 'auth/realname_admin_list?page='.$this->_page;
	}
	/**
	 * 初始化后台列表页
	 * 显示所有的认证记录，待审核的记录在最前边
	 */
	function action_index(){
	   global $_K,$_lang;
 
	   $fields = '`uid`,`username`,`realname`,`id_code`,`id_pic`,`pic`,`cash`,`start_time`,`auth_status`,`end_time`,`mem`';
	   //要查询的字段,在模板中显示用的
	   $query_fields = array('uid'=>$_lang['id'],'realname'=>$_lang['name'],'start_time'=>$_lang['time']);
	   //总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
	   $count = intval($_GET['count']);
	   //基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
	   $base_uri = BASE_URL."/index.php/auth/realname_admin_list";
	   //添加编辑的uri,add这个action 是固定的
	   $add_uri =  $base_uri.'/add';
	   //删除uri,del也是一个固定的，写成其它的，你死定了
	   $del_uri = $base_uri.'/del';
	   //默认排序字段，这里按时间降序
	   $this->_default_ord_field = 'start_time';
	   //这里要口水一下，get_url就是处理查询的条件
	   extract($this->get_url($base_uri));
	 
	   //获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
	   $data_info = Model::factory('witkey_auth_realname')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
	   //列表数据
	   $list_arr = $data_info['data'];
	   //分页数据
	   $pages = $data_info['pages'];
	   require Keke_tpl::template ( 'control/auth/realname/tpl/admin_list' );
	}
	/**
	 * 初始化认证信息页面
	 */
	function action_add(){
		global $_K,$_lang;
		
		require Keke_tpl::template ( 'control/auth/realname/tpl/admin_info' );
	}
	/**
	 * 认证通过
	 */
	function action_pass(){
		 global $_lang;
		 $auth_code = 'realname';
         // 更新认证表，认证记录表，用户表
		 $sql = "update  `:keke_witkey_auth_realname` as a \n".
				"left join :keke_witkey_space as b\n".
				"on a.uid = b.uid\n".
				"left join :keke_witkey_member_auth as c \n".
				"on a.uid = c.uid\n".
				"set a.auth_status =1 ,\n".
				"b.truename = a.realname,\n".
				"c.realname = 1, \n".
				"b.group_id = 2\n";
		 
		 if($_GET['u_id']){
		 	$uid = $_GET['u_id'];
		 	$sql .= "where a.uid = $uid";
		 }else{
		 	$uid = $_POST['ckb'];
		 	$sql .= "where a.uid in ($uid)";
		 }
		 
		 DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
	}
	
	/**
	 * 认证不通过
	 */
	function action_no_pass(){
		global $_lang;
		$auth_code = 'realname';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}
		
		if (CHARSET == 'gbk') {
			$_POST ['data'] = Keke::utftogbk ( $_POST ['data'] );
		}
		
		$sql = "update  `keke_witkey_auth_realname` as a \n".
				"left join keke_witkey_member_auth as c \n".
				"on a.uid = c.uid\n".
				"set a.auth_status =2 ,\n".
				"c.realname = 0,\n".
				"a.mem = :mem \n".
				"where a.uid = $uid";
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':mem', $_POST['data'])->execute();
	}
	/**
	 * 单条删除与多条删除 
	 */
	function action_del(){
		global $_lang;
		$auth_code = 'realname';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}else{
			$uid = explode(',', $_GET['ids']);
		}
		echo Keke_user_auth::del($uid, $auth_code);
	}
} 