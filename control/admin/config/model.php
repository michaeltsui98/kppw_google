<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 全局配置管理控制层
 * @author Michael
 * 2012-10-03
 */
class Control_admin_config_model extends  Control_admin {
    /**
     * 初始化加载页面，
     * @param string $type 确定加载那个配置模板文件
     */
	function action_index($type=NULL){
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
	 	//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/config_basic";
		//定义配置类型，默认为web型 
		//列表数据,系统初始化时已经有了,这里无须再查
		$config_arr = Keke::$_sys_config;
		//语言列表
		$lang_arr = Keke::$_lang_list;
		//默认为只显示任务相关的任务模型
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}elseif(!isset($type)){
			$type = 'task';
		}
		//var_dump($type);die;
		//模型列表,已经初始化过，不用再查
		Keke::init_model();
		$list = Keke::$_model_list;
		$model_list = array();
		//var_dump($list);
		//对模型进行筛选，原来是放在模板上的
		foreach ($list as $k=>$v){
			if($v['model_type']==$type){
				$model_list[$k] = $v;
			}
		} 
		
		require Keke_tpl::template('control/admin/tpl/config/model');
	}
	/**
	 * 显示商城的相关模型
	 */
	function action_shop(){
		$this->action_index('shop');
	}
	/**
	 * 模型安装，并更新模型缓存
	 */
	function action_install(){
		global $_lang;
		$type = $_POST['type']?$_POST['type']:'task';
		if(($model_name = $_POST['txt_model_name'])!=null){
			
			//判断模型是否已安装
			if(DB::select('model_id')->from('witkey_model')->where("model_code = '$model_name'")->get_count()->execute()){
				Keke::show_msg($_lang['submit_fail'],'admin/config_model','error');
			}
			//模板配置信息
			$init_config = array();
			//父菜单
			$menu_arr = array();
			//子菜单
			$sub_menu_arr = array();
			//加载初化配置文件,
			include S_ROOT.'control/'.$type.'/'.$model_name.'/init_config.php';
			//添加模型配置
			if($init_config){
				$config = $init_config['config'];
				unset($init_config['config']);
				$init_config['config'] = serialize($config);
				$init_config['on_time'] = strtotime($init_config['on_time']);
				Model::factory('witkey_model')->setData($init_config)->create();
			}
			//添父菜单
			if($menu_arr){
				$where = "submenu_id = ".$menu_arr['submenu_id'];
				if(DB::select('submenu_id')->from('witkey_resource_submenu')->where($where)->get_count()->execute()){
					Model::factory('witkey_resource_submenu')->setData($menu_arr)->setWhere($where)->update();
				}else{
					Model::factory('witkey_resource_submenu')->setData($menu_arr)->create();
				}
			}
			//添子菜单
			if($sub_menu_arr){
				foreach ($sub_menu_arr as $k=>$v){
					$where = "resource_id = ".$v['resource_id'];
					if(DB::select('resource_id')->from('witkey_resource')->where($where)->get_count()->execute()){
						Model::factory('witkey_resource')->setData($v)->setWhere($where)->update();
					}else{
						Model::factory('witkey_resource')->setData($v)->create();
					}
				}
			}
			Cache::instance()->del('keke_model');
			
			Keke::show_msg($_lang['submit_success'],'admin/config_model');
			
			
		}
	}
	/**
	 * 卸载任务模型
	 */
	function action_uninstall(){
		$model_id = $_GET['model_id'];
	    if($model_id){
	    	echo DB::delete('witkey_model')->where('model_id='.$model_id)->execute();
	    }
	    Cache::instance()->del('keke_model');
	    
	} 
	/**
	 * 模型禁用 改变模型的状态
	 */
	function action_disable(){
		global $_lang;
		$status = $_GET['disable']==1?'0':'1';
		$model_id = $_GET['model_id'];
		$where = "model_id = '$model_id'";
		DB::update('witkey_model')->set(array('model_status'))->value(array($status))->where($where)->execute();
		Cache::instance()->del('keke_model');
		$ac = $_GET['type']=='task'?'index':'shop';
		Keke::show_msg($_lang['submit_success'],'admin/config_model/'.$ac);
	}
 
	
	
}
