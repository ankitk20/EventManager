<?php
if(isset($_POST["search"]))
{
 $connect = mysqli_connect("localhost", "root", "", "eventmanager");
	$searchq =  $_POST['search'];
	$search = "SELECT EventName,Description FROM eventdetail WHERE EventName like '%$searchq%' or EventID in (select eventID from event where collegeID in (select collegeID from college where Acronym = '%$searchq%'))";
	$resulta = mysqli_query($connect, $search);
	$i=1;
}	
?>
 

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Event Manager</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<style>
		.title{
			display: inline-block;
		}
	</style>
	<body>
		<div class="output">
			
		</div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Events</span>
								</a>

								<!-- Search -->
								
								<form action="search.php" method="POST">
								<input type="text" id="search" name="search" placeholder="Search" style="text-align:center;margin-left:15%;width:65%;float:left;"/>
								<input type="submit" style="margin-left:2%">
								</form>

								
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="login.html">Login</a> </li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<section class="tiles">

								<?php while($display = mysqli_fetch_array($resulta)): ?>
								<article class="style<?php echo $i; ?>">
									<span class="image">
										<img src="images/pic0<?php echo $i;?>.jpg" alt="" />
									</span>

									<a href="<?php echo $i;?>.html"">
										<h2><?php echo $display['EventName']; $i+=1?></h2>
										<div class="content">
											<p><?php echo $display['Description']; ?></p>
										</div>

									</a>
								</article>
								<?php endwhile ?>
							</section>
						</div>
					</div>
				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="copyright">
							<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
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

				 
				//$('#filterModal').modal('hide');

				var statename = $('#state').val();
				var cityname = $('#city').val();
				var action = $('#filter_button').attr("id");
				if(statename != '' || cityname != '')


				{
				  // $('#filterModal').modal('hide');



				    $.ajax({
				    
				    url :"fetchevents.php",
				    type : "POST",
				    
				        data: {action:action,statename:statename, cityname:cityname},
				    
				    success: function(data)
				    {

				      if(jQuery.parseJSON(data).toString() == '0')
				      {
				        $(".output").html("Record Not exists").fadeIn(1000);
				        
				      } 
				      else
				      {
				        var ar = jQuery.parseJSON(data).toString().split(',');
				        // alert(ar[0]+" "+ar[1]+" "+ar.length);
				         $(".output").html("");
				        
				        for(i=0;i<ar.length;i++)
				        {
				          $(".output").append(ar[i]+"<br/>").fadeIn(1000);
				        }
				      }

				    }
				     
				    
				  });
				 
				}    
				 });
				});
			</script>

	</body>
</html>



