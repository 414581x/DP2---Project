<?php
 $servername = "feenix-mariadb.swin.edu.au";
  $username = "s414581x";
  $password = "141083";
  $dbname = "s414581x_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);}

  //SQl query to check if user already exists

$InvoiceNumber = $_GET['InvoiceNumber'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM Sales WHERE InvoiceNumber='".$InvoiceNumber."'");
mysqli_close($conn);
header("Location: viewsales.php");
?> 