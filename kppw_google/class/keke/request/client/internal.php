<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * Request Client for internal execution
 *
 */
class Keke_Request_Client_Internal extends Keke_Request_Client {

	/**
	 * @var    array
	 */
	protected $_previous_environment;

	/**
	 * Processes the request, executing the controller action that handles this
	 * request, determined by the [Route].
	 *
	 * 1. Before the controller action is called, the [Controller::before] method
	 * will be called.
	 * 2. Next the controller action will be called.
	 * 3. After the controller action is called, the [Controller::after] method
	 * will be called.
	 *
	 * By default, the output from the controller is captured and returned, and
	 * no headers are sent.
	 *
	 *     $request->execute();
	 *
	 * @param   Request $request
	 * @return  Response
	 * @throws  Keke_exception

	 */
	public function execute_request(Keke_Request $request)
	{
		
		// Create the class prefix
		$prefix = 'Control_';

		// Directory
		$directory = $request->directory();

		// Controller
		$controller = $request->controller();

		if ($directory)
		{
			// Add the directory name to the class prefix
			$prefix .= str_replace(array('\\', '/'), '_', trim($directory, '/')).'_';
		}
		// Store the currently active request
		$previous = Request::$current;
        
		// Change the current request to this request
		Request::$current = $request;
		 
		// Is this the initial request
		$initial_request = ($request === Request::$initial);

		
		try
		{
//			echo $prefix.$controller;die();
// 			var_dump(class_exists($prefix.$controller));die;
			if ( ! class_exists($prefix.$controller)){
				throw new Keke_exception('The requested URL :uri was not found on this server. :controller',
									array(':uri' => $request->uri(),':controller'=>$prefix.$controller));
			}
			
			// Load the controller using reflection
			$class = new ReflectionClass($prefix.$controller);

			if ($class->isAbstract())
			{
				throw new Keke_exception('Cannot create instances of abstract :controller',
					array(':controller' => $prefix.$controller));
			}
			
			
			
			// Create a new instance of the controller
			$controller = $class->newInstance($request, $request->response() ? $request->response() : $request->create_response());
			
			$class->getMethod('before')->invoke($controller);
             
			// Determine the action to use
			$action = $request->action();

			$params = $request->param();
			
			// If the action doesn't exist, it's a 404
			if ( ! $class->hasMethod('action_'.$action))
			{
				throw new Keke_exception('The requested URL :uri was not found on this server.',
													array(':uri' => $request->uri()));
			}
			
			$method = $class->getMethod('action_'.$action);
			
			$method->invoke($controller);
			
			// Execute the "after action" method
			$class->getMethod('after')->invoke($controller);
			
			
		}catch (Exception $e){
			// Restore the previous request
			if ($previous instanceof Keke_Request)
			{
				Request::$current = $previous;
			}

			
			// Re-throw the exception
			throw $e;
		}

		// Restore the previous request
		Request::$current = $previous;
		
		 
		//var_dump($request->response());die;
		// Return the response
		return $request->response();
	}
} // End  
