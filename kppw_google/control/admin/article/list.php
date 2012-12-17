<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * 后台资讯管理控制层
 * @author Michael
 * 2012-09-26
 */

class Control_admin_article_list extends Control_admin {
 
	function action_index($type=null) {
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `art_id`,`art_cat_id`,`username`,`art_title`,`cat_type`,`listorder`,`is_show`,`is_delineas`,`is_recommend`,`art_pic`,`pub_time`,`views` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('art_id'=>$_lang['id'],'art_title'=>$_lang['name'],'pub_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/article_list";
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'pub_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//查指定类型的文章
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}elseif(!isset($type)){
			$type = 'article';
		}
		$where .= " and  cat_type = '$type' ";
		$uri .= "&type=$type";
		
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_article')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
        //分类数组
		$art_cat_arr  = Model::factory('witkey_article_category')->query('*',66666);
		//生成键值班数组
		$art_cat_arr = Keke::get_arr_by_key($art_cat_arr,'art_cat_id');
		//$sql_list = Database::instance()->get_query_list();
		//var_dump($sql_list);
		
		
		
		require Keke_tpl::template('control/admin/tpl/article/list');
	}
	
	function action_bulletin(){
		$this->action_index('bulletin');
	}
	function action_about(){
		$this->action_index('about');
	}
	function action_help(){
		$this->action_index('help');
	}
	function action_add(){
		//始始化全局变量，语言包变量
		global $_K,$_lang;
		$type = $_GET['type'];
		$art_id = $_GET['art_id'];
		//如果有值，就进入编辑状态
		if($art_id){
			$art_info = Model::factory('witkey_article')->setWhere('art_id = '.$art_id)->query();
			$art_info = $art_info[0];
		}
		if($type == 'article' or $type =='help'){
			$cat_arr = $this->get_cate($type, $art_info['art_cat_id']);
		}
		//var_dump($case_info);
		//加载模板
		require Keke_tpl::template('control/admin/tpl/article/add');
	}
	/**
	 * 获取指定类型的分类
	 * @param Sting $type  article,help ... 
	 * @param Sting $index  select ->option 的索引
	 * @return array 下拉表列的数组
	 */
	function get_cate($type,$index){
	    $cate_arr = Model::factory('witkey_article_category')->setWhere("cat_type='$type'")->query();
		$t_arr = array ();
 		Keke::get_tree ( $cate_arr, $t_arr, 'option', $index, 'art_cat_id', 'art_cat_pid', 'cat_name' );
	    return $t_arr; 
	}
	/**
	 * ajax删除文章图片
	 */
	static function action_del_img(){
		//如果pk有值，则删除文件表中的art_pic
		if($_GET['pk']){
			Dbfactory::execute(" update ".TABLEPRE."witkey_article set art_pic ='' where art_id = ".intval($_GET['pk']));
		}
		//没有fid就查下fid,没有fid不能删除文件,出于安全考量
		if(!intval($_GET['fid'])){
			$fid = Dbfactory::get_count(" select file_id from ".TABLEPRE."witkey_file where save_name = '.{$_GET['filepath']}.'");
		}else{
			$fid = $_GET['fid'];
		}
		//删除文件
		keke_file_class::del_att_file($fid, $_GET['filepath']);
		Keke::echojson ( '', '1' );
	}
	/**
	 * 保存文章
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交，你懂的
		Keke::formcheck($_POST['formhash']);
		$type = $_POST['type'];
		//这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
		$array = array('art_title'=>$_POST['txt_art_title'],
					'art_cat_id'=>$_POST['slt_cat_id'],
					'art_pic'=>$_POST['hdn_art_pic'],
					'content' => $_POST['txt_content'],
				 	'seo_title'=>$_POST['txt_seo_title'],
					'seo_keyword'=>$_POST['txt_seo_keyword'],
					'seo_desc'=>$_POST['txt_seo_desc'],
					'username'=>$_POST['txt_username'],
					'art_source'=>$_POST['txt_art_source'],
					'listorder'=>$_POST['txt_listorder'],
					'is_recommend'=>$_POST['ckb_is_recommend']=='on'?1:0,
					'cat_type'=>$type,
					'pub_time'=>time(),
		);
     
		//这是个隐藏字段，也就是主键的值，这个主键有值，就是要编辑(update)数据到数据库
		if($_POST['hdn_art_id']){
			Model::factory('witkey_article')->setData($array)->setWhere("art_id = '{$_POST['hdn_art_id']}'")->update();
			//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
			Keke::show_msg('系统提示','admin/article_list/add?art_id='.$_POST['hdn_art_id'].'&type='.$type,'提交成功','success');
		}else{
			//这也当然就是添加(insert)到数据库中
			Model::factory('witkey_article')->setData($array)->create();
			Keke::show_msg('系统提示','admin/article_list/add?type='.$type,'提交成功','success');
		}
	}
	
	function action_del(){
		//删除单条,这里的case_id 是在模板上的请求连接中有的
		if($_GET['art_id']){
			$where = 'art_id = '.$_GET['art_id'];
			//删除多条,这里的条件统一为ids哟，亲
		}elseif($_GET['ids']){
			$where = 'art_id in ('.$_GET['ids'].')';
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_article')->setWhere($where)->del();
	}
	 
}//end