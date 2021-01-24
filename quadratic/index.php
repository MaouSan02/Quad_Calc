<?php

function random() {
	$u = (float)rand()/(float)getrandmax();
	$v = $u * 10000;
	return (int)$v;
}

$rndm = random();

?> 

<!DOCTYPE html>
<html>
<head>
<title> Quad Calc </title>
<link rel="stylesheet" type="text/css" href="quad.css">
</head>


<body>
<h1>Quadractic Solver!</h1>

<form action="quad.php" target="_self" method="post">
	<label style="font-size: 19pt" for="rdm">Your Unique ID is: </label> 
	<input type="text" name="rdm" size="3" value="<?php echo $rndm;?>">
	<br><br>

	<label for="a">a = </label>
	<input type="number" id="a" name="a" size="4"><br><br>
	<label for="b">b = </label>
	<input type="number" id="b" name="b" size="4"><br><br>
	<label for="c">c = </label>
	<input type="number" id="c" name="c" size="4"><br><br><br>
	<input type="submit" value="Solve">
</form>


<br><br><br> 

	<form class="dif" action="quad_test.php" target="_blank" method="post">
		<label for="uid"><b>Have you used our Quadratic Solver Before?<br> If yes, Enter Your Unique_ID</b> </label>
		<input style="background-color: white; border-radius: 12px" type="text" name="uid" size="5"><br><br>

		<input style="font-size: 16pt" type="submit" value="Search"> <br><br><br>
	</form>



<p><br><br>Copyrights Reserved. Made by Yours Truly.</p>

</body>
</html>