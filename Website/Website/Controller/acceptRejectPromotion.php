<?php

include("../Controller/dbh.php");
include("../Model/Administrator.php");

$dbh = new Dbh();

$administrator = new Administrator($dbh);


if (isset($_GET["acceptedAdID"])){
	echo($_GET["acceptedAdID"]);
}

elseif(isset($_GET["rejectedAdID"])){
	echo($_GET["rejectedAdID"]);
}
else{
	header("Location: ../View/404.php");
	exit();

}