<?php
//fetch.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "addressdetails");
 $output = '';
 if($_POST["action"] == "state")
 {
  $query = "SELECT city FROM state_city WHERE state = '".$_POST["query"]."' ";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select city</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
  }
 }
 
 echo $output;
}
?>