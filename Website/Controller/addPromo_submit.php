<?php

if (isset($_POST["addPromo-submit"])){
	
	include("../Model/customer.php");
	$dbh = new Dbh();
	//$user = new Customer($dbh);
	//$user->signup();
	
	private $titile=$_POST["title"];
	private $category=$_POST["category"];
	private $promoter;
	private $description=$_POST["description"];
	private $startTime=$_POST["start-time"];
	private $endTime=$_POST["end-time"];
	private $location=$_POST["location"];
	private $link=$_POST["link"];
	private $image;
	private $state="pending";
	private $promoID;
	
	
	
	
	require "dbh.php";
	
	if(empty($title) || empty($description)){
		
		header("Location: ../addPromo.php?error=emptyFields_&titile=".$titile."_&description=".$description);
		exit();
	}	
	else{
		include "../Model/Promotion.php";
		
		
		$promotion=new Promotion(null,$category,$promoter,$title,$description,$image,$link,$startTime,$endTime,$location,$state);
		
		Promotion->addPromotionToDB($promotion);
		//header("Location: ../View/index.php");
		exit();
		
		
	}
		
mysqli_stmt_close($stmt);
mysqli_close($conn);		
	
		
}


else{
	echo("PLEASE LEAVE!");
	header("Location: ../View/index.php");
	exit();
}