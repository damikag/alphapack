<?php

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
	$ad_username="admin1";
	
	
	echo("<h1>.$title.</h1>");
	echo("<h1>.$category.</h1>");
	echo("<h1>.$description.</h1>");
	echo("<h1>.$startTime.</h1>");
	echo("<h1>.$endTime.</h1>");
	echo("<h1>.$location.</h1>");
	echo("<h1>.$link.</h1>");
	
	//require "dbh.php";
	
	if(empty($title) || empty($description)){
		
		header("Location: ../View/addPromo.php?error=emptyFields_&titile=".$titile."_&description=".$description);
		exit();
	}	
	else{
		require_once "../Model/Promotion.php";
		
		//$promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$promoter,$ad_username
		$promotion=new Promotion(null,$category,$title,$description,$image,$link,$state,$startTime,$endTime,$location,$pr_username,$ad_username	);
		
		Promotion::addPromotionToDB($promotion);
		
		
		
		//header("Location: ../View/index.php");
		exit();
		
		
	}
		
//mysqli_stmt_close($stmt);
//mysqli_close($conn);		
	
		
}


else{
	echo("PLEASE LEAVE!");
	header("Location: ../View/index.php");
	exit();
}