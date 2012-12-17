<?php
	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2011-9-2
*/
class Control_admin_tool_feed extends Control_admin{
	function action_index(){
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `feed_id`,`title`,`feedtype`,`username`,`feed_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('feed_id'=>$_lang['id'],'username'=>$_lang['name'],'feed_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//tool本来是一个目录，由于没有定义man为目录的路由,所以这个控制层的文件来tool_feed So这里不能写为tool/feed
		$base_uri = BASE_URL."/index.php/admin/tool_feed";
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'feed_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_feed')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		
		//分页数据
		$pages = $data_info['pages'];
		//$file_type_arr = Keke_global::get_file_type();
		$feed_type = Keke_global::get_feed_type ();
		require Keke_tpl::template('control/admin/tpl/tool/feed');
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
		//删除单条,这里的feed_id 是在模板上的请求连接中有的
		if($_GET['feed_id']){
			$where = 'feed_id = '.$_GET['feed_id'];
			//删除多条,这里的条件统一为ids哟，亲
		}elseif($_GET['ids']){
			$where = 'feed_id in ('.$_GET['ids'].')';
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_feed')->setWhere($where)->del();
	}
}
