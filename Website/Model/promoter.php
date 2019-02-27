<?php

include("../Controller/dbh.php");

class Promoter{
	
	/*private $userName;
	private $promoterName;
	private $email;
	private $mapLocation;
	private $phoneNo;
	private $webLink;
	private $fbLink;
	private $rating;*/
	private $dbh;
	
	public function __construct($dbh){
		$this->dbh = $dbh;
	}
	
	private function loginFunction(){
			
		$username = $_POST["uid"];
		$password = $_POST["password"];

		if(empty($username)|| empty($password)){

			header("Location: ../promoterLogin.php?error=emptyFields_&uid=".$username);
			exit();

		}

		else{
			$conn = $this->dbh->connect();
			$sql = $conn->prepare("SELECT * from promoter WHERE username = ? OR email  =?");
				
				$sql->bind_param("ss", $username, $username);
				$sql->execute();
				$results = $sql->get_result();
				if($row = $results->fetch_array(MYSQLI_ASSOC)){
					$passCheck = password_verify($password,$row["password"]);
					if ($passCheck == false){
						header("Location: ../promoterLogin.php?error=noUser");
						exit();
					}
					else if($passCheck==true){
						session_start();

						$_SESSION['userName']= $row['username'];
						$_SESSION['promoterName'] = $row['promotor_name'];
						$_SESSION['uemail']= $row['email'];
						$_SESSION['mapLocation'] = $row['map_location'];
						$_SESSION['phone'] = $row['phone'];
						$_SESSION['webLink'] = $row['website'];
						$_SESSION['fbLink'] = $row['fb_link'];
						$_SESSION['rating'] = $row['rating'];

						header("Location: ../index.php");
						exit();
					}
					else{
						header("Location: ../promoterLogin.php?error=noUser");
						exit();
					}
				}

				else{
					header("Location: ../promoterLogin.php?error=nouser");
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

			header("Location: ../signup.php?error=emptyFields_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();
		}

		elseif(!preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invalidUserName_&email=".$uemail."_&phone=".$phone);
			exit();

		}

		elseif($password !== $re_password){
			header("Location: ../signup.php?error=passwordError_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();

		}
		
		elseif(strlen($password)<8){
			header("Location: ../signup.php?error=passwordNotStrong_&uid=".$username."_&email=".$uemail."_&phone=".$phone);
			exit();
		}
		
		elseif(strlen($phone)!=10){
			header("Location: ../signup.php?error=incorrectPhoneNumber_&uid=".$username."_&email=".$uemail);
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
					header("Location: ../signup.php?error=userNameTaken_&email=".$uemail);
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
						header("Location: ../login.php");
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