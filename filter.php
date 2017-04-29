<?php
//filter.php
$connect = mysqli_connect("localhost", "root", "", "EventManager");
$state = '';
$query = "SELECT state FROM location GROUP BY state ORDER BY state ASC";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
 $state .= '<option value="'.$row["state"].'">'.$row["state"].'</option>';
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Filter Form</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<br/>
<div class="container" style="width:700px;">
<h3 align = "center">Filter with state and city</h3><br/>
<br/>
<br/>
<br/>
<br/><br/>

<div align="center">
<button type = "button" name="filter" id="filter" class = "btn btn-success" data-toggle="modal" data-target="#filterModal" >Filter</button>
</div>

</div>
<br/>


</body>
</html>
<div id= "filterModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!--modal content-->
<div class = "modal-content">
<div class = "modal-header">
<button type="button" class="close" data-dismiss="modal"> &times;</button>
<h4 class="modal-title">Filter</h4>
</div>
<div class="modal-body">

<select name="state" id="state" class="form-control action">
    <option value="">Select State</option>
   <?php echo $state; ?>
   </select>
   <br />
   <select name="city" id="city" class="form-control">
    <option value="">Select City</option>
   </select>

<br/>
<button type="button" name="filter_button" id="filter_button" class="btn btn-warning">Filter</button>
</div>
</div>
</div>
</div>	
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "state")
   {
    result = 'city';
   }
   
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
 
 
$('#filter_button').click(function(){
  var statename = $('#state').val();
  var cityname = $('#city').val();
  var action = $('#filter_button').attr("id");
  if(statename != '' || cityname != ''){
  		$.ajax({
      		url :"fetchevents.php",
      		type : "POST",
          datatype: "JSON",
      		data: {action:action,statename:statename, cityname:cityname},
      		success: function(data){
            console.log("success in fetchevents");
      			if(jQuery.parseJSON(data).toString() == '0'){
      				alert("Mahesh");
      				alert("No records Exists");
      			}else{
      				alert(data);
      			}
      		}
      		
      });
  }
});
 
 
 
 
 
});




</script>


 
 
 






