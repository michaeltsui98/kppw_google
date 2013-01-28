<?php  defined('IN_KEKE') or die('access is denied');
/**
 * ��ͼ����,����ϵͳ���õĵ�ͼ�ӿڵ��ö�Ӧ�ĵ�ͼ
 * @author Michaeltsui98
 * @version 3.0 
 * @example  
 * ���������ʾ��Map::get_instance()->show($point); 
 * $arr=array(task_id,task_title,uid,user_name,start_time)
 * ����������ʾ��Map::get_instance()->set_task_marker($arr)->show();
 */
class Map {
   /**
    * @var ����
    */
	private $_point=NULL;
	/**
	 * @var ��ַ
	 */
	private $_addr=NULL;
	
	private $_default_addr = NUll;
	/**
	 * @var ���,�����Ƕ��
	 */
	private $_marks = array();
	
	private  $_px=array();
	
	private $_py = array();
	
	private $_html= array();
	
 	static private  $instance = NULL;
 	
 	const DEFAULT_MAP = 'baidu';
 	
 	static private $map = NULL;
 	
	static function get_instance($name = NULL){
		if($name ===NULL){
	        self::$map = self::DEFAULT_MAP;		
		}else{
			self::$map = $name;
		}
		
	    if(self::$instance===NULL){
	    	return self::$instance = new self();
	    }
	    return self::$instance;	
	}
	
	function show($point=NULL,$addr=NULL){
		//global $_K;
		$this->_point = $point;
		$this->_addr = $addr;
		
		if($point===NULL AND $addr ===NULL){
			$this->get_addr_by_ip();
			$this->_addr = $this->_default_addr;
		}
		if(self::$map==='baidu'){
			$this->baidu();
		}elseif(self::$map==='google'){
			$this->google();
		}
	}
	
	function baidu(){
		
		$addr = $this->_addr;
		
		$pxs= implode(',', $this->_px);
		$pys = implode(',', $this->_py);
		$arr  = implode('[@]', $this->_html);
		
		if(Keke_valid::not_empty($this->_point)){
			list($px,$py) = explode(',',$this->_point);
		}
		
		
		
		require Keke_tpl::template('map_baidu');
	}
	
	function google(){
		
		$addr = $this->_addr;
		$pxs= implode(',', $this->_px);
		$pys = implode(',', $this->_py);
		$arr  = implode('[@]', $this->_html);
		
		if(Keke_valid::not_empty($this->_point)){
			list($px,$py) = explode(',',$this->_point);
		}
		
		require Keke_tpl::template('map_google');
	}
	
	function set_task_marker($arr){
		$px = array();
		$py = array();
		$html = array();
		foreach ($arr as $k=>$v){
			if(Keke_valid::not_empty($v['point'])==TRUE){
				list($x,$y) = explode(',', $v['point']);
				$px[] = $x;
				$py[] = $y;
				$html[]  = $this->show_task_info($v);
			}
		}
		$this->_px  = $px;
		$this->_py = $py;
		$this->_html = $html;
		return $this;
	}
	
	/**
	 * ������Ϣ
	 */
	function show_task_info($info){
		$user_avatar = Keke_user_avatar::get_avatar($info['uid']);
		$befor = Date::date_span($info['start_time']);
		$sHtml = "<div class=basic_style map_info>";
		$sHtml .= "<div class=fl_l mr_10>";
		$sHtml .= "<a href=#>";
		$sHtml .= "<img src='".$user_avatar."'  class='pic_small'>";
		$sHtml .= "</a>";
		$sHtml .= "</div><strong>";
		$sHtml .= "<a href=".PHP_URL."/task/".$info['task_id']."   target=_blank>";
		$sHtml .= "".$info['task_title']."";
		$sHtml .= "</a></strong>";
		$sHtml .= "<div class=font12>";
		$sHtml .= "<a href=#  class=font12>".$info['username']."</a>";
		$sHtml .= "</b>&nbsp;&nbsp;".$befor."</div></div>";
		return $sHtml;
	}
	/**
	 * ������Ϣ
	 */
	function show_goods_info(){
		
	}
	/**
	 * ͨ�����˽ӿڵõ���ǰ�û�IP�������Ϣ
	 */
	function get_addr_by_ip(){
		
		$sina='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js';
		
		//$bidu = 'http://fw.qq.com/ipaddress';
		
		$ipinfo  = Keke::curl_request($sina);
		
		$json = rtrim(substr($ipinfo,strpos($ipinfo,'=')+1),';');
		
		$arr  = Keke::json_decode($json,1);
		
		if(CHARSET == 'gbk'){
			$arr = Keke::utftogbk($arr);
		}
		
		$this->_default_addr = $arr['province'].$arr['city'];
		
		return  $arr ;
		
	}

}

