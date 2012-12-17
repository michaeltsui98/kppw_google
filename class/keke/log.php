<?php

class Keke_log {
 
	const EMERGENCY = LOG_EMERG; // 0
	const ALERT = LOG_ALERT; // 1
	const CRITICAL = LOG_CRIT; // 2
	const ERROR = LOG_ERR; // 3
	const WARNING = LOG_WARNING; // 4
	const NOTICE = LOG_NOTICE; // 5
	const INFO = LOG_INFO; // 6
	const DEBUG = LOG_DEBUG; // 7
	const STRACE = 8;
	

	public static $timestamp = 'Y-m-d H:i:s';
	


	public static $write_on_add = FALSE;
	

	protected static $_instance;
	
	/**
	 * @return log
	 */
	public static function instance() {
		if (Log::$_instance === NULL) {
			Log::$_instance = new Log;
			register_shutdown_function ( array (Log::$_instance,'write') );
		}
		return Log::$_instance;
	}
	
	/**
	 *
	 * @var array 要添加的日志信息
	 */
	protected $_messages = array ();
	
	/**
	 *
	 * @var array 日志对象数组
	 */
	protected $_writers = array ();
	
	/**
	 * 指定写日志的对象
	 *
	 * $log->attach($writer);
	 *
	 * @param
	 *        	object Log_Writer instance
	 * @param
	 *        	mixed array of messages levels to write OR max level to write
	 * @param
	 *        	integer min level to write IF $levels is not an array
	 * @return Log
	 */
	public function attach(keke_log_write $writer, $levels = array(), $min_level = 0) {
		if (! is_array ( $levels )) {
			$levels = range ( $min_level, $levels );
		}
		
		$this->_writers ["{$writer}"] = array (
				'object' => $writer,
				'levels' => $levels 
		);
		
		return $this;
	}
	
	/**
	 * 清除日志对象
	 * The same writer object must be used.
	 *
	 * $log->detach($writer);
	 *
	 * @param
	 *        	object Log_Writer instance
	 * @return Log
	 */
	public function detach(keke_log_write $writer) {
		// Remove the writer
		unset ( $this->_writers ["{$writer}"] );
		
		return $this;
	}
	
	/**
 	 *  生成日志
	 * $log->add(Log::ERROR, 'Could not locate user: :user', array(
	 * ':user' => $username,
	 * ));
	 *
	 * @param
	 *        	string level of message
	 * @param
	 *        	string message body
	 * @param
	 *        	array values to replace in the message
	 * @return Log
	 */
	public function add($level, $message, array $values = NULL) {
		if ($values) {
			// Insert the values into the message
			$message = strtr ( $message, $values );
		}
		
		// Create a new message and timestamp it
		$this->_messages [] = array (
				'time' => date(Log::$timestamp, time() ),
				'level' => $level,
				'body' => $message 
		);
		
		if (Log::$write_on_add) {
			// Write logs as they are added
			$this->write ();
		}
		
		return $this;
	}
	
	/**
	 * 写日志
	 *
	 * $log->write();
	 *
	 * @return void
	 */
	public function write() {
		 
		if (empty ( $this->_messages )) {
			// There is nothing to write, move along
			return;
		}
		 
		// Import all messages locally
		$messages = $this->_messages;
		
		// Reset the messages array
		$this->_messages = array ();
	 	foreach ( $this->_writers as $writer ) {
			if (empty ( $writer ['levels'] )) {
				// Write all of the messages
				$writer ['object']->write ( $messages );
			} else {
				// Filtered messages
				$filtered = array ();
				
				foreach ( $messages as $message ) {
					if (in_array ( $message ['level'], $writer ['levels'] )) {
						// Writer accepts this kind of message
						$filtered [] = $message;
					}
				}
				
				// Write the filtered messages
				$writer ['object']->write ( $filtered );
			}
		}
	}
}
