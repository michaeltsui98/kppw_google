<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * [Request_Client_External] HTTP driver performs external requests using the
 * php-http extention. To use this driver, ensure the following is completed
 * before executing an external request- ideally in the application bootstrap.
 * 
 * @example
 * 
 *       // In application bootstrap
 *       Request_Client_External::$client = 'Keke_Request_Client_HTTP';
 * 
 */
class Keke_Request_Client_HTTP extends Keke_Request_Client_External {

	/**
	 * Creates a new `Request_Client` object,
	 * allows for dependency injection.
	 *
	 * @param   array    $params Params
	 * @throws  Keke_exception
	 */
	public function __construct(array $params = array())
	{
		// Check that PECL HTTP supports requests
		if ( ! http_support(HTTP_SUPPORT_REQUESTS))
		{
			throw new Keke_exception('Need HTTP request support!');
		}

		// Carry on
		parent::__construct($params);
	}

	/**
	 * @var     array     curl options
	 * @see     [http://www.php.net/manual/en/function.curl-setopt.php]
	 */
	protected $_options = array();

	/**
	 * Sends the HTTP message [Request] to a remote server and processes
	 * the response.
	 *
	 * @param   Request   request to send
	 * @return  Response
	 */
	public function _send_message(Keke_Request $request)
	{
		$http_method_mapping = array(
			Keke_HTTP_Request::GET     => HTTPRequest::METH_GET,
			Keke_HTTP_Request::HEAD    => HTTPRequest::METH_HEAD,
			Keke_HTTP_Request::POST    => HTTPRequest::METH_POST,
			Keke_HTTP_Request::PUT     => HTTPRequest::METH_PUT,
			Keke_HTTP_Request::DELETE  => HTTPRequest::METH_DELETE,
			Keke_HTTP_Request::OPTIONS => HTTPRequest::METH_OPTIONS,
			Keke_HTTP_Request::TRACE   => HTTPRequest::METH_TRACE,
			Keke_HTTP_Request::CONNECT => HTTPRequest::METH_CONNECT,
		);
        // Create an http request object
		$Keke_HTTP_Request = new HTTPRequest($request->uri(), $http_method_mapping[$request->method()]);

		if ($this->_options)
		{
			// Set custom options
			$Keke_HTTP_Request->setOptions($this->_options);
		}

		// Set headers
		$Keke_HTTP_Request->setHeaders($request->headers()->getArrayCopy());

		// Set cookies
		$Keke_HTTP_Request->setCookies($request->cookie());

		// Set query data (?foo=bar&bar=foo)
		$Keke_HTTP_Request->setQueryData($request->query());

		// Set the body
		if ($request->method() == Keke_HTTP_Request::PUT)
		{
			$Keke_HTTP_Request->addPutData($request->body());
		}
		else
		{
			$Keke_HTTP_Request->setBody($request->body());
		}

		try
		{
			$Keke_HTTP_Request->send();
		}
		catch (HTTPRequestException $e)
		{
			throw new Keke_exception($e->getMessage());
		}
		catch (HTTPMalformedHeaderException $e)
		{
			throw new Keke_exception($e->getMessage());
		}
		catch (HTTPEncodingException $e)
		{
			throw new Keke_exception($e->getMessage());
		}

		// Create the response
		$response = $request->create_response();

		// Build the response
		$response->status($Keke_HTTP_Request->getResponseCode())
			->headers($Keke_HTTP_Request->getResponseHeader())
			->cookie($Keke_HTTP_Request->getResponseCookies())
			->body($Keke_HTTP_Request->getResponseBody());

		return $response;
	}

} // End
