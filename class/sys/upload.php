<?php defined ( 'IN_KEKE' ) or exit('Access Denied');

Keke_lang::load_lang_class ( 'ajax_upload' );

class Sys_upload {
	
	private $_ext_url;
	private $_file_name;
	public $_file_type;
	private $_img_width;
	private $_img_height;
	private $_upload_type;
	private $_task_id;
	private $_work_id;
	private $_obj_type;
	private $_obj_id;
	private $_uid;
	private $_username;
	private $_flash;
	private $_max_filesize;
	
	public static function get_instance($query_string) {
		static $obj = null;
		if ($obj == null) {
			$obj = new self ( $query_string );
		}
		return $obj;
	}
	function __construct($query_string) {
		$this->_ext_url = explode ( "|", UPLOAD_ALLOWEXT );
		$this->_uid = Keke::$_uid;
		$this->_username = Keke::$_username;
		$this->_max_filesize = Keke::$_sys_config ['max_size'];
		$this->file_info_init ( $query_string );
	}
	public function file_info_init($query_string) {
		$url_data = array ();
		if(is_array($query_string)){
			$url_data = $query_string;
		}else{
			parse_str ( $query_string, $url_data );
		}
		$url_data ['file_name'] and $this->_file_name = $url_data ['file_name'] or $this->_file_name = 'filedata';
		$url_data ['file_type'] and $this->_file_type = $url_data ['file_type'];
		intval($url_data ['img_width']) and $this->_img_width = $url_data ['img_width'];
		intval($url_data ['img_height']) and $this->_img_height = $url_data ['img_height'];
		 
		//限制task_id 的值，因为query_string不太安全 
		if(in_array($url_data['task_id'],array('ad','auth','mark','tools')) or intval($url_data['task_id'])>0){
			$this->_task_id = $url_data ['task_id'];
		}
		$url_data ['work_id'] and $this->_work_id = $url_data ['work_id'];
		$url_data ['obj_id'] and $this->_obj_id = $url_data ['obj_id'];
		$url_data ['obj_type'] and $this->_obj_type = $url_data ['obj_type'];
		$url_data ['flash'] and $this->_flash = 1;
	
	}
	/**upload none big file 
	 * @return   void
	 */
	public function upload_file() {
		global $_K;
		global $_lang;
		$file_obj = new Keke_witkey_file ();
		if ($this->_img_width) {
			$img_info = getimagesize ( $_FILES [$this->_file_name] ['tmp_name'] );
			if ($img_info) {
				$w = $img_info [0];
				if ($this->_img_width != $w) {
					$err = $_lang ['upload_fail_picture_width_is'] . $w . "," . $_lang ['picture_limit_width'] . $this->_img_width . "," . $_lang ['picture_adjust_and_then_upload'];
					$_K ['charset'] == 'gbk' and $err = Keke::gbktoutf ( $err );
					echo Keke::json_encode_k ( array ('err' => $err, 'msg' => 'error' ) );
					die ();
				}
			}
		}
		if ($this->_img_height) {
			$img_info = getimagesize ( $_FILES [$this->_file_name] ['tmp_name'] );
			if ($img_info) {
				$h = $img_info [1];
				if ($this->_img_height != $h) {
					$err = $_lang ['upload_fail_picture_heigth'] . $h . "," . $_lang ['picture_limit_height'] . $this->_img_height . "," . $_lang ['picture_adjust_and_then_upload'];
					$_K ['charset'] == 'gbk' and $err = Keke::gbktoutf ( $err );
					echo Keke::json_encode_k ( array ('err' => $err, 'msg' => 'error' ) );
					die ();
				}
			}
		}
		if ($this->_file_type != 'sys') {
			$save_path = UPLOAD_ROOT;
			$rand_name = 1;
		} else {
			$save_path = S_ROOT . '/data/uploads/sys/' . $this->_task_id . '/';
			$rand_name = 1;
		}
		$file_uploads = new Upload ( $save_path, $this->_ext_url, UPLOAD_MAXSIZE );
		$savename = $file_uploads->run ( $this->_file_name, $rand_name );
		if (is_array ( $savename )) {
			if ($this->_file_type == 'att') {
				$file_pic = 'data/uploads/' . UPLOAD_RULE . $savename [0] [saveName];
			} elseif ($this->_file_type == 'editor') {
				$file_pic = $_K [siteurl] . '/data/uploads/' . UPLOAD_RULE . $savename [0] [saveName];
			} else {
				$file_pic = 'data/uploads/sys/' . $this->_task_id . '/' . $savename [0] [saveName];
			}
			$real_file = $savename [0] [name];
			($this->_flash&&CHARSET == 'gbk') && $real_file = Keke::utftogbk ( $real_file );
			if ($this->_file_type == 'link') {
				$msg = array ('url' => $file_pic . ',' . $real_file, 'localname' => $real_file, 'id' => '1', 'up_file' => $file_pic );
			} else if ($this->_file_type == 'att' || $this->_file_type == 'sys') {
				//url 编辑器图片上传的参数
				$msg = array ('url' => $file_pic, 'localname' => $real_file, 'id' => '1', 'up_file' => $file_pic );
			} else {
				$msg = array ('url' => '!' . $file_pic, 'localname' => $real_file, 'id' => '1', 'up_file' => $file_pic );
			}
			$fid = $this->save_db($file_pic);
			$err = '';
		} else {
			$err = $savename;
			$msg = $savename;
		}
		$_K ['charset'] != 'utf-8' and $msg = Keke::gbktoutf ( $msg );
		echo Keke::json_encode_k ( array ('err' => $err, 'msg' => $msg, 'fid' => $fid ) );
		die ();
	}
	
	/**
	 * @return   void
	 */
	public function upload_big_file() {
		
		$file_uploads = new Upload ( UPLOAD_ROOT, '', 50 * (1024 * 1024) );
		
		$savename = $file_uploads->run ( $this->_file_name, 1 );
		
		if (is_array ( $savename )) {
			$filepath = 'data/uploads/' . UPLOAD_RULE . $savename [0] ['saveName'];
			$filename = $savename [0] ['saveName'];
			$real_file = $savename [0] [name];
			($this->_flash&&CHARSET == 'gbk') && $real_file = Keke::utftogbk ( $real_file );
			$err = '';
		} else {
			$err = $savename;
		}
		$fid = $this->save_db($filepath);
		
		echo Keke::json_encode_k ( array ('err' => $err, 'path' => $filepath, 
				'filename' => $filename, 'localname' => $real_file, 'fid' => $fid ) );
		die ();
	}
	//return three pic size:100*100,210*210,
	public function upload_resize_pic() {
		global $_K;
		$ext = 'jpg|jpeg|gif|png|bmp';
		
	    $filename = $this->_file_name;
	    
		$filepath = keke_file_class::upload_file ( $filename, $ext, 1 );
		
		if (! filepath) {
			return false;
		}
		CHARSET == 'gbk' && $real_file = Keke::utftogbk ( $real_file );
		
		
		$size_a = array (100, 100 );
		$size_b = array (210, 210 );
		$name = pathinfo($filepath,PATHINFO_FILENAME);
		
		$p100 =  S_ROOT.strtr($filepath,array($name=>$name.'100'));
		$p210 =  S_ROOT.strtr($filepath,array($name=>$name.'210'));
		
		Image::factory(S_ROOT.$filepath)->resize(100,100)->save($p100);
		Image::factory(S_ROOT.$filepath)->resize(210,210)->save($p210);
		
		$fid = $this->save_db($filepath);
		
		$msg = array ('path' => $filepath, 'filename' => $filename, 'localname' => $real_file,
				 'fid' => $fid, 'size' => $size_a [0] . ',' . $size_b [0] );
		($this->_flash&&CHARSET == 'gbk') && $msg = Keke::gbktoutf ( $msg );
		$_K ['charset'] != 'utf-8' and $msg = Keke::gbktoutf ( $msg );
		echo Keke::json_encode_k ( $msg );
		die ();
	}
	
	function save_db($filepath){
		$filename = $this->_file_name;
		//存放到数据库
		$file_obj = new Keke_witkey_file ();
		$file_obj->setUid ( $this->_uid );
		$file_obj->setUsername ( $this->_username );
		$file_obj->setFile_name ( $_FILES [$filename] ['name'] );
		$file_obj->setSave_name ( $filepath );
		$file_obj->setObj_id ( intval ( $this->_obj_id ) );
		$file_obj->setObj_type ( $this->_obj_type );
		$file_obj->setOn_time ( SYS_START_TIME );
		return (int)$file_obj->create();
	}
}