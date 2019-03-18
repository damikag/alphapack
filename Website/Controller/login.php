<?php

include_once("../Model/customer.php");
include_once("../Model/promoter.php");
include_once("../Model/Administrator.php");
//$dbh = new Dbh();
//$customer = new Customer($dbh);
//$promoter=new Promoter($dbh);


if (isset($_POST["login-submit"])){
	
	Promoter::login();
	if(!isset($_SESSION["userName"])){
		Administrator::login();
		
		if(!isset($_SESSION["userName"])){
			Customer::login();
		}
		
		
	}
	
	/*if(Promoter::isPromoter()){
		Promoter::login();
	}
	else{
		Customer::login();
	}*/
}

else{
	header("Location: ../View/404.php");
	exit();

}