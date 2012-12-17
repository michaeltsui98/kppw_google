<?php
Keke_lang::load_lang_class('keke_loaddata_class');

class Keke_loaddata {
	
	/**
	 * 获取标签列表
	 * @param  $mode 1=>tag_id 索引数组,其它的用tagname 索引数组
	 * @return array
	 */
	public static function get_tag($mode = '') {
		$tag_obj = new Keke_witkey_tag();
		$taginfo = $tag_obj->query('*',6000);
		
 
		return $taginfo;
	}
	
	static function get_ad($adname = null, $limit_num = null) {
		is_null ( $adname ) or $where = "and ad_name ='$adname'";
		$limit_num > 0 and $limit = $limit_num;
		return self::get_table_data ( '*', 'witkey_ad', '1=1 ' . $where, 'listorder', '', $limit, '', 3600 );
	}
	 
	
	//读数据
	
    static function init_tag(){
    	$tag = new Keke_witkey_tag();
    	$tag_arr = $tag->query('*',6000);
    	return Keke::get_arr_by_key($tag_arr,'tagname');
    }
	static function readtag($name) { 
		global $kekezu,$_lang;
         
       	$tag_arr = self::get_tag(0);
	 
 		$tag_info = $tag_arr [$name];
	    if ($tag_info ['tag_type'] == 5) {
			echo htmlspecialchars_decode ( $tag_info ['code'] );
		}else{
	 		if ($tag_info ['cache_time']) { 
				$cid = 'db_tag_' . $tag_info ['tag_id'];
				$datalist = Keke::$_cache_obj->get ( $cid );
				if (! $datalist) {
					$datalist = Keke_loaddata::loaddata ( $tag_info );
					Keke::$_cache_obj->set ( $cid, $datalist, $tag_info ['cache_time'] );
				}
			 
				require Keke_tpl::parse_code ( htmlspecialchars_decode ( $tag_info [tag_code] ), $tag_info [tag_id] );
			} else if ($tag_info) { //不带缓存的  用传统调用
				Keke_loaddata::previewtag ( $tag_info );
			} else {
				echo $_lang['tag'] . $name . $_lang['not_found'];
			}
		}
	}
	
	//获得tag的纯html代码
	static function gettagHTML($tagid) {
		global $_K, $kekezu; 
		$url = $_K ['siteurl'] . "/control/admin/plu.php?do=previewtag&tagid=" . $tagid; 
		if (function_exists ( "curl_init" )) { 
			$content = Keke::curl_request($url) ; 
		} else {
			$content = file_get_contents ( $url ); 
		} 
		return $content;
	}
	
	/**
	 * 显示tag的预览
	 */
	static function previewtag($tag_info) {
		if ($tag_info ['tag_type'] == 5) {
			echo htmlspecialchars_decode ( $tag_info ['tag_code'] );
		} else {
			$datalist = Keke_loaddata::loaddata ( $tag_info );
			require Keke_tpl::parse_code ( htmlspecialchars_decode ( $tag_info ['tag_code'] ), $tag_info ['tag_id'] );
		}
	
	}
 
	//显示广告的预览
	static function preview_addgroup($adname,$loadcount) {
		self::adgroup ( $adname,$loadcount);
	}
	
	//纯读数据
	static function loaddata($tag_info) {
		global $_K;
		$tag_type = Keke_global::get_tag_type ();
		if ($tag_info ['tag_type'] != 5) {
			$f = $tag_type [$tag_info ['tag_type']] [2]?$tag_type [$tag_info ['tag_type']] [2]:'article';
			$func_name = "load_" . $f . "_data";
			$temp_arr = self::$func_name ( $tag_info );
			return $temp_arr;
		}
	}
	 
	static function load_autosql_data($tag_info) {
		$sql = stripslashes ( $tag_info ['tag_sql'] );
		$temp_arr = dbfactory::query ( $sql );
		return $temp_arr;
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
			/** 更新本类过期广告*/
			//dbfactory::execute ( sprintf ( " update %switkey_ad set is_allow='0' where target_id='%d' and  end_time>0 and end_time>%d", TABLEPRE, $ad_target ['target_id'], time () ));
			
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
	 * 广告更新10分钟执行一次更新每条广告
	 * @param 广告信息 $ad_info
	 */
	static function update_ad($ad_info){
	   global $_K,$kekezu;
	     if((SYS_START_TIME - intval($ad_info['on_time']))>$_K['timespan']){
	      //更新时间值
	      dbfactory::execute(sprintf('update %switkey_ad set on_time  = %s where ad_id = %d',TABLEPRE,time()+$_K['timespan'],$ad_info['ad_id']));   
	      //更新广告生命
	      dbfactory::execute(sprintf("update %switkey_ad set is_allow='0' where target_id='%d' and  end_time>0 and end_time>%d",TABLEPRE,$ad_info['ad_id'],time()));	
	   }
		
	}
	
	static function init_ad(){
		$obj = new Keke_witkey_ad();
		return  Keke::get_arr_by_key($obj->query(6000),'ad_id');
	}
	/**
	 * 单广告
	 * @param int $adid
	 */
	static function ad($adid) {
		
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
	
	}
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
