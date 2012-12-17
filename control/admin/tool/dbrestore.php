<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 数据库恢复
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-20下午13:25:13
 */
class Control_admin_tool_dbrestore extends Control_admin{
	private $_sql_path ;
	private $_file_arr;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		//sql文件的存放路径
		$this->_sql_path = S_ROOT . 'data/backup/';
		//获取backup目录下的文件列表
		$this->_file_arr = keke_file_class::get_dir_file_info ( $this->_sql_path );
	}
	function action_index(){
		global $_K, $_lang;
		
		//加载模板
		require Keke_tpl::template('control/admin/tpl/tool/dbrestore');
	}
	/**
	 * 还原数据库动作
	 */
	function action_restore(){
		global  $_lang;
		if($_GET['restore_name']){
			
			//要还原的数据文件
			$file_path = $this->_sql_path.$this->_file_arr[$_GET['restore_name']]['name'];
			//还原指定的数据库文件
			$res = $this->restore($file_path);
			if ($res) {
				//还原数据库库成功系统日志
				Keke::admin_system_log ( $_lang['restore_database_operate_success'] . $this->_file_arr[$_GET['restore_name']]['name'] );
				//返加json代码	
				Keke::echojson ( $_lang['database_restore_success'], 1 );
			} else {
				//还原失败的系统日志
				Keke::admin_system_log ( $_lang['restore_database_operate_fail'] );
				//返回json
				Keke::echojson ( $_lang['database_restore_fail'], 0 );
			}
		}
	}
	
	function action_del(){
		global  $_lang;
		//获取backup目录下的文件列表
		$file_arr = keke_file_class::get_dir_file_info ( $this->_sql_path );
		//删除sql备份文件
		$res = @unlink ($this->_sql_path.$file_arr[$_GET['restore_name']]['name']);
		if ($res) {
			Keke::admin_system_log ( $_lang['delete_database_backup_file'] . $file_arr[$_GET['restore_name']]['name'] );
			echo 1;
		} else {
			Keke::show_msg($_lang['delete_database_backup_file_fail'],'admin/tool_dbrestore','warning');
			echo 0;
			
		}
	}
	/**
	 * 执行指定的sql文件，一般用于数据库文件还原
	 * @param String $file_path
	 * @return boolean
	 */
	function restore($file_path){
		set_time_limit ( 0 );
		$file_sql = file_get_contents ( $file_path );
		$file_sql = htmlspecialchars_decode ( $file_sql );
		//将回车与换行改成换行
		$sql = str_replace ( "\r\n", "\n", $file_sql );
		$ret = array ();
		$num = 0;
		//将sql文件分解，放到$res 数组
		foreach ( explode ( ";\n#####", trim ( $sql ) ) as $query ) {
			$ret [$num] = '';
			$queries = explode ( "\n", trim ( $query ) );
			foreach ( $queries as $query ) {
				$ret [$num] .= (isset ( $query [0] ) && $query [0] == '#') || (isset ( $query [1] ) && isset ( $query [1] ) && $query [0] . $query [1] == '--') ? '' : $query;
			}
			$num ++;
		}
		//循环执行sql文件
		foreach ( $ret as $vvv ) {
			empty ( $vvv ) or $res .= Dbfactory::execute ( $vvv );
		}
		//返回执行的结果
		return (bool)$res;
	}
}