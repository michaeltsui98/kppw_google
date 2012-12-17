<?php
/*
 * mysql 数据库连接类 kekezu
 */

final class Keke_driver_mysql extends Keke_database {
	
	private $_dbhost;
	private $_dbname;
	private $_dbuser;
	private $_dbpass;
	private $_dbcharset;
	private $_link;
	private $_lifetime;
	private $_last_query_id = null;
	private $_return_insert_id = FALSE;
	private $_query_num = 0;
	//private $_query_sql = array ();
	private static  $_query_list = array ();
	
	function __construct($config = array()) {
		if (empty ( $config )) {
			$this->_dbhost = DBHOST;
			$this->_dbname = DBNAME;
			$this->_dbuser = DBUSER;
			$this->_dbpass = DBPASS;
			$this->_dbcharset = DBCHARSET;
		} else {
			$this->_dbhost = $config ['dbhost'];
			$this->_dbname = $config ['dbname'];
			$this->_dbuser = $config ['dbuser'];
			$this->_dbpass = $config ['dbpass'];
			$this->_dbcharset = $config ['dbcharset'];
		}
	}
	/**
	 * 数据库连接
	 *
	 * @return resource
	 */
	public function dbconnection() {
		if (! $this->_link = mysql_connect ( $this->_dbhost, $this->_dbuser, $this->_dbpass, 1 )) {
			exit ( 'connect mysql server fail!' );
		}
		if ($this->version () > '4.1') {
			$this->_dbcharset and $serverset = "character_set_connection={$this->_dbcharset}, character_set_results={$this->_dbcharset}, character_set_client=binary";
			$this->version () > '5.0.1' and $serverset .= ((empty ( $serverset ) ? '' : ',') . 'sql_mode=\'\'');
			$serverset and mysql_query ( "SET $serverset", $this->_link );
		}
		mysql_select_db ( $this->_dbname, $this->_link ) or $this->halt ( 'select database:' . $this->_dbname . ' fail!' );
		return $this->_link;
	}
	/**
	 * 查询结果返回一个数组
	 *
	 * @param $sql string       	
	 *
	 * @example type=select 返回array
	 * @example type=insert 返回array(insert_id,affected_rows)
	 * @example type=update or delete 返回 int affected_rows;
	 */
	public function query($sql, $type = Database::SELECT, $is_unbuffer = 0) {
		$this->execute ( $sql, $is_unbuffer );
		if ($type === Database::SELECT) {
			$result = array ();
			while ( ($rs = $this->fetch_array ()) != false ) {
				$result [] = $rs;
			}
		} elseif ($type === Database::INSERT ) {
			$result = mysql_insert_id ( $this->_link );
		} else {
			$result = mysql_affected_rows ( $this->_link );
		}
		$this->free_result ();
		return $result;
	}
	/**
	 * 查询结果中某行某字段的值
	 *
	 * @param $query string       	
	 * @param $row int       	
	 * @return int
	 */
	public function get_count($sql, $row = 0, $field = 0) {
		$query = $this->execute ( $sql );
		//(is_resource ( $query ) and mysql_num_rows ( $query )) and $result = mysql_result ( $query, $row, $field ) or $result = 0;
		if(mysql_num_rows($query)){
			//官方文档，建议不用mysql_result 而是用性能更好的mysql_fetch_* 代替
			$result = mysql_fetch_row($query);//mysql_result ( $query, $row, $field );
		}
		$this->free_result ();
		return $result[0];
	
	}
	public function begin() {
		// 数据rollback 支持
		if ($this->_trans == 0) {
			$sql = "start transaction";
			$this->query ( $sql );
		}
		$this->_trans ++;
		return;
	}
	public function commit() {
		if ($this->_trans > 0) {
			$this->query ( "commit" );
		}
		return true;
	}
	public function rollback() {
		if ($this->_trans > 0) {
			$this->query ( "ROLLBACK" );
			$this->_trans = 0;
		}
		return true;
	}
	public function get_trans_num() {
		return $this->_trans;
	}
	public function get_one_row($sql) {
		$this->execute ( $sql );
		$res = $this->fetch_array ();
		$this->free_result ();
		return $res;
	}
	public function get_query_list(){
		return self::$_query_list;
	}
	/**
	 * 插入数据
	 *
	 * @param $insertSql string       	
	 * @return int last_insert_id
	 */
	public function insert($tablename, $insertsqlarr, $returnid = 0, $replace = false) {
		if (empty ( $insertsqlarr )) {
			return false;
		}
		$this->_return_insert_id = $returnid;
		$fs = array_keys ( $insertsqlarr );
		$vs = array_values ( $insertsqlarr );
		array_walk ( $fs, array ($this, 'quote_field' ) );
		$field = implode ( ',', $fs );
		$value = $this->quote_string($vs);

		$method = $replace ? 'replace' : 'insert';
		$sql = $method . ' into ' . $tablename . ' (' . $field . ') values (' . $value . ')';
		return $res = $this->query ( $sql, Database::INSERT );
		/* var_dump($res);die;
		if ($returnid && ! $replace) {
			// insert_id
			return $res [0];
		} else {
			// affected_rows
			return $res [1];
		} */
	
	}
	public function update($tablename, $setsqlarr, $wheresqlarr) {
		
		$setsql = '';
		$fields = array ();
		if(empty($setsqlarr)){
			throw new Keke_exception('update setsqlarr is emtpy!,please check!');
		}
		foreach ( $setsqlarr as $k => $v ) {
			$fileds [] = $this->quote_field ( $k ) . '=' . $this->quote_string ( $v );
		}
		$setsql = implode ( ',', $fileds );
		$where = "";
		if (empty ( $wheresqlarr )) {
			$where = 1;
		} elseif (is_array ( $wheresqlarr )) {
			$temp = array ();
			foreach ( $wheresqlarr as $k => $v ) {
				$temp [] = $this->quote_field ( $k ) . '=' . $this->quote_string ( $v );
			}
			$where = implode ( ' and ', $temp );
		} else {
			$where = $wheresqlarr;
		}
		$sql = 'UPDATE ' . $tablename . ' SET ' . $setsql . ' WHERE ' . $where;
//  		var_dump($sql);die;
		return $this->query ( $sql, Database::UPDATE );
	}
	public function cached($lifetime = NULL) {
		if ($lifetime === NULL) {
			// 默认缓存时间
			$lifetime = Cache::DEFAULT_CACHE_LIFE_TIME;
		}
		$this->_lifetime = $lifetime;
		return $this;
	}
	/**
	 * 高级查询
	 * (non-PHPdoc)
	 *
	 * @see keke_Database::select()
	 */
	public function select($fileds = '*', $table = null, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		$datalist = array ();
		$where and $where = ' WHERE ' . $where;
		$order and $order = ' ORDER BY ' . $order;
		$group and $group = ' GROUP BY ' . $group;
		$limit and $limit = ' LIMIT ' . $limit;
		$filed = "";
		$fileds != '*' and $filed = explode ( ',', $fileds );
		if (is_array ( $filed )) {
			array_walk ( $filed, array ($this, 'quote_field' ) );
			$fileds = implode ( ',', $filed );
		}
		$sql = 'SELECT ' . $fileds . ' FROM `' . $this->_dbname . '`.`' . TABLEPRE . $table . '`' . $where . $group . $order . $limit;
		$this->cached ( $cachetime );
		$arr = $this->cache_data ( $sql );
		if (! empty ( $pk )) {
			foreach ( $arr as $k => $v ) {
				$datalist [$v [$pk]] = $v;
			}
		} else {
			$datalist = $arr;
			unset ( $arr );
		}
		return $datalist;
	
	}
	/**
	 * 执行sql
	 *
	 * @return resource by mysql_link
	 * @see keke_Database::execute()
	 */
	public function execute($sql, $is_nubuffer = 0) {
		! is_resource ( $this->_link ) and $this->dbconnection ();
		
		$is_nubuffer == 1 and $query_type = "mysql_unbuffered_query" or $query_type = "mysql_query";
		//var_dump($sql);
		//self::$_query_list[] = $sql;
		//var_dump(self::$_query_list);
		array_push ( self::$_query_list, $sql );
		$this->_last_query_id = $query_type ( $sql, $this->_link ) or $this->halt ( mysql_error (), $sql );
		$this->_query_num ++;
		return $this->_last_query_id;
	}
	public function get_query_num() {
		
		return $this->_query_num;
	}
	public function fetch_array($type = MYSQL_ASSOC) {
		$res = mysql_fetch_array ( $this->_last_query_id, $type );
		return $res;
	}
	
	public function free_result() {
		if (is_resource ( $this->_last_query_id )) {
			mysql_free_result ( $this->_last_query_id );
			$this->_last_query_id = null;
		}
	}
	public function cache_data($sql, $default = 'null') {
		$key = Cache::instance ()->generate_id ( $sql )->get_id();
		if ($this->_lifetime > 0 and $datalist = Cache::instance ()->get ( $key )) {
			return $datalist;
		} elseif ($this->_lifetime <= 0) {
			Cache::instance ()->del ( $key );
		}
		$datalist = $data = $this->query ( $sql );
		if (isset ( $key ) and $this->_lifetime > 0) {
			empty ( $data ) and $data = $default;
			Cache::instance ()->set ( $key, $data,$this->_lifetime);
		}
		return $datalist;
	}

	public function version() {
		return mysql_get_server_info ( $this->_link );
	}
	public function escape($value) {
		$this->_link or $this->dbconnection ();
		if (($value = mysql_real_escape_string ( ( string ) $value, $this->_link )) === FALSE) {
			throw new Keke_exception ( ':error', array (':error' => mysql_error ( $this->_link ) ), mysql_errno ( $this->_link ) );
		}
		return "'$value'";
	}
	public function close() {
		is_resource ( $this->_link ) and mysql_close ( $this->_link );
	}
	
	public function getError() {
		return ($this->_link) ? mysql_error ( $this->_link ) : mysql_errno ();
	}
	
	public function getErrno() {
		return ($this->_link) ? mysql_errno ( $this->_link ) : mysql_errno ();
	}
	public function halt($message = '', $sql = '') {
		throw new Keke_exception ( ':error [ :query ]', array ('msg' => $message, ':error' => mysql_error ( $this->_link ), ':query' => $sql ), mysql_errno ( $this->_link ) );
		exit ();
	}
}

?>