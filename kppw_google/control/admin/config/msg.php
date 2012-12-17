<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 短信配置
 */
class Control_admin_config_msg extends Control_admin{
    /**
     * 短信接口配置
     */
	function  action_index(){
    	global $_K,$_lang;
    	
    	require Keke_tpl::template('control/admin/tpl/config/msg_config');
    }
    /**
     * 保存配置信息
     */
    function action_config_save(){
    	global $_lang;
    	Keke::formcheck($_POST['formhash']);
    	unset($_POST['formhash']);
    	foreach ($_POST as $k=>$v) {
    		$where = "k = '$k'";
    		DB::update('witkey_config')->set(array('v'))->value(array($v))->where($where)->execute();
    	}
    	Cache::instance()->del('keke_config');
    	//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
    	Keke::show_msg($_lang['submit_success'],'admin/config_msg','success');
    }
    /**
     * 短信发送
     */
    function action_send(){
    	global $_K,$_lang;
    	if(!$_POST){
    		require Keke_tpl::template('control/admin/tpl/config/msg_send');
    		die;
    	}
    	$tar_content=Keke_tpl::chars($_POST['tar_content']);
    	//普通用户组,也就是给所有用户发短信
    	if($_POST['slt_type']=='normal'){
    		$tel_arr=Dbfactory::query(" select mobile from ".TABLEPRE."witkey_space where mobile is not null ");
    		//将手机号用逗号隔开
    		foreach($tel_arr as $v){
    			if($v['mobile']){
    			 $txt_tel .= $v['mobile'].",";
    			}
    		}
    		//去掉最后的逗号
    		$txt_tel = rtrim($txt_tel,',');
    	}else{
    		$txt_tel = $_POST['txt_tel'];
    	}
    	//发送短信
    	$m = Keke_sms::instance()->send($txt_tel,$tar_content);
    	Keke::show_msg($m,"admin/config_msg/send",'success');
    	/* }else{
    		Keke::show_msg($_lang['sms_send_fail'],"admin/config_msg/send",'warning');
    			
    	} */
    	
    }
    /**
     * 短信发送获取用户信息
     */
    function action_get_user(){
    	global $_lang;
    	$u  = $_POST['u'];
    	$type= $_POST['type'];
    	//判断条件是UID 还是username
    	$type=='uid' and $where=" uid='$u' " or $where=" INSTR(username,'$u')>0 ";
    	//获取用户信息
    	$user_info=Dbfactory::get_one(" select uid,username,phone,mobile from ".TABLEPRE."witkey_space where $where ");
    	if(!$user_info){
    		//查无此人
    		Keke::echojson($_lang['he_came_from_mars'],'3'); 
    	}else{
    		if(!$user_info['mobile']){
    			//此人没有手机
    			Keke::echojson($_lang['no_record_of_his_cellphone'],'2'); 
    		}else{
    			//手机找到了
    			Keke::echojson($user_info['mobile'],'1'); 
    		}
    	}
    }
    /**
     * 短信模板列表
     */
    function action_tpl(){
    	global $_K,$_lang;
    	if($_POST['hdn']){
    		//批量保成提交的数据
    		//列表的上的主键数组
    		foreach ($_POST['hdn'] as $k1=>$v1){
    			//判断当前行是否有checked
    			if($_POST['ckb'][$k1]){
    				//循环checked的值，没有checked的赋零
    				foreach ($_POST['ckb'] as $k=>$v ){
    					$v['send_msg'] = intval($v['send_msg'])+0;
    					$v['send_mail'] = intval($v['send_mail'])+0;
    					$v['send_sms'] = intval($v['send_sms'])+0;
    				}
    			}else{
    				//一个都没有选set 0
    				$v['send_msg'] = 0;
    				$v['send_mail'] = 0;
    				$v['send_sms'] = 0;
    			}
    			//字段
    			$columns = array('send_msg','send_mail','send_sms');
    			//值
    			$values = array($v['send_msg'],$v['send_mail'],$v['send_sms']);
    			//条件为每一行
    			$where = "tpl_id = '$k1'";
    			//执行更新
    			DB::update('witkey_msg_tpl')->set($columns)->value($values)->where($where)->execute();
    		}
    		$obj = $_POST['hdn_obj'];
    		if($obj){
    			$uri = "?obj=$obj";
    		}
    		Keke::show_msg($_lang['submit_success'],'admin/config_msg/tpl'.$uri,'success');
    	}
    	//手机，邮件，站内信
    	$message_send_type = keke_global_class::get_message_send_type ();
    	
    	//短信对象 eg (task,service)
		$message_send_obj  = keke_global_class::get_message_send_obj();
		//字段
 		$fields = ' `tpl_id`,`k`,`obj`,`desc`,`on_time`,`send_sms`,`send_mail`,`send_msg`';
		//要查询的字段,在模板中显示用的
		$query_fields = array('tpl_id'=>$_lang['id'],'desc'=>$_lang['name'],'on_time'=>$_lang['time']);
		//总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval($_GET['count']);
		//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/config_msg/tpl";
		//添加编辑的uri,add这个action 是固定的
		$add_uri =  $base_uri.'_add';
		//删除uri,del也是一个固定的，写成其它的，你死定了
		$del_uri = $base_uri.'/del';
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		//这里要口水一下，get_url就是处理查询的条件
		extract($this->get_url($base_uri));
		//查指定类型的文章
		if(isset($_GET['obj'])){
			$obj = $_GET['obj'];
			$where .= " and  obj = '$obj' ";
			$uri .= "&obj=$obj";
		}
		//获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory('witkey_msg_tpl')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		
    	require Keke_tpl::template('control/admin/tpl/config/msg_tpl');
    }
    /**
     * 短信模板编辑
     */
    function action_tpl_add(){
    	global $_K,$_lang;
    	$tpl_id = $_GET['tpl_id'];
    	//模板ID判断
    	if($tpl_id){
    		//模板的数组,下接列表用
    		$msg_tpl_arr = DB::select('tpl_id,k,desc')->from('witkey_msg_tpl')->cached(3600,'keke_msg_tpl')->execute();
    		//模板内容
    		$msg_tpl_info = DB::select('msg_tpl,sms_tpl,send_sms,send_mail,send_msg')->from('witkey_msg_tpl')->where("tpl_id='$tpl_id'")->execute();
    		$msg_tpl_info = $msg_tpl_info[0];
    		//短信类型
    		$message_send_type = keke_global_class::get_message_send_type ();
    	}
    	require Keke_tpl::template('control/admin/tpl/config/msg_tpl_add');
    }
    /**
     * 短信模板信息保存
     */
    function action_tpl_save(){
    	global $_lang;
    	Keke::formcheck($_POST['formhash']);
    	if(!$_POST['hdn_tpl_id']){
    		Keke::show_msg($_lang['submit_fail'],'admin/config_msg/tpl_add?tpl_id='.$_POST['hdn_tpl_id'],'warning');
    	} 
    	$_POST = Keke_tpl::chars($_POST);
    	//是否有发类型
    	if($_POST['ckb']){
    		$send_sms = $_POST['ckb']['send_sms'];
    		$send_msg = $_POST['ckb']['send_msg'];
    		$send_mail = $_POST['ckb']['send_mail'];
    	}else{
    		//没有，set 0
    		$send_sms =  $send_mail = $send_msg = 0;
    	}
    	//邮件模板
    	$msg_tpl = $_POST['txt_msg'];
    	//手机短信模板
    	
    	$sms_tpl = $_POST['txt_sms'];
        $array = array('send_sms'=>$send_sms,
        		'send_mail'=>$send_mail,
        		'send_msg'=>$send_msg,
        		'msg_tpl'=>$msg_tpl,
        		'sms_tpl'=>$sms_tpl);
    	//条件
    	$where = "tpl_id ='{$_POST['hdn_tpl_id']}'";
    	//更新
    	Model::factory('witkey_msg_tpl')->setData($array)->setWhere($where)->update();
    	Keke::show_msg($_lang['submit_succes'],'admin/config_msg/tpl_add?tpl_id='.$_POST['hdn_tpl_id'],'success');
    }
    	
}