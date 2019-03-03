<?php

include("../Model/customer.php");
$dbh = new Dbh();
$customer = new Customer($dbh);

if (isset($_SESSION["userName"])){
	
}
else{
	header("Location: ../View/promoterTemplate.php?error=pleaseLogin");
	exit();

}