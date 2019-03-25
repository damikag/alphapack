<!--------------------------
CREATED BY: GAYAL
2019-03-07
---------------------------->


<?php

include_once("../Controller/dbh.php");
include_once("../Model/Promotion.php");
include_once("../Model/promoter.php");


/*****************************************
CLASS MONTHLY REPORT ..
CREATES DB CONNECTION
CONSTRUCTS THE PROMOTOR CLASS BASED ON THE PRMTR USERNAME
ASSESES ALL ITS PROMOTIONS AND AND CREATES PROMOTION OBJCTS 
SAVES THEM IN PROMOTION LIST
FINDS AND SAVES SUBSCRIBED CUSTOMER COUNT FROM PROMOTOR SUBSCRIBING IN DB
*****************************************/

class Monthly_report{
	private $dbh;
	private $promotor_name;
	 
	function __construct($promotor_name){
		$this->promotor_name = $promotor_name;
	}
	
	public function generateMonReport(){
		
		$this->dbh = new Dbh();
		$conn = $this->dbh->connect();
		
		$sql = "SELECT * FROM  promotor WHERE username = (?)";
		
		if(!($stmt = $conn->prepare($sql))){
			echo "Prepare failed";
		}
		if(!$stmt->bind_param("s",$this->promotor_name)){
			echo "Binding parameters failed";
		}
		if($res = !$stmt->execute()){
			echo "Execute failed";
		}
		$stmt->store_result();
		$stmt->bind_result($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating);
		$stmt->fetch();
		
		$promoter = new Promoter($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating);
		
		$subscribeCount = $promoter->subscribedCustomerCount();
		
		$promoter->readActivePromotionsFromDB();
		
		$promotionList = $promoter->getPromotionList();
		
		$_SESSION['promoter'] = $promoter;
		$_SESSION['promotionList'] = $promotionList;
		$_SESSION['subscribeCount'] = $subscribeCount;
	
	}
}

//session_start();
//$_SESSION['']

$main = new Monthly_report("Food City");
$main->generateMonReport();
