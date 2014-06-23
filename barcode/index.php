 <!-- Database Connection -->
<?php
	$user = "project";
	$password = "project";
	$host = "localhost";
	$database = "barcode";
	$con = mysql_connect($host,$user,$password);
	$db_con = mysql_select_db($database);
?>
<!-- End Database Section -->

<!-- Generate Barcode -->
<?php
	if (isset($_POST['create'])) {
		//Barcode Value
		$value = "00006";

		//Generate Barcode
		echo "<img src='code/barcode.php?codetype=Code39&size=45&text={$value}'>";
		
		//Display Barcode Value
		echo "<br>Value = {$value}";

		//Setting Date Time Format 
		date_default_timezone_set('UTC'); 
		echo "<br><br>".date("j-M-Y");

		$query = "SELECT * FROM barcode ORDER BY id DESC";
		$data = mysql_query($query);
		while ($row = mysql_fetch_assoc($data)) {
			echo $row['image']."<br>";
		}

	}
?>
<!-- End Generate Barcode -->

<!DOCTYPE html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Barcode</title>
	</head>
	<body>
		<form action="index.php" method="POST">
			<button name="create">Create Barcode</button>
		</form>
	</body>
</html>