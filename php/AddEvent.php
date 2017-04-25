<html>
<body>
<?php
	$eventName = $date = $time = $description = $Fees = "";
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "EventManager";

	//retrieve inputs from the form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$eventName = $_POST["eventName"];
		$date = $_POST["dateOfEvent"];
		$time = $_POST["timeOfEvent"];
		$Fees = $_POST["fees"];
		$description = $_POST["description"];
		$collegeName = $_POST["collegeName"];
	}

	//datetime concatenation
	$datetime = $date.' '.$time;

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$description = mysqli_real_escape_string($conn, $description);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	//to create the event id
	$sql = "SELECT EventID,eventName FROM eventdetail ORDER BY EventID";
	if($result = mysqli_query($conn, $sql)){
		$rows = mysqli_num_rows($result); 
		printf("result set has %d rows\n",$rows);
		if($rows < 10){
			$EID = 'E0'.$rows;
		}
		else{
			$EID = 'E'.$rows;
		}
	}
	
	//Inserting into eventdetail
	$sql = "INSERT INTO `eventdetail`(`EventID`, `EventName` ,`Date`, `Description`, `Fees`) VALUES ('$EID','$eventName', CONVERT('$datetime', datetime),'$description', '$Fees');";
	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully in eventdetail";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	//retrieving collegeId
	$sql = "Select CollegeID from college Where Acronym = '$collegeName';";
	$cid = mysqli_query($conn, $sql);
	$a = mysqli_fetch_assoc($cid);
	$college_id = $a['CollegeID'];
	
	//insert into event
	$sql = "INSERT INTO event(`CollegeID`,`EventID`) VALUES ('$college_id','$EID');";
	if (mysqli_query($conn, $sql)) {
	    // echo "New record created successfully in event";
	    header("location:../index.php");
	} else {
	    header("location:../addEvent.html");
	    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
</body>
</html>