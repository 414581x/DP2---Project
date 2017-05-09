<?php

  //include connection.php file
  //include 'connection.php';

  //call connection function to connect to database
 $servername = "localhost";
  $username = "dp2";
  $password = "phpdp2";
  $dbname = "dp2php";

 

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);}

  //populate variable with chosen invoice number
  $ItemID = $_GET['ItemID'];

  //SQl query to check if user already exists
  mysqli_query($conn, "DELETE FROM Items WHERE ItemID='".$ItemID."'");
  //close conneciton
  mysqli_close($conn);
  //redirect to viewsales.php page
  header("Location: viewstock2.php");
?> 