<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź���-��������
 * @author Michael
 * @version 3.0
   2012-12-11
 */

class Control_user_account_detail extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'detail';
	/**
	 * ��������
	 */
	function action_index(){
		$where = "uid = ".self::$uid;
		$works  = DB::select()->from('witkey_member_work')->where($where)->execute();
		$inc_indus = self::$inc_indus;
		$inc_job = self::$inc_job;
		
		$year =Date::get_year();
		
		require Keke_tpl::template('user/account/work_list');
	}
	/**
	 * ������������
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
			Keke::show_msg('�ύʧ��','user/account_detail','error');
		}
		foreach ($data as $v){
			$columns = array('uid','inc_name','inc_indus','inc_time','inc_job');
		    $values = array(self::$uid,$v[1],$v[2],$v[4].','.$v[5],$v[3]);
		  	if($v[0]){
				$where = "wid = $v[0]";
				DB::update('witkey_member_work')->set($columns)->value($values)->where($where)->execute();
			}else{
				DB::insert('witkey_member_work')->set($columns)->value($values)->execute();
			}
		}
		Keke::show_msg('�ύ�ɹ�','user/account_detail');
	}
	/**
	 * ��������ɾ�� 
	 */
	function action_work_del(){
		$wid = $_GET['wid'];
		DB::delete('witkey_member_work')->where("wid = $wid and uid = ".self::$uid)->execute();
	}
	/**
	 * @var ��˾��ҵ
	 */
	public static $inc_indus = array(
			'������',
			'�����ҵ',
			'ͨѶ����',
			'��ҵ',
			'������ҵ',
			'����ҵ',
			'����ҵ',
			'����ҵ',
			'��������',
			'ѧ��',
			'ʧҵ��'
			);
	/**
	 * @var ��˾ְ��
	 */
	public static $inc_job = array(
			
			'������',
			'�г�Ӫ��/���/����',
			'����/�ͻ�',
			'����/�ɹ�/ó��',
			'����֤ȯ��ҵ��Ա',
			'����ʦ/�ṹʦ/װ��װ��',
			'����ʦ',
			'����Ա',
			'����/�������(���ʦ)',
			'ҽ����Ա',
			'�ƻ�/���/ͳ��',
			'������Ա',
			'��ʦ',
			'������Դ',
			'����/����',
			'�༭/����',
			'����',
			'����Ա',
			'������Ա',
			'��������',
			'����',
			'����',
			'������Ա',
			'����ְҵ',
			'�ͻ�����/����֧��',
			'��ҵ����',
			'ũҵ��Ӫ��',
			'��������ʦ',
			'����'
				
	);
	
	/**
	 * ����֤��
	 */
	function action_skill(){
		$where = "uid = self::$uid";
		$certs = DB::select()->from('witkey_member_cert')->where($where)->execute();
		$year = Date::get_year();
	    //global $_K;
	    //$_K['is_rewrite']=1;
	    
	    require Keke_tpl::template('user/account/skill');
	}
	/**
	 * ����֤�鱣��
	 */
	function action_skill_save(){
		$cid = $_POST['cid'];
		$name = $_POST['name'];
		$year = $_POST['year'];
		$res = (array)File::upload_file('pic');
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
			$values = array($v[0],self::$uid,$v[1],$v[2],$v[3]);
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
	 * ����֤��ɾ�� 
	 */
	function action_skill_del(){
		$cid = $_GET['cid'];
		$pic = $_GET['pic'];
		$res = Model::factory('witkey_member_cert')->setWhere("cid = $cid and uid = ".self::$uid)->del();
		if($res){
			unlink(S_ROOT.$pic);
		}
	}
	/**
	 * ���ܱ�ǩ
	 */
	function action_skill_tag(){
		$where = "uid = ".self::$uid;
		//�û��ļ���
		$sql = "select group_concat(b.skill_id) skill_id, GROUP_CONCAT(b.skill_name) as skill_name from :keke_witkey_skill b \n".
				"right join :keke_witkey_space a on \n".
				"FIND_IN_SET(b.skill_id,a.skill_ids)\n".
				"where a.uid=:uid\n".
				"GROUP BY a.uid";
	    $skills = DB::query($sql)->tablepre(':keke_')->param(':uid', self::$uid)->get_one()->execute();	
		
	    //�û�ѡ�еļ���
		if(Keke_valid::not_empty($skills['skill_id'])){
	    	$skill_name = explode(',', trim($skills['skill_name'],','));
	    	$skill_id = explode(',', trim($skills['skill_id'],','));
	    	$skills = array_combine($skill_id, $skill_name);
		}else{
			$skills = NULL;
		}
		
		//��ҵ��
	    $indus_arr =  Sys_indus::get_indus_tree(0);
	    
	    //���ȡ������ǩ
	    $sql = "SELECT skill_id,skill_name \n".
				"FROM `:keke_witkey_skill` AS t1 JOIN \n".
				"(SELECT ROUND(RAND() * (SELECT MAX(skill_id) FROM `:keke_witkey_skill`)) AS id) AS t2 \n".
				"WHERE t1.skill_id >= t2.id \n".
				"ORDER BY t1.skill_id ASC LIMIT 6";
	    $tags = DB::query($sql)->tablepre(':keke_')->execute();
	    
	    require Keke_tpl::template('user/account/skill_tag');
	}
	/**
	 * ���ܱ�ǩ����
	 */
	function action_tag_save(){
		//�û�ѡ�еļ�������
		$skills = $_POST['skill'];
		
		$use_skill = DB::select('skill_ids')->from('witkey_space')->where("uid= ".self::$uid)->get_count()->execute();
		if($use_skill){
			$use_skill = explode(',', trim($use_skill,','));
		}else{
			$use_skill = array();
		}
		//�û�֮ǰѡ�м���
		$c = sizeof((array)$use_skill);
		if($c>=5){
			Keke::show_msg('ֻ��ѡ�������','user/account_detail/skill_tag','info');
		}
		
		$n = array_merge($use_skill,$skills);
		$n = array_unique($n);
		
		//����ѡ ��������ѡ �ĺϲ���ֻȡǰ�����
		
		$t = array();
		 
		$s = sizeof($n);
		//ֻȡǰ���
		while ($i<$s){
			$i++;
			if($i>5){
				break;
			}
			$t[]  = array_shift($n);			
		}
		
		//ת���ַ���
		$tags = implode(',', $t);
		if($tags){
			$sql = "update :keke_witkey_space set skill_ids = '$tags' where uid = ".self::$uid;
			DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
		}
		$this->request->redirect('user/account_detail/skill_tag');
	}
	/**
	 * ajax ��ʾ ��ҵ��Ӧ�ı�ǩ
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
	 * ���ܱ�ǩɾ��
	 */
	function action_tag_del(){
		$tag_id  = $_GET['tag'];
		
		$skill_ids  = DB::select('skill_ids')->from('witkey_space')->get_count()->where("uid = ".self::$uid)->execute();
		$skill_ids = explode(',', $skill_ids);
		
		$skill_ids = array_flip($skill_ids);
		unset($skill_ids[$tag_id]);
		$skill_ids = array_flip($skill_ids);
		
		$skill_ids = implode(',', $skill_ids);
		
		DB::update('witkey_space')->set(array('skill_ids'))->value(array($skill_ids))->where("uid=".self::$uid)->execute();

	}
	

}