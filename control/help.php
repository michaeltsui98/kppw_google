<?php
/**
 * 帮助中心入口页
 * @copyright keke-tech
 * @author shang
 * @version v 1.2
 * 2010-9-6早上17:10:00
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**一级菜单 **/
$first_nav = Keke::get_table_data ( "art_cat_id,cat_name", "witkey_article_category", "art_cat_pid='100'", " listorder asc", "", "", "art_cat_id", 3600 );
$fpid_arr = array_keys ( $first_nav );
$fpid or $fpid = $fpid_arr ['0'];
//一级菜单初始PID参数
/**  当前选中分类的二级菜单**/
if ($fpid) {
	$second_nav = dbfactory::query ( sprintf ( " select art_cat_id,cat_name from %switkey_article_category where art_cat_pid='%d' order by listorder asc", TABLEPRE, $fpid ), 1, 3600 );
	$second_nav = Keke::get_arr_by_key ( $second_nav, "art_cat_id" );
	$spid_arr = array_keys ( $second_nav );
	$spid or $spid = $spid_arr ['0']; //2级菜单初始PID参数
	/** 当前选择分类的三级菜单统计*/
	$third_list = dbfactory::query ( sprintf ( " select art_cat_pid from %switkey_article_category where INSTR(art_index,%d) and art_cat_pid!='%d' order by listorder asc", TABLEPRE, $fpid, $fpid ), 1, 3600 );
	$third_list = Keke::get_arr_by_key ( $third_list, "art_cat_pid" );
	/** 当前选中二级菜单的三级菜单**/
	$third_nav = dbfactory::query ( sprintf ( " select art_cat_id,cat_name from %switkey_article_category where art_cat_pid='%d' order by listorder asc", TABLEPRE, $spid ), 1, 3600 );
	$third_nav = Keke::get_arr_by_key ( $third_nav, "art_cat_id" );
	$tpid_arr = array_keys ( $third_nav );
	$tpid or $tpid = $tpid_arr ['0'];
	//3级菜单初始PID参数
	/** 当前选中三级菜单的文章**/
	$page_obj = Keke::$_page_obj;
	intval ( $page ) or $page = 1;
	intval ( $page_size ) or $page_size = 10;
	$url = "index.php?do=help&fpid=$fpid&spid=$spid&tpid=$tpid";
	$tpid and $hpid = $tpid or $hpid = $spid;
	//没有三级菜单时查找二级内容
	$sql = sprintf ( " select art_id,art_title,content,views from %switkey_article where art_cat_id='%d' order by listorder desc ", TABLEPRE, $hpid );
	$count = intval ( dbfactory::execute ( $sql ) );
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
	$help_list = dbfactory::query ( $sql . $pages ['where'], 1, 3600 );
	
	/**  seo**/
	$page_title = $page_keyword = $second_nav [$spid] ['cat_name'];
	$page_description = '';
	foreach ( $help_list as $v ) {
		$page_description .= $v ['art_title'] . ",";
	}
}
$page_title or $page_title = $_K ['html_title'];
$page_keyword or $page_keyword = Keke::$_sys_config ['seo_keyword'];
$page_description or $page_description = Keke::$_sys_config ['seo_desc'];

require Keke_tpl::template ( $do );
