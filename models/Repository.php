<?php
abstract class Repository {
	
	public function getConnection(){
		
		return Model::getConnections();
	}
}
?>