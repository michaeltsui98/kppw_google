<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��֤
 * @author �Ž�
 *
 */
class Keke_validation implements ArrayAccess {

	protected  $_data = array();
	protected  $_bind ;
	protected  $_errors;
	protected  $_rules;
	protected  $_labels;
	protected $_empty_rules = array('Keke_valid::not_empty', 'Keke_valid::matches');
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
	//��֤�����ֹд��
	public function offsetSet($index, $newval){
		throw new Keke_exception('valid array is read only!');
	}
	//����ȡֵ
	public function offsetGet($index){
		return $this->_data[$index];
	}
	//����ļ��Ƿ����
	public function offsetExists($offset){
		return isset($this->_data[$offset]);
	}
	//ɾ��ָ��Ԫ��
	public function offsetUnset($index){
		throw new Keke_exception('valid array can not delete');
	}
	/**
	 * ���Ƶ�ǰ���󣬲����¸�ֵ
	 * @param array $array
	 * @return Keke_validation
	 */
	public function copy(array $array){
		$copy = clone $this;
		$copy->_data = $array;
		return $copy;
	}
	/**
	 * ���ص�ǰ�������֤����
	 */
	public function data(){
		return $this->_data;
	}
	/**
	 * ���ֶ�ָ������
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
	 * ���ֶ�ָ���������
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
	 * ���󶨵Ĳ�����ֵ
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
 
		// �µ����ݼ�
		$data = $this->_errors = array();
		
		// ����ԭ�����ݣ���ֹ�޸ĺ�������֤
		$original = $this->_data;
		
		// ��ȡ�ֶεı��ʽ
		$expected = array_keys($original)+array_keys($this->_labels);
		
		// ���뱾�صĹ��� 
		$rules     = $this->_rules;
		
		foreach ($expected as $field)
		{
			// �ύ����Ϊ�գ�����Ϊ��
			$data[$field] = $this[$field];  
		
			if (isset($rules[TRUE]))
			{
				if ( ! isset($rules[$field]))
				{
					// �����ֶεĹ���
					$rules[$field] = array();
				}
		
				// ׷���ֶεĹ���
				$rules[$field] = array_merge($rules[$field], $rules[TRUE]);
			}
		}
		
		// ����Data
		$this->_data = $data;
		
		// ɾ���Ѿ���֤���Ĺ���
		unset($rules[TRUE]);
		
		
		$this->bind(':validation', $this);
		
		$this->bind(':data', $this->_data);
		
		// ִ�й���
		foreach ($rules as $field => $set)
		{
			// ��ȡ�ֶε�ֵ
			$value = $this[$field];
		
			// ���ֶε�������ֵ
			$this->bind(array(':field' => $field,':value' => $value,));
			
			foreach ($set as $array)
			{
				// ����Ĳ���
				list($rule, $params) = $array;
		      
				foreach ($params as $key => $param)
				{
					if (is_string($param) AND array_key_exists($param, $this->_bound))
					{
						// �滻�󶨵�ֵ
						$params[$key] = $this->_bound[$param];
					}
				}
				
				// Ĭ�ϵĴ�������
				$error_name = $rule;
		        if (is_array($rule))
				{
					// ��������
					if (is_string($rule[0]) AND array_key_exists($rule[0], $this->_bound))
					{
						// �滻�󶨵�ֵ
						$rule[0] = $this->_bound[$rule[0]];
					}
		
					// �ص��жϹ����Ƿ�ͨ��
					$error_name = $rule[1];
					
					$passed = call_user_func_array($rule, $params);
				}
				elseif ( ! is_string($rule))
				{
					// lamde ����
					$error_name = FALSE;
					$passed = call_user_func_array($rule, $params);
				}
				elseif (method_exists('Keke_valid', $rule))
				{
					// ʹ�ö���ķ���
					$method = new ReflectionMethod('Keke_valid', $rule);
					
					// ���þ�̬����
					$passed = $method->invokeArgs(NULL, $params);
					
				}
				elseif (strpos($rule, '::') === FALSE)
				{
					
					$function = new ReflectionFunction($rule);
		
					// ���÷Ǿ�̬����
					$passed = $function->invokeArgs($params);
				}
				else
				{
					
					//�ָ����뷽��
					list($class, $method) = explode('::', $rule, 2);
					
					//���þ�̬����
					$method = new ReflectionMethod($class, $method);
		
					// ͨ��ӳ����÷���
					$passed = $method->invokeArgs(NULL, $params);
					
					
				}
// 				var_dump($this->_empty_rules,$rule);die;
				// ���ֶ�Ϊ��ʱ������ѭ��
				if ( ! in_array($rule, $this->_empty_rules) AND ! Keke_valid::not_empty($value))
					continue;
				
				if ($passed === FALSE AND $error_name !== FALSE)
				{
					 
					// ������֤����Ĺ���
					$this->error($field, $error_name, $params);
		
					// �ֶ���֤ʧ�ܣ��˳�ѭ��
					break;
				}
			}
		}
		
		// ����data
		$this->_data = $original;
		return empty($this->_errors);
	}
	
	public function error($field, $error, array $params = NULL){
		$this->_errors[$field] = array($error, $params);
		return $this;
	}
	/**
	 * ���ش�����Ϣ
	 * @param $file  ����������ļ�
	 * @return $errors array
	 */
	public function errors($out_html=TRUE,$file = NULL)
	{
		if ($file === NULL and $out_hmtl===FALSE){
			return $this->_errors;
		}
		if($out_html === TRUE){
		    
			foreach ($this->_errors as $k=>$v){
				if($v[1][2]){
					$h.=$v[1][2].PHP_EOL;
				}else{
					list($i,$j) = explode('::', $v[0]);
					$h .= $k.'��'.$j.'Ϊ'.$v[1][1].PHP_EOL;
				}
			}
			return $h;
		}
	}
}
 
?>