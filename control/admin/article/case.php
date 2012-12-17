<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * 后台案例管理控制层
 * @author Michael	
 * 2012-09-26
 */
class Control_admin_article_case extends Control_admin {
 
	function action_index() {
		 
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `case_id`,`obj_id`,`obj_type`,`case_img`,`case_title`,`case_desc`,`case_price`,`on_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('case_id'=>$_lang['id'],'case_title'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/article_case";
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_case')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];

		require Keke_tpl::template('control/admin/tpl/article/case');
	}
	function action_add(){
		 
		$case_id = $_GET['case_id'];
		//如果有值，就进入编辑状态
		if($case_id){
			$case_info = Model::factory('witkey_case')->setWhere('case_id = '.$case_id)->query();
			$case_info = $case_info[0];
			$file = pathinfo($case_info['case_img'], PATHINFO_BASENAME);
		}
		//var_dump($case_info);
		//加载模板
		require Keke_tpl::template('control/admin/tpl/article/case_add');
	}
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交，你懂的
		Keke::formcheck($_POST['formhash']);
		 
	    if(!empty($_FILES['fle_case_img']['name'])){
			//上传文件用的，这个对新手来说好使,要就是简单
			$case_img = keke_file_class::upload_file('fle_case_img');
		}
		//这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
		$array = array('case_title'=>$_POST['txt_task_title'],
				'case_price'=>$_POST['txt_case_price'],
				'case_img'=>$case_img,
				'obj_type' => $_POST['case_type']=='search'?'task':'service',
				'obj_id'=>$_POST['obj_id'],
				'on_time'=>time(),
		);
		//这是个隐藏字段，也就是主键的值，这个主键有值，就是要编辑(update)数据到数据库
		if($_POST['hdn_case_id']){
			Model::factory('witkey_case')->setData($array)->setWhere("case_id = '{$_POST['hdn_case_id']}'")->update();
			//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
			Keke::show_msg('系统提示','index.php/admin/article_case/add?case_id='.$_POST['hdn_case_id'],'提交成功','success');
		}else{
			//这也当然就是添加(insert)到数据库中
			Model::factory('witkey_case')->setData($array)->create();
			Keke::show_msg('系统提示','admin/article_case/add','提交成功','success');
		}
	}
	function action_del(){
		//删除单条,这里的case_id 是在模板上的请求连接中有的
		if($_GET['case_id']){
			$where = 'case_id = '.$_GET['case_id'];
			//删除多条,这里的条件统一为ids哟，亲
		}elseif($_GET['ids']){
			$where = 'case_id in ('.$_GET['ids'].')';
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_case')->setWhere($where)->del();
	}
	function action_search(){
		global $_K,$_lang;
		$model_type_arr  = Keke_global::get_task_type();
		/* Keke::$_page_obj->setAjax(1);
		Keke::$_page_obj->setAjaxDom('ajax_dom'); */
		$search_type = $_GET['search_type'];
		$search_id = $_GET['search_id'];
		$page_size = $_GET['page_size'];
		$fields = ' * ';
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/article_case/search";
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
			//要查询的字段,在模板中显示用的
			$query_fields = array('task_id'=>$_lang['id'],'task_title'=>$_lang['name'],'start_time'=>$_lang['time']);
			//默认排序字段，这里按时间降序
			$this->_default_ord_field = 'start_time';
			//这里要口水一下，get_url就是处理查询的条件
			extract($this->get_url($base_uri));
			//已经结束的任务
			$where .= ' and task_status = 8 ';
		    
			//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
			$data_info = Model::factory('witkey_task')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
			//列表数据
			$list_arr = $data_info['data'];
			//分页数据
			$pages = $data_info['pages'];
 
		 
		
		require Keke_tpl::template ( 'control/admin/tpl/article/case_search' );
	}
	
	function action_search_service(){
		global $_K,$_lang;
		//$model_type_arr  = Keke_global::get_task_type();
		/* Keke::$_page_obj->setAjax(1);
		 Keke::$_page_obj->setAjaxDom('ajax_dom'); */
		$search_type = $_GET['search_type'];
		$search_id = $_GET['search_id'];
		$page_size = $_GET['page_size'];
		$fields = ' * ';
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/article_case/search_service";
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
	 
		 
			//要查询的字段,在模板中显示用的
			$query_fields = array('service_id'=>$_lang['id'],'title'=>$_lang['name'],'on_time'=>$_lang['time']);
			//默认排序字段，这里按时间降序
			$this->_default_ord_field = 'on_time';
			//这里要口水一下，get_url就是处理查询的条件
			extract($this->get_url($base_uri));
			//已经结束的任务
			$where .= ' and service_status != 1 ';
				
			 
			//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
			$data_info = Model::factory('witkey_service')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
			//列表数据
			$list_arr = $data_info['data'];
			//分页数据
			$pages = $data_info['pages'];
		
		 
		
		require Keke_tpl::template ( 'control/admin/tpl/article/case_search' );
	}
}
