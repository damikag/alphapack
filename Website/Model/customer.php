<?php

include_once("../Controller/dbh.php");
require_once("../Model/Person.php");
require_once("../Model/promoter.php");

class Customer extends Person{
	
	private $username;
	private $email;
	//private $password;
	private $phoneNumber;
	private $subscribedPromoters;
	
	//private $dbh;
	
	public function __construct($username/*$password*/,$email,$phoneNumber){
		$this->username=$username;
		$this->email=$email;
		//$this->password=$password;
		$this->phoneNumber=$phoneNumber;
		//$this->dbh = $dbh;
		$this->subscribedPromoters=[];
		
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	/*public function getPassword(){
		return $this->password;
	}*/
	
	public function getPhoneNumber(){
		return $this->phoneNumber;
	}
	
	public function setUsername($username){
		$this->username=$username;
	}
	
	/*public function setPassword($password){
		$this->password=$password;
	}*/
	public function setEmail($email){
		$this->email=$email;
	}

	public function setPhoneNumber($phoneNumber){
		$this->phoneNumber=$phoneNumber;
	}

	public static function login(){
		
		$dbh=new Dbh();
		
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../View/login.php?error=emptyFields_&uid=".$username);
			exit();

		}

		else{
			$conn = $dbh->connect();
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
	
	public static function signup(){
		$username = $_POST["uid"];
		$uemail = $_POST["email"];
		$password = $_POST["password"];
		$re_password = $_POST["re-password"];
		$phone = $_POST["phone"];
		
		$dbh=new Dbh();
		
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
			
			$conn = $dbh->connect();
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
					/*$conn = $dbh->connect();
					#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";
					$sql = $conn->prepare("INSERT INTO promotor(username, password, email,phone_no,promotor_name,website,fb_link) VALUES (?, ? ,?,?,?,?,?) ");
					#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
					$hPassword = password_hash($password, PASSWORD_DEFAULT);
					$hPassword=$password;
					$sql->bind_param("sssssss", $username,$hPassword,$uemail,$phone,$promoterName,$website,$fblink);
					$sql->execute();
					$sql->store_result();
					
						/*mysqli_stmt_bind_param($stmt, "sss", $username, $uemail,$hPassword);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						header("Location: ../View/login.php");
						exit();*/
					
					
					$conn = $dbh->connect();
					#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";
					$sql = $conn->prepare("INSERT INTO customer(username, password, email,phone_no) VALUES (?, ? ,?,?) ");
					#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
					$hPassword = password_hash($password, PASSWORD_DEFAULT);
					//$hPassword = $password;
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
	
	private function getSubscribedCompaniesFunction(){
		
		$dbh=new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("SELECT * from promotor_subscribing WHERE cus_username = ?");
				
		$sql->bind_param("s", $this->username);
		$sql->execute();
		$results = $sql->get_result();
		$i = 0;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			
			//__construct($promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$pr_username,$ad_username)
			//$tempCustomerUsername = $row['cus_username'];
			$tempPromoterUsername = $row['pr_username'];
			$temp = [];
			$sql1 = $conn->prepare("SELECT promotor_name from promotor WHERE username= ?");
			$sql1->bind_param("s",$tempPromoterUsername);
			$sql1 ->execute();
			$results1 = $sql1->get_result();
			if ($row1 = $results1->fetch_array(MYSQLI_ASSOC)){
				$tempCompanyName = $row1['promotor_name'];
			}
			$temp[0] = $tempPromoterUsername;
			$temp[1] = $tempCompanyName;
			$this->subscribedPromoters[$i] = $temp; 
			//$tempPromo= new Promotion($row["promo_id"],$row["category"],$row["title"],$row["description"],$row["image_path"],$row["link"],$row['state'],$row["start_date"],$row["end_date"],$row['location'],$row["pr_username"],$row["ad_username"]);
			
			//$viewPromo[$i] = $tempPromo;
			
			$i++;
		}
		
		return $this->subscribedPromoters;
		
	}
	
	public function checkPromterIsSubscribed($pr_username){
		$tempSubscribedList = $this->getSubscribedCompanies();
		$len = sizeof($tempSubscribedList);
		$check = false;
		for ($i=0;$i<$len;$i++){
			$temp = $tempSubscribedList[$i];
			if ($temp[0]==$pr_username){
				$check = true;
				break;
			}
		}
		return $check;
	}
	
	public function getSubscribedCompanies(){
		return $this->getSubscribedCompaniesFunction();
	}
	
	private function subscribeFunction($pr_username){
		$dbh = new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("INSERT INTO promotor_subscribing(cus_username, pr_username) VALUES (?, ?) ");
		#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
		//$hPassword = password_hash($password, PASSWORD_DEFAULT);
		//$hPassword = $password;
		$sql->bind_param("ss", $this->username,$pr_username);
		$sql->execute();
		$sql->store_result();
		//header("Location ../View/promoterTemplate.php");
		//exit();
	}
	
	public function subscribe($pr_username){
		$this->subscribeFunction($pr_username);
	}
	
	private function unsubscribeFunction($pr_username){
		$dbh = new Dbh();
		$conn = $dbh->connect();
		//DELETE FROM `table_name` [WHERE condition];
		$sql = $conn->prepare("DELETE FROM promotor_subscribing WHERE cus_username = ? AND pr_username = ? ");
		#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
		//$hPassword = password_hash($password, PASSWORD_DEFAULT);
		//$hPassword = $password;
		$sql->bind_param("ss", $this->username,$pr_username);
		$sql->execute();
		$sql->store_result();
		//header("Location ../View/promoterTemplate.php");
		//exit();
		
	}
	public function unsubscribe($pr_username){
		$this->unsubscribeFunction($pr_username);
	}
	
	private function commentFunction($pr_username, $comment){
		
		$dbh = new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("SELECT * FROM promotor_commenting WHERE cus_username = ? and pr_username = ?");
		#$sql = "SELECT username FROM users WHERE username=?";
		#$stmt = mysqli_stmt_init($conn);
		$sql->bind_param("ss", $this->username,$pr_username);
		$sql->execute();
		$sql->store_result();
		$resultCheck = $sql->num_rows();
		
		if ($resultCheck>0){
			//UPDATE `confirmed_promotion` SET state='Rejected' WHERE `promo_id` =".$promoID.";
			$sql = $conn->prepare("UPDATE promotor_commenting set comment = ? WHERE cus_username = ? and pr_username = ? ");
			#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
			//$hPassword = $password;
			$sql->bind_param("sss", $comment,$this->username,$pr_username);
			$sql->execute();
			$sql->store_result();			
			
		}
		else{
			$sql = $conn->prepare("INSERT INTO promotor_commenting(cus_username, pr_username,comment) VALUES (?, ? ,?) ");
			#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
			//$hPassword = $password;
			$sql->bind_param("sss", $this->username,$pr_username,$comment);
			$sql->execute();
			$sql->store_result();
		}
		
		#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";

					
		/*mysqli_stmt_bind_param($stmt, "sss", $username, $uemail,$hPassword);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);*/	
	}
	
	public function comment($pr_username,$comment){
		$this->commentFunction($pr_username,$comment);
	}
	
	/*public function login(){
		$this->loginFunction();
	}
	
	public function signup(){
		$this->signupFunction();
	}*/
	
					
}				