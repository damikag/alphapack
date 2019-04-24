
<?php
/*
	This is the driver function which runs the monthly report function once in a month
	It is done by creating a file and deleting it after a month
	The monthly report is not generated unless the file does not exist
*/

class Timer{
	
	public function calculate_time(){		
		//finds the current time, 28th day 6am and if after 6 am and file doesnt exist file generation called.
		
		$time_zone = new DateTimeZone('Asia/Colombo');
		
		$current_time = new DateTime("now",$time_zone);
		$temp = $current_time->format("Y/m/28 06:00:00");

		$end_time = new DateTime($temp,$time_zone);
	
//		echo date_format($current_time,"Y/m/d H:i:s")."<br>";
//		echo date_format($end_time,"Y/m/d H:i:s")."<br>";

		$file = 'timer.txt';
		
		if($end_time<$current_time){

			if($this->run_once_check($file)){
				//run the program
			}
		}
		elseif(file_exists($file)){
			$this->delete_file($file);
		}

	}
	
	private function run_once_check($file){
		
		if(!file_exists($file)){
			file_put_contents($file,"");
			return true;
		}
		return false;
	}
	
	private function delete_file($file){
		//file opend and closed to avoid errors during file deletion
		$fileLink =  fopen($file,'w');
		fclose($fileLink);
		unlink($file);
	}
}



$timer = new Timer();
$timer->calculate_time();