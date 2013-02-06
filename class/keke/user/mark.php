<?php
/**
 * �û�������
 * @author michael
 * 2012-10-24
 *
 */
class Keke_user_mark {
    /**
     * ����״̬
     * @return array  
     */
	public static function get_mark_status(){
		return array('1'=>'����','2'=>'����','3'=>'����');
	}  
	
	/**
	 * ������ļ�ֵ��
	 * @return array et 
	 */
	public static function get_aid_name($aid){
		$aids = DB::select()->from('witkey_mark_aid')->cached()->execute();
		$aids = Keke::get_arr_by_key($aids,'aid');
		$aid_arr = explode(',', $aid);
		$t = array();
		foreach($aid_arr as $v){
		 	$t[] = $aids[$v]['aid_name'];
		}
		return $t;
	}
	/**
	 * ������󣬸����û��ĵȼ�������ֵ����������������,�ȼ�
	 * @param int $to_uid ��������
	 * @param string $user_type (buyer,seller)
	 * @param float $obj_cash ���׽��
	 * @param int $mark_state (1,2,3)���в�
	 */
	/* public static function update_user($to_uid,$user_type,$obj_cash,$mark_state){
		$obj_cash = (float)$obj_cash;
		$mark_state = (int)$mark_state;
		$to_uid = (int)$to_uid;
		$arr = self::mark_rule($user_type, $obj_cash, $mark_state);
		$values = array_values($arr);
		 
		$sql = "update `:Pwitkey_space` \n".
				"set `:buyer_credit`=:credit,\n".
				"`:buyer_good_num`= :good_num,\n".
				"`:buyer_total_num`= :total_num \n".
				"where uid = ':uid' ";
		
		 DB::query($sql,Database::UPDATE)->tablepre(':P')->tablepre(':buyer',$user_type)
		 ->tablepre(':credit',$values[0])
		 ->tablepre(':good_num',$values[1])
		 ->tablepre(':total_num',$values[2])
		 ->tablepre(':uid',$to_uid)
		 ->execute();
		 self::update_level($to_uid, $user_type);
	} */
	/**
	 * ��������,����*1������*0.5,����*0
	 */
	/* public static function mark_rule($user_type,$obj_cash,$mark_state){
		$arr = array();
		if($mark_state==1){
			$arr['credit'] = $user_type.'_credit+'.(float)$obj_cash*1;
			$arr['good_num'] = $user_type.'_good_num+1';
			$arr['total_num'] = $user_type.'_total_num+1';
		}elseif($mark_state==2){
			$arr['credit'] = $user_type.'_credit+'.(float)$obj_cash*0.5;
			$arr['good_num'] = $user_type.'_good_num+0';
			$arr['total_num'] = $user_type.'_total_num+1';
		}elseif($mark_state==3){
			$arr['credit'] = $user_type.'_credit+'.(float)$obj_cash*0;
			$arr['good_num'] = $user_type.'_good_num+0';
			$arr['total_num'] = $user_type.'_total_num+1';
		}
		return $arr;
	} */
	/**
	 * �����û�������ֵ������ֵ�����û��ȼ�
	 * @param  $to_uid
	 * @param  $user_type
	 * @return void
	 */
	/* public static function update_level($to_uid,$user_type){
		 $sql = "UPDATE :Pwitkey_space a set a.:buyer_level = \n".
			"(select mark_rule_id from :Pwitkey_mark_rule b \n".
			"where  b.:buyer_value<=a.:buyer_credit order by b.mark_rule_id desc limit 0,1)\n".
			"where a.uid = :uid";
		 DB::query($sql,Database::UPDATE)->tablepre(':P')->tablepre(':buyer', $user_type)
		 ->param(':uid', $to_uid)->execute();
	} */
	/**
	 * ��ȡ�û���ͷ�Σ���ͼ���ַ,������
	 * @param int $uid
	 * @param string $user_type (buyer,seller)
	 * @return array
	 */
	public static function get_title($uid,$user_type=NULL){
		$sql = "select a.g_title title,a.g_ico ico, cast((b.buyer_good_num/b.buyer_total_num)*100 as decimal(10,2)) buyer_good_rate from :keke_witkey_mark_rule a left join :keke_witkey_space b \n".
				"on a.mark_rule_id = b.buyer_level  where b.uid = ':uid'\n".
				"UNION \n".
				"select c.m_title,c.m_ico,cast((b.seller_good_num/b.seller_total_num)*100 as decimal(10,2)) seller_good_rate from :keke_witkey_mark_rule c LEFT JOIN :keke_witkey_space  b \n".
				"on c.mark_rule_id = b.seller_level\n".
				"where b.uid = ':uid'";
		$arr = DB::query($sql)->tablepre(':keke_')->param(':uid', (int)$uid)->execute();
		if($user_type=='buyer'){
			return $arr[0];
		}elseif($user_type=='seller'){
			return $arr[1];
		}
		return $arr;
	}
	/**
	 * �û��ȼ���Ϣ
	 * @param int $uid
	 * @return array()
	 */
	public static function user_level($uid){
		$sql = "select \n".
				"mr.g_title buyer_title,mr.g_ico buyer_ico,\n".
				"IFNULL(cast((s.buyer_good_num/s.buyer_total_num)*100  as decimal(10,2)),0) buyer_good_rate,\n".
				"m.m_title seller_title,m.m_ico seller_ico,\n".
				"IFNULL(cast((s.seller_good_num/s.seller_total_num)*100  as decimal(10,2)),0) seller_good_rate\n".
				"from keke_witkey_space s \n".
				"left join keke_witkey_mark_rule mr\n".
				"on mr.mark_rule_id = s.buyer_level\n".
				"left join keke_witkey_mark_rule m\n".
				"on m.mark_rule_id = s.seller_level \n".
				"where s.uid = :uid ";
		return DB::query($sql)->tablepre('keke_')->param(':uid', $uid)->get_one()->execute();
	}
	
	/**
	 * ����ֵ��Ϊ0
	 * @param float $e
	 * @return number
	 */
	public static function tozero(&$e){
		if(!$e){
			$e=0;
		}
		return $e;
	}
	/**
	 * ����������
	 * @param int $num  ���ǵ�����
	 * @param string $name ÿ�����ǵ�����
	 * @param boolean $disabled �����Ƿ�ɵ�
	 * @param $star_len Ҫ���ɵ����ǵĳ���(���ٿ�),��Щ�ط���Ҫ5��,��Щ�ط���Ҫ10��...
	 * @return input radio html
	 */
	public static function gen_star($num, $name,$disabled=true, $star_len=10) {
		$j = round ( $num * 2 );
		$str = "";
		$s = "";
		$disabled  and $ds = " disabled=\"disabled\" ";
		for($i = 1; $i <= $star_len; $i ++) {
			if ($j == $i){
				$s = " checked ";
			}else{
				$s = "";
			}
			$str .= "<input name=\"star_$name\" type=\"radio\" class=\" star {split:2} star_$name\" value=\"$i\"
			$ds $s />";
				
		}
		$str.="<span id=\"span_star_$name\"></span>";
		//print_r($str);die();
		return  $str;
	}
	
}
