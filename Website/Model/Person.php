<?php

include_once("../Model/Promotion.php");

class Person{
	
	private function readPromotionFromDBCategory($category){
	
		$dbh=new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE category = ? and state='Accepted'" );	
		$sql->bind_param("s", $category);
		$sql->execute();
		$results = $sql->get_result();
		$viewPromo = [];
		$i = 0;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			
			$tempPromo = new Promotion($row['promo_id'],$row['category'],$row['title'],$row['description'],$row['image_path'],$row['link'],$row['state'],$row['start_date'],$row['end_date'],$row['location'],$row['pr_username'],$row['ad_username']);
			
			$viewPromo[$i] = $tempPromo;
			$i = $i +1;
		}
		
		return $viewPromo;
	}
	
	public function getReadPromotionFromDBCategory($category){
		
		$dbh=new Dbh();
		$conn = $dbh->connect();
		$viewPromo = $this->readPromotionFromDBCategory($category);
		$len = count($viewPromo);
		for ($i=0; $i<$len ; $i++){
			$tempPromo = $viewPromo[$i];
			$sql = $conn->prepare("SELECT * from promotor WHERE username = ?");
			$prUsername = $tempPromo-> getPr_username();
			$sql->bind_param("s", $prUsername);
			$sql->execute();
			$results = $sql->get_result();
			if($row = $results->fetch_array(MYSQLI_ASSOC)){
				$tempPromo->setPr_name($row['promotor_name']);
			}
			$viewPromo[$i]=$tempPromo;
		}
		
		return $viewPromo;
	}
}