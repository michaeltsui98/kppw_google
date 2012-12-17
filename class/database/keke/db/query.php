<?php  defined('IN_KEKE') OR die('access on priv!');
class Keke_db_query {
	// Query type
	protected $_type;
	protected $_where;
	// Execute the query during a cache hit
	protected $_force_execute = FALSE;
	
	// Cache lifetime
	protected $_lifetime = NULL;
	
	// SQL statement
	protected $_sql;
	
	// Quoted query parameters
	protected $_parameters = array ();
	
	// Return results as associative arrays or objects
	protected $_as_object = FALSE;
	
	// Parameters for __construct when using object results
	protected $_object_params = array ();
	//表前缀
	protected $_tablepre = array();
	/**
	 *
	 * @var 查询方式 (query,get_count,get_one_row);
	 */
	protected $_query_type = 'query';
	
	/**
	 * Creates a new SQL query of the specified type.
	 *
	 * @param   integer  query type: Database::SELECT, Database::INSERT, etc
	 * @param   string   query string
	 * @return  void
	 */
	public function __construct($sql, $type) {
		if($type===null){
			$type = Database::SELECT;
		}
		$this->_type = $type;
		$this->_sql = $sql;
	}
	final public function __toString() {
		try {
			// 返回sql字符串
			return $this->compile ( Database::instance () );
		} catch ( Exception $e ) {
			return Keke_exception::text ( $e );
		}
	}
	/**
	 * 返回查询类型
	 */
	public function type() {
		return $this->_type;
	}
	/**
	 * Enables the query to be cached for a specified amount of time.
	 * 开启查询缓存,并定义缓存的生命周期
	 * 
	 * @param  int lifetime 缓存的时间秒数，0 删除对应的缓存
	 * @param  boolean 是否开启缓存命中查询
	 * @return keke_db_query
	 */
	public function cached($lifetime = NULL, $force = FALSE) {
		if ($lifetime === NULL) {
			// 默认缓存时间
			$lifetime = Cache::DEFAULT_CACHE_LIFE_TIME;
		}
		$this->_force_execute = $force;
		$this->_lifetime = $lifetime;
		
		return $this;
	}
	/**
	 * 返第一行的值
	 * @example select id,name from table 返回的值为array('id'=>'xxx',name=>'xxxx');
	 * @return Keke_db_select
	 */
	public function get_one(){
		$this->_query_type = 'get_one_row';
		return $this;
	}
	/**
	 * 返回指定字段的值,一般用在一个字段的查询
	 * @example select count(*) from ... 返回一count 的值 '222'
	 * @return Keke_db_select
	 */
	public function get_count(){
		$this->_query_type = 'get_count';
		return $this;
	
	}
	/**
	 * 返回关联数组结果
	 * @return keke_db_query
	 */
	public function as_assoc() {
		$this->_as_object = FALSE;
		$this->_object_params = array ();
		return $this;
	}
	/**
	 * 设置条件
	 * @param string $where
	 * @return Keke_db_query
	 */
	public function where($where){
		if($where){
			$this->_where = $where;
		}
		return $this;
	}
	/**
	 * 将结果作为对象返回
	 * @param string $class 类名 TRUE for 基类
	 * @param $params 对象参数     	
	 * @return keke_db_query
	 */
	public function as_object($class = TRUE, array $params = NULL) {
		$this->_as_object = $class;
		if ($params) {
			// 添加对象的参数
			$this->_object_params = $params;
		}
		
		return $this;
	}
	
	/**
	 * 设置查询参数的值
	 * @param  string $param key to replace
	 * @param  string $value to use
	 * @return keke_db_query
	 */
	public function param($param, $value) {
		// Add or overload a new parameter
		$this->_parameters [$param] = $value;
		
		return $this;
	}
	
	/**
	 * 绑定变量的查询参数
	 *
	 * @param string $param key to replace
	 * @param string $var variable to use
	 * @return keke_db_query
	 */
	public function bind($param, & $var) {
		// 组绑定的变量赋值
		$this->_parameters [$param] = & $var;
		
		return $this;
	}
	
	/**
	 * 添加多个查询的参数
	 * @param  array $params list of parameters
	 * @return keke_db_query
	 */
	public function parameters(array $params) {
		// 合并参数
		$this->_parameters = $params + $this->_parameters;
		
		return $this;
	}
	/**
	 * 表前缀定义，不需要加单引
	 * @param string $param (:pre)
	 * @param $value (表前缀)
	 */
	public function tablepre($param,$value=TABLEPRE){
		$this->_tablepre[$param] = $value;
		return $this;
	}
	/**
	 * 编译SQL查询，并返回它。替换绑定的参数。
	 * @param  object database instance
	 * @return string
	 */
	public function compile($db) {
		// 导入本地的sql
		$sql = $this->_sql;
		if (! empty ( $this->_parameters )) {
			// 转义处理sql 中的值
			$values = array_map ( array ($db, 'quote_string' ), $this->_parameters );
			// 替换sql中的值
			$sql = strtr ( $sql, $values );
		}
		if(!empty($this->_tablepre)){
			$sql = strtr($sql, $this->_tablepre);
		}
		
		return $sql;
	}
	
	/**
	 * 执行当前的查询
	 *
	 * @param  $db 数据库对象
	 *       	 
	 * @param  string result object classname, TRUE for stdClass or FALSE for array
	 * @param	array result object constructor arguments
	 *       	
	 * @return object keke_db_query for SELECT queries
	 * @return mixed the insert id for INSERT queries
	 * @return integer number of affected rows for all other queries
	 */
	public function execute($db = NULL) {
		if (! is_object ( $db )) {
			// Get the database instance
			$db = Database::instance ( $db );
		}
		
		// 生成sql语句
		$sql = $this->compile ( $db );
		
		
		if ($this->_lifetime !== NULL and $this->_type === Database::SELECT) {
			// 使用数据库实例与sql作为缓存的键名
			$cache_key = Cache::instance()->generate_id( $sql)->get_id();
			//先读取缓存再去删除lifetime<=0 的缓存
			$result =  Cache::instance()->get($cache_key);
			if($result){
				return $result;
			}
		}
		// Execute the query
		$query = $this->_query_type;
		$result = $db->$query( $sql,$this->_type );
		
		if (isset ( $cache_key ) and $this->_lifetime > 0 and $this->_type === Database::SELECT) {
			// Cache the result array
			Cache::instance()->set($cache_key, $result, $this->_lifetime );
		}
		
		return $result;
	}

}
