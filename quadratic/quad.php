<?php
function quadratic($pa, $pb, $pc){

	$d = abs((pow($pb,2)) - (4 * $pa * $pc));
	$x1 = (((-$pb) + sqrt($d)) / (2 * $pa));
	$x2 = (((-$pb) - sqrt($d)) / (2 * $pa));

	//return "x1 = ".$x1;
	//[ ."(any_symbol/.;)". ] is required to allow for explode function
	return $x1."&?|".$x2;
}

$p_a = $_POST['a'];
$p_b = $_POST['b'];
$p_c = $_POST['c'];

$quad_result = quadratic($p_a, $p_b, $p_c);
$x = explode("&?|", $quad_result);

$rndm = $_POST['rdm'];

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

// Escape user inputs for security
$rndm = mysqli_real_escape_string($conn, $_REQUEST['rdm']);
$a = mysqli_real_escape_string($conn, $_REQUEST['a']);
$b = mysqli_real_escape_string($conn, $_REQUEST['b']);
$c = mysqli_real_escape_string($conn, $_REQUEST['c']);
//$x1 = mysqli_real_escape_string($conn, $_REQUEST['$x[0]']);
//$x2 = mysqli_real_escape_string($conn, $_REQUEST['$x[1]']);

$sql = "INSERT INTO calc1 (uniq_id, a, b, c, x1, x2)
VALUES ('$rndm', '$a', '$b', '$c', '$x[0]', '$x[1]')";

/*if ($conn->query($sql) === TRUE) {
  $returnMssg = "New record created successfully";
} else {
  $returnMssg = "Error: " . $sql . "<br>" . $conn->error;
}

return $returnMssg;

function insertQuad($unique_id, $a, $b, $c, $x1, $x2){
global $conn;
$sql = "INSERT INTO calc1 (uniq_id, a, b, c, x1, x2)
VALUES ('$rndm', '$a', '$b', '$c', '$x1', '$x2')";

if ($conn->query($sql) === TRUE) {
  $returnMssg = "New record created successfully";
} else {
  $returnMssg = "Error: " . $sql . "<br>" . $conn->error;
}

return $returnMssg;
}

$sql = insertQuad($uniq_id, $a, $b, $c, $x1, $x2);
*/

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
<title> Quad Calc </title>
<link rel="stylesheet" type="text/css" href="quad.css">
</head>


<body>
<h1>Quadractic Solver!</h1>



<form action="" target="_blank" method="post">
	<label for="ID"> Your unique ID is: </label><br>
	<input type="text" name="ID" size="9" value="<?php echo $rndm; ?> " disabled><br><br><br><br>
	<label for="x1">x1 = </label>
	<input type="number" name="x1" value="<?php echo $x[0]; ?>" disabled><br><br>
	<label for="x2">x2 = </label>
	<input type="number" name="x2" value="<?php echo $x[1]; ?>" disabled><br><br>
</form>	




<p>Copyrights Reserved. Made by Yours Truly.</p>



</body>
</html>


