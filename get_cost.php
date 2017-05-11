<?php 
if (isset($_POST['package'])) {

$servername = "localhost";
  $username = "dp2";
  $password = "phpdp2";
  $dbname = "dp2php";
 

  // Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
 	if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);}


    $qry = "select * from Items where ItemID=" . $_POST['package'];
    $rec = mysql_query($conn, $qry);
    if (mysql_num_rows($rec) > 0) {
        while ($res = mysql_fetch_array($rec)) {
            echo $res['package_cost'];
        }
    }
}
die();
?>