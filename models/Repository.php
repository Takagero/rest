<?php
//include_once("TraitInstance.php");

abstract class Repository {
	
//	use TraitInstance;
	
	public function getConnection(){
		
		return Model::getConnections();
	}
}
?>