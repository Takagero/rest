<?php
//header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);

// Константа:
define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов проекта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

// Автозагрузка классов на лету (стэк)
include_once($site_path . "servises" . DIRSEP . "Autoloader.php");
spl_autoload_register(array(new Autoloader(), 'getController'));

$data = new RestRequest();

switch($data->getMethod())  
{  
    case 'get':
//    	$markers = MarkersRep::getMarkers();
		$markers = array(1=>'a',2=>'b',3=>'c',);
        if($data->getHttpAccept() == 'json')  
        {  
            RestUtils::sendResponse(200, json_encode($markers), 'application/json');  
        }  
        else if ($data->getHttpAccept() == 'xml')  
        {  
            // using the XML_SERIALIZER Pear Package  
            $options = array  
            (  
                'indent' => '     ',  
                'addDecl' => false,  
                'rootName' => '',  
                XML_SERIALIZER_OPTION_RETURN_RESULT => true  
            );  
            $serializer = new XML_Serializer($options);  
  
            RestUtils::sendResponse(200, $serializer->serialize($markers), 'application/xml');  
        }
        break;  
    case 'post':  
        echo "This is POST"; 
        break;
} 
?>