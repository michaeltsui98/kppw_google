<?php
/**
 * 文章模块入口路由页
 * this not free,powered by keke-tech
 * @author jiujiang
 * @charset:GBK  last-modify 2011-12-5-上午10:37:07
 * @version V2.0
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

$nav_active_index = "article";
$views = array ("article_index", "article_list", "article_info" );
if(!isset($view)){
	$view = "article_index";
}
 

$tmp_arr = get_art_cate();
$year_arr = get_art_by_year();

/**
 * 获取文章分类
 * @return array 文章分类数组
 */
function get_art_cate() {
	$array = Keke::get_table_data ( "*", "witkey_article_category", "cat_type='article'", "", "", "", "", null );
	$tmp_arr = array ();
	Keke::get_tree ( $array, $tmp_arr, "", "", "art_cat_id", "art_cat_pid", "art_cat_name" );
	return $tmp_arr;
}

/**
 * 
 * 根据年份来获取文章的统计数据
 */
function get_art_by_year() {
	$sql2 = "select count(a.art_id) as c ,YEAR(FROM_UNIXTIME(a.pub_time)) as y from %switkey_article as a  left join %switkey_article_category as b  \n" . "on a.art_cat_id = b.art_cat_id where b.cat_type='article'\n" . "GROUP BY y";
	return  dbfactory::query ( sprintf ( $sql2, TABLEPRE, TABLEPRE ), true, 5*60);
}
/**
 * 
 * 根据条件获取文章数据和分页数据
 * @param int $page
 * @param int $page_size
 * @param string $url
 * @param string $where
 * @return array 文章数据和分页数据
 */
function get_art_list($page, $page_size, $url, $where,$static=0) {
	global $Keke;
	$sql = "select a.* ,b.cat_name from " . TABLEPRE . "witkey_article a left join " . TABLEPRE . "witkey_article_category b on a.art_cat_id=b.art_cat_id where b.cat_type='article'  $where";
	$csql = "select count(a.art_id) as c  from " . TABLEPRE . "witkey_article a left join " . TABLEPRE . "witkey_article_category b on a.art_cat_id=b.art_cat_id where b.cat_type='article'  $where";

	$count = intval ( dbfactory::get_count ( $csql,0,null, 10*60 ) );
	
	Keke::$_page_obj->setStatic($static);
	$pages = Keke::$_page_obj->getPages ( $count, $page_size, $page, $url );
	$art_arr = dbfactory::query ( $sql . $pages ['where'], 5*60 );
	return array("date"=>$art_arr,"pages"=>$pages);//返回分页数据和文章数组组成的多维数组
}


/**
 * 
 * 重组文章分类（用art_cat_id作为数组的键值）
 * @param array $tmp_arr		文章分类数组
 * @param int $art_cat_id  分类ID
 * @return array 重组后的分类数组
 */
function get_cat_info ($tmp_arr,$art_cat_id) {
	$id = "artilce_list_cat_info";
	$cobj  = new keke_cache_class();
	$t_arr = $cobj->get($id);
	if(!$t_arr){
		$size = sizeof ( $tmp_arr );
		for($i = 0; $i < $size; $i ++) {
			$t_arr [$tmp_arr [$i] ['art_cat_id']] = $tmp_arr [$i];
		}
		$cobj->set($id, $t_arr,null);
	}
   return $t_arr;
}
require S_ROOT . "/control/$do/$view.php";

