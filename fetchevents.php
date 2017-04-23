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
	echo "0";

  else
  {
	  while($row = mysqli_fetch_row($result))
	{
	  
		$CollID = $row[0];
	
	
		$query1 = "SELECT EventID FROM event WHERE CollegeID = '$CollID' ";
		$result1 = mysqli_query($connect, $query1);
 
		while($row1 = mysqli_fetch_row($result1))
		{
		$Events[] = $row1[0]; 
         
		}
  
		}
 //}
  
		//$encoded = json_encode($output);
		$encoded = json_encode($Events);
		//header("Content-Type: application/json");
		echo $encoded;
}
}

?>

