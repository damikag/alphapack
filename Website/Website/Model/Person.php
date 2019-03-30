<?php

include_once("../Model/Promotion.php");
include_once("../Model/promoter.php");

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
	
	
	private function viewPromoterDetails($pr_username){
		
		$dbh=new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("SELECT * from promotor WHERE username = ?" );
		$tempUsername = $pr_username;
		$sql->bind_param("s", $tempUsername);
		$sql->execute();
		$results = $sql->get_result();
		$tempPromoter = null;
		 //__construct($username,$promoterName,$email,$password,$mapLocation,$phoneNo,$weblink,$fblink,$rating)
		if($row = $results->fetch_array(MYSQLI_ASSOC)){
			$tempPromoter = new Promoter($tempUsername,$row['promotor_name'],$row['email'],$row['password'],$row['map_location'],$row['phone_no'],$row['website'],$row['fb_link'],$row['rating']);
			
			
		}
		return $tempPromoter;
		
	}
	
	public function getViewPromterDetails($pr_username){
		$tempPromoter = $this->viewPromoterDetails($pr_username);
		return $tempPromoter;
	}
	
	private function viewPromotionByPromoter($pr_username){
		$dbh=new Dbh();
		$conn = $dbh->connect();
		$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE pr_username = ? and state = 'Accepted'");
				
		$sql->bind_param("s", $pr_username);
		$sql->execute();
		$results = $sql->get_result();
		$viewPromo = [];
		$i = 0;
		while($row = $results->fetch_array(MYSQLI_ASSOC)){
			
			//__construct($promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$pr_username,$ad_username)
			
			$tempPromo= new Promotion($row["promo_id"],$row["category"],$row["title"],$row["description"],$row["image_path"],$row["link"],$row['state'],$row["start_date"],$row["end_date"],$row['location'],$row["pr_username"],$row["ad_username"]);
			
			$viewPromo[$i] = $tempPromo;
			
			$i++;
		}
		
		return $viewPromo;
	}
	
	public function getViewPromotionByPromoter($pr_username){
		$viewPromo = $this->viewPromotionByPromoter($pr_username);
		return $viewPromo;
	}
}