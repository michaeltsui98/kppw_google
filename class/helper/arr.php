<?php defined ( 'IN_KEKE' ) or die ( 'Access Dinied' );

class Arr {
	/**
	 * Tests if an array is associative or not.
	 *
	 *     // Returns TRUE
	 *     Arr::is_assoc(array('username' => 'john.doe'));
	 *
	 *     // Returns FALSE
	 *     Arr::is_assoc('foo', 'bar');
	 *
	 * @param   array   $array  array to check
	 * @return  boolean
	 */
	public static function is_assoc(array $array)
	{
		// Keys of the array
		$keys = array_keys($array);
	
		// If the array keys of the keys match the keys, then the array must
		// not be associative (e.g. the keys array looked like {0:0, 1:1...}).
		return array_keys($keys) !== $keys;
	}
	/**
	 * Test if a value is an array with an additional check for array-like objects.
	 *
	 *     // Returns TRUE
	 *     Arr::is_array(array());
	 *     Arr::is_array(new ArrayObject);
	 *
	 *     // Returns FALSE
	 *     Arr::is_array(FALSE);
	 *     Arr::is_array('not an array!');
	 *     Arr::is_array(Database::instance());
	 *
	 * @param   mixed   $value  value to check
	 * @return  boolean
	 */
	public static function is_array($value)
	{
		if (is_array($value))
		{
			// Definitely an array
			return TRUE;
		}
		else
		{
			// Possibly a Traversable object, functionally the same as an array
			return (is_object($value) AND $value instanceof Traversable);
		}
	}
	/**
	 * Fill an array with a range of numbers.
	 *
	 *     // Fill an array with values 5, 10, 15, 20
	 *     $values = Arr::range(5, 20);
	 *
	 * @param   integer $step   stepping
	 * @param   integer $max    ending number
	 * @return  array
	 */
	public static function range($step = 10, $max = 100)
	{
		if ($step < 1)
			return array();
	
		$array = array();
		for ($i = $step; $i <= $max; $i += $step)
		{
			$array[$i] = $i;
		}
	
		return $array;
	}
	/**
	 * Retrieves muliple single-key values from a list of arrays.
	 *
	 *     // Get all of the "id" values from a result
	 *     $ids = Arr::pluck($result, 'id');
	 *
	 * [!!] A list of arrays is an array that contains arrays, eg: array(array $a, array $b, array $c, ...)
	 *
	 * @param   array   $array  list of arrays to check
	 * @param   string  $key    key to pluck
	 * @return  array
	 */
	public static function pluck($array, $key)
	{
		$values = array();
	
		foreach ($array as $row)
		{
			if (isset($row[$key]))
			{
				// Found a value in this row
				$values[] = $row[$key];
			}
		}
	
		return $values;
	}
	/**
	 * Adds a value to the beginning of an associative array.
	 *
	 *     // Add an empty value to the start of a select list
	 *     Arr::unshift($array, 'none', 'Select a value');
	 *
	 * @param   array   $array  array to modify
	 * @param   string  $key    array key name
	 * @param   mixed   $val    array value
	 * @return  array
	 */
	public static function unshift( array & $array, $key, $val)
	{
		$array = array_reverse($array, TRUE);
		$array[$key] = $val;
		$array = array_reverse($array, TRUE);
	
		return $array;
	}
	
	/**
	 * Recursive version of [array_map](http://php.net/array_map), applies one or more
	 * callbacks to all elements in an array, including sub-arrays.
	 *
	 *     // Apply "strip_tags" to every element in the array
	 *     $array = Arr::map('strip_tags', $array);
	 *
	 *     // Apply $this->filter to every element in the array
	 *     $array = Arr::map(array(array($this,'filter')), $array);
	 *
	 *     // Apply strip_tags and $this->filter to every element
	 *     $array = Arr::map(array('strip_tags',array($this,'filter')), $array);
	 *
	 * [!!] Because you can pass an array of callbacks, if you wish to use an array-form callback
	 * you must nest it in an additional array as above. Calling Arr::map(array($this,'filter'), $array)
	 * will cause an error.
	 * [!!] Unlike `array_map`, this method requires a callback and will only map
	 * a single array.
	 *
	 * @param   mixed   $callbacks  array of callbacks to apply to every element in the array
	 * @param   array   $array      array to map
	 * @param   array   $keys       array of keys to apply to
	 * @return  array
	 */
	public static function map($callbacks, $array, $keys = NULL)
	{
		foreach ($array as $key => $val)
		{
			if (is_array($val))
			{
				$array[$key] = Arr::map($callbacks, $array[$key]);
			}
			elseif ( ! is_array($keys) OR in_array($key, $keys))
			{
				if (is_array($callbacks))
				{
					foreach ($callbacks as $cb)
					{
						$array[$key] = call_user_func($cb, $array[$key]);
					}
				}
				else
				{
					$array[$key] = call_user_func($callbacks, $array[$key]);
				}
			}
		}
	
		return $array;
	}
	/**
	 * Retrieve a single key from an array. If the key does not exist in the
	 * array, the default value will be returned instead.
	 *
	 *     // Get the value "username" from $_POST, if it exists
	 *     $username = Arr::get($_POST, 'username');
	 *
	 *     // Get the value "sorting" from $_GET, if it exists
	 *     $sorting = Arr::get($_GET, 'sorting');
	 *
	 * @param   array   $array      array to extract from
	 * @param   string  $key        key name
	 * @param   mixed   $default    default value
	 * @return  mixed
	 */
	public static function get($array, $key, $default = NULL){
		return isset($array[$key]) ? $array[$key] : $default;
	}
	
	/**
	 * Convert a multi-dimensional array into a single-dimensional array.
	 *
	 *     $array = array('set' => array('one' => 'something'), 'two' => 'other');
	 *
	 *     // Flatten the array
	 *     $array = Arr::flatten($array);
	 *
	 *     // The array will now be
	 *     array('one' => 'something', 'two' => 'other');
	 *
	 * [!!] The keys of array values will be discarded.
	 *
	 * @param   array   $array  array to flatten
	 * @return  array
	 * @since   3.0.6
	 */
	public static function flatten($array)
	{
		$is_assoc = Arr::is_assoc($array);
	
		$flat = array();
		foreach ($array as $key => $value)
		{
			if (is_array($value))
			{
				$flat = array_merge($flat, Arr::flatten($value));
			}
			else
			{
				if ($is_assoc)
				{
					$flat[$key] = $value;
				}
				else
				{
					$flat[] = $value;
				}
			}
		}
		return $flat;
	}
	/**
	 * 按指定的键重新生数组键值对
	 * @param array $arr
	 * @param string $key
	 * @return array
	 */
	public static function get_arr_by_key($arr, $key){
		return keke::get_arr_by_key($arr,$key);
	}
}
 