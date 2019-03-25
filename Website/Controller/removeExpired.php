<?php

private $dbh;
$this->dbh = new Dbh();
$conn = $this->dbh->connect();

$sql = "SELECT * FROM  confirmed_promotion WHERE end_date <=(?)";
		
if(!($stmt = $conn->prepare($sql))){
	echo "Prepare failed";
}
if(!$stmt->bind_param("s",)){
	echo "Binding parameters failed";
}
if($res = !$stmt->execute()){
	echo "Execute failed";
}
$stmt->store_result();
$stmt->bind_result($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating);
$stmt->fetch();