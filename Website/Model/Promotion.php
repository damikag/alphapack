<?php

include_once("../Controller/dbh.php");

class Promotion{
	
	
	//private $dbh;
	
	private $title;
	private $category;
	private $pr_username;
	private $description;
	private $startDate;
	private $endDate;
	private $location;
	private $link;
	private $image;
	private $state;
	private $promoID;
	private $ad_username;
	
	public function __construct($promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$pr_username,$ad_username){
		//$this->dbh = $dbh;
		$this->promoID=$promoID;
		$this->category=$category;
		
		
		$this->title=$title;
		$this->description=$description;
		$this->image=$image;
		
		$this->link=$link;
		$this->state=$state;
		$this->startDate=$startDate;
		$this->endDate=$endDate;
		
		$this->location=$location;

		$this->pr_username=$pr_username;	
		$this->ad_username=$ad_username;
	}
	
	public function setTitle($title){
		$this->title=$title;
	}
	
	public function setDescription($description){
		$this->description=$description;
	}
	
	public function setStartDate($startDate){
		$this->startDate=$startDate;
	}
	
	public function setEndDate($endDate){
		$this->endDate=$endDate;
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
		return $this->category;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getPr_username(){
		return $this->pr_username;
	}
	
	public function getAd_username(){
		return $this->ad_username;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function getLink(){
		return $this->link;
	}
	
	public function getLocation(){
		return $this->location;
	}
	
	public function getStartDate(){
		return $this->startDate;
	}
	
	public function getEndDate(){
		return $this->endDate;
	}
	
	public function getState(){
		return $this->state;
	}
	
	public function getPromoID(){
		return $this->promoID;
	}
	
	
	
	
	
	
	
	
	
	
	
	public static function readPromotionFromDB($promoID){
		$dbh=new Dbh();
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE promo_id = ?");
				
		$sql->bind_param("s", $promoID);
		$sql->execute();
		$results = $sql->get_result();
		if($row = $results->fetch_array(MYSQLI_ASSOC)){

			//$promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$promoter,$ad_username
			return new Promotion($row["promo_id"],$row["category"],$row["ad_username"],$row["title"],$row["description"],$row["image_path"],$row["link"],$row["start_date"],$row["end_date"],$row["location"],$row["state"]);
		}

		else{
			return null;
		}	
	}
	
	public static function validatePromotion($promotion){
		
		$start_date_arr=explode('-',$promotion->startDate);
		$end_date_arr=explode('-',$promotion->endDate);
		
		if(empty($promotion->title)){
			return "EmptyTitle";
		}
		else if(empty($promotion->description)){
			return "EmptyDescription";
		}
		else if(checkdate($start_date_arr[1],$start_date_arr[2],$start_date_arr[0])==false){
			return "InvalidStartDate".$promotion->startDate;
		}
		else if(checkdate($end_date_arr[1],$end_date_arr[2],$end_date_arr[0])==false){
			return "InvalidEndDate";
		}
		else if($promotion->startDate>$promotion->endDate){
			return "StartDateIsEarlierThanEndDate";
		}
		else{
			return null;
		} 
			
	}
	
	public static function addPromotionToDB($promotion){
		try{
			$dbh=new Dbh();
			$conn = $dbh->connect();
					
			
		
			//$promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$promoter,$ad_username
			$sql = $conn->prepare("INSERT INTO confirmed_promotion(category,title,description,image_path,link,state,start_date,end_date,location,pr_username,ad_username) VALUES (?, ? ,?,?,?,?, ? ,?,?,?,?) ");
			#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
			
			$sql->bind_param('sssssssssss',$promotion->category,$promotion->title,$promotion->description,$promotion->image,$promotion->link,$promotion->state,$promotion->startDate,$promotion->endDate,$promotion->location,$promotion->pr_username,$promotion->ad_username);

			
			
			if($sql->execute()){
				echo("successsssssssssss");
			}
			else{
				echo("faileddddddddd");
				echo(mysqli_error($conn));
			}
			
			$sql->store_result();
		
			header("Location: ../View/addPromo.php?message=sucess");
			exit();

		}
		catch(Exception $e){
			
		}
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