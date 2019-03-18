<?php

include("../Controller/dbh.php");
include("../Model/Administrator.php");

$dbh = new Dbh();
$administrator = new Administrator($dbh);


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