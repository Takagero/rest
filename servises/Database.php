<?php
class Database {

	protected $host = 'localhost';
	protected $dbName = 'root';
	protected $user = 'root';
	protected $pass = '';
	
	protected $conn;
	
	
	public function getConnect(){
		
		if (is_null($this->conn)) {
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->pass);
			$this->conn->query("SET NAMES utf-8");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
		}
		
		return $this->conn;
	}
	
	public function query($sql){
		return $this->getConnect()->query($sql);
	}
	public function prepare($sql){
		return $this->getConnect()->prepare($sql);
	}
	
	public function fetchAll($sql){
		$query = $this->query($sql);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function fetchObj($sql, $class){	
			
		$query = $this->query($sql);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function Qprepare($sql){
		
		return $query = $this->prepare($sql);
	}
	
	public function lastInsertId($query){
		return $query->lastInsertId();
	}

}

?>