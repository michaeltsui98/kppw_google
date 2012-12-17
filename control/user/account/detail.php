<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-基本资料
 * @author Michael
 * @version 3.0
   2012-12-11
 */

class Control_user_account_detail extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'detail';
	/**
	 * 工作经历
	 */
	function action_index(){
		$where = "uid = $this->uid";
		$works  = DB::select()->from('witkey_member_work')->where($where)->execute();
		$inc_indus = self::$inc_indus;
		$inc_job = self::$inc_job;
		
		$year = $this->get_year();
		
		require Keke_tpl::template('user/account/work_list');
	}
	/**
	 * 工作经历保存
	 */
	function action_work_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		
		$wid = $_POST['wid'];
		$inc_name = $_POST['inc_name'];
		$inc_indus = $_POST['inc_indus'];
		$inc_job = $_POST['inc_job'];
		$inc_time1 = $_POST['inc_time1'];
		$inc_time2 = $_POST['inc_time2'];
		$data = array_map(NULL, $wid,$inc_name,$inc_indus,$inc_job,$inc_time1,$inc_time2);
		if(Keke_valid::not_empty($data)===FALSE){
			Keke::show_msg('提交失败','user/account_detail','error');
		}
		foreach ($data as $v){
			$columns = array('uid','inc_name','inc_indus','inc_time','inc_job');
		    $values = array($this->uid,$v[1],$v[2],$v[4].','.$v[5],$v[3]);
		  	if($v[0]){
				$where = "wid = $v[0]";
				DB::update('witkey_member_work')->set($columns)->value($values)->where($where)->execute();
			}else{
				DB::insert('witkey_member_work')->set($columns)->value($values)->execute();
			}
		}
		Keke::show_msg('提交成功','user/account_detail');
	}
	/**
	 * 工作经历删除 
	 */
	function action_work_del(){
		$wid = $_GET['wid'];
		DB::delete('witkey_member_work')->where("wid = $wid and uid = $this->uid")->execute();
	}
	/**
	 * @var 公司行业
	 */
	public static $inc_indus = array(
			'互联网',
			'计算机业',
			'通讯电子',
			'商业',
			'服务行业',
			'教育业',
			'制造业',
			'金融业',
			'政府部门',
			'学生',
			'失业中'
			);
	/**
	 * @var 公司职称
	 */
	public static $inc_job = array(
			
			'经理人',
			'市场营销/广告/公关',
			'销售/客户',
			'商务/采购/贸易',
			'金融证券从业人员',
			'建筑师/结构师/装修装饰',
			'工程师',
			'程序员',
			'美术/创意设计(设计师)',
			'医护人员',
			'财会/审计/统计',
			'法务人员',
			'教师',
			'人力资源',
			'行政/文秘',
			'编辑/记者',
			'翻译',
			'公务员',
			'科研人员',
			'物流管理',
			'警察',
			'军人',
			'演艺人员',
			'自由职业',
			'客户服务/技术支持',
			'产业工人',
			'农业经营者',
			'美容美发师',
			'其它'
				
	);
	
	/**
	 * 技能证书
	 */
	function action_skill(){
		$where = "uid = $this->uid";
		$certs = DB::select()->from('witkey_member_cert')->where($where)->execute();
		$year = $this->get_year();
	    //global $_K;
	    //$_K['is_rewrite']=1;
	    
	    require Keke_tpl::template('user/account/skill');
	}
	/**
	 * 技能证书保存
	 */
	function action_skill_save(){
		$cid = $_POST['cid'];
		$name = $_POST['name'];
		$year = $_POST['year'];
		$res = (array)keke_file_class::upload_file('pic');
		$pics = array();
	 
		foreach ($_FILES['pic']['name'] as $k=>$v){
			    if($v){
					$pics[$k] = array_shift($res);
			    }else{
			    	$pics[$k]= null;
			    }
		}
		 
		$data = array_map(NULL,$cid,$name,$year,$pics);
		
		foreach ($data as $v){
			$columns = array('cid','uid','name','year','pic');
			$values = array($v[0],$this->uid,$v[1],$v[2],$v[3]);
			$arr = array_combine($columns, $values);
			if($v[0]){
				Model::factory('witkey_member_cert')->setData($arr)->setWhere("cid=$v[0]")->update();
			}else{
				Model::factory('witkey_member_cert')->setData($arr)->create();
			}
		}
		$this->request->redirect('user/account_detail/skill');
	}
	/**
	 * 持能证书删除 
	 */
	function action_skill_del(){
		$cid = $_GET['cid'];
		$pic = $_GET['pic'];
		$res = Model::factory('witkey_member_cert')->setWhere("cid = $cid and uid = $this->uid")->del();
		if($res){
			unlink(S_ROOT.$pic);
		}
	}
	/**
	 * 持能标签
	 */
	function action_skill_tag(){
		$where = "uid = $this->uid";
		//用户的技能
		$sql = "select group_concat(b.skill_id) skill_id, GROUP_CONCAT(b.skill_name) as skill_name from :keke_witkey_skill b \n".
				"right join :keke_witkey_space a on \n".
				"FIND_IN_SET(b.skill_id,a.skill_ids)\n".
				"where a.uid=:uid\n".
				"GROUP BY a.uid";
	    $skills = DB::query($sql)->tablepre(':keke_')->param(':uid', $this->uid)->get_one()->execute();	
		
	    //用户选中的技能
		if(Keke_valid::not_empty($skills['skill_id'])){
	    	$skill_name = explode(',', trim($skills['skill_name'],','));
	    	$skill_id = explode(',', trim($skills['skill_id'],','));
	    	$skills = array_combine($skill_id, $skill_name);
		}else{
			$skills = NULL;
		}
		
		//行业树
	    $indus_arr =  Sys_indus::get_indus_tree(0);
	    
	    //随机取六个标签
	    $sql = "SELECT skill_id,skill_name \n".
				"FROM `:keke_witkey_skill` AS t1 JOIN \n".
				"(SELECT ROUND(RAND() * (SELECT MAX(skill_id) FROM `:keke_witkey_skill`)) AS id) AS t2 \n".
				"WHERE t1.skill_id >= t2.id \n".
				"ORDER BY t1.skill_id ASC LIMIT 6";
	    $tags = DB::query($sql)->tablepre(':keke_')->execute();
	    
	    require Keke_tpl::template('user/account/skill_tag');
	}
	/**
	 * 技能标签保存
	 */
	function action_tag_save(){
		//用户选中的技能数组
		$skills = $_POST['skill'];
		
		$use_skill = DB::select('skill_ids')->from('witkey_space')->where("uid= $this->uid")->get_count()->execute();
		if($use_skill){
			$use_skill = explode(',', trim($use_skill,','));
		}else{
			$use_skill = array();
		}
		//用户之前选中技能
		$c = sizeof((array)$use_skill);
		if($c>=5){
			Keke::show_msg('只能选五个技能','user/account_detail/skill_tag','info');
		}
		
		$n = array_merge($use_skill,$skills);
		$n = array_unique($n);
		
		//将已选 的与现在选 的合并后，只取前面五个
		
		$t = array();
		 
		$s = sizeof($n);
		//只取前五个
		while ($i<$s){
			$i++;
			if($i>5){
				break;
			}
			$t[]  = array_shift($n);			
		}
		
		//转成字符串
		$tags = implode(',', $t);
		if($tags){
			$sql = "update :keke_witkey_space set skill_ids = '$tags' where uid = $this->uid";
			DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
		}
		$this->request->redirect('user/account_detail/skill_tag');
	}
	/**
	 * ajax 显示 行业对应的标签
	 */
	function action_get_tag(){
		$indus = $_GET['indus'];
		$res = (array)DB::select('skill_id,skill_name')->from('witkey_skill')->where("indus_id=$indus")->execute();
		if(Keke_valid::not_empty($res)===FALSE){
			return ;
		}
		foreach ($res as $k=>$v){
		  echo  "<input id=\"s$k\" type=\"checkbox\" name=\"skill[]\" value=\"{$v['skill_id']}\"><label for=\"s$k\">{$v['skill_name']}</label>";
		}
	}
	/**
	 * 技能标签删除
	 */
	function action_tag_del(){
		$tag_id  = $_GET['tag'];
		
		$skill_ids  = DB::select('skill_ids')->from('witkey_space')->get_count()->where("uid = $this->uid")->execute();
		$skill_ids = explode(',', $skill_ids);
		
		$skill_ids = array_flip($skill_ids);
		unset($skill_ids[$tag_id]);
		$skill_ids = array_flip($skill_ids);
		
		$skill_ids = implode(',', $skill_ids);
		
		DB::update('witkey_space')->set(array('skill_ids'))->value(array($skill_ids))->where("uid=$this->uid")->execute();

	}
	
	/**
	 * 最近的20年
	 * @return  array
	 */
	function get_year(){
		$y = date('Y',(int)SYS_START_TIME);
		$o = array();
		for($i=0;$i<=20;$i++){
		    $o[] = ($y-$i);	
		}
		return $o;
	}
}