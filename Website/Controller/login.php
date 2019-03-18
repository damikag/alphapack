<?php

include_once("../Model/customer.php");
include_once("../Model/promoter.php");

//$dbh = new Dbh();
//$customer = new Customer($dbh);
//$promoter=new Promoter($dbh);


if (isset($_POST["login-submit"])){
	if(Promoter::isPromoter()){
		Promoter::login();
	}
	else{
		Customer::login();
	}
}

else{
	header("Location: ../View/404.php");
	exit();

}