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
		// Устанавливаем заголовки
	    $status_header = 'HTTP/1.1 ' . $status . ' ' . RestUtils::getStatusCodeMessage($status);
	    header($status_header);
	    header('Content-type: ' . $content_type . '; charset=utf-8');
	    
	    // если есть контент по запросу то выводим результат на страницу если нет то выводим сообщение об ошибке 
	    if($body != '')  
	    {
	    	echo json_encode($body);
	    }
	    else
	    {
	    	$info = $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'];
	        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $info : $_SERVER['SERVER_SIGNATURE'];  
	  		
	        //подключаем страницу html с выводом ошибки
	        require('template/error/error.php');
	    }  
	}   
  
    public static function getStatusCodeMessage($status)  
    {   
    	//Ответы сервера, желательно вынести в какой-нибудь файл
        $codes = Array(
            200 => 'OK',  
            201 => 'Created',  
            202 => 'Accepted',
            204 => 'No Content',
            400 => 'Bad Request',  
            401 => 'Unauthorized',  
            402 => 'Payment Required',  
            403 => 'Forbidden',  
            404 => 'Not Found',  
            405 => 'Method Not Allowed',  
            406 => 'Not Acceptable',
            412 => 'Precondition Failed',  
            414 => 'Request-URI Too Long',
            417 => 'Expectation Failed',  
            500 => 'Internal Server Error',  
            501 => 'Not Implemented',
            503 => 'Service Unavailable',
            505 => 'HTTP Version Not Supported'  
        );  
  
        return (isset($codes[$status])) ? $codes[$status] : '';  
    }
}

?>