<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台模板管理
 * @copyright keke-tech
 * @author Michael
 * @version v 2.2
 * 2012-10-11
 */
class Control_admin_tool_tpl extends Control_admin{
	/**
	 * @var 跳转用
	 */
	private  $_uri;
	
	function before(){
		$this->_uri = "admin/tool_tpl";
	}
	function action_index(){
		global $_K,$_lang;
		
		$list_arr = DB::select()->from('witkey_template')->execute();
		$skins = $this->get_skin_type();
		require Keke_tpl::template('control/admin/tpl/tool/tpl');
	}
	/**
	 * 编辑模板列表
	 */
	function action_list(){
		global  $_K,$_lang;
		$tplname = $_GET['tplname'];
		$filepath = S_ROOT.'./tpl/'.$tplname;
		$file_obj = new keke_file_class();
		
		$tpllist = $file_obj->get_dir_file_info($filepath,true,true);
		arsort($tpllist);
		$filter_file =array('.htm','.css','.js');
		require Keke_tpl::template ( 'control/admin/tpl/tool/tpl_file_list');
	}
	/**
	 * 安装模板
	 */
	function action_install(){
		global  $_K,$_lang;
		//上传路径为空
		if (! $txt_newtplpath=$_POST['txt_newtplpath']) {
			Keke::show_msg ( $_lang['not_enter_dir'], $this->_uri,'warning' );
		}
		//模板配置文件存在
		if (file_exists ( S_ROOT . "./tpl/$txt_newtplpath/modinfo.txt" )) {
			$modinfo = keke_file_class::read_file ( S_ROOT . "./tpl/$txt_newtplpath/modinfo.txt" );
			$mods = explode ( ';', $modinfo );
			$modinfo = array ();
			//将modinfo.txt 的内容转换为数组
			foreach ( $mods as $m ) {
				if (! $m)
					continue;
				$m1 = explode ( '=', trim ( $m ) );
				$modinfo [$m1 ['0']] = $m1 ['1'];
			}
			//上传的路径要与modfino的路径一至，否则退出
			if($txt_newtplpath!=$modinfo['tpl_path']){
			 Keke::show_msg($_lang['tpl_path_do_not_match']."tpl/$txt_newtplpath/modinfo.txt",$this->_uri,'warning');
			}
		
// 			$config_tpl_obj->setWhere ( "tpl_path ='$txt_newtplpath'" );
			$tpl_obj = Model::factory('witkey_template');
			//判断当前模板是否有安装过,否则退出
			if ($tpl_obj->setData("tpl_path ='$txt_newtplpath'")->count()) {
				Keke::show_msg ( $_lang['tpl_alerady_install'], $this->_uri ,'warning' );
			}
		    $array = array('develop'=>$modinfo ['develop'],
		    		    'on_time'=>time(),
		    		    'tpl_path'=>$txt_newtplpath,
		    			'tpl_title'=>$modinfo['tpl_title'],
		    			'tpl_desc'=>$modinfo['tpl_desc'],
		    		    'is_selected'=>1
		    		);
		    //保存提交的数据
			$tpl_obj->setData($array)->create();
			Keke::show_msg ( $_lang['tpl_install_success'], $this->_uri,'success' );
		} else {
			Keke::show_msg ($_lang['tpl_not_exists_or_configinfo_err'], $this->_uri,'warning' );
		}
	}
	/**
	 *  保存模板配置文件
	 */
	function action_save(){
		global  $_K,$_lang;
		$_POST = Keke_tpl::chars($_POST);
		$rdo_is_selected = $_POST['rdo_is_selected'];
		$tpl_obj  = new Keke_witkey_template();
		$tpl_obj->setWhere ( 'tpl_id=' . $rdo_is_selected );
		$tpl_obj->setIs_selected ( 1 );
		$res = $tpl_obj->update();
		
		$skin = $_POST['skin'];
		
		
		
		if(is_array($skin)&&!empty($skin)){
			//改变模板上皮肤设定
			list($template,$theme) = each($skin);
			//foreach($skin as $k=>$v){
				Dbfactory::execute(sprintf(" update %switkey_template set tpl_pic ='%s' where tpl_title='%s'",TABLEPRE,$theme,$template));
			//}
			//更变config 的值 template,theme
			DB::update('witkey_config')->set(array('v'))->value(array($template))->where("k='template'")->execute();
			DB::update('witkey_config')->set(array('v'))->value(array($theme))->where("k='theme'")->execute();
		}
		//将非选定模板设为2
		$tpl_obj->setWhere ( 'tpl_id!=' . $rdo_is_selected );
		$tpl_obj->setIs_selected ( 2 );
		$res = $tpl_obj->update ();
		//清除模板缓存
		Cache::instance()->del('keke_template');
		Cache::instance()->del('keke_config');
		
		Keke::show_msg ($_lang['tpl_config_set_success'], $this->_uri, 'success' );
		
	}
	/**
	 * 删除非默认模板
	 */
	
