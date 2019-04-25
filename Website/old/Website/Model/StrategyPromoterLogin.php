<?php

require_once("../Model/IStrategyLogin.php");

class StrategyPromoterLogin implements IStrategyLogin{
	
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
			$sql = $conn->prepare("SELECT * from promotor WHERE username = ? OR email  =?");
				
				$sql->bind_param("ss", $username, $username);
				$sql->execute();
				$results = $sql->get_result();
				if($row = $results->fetch_array(MYSQLI_ASSOC)){
					$passCheck = password_verify($password,$row["password"]);
					
					if($password==$row["password"]){
						$passCheck=true;
					}
					else $passCheck=false;
					
					if ($passCheck == false){
						header("Location: ../View/login.php?error=wrongPassword");
						exit();
					}
					else if($passCheck==true){
						session_start();

						$_SESSION['userName']= $row['username'];
						$_SESSION['userNamePromoter'] = $row['username'];
						$_SESSION['promoterName'] = $row['promotor_name'];
						$_SESSION['uemail']= $row['email'];
						$_SESSION['mapLocation'] = $row['map_location'];
						$_SESSION['phone'] = $row['phone'];
						$_SESSION['webLink'] = $row['website'];
						$_SESSION['fbLink'] = $row['fb_link'];
						$_SESSION['rating'] = $row['rating'];

						header("Location: ../View/promoterIndex.php");
						exit();
					}
					/*else{
						header("Location: ../View/login.php?error=noUser");
						exit();
					}*/
				}

				/*else{
					header("Location: ../View/login.php?error=nouser");
					exit();
				}*/
			
		}
	}
	
	public function login(){
		$this->loginFunction();
	}
}