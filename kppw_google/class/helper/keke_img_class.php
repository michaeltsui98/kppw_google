<?php
/**
 * @todo 图片处理类、缩放,剪切
 * @version v 2.0
 * @author hr
 */
	class keke_img_class {
		
		private static $_img_width;
		private static $_img_height;
		private static $_img_type;	  //原图的类型(int枚举类型)
		private static $quality=100; //生成的图片的质量(决定了图片的清晰程度以及生成的文件的大小)
// 		private static $cut_position='center';//剪切时候,从哪里开始剪切(left,right,center)
		
		function __construct(){}
		
		/**
		 * 将单张图片缩放成不同的比例, $size可以有多个,最后一个参数可以为bool值,为true的时候表示为剪切
		 * e.g keke_img_class::resize('example.jpg', array(100,100), array(200,200,'target.jpg'), true)
		 * @param string $image
		 * @param array $size 为长度为2或3的索引数组 array(width, height, target_address可选)
		 * @return boolean
		 */
		public static function resize($image, $size){
			self::init_img_info($image); 
			$arg_length = func_num_args();//参数长度
			if($arg_length==1){
				return false;
			}
			$arguments = func_get_args();//参数数组
			
			/* 判断是否需要剪切图片,并且决定循环的长度*/
			$cut = false;
			$last_arg = $arguments[$arg_length-1];
			$length = $arg_length-1;
			if (is_bool($last_arg)){
				if ($arg_length<=2){ return false;}//此种情况下参数长度至少为3
				$length = $arg_length-2;
				$cut = $last_arg; //$last_arg==true && $cut=true;
			}
			
			$orig_width = self::$_img_width;
			$orig_height = self::$_img_height;
			$success = (int)0;
			for ($i=1;$i<=$length;$i++){
				if (!is_array($arguments[$i])){
					return false;
				}
				//width <= height 根据原图短的一边来计算
				if ($orig_width <= $orig_height){
					$according = $arguments[$i][0]/$orig_width;//根据宽度的百分比
				} else {
					$according = $arguments[$i][1]/$orig_height;//根据高度的百分比
				}
				$width = $orig_width * $according;
				$height = $orig_height * $according;
				$target = isset($arguments[$i][2]) ? $arguments[$i][2] : '';
				$result =  self::resize_pic($image, $width, $height, $target);
				//对缩放后的图片再进行剪切操作
				if ($cut==true && file_exists($target)){
					$img_size_arr = getimagesize($target);
					$target_width = $arguments[$i][0];//宽
					$target_height = $arguments[$i][1];//高
					$cut_x = $img_size_arr[0] < $target_width ? '0' : ($img_size_arr[0] - $target_width)/2;
					$cut_y = $img_size_arr[1] < $target_height ? '0' : ($img_size_arr[1] - $target_height)/2;
					self::cut_pic($target, $target_width,$target_height,$cut_x, $cut_y);
				}
				$result==true && $success++;
			}
			return $success>0 ? true : false;
		}

		/**
		 * 单张图片的缩放
		 * @param $image
		 * @param $width
		 * @param $height
		 * @param $targetfile 要生成的图片的名字(默认)
		 */
		public static function resize_pic($image, $width, $height, &$targetfile=''){
			$size = min($width, $height);
			if($targetfile==''){
				if(strtolower(substr($image, 0, 4))=='http'){ return false;}//如果是远程url,并且$targetfile为空,会没有权限生成新的file
				$targetfile = self::get_filepath_by_size($image, $size, false);
			}
			$result = self::cut_image($image, $targetfile, $width, $height);
			return $result;
		}
		
		/**
		 * 剪切出原图的一部分,并且生成的图默认会覆盖原来的,所以如果剪切的是远程url,那么应该给$targetfile一个值,否则可能报错(权限不足)
		 * @param $image
		 * @param $cut_width
		 * @param $cut_height
		 * @param $cut_x
		 * @param $cut_y
		 */
		public static function cut_pic($image, $cut_width,$cut_height,$cut_x=0, $cut_y=0, $targetfile=''){
			$targetfile=='' && $targetfile = $image;
			$result = self::cut_image($image, $targetfile, $cut_width, $cut_height,$cut_width,$cut_height,$cut_x, $cut_y);
			return $result;
		}
		
		/**
		 * 图片裁剪、缩放(默认) private
		 * @param string $image
		 * @param string $targetfile 要生成的文件的文件名
		 * @param int $new_width 要生成的图片的宽度
		 * @param int $new_height 要生成图片的高度
		 * @param int $cut_width 裁剪出原图的宽度(针对裁剪)
		 * @param int $cut_height
		 * @param int $cut_x 从原图哪里开始裁剪
		 * @param int $cut_y
		 * @return boolean
		 */
		private static function cut_image($image, $targetfile, $new_width, $new_height,$cut_width='',$cut_height='',$cut_x=0, $cut_y=0){
			if (!self::$_img_width || !self::$_img_height){
				self::init_img_info($image);
			}
			$cut_width=='' && $cut_width = self::$_img_width;//如果有值,那就是剪切,否则就是缩放(默认)
			$cut_height=='' && $cut_height= self::$_img_height;
			
			if (!self::$_img_type) return false;
			$extend = '';
			switch (intval(self::$_img_type)){
				case 1: $extend='gif'; break;
				case 2: $extend='jpeg'; break;
				case 3: $extend='png'; break;
// 				case 6: $extend='bmp'; break;//bmp格式还不被支持
				default: return false; break;//不被支持的格式
			}
			$img_creat_method = 'imagecreatefrom' . $extend ;
			$source = $img_creat_method($image);
			$target_source = imagecreatetruecolor ( $new_width, $new_height );
			//imagecopyresampled ( resource画布 , 原图resource, 新图x, 新图y, 原图x , 原图y , 新图宽, 新图高 , 原图宽 , 原图高 )
			imagecopyresampled ( $target_source, $source, 0, 0, $cut_x, $cut_y, $new_width, $new_height, $cut_width, $cut_height);//bool
			
			$img_method = 'image' . $extend;
			if ($img_method=='imagepng'){
				$result = $img_method ( $target_source, $targetfile);
			}else{
				$quality = self::$quality ? intval(self::$quality) : 100;
				$result = $img_method ( $target_source, $targetfile, $quality);
			}
			imagedestroy($target_source);
			return $result;//bool result
		}
		
		/**
		 * 初始化图片信息
		 * @param string $imgPath
		 * @return;
		 */
		private static function init_img_info($image){
			$img_arr = getimagesize($image);
			if(!$img_arr) { return false; }
			self::$_img_width = $img_arr[0] ? $img_arr[0] : false;
			self::$_img_height = $img_arr[1] ? $img_arr[1] : false;
			self::$_img_type = $img_arr[2] ? $img_arr[2] : false;
// 			return true;
		}
		
		/**
		 * 根据(原)图片路径查找对应的尺寸的图片,
		 * 如果$default=true(是否显示默认),并且检测对应文件不存在,则返回系统默认图片
		 * @param string $file
		 * @param int $size
		 * @param bool $default 如果图片不存在的话,是否显示默认图片
		 * @return string
		 */
		public static function get_filepath_by_size($file, $size, $default=true){
			$basename = basename($file);
			$dirname = dirname($file).'/';
			$new_path = $dirname . $size . '_' .$basename;
			if ($default==true && !file_exists($new_path)){
				$new_path = $size==210 ? SKIN_PATH.'/img/shop/shop_default_big.jpg' :'resource/img/system/kppw.jpg';
			}
			return $new_path;
		}
		
// 		/**
// 		 * 获取文件扩展名
// 		 * @param string $filename
// 		 */
// 		private static function get_extend($filename, $method_pre=false){
// 			$ext = '';
// 			$last_pos = strrpos($filename, '.');
// 			if ($last_pos===false){
// 				return false;
// 			}
// 			$ext = strtolower(substr($filename, $last_pos+1));
// 			return $ext;
// 		}
		
		
		
	}
	
	