	function action_del(){
		global  $_K,$_lang;
		$delid = $_GET['delid'];
		$res = Model::factory('witkey_template')->setWhere('tpl_id=' . intval ( $delid ))->del();
		if ($res) {
			Cache::instance()->del("keke_template" );
			Keke::show_msg ( $_lang['tpl_config_unloading_success'],$this->_uri, 'success' );
		}
	}
	/**
	 * 备份模板
	 */
	function action_backup(){
		global  $_K,$_lang;
		include S_ROOT.'/class/helper/keke_zip_class.php';
		$tplname = $_GET['tplname'];
		//zip文件名称
		$filename = $tplname.'_mod_'.time().'.zip';
		//文件存放路径
		$names = S_ROOT."data/backup/$filename";
		
		$zip_obj = new zip_file($names);
		
		$zip_obj->set_options(array('basedir'=>'tpl','recurse'=> 1,'overwrite' => 1, 'storepaths' => 1));
		//指定要压缩的模板文件
		$zip_obj->add_files(S_ROOT."tpl/".$tplname);
		//开始压缩
		$red =$zip_obj->create_archive();
		
		$file_path =  "/data/backup/$filename";
		//zip文件存在则备分成功，否则备份失败
		if(file_exists(S_ROOT.$file_path)){
			Keke::show_msg($_lang['tpl_backup_success'],$this->_uri,'success');
		}else{
			Keke::show_msg($_lang['tpl_backup_fail'],$this->_uri,'warning');
		}
	}
	
	/**
	 * 获取当前的皮肤
	 * @return multitype:
	 */
	function get_skin_type(){
		$skins = array();
		//打开theme夹子
		if(($fp = opendir(S_ROOT.SKIN_PATH.'/theme'))!=null){
			//读取theme下的目录
			while(($skin=readdir($fp))!=null){
				$skin = trim($skin,'.|svn');
				//保存到skins数组
				$skin&&$skins[$skin] = $skin.'_skin';
			}
		}
		return array_filter($skins);
	}
	/**
	 * 编辑模板文件
	 */
	function action_edit(){
		global  $_K,$_lang;
        extract($_GET);
        $filename = S_ROOT . './tpl/' . $tplname . '/' . $tname;
        $code_content = htmlspecialchars ( Keke_tpl::sreadfile ( $filename ) );
		require Keke_tpl::template('control/admin/tpl/tool/tpl_file_edit');
	}
	/**
	 * 保存编辑的模板文件
	 */
	function action_tpl_save(){
		global  $_K,$_lang;
		//write
		if ($_POST) {
			$_POST = Keke_tpl::chars($_POST);
			$filename =$_POST['filename'];
			$tplname = $_POST['tplname'];
			$tname =$_POST['tname'];
			if (! is_writable ( $filename )) {
				Keke::show_msg ($_lang['file'] . $filename . $_lang['can_not_write_please_check'],"admin/tool_tpl/eidt?tplname=$tplname&tname=$tname", 'warning' );
			}
			Keke_tpl::swritefile ( $filename, htmlspecialchars_decode ( Keke::k_stripslashes ( $_POST['txt_code_content'] ) ) );
			Keke::admin_system_log ( $_lang['edit_template'] . $tplname . '/' . $tname );
			Keke::show_msg ($_lang['tpl_edit_success'],"admin/tool_tpl/edit?tplname=$tplname&tname=$tname", 'success' );
		}
	}
}