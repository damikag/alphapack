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


/*class Dbh {
  
  private static $conn = null;
  
  private $dbServer;
  private $dbUser;
  private $dbPassword;
  private $dbName;

	private function __construct(){
		$this->dbServer = "localhost";
		$this->dbUser = "root";
		$this->dbPassword = "";
		$this->dbName = "waasi.lk_version2";
		
		$conn = new mysqli($this->dbServer,$this->dbUser,$this->dbPassword,$this->dbName);
	}

	
  public static function getInstance()
  {
    if (self::$conn == null)
    {
      self::$conn = new Dbh();
    }
 
    return self::$conn;
  }
}
*/ 
