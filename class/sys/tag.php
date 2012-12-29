<?php defined('IN_KEKE') or die('access deined');

 
/**
 * 模板标签数据调用
 * @author Michael
 * @version 3.0 2012-12-17
 *
 */
class Sys_tag {
	
	/**
	 * @var 标签数组
	 */
	public static $tag = array();
	/**
	 * @var 广告位
	 */
	public static $target = array();
	
	private static $_instance = NULL;
	
	/**
	 * 对象工厂
	 * @return Sys_tag
	 */
	public static function factory(){
		if(self::$_instance!==NULL){
			return self::$_instance;
		}
		$class = __CLASS__;
		return self::$_instance = new $class;
	}
	/**
	 * 初始化标签数组
	 */
	protected function __construct(){
		self::$tag = DB::select()->from('witkey_tag')->cached(9999,'keke_witkey_tag')->execute();
	}
	 /**
	  * 解析标签 
	  * @param string $tag_name
	  */
	public function readtag($tag_name){
		$tag_arr = Arr::get_arr_by_key(self::$tag, 'tagname');
		 
		$tag_info = $tag_arr[trim($tag_name)];
		
		call_user_func(array(__CLASS__,$tag_info['tag_type']),$tag_info);
	}
	
	public static function art_info($tag_info){
		echo  $tag_info['tag_code'];
		return ;
	}
	/**
	 * 文章列表
	 * @param array $tag_info
	 */
	public static function art_list($tag_info){
	     $datalist = DB::select()->from('witkey_article')->where($tag_info['tag_cond'])->cached($tag_info['cache_time'])->execute();	
	     require Keke_tpl::parse_code ( htmlspecialchars_decode ( $tag_info ['tag_code'] ), $tag_info ['tag_id'] );
	     
	}
	/**
	 * 广告位数据调用
	 * @param string $target_name
	 */
	public static function ad_tag($target_name){
	     
		self::$target = DB::select()->from('witkey_ad_target')->where("is_allow=1")->cached(3600*24,'keke_witkey_ad_target')->execute();
	    $arr = Arr::get_arr_by_key(self::$target, 'name');
	    $target_info = $arr[$target_name];
	    if(Keke_valid::not_empty($target_info)===FALSE){
	    	//throw new Keke_exception('ad target info is emtpy or not exists');
	    	return FALSE;
	    }    
	    if($target_info['tag_code']){
	    	 self::slide_ad($target_info);
	    }else{
	    	echo  self::sing_ad($target_info);
	    }
		
	}
	/**
	 * 普通广告位
	 */
	public static  function sing_ad($target_info){
		$ad_num = $target_info['ad_num'];
		$ads = DB::select()->from('witkey_ad')
		->where("target_id={$target_info['target_id']}")->limit(0, $ad_num)
		->order("listorder asc")->execute();
		$string = '';
		
		for($i=0;$i<$ad_num;$i++){
			if(Keke_valid::not_empty($ads[$i] ['width'])===FALSE OR $ads[$i] ['width']==0){
				$ads[$i] ['width'] = 'auto';
			}
			if(Keke_valid::not_empty($ads[$i] ['height'])===FALSE OR $ads[$i] ['height']==0){
				$ads[$i] ['height']= 'auto';
			}
			switch ($ads[$i]['ad_type']){
				case 'image':
					$string .= "<a href='" . $ads[$i] ['ad_url'] . "' target='_blank'><img src='" .BASE_URL.'/'.$ads[$i] ['ad_file']. "'
							 width='".$ads[$i] ['width']."' height='".$ads[$i] ['height']."'></a>";
				break;
				case 'flash':
					$string.=File::flash_codeout(BASE_URL.'/'.$ads[$i] ['ad_file'], $ads[$i] ['width'], $ads[$i] ['height']);
				break;
				case 'text':
				case 'code':	
					$string .= $ads[$i] ['ad_content'];
				break;
			}
		}
		return $string;
	}
	/**
	 * 幻灯广告位
	 */
	public static  function slide_ad($target_info){
		$datalist = DB::select()->from('witkey_ad')->where('target_id='.$target_info['target_id'])
		->order("listorder asc")->cached('99999')->execute();
		require Keke_tpl::parse_code($target_info['tag_code'], $target_info['target_id'],'ad');
	}

}//end
