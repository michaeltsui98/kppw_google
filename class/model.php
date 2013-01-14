<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );

/**
 * 模型操作的基类
 * 可以操作所有表映射类
 * @author michael
 * @version 3.0
 */

abstract class Model {
	public $_db;
	public $_tablename;
	public $_replace = 0;
	public static $pk = NULL;
	public static $pk_val = NULL;
	public static $_data = array ();
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
	//abstract public function setWhere($where);
	public function setWhere($value) {
		self::$_where = $value;
		return $this;
	}
	
	public function getWhere() {
		return self::$_where;
	}
	
	/**
	 * 字段设值,只对添加，更新有效
	 * 
	 * @param $array 字段健值对数组        	
	 * @return Model
	 */
	//abstract public function setData($array);
	
	public function setData($array) {
		self::$_data = array_filter ( $array, array (
				'Model',
				'remove_null'
		) );
		return $this;
	}
	/**
	 * 插入数据
	 */
	function create($return_last_id = 1) {
		$res = $this->_db->insert ( $this->_tablename, self::$_data, $return_last_id, $this->_replace );
		$this->reset ();
		return $res;
	}
	/**
	 * 更新数据
	 */
	 
	function update() {
		if ($this->getWhere ()) {
			$res = $this->_db->update ( $this->_tablename, self::$_data, $this->getWhere () );
		} elseif (isset ( self::$pk_val )) {
			self::$_where = array (
					self::$pk => self::$pk_val
			);
				
			$res = $this->_db->update ( $this->_tablename, self::$_data, $this->getWhere () );
		}
		$this->reset ();
		return $res;
	}
	/**
	 *
	 * @param string $fields
	 *        	查询字段，默认值为*
	 * @param int $cache_time
	 *        	null 表示默认缓存,0 表示不缓存，1，表示缓存1秒钟
	 * @param
	 *        	array
	 */
	 
	function query($fields = '*', $cache_time = 0) {
		empty ( $fields ) and $fields = '*';
		if ($this->getWhere ()) {
			$sql = "select $fields from $this->_tablename where " . $this->getWhere ();
		} else {
			$sql = "select $fields from $this->_tablename";
		}
		empty ( $fields ) and $fields = '*';
		$this->reset ();
		//DB::query($sql)->cached()->execute();
		return $this->_db->cached ( $cache_time )->cache_data ( $sql );
	}
	/**
	 * 删除记录
	 */
	
	function del() {
		if ($this->getWhere ()) {
			$sql = "delete from $this->_tablename where " . $this->getWhere ();
		} else if(isset(self::$pk_val)){
			$sql = "delete from $this->_tablename where ".self::$pk." = ".self::$pk_val;
		}
		$this->reset ();
		if($sql){
			return $this->_db->query ( $sql, Database::DELETE );
		}
		return 0;
	}
	/**
	 * 统计记录数
	 */
	function count() {
		if ($this->getWhere ()) {
			$sql = "select count(*) as count from $this->_tablename where " . $this->getWhere ();
		} else {
			$sql = "select count(*) as count from $this->_tablename";
		}
		$this->reset ();
		return $this->_db->get_count ( $sql );
	}
	
	function reset() {
		self::$_where = NULL;
	}
	
	
	
	
/**
 * 获取网格数据
 * @param String $fields  字段  必须
 * @param String  $wh   只支持字串 必须
 * @param String $uri  跳转url 必须
 * @param String $order  排序字串 必须
 * @param int $page   当前页数 可选
 * @param Int $page_size  当前页的条数  可选
 * @param string $ajax_dom  ajax div 标签 id  可选 
 * @return array(data,pages)
 */
	function get_grid($fields ,$wh = '1=1', $uri=NULL, $order = null,$page=1, $page_size = 10, $ajax_dom = null) {
		
		//$page or $page = 1;
		//$page_size or $page_size = 10;
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
		}else{
			$page = 1;
		}
		if(isset($_GET['page_size'])){
			$page_size = (int)$_GET['page_size'];
		}else{
			$page_size = 10;
		}
		
		
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
		if(isset($_GET['count'])){
			$count = (int)$_GET['count'];
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
	 * @param string $sql  必须
	 * @param string $wh 必须
	 * @param string $uri 必须
	 * @param string $order 必须
	 * @param string $group_by 可选
	 * @param int $page 可选
	 * @param int $page_size 可选
	 * @param bool $ajax_dom 可选
	 * @return array(data,pages)
	 */
	public static function sql_grid($sql ,$wh = '1=1', $uri=NULL, $order = null,$group_by = null,$page=1, $page_size = 10, $ajax_dom = null) {
	
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
		}else{
			$page = 1;
		}
		if(isset($_GET['page_size'])){
			$page_size = (int)$_GET['page_size'];
		}else{
			$page_size = 10;
		}
		
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
		if(isset($_GET['count'])){
			$count = $_GET['count'];
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
