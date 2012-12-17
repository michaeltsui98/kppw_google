<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * Abstract controller class. Controllers should only be created using a [Request].
 *
 * Controllers methods will be automatically called in the following order by
 * the request:
 *
 *     $controller = new Controller_Foo($request);
 *     $controller->before();
 *     $controller->action_bar();
 *     $controller->after();
 *
 * The controller action should add the output it creates to
 * `$this->response->body($output)`, typically in the form of a [View], during the
 * "action" part of execution.
 *
 * @package    Kohana
 * @category   Controller
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
abstract class Keke_Controller {

	/**
	 * @var  Request  Request that created the controller
	 */
	public $request;

	/**
	 * @var  Response The response that will be returned from controller
	 */
	public $response;
    
	public $_url;
	
	/**
	 * @var 列表页上的默认排序字段
	 */
	public $_default_ord_field;
	
	/**
	 * Creates a new controller instance. Each controller must be constructed
	 * with the request object that created it.
	 *
	 * @param   Request   $request  Request that created the controller
	 * @param   Response  $response The request's response
	 * @return  void
	 */
	public function __construct(Keke_Request $request, Keke_Response $response)
	{
		// Assign the request to the controller
		$this->request = $request;

		// Assign a response to the controller
		$this->response = $response;
	}

	/**
	 * Automatically executed before the controller action. Can be used to set
	 * class properties, do authorization checks, and execute other custom code.
	 *
	 * @return  void
	 */
	public function before()
	{
		// global $_K;
		// $this->_K = $_K;
		 //$this->_url = BASE_URL.'/'.$this->request->url();
		// Nothing by default
	}

	/**
	 * Automatically executed after the controller action. Can be used to apply
	 * transformation to the request response, add extra output, and execute
	 * other custom code.
	 *
	 * @return  void
	 */
	public function after()
	{
		
		// Nothing by default
	}
	/**
	 * 获取数据分页，排序的uri 
	 * @param string $base_uri
	 * @return multitype:string number
	 */
	function get_url($base_uri){
		$r = array();
		//初始化where的值
		$where = ' 1=1 ';
		if(strpos($base_uri, '?')!==false){
			$query_uri = '&';
		}else{
			$query_uri = '?';
		}
		
		//字段与条件
		if($_GET['slt_fields']  and $_GET['txt_condition']){
			//时间的查询处理,时间字段须含有time，这里有点不严谨，不好判断这个字段是不是时间字段,蛋疼!
			if(strtotime($_GET['txt_condition']) and strpos($_GET['slt_fields'], 'time')!==false){
				//字段值为时间时
				$c =  $_GET['txt_condition'];
				//这里的数据库中的on_time 字段必须是时间戳
				$f =  "FROM_UNIXTIME(`{$_GET['slt_fields']}`,'%Y-%m-%d')";
	
			}else{
				//非时间的条件
				$c = $_GET['txt_condition'];
				$f = "{$_GET['slt_fields']}";
			}
			//如果是like 条件的值要加%
			if($_GET['slt_cond']=='like'){
				$c = "%$c%";
			}
			//拼接url字段
			$where .= "and $f {$_GET['slt_cond']} '$c'";
				
			$query_uri .= "slt_cond={$_GET['slt_cond']}";
			$query_uri .= "&slt_fields={$_GET['slt_fields']}&txt_condition={$_GET['txt_condition']}";
		}
		if($_GET['page_size']){
			$query_uri .= '&page_size='.$_GET['page_size'];
		}
		//页数
		$_GET['page'] and $page = $_GET['page'] or $page = 1;
	    //将页数加到uri上去
	    $query_uri .= '&page='.$page;
		//排序的uri,f表示要排序的字段
		if($_GET['f']){
			$query_uri .= '&f='.$_GET['f'].'&ord='.$_GET['ord'];
		}
		//查询uri
		$uri = $base_uri.$query_uri;
		//设置默认排序字段
		if(!isset($_GET['f'])){
			//默认按时间排序
			$_GET['f'] = $this->_default_ord_field;
			//默认按降序排
			$_GET['ord'] = 0;
		}
		//排序标记，定义js 中的变量
		//升序
		if(isset($_GET['ord']) and $_GET['ord']==1){
			$ord_tag = 0;
			$ord_char = '↑';
			//降序
		}elseif(isset($_GET['ord']) and $_GET['ord']==0){
			$ord_tag = 1;
			$ord_char = '↓';
		}
	
	
		//排序的条件
		if(isset($_GET['f'])){
			//$ord_tag 等于1为降序，否则为升序
			$t = $ord_tag==1?'desc':'asc';
			//生成排序条件
			$order = " order by {$_GET['f']} $t ";
		}
		$r['where'] = $where;
		$r['query_uri'] =$query_uri;
		$r['uri'] = $uri;
		$r['ord_tag']=$ord_tag;
		$r['ord_char']=$ord_char;
		$r['order'] = $order;
		$r['page']=$page;
		return $r;
	}
	/**
	 * 刷新当前页面
	 */
	function refer(){
		$this->request->redirect($this->request->referrer());
	}

} // End Controller
