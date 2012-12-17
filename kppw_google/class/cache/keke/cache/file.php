<?php
// Keke_lang::load_lang_class('file_cache_class');
// require_once 'acache_class.php';
class Keke_cache_file extends Keke_cache {

	private $path;
	private $contents;
	private $filename;
 	private $created;
	private $cache_expiration = 0;
	private $_gcProbability=100;
	private $_gced=false;
	protected $default_expires;
	
	function __construct() {
		$this->reset ();
		$this->path = S_ROOT . "data" . DIRECTORY_SEPARATOR . "cache" . DIRECTORY_SEPARATOR;
		$default_expires = Keke_cache::DEFAULT_CACHE_LIFE_TIME;
		if ($default_expires !== FALSE and $default_expires > 0) {
			$this->default_expires = time () + $default_expires;
		} else {
			$this->default_expires = NULL;
		}
	
	}
	
	/**
	 * 初始化，并清空cache
	 *
	 * @access public
	 * @return void
	 */
	function reset() {
		$this->contents = NULL;
		$this->name = NULL;
		$this->created = NULL;
	
	}
 	
	/**
	 * 设置缓存
	 * (non-PHPdoc)
	 *
	 * @see keke_cache_class::get()
	 */
	function get($id, $default = null) {
		if(isset(self::$_id) and is_null($id)){
			$id= self::$_id;
		}
		$filepath = $this->path . $id . '.php';
		try {
			$file_obj = new SplFileInfo ( $filepath );
			if (! $file_obj->isFile ()) {
				return $default;
			} else {
				// 打开缓存文件的数据
				$created = $file_obj->getMTime ();
				$data = $file_obj->openFile ();
				$php_tag = $data->fgets();
				if ($data->eof ()) {
					throw new Keke_exception ( __METHOD__ . 'file was error or empty!' );
				}
				// 读取缓存文件的内容
				$cache = '';
				while ( $data->eof () === false ) {
					$cache .= $data->fgets ();
				}
				/* 
				$content = ltrim ( $cache, '<?php \'' );
				$content = rtrim ( $content, '\';' ); */
				$this->contents = unserialize ( $cache  );
				$lifttime = $this->contents ['_expires'];
				unset ( $file_obj, $data );
				if ($created + ( int ) $lifttime < time ()) {
					$this->del ( $filepath );
					return $default;
				} else {
					return $this->contents ['_contents'];
				}
			}
		
		} catch ( Exception $e ) {
			throw $e;
		}
	
	}
	
	function set($id, $contents, $expires = null) {
		if(mt_rand(0,1000000)<$this->_gcProbability){
			$this->gc();
		}
		if(isset(self::$_id) and is_null($id)){
			$id= self::$_id;
		}
		if (isset ( $contents ) and $contents) {
			$this->contents = array (
					'_contents' => $contents 
			);
			$this->filename = $this->sanitize_id ( $id );
			if (! is_null ( $expires )) {
				$this->default_expires = $expires;
			}  
		}
		$cache_path = $this->path . $this->filename . '.php';
		// 打开文件目录
		$dir = new SplFileInfo ( $this->path );
		// 目录不存在
		if (! $dir->isDir ()) {
			// 创建目录
			if (! mkdir ( $this->path, 07777, TRUE )) {
				throw new Keke_exception ( __METHOD__ . ' unable to create directory : :directory', array (
						':directory' => $this->path 
				) );
			}
			
			// 更改目录权限
			chmod ( $this->path, 07777 );
		}
		
		$file = new SplFileInfo ( $cache_path );
		
		$data = $file->openFile ( 'w' );
		
		try {
			$this->contents ['_created'] = time ();
			$this->contents ['_expires'] = $this->default_expires;
			$cache_content = '<?php defined(\'IN_KEKE\') or die(\'No direct script access.\'); ?>' . PHP_EOL ;
			$cache_content .=  serialize ( $this->contents ) ;
			// 写缓存
			$data->fwrite ( $cache_content, strlen ( $cache_content ) );
			$result = ( bool ) $data->fflush ();
			unset ( $file, $data );
			return $result;
		
		} catch ( Exception $e ) {
			throw $e;
		}
	
	}
	function add($id,$val){
		throw new Keke_exception(__CLASS__.'/'.__FUNCTION__.'() is empty');
	}
	function del($id) {
		$cache_file = $this->path.$id.EXT;
		if (is_file ( $cache_file )) {
			unlink ( $cache_file );
		}
		$this->reset ();
	
	}
	
	function del_all() {
		if (empty ( $this->path )){
			return FALSE;
		}
		if (file_exists ( $this->path )){
			$this->deldir ( $this->path );
		}
		$this->reset ();
	}
	function deldir($dir = '',$only_expired = false) {
		$files = glob ( $dir . '*', GLOB_MARK );
		if (! empty ( $files )) {
			foreach ( $files as $file ) {
				if (substr ( $file, - 1 ) == '/') {
					chmod ( $file, 0755 );
					$this->deldir ( $file);
				} else {
					chmod ( $file, 0755 );
				    if($only_expired === false){
				    	$is_del = true;
				    }else{
				    	$content = $this->get($file);
				    	$is_del = filemtime($file)+$content['_expires'] <time();
				    }
				    if($is_del === true){
				    	unlink($file);
				    }
					
				}
			}
		}
	
	}
	function gc(){
		$this->deldir ( $this->path,true);
	}
	

}

?>