<?php
$user = "php";
$pass = "php";
$host = "localhost";
$db = "akshar";
$con = mysql_connect($host,$user,$pass);
$dbcon = mysql_select_db($db);

$start_time=microtime(true);
$resultsets=mysql_query("select * from admin");
$stop_time=microtime(true);

echo "Total Records: ".mysql_fetch_array($resultsets);
echo "<br/>Time taken: ".number_format($stop_time-$start_time,4);

?>