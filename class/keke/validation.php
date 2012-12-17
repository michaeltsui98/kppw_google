<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 验证
 * @author 九江
 *
 */
class Keke_validation implements ArrayAccess {

	protected  $_data = array();
	protected  $_bind ;
	protected  $_errors;
	protected  $_rules;
	protected  $_labels;
	protected $_empty_rules = array('not_empty', 'matches');
	/**
	 * 
	 * @param array $arr
	 * @return  Keke_validation
	 */
	public static function factory(array $arr){
		return new Keke_validation($arr);
	}
	public function __construct(array $array){
		$this->_data = $array;
	}
	//验证数组禁止写入
	public function offsetSet($index, $newval){
		throw new Keke_exception('valid array is read only!');
	}
	//按键取值
	public function offsetGet($index){
		return $this->_data[$index];
	}
	//数组的键是否存在
	public function offsetExists($offset){
		return isset($this->_data[$offset]);
	}
	//删除指定元素
	public function offsetUnset($index){
		throw new Keke_exception('valid array can not delete');
	}
	/**
	 * 复制当前对象，并重新赋值
	 * @param array $array
	 * @return Keke_validation
	 */
	public function copy(array $array){
		$copy = clone $this;
		$copy->_data = $array;
		return $copy;
	}
	/**
	 * 返回当前对象的验证数组
	 */
	public function data(){
		return $this->_data;
	}
	/**
	 * 给字段指定规则
	 * @param $field 
	 * @param $rule
	 * @param array $params
	 * @return Keke_validation
	 */
	public function rule($field,$rule,array $params=NULL){
		if($params === NULL){
			$params = array(':value');
		}
		if ($field !== TRUE AND ! isset($this->_labels[$field])){
			$this->_labels[$field] = preg_replace('/[^\pL]+/u', ' ', $field);
		}
		$this->_rules[$field][] = array($rule,$params);
		return $this;
	}
	/**
	 * 给字段指定多个规则
	 * @param  $field
	 * @param  $rules
	 * @return Keke_validation
	 */
	public function rules($field,$rules){
		foreach ($rules as $rule){
			$this->rule($field, $rule[0],$rule[1]);
		}
		return $this;
	}
	/**
	 * 给绑定的参数赋值
	 * @param  $k
	 * @param  $v
	 * @return Keke_validation
	 */
	public function bind($k,$value=null){
		if (is_array($k))
		{
			foreach ($k as $name => $value)
			{
				$this->_bound[$name] = $value;
			}
		}
		else
		{
			$this->_bound[$k] = $value;
		}

		return $this;
	}
	
	public function check(){
 
		// 新的数据集
		$data = $this->_errors = array();
		
		// 保存原有数据，访止修改后再做验证
		$original = $this->_data;
		
		// 获取字段的表达式
		$expected = array_keys($original)+array_keys($this->_labels);
		
		// 导入本地的规则 
		$rules     = $this->_rules;
		
		foreach ($expected as $field)
		{
			// 提交数据为空，或者为空
			$data[$field] = $this[$field];  
		
			if (isset($rules[TRUE]))
			{
				if ( ! isset($rules[$field]))
				{
					// 重置字段的规则
					$rules[$field] = array();
				}
		
				// 追加字段的规则
				$rules[$field] = array_merge($rules[$field], $rules[TRUE]);
			}
		}
		
		// 重置Data
		$this->_data = $data;
		
		// 删除已经验证过的规则
		unset($rules[TRUE]);
		
		
		$this->bind(':validation', $this);
		
		$this->bind(':data', $this->_data);
		
		// 执行规则
		foreach ($rules as $field => $set)
		{
			// 获取字段的值
			$value = $this[$field];
		
			// 绑定字段的名称与值
			$this->bind(array(':field' => $field,':value' => $value,));
		
			foreach ($set as $array)
			{
				// 规则的参数
				list($rule, $params) = $array;
		      
				foreach ($params as $key => $param)
				{
					if (is_string($param) AND array_key_exists($param, $this->_bound))
					{
						// 替换绑定的值
						$params[$key] = $this->_bound[$param];
					}
				}
		
				// 默认的错误名称
				$error_name = $rule;
		        if (is_array($rule))
				{
					// 开启规则
					if (is_string($rule[0]) AND array_key_exists($rule[0], $this->_bound))
					{
						// 替换绑定的值
						$rule[0] = $this->_bound[$rule[0]];
					}
		
					// 回调判断规则是否通过
					$error_name = $rule[1];
					$passed = call_user_func_array($rule, $params);
				}
				elseif ( ! is_string($rule))
				{
					// lamde 方法
					$error_name = FALSE;
					$passed = call_user_func_array($rule, $params);
				}
				elseif (method_exists('Keke_valid', $rule))
				{
					// 使用对象的方法
					$method = new ReflectionMethod('Keke_valid', $rule);
					
					// 调用静态方法
					$passed = $method->invokeArgs(NULL, $params);
					
				}
				elseif (strpos($rule, '::') === FALSE)
				{
					
					$function = new ReflectionFunction($rule);
		
					// 调用非静态方法
					$passed = $function->invokeArgs($params);
				}
				else
				{
					//分隔类与方法
					list($class, $method) = explode('::', $rule, 2);
		
					//调用静态方法
					$method = new ReflectionMethod($class, $method);
		
					// 通过映射调用方法
					$passed = $method->invokeArgs(NULL, $params);
					
				}
		
				// 当字段为空时，跳出循环
				if ( ! in_array($rule, $this->_empty_rules) AND ! Keke_valid::not_empty($value))
					continue;
		
				if ($passed === FALSE AND $error_name !== FALSE)
				{
					// 保存验证错误的规则
					$this->error($field, $error_name, $params);
		
					// 字段验证失败，退出循环
					break;
				}
			}
		}
		
		// 重置data
		$this->_data = $original;
		return empty($this->_errors);
	}
	
	public function error($field, $error, array $params = NULL){
		$this->_errors[$field] = array($error, $params);
		return $this;
	}
	/**
	 * 返回错误信息
	 * @param $file  错误输出的文件
	 * @return $errors array
	 */
	public function errors($out_html=TRUE,$file = NULL)
	{
		if ($file === NULL and $out_hmtl===FALSE){
			return $this->_errors;
		}
		if($out_html === TRUE){
			foreach ($this->_errors as $k=>$v){
				$h .= '使用：'.$v[0].'验证字段:'.$k.'值'.$v[1][0].'输入错误!'.PHP_EOL;
			}
			return $h;
		}
	}
}
 
?>