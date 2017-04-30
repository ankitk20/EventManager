<?php 
	$conn = mysqli_connect("localhost", "root", "root", "eventmanager");
	// $collegeid = $_GET["collegeid"];
	$collegeid = 1;
	$query = "select * from location l natural join college c natural join event ev natural join eventdetail e where c.collegeid = '$collegeid'";

	$result = mysqli_query($conn, $query);
	if($result){
		$value = mysqli_fetch_assoc($result);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Event Name</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title"><?php $value["eventname"] ?></span>
								</a>

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
							<li><a href="login.html">Login</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h3>Event commences on<?php echo " ".$value["date"] ?></h3>
						    <p><b>DETAILS</b><br><?php echo $value["description"] ?></p>
							<p><b>FEES</b><br><?php echo "Rs". $value["fees"] ?></p>
                            <p><b>ADDRESS</b><br><?php echo $value["collegename"]." ". $value["street"]." ".$value["landmark"]." ".$value["city"]." ".$value["state"]." ".$value["pincode"] ?></p> 
							</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="./index.php">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>