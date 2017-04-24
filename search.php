<?php

if(isset($_POST["search"]))
{
 $connect = mysqli_connect("localhost", "root", "", "eventmanager");
 $output = array();
 	 
	$searchq =  $_POST['search'];
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	
	
  
  $query = "SELECT EventName FROM eventdetail WHERE EventName LIKE '%$searchq%'";
  $result = mysqli_query($connect, $query);


  if(mysqli_num_rows($result) == 0)
	echo "No such Event";

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
header("Location: utsav.html");
?>
 

