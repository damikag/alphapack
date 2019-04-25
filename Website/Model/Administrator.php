<?php

require_once("../Model/Promotion.php");
require_once("../Model/Person.php");

class Administrator extends Person{
	
	private $dbh;
	private $viewPromo;
	
	public function __construct(){
		$this->dbh = new Dbh();
	}
	
	/*public static function login(){
		$dbh=new Dbh();
		
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../View/login.php?error=emptyFields_&uid=".$username);
			exit();

		}

		else{
			$conn = $dbh->connect();
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
						$_SESSION['userNameAdmin'] = $row['username'];
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
				}
			
		}
	}
	}*/
	
	private function viewPromotion(){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE state = 'Pending'");
		$sql->execute();
		$results = $sql->get_result();
		$i = 0;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			$tempPromo = new Promotion($row['promo_id'],$row['category'],$row['title'],$row['description'],$row['image_path'],$row['link'],$row['state'],$row['start_date'],$row['end_date'],$row['location'],$row['pr_username'],null);
			
			$this->viewPromo[$i] = $tempPromo;
			$i = $i +1;
		}
		return $this->viewPromo;

	}
	
	private function acceptPromotion($promoID){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("UPDATE `confirmed_promotion` SET state='Accepted' WHERE `promo_id` =".$promoID.";");
		$sql->execute();
		
	}
	
	private function rejectPromotion($promoID){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("UPDATE `confirmed_promotion` SET state='Rejected' WHERE `promo_id` =".$promoID.";");
		$sql->execute();
		
	}
	
	public function getAcceptedPromotion($promoID){
		$this->acceptPromotion($promoID);
	}
	
	public function getRejecteddPromotion($promoID){
		$this->rejectPromotion($promoID);
	}
	
	/*public static function login(){
		loginFunction();
	}*/
	
	public function getViewPromotion(){
		$temp = $this->viewPromotion();
		return $temp;
	}
	
					
}				
