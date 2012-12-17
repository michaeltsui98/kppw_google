<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * 后台资讯分类管理控制层
 * @author Michael	
 * 2012-09-26
 */
class Control_admin_article_cate extends Control_admin {

	/**
	 * 文章分类列表
	 */
	function action_index($type='article') {
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `art_cat_id`,`art_cat_pid`,`cat_name`,`cat_type`,`listorder`,`on_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('art_cat_id'=>$_lang['id'],'cat_name'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		if($type=='help'){
			$ac = '/help';
		}else{
			$ac = '/index';
		}
		$base_uri = BASE_URL."/index.php/admin/article_cate";
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//判断是文章分类，还是帮助分类
		$where .= " and cat_type = '$type' ";
		$uri .= "&type=$type";
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_article_category')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']=500);
		//列表数据
		$list_arr = $data_info['data'];
		$pages = $data_info['pages'];
		
		$temp_arr = array();
    	Keke::get_tree($list_arr,$temp_arr,'cat',NULL,'art_cat_id','art_cat_pid','cat_name');
		$cate_tree_arr = $temp_arr;
		unset($temp_arr);
		
		
		$cate_index_arr = $this->get_cate_by_index ($type);

		require Keke_tpl::template('control/admin/tpl/article/cate');
	}
	/**
	 * 获取分类的索引数组
	 */
	function get_cate_by_index($type=NULL){
		if(!$type){
			$type = 'article';
		}
		$where = " cat_type = '$type'";
		$cate_arr = DB::select()->from('witkey_article_category')->where($where)->execute();
		$cate_index_arr = array();
		foreach ($cate_arr as $k=>$v){
			$cate_index_arr[$v['art_cat_pid']][$v['art_cat_id']] = $v;
		}
		return $cate_index_arr;
		
		
	}
	/**
	 * 帮助分类列表
	 */
	function action_help(){
		$this->action_index($type='help');
	}
	/**
	 * 分类添加
	 */
	function action_add(){
		//始始化全局变量，语言包变量
		global $_K,$_lang,$kekezu;
		$cate_id = $_GET['art_cat_id'];
		$type=$_GET['type'];
		if($type=='help'){
			$ac = '/help';
		}else{
			$ac = '/index';
		}
		//如果有值，就进入编辑状态
		if($cate_id){
			$cate_info = Model::factory('witkey_article_category')->setWhere('art_cat_id = '.$cate_id)->query();
			$cate_info = $cate_info[0];
		}
		
	    $cate_arr = Model::factory('witkey_article_category')->setWhere("cat_type='$type'")->query();
		$t_arr = array ();
		
		//如果有传传pid 否index 就是pid
		$index = $_GET['art_cat_pid']?$_GET['art_cat_pid']:$cate_info['art_cat_pid'];
		
 		Keke::get_tree ( $cate_arr, $t_arr, 'option', $index, 'art_cat_id', 'art_cat_pid', 'cat_name' );
		//加载模板
		require Keke_tpl::template('control/admin/tpl/article/cate_add');
	}
	/**
	 * 单分类保存
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交，你懂的
		Keke::formcheck($_POST['formhash']);
		$cat_type=$_POST['hdn_cat_type'];
		//这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
		$array = array('art_cat_pid'=>$_POST['slt_cat_id'],
				'cat_name'=>$_POST['txt_cat_name'],
				'cat_type'=>$cat_type,
				'listorder' => $_POST['txt_listorder'],
				'on_time'=>time(),
		);
		//这是个隐藏字段，也就是主键的值，这个主键有值，就是要编辑(update)数据到数据库
		if($_POST['hdn_art_cat_id']){
			Model::factory('witkey_article_category')->setData($array)->setWhere("art_cat_id = '{$_POST['hdn_art_cat_id']}'")->update();
			//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
			Keke::show_msg('提交成功','admin/article_cate/add?art_cat_id='.$_POST['hdn_art_cat_id'].'&type='.$cat_type,'success');
		}else{
			//这也当然就是添加(insert)到数据库中
			$cate_id = Model::factory('witkey_article_category')->setData($array)->create();
			//更新art_index
			//$this->update_art_index($cate_id);
			Keke::show_msg('提交成功','admin/article_cate/add?type='.$cat_type,'success');
		}
	}
	/**
	 * 批量保存分类信息
	 */
	function action_batch_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
			
		//行业名称数组,indus_id => indus_name
		$names = $_POST['names'];
		$orders = $_POST['orders'];
		$no = array();
		//合并要更新的名称与排序
		foreach ($names as $k=>$v){
			$no[$k] = array('name'=>$v,'order'=>$orders[$k]);
		}
		//要更新的数据插入到数据库
		foreach ($no as $k=>$v){
			$columns = array('cat_name','listorder');
			$values = array($v['name'],$v['order']);
			$where = "art_cat_id = '$k'";
			$res += DB::update('witkey_article_category')->set($columns)->value($values)->where($where)->execute();
		}
		//新增的行业排序
		$add_indus_name_listarr  = $_POST['add_indus_name_listarr'];
		//新增的行业名称
		$add_indus_name_arr = $_POST['add_indus_name_arr'];
		//合并新增的名称与排序
		$add_arr = array();
		if($add_indus_name_arr){
			foreach ($add_indus_name_arr as $k=>$v) {
				$t = array();
				foreach ($v as $i=>$j){
					$t[] = array('pid'=>$k,'name'=>$v[$i],'order'=>$add_indus_name_listarr[$k][$i]);
				}
				$add_arr[$k] = $t;
			}
		}
		//新增的数据插入到库
		if($add_arr){
			$columns = array('art_cat_pid','cat_name','listorder','cat_type');
			foreach ($add_arr as $k=>$v){
				foreach ($v as $v1){
					$values = array($v1['pid'],$v1['name'],$v1['order'],$_POST['type']);
					DB::insert('witkey_article_category')->set($columns)->value($values)->execute();
				}
			}
		}
		$type = $_POST['type'];
		if($type == 'help'){
			$uri = 'help';
		}
		Keke::show_msg($_lang['submit_success'],'admin/article_cate/'.$uri,'success');
	}
	/**
	 * 分类删除
	 */
	function action_del(){
		//删除单条,这里的case_id 是在模板上的请求连接中有的
		if($_GET['art_cat_id']){
			$art_cat_id = $_GET['art_cat_id'];
			$where = 'art_cat_id = '.$_GET['art_cat_id'];
			//删除多条,这里的条件统一为ids哟，亲
		}
		echo  Model::factory('witkey_article_category')->setWhere($where)->del();
		//如果父行业,则 删除父下的子行业。
		if($_GET['art_cat_pid']<=0){
			DB::delete('witkey_article_category')->where("art_cat_pid = $art_cat_id")->execute();
		}
	}
	 
}
 
 