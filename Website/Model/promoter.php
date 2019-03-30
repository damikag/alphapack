<?php

include_once("../Controller/dbh.php");
include_once("../Model/Promotion.php");
require_once("../Model/Person.php");

class Promoter extends Person{
	
	private $username;
	private $password;
	private $promoterName;
	private $email;
	private $mapLocation;
	private $phoneNo;
	private $webLink;
	private $fbLink;
	private $rating;
	private $promotionList;
	
	public function __construct($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating){
		
		$this->username=$username;
		$this->promoterName=$promoterName;
		$this->email=$email;
		$this ->password=$password;
		$this->mapLocation=$mapLocation;
		$this->phoneNo=$phoneNo;
		$this->weblink=$weblink;
		$this->fbLink=$fblink;
		$this->rating=$rating;
		$this->promotionList = array();
		
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getPromoterName(){
		return $this->promoterName;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getPassword(){
		return $this->password;
	}
	public function getMapLocation(){
		return $this->mapLocation;
	}
	
	public function getPhoneNumber(){
		return $this->phoneNo;
	}
	
	public function getWebLink(){
		return $this->webLink;
	}
	
	public function getFblink(){
		return $this->fbLink;
	}
	
	public function getRating(){
		return $this->rating;
	}
	
	public function getPromotionList(){
		return $this->promotionList;
	}
	
	public function setUsername($username){
		$this->username=$username;
	}
	
	public function setPromoterName($promoterName){
		$this->promoterName=$promoterName;
	}
	
	public function setEmail($email){
		$this->email=$email;
	}
	
	public function setPassword($password){
		$this->password=$password;
	}
	
	public function setMapLocation($mapLocation){
		$this->mapLocation=$mapLocation;
	}
	
	public function setWeblink($weblink){
		$this->webLink=$weblink;
	}
	
	public function setFblink($fblink){
		$this->fbLink=$fblink;
	}
	
	public function setRating($rating){
		$this->rating=$rating;
	}
	
	
	public static function isPromoter(){
		
		$dbh=new Dbh();
		
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../View/login.php?error=emptyFields_&uid=".$username);
			exit();

		}
		
		else{
			$conn = $dbh->connect();
			$sql = $conn->prepare("SELECT * from promotor WHERE username = ? OR email  =?");
				
				$sql->bind_param("ss", $username, $username);
				$sql->execute();
				$results = $sql->get_result();
				if($row = $results->fetch_array(MYSQLI_ASSOC)){
					return true;
				}

				else{
					return false;
				}
			
		}
	}
	
	public static function login(){
			
		$dbh= new Dbh();
		
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../View/login.php?error=emptyFields_&uid=".$username);
			exit();

		}

		else{
			$conn = $dbh->connect();
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
						
						$_SESSION['userNamePromoter'] = $row['username'];
						$_SESSION['userName']= $row['username'];
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
	
	public static function signup(){
		
		$dbh=new Dbh();
		
		$username = $_POST["uid"];
		$uemail = $_POST["email"];
		$password = $_POST["password"];
		$re_password = $_POST["re-password"];
		$phone = $_POST["phone"];
		
		$promoterName=$_POST["promoterName"];
		$website=$_POST["website"];
		$fblink=$_POST["fblink"];

		if(empty($username) || empty($uemail) || empty($password) || empty($re_password) || empty($phone)||empty($promoterName)||empty($website)||empty($fblink)){

			header("Location: ../View/promoterSignup.php?error=emptyFields_&uid=".$username."_&promoterName=".$promoterName."_&email=".$uemail."_&phone=".$phone."_&website".$website."_&fblink".$fblink);
			exit();
		}

		elseif(!preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../View/promoterSignup.php?error=invalidUserName_&email=".$uemail."_&phone=".$phone);
			exit();

		}

		elseif($password !== $re_password){
			header("Location: ../View/promoterSignup.php?error=passwordError_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();

		}
		
		elseif(strlen($password)<8){
			header("Location: ../View/promoterSignup.php?error=passwordNotStrong_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();
		}
		
		elseif(strlen($phone)!=10){
			header("Location: ../View/promoterSignup.php?error=incorrectPhoneNumber_&uid=".$username."_&email=".$uemail);
			exit();
		}

		else{
			
			$conn = $dbh->connect();
			$sql = $conn->prepare("SELECT * FROM promotor WHERE username=?");
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
					header("Location: ../View/promoterSignup.php?error=userNameTaken_&email=".$uemail);
					exit();

				}
				else{
					//$conn = $dbh->connect();
					#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";
					$sql = $conn->prepare("INSERT INTO promotor(username, password, email,phone_no,promotor_name,website,fb_link) VALUES (?, ? ,?,?,?,?,?) ");
					#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
					$hPassword = password_hash($password, PASSWORD_DEFAULT);
					//$hPassword=$password;
					$sql->bind_param("sssssss", $username,$hPassword,$uemail,$phone,$promoterName,$website,$fblink);
					$sql->execute();
					$sql->store_result();
					
						/*mysqli_stmt_bind_param($stmt, "sss", $username, $uemail,$hPassword);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);*/
						header("Location: ../View/login.php");
						exit();


				}
		}

				//mysqli_stmt_close($stmt);
				mysqli_close($conn);		
	}
	
	public function addPromotion($promotion){			//a promotion is added to the prevailing list of promotions 
//		echo $promotion->getTitle();
		array_push($this->promotionList,$promotion);
	}
	
	public function subscribedCustomerCount(){			//number of subscirbed customers retrieved and returned
		$dbh=new Dbh();
		$conn = $dbh->connect();
		
		$stmt =  "SELECT COUNT(DISTINCT cus_username) FROM promotor_subscribing WHERE pr_username = (?)";
		
		$sql = $conn->prepare($stmt);
		$sql->bind_param("i", $this->username);
		$sql->execute();
		$sql ->store_result();
		$sql -> bind_result($customerCount);
		$sql -> fetch();
		
		return $customerCount;
		
	}
	
	public function readActivePromotionsFromDB(){		//promotions are read and added to the DB
		$dbh=new Dbh();
		$conn = $dbh->connect();
		
		$stmt =  "SELECT promo_id,category,title,description,image_path,link,state,start_date,end_date,location,pr_username,ad_username FROM confirmed_promotion WHERE pr_username = (?)";
		
		$sql = $conn->prepare($stmt);
		$sql->bind_param("i", $this->username);
		$sql->execute();
		$sql ->store_result();
		$sql -> bind_result($id,$category,$title,$description,$image_path,$link,$state,$start_date,$end_date,$location,$pr_username,$ad_username);
		
		while($sql -> fetch()){
			$time_zone = new DateTimeZone('Asia/Colombo');
			$current_time = new DateTime("now",$time_zone);
//			echo gettype($start_date),$end_date;
			$start_date_full = $start_date." 23:59:59";
			$end_date_full = $end_date." 23:59:59";
			$format = 'Y-m-d H:i:s';
//			echo gettype($start_date),$end_date;
			$startDT = DateTime::createFromFormat ( $format, $start_date_full);
			$endDT = DateTime::createFromFormat ( $format, $end_date_full);
//			echo "Hi<br>";
//			echo date_format($current_time,"Y/m/d H:i:s")."<br>";
//			echo date_format($startDT,"Y/m/d H:i:s")."<br>";
//			echo date_format($endDT,"Y/m/d H:i:s")."<br>";
			if($startDT<=$current_time and $endDT>$current_time){
				$promotion = new Promotion($id,$category,$title,$description,$image_path,$link,$state,$start_date,$end_date,$location,$pr_username,$ad_username);
//				echo $promotion->getTitle()."<br>";
				$this->addPromotion($promotion);
				
			}
		}		
		
	}
						
}