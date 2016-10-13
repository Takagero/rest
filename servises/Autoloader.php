<?php
class Autoloader {
	
	protected $paths = array(
	'controllers',
	'servises',
	'models',
	'rest',
	);
	
	public function getController($className){
		foreach ($this->paths as $path) {
			$filename = site_path . $path . DIRSEP . $className . ".php";
			if (file_exists($filename)) {
				include($filename);
				break;
			}
		}
	}
}
?>