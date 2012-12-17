<?php

final class Keke_cache_sqlite extends Keke_cache {
	public  $_config = array ();
	protected static $_db;
	private $_gcProbability=100;
	
	protected function __construct($config = null) {
		if ($config === null) {
			$this->_config = array (
					'database' => S_ROOT . 'data' . DIRECTORY_SEPARATOR . 'caches.php', 
					'schema' => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, tags VARCHAR(255), expiration INTEGER, cache TEXT)' );
		} else {
			$this->_config = $config;
		}
		// 创建数据库对象
		//var_dump($this->_config['database']);die();
		self::$_db = new PDO ( 'sqlite:' . $this->_config ['database'] );
		// 查询缓存表是不是存在
		$result = self::$_db->query ( "SELECT * FROM sqlite_master WHERE name = 'caches' AND type = 'table'" )->fetchAll ();
		// 如果表不存在，则创建一个新的
		if (0 == count ( $result )) {
			$database_schema = $this->_config ['schema'];
			
			if ($database_schema === NULL) {
				throw new Keke_exception ( 'Database schema not found in sqlite3 Cache configuration' );
			}
			
			try {
				// 创建设表结构
				self::$_db->query ( $this->_config['schema']);
			} catch ( PDOException $e ) {
				throw new Keke_exception( 'Failed to create new SQLite caches table with the following error : :error', array (':error' => $e->getMessage () ) );
			}
		}
	
	}
	public function get($id,$default=null) {
	   if(isset(self::$_id) and is_null($id)){
			$id= self::$_id;
	   }
	   $statement = self::$_db->prepare('select id,expiration,cache from caches where id = :id limit 0,1');
	   try{
	   	    $statement->execute(array(':id'=>self::sanitize_id($id)));
	   }catch (PDOException $e){
	   		throw new Keke_exception('there was error by local sqlite3 cache query :error',array(':error'=>$e->getMessage()));
	   }
	   //结果为空时
	   if(!$result = $statement->fetch(PDO::FETCH_OBJ)){
	   	 return $default;
	   }
	   //结果到期
	   if($result->expiration!=0 and $result->expiration<=time() ){
	   	   $this->del($id);
	   	   return $default;
	   }else{
	   	   return unserialize($result->cache);
	   }
	}
	/**
	 * 设置缓存
	 * @see keke_cache_class::set()
	 */
	public function set($id=null, $val, $expire = null) {
		if(mt_rand(0,1000000)<$this->_gcProbability){
			$this->gc();
		}
		$data = serialize($val);
		if($expire===null){
			$expire = time()+parent::DEFAULT_CACHE_LIFE_TIME;
		}else{
			$expire = (0===$expire)?0:$expire+time();
		}
		if(isset(self::$_id) and is_null($id)){
			$id= self::$_id;
		}
		$sql = '';
		if($this->exists($id)){
			$sql = 'update caches set  cache=:cache, expiration=:expiration where id = :id';
		}else{
			$sql = 'insert into caches (id,cache,expiration) values (:id,:cache,:expiration)';
		}
		$statement = self::$_db->prepare($sql);
		try{
			$statement->execute(array(':id'=>$this->sanitize_id($id),':cache'=>$data,':expiration'=>$expire));
		}catch(PDOException $e){
			throw new Keke_exception('there was sqlite query :error',array(':error'=>$e->getMessage()));
		}
		return (bool)$statement->rowCount();
	}
	public function del($id) {
	   $statement = self::$_db->prepare('delete from caches where id =:id');
	   try{
	   	 	$statement->execute(array(':id'=>$this->sanitize_id($id)));
	   }catch (PDOException $e){
	   	     throw new Keke_exception('there was sqlite query :error',array(':error'=>$e->getMessage()));
	   }
	   return (bool) $statement->rowCount();
	}
	public function del_all($only_expire=false) {
	  $statement = self::$_db->prepare('delete from caches');
	  try{
	   	 	$statement->execute();
	   }catch (PDOException $e){
	   	     throw new Keke_exception('there was sqlite query :error',array(':error'=>$e->getMessage()));
	   }
	   var_dump($statement->rowCount());die();
	   return (bool) $statement->rowCount();
	}
	/**
	 * 垃圾回收
	 * @throws Keke_exception
	 */
	public function gc(){
		$statement = self::$_db->prepare('delete from caches where expiration<:expiration');
		try{
			$statement->execute(array(':expiration'=>time()));
		}catch(PDOException $e){
			throw new Keke_exception('there was sqlite query :error',array(':error'=>$e->getMessage()));
		}
	}
	/**
	 * 判断缓存是否存在
	 * @param string $id
	 * @throws Keke_exception
	 * @return boolean
	 */
	protected function exists($id){
		$statement = self::$_db->query('select id from caches where id = :id');
		try{
			$statement->execute(array(':id'=>$this->sanitize_id($id)));
		}catch (PDOException $e){
			throw new Keke_exception('there was sqlite query :error',array(':error'=>$e->getMessage()));
		}
		return (bool)$statement->fetchAll();
	}
	public  function add(){
		
	}

}

?>