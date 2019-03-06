<?php

include("../Controller/dbh.php");

class Promotion{
	
	
	private $dbh;
	
	private $titile;
	private $category;
	private $promoter;
	private $description;
	private $startTime;
	private $endTime;
	private $location;
	private $link;
	private $image;
	private $state;
	private $promoID;
	
	public function __construct($promoID,$category,$promoter,$title,$description,$image,$link,$startTime,$endTime,$location,$state){
		//$this->dbh = $dbh;
		$this->promoID=$promoID;
		$this->category=$category;
		$this->promoter=$promoter;
		
		$this->titile=$title;
		$this->description=$description;
		$this->image=$image;
		
		$this->link=$link;
		$this->startTime=$startTime;
		$this->endTime=$endTime;
		
		$this->location=$location;
		$this->state=$state;
		
	}
	
	public function setTitile($title){
		$this->titile=$title;
	}
	
	public function setDescription($description){
		$this->description=$description;
	}
	
	public function setStartTime($startTime){
		$this->startTime=$startTime;
	}
	
	public function setEndTime($endTime){
		$this->endTime=$endTime;
	}
	
	public function setLocation($location){
		$this->location=$location;
	}
	
	public function setLink($link){
		$this->link=$link;
	}
	
	public function setImage($image){
		$this->image=$image;
	}
	
	public function setState($state){
		$this->state=$state;
	}
	
	public function getCategory(){
		return $category;
	}
	
	public function getTitle(){
		return $title;
	}
	
	public function getPromoter(){
		return $promoter;
	}
	
	public function getDescription(){
		return $description;
	}
	
	public function getImage(){
		return $image;
	}
	
	public function getLink(){
		return $link;
	}
	
	public function getLocation(){
		return $location;
	}
	
	public function getStartTime(){
		return $startTime;
	}
	
	public function getEndTime(){
		return $endTime;
	}
	
	public function getState(){
		return $state;
	}
	
	public function getPromoID(){
		return $promoID;
	}
	
	
	
	
	
	
	
	
	
	
	
	public static function readPromotionFromDB($promoID){
		$dbh=new Dbh();
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE promo_id = ?");
				
		$sql->bind_param("s", $promoID);
		$sql->execute();
		$results = $sql->get_result();
		if($row = $results->fetch_array(MYSQLI_ASSOC)){

			return new Promotion($row["promo_id"],$row["category"],$row["ad_username"],$row["title"],$row["description"],$row["image_path"],$row["link"],$row["start_date"],$row["end_date"],$row["location"],$row["state"]);
		}

		else{
			return null;
		}	
	}
	
	public static function addPromotionToDB($promotion){
		$dbh=new Dbh();
			$conn = $this->dbh->connect();
					
		//$promoID,$category,$promoter,$title,$description,$image,$link,$startTime,$endTime,$location,$state
		$sql = $conn->prepare("INSERT INTO customer(category,ad_username,titile,description,image_path,link,start_date,end_date,location,state) VALUES (?, ? ,?,?,?,?, ? ,?,?,?) ");
		#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
		$sql->bind_param("ssssssssss",$promotion->getCategory(), $promotion->getPromoter(),$promotion->getTitle(),$promotion->getDescription(),$promotion->getImage(),$promotion->getImage(),$promotion->getLink(),$promotion->getStartTime(),$promotion->getEndTime(),$promotion->getLocation(),$promotion->getState());
		$sql->execute();
		$sql->store_result();
					
	}
	
	public static function updateToDB(){
		
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
					if ($passCheck == false){
						header("Location: ../View/login.php?error=noUser");
						exit();
					}
					else if($passCheck==true){
						session_start();

						$_SESSION['userName']= $row['username'];
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
	
	private function signupFunction(){
		$username = $_POST["uid"];
		$uemail = $_POST["email"];
		$password = $_POST["password"];
		$re_password = $_POST["re-password"];
		$phone = $_POST["phone"];

		if(empty($username) || empty($uemail) || empty($password) || empty($re_password) || empty($phone)){

			header("Location: ../View/signup.php?error=emptyFields_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();
		}

		elseif(!preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../View/signup.php?error=invalidUserName_&email=".$uemail."_&phone=".$phone);
			exit();

		}

		elseif($password !== $re_password){
			header("Location: ../View/signup.php?error=passwordError_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();

		}
		
		elseif(strlen($password)<8){
			header("Location: ../View/signup.php?error=passwordNotStrong_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();
		}
		
		elseif(strlen($phone)!=10){
			header("Location: ../View/signup.php?error=incorrectPhoneNumber_&uid=".$username."_&email=".$uemail);
			exit();
		}

		else{
			
			$conn = $this->dbh->connect();
			$sql = $conn->prepare("SELECT * FROM customer WHERE username=?");
			#$sql = "SELECT username FROM users WHERE username=?";
			#$stmt = mysqli_stmt_init($conn);
			$sql->bind_param("s", $username);
			$sql->execute();
			$sql->store_result();
			$resultCheck = $sql->num_rows();
			
				#mysqli_stmt_bind_param($stmt, "s", $username);
				#mysqli_stmt_execute($stmt);
				#mysqli_stmt_store_result($stmt);
				#$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../View/signup.php?error=userNameTaken_&email=".$uemail);
					exit();

				}
				else{
					$conn = $this->dbh->connect();
					#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";
					$sql = $conn->prepare("INSERT INTO customer(username, password, email,phone_no) VALUES (?, ? ,?,?) ");
					#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
					$hPassword = password_hash($password, PASSWORD_DEFAULT);
					$sql->bind_param("ssss", $username,$hPassword,$uemail,$phone);
					$sql->execute();
					$sql->store_result();
					
						/*mysqli_stmt_bind_param($stmt, "sss", $username, $uemail,$hPassword);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);*/
						header("Location: ../View/login.php");
						exit();


				}
		}

				mysqli_stmt_close($stmt);
				mysqli_close($conn);		
	}
	
	
	public function login(){
		$this->loginFunction();
	}
	
	public function signup(){
		$this->signupFunction();
	}
	
					
}