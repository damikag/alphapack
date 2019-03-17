<!--------------------------
CREATED BY: GAYAL
2019-03-07
---------------------------->


<?php

include_once("../Controller/dbh.php");
include_once("../Model/Promotion.php");
include_once("../Model/promoter.php");

//class Promotion{
//	var $name;
//	var $category;
//	var $image_path;
//	var $state;
//	var $start_date;
//	var $end_date;
//	var $rating;
//	
//	function __construct($name,$category,$image_path,$state,$start_date,$end_date/*,$no_of_subscribers*/){
//		$this->name = $name;
//		$this->category = $category;
//		$this->image_path = $image_path;
//		$this->state = $state;
//		$this->start_date = $start_date;
//		$this->end_date = $end_date;
//	}
//	
//	
//}


/*************************************
TEMPORARY CLASS PROMOTOR
SHOULD BE REPLACED BY MODEL/PROMOTOR WHEN IT IS COMPLETED
*************************************/

//class Promotor{
//	private $name;
//	private $rating;
//	private $promotion_list;
//	private $customer_count;
//	public function __construct($name,$rating){
//		$this->name = $name;
//		$this->rating = $rating;
//		$this->promotion_list = array();
//	}
//	
//	public function get_customer_count(){
//		return $this->customer_count;
//	}
//	
//	public function set_customer_count($customer_count){
//		$this->customer_count = $customer_count;
//	}
//	
//	public function add_promotion($promotion){
//		array_push($this->promotion_list,$promotion);
//	}
//	
//	public function get_promotion_list(){
//		return $this->promotion_list;
//	}
//}

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
//		return $stmt;
//		$stmt = $this->prepared_statement($conn,$sql);
		$stmt->bind_result($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating);
		$stmt->fetch();
		
		$promoter = new Promoter($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating);
		echo $promoter->getEmail();
		
		$subscribeCount = $promoter->subscribedCustomerCount();
		echo $subscribeCount;
		
		$promoter->readPromotionsFromDB();
		
	}
}


//		if( $stmt->num_rows===1){
//			while($stmt->fetch()){
////				echo "Rating of the Promotor:".$rating."<br>";
//				$promotor = new Promotor($this->promotor_name,$rating);
//				
//				$sql1 = "SELECT promo_id,category,title,description,image_path,link,state,start_date,end_date,location,pr_username,ad_username FROM confirmed_promotion WHERE pr_username = (?)";
//				
//				$sql2= "SELECT COUNT(DISTINCT cus_username) FROM promotor_subscribing WHERE pr_username = (?)";
//				
//				
//				
//				$stmt1 = $this->prepared_statement($conn,$sql1);
//				$stmt2 = $this->prepared_statement($conn,$sql2);
//				
//				$stmt1->bind_result($id,$category,$title,$description,$image_path,$link,$state,$start_date,$end_date,$location,$pr_username,$ad_username);
//				$stmt2->bind_result($customer_count);
//				
//				if( $stmt1->num_rows>0){
//					while($stmt1->fetch()){
//						
//						$promotor->add_promotion(new Promotion($id,$category,$title,$description,$image_path,$link,$state,$start_date,$end_date,$location,$pr_username,$ad_username));
////						echo "start day of the promotion ".$id.":".$start_date."<br>";
//					}
//				}
//				else{
//					echo "No lines for stmt1!!";
//				}
//				$stmt1->close();
//				
//				
//				if( $stmt2->num_rows==1){
//
//					while($stmt2->fetch()){
//						$promotor->set_customer_count($customer_count);
//					}
//				}
//				else{
//					echo "No lines for stmt2!!";
//				}
//				
//				$stmt2->close();
//
//				
//			}	
//		}
//		else{
//			echo "No such data!!";
//		}

			
		
		
//	}
	
//	
//	private function prepared_statement($conn,$sql){
//		if(!($stmt = $conn->prepare($sql))){
//			echo "Prepare failed";
//		}
//		if(!$stmt->bind_param("s",$this->promotor_name)){
//			echo "Binding parameters failed";
//		}
//		if($res = !$stmt->execute()){
//			echo "Execute failed";
//		}
//		$stmt->store_result();
//		return $stmt;
//	}
//	
//}
//
//$main = new Monthly_report("Food City");
//$main->generateMonReport();
