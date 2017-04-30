<?php
	$connect = mysqli_connect("localhost", "root", "root", "eventmanager");
	$state = '';
	$query = "SELECT distinct state FROM location";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		 $state .= '<option value="'.$row["state"].'">'.$row["state"].'</option>';
	}
	$dis = "SELECT * FROM eventdetail";
	$res = mysqli_query($connect, $dis);
	$i=1;

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Event Manager</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Events</span>
								</a>
								<form action="search.php" method="POST">
								<input type="text" id="search" name="search" placeholder="Search" style="text-align:center;margin-left:15%;width:65%;float:left;"/>
								<input type="submit" style="margin-left:2%">
								</form>

								<!-- Filter -->
								<form action="">
									<select name="state" id="state" class="action">
								   		<option value="">Select State</option>
									   <?php echo $state; ?>
								   </select>
									   <br />
								   <select name="city" id="city" class="form-control">
									    <option value="">Select City</option>
								   </select>
									<br/>
									<button type="button" id="filter_button" class="btn btn-warning">Filter</button>
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
							<li><a href="index.php">Home</a></li>
							<li><a href="login.html">Login</a> </li>
						</ul>
					</nav>

			
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<div id="filterloading">
								<section class="tiles">
									<?php while($display = mysqli_fetch_array($res)): ?>
									<article class="style<?php echo $i; ?>">
										<span class="image">
											<img src="images/pic0<?php echo $i;?>.jpg" alt="" />
										</span>

										<a href="generic.php">
											<form action="./generic.php" method="get">
												<input type="hidden" name="collegeid" value=<?php echo $display['collegeid'] ?>>
												<button type="submit">View</button>
											</form>
											<h2><?php echo $display['EventName']; $i+=1?></h2>
											<div class="content">
												<p><?php echo $display['Description'];?></p>
											</div>

										</a>
									</article>
									<?php endwhile ?>
								</section>
							</div>
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
				if(statename != '' || cityname != ''){

				    $.ajax({
				    
				    url :"fetchcollege.php",
				    method : "POST",
				    
				        data: {action:action,statename:statename, cityname:cityname},
				    
				    success: function(response){

						if(response=='No'){
							//$(".output").html("Record Not exists").fadeIn(1000);
							alert("Something went wrong with filtering");
						} 
						else{ 
							$('#filterloading').html(response);							
						}

					}
				     
				    
				  });
				 
				}    
				 });

				});
			</script>

	</body>
</html>
