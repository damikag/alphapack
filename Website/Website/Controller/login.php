<?php

include("../Model/customer.php");
include("../Model/Administrator.php");
include("../Model/promoter.php");
$dbh = new Dbh();
$customer = new Customer($dbh);
$administrator = new Administrator($dbh);
$promoter = new Promoter($dbh);

if (isset($_POST["login-submit"])){
	$customer->login();
	if (!(isset ($_SESSION['userName']))){
		$administrator->login();
	}
	else{
		$promoter->login();
	}
}