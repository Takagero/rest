<?php
trait Trateinstance {
	protected static $instance = null;
	private function __construct(){}
	private function __wakeup(){}
	private function __clone(){}
	
	public static function getInstance(){
		
		if (is_null(self::$instance)) {
			self::$instance = new Database();
		}
		return self::$instance;
	}
	
	public static function getConnections(){
		
		return self::getInstance();
	}
}
?>