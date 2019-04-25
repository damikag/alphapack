<?php
session_start();
include("../Controller/dbh.php");
include("../Model/Administrator.php");

$dbh = new Dbh();
$administrator = new Administrator($dbh);

if(!isset($_SESSION['userNamePromoter'])){
    header("Location: ../View/404.php");
    exit();
}

if (isset($_GET["promoID"])){
    Promotion::deletePromo($_GET['promoID']);
}
else{
    header("Location: ../View/404.php");
    exit();

}