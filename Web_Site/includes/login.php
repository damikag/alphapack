<?php

include("../classes/customer.php");
$dbh = new Dbh();
$customer = new Customer($dbh);

if (isset($_POST["login-submit"])){
	$customer->login();
}