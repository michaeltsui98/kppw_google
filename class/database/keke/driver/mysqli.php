<?php
/*
 * mysqli ���ݿ������� kekezu
 */

final class Keke_driver_mysqli extends Keke_database {
	
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
	 * ���ݿ�����
	 *
	 * @return resource
	 */
	public function dbconnection() {
		if (! $this->_link = mysqli_connect ( $this->_dbhost, $this->_dbuser, $this->_dbpass)) {
			exit (mysqli_connect_errno().mysqli_connect_error() );
		}
		if ($this->version () > '4.1') {
			$this->_dbcharset and $serverset = "character_set_connection={$this->_dbcharset}, character_set_results={$this->_dbcharset}, character_set_client=binary";
			$this->version () > '5.0.1' and $serverset .= ((empty ( $serverset ) ? '' : ',') . 'sql_mode=\'\'');
			$serverset and mysqli_query ($this->_link, "SET $serverset" );
		} 
// 		$this->_link = new mysqli($this->_dbhost,$this->_dbuser,$this->_dbpass,$this->_dbname);
		
		mysqli_select_db ( $this->_link,$this->_dbname ) or $this->halt ( 'select database:' . $this->_dbname . ' fail!' );
		return $this->_link;
	}
	/**
	 * ��ѯ�������һ������
	 *
	 * @param $sql string       	
	 *
	 * @example type=select ����array
	 * @example type=insert ����array(insert_id,affected_rows)
	 * @example type=update or delete ���� int affected_rows;
	 */
	public function query($sql, $type = Database::SELECT, $is_unbuffer = 0) {
		$this->execute ( $sql, $is_unbuffer );
		if ($type === Database::SELECT) {
			$result = array ();
			while ( ($rs = $this->fetch_array ()) != false ) {
				$result [] = $rs;
			}
		} elseif ($type === Database::INSERT ) {
			$result = mysqli_insert_id ( $this->_link );
		} else {
			$result = mysqli_affected_rows ( $this->_link );
		}
		$this->free_result ();
		return $result;
	}
	/**
	 * ��ѯ�����ĳ��ĳ�ֶε�ֵ
	 *
	 * @param $query string       	
	 * @param $row int       	
	 * @return int
	 */
	public function get_count($sql, $row = 0, $field = 0) {
		$query = $this->execute ( $sql );
		//(is_resource ( $query ) and mysql_num_rows ( $query )) and $result = mysql_result ( $query, $row, $field ) or $result = 0;
		if(mysqli_num_rows($query)){
			//�ٷ��ĵ������鲻��mysql_result ���������ܸ��õ�mysql_fetch_* ����
			$result = mysqli_fetch_row($query);//mysql_result ( $query, $row, $field );
		}
		$this->free_result ();
		return $result[0];
	
	}
	public function begin() {
		// ����rollback ֧��
		if ($this->_trans == 0) {
			$sql = "start transaction";
			$this->execute( $sql );
		}
		$this->_trans ++;
		return;
	}
	public function commit() {
		if ($this->_trans > 0) {
			$this->execute ( "commit" );
		}
		return true;
	}
	public function rollback() {
		if ($this->_trans > 0) {
			$this->execute ( "ROLLBACK" );
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
	 * ��������
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
		$sql = $method . ' into ' . $tablename . ' (' . $field . ') values (' . implode(',', $value) . ')';
		return $res = $this->query ( $sql, Database::INSERT );
		/* var_dump($res);die;*/
	 
	
	}
	public function update($tablename, $setsqlarr, $wheresqlarr) {
		
		$setsql = '';
		$fields = array ();
		if(empty($setsqlarr)){
			throw new Keke_exception('update setsqlarr is emtpy!,please check!');
		}

		$keys = array_map(array($this,'quote_field'),array_keys($setsqlarr));
		$values = array_map(array($this,'quote_string'),array_values($setsqlarr));
		$setsqlarr = array_combine($keys, $values);
		$setsql = NULL;
		foreach ( $setsqlarr as $k => $v ) {
			$setsql .=  $k . '=' .  $v .',';
		}
		$setsql = trim($setsql,',');
      		
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
  		
		return $this->query ( $sql, Database::UPDATE );
	}
	public function cached($lifetime = NULL) {
		if ($lifetime === NULL) {
			// Ĭ�ϻ���ʱ��
			$lifetime = Cache::DEFAULT_CACHE_LIFE_TIME;
		}
		$this->_lifetime = $lifetime;
		return $this;
	}
	/**
	 * �߼���ѯ
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
	 * ִ��sql
	 *
	 * @return resource by mysql_link
	 * @see keke_Database::execute()
	 */
	public function execute($sql, $is_nubuffer = 0) {
		is_resource ( $this->_link ) or $this->dbconnection ();
		
		if($is_nubuffer == 1){
			$query_type = "mysqli_multi_query";
		} else{
			$query_type = "mysqli_query";
		}  
		 
		self::$_query_list[]= $sql;
		$this->_last_query_id = $query_type ( $this->_link,$sql ) or $this->halt ( mysqli_error ($this->_link), $sql );
		$this->_query_num ++;
		return $this->_last_query_id;
	}
	public function get_query_num() {
		
		return $this->_query_num;
	}
	public function fetch_array($type = MYSQLI_ASSOC) {
		$res = mysqli_fetch_array ( $this->_last_query_id, $type );
		return $res;
	}
	
	public function free_result() {
		if (is_resource ( $this->_last_query_id )) {
			mysqli_free_result ( $this->_last_query_id );
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
		return mysqli_get_server_info ( $this->_link );
	}
	public function escape($value) {
		$this->_link or $this->dbconnection ();
		if (($value = mysqli_real_escape_string (  $this->_link,( string ) $value )) === FALSE) {
			throw new Keke_exception ( ':error', array (':error' => mysqli_error ( $this->_link ) ), mysqli_errno ( $this->_link ) );
		}
		return "'$value'";
	}
	public function close() {
		is_resource ( $this->_link ) and mysqli_close ( $this->_link );
	}
	
	public function getError() {
		return ($this->_link) ? mysqli_error ( $this->_link ) : mysql_errno ();
	}
	
	public function getErrno() {
		return ($this->_link) ? mysqli_errno ( $this->_link ) : mysql_errno ();
	}
	public function halt($message = '', $sql = '') {
		throw new Keke_exception ( ':error [ :query ]', array ('msg' => $message, ':error' => mysqli_error ( $this->_link ), ':query' => $sql ), mysqli_errno ( $this->_link ) );
		exit ();
	}
}

?>