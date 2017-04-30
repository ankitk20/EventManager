<?php
session_start();
$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "eventmanager";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
 	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}else{
		echo "conn success";
	}

	$userid = $_POST["user"];
	$password = $_POST["pass"];
	echo $UserID;
	if(isset($_POST['user'])){
		echo "username set";
	}else{
		echo "username not set";
	}		


	$sql = "SELECT * FROM login where userid = '$userid' and password = '$password'";

	$result = mysqli_query($conn, $sql);

	if ($result->num_rows ==1){ 
         $_SESSION['user'] = $UserID;
          $_SESSION["loggedin"] = true;
         header("location: addEvent.html");
	}
	else {
	    echo "<script>alert('Invalid User Name or Password');window.location.href = './login.html'</script>";
	}
	$conn->close();
?>
