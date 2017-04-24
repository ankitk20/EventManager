<?php
	//filter.php
	$connect = mysqli_connect("localhost", "root", "", "eventmanager");
	$state = '';
	$query = "SELECT state FROM state_city GROUP BY state ORDER BY state ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		 $state .= '<option value="'.$row["state"].'">'.$row["state"].'</option>';
	}
	$dis = "SELECT * FROM eventdetail";
	$res = mysqli_query($connect, $dis);


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
								<form action="utsav.html" method="POST">
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
									<button type="button" name="filter_button" id="filter_button" class="btn btn-warning">Filter</button>
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
							<?php while($display = mysqli_fetch_array($res)): ?>
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="images/pic01.jpg" alt="" />
									</span>

									<a href="praxis.html">
										<h2><?php echo $display['EventName']; ?></h2>
										<div class="content">
											<p><?php echo $display['Description']; ?></p>
										</div>
										<?php endwhile ?>
									</a>
								</article>
								<!--<article class="style2">
									<span class="image">
										<img src="images/pic02.jpg" alt="" />
									</span>
									<a href="utsav.html">
										<h2>VESIT</h2>
										<div class="content">
											<p>Utsav in March</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="images/pic03.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Bharat College</h2>
										<div class="content">
											<p>Technostorm 2017</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="images/pic04.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>MES Pillai's Institute of technology</h2>
										<div class="content">
											<p>Algeria 2017</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>SIES College of Engineering</h2>
										<div class="content">
											<p>Pixels 2017</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="images/pic06.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>SRES College of engineering</h2>
										<div class="content">
											<p>UTSAV TECHFEST 2k17</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="images/pic07.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>YadavRao Tasgaokar </h2>
										<div class="content">
											<p>National Level workshop.</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="images/pic08.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Dolor</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style1">
									<span class="image">
										<img src="images/pic09.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Nullam</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic10.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Ultricies</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="images/pic11.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Dictum</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="images/pic12.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Pretium</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>-->
							</section>
						</div>
					</div>

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