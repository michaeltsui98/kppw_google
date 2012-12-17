<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 附件管理
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-19早上0:54:00
 */

class Control_admin_tool_file extends Control_admin{
	
	function action_index(){
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
		
		//要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `file_id`,`obj_type`,`obj_id`,`task_id`,`work_id`,`file_name`,`save_name`,`on_time` ';
		//要查询的字段,在模板中显示用的
		$query_fields = array('file_id'=>$_lang['id'],'file_name'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//tool本来是一个目录，由于没有定义tool为目录的路由,所以这个控制层的文件来too_file So这里不能写为tool/file
		$base_uri = BASE_URL."/index.php/admin/tool_file";
		
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'/add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_file')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		$file_type_arr = keke_global_class::get_file_type();
		require Keke_tpl::template('control/admin/tpl/tool/file');
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
		//删除单条,这里的file_id 是在模板上的请求连接中有的
		if($_GET['file_id']){
			$where = 'file_id = '.$_GET['file_id'];
			//删除多条,这里的条件统一为ids哟，亲
		}elseif($_GET['ids']){
			$where = 'file_id in ('.$_GET['ids'].')';
		}
		//要删除的文件信息
		$files_info = $this->get_file_info($where);
		//文件路径
		$file_path = S_ROOT . 'data/uploads/';
		//不管是一个文件还是多个，循环删除，搞掂它
		foreach ($files_info as $v){
			if(is_file($file_path.$v['save_name'])){
				//文件存在，就删除
				unlink($file_path.$v['save_name']);
			}
		}
		//输出执行删除后的影响行数，模板上的js 根据这个值来判断是否移聊tr标签到
		//注释中不能打单引，否则去注释的工具失效,蛋痛的工具啊!
		echo  Model::factory('witkey_file')->setWhere($where)->del();
	}
	/**
	 * 这个类没有要编辑与添加的业务，故action_add没有实现
	 */
	/**
	 * 获取指定条件的文件信息
	 * @param String $where Sql 中的where
	 */
	function get_file_info($where){
		return DB::select('save_name')->from('witkey_file')->where($where)->execute();
	}
}//end