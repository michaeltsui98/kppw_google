<?php defined('IN_KEKE') or die('access deined');

Keke_lang::load_lang_class('keke_loaddata_class');
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
	public $tag = array();
	/**
	 * @var 广告位
	 */
	public $target = array();
	
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
		$this->tag = DB::select()->from('witkey_tag')->cached(9999)->execute();
	}
	 /**
	  * 解析标签 
	  * @param string $tag_name
	  */
	public function readtag($tag_name){
		$tag_arr = Arr::get_arr_by_key($this->tag, 'tagname');
		$tag_info = $tag_arr[$tag_name];
		if($tag_info['tag_type']=='art_info'){
			echo $tag_info['tag_code'];
			die;
		}
		call_user_func(array(__CLASS__,$tag_info['tag_type']),$tag_info);
		
	}
	/**
	 * 文章列表
	 * @param array $tag_info
	 */
	public function art_list($tag_info){
	     $datalist = DB::select()->from('witkey_article')->where($tag_info['tag_cond'])->cached($tag_info['cache_time'])->execute();	
	     require Keke_tpl::parse_code ( htmlspecialchars_decode ( $tag_info ['tag_code'] ), $tag_info ['tag_id'] );
	     
	}
	/**
	 * 广告位数据调用
	 * @param unknown_type $target_name
	 */
	public function ad_tag($target_name){
	   
		$this->target = DB::select()->from('witkey_ad_target')->where("is_allow=1")->cached(3600*24)->execute();
	    $arr = Arr::get_arr_by_key($this->target, 'name');
	    $target_info = $arr[$target_name];    
	    if($target_info['tag_code']){
	    	$this->slide_ad($target_info);
	    }else{
	    	$this->sing_ad($target_info);
	    }
		
	}
	/**
	 * 普通广告位
	 */
	public function sing_ad($target_info){
		
	}
	/**
	 * 幻灯广告位
	 */
	public function slide_ad($target_info){
		$datalist = DB::select()->from('witkey_ad')->where('target_id='.$target_info['target_id'])
		->order("listorder asc")->cached('99999')->execute();
		return Keke_tpl::parse_code($target_info['tag_code'], $target_info['target_id'],'ad');
	}
	
	
	/**
	 * 显示指定位置的广告
	 * @param $code 广告位置代码
	 * @param $do	     当前路由DO
	 * @param $is_slide  图片标准名称
	 */
	static function ad_show($code, $do = 'index',$is_slide=null) {
		global $_lang,$_K;
		$ad_target = Database::instance()->get_one_row ( sprintf ( " select * from %switkey_ad_target where code='%s' and INSTR(targets,'%s') and is_allow=1", TABLEPRE, $code, $do ),3600*24);
		if ($ad_target) {
			if($is_slide){
			    return self::adgroup($is_slide,$ad_target ['ad_num']);
			}
			$pos_config = unserialize ( $ad_target ['position'] ); //位置配置数组
			
			/** 获取指定条数广告*/
			$sql = " select a.ad_id,a.ad_name,a.ad_file,a.ad_content,a.ad_url,a.width,a.height,
			a.ad_type,a.ad_position,a.on_time from %switkey_ad a left join %switkey_ad_target b on a.target_id=b.target_id 
			where b.code='%s' and a.is_allow='1' order by a.ad_id desc limit 0,%d";
			$ad_arr = dbfactory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE, $code, $ad_target ['ad_num'] ),true,$_K['timespan'] );
			
			$ad_list = Keke::get_arr_by_key($ad_arr,'ad_position'); 
			 

			$ad_str = "";
			foreach ( $pos_config as $k => $v ) {
				$pos = explode ( "*", $v ); //宽高定位
				if ($ad_list [$k]) {
					$ad_info = $ad_list [$k];
					$ad_str .= "<div class='adv w" . $ad_info ['width'] . "xh" . $ad_info ['height'] . " ad_" . $k. "'>";
					switch ($ad_info ['ad_type']) {
						case "flash" :
							$ad_str.=keke_file_class::flash_codeout($ad_info ['ad_url'], $ad_info ['width'], $ad_info ['height']);
							break;
						case "text" :
						case "code" :
							$ad_str .= Keke::k_stripslashes($ad_info ['ad_content']);
							break;
						case "image" :
							$ad_str .= "<a href='" . $ad_info ['ad_url'] . "' target='_blank'><img src='" . $ad_info ['ad_file']
									 . "' width='".$ad_info ['width']."' height='".$ad_info ['height']."'></a>";
							break;
					}
					self::update_ad($ad_info);
				} else {
					$ad_str .= "<div class='adv w" . $pos [0] . "xh" . $pos [1] . " ad_" . $k . "'>";
					$ad_str .= "<a href='index.php?do=article&view=article_info&art_id=13' target='_blank'><p class='t_c'>".$_lang['ad_leasing']."</p><p class='t_c'>" . $pos [0] . "x" . $pos [1] . $_lang['pixels']. "  </p></a>";
				}
				$ad_str .= "</div>";
				$k=='top' and $ad_str.="<div class='clear mb_10'></div>";
			}
			echo $ad_str;
		}
		
	}
 
	
 
	
	/**
	 * 单广告
	 * @param int $adid
	 */
	/* static function ad($adid) {
		
		$ad_arr = self::init_ad();
		$ad_info = $ad_arr [$adid];
		if ($ad_info ['ad_type'] == 1) {
			$adstr = '<embed src="' . $ad_info ['ad_file'] . '" quality="high" width="' . $ad_info ['width'] . '" height="' . $ad_info ['height'] . '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>';
		} elseif ($ad_info ['ad_type'] == 3) {
			$adstr = htmlspecialchars_decode ( $ad_info ['ad_content'] );
		} else {
			$adstr = '<img src="' . $ad_info ['ad_file'] . '" ';
			$adstr .= $ad_info ['width'] ? "width={$ad_info['width']} " : '';
			$adstr .= $ad_info ['height'] ? "height={$ad_info['height']} " : '';
			$adstr .= '>';
			if ($ad_info ['ad_url']) {
				$adstr = '<a target="_blank" href="' . $ad_info ['ad_url'] . '">' . $adstr . '</a>';
			}
		}
		echo $adstr;
	
	} */
	/**
	 * 广告组，一般用于幻灯片调用
	 */
	static function adgroup($adname,$ad_limit_num) {
		global $_K;
		//$datalist = Keke::get_ad ( $adname,$ad_limit_num );
		$tag_arr = self::get_tag(0);
		$tag_info = $tag_arr [$adname];
	
		require Keke_tpl::parse_code ( htmlspecialchars_decode ( $tag_info ['tag_code'] ), $tag_info ['tag_id'] );
	}

}//end
