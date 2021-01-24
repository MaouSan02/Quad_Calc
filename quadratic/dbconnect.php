<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quad";

$returnArray = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function insertQuad($user_id, $unique_id, $a, $b, $c, $x1, $x2){
	global $conn;
	$sql = "INSERT INTO calc (user_id, unique_id, a, b, c, x1, x2)
	VALUES ('User5', uniqid(), 1, 4, -24, -8, 4)";

	if ($conn->query($sql) === TRUE) {
	  $returnMssg = "New record created successfully";
	} else {
	  $returnMssg = "Error: " . $sql . "<br>" . $conn->error;
	}

	return $returnMssg;
}

function selectQuad($uid){

	global $conn;
	
	$sql = "SELECT * FROM calc 
	WHERE calc_id = $uid";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
 	// output data of each row
	  	while($row = mysqli_fetch_assoc($result)) {
		    echo "unique_id: " . $row["unique_id"]."<br>". "user_id: " . $row["user_id"]."<br>". " - a: " . $row["a"]."<br>". "- b: " . $row["b"]."<br>". "- c: " . $row["c"]."<br>". "- x1: " . $row["x1"]."<br>". "- x2: " . $row["x2"]. "<br>";
		}
	}
	else {
	  echo "0 results";
}

	return;
}

$sql = selectQuad(2);

mysqli_close($conn);
?>