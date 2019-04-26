<?php
session_start();
if (isset($_POST["addPromo-submit"])){
	
	//include("../Model/customer.php");
	//include "dbh.php";
	//$dbh = new Dbh();
	//$user = new Customer($dbh);
	//$user->signup();
	
	$category=$_POST["category"];
	$title=$_POST["title"];
	$description=$_POST["description"];
	$startTime=$_POST['start-time'];//$_POST["start-time"];
	$endTime=$_POST["end-time"];
	$location=$_POST["location"];
	$link=$_POST["link"];
	$image="testImage";
	$state="pending";
	$promoID=null;
	$pr_username="demoPromotor1";
	$pr_username=$_SESSION['userName'];
	$ad_username="admin";
	
	
	require_once "../Model/Promotion.php";

	//$promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$promoter,$ad_username
	$promotion=new Promotion(null,$category,$title,$description,$image,$link,$state,$startTime,$endTime,$location,$pr_username,$ad_username	);

	$validation=Promotion::validatePromotion($promotion);
	
	if($validation){
		header("Location: ../View/addPromo.php?error=".$validation."_&titile=".$title."_&description=".$description);
		exit();
	}
	
	// File upload
	
	$target_dir = "../Extra/img/users/promotions/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"],".tmp").".".strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
	echo($target_file);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$image=basename($target_file);
	// Check if image file is a actual image or fake image
	if(isset($_POST["addPromo-submit"])) {
		//echo($_FILES["fileToUpload"]["tmp_name"]."sdf");
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	/*if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}*/
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		header("Location: ../View/addPromo.php?error=fileUploadFailed");
			exit();
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

		} else {
			echo "Sorry, there was an error uploading your file.";
			header("Location: ../View/addPromo.php?error=fileUploadFailed");
			exit();

		}
	}
	// End of file upload

	//$promotion->image=("../Extra/img/users/promotions/".$image);
	$tmp=$_SESSION["userName"];
	$promotion=new Promotion(null,$category,$title,$description,("../Extra/img/users/promotions/".$image),$link,$state,$startTime,$endTime,$location,$tmp,$ad_username);
	
	Promotion::addPromotionToDB($promotion);



	//header("Location: ../View/index.php");
	exit();
		
		
	
		
//mysqli_stmt_close($stmt);
//mysqli_close($conn);		
	
		
}


else{
	echo("PLEASE LEAVE!");
	header("Location: ../View/index.php");
	exit();
}