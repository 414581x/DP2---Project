<!Doctype HTML>
<html>
<body>
<h1>Export CSV</h1>
<?php

 $servername = "localhost";
 $username = "dp2";
 $password = "phpdp2";
 $dbname = "dp2php";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
	 if ($conn === false) {
	die("Connection failed: " . $conn->connect_error);}

$result = mysqli_query($conn, 'SELECT * FROM table');
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$fp = fopen('file.csv', 'w');

foreach ($row as $val) {
	fputcsv($fp, $val);
}

fclose($fp)
 echo "<p><a href='veiwsales.php'>Return</a></p>";
 
  $conn->close();
?>
</body>
</html>
