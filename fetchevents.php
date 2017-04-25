<?php
	//fetch.php
	if(isset($_POST["action"])){
		$connect = mysqli_connect("localhost", "root", "root", "EventManager");
		$output = array();
		 	 
		$state =  $_POST['statename'];
		$city  = $_POST['cityname'];
			
		  
		$query = "SELECT CollegeID FROM location WHERE state = '$state' AND city = '$city' ";
		$result = mysqli_query($connect, $query);

		while($row = mysqli_fetch_row($result)){					  
				$output[] = $row; 
		}
		
		$encoded = json_encode($output);
		//header("Content-Type: application/json");
		echo $encoded;
	}

?>

