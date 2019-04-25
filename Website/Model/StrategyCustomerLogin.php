<?php

require_once("../Model/IStrategyLogin.php");

class StrategyCustomerLogin implements IStrategyLogin{
	
	private $dbh;
	
	public function __construct(){
		$this->dbh = new Dbh();
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
			$sql = $conn->prepare("SELECT * from customer WHERE username = ? OR email  =?");
				
				$sql->bind_param("ss", $username, $username);
				$sql->execute();
				$results = $sql->get_result();
				if($row = $results->fetch_array(MYSQLI_ASSOC)){
					$passCheck = password_verify($password,$row["password"]);
					
					/*if($password==$row["password"]){
						$passCheck=true;
					}
					else $passCheck=false;*/
					
					
					if ($passCheck == false){
						header("Location: ../View/login.php?error=wrongPassword");
						exit();
					}
					else if($passCheck==true){
						session_start();

						$_SESSION['userNameCustomer']= $row['username'];
						$_SESSION['userName'] = $row['username'];
						$_SESSION['uemail']= $row['email'];
						$_SESSION['phone'] = $row['phone'];
						

						header("Location: ../View/index.php");
						exit();
					}
					else{
						header("Location: ../View/login.php?error=noUser");
						exit();
					}
				}

				else{
					header("Location: ../View/login.php?error=nouser");
					exit();
				}
			
		}
	
	
	}
	
	public function login(){
		$this->loginFunction();
	}
}