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
	
	private function viewPromotion(){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("SELECT * from pending_promotion");
		$sql->execute();
		$results = $sql->get_result();
		$i = 0;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			$viewPromo[$i] = array($row['promo_id'],$row['category'],$row['image_path'],$row['start_date'],$row['end_date'],$row['promotor'],$row['content']);
			$i = $i +1;
		}
		return $viewPromo;

	}
	
	private function acceptPromotion($singlePromo){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("INSERT INTO `confirmed_promotion`(`promo_id`, `category`, `image_path`, `state`, `start_date`, `end_date`, `pr_username`, `ad_username`, `content`) VALUES (".$singlePromo[0].",".$singlePromo[1].",".$singlePromo[2].",'Accepted',".$singlePromo[3].",".$singlePromo[4].",".$singlePromo[5].",",$_SESSION['userName'].",".$singlePromo[6].")");
		$sql->execute();
		$sql = $conn->prepare("DELETE FROM `pending_promotion` WHERE `promo_id` =".$singlePromo[0].";");
		$sql->execute();
		
	}
	
	private function removePromotion($singlePromo){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("DELETE FROM `pending_promotion` WHERE `movie_id` =".$singlePromo[0].";");
		$sql->execute();
		
	}
	
	public function login(){
		$this->loginFunction();
	}
	
	public function getViewPromotion(){
		$temp = $this->viewPromotion();
		return $temp;
	}
	
					
}				
