<?php
//fetch.php



if(isset($_POST["action"]))
{
	$i = 0;
 $connect = mysqli_connect("localhost", "root", "", "eventmanager");
 $output = '';
 $EventDetails = array();
 
	$state =  $_POST['statename'];
	$city  = $_POST['cityname'];
	
  
  $query = "SELECT CollegeID FROM location WHERE state = '$state' AND city = '$city' ";
  $result = mysqli_query($connect, $query);


  if(mysqli_num_rows($result) == 0)
	echo '0';

  else
  {
	  while($row = mysqli_fetch_row($result))
	{
	  
		$CollID = $row[0];
	
	
		$query1 = "SELECT EventID FROM event WHERE CollegeID = '$CollID' ";
		$result1 = mysqli_query($connect, $query1);
 
		while($row1 = mysqli_fetch_row($result1))
		{
			$EventID = $row1[0];


			$query2 = "SELECT * FROM eventdetail WHERE EventID = '$EventID' ";
			$result2 = mysqli_query($connect, $query2);
			 
			while($row3 = mysqli_fetch_array($result2))
			{    
				$i = $i + 1;
				$output .= '<section class="tiles" width="50%">
								
								<article class="style'.$i.'">
									<span class="image">
										<img src="images/pic0'.$i.'.jpg" alt="" />
									</span>

									<a href="praxis.html">
										<h2>'.$row3["EventName"].'</h2>
										<div class="content">
											<p>'.$row3["Description"].'</p>
										</div>

									</a>
								</article>
								
							</section>
				
				
				';

			}
			
		}
		
	}
	
		
 //}
  
		//$encoded = json_encode($output);
		//$encoded = json_encode($Events);
		//$encoded = json_encode($EventDetails);
		
		//header("Content-Type: application/json");
		echo $output;
}
}

?>

