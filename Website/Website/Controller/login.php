<?php

//include_once("../Model/customer.php");
//include_once("../Model/promoter.php");
//include_once("../Model/Administrator.php");
require_once("../Model/StrategyCustomerLogin.php");
require_once("../Model/StrategyPromoterLogin.php");
require_once("../Model/StrategyAdministratorLogin.php");
//$dbh = new Dbh();
//$customer = new Customer($dbh);
//$promoter=new Promoter($dbh);

if (isset($_POST["login-submit"])){
	
	$tempLogin = new StrategyPromoterLogin();
	$tempLogin->login();
	
	if(!isset($_SESSION["userNamePromoter"])){
		$tempLogin = new StrategyAdministratorLogin();
		$tempLogin->login();
		
		if(!isset($_SESSION["userNameAdmin"])){
			$tempLogin = new StrategyCustomerLogin();
			$tempLogin->login();
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