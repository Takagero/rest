<?php
error_reporting(E_ALL);

// Константа:
define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов проекта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

// Автозагрузка классов на лету (стэк)
include_once($site_path . "servises" . DIRSEP . "Autoloader.php");
spl_autoload_register(array(new Autoloader(), 'getController'));


$data = RestUtils::processRequest();

switch($data->getMethod())  
{  
    case 'get':
    	
		$resData = $data->getData();
    	$newController = "Controller" . ucfirst($resData['route']);
    	$controller = new $newController();
    	$result = $controller->getMarkers($resData['cityId']);
    	
    	if($data->getHttpAccept() == 'json')  
        {  
//          RestUtils::sendResponse(500, '', 'text/html');
			RestUtils::sendResponse(200, $result, 'application/json '); 
        } 
        break;  
    case 'post':  
        echo "This is POST"; 
        break;
}
?>