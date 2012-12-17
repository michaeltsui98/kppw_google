<?php	defined ( 'IN_KEKE' ) or die ( 'Access Denied' );

/**
 * 验证码基类
 * 
 * @author Administrator
 *        
 */
abstract class Keke_captcha {
	/**
	 *
	 * @var object 单例
	 */
	public static $instance;
	
	/**
	 *
	 * @var string Style-dependent Keke_captcha driver
	 */
	// protected $driver;
	
	/**
	 *
	 * @var array 默认配置
	 */
	public static $config = array (
			'style' => 'basic',
			'width' => 150,
			'height' => 50,
			'complexity' => 4,
			'background' => '',
			'fontpath' => '',
			'fonts' => array (),
			'promote' => false 
	);
	
	/**
	 *
	 * @var string 验证码字符串
	 */
	protected $response;
	
	/**
	 *
	 * @var string Image 图象资源
	 */
	protected $image;
	
	/**
	 *
	 * @var string Image 图象类型 ("png", "gif" or "jpeg")
	 */
	protected $image_type = 'png';
	
	/**
	 * 获取验证码对象的单例
	 *
	 * @param $style string
	 *        	对象类型(alpha,basic,black,math,riddle,word);
	 * @return Keke_captcha_basic
	 */
	public static function instance($w=150,$h=50,$style = 'basic') {
		if (isset ( Keke_captcha::$instance )) {
			return Keke_captcha::$instance;
		}
		// 获取配置
		$config = Keke_captcha_config::get ();
		// 设置验证码的类名
		$class = 'Keke_captcha_'.$style;
		
		// 创建实例
		Keke_captcha::$instance = $Keke_captcha = new $class ( 'default',$w,$h );
		
		// 关闭实例时更新session
		 register_shutdown_function ( array (
				$Keke_captcha,
				'update_response_session' 
		) ); 
		
		return Keke_captcha::$instance;
	}
	
	public function __construct($group = NULL,$w,$h) {
		
		empty ( Keke_captcha::$instance ) and Keke_captcha::$instance = $this;
		
		// 设置默认的配置
		if ($group=== NULL) {
			$group = 'default';
		}
		
		// 加载配置，否则抛出异常
		if (! is_array ( $config = Keke_captcha_config::get ( $group ) ))
			throw new Keke_exception ( 'Keke_captcha group not defined in :group configuration', array (
					':group' => $group 
			) );
			
			 
		if ($group !== 'default') {
			 
			if (! is_array ( $default = Keke_captcha_config::get ( 'default' ) ))
				throw new Keke_exception ( 'Keke_captcha group not defined in :group configuration', array (
						':group' => 'default' 
				) );
				
				// 合并配置信息
			$config += $default;
		}
		
		// 重构配置的健值对
		foreach ( $config as $key => $value ) {
			if (array_key_exists ( $key, Keke_captcha::$config )) {
				Keke_captcha::$config [$key] = $value;
			}
		}
		
	    if($w){
	    	Keke_captcha::$config['width'] = $w;
	    }
	    if($h){
	    	Keke_captcha::$config['height'] = $h;
	    }
	    
		Keke_captcha::$config ['group'] = $group;
		
		// 判断背景图片是否存在
		if (! empty ( $config ['background'] )) {
			Keke_captcha::$config ['background'] = str_replace ( '\\', '/', realpath ( $config ['background'] ) );
			
			if (! is_file ( Keke_captcha::$config ['background'] ))
				throw new Keke_exception ( 'The specified file, :file, was not found.', array (
						':file' => Keke_captcha::$config ['background'] 
				) );
		}
		
		// 判断指定的字体文件是否存在
		if (! empty ( $config ['fonts'] )) {
			Keke_captcha::$config ['fontpath'] = str_replace ( '\\', '/', realpath ( $config ['fontpath'] ) ) . '/';
			
			foreach ( $config ['fonts'] as $font ) {
				if (! is_file ( Keke_captcha::$config ['fontpath'] . $font ))
					throw new Keke_exception ( 'The specified file, :file, was not found.', array (
							':file' => Keke_captcha::$config ['fontpath'] . $font 
					) );
			}
		}
		
		// 生成新的字符串
		$this->response = $this->generate_challenge ();
	}
	
	/**
	 * 更新输出的Session变更
	 *
	 * @return void
	 */
	public function update_response_session() {
		
		// 存取Session 的值
		$_SESSION ['Keke_captcha_response'] = sha1 ( strtoupper ( $this->response ) );
	}
	
	/**
	 * 验证用户输入的验证码，并且更新输入错误的次数
	 *
	 * @staticvar integer $counted Keke_captcha 统计标记
	 * @param $response string     用户输入的值
	 * @return boolean
	 */
	public static function valid($response) {
		// 每页最大的统计次数
		
		static $counted = null;
		
		// 如果开启次数取限制，则不在做任何统计
		if (Keke_captcha::instance ()->promoted ()){
			return TRUE;
		}
		//var_dump($_SESSION);die;	
		// 结果判断
		$result = ( bool ) (sha1 ( strtoupper ( $response ) ) === $_SESSION ['Keke_captcha_response']);
		
		// 计数器+1
		if ($counted !== TRUE) {
			$counted = TRUE;
			
			// 验证请求
			if ($result === TRUE) {
				//有效次数+1
				self::$instance->valid_count ( $_SESSION ['Keke_captcha_valid_count'] + 1 );
			}else {
				//无效次数+1
				self::$instance->invalid_count ( $_SESSION ['Keke_captcha_invalid_count'] + 1 );
			}
		}
		
		return $result;
	}
	
	/**
	 * 通过Session 获取验证的次数
	 *
	 * @param $new_count integer   最新的统计次数
	 * @param $invalid boolean    是否获取无效的计数
	 * @return integer 统计值
	 */
	public function valid_count($new_count = NULL, $invalid = FALSE) {
		// 对的Session 名称
		$session = ($invalid === TRUE) ? 'Keke_captcha_invalid_count' : 'Keke_captcha_valid_count';
		
		// 更新统计次数
		if ($new_count !== NULL) {
			$new_count = ( int ) $new_count;
			
			// 重置计数器 = 删除 session
			if ($new_count < 1) {
				unset ( $_SESSION [$session] );
			} 			// 设置计数器的新值
			else {
				$_SESSION [$session] = ( int ) $new_count;
			
			}
			
			// 返回新的统计
			return ( int ) $new_count;
		}
		
		// 返回当前统计
		return ( int ) $_SESSION [$session];
	}
	
	/**
	 * get or set 无效的统计值
	 *
	 * @param $new_count integer  新的次数
	 * @return integer 
	 */
	public function invalid_count($new_count = NULL) {
		return $this->valid_count ( $new_count, TRUE );
	}
	
	/**
	 * 重置响应请求，并删除对应的Session
	 *
	 * @return void
	 */
	public function reset_count() {
		$this->valid_count ( 0 );
		$this->valid_count ( 0, TRUE );
	}
	
	/**
	 * 是否判断验证次数
	 * responses.
	 *
	 * @param $threshold integer
	 *        	Valid response count threshold
	 * @return boolean
	 */
	public function promoted($threshold = NULL) {
		// Promotion has been disabled
		if (Keke_captcha::$config ['promote'] === FALSE)
			return FALSE;
			
			// Use the config threshold
		if ($threshold === NULL) {
			$threshold = Keke_captcha::$config ['promote'];
		}
		
		// Compare the valid response count to the threshold
		return ($this->valid_count () >= $threshold);
	}
	
	/**
	 * 输出图片
	 *
	 * @return mixed
	 */
	public function __toString() {
		return $this->render ( TRUE );
	}
	
	/**
	 * 返回图象类型
	 *
	 * @param $filename string  文件名
	 * @return string boolean type ("png", "gif" or "jpeg")
	 */
	public function image_type($filename) {
		switch (strtolower ( substr ( strrchr ( $filename, '.' ), 1 ) )) {
			case 'png' :
				return 'png';
			
			case 'gif' :
				return 'gif';
			
			case 'jpg' :
			case 'jpeg' :
				//返回jpeg，因为GD2的方法名是jpeg
				return 'jpeg';
			
			default :
				return FALSE;
		}
	}
	
	/**
	 * 创建一个图象资源
	 * 如果有背景图的话，也支持
	 *
	 * @throws Kohana_Exception If no GD2 support
	 * @param $background string     背景图版片的路径
	 * @return void
	 */
	public function image_create($background = NULL) {
		// 判断是否支持GD2
		if (! function_exists ( 'imagegd2' ))
			throw new Keke_exception ( 'Keke_captcha.requires_GD2' );
			
		// 创建一个背景图 (black)
		$this->image = imagecreatetruecolor ( Keke_captcha::$config ['width'], Keke_captcha::$config ['height'] );
		
		// 使用背景图片
		if (! empty ( $background )) {
			// 创建图片，使用对就在的方法
			$function = 'imagecreatefrom' . $this->image_type ( $background );
			$this->background_image = $function ( $background );
			
			// 重置图片大小，如果需要
			if (imagesx ( $this->background_image ) !== Keke_captcha::$config ['width'] or imagesy ( $this->background_image ) !== Keke_captcha::$config ['height']) {
				imagecopyresampled ( $this->image, $this->background_image, 0, 0, 0, 0, Keke_captcha::$config ['width'], Keke_captcha::$config ['height'], imagesx ( $this->background_image ), imagesy ( $this->background_image ) );
			}
			
			// 释放资源
			imagedestroy ( $this->background_image );
		}
	}
	
	/**
	 * 填充背景图
	 *
	 * @param $color1 resource       开始颜色
	 * @param $color2 resource       结束颜色
	 * @param $direction string      水平，垂址，随机，三种方式
	 * @return void
	 */
	public function image_gradient($color1, $color2, $direction = NULL) {
		$directions = array (
				'horizontal',
				'vertical' 
		);
		
		// 随机选择一个方向
		if (! in_array ( $direction, $directions )) {
			$direction = $directions [array_rand ( $directions )];
			
			// 颜色开关
			if (mt_rand ( 0, 1 ) === 1) {
				$temp = $color1;
				$color1 = $color2;
				$color2 = $temp;
			}
		}
		
		// Extract RGB values
		$color1 = imagecolorsforindex ( $this->image, $color1 );
		$color2 = imagecolorsforindex ( $this->image, $color2 );
		
		// Preparations for the gradient loop
		$steps = ($direction === 'horizontal') ? Keke_captcha::$config ['width'] : Keke_captcha::$config ['height'];
		
		$r1 = ($color1 ['red'] - $color2 ['red']) / $steps;
		$g1 = ($color1 ['green'] - $color2 ['green']) / $steps;
		$b1 = ($color1 ['blue'] - $color2 ['blue']) / $steps;
		
		if ($direction === 'horizontal') {
			$x1 = & $i;
			$y1 = 0;
			$x2 = & $i;
			$y2 = Keke_captcha::$config ['height'];
		} else {
			$x1 = 0;
			$y1 = & $i;
			$x2 = Keke_captcha::$config ['width'];
			$y2 = & $i;
		}
		
		// 随机渲染
		for($i = 0; $i <= $steps; $i ++) {
			$r2 = $color1 ['red'] - floor ( $i * $r1 );
			$g2 = $color1 ['green'] - floor ( $i * $g1 );
			$b2 = $color1 ['blue'] - floor ( $i * $b1 );
			$color = imagecolorallocate ( $this->image, $r2, $g2, $b2 );
			
			imageline ( $this->image, $x1, $y1, $x2, $y2, $color );
		}
	}
	
	/**
	 * 输出验证码
	 *  html 的调用是index.php/do=captcha
	 * @param $html boolean  输出html,否则输出图片
	 * @return mixed Image, void
	 */
	public function image_render($html) {
		
		if ($html === TRUE) {
			return '<img src="'.BASE_URL.'/index.php/captcha" width="' . Keke_captcha::$config ['width'] . '" height="' . Keke_captcha::$config ['height'] . '" id="Keke_captcha" class="Keke_captcha" />';
		}
		header ( "Expires: Sun, 1 Jan 2000 12:00:00 GMT" );
		header ( "Last-Modified: " . gmdate ( "D, d M Y H:i:s" ) . "GMT" );
		header ( "Cache-Control: no-store, no-cache, must-revalidate" );
		header ( "Cache-Control: post-check=0, pre-check=0", false );
		header ( "Pragma: no-cache" );
		header ( 'Content-Type: image' . $this->image_type );
		$f = 'image' . $this->image_type;
		$f ( $this->image );
		
		imagedestroy ( $this->image );
	}
	
	/**
	 * 生成字符串
	 *
	 * @return string 随机码，或是对应的字符串
	 */
	abstract public function generate_challenge();
	
	/**
	 * 生成图片
	 *
	 * @param $html boolean 渲染成图象标签
	 * @return mixed
	 */
	abstract public function render($html = TRUE);

} 
