<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 后台友连管理的控制器
 * @author michael
 *
 */

class Control_admin_tool_link extends Control_admin {
	
	/**
	 * 友链管理初始化页面
	 * index 是必须的，否则路由找不到index，程序就挂了啊
	 * 坑爹的注释啊,这是必须要写的(*_*)!
	 */
	function action_index() {
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `link_id`,`link_name`,`link_url`,`listorder`,`on_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('link_id'=>$_lang['id'],'link_name'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/tool_link";
		
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_link')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$link_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		
 		
		require Keke_tpl::template('control/admin/tpl/tool/link');
	}
	
	//添加与编辑初始化
	function action_add(){
		//始始化全局变量，语言包变量
		global $_K,$_lang;
		$link_id = $_GET['link_id'];
		//如果有值，就进入编辑状态
		if($link_id){
			$link_info = Model::factory('witkey_link')->setWhere('link_id = '.$link_id)->query();
			$link_info = $link_info[0];
			$link_pic = $link_info['link_pic'];
		}
		//有http的就是url地址，不口水了
		if(strpos($link_pic, 'http')!==FALSE){
			//远程地址
			$mode = 1;
		}else{
			//本地图片
			$mode = 2;
		}
		//加载模板，这有点费J8话,地球人都懂的
		require Keke_tpl::template('control/admin/tpl/tool/link_add');
	}
	/**
	 * 保存模板上提交到的数据到数据库中
	 * 这个acton 是通用的，不要随便定义这个名称
	 * 
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交，你懂的
		Keke::formcheck($_POST['formhash']);
		//这里是业务判断,连接是图片还有url地址
		if($_POST['showMode'] ==1){
			$link_pic = $_POST['txt_link_pic'];
		}elseif(!empty($_FILES['fle_link_pic']['name'])){
			//上传文件用的，这个对新手来说好使,要就是简单
			$link_pic = keke_file_class::upload_file('fle_link_pic');
		}
		//这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
		$array = array('link_name'=>$_POST['txt_link_name'],
				       'link_url'=>$_POST['txt_link_url'],
					   'link_pic'=>$link_pic,
					   'listorder' => $_POST['txt_listorder'],
				       'on_time'=>time(),				  
		);
        //这是个隐藏字段，也就是主键的值，这个主键有值，就是要编辑(update)数据到数据库
		if($_POST['hdn_link_id']){
			Model::factory('witkey_link')->setData($array)->setWhere("link_id = '{$_POST['hdn_link_id']}'")->update();
			//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
			Keke::show_msg('提交成功','admin/tool_link/add?link_id='.$_POST['hdn_link_id'],'success');
		}else{
		 //这也当然就是添加(insert)到数据库中	
			Model::factory('witkey_link')->setData($array)->create();
			Keke::show_msg('提交成功','admin/tool_link/add','success');
		}
		
		
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
		if($_GET['link_id']){  
			$where = 'link_id = '.$_GET['link_id'];
		//删除多条,这里的条件统一为ids哟，亲	
		}elseif($_GET['ids']){
			$where = 'link_id in ('.$_GET['ids'].')';
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_link')->setWhere($where)->del();
	}
	
}
