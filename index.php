<?php
header('Content-Type: text/html; charset=utf-8');
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
        // retrieve a list of users
        echo "THis is List!";  
        break;  
    case 'post':  
        $user = new User();  
        $user->setFirstName($data->getData()->first_name);  // just for example, this should be done cleaner  
        // and so on...  
        $user->save();  
        break;  
    // etc, etc, etc...  
} 
?>






<pre>
<?php
//var_dump(RestUtils::processRequest());
?>
</pre>