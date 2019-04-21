<?php
session_start();
include_once("../Model/customer.php");
//include_once("../Model/promoter.php");
//include_once("../Model/Administrator.php");
//$dbh = new Dbh();
//$customer = new Customer($dbh);
//$promoter=new Promoter($dbh);

if (isset($_POST['subscribe-submit'])){
	
	$userName = $_SESSION['userNameCustomer'];
	$pr_username = $_GET['pr_username'];
	$tempCustomer = new Customer($userName,$_SESSION['uemail'],$_SESSION['phone']);
	$tempCustomer->subscribe($pr_username);
	//echo('121');
	header("Location: ../View/promoterTemplate.php?pr_username=".$pr_username."");
	exit();	
	
	
}
else{
	header("Location: ../View/404.php");
	exit();	
}


/*if (isset($_POST["login-submit"])){
	
	Promoter::login();
	if(!isset($_SESSION["userNamePromoter"])){
		Administrator::login();
		
		if(!isset($_SESSION["userNameAdmin"])){
			Customer::login();
		}
		
		
	}
	
	/*if(Promoter::isPromoter()){
		Promoter::login();
	}
	else{
		Customer::login();
	}
}

else{
	header("Location: ../View/404.php");
	exit();

}*/