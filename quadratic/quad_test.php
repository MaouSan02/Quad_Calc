

<!DOCTYPE html>
<html>
<head>
<title> Quad Calc </title>
<link rel="stylesheet" type="text/css" href="quad.css">
</head>


<body>
<h1>Quadractic Solver!</h1>
<form class="dif" style="font-size: 18pt; height: auto; width: 400px; color: white; margin: auto"> <b>
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

function selectQuad($uid){

	global $conn;
	
	$sql = "SELECT * FROM calc1 
	WHERE uniq_id = $uid";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
 	// output data of each row
	  	while($row = mysqli_fetch_assoc($result)) {
		    echo "Unique_ID: " . $row["uniq_id"]."<br>". " a: " . $row["a"]."<br>". " b: " . $row["b"]."<br>". " c: " . $row["c"]."<br>". " x1: " . $row["x1"]."<br>". " x2: " . $row["x2"]. "<br>";
		}
	}
	else {
	  echo "0 results";
	}

	return;
}

$unqid = $_POST['uid'];

selectQuad($unqid);

mysqli_close($conn);


?>

</b>
</form>
<p>Copyrights Reserved. Made by Yours Truly.</p>



</body>
</html>