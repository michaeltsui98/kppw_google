<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 导航菜单配置
 * @author Michael
 * @version v 2.2
 * 2012-09-28
 */
class Control_admin_config_nav extends Control_admin{
	
	function action_index(){
		global $_K,$_lang;
		//nav_list 系统初始化过了
		Keke::init_nav();
		$nav_list = Keke::$_nav_list;
		//默认首页
		$default_index = $_K['set_index'];
		 
		if(!$_POST){
			//没有提交时
			require Keke_tpl::template('control/admin/tpl/config/nav');
			die;
		}
		//当前页面有提交动作
		Keke::formcheck($_POST['formhash']);
		$nav = array_filter($_POST['nav']);
		//批量更新保存到数据库
		foreach($nav as $nav_id=>$v){
			//字段数组
			$columns = array('nav_title','nav_url','nav_style','listorder');
			//值数组
			$values = array($v['nav_title'],$v['nav_url'],$v['nav_style'],$v['listorder']);
			//条件
			$where = "nav_id = '".intval($nav_id)."'";
			//更新
			DB::update('witkey_nav')->set($columns)->value($values)->where($where)->execute();
		}
		
		//更新导航菜单的缓存
		Cache::instance()->del('keke_nav');
		Keke::show_msg ($_lang['submit_success'], "admin/config_nav",'success' );
	}
	/**
	 * 判断外网地址，内网址
	 * @param unknown_type $url
	 * @return boolean
	 */
	function url_analysis($url){
	    if(strpos($url, 'http')!==FALSE){
	    	return FALSE;
	    }else{
	    	return TRUE;
	    }
	}
	/**
	 * 初始化添加页面
	 */
	function action_add(){
		global $_K,$_lang;
		//nav_list 系统初始化过了
		Keke::init_nav();
		$nav_list = Keke::$_nav_list;
        if(isset($_GET['nav_id'])){
        	$nav_arr = $nav_list[$_GET['nav_id']];
        	//是否只读
        	$readonly = $this->url_analysis($nav_arr['nav_url']);
        }
		require Keke_tpl::template('control/admin/tpl/config/nav_add');
	}
	/**
	 * 保存提交的导航数据
	 */
	function action_save(){
		global $_lang;
		//form检查
		Keke::formcheck($_POST['formhash']);
		//数据
	    $array = array('nav_title'=>$_POST['nav_title'],
	    		'nav_url'=>$_POST['nav_url'],
	    		'nav_style'=>$_POST['nav_style'],
	    		'listorder'=>$_POST['listorder'],
	    		'newwindow'=>$_POST['newwindow'],
	    		'ishide'=>$_POST['ishide']);
	   
		if($_POST['hdn_nav_id']){
			//条件
			$where = "nav_id = '{$_POST['hdn_nav_id']}'";
			//更新
			Model::factory('witkey_nav')->setData($array)->setWhere($where)->update();
			//show_msg 跳转的地址
			$url = "?nav_id=".$_POST['hdn_nav_id'];
		}else{
			//添加
			Model::factory('witkey_nav')->setData($array)->create();
			$url = NULL;
		}
		if($_POST['set_index']){
			$this->action_set_index($_POST['nav_style']);
		}else{
			$this->action_set_index('index');
		}
		Cache::instance()->del('keke_nav');
		Keke::show_msg($_lang['submit_success'],'admin/config_nav/add'.$url,'success');
	}
	/**
	 * 删除导航菜单
	 */
	function action_del(){
		global $_K,$_lang;
		$nav_id = intval($_GET['nav_id']);
		echo DB::delete('witkey_nav')->where('nav_id='.$nav_id)->execute();
	}
	/**
	 * 设为首页
	 * @param  $nav_style  要设为首页的民航样式
	 * @return boolean
	 */
	function action_set_index($nav_style=NULL){
		global $_lang;
		//如果为空，则获取get的值
		if($nav_style===NULL){
			$nav_style = $_GET['nav_style'];
		}
		//更新数据库，设置指定的首页
		$res =DB::update('witkey_config')->set(array('v'))->value(array($nav_style))->where("k='set_index'")->execute();
		//清除缓存
		Cache::instance()->del('keke_config');
		
		if($_GET['nav_style']){
			Keke::show_msg ( $_lang['set_index_success'], "admin/config_nav",'success' );
		}else{
			return (bool)$res;
		}
	}
}//end