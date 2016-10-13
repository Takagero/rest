<?php
class RestUtils  
{  
    public static function processRequest()  
    {
    	
  		// Ловим метод
    	$requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    	
    	$restRequest = new RestRequest();
    	
    	//инициализируем массив для данных запроса
    	$data = array();
    	
    	// Проверяем тип запроса и сохраняем его в переменную
    	switch ($requestMethod) 
    	{
    		case 'get':
    			$data = $_GET;
    			break;
    		case 'post':
    			$data = $_POST;
    			break;
    	}
    	// отправляем на обработку
    	$data['route'] = self::bildUrl($data['route']);
    	
    	//Установка метода запроса, передаваемых данных
    	$restRequest->setMethod($requestMethod);
    	$restRequest->setData($data);
    	
    	return $restRequest;
    }
    
    // Разбираем урл
    public static function bildUrl($data)
    {
    	$data = explode('/', $data);
    	$data = $data[0];
    	return $data;
    }
    
	public static function sendResponse($status, $body, $content_type)  
	{  
	    $status_header = 'HTTP/1.1 ' . $status . ' ' . RestUtils::getStatusCodeMessage($status);
	    // set the status  
	    header($status_header);  
	    // set the content type  
	    header('Content-type: ' . $content_type . '; charset=utf-8');
	    
	    // pages with body are easy  
	    if($body != '')  
	    {  
	        // send the body  
	        var_dump(json_decode($body));
//	        echo json_decode($body);  
	        exit;  
	    }  
	    // we need to create the body if none is passed  
	    else  
	    {  
	        // create some body messages  
	        $message = '';  
	         
	        switch($status)  
	        {  
	            case 401:  
	                $message = 'You must be authorized to view this page.';  
	                break;  
	            case 404:  
	                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';  
	                break;  
	            case 500:  
	                $message = 'The server encountered an error processing your request.';  
	                break;  
	            case 501:  
	                $message = 'The requested method is not implemented.';  
	                break;  
	        }  
	  
	        // servers don't always have a signature turned on (this is an apache directive "ServerSignature On")  
	        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];  
	  
	        require('template/error/error.html');
	        exit();
	    }  
	}   
  
    public static function getStatusCodeMessage($status)  
    {   
        $codes = Array(  
            100 => 'Continue',  
            101 => 'Switching Protocols',  
            200 => 'OK',  
            201 => 'Created',  
            202 => 'Accepted',  
            203 => 'Non-Authoritative Information',  
            204 => 'No Content',  
            205 => 'Reset Content',  
            206 => 'Partial Content',  
            300 => 'Multiple Choices',  
            301 => 'Moved Permanently',  
            302 => 'Found',  
            303 => 'See Other',  
            304 => 'Not Modified',  
            305 => 'Use Proxy',  
            306 => '(Unused)',  
            307 => 'Temporary Redirect',  
            400 => 'Bad Request',  
            401 => 'Unauthorized',  
            402 => 'Payment Required',  
            403 => 'Forbidden',  
            404 => 'Not Found',  
            405 => 'Method Not Allowed',  
            406 => 'Not Acceptable',  
            407 => 'Proxy Authentication Required',  
            408 => 'Request Timeout',  
            409 => 'Conflict',  
            410 => 'Gone',  
            411 => 'Length Required',  
            412 => 'Precondition Failed',  
            413 => 'Request Entity Too Large',  
            414 => 'Request-URI Too Long',  
            415 => 'Unsupported Media Type',  
            416 => 'Requested Range Not Satisfiable',  
            417 => 'Expectation Failed',  
            500 => 'Internal Server Error',  
            501 => 'Not Implemented',  
            502 => 'Bad Gateway',  
            503 => 'Service Unavailable',  
            504 => 'Gateway Timeout',  
            505 => 'HTTP Version Not Supported'  
        );  
  
        return (isset($codes[$status])) ? $codes[$status] : '';  
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    public static function sendResponse($status, $body, $content_type)  
//	{  
//    $status_header = 'HTTP/1.1 ' . $status . ' ' . RestUtils::getStatusCodeMessage($status);  
//    // set the status  
//    header($status_header);  
//    // set the content type  
//    header('Content-type: ' . $content_type);  
//  
//    // pages with body are easy  
//    if($body != '')  
//    {  
//        // send the body  
//        echo $body;  
//        exit;  
//    }  
//    // we need to create the body if none is passed  
//    else  
//    	{  
//        // create some body messages  
//        $message = '';  
//         
//        switch($status)  
//        {  
//            case 401:  
//                $message = 'You must be authorized to view this page.';  
//                break;  
//            case 404:  
//                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';  
//                break;  
//            case 500:  
//                $message = 'The server encountered an error processing your request.';  
//                break;  
//            case 501:  
//                $message = 'The requested method is not implemented.';  
//                break;  
//        }  
//  
//        // servers don't always have a signature turned on (this is an apache directive "ServerSignature On")  
//        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];  
//  
//        // this should be templatized in a real-world solution  
//        include('template/error/error.html');
//        exit;  
//    	} 
//	}   
//  
//    public static function getStatusCodeMessage($status)  
//    {  
//        $codes = Array(  
//            100 => 'Continue',  
//            101 => 'Switching Protocols',  
//            200 => 'OK',  
//            201 => 'Created',  
//            202 => 'Accepted',  
//            203 => 'Non-Authoritative Information',  
//            204 => 'No Content',  
//            205 => 'Reset Content',  
//            206 => 'Partial Content',  
//            300 => 'Multiple Choices',  
//            301 => 'Moved Permanently',  
//            302 => 'Found',  
//            303 => 'See Other',  
//            304 => 'Not Modified',  
//            305 => 'Use Proxy',  
//            306 => '(Unused)',  
//            307 => 'Temporary Redirect',  
//            400 => 'Bad Request',  
//            401 => 'Unauthorized',  
//            402 => 'Payment Required',  
//            403 => 'Forbidden',  
//            404 => 'Not Found',  
//            405 => 'Method Not Allowed',  
//            406 => 'Not Acceptable',  
//            407 => 'Proxy Authentication Required',  
//            408 => 'Request Timeout',  
//            409 => 'Conflict',  
//            410 => 'Gone',  
//            411 => 'Length Required',  
//            412 => 'Precondition Failed',  
//            413 => 'Request Entity Too Large',  
//            414 => 'Request-URI Too Long',  
//            415 => 'Unsupported Media Type',  
//            416 => 'Requested Range Not Satisfiable',  
//            417 => 'Expectation Failed',  
//            500 => 'Internal Server Error',  
//            501 => 'Not Implemented',  
//            502 => 'Bad Gateway',  
//            503 => 'Service Unavailable',  
//            504 => 'Gateway Timeout',  
//            505 => 'HTTP Version Not Supported'  
//        );  
//  
//        return (isset($codes[$status])) ? $codes[$status] : '';  
//    }  
}

?>