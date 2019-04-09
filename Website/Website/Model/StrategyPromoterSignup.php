<?php

require_once("../Model/IStrategySignup.php");

class StrategyPromoterSignup implements IStrategySignup{
	
	private $dbh;
	
	public function __construct(){
		$this->dbh = new Dbh();
	}
	
	private function signupFunction(){
		
		$username = $_POST["uid"];
		$uemail = $_POST["email"];
		$password = $_POST["password"];
		$re_password = $_POST["re-password"];
		$phone = $_POST["phone"];
		
		$promoterName=$_POST["promoterName"];
		$website=$_POST["website"];
		$fblink=$_POST["fblink"];

		if(empty($username) || empty($uemail) || empty($password) || empty($re_password) || empty($phone)||empty($promoterName)||empty($website)||empty($fblink)){

			header("Location: ../View/promoterSignup.php?error=emptyFields_&uid=".$username."&promoterName=".$promoterName."&email=".$uemail."&phone=".$phone."&website".$website."_&fblink".$fblink);
			exit();
		}

		elseif(!preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../View/promoterSignup.php?error=invalidUserName_&email=".$uemail."_&phone=".$phone);
			exit();

		}

		elseif($password !== $re_password){
			header("Location: ../View/promoterSignup.php?error=passwordError_&uid=".$username."&email=".$uemail."&phone=".$phone);
			exit();

		}
		
		elseif(strlen($password)<8){
			header("Location: ../View/promoterSignup.php?error=passwordNotStrong_&uid=".$username."&email=".$uemail."&phone=".$phone);
			exit();
		}
		
		elseif(strlen($phone)!=10){
			header("Location: ../View/promoterSignup.php?error=incorrectPhoneNumber_&uid=".$username."_&email=".$uemail);
			exit();
		}

		else{
			
			$conn = $this->dbh->connect();
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
					$conn = $this->dbh->connect();
					#$sql = "INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ";
					$sql = $conn->prepare("INSERT INTO promotor(username, password, email,phone_no,promotor_name,website,fb_link) VALUES (?, ? ,?,?,?,?,?) ");
					#$sql = $conn->prepare("INSERT INTO users(uname, email, password) VALUES (?, ? ,?) ");
					$hPassword = password_hash($password, PASSWORD_DEFAULT);
					#$hPassword=$password;
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

				mysqli_stmt_close($stmt);
				mysqli_close($conn);		
	}
	
	public function signup(){
		
		$this->signupFunction();
		
	}
}
