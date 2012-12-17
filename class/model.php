<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );

/**
 * 模型操作的基类
 * 可以操作所有表映射类
 * @author michael
 * @version 2.1
 */

abstract class Model {
	public $_db;
	public $_tablename;
	public $_pk;
	public $_lifetime;
	public $_replace = 0;
	public static $_where = NULL;
	public static $_instance = null;
	
	public function __construct($table_name = null) {
		$this->_db = Database::instance ();
		$this->_tablename = '`' . DBNAME . '`.`' . TABLEPRE . $table_name . '`';
	}
	/**
	 *
	 * @param string $table_name
	 *        	表名 ,不需要加表前缀
	 *        	,表名为keke_witkey_link 可以写为wiktye_link
	 * @return Model
	 */
	public static function factory($table_name) {
		if (self::$_instance [$table_name] == null) {
			$class = TABLEPRE . $table_name;
			self::$_instance [$table_name] = new $class ();
		}
		
		return self::$_instance [$table_name];
	}
	/**
	 *设置条件
	 * @return Model
	 */
	abstract public function setWhere($where);
	
	/**
	 * 字段设值,只对添加，更新有效
	 * 
	 * @param $array 字段健值对数组        	
	 * @return Model
	 */
	abstract public function setData($array);
	/**
	 * 插入数据
	 */
	abstract public function create();
	/**
	 * 更新数据
	 */
	abstract public function update();
	/**
	 *
	 * @param string $fields
	 *        	查询字段，默认值为*
	 * @param int $cache_time
	 *        	null 表示默认缓存,0 表示不缓存，1，表示缓存1秒钟
	 * @param
	 *        	array
	 */
	abstract public function query($fields='*', $cache_time=0);
	/**
	 * 删除记录
	 */
	abstract public function del();
	/**
	 * 统计记录数
	 */
	abstract public function count();
	function reset() {
		self::$_where = NULL;
	}
/**
 * 获取网格数据
 * @param String $fields  字段
 * @param String  $wh   只支持字串
 * @param String $uri  跳转url
 * @param String $order  排序字串
 * @param int $page   当前页数
 * @param int $count 总页数，防止分时再次查询
 * @param Int $page_size  当前页的条数
 * @param string $ajax_dom  ajax div 标签 id 
 * @return array(data,pages)
 */
	function get_grid($fields ,$wh = '1=1', $uri=NULL, $order = null,$page=1, $count=NULL,$page_size = 10, $ajax_dom = null) {
		
		$page or $page = 1;
		$page_size or $page_size = 10;
		$page_obj = new Page();
		if ($ajax_dom) {
			$page_obj->setAjax ( '1' );
			$page_obj->setAjaxDom ( $ajax_dom );
		}
		if ( $wh ) {
			//字符条件
			$where = $wh;
		}else{
			$where = ' 1=1 ';
		}
		//统计表的总记录数,如果count有值不用再次查询，确保分页只有一次查询
		if(!$count){
			$this->setWhere($where);
			$count = $this->count();
		}
		if(!$uri){
			$uri = BASE_URL.'/'.Request::current()->url();
		}
		$pages = $page_obj->getPages ( $count, $page_size, $page, $uri );
		$where .= $order .= $pages ['where'];
		$this->setWhere ( $where );
		$res_info = array();
		$res_info ['data'] = $this->query($fields);
		$res_info ['pages'] = $pages;
		return $res_info;
	}
	/**
	 * 多表分页处理
	 * @param string $sql
	 * @param string $wh
	 * @param string $uri
	 * @param string $order
	 * @param int $page
	 * @param int $count
	 * @param int $page_size
	 * @param bool $ajax_dom
	 * @return multitype:NULL Ambigous <array(page,where), string>
	 */
	public static function sql_grid($sql ,$wh = '1=1', $uri=NULL, $order = null,$group_by = null,$page=1, $count=NULL,$page_size = 10, $ajax_dom = null) {
	
		$page or $page = 1;
		$page_size or $page_size = 10;
		$page_obj = new Page();
		if ($ajax_dom) {
			$page_obj->setAjax ( '1' );
			$page_obj->setAjaxDom ( $ajax_dom );
		}
		$where = ' where ';
		if ( $wh ) {
			//字符条件
			$where .= $wh;
		}else{
			$where .= ' 1=1 ';
		}
		//统计表的总记录数,如果count有值不用再次查询，确保分页只有一次查询
		if(!$count){
			$res = Database::instance()->query($sql.$where.' '.$group_by);
			$count = sizeof($res);
		}
		if(!$uri){
			$uri = BASE_URL.'/'.Request::current()->url();
		}
		$pages = $page_obj->getPages ( $count, $page_size, $page, $uri );
		$where .= ' '.$group_by .= $order  .= $pages ['where'];
		
		$res_info = array();
		
		$res_info ['data'] = DB::query($sql.$where)->execute();
		$res_info ['pages'] = $pages;
		return $res_info;
	}
	/**
	 * 过滤掉NULL值
	 * @param Sting $v
	 * @return boolean
	 */
	public static function remove_null($v){
		if(is_null($v)){
			return FALSE;
		}
		return TRUE;
	}
}
