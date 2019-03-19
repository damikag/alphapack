<?php

include_once("../Model/Promotion.php");

class Person{
	
	public static function readPromotionFromDBCategory($category){
	
		$dbh=new Dbh();
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE category = ? and state='Accepted'" );	
		$sql->bind_param("s", $category);
		$sql->execute();
		$results = $sql->get_result();
		$viewPromotion;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			$tempPromo = new Promotion($row['promo_id'],$row['category'],$row['title'],$row['description'],$row['image_path'],$row['link'],$row['state'],$row['start_date'],$row['end_date'],$row['location'],$row['pr_username'],$row['ad_username']);
			
			$this->viewPromo[$i] = $tempPromo;
			$i = $i +1;
		}
		
		return $viewPromo;
	}
}