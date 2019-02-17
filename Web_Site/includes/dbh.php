<?php

class Dbh{
	
	private $dbServer;
	private $dbUser;
	private $dbPassword;
	private $dbName;
	
	public function __construct(){
		$this->dbServer = "localhost";
		$this->dbUser = "root";
		$this->dbPassword = "";
		$this->dbName = "wasilk";
	}
	
	public function connect(){
		
		$conn = new mysqli($this->dbServer,$this->dbUser,$this->dbPassword,$this->dbName);
		return $conn;
	}
}
