<?php
// Константа:
define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов проекта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

// Автозагрузка классов
include_once($site_path . "servises" . DIRSEP . "Autoloader.php");
spl_autoload_register(array(new Autoloader(), 'getController'));

// Получаем данные запроса и метод (GET или POST)
$data = RestUtils::processRequest();

switch($data->getMethod())  
{  
    case 'get':
    	// получаем данные гет запроса
		$resData = $data->getData();
    	$nameController = "Controller" . ucfirst($resData['route']);
    	
    	if(class_exists($nameController) == false) // false, если класс не найден
    	{
    		RestUtils::sendResponse(400, '', 'text/html');
    		exit();
    	}
    	$controller = new $nameController();
    	$result = (isset($resData['cityId'])) ? $controller->getMarkerId($resData['cityId']) : $controller->getMarkers();
    	
    	RestUtils::sendResponse($result['status'], $result['content'], $result['content_type']);
        break;  
    case 'post':  
        $resData = $data->getData();
    	$controller = new ControllerRating();
		$result = $controller->add_rating($resData);
    	RestUtils::sendResponse($result['status'], $result['content'], $result['content_type']);
        break;
}
?>