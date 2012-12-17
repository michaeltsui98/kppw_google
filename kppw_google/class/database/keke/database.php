<?php
abstract class Keke_database {
	const SELECT = 1;
	const INSERT = 2;
	const UPDATE = 3;
	const DELETE = 4;
	public static $default = 'mysql';
	public static $instances = array ();
	/**
	 *
	 * @param $name string
	 *       	 mysql,mysqli,sqlite ...
	 * @param $config array       	
	 * @return Keke_driver_mysql
	 */
	public static function instance($name = null, $config = null) {
		if ($name === null) {
			$name = Database::$default;
		}
		if (isset ( Database::$instances [$name] )) {
			return Database::$instances [$name];
		}
		$class = "Keke_driver_{$name}";
		//Keke::keke_require_once ( S_ROOT . 'base' . DIRECTORY_SEPARATOR . 'db_factory' . DIRECTORY_SEPARATOR . $class . '.php' );
		Database::$instances [$name] = new $class ( $config );
		return Database::$instances [$name];
	}
	/**
	 * 执行插入
	 *
	 * @param $tablename string
	 *       	 表名
	 * @param $insertsqlarr array
	 *       	 字段数组
	 * @param $returnid bool
	 *       	 返回 last_insert_id
	 * @param $replace bool
	 *       	 是否替换
	 * @return int last_insert_id or 影响的行数
	 */
	abstract public function insert($tablename, $insertsqlarr, $returnid = 0, $replace = false);
	/**
	 * 执行更新
	 *
	 * @param $tablename string       	
	 * @param $setsqlarr array       	
	 * @param $wheresqlarr array       	
	 * @return int 影响的行数
	 */
	abstract public function update($tablename, $setsqlarr, $wheresqlarr);
	/**
	 * 执行SQL语句
	 *
	 * @param $sql string       	
	 * @return int 影响的行数
	 */
	abstract public function execute($sql);
	/**
	 * sql查询的条数
	 */
	abstract public function get_query_num();
	/**
	 * 按字段执行sql
	 *
	 * @param $fileds string
	 *       	 字段
	 * @param $table string
	 *       	 表名
	 * @param $where string
	 *       	 条件
	 * @param $order string
	 *       	 排序
	 * @param $group string
	 *       	 分组
	 * @param $limit string
	 *       	 限制
	 * @param $pk string
	 *       	 键值对排序
	 * @return array
	 */
	abstract public function select($fileds = '*', $table = null, $where = '', $order = '', $group = '', $limit = '', $pk = '');
	/**
	 * 获取一个字段的值
	 *
	 * @param $sql string       	
	 * @param $row int
	 *       	 第几行
	 * @param $filed string
	 *       	 字段名称
	 */
	abstract public function get_count($sql, $row = 0, $filed = null);
	/**
	 * 获取一行数据
	 *
	 * @param $sql string       	
	 * @return array
	 */
	abstract public function get_one_row($sql);
	/**
	 * 查询Sql
	 *
	 * @param $sql string       	
	 * @param $is_unbuffer boolene       	
	 * @return array
	 */
	abstract public function query($sql, $type = Database::SELECT, $is_unbuffer = 0);
	/**
	 * 事务开始
	 */
	abstract public function begin();
	/**
	 * 事务提交
	 */
	abstract public function commit();
	/**
	 * 事务回滚
	 */
	abstract public function rollback();
	
	protected $_instance;
	protected $_config;
	protected function __construct($name, array $config) {
		$this->_instance = $name;
		$this->_config = $config;
		Database::$instances [$name] = $this;
	}
	
	final public function __destruct() {
		$this->disconnect ();
	}
	final public function disconnect() {
		unset ( Database::$instances [$this->_instance] );
		return true;
	}
	public function quote_field(&$value) {
		if ('*' == $value || false !== strpos ( $value, '(' ) || false !== strpos ( $value, '.' ) || false !== strpos ( $value, '`' )) {
		
		} else {
			$value = '`' . trim ( $value ) . '`';
		}
		return $value;
	}
	public function quote_string(&$value) {
		if ($value === NULL) {
			return 'NULL';
		} elseif ($value === TRUE) {
			return "'1'";
		} elseif ($value === FALSE) {
			return "'0'";
		}elseif (is_string($value)) {
			return sprintf("'%s'",$value);
		}  elseif (is_array ( $value )) {
			return  implode ( ', ', array_map (array($this,__FUNCTION__), $value ) ) ;
		} elseif (is_int ( $value )) {
			return ( int ) $value;
		} elseif (is_float ( $value )) {
			return sprintf ( '%F', $value );
		}
		
		return $this->escape ( $value );
	}
	abstract public function escape($value);

}
