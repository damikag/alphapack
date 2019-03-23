<?php

include("../Controller/dbh.php");
include("../Model/Person.php");

$dbh = new Dbh();
$person = new Person();


if (isset($_GET["acceptedPromoID"])){
	$administrator->getAcceptedPromotion($_GET["acceptedPromoID"]);
	header("Location: ../View/adminView.php");
	exit();
}

elseif(isset($_GET["rejectedPromoID"])){
	
	$administrator->getRejecteddPromotion($_GET["rejectedPromoID"]);
	header("Location: ../View/adminView.php");
	exit();
}

else{
	header("Location: ../View/404.php");
	exit();

}