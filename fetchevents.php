<?php
//fetch.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "eventmanager");
 $output = array();
 	 
	$state =  $_POST['statename'];
	$city  = $_POST['cityname'];
	
  
  $query = "SELECT CollegeID FROM location WHERE state = '$state' AND city = '$city' ";
  $result = mysqli_query($connect, $query);


  if(mysqli_num_rows($result) == 0)
	  echo  "0";
  else
  {
	while($row = mysqli_fetch_row($result))
	{
			  
		$output[] = $row; 
				 
	}
	
	

				$encoded = json_encode($output);
				//header("Content-Type: application/json");
				echo $encoded;
	}
}

?>

