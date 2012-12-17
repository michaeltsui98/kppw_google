<?php defined('IN_KEKE') OR die('access on priv!');

/**
 * @example 基于OO的数据库查询方法
 * 
 * @author Administrator
 *
 */

class Keke_db_select extends Keke_db_query {
	
	protected $_query_list = array ();
	protected $_lifetime;
	protected $_cached_id;
	
	public function __construct($fields){
		if($fields===NULL){
			$fields = '*';
		}
		$this->select($fields);
	}
	public function select($fields) {
		$field = "";
		if ($fields !== '*' and $field = explode ( ',', $fields )) {
			$db = Database::instance();
			array_walk ( $field, array($db,'quote_field') );
			$fields = implode ( ',', $field );
		}
		$this->_query_list ['fields'] = $fields;
		return $this;
	}
	/**
	 * 
	 * @param bool $value
	 */
	public function distinct($value) {
		$this->_query_list ['distinct'] = ( bool ) $value;
		return $this;
	}
	
	public function from($table) {
		$this->_query_list ['table'] = '`' . TABLEPRE . $table . '`';
		return $this;
	}
	
	public function where($where) {
		$this->_query_list ['where'] = $where;
		return $this;
	}
	
	public function order($order) {
		$this->_query_list ['order'] = $order;
		return $this;
	}
	
	public function limit($offset, $length) {
		if (! isset ( $length )) {
			$length = $offset;
			$offset = 0;
		}
		$this->_query_list ['limit'] = ' limit ' . $offset . ',' . $length;
		return $this;
	}
	
	public function join($join) {
		$this->_query_list ['join'] = $join;
		return $this;
	}
	public function on($c1, $op, $c2) {
		$this->_query_list ['on'] = ' on '. $c1 . $op . $c2;
		return $this;
	}
	public function group($group) {
		$this->_query_list ['group'] = $group;
		return $this;
	}
	public function having($having) {
		$this->_query_list ['having'] = $having;
		return $this;
	}

	public function cached($lifetime = NULL, $cached_id = NULL) {
		if ($lifetime === NULL) {
			// 默认缓存时间
			$lifetime = Cache::DEFAULT_CACHE_LIFE_TIME;
		}
		if($cached_id !== NULL){
			$this->_cached_id = $cached_id;
		}
		$this->_lifetime = $lifetime;
		return $this;
	}
	
	/**
	 * Compile the SQL query and return it.
	 *
	 * @param
	 *       	 object Database instance
	 * @return string
	 */
	public function execute($db='mysql') {
		
		// Start a selection query
		$query = 'SELECT ';
		
		if ($this->_query_list ['distinct'] === TRUE) {
			$query .= 'DISTINCT ';
		}
		
		if ( isset( $this->_query_list ['fields'] )) {
	 		$query .= $this->_query_list ['fields'];
		}
		if (isset ( $this->_query_list ['table'])) {
			// Set tables to select from
			$query .= ' FROM ' . $this->_query_list ['table'];
		}
		
		if (isset( $this->_query_list['join'] )) {
			// Add tables to join
			$query .=  $this->_query_list['join'] ;
		}
		if(isset($this->_query_list['on'])){
			$query .= $this->_query_list['on'];
		}
		
		if (isset($this->_query_list['where'])) {
			$query .= ' WHERE ' . $this->_query_list['where'];
		}
		
		if (isset($this->_query_list['group'])){
			$query .= ' GROUP BY ' . $this->_query_list ['group'];
		}
		IF(isset($this->_query_list['having'])){
			$query .= ' HAVING ' . $this->_query_list ['having'];
		}
		if(isset($this->_query_list['order'])){
			$query .= ' ORDER BY ' . $this->_query_list['order'];
		}
		
		if(isset($this->_query_list['limit'])){
			$query .=  $this->_query_list['limit'];
		}
		$this->_sql = $query;
		$db = Database::instance($db);
		$sql = $this->compile($db);
		return  $this->cache_data($sql,$db);
	}
	
	public function reset() {
		$this->_query_list = array();
		$this->_lifetime = null;
		$this->_parameters= null; 
		return $this;
	}
	/**
	 * 缓存查询结果，缓存方式为系统默认配置,见config.inc.php
	 * @param string $sql  sql语句
	 * @param string $db   mysql,mysqli...,默认为空
	 * @param string $default 结果为空的默认值
	 * @param string $key  缓存的ID
	 * @return unknown|Ambigous <number, multitype:multitype: >
	 */
	public function cache_data($sql,$db=null, $default = 'null') {
		if (! is_object ( $db )) {
			$db = Database::instance ( $db );
		}
		if($this->_cached_id === NULL){
			$key = Cache::instance ()->generate_id ( $sql)->get_id();
		}else{
			$key = $this->_cached_id;
		}
		if ($this->_lifetime > 0 and $datalist = Cache::instance ()->get ( $key )) {
			return $datalist;
		} elseif ($this->_lifetime <= 0) {
			Cache::instance ()->del ( $key );
		}
		 
		$query = $this->_query_type;
	 
		$datalist = $data =  $db->$query($sql,Database::SELECT);
		if(isset($key) and $this->_lifetime>0){
			empty ( $data ) and $data = $default;
			Cache::instance()->set($key,$data,$this->_lifetime);
		}
		return $datalist;
	}

}

 
 