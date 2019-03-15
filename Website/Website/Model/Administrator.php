<?php

//include("../Controller/dbh.php");

class Administrator{
	
	private $dbh;
	
	public function __construct($dbh){
		$this->dbh = $dbh;
	}
	
	private function loginFunction(){
			
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../View/login.php?error=emptyFields_&uid=".$username);
			exit();

		}

		else{
			$conn = $this->dbh->connect();
			$sql = $conn->prepare("SELECT * from admin WHERE username = ? OR email  =?");
				
				$sql->bind_param("ss", $username, $username);
				$sql->execute();
				$results = $sql->get_result();
				if($row = $results->fetch_array(MYSQLI_ASSOC)){
					if ($password != $row['password']){
						header("Location: ../View/login.php?error=wrongPassword");
						exit();
					}
					else if($password == $row['password']){
						session_start();

						$_SESSION['userName']= $row['username'];
						header("Location: ../View/adminView.php");
						exit();
					}
					/*else{
						header("Location: ../View/login.php?error=noUser");
						exit();
					}
				}

				else{
					header("Location: ../View/login.php?error=nouser");
					exit();
				}*/
			
		}
	}
	}
	public function login(){
		$this->loginFunction();
	}
	
					
}				
