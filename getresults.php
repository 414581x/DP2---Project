<?php
	//$salesldate = date('Y-m-d', $_POST['currentdate']);

    $salesldate = date("Ymd"); 
	$staffid = $_POST['staffno'];
	$totalprice = $_POST['totalprice'];

	

	
	$itemid = $_POST['itemarray'];
	$price = $_POST['pricearray'];
	$qtybox = $_POST['qtyarray'];
	$totalbox = $_POST['totalarray'];


  $servername = "localhost";
  $username = "dp2";
  $password = "phpdp2";
  $dbname = "dp2php";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);
  }


//foreach($itemid as $a => $b) {
//echo "$itemid[$a] - $price[$a] - $qtybox[$a] - $totalbox[$a]<br />";}

//if(!empty($salesldate) && !empty($staffid) && !empty($totalprice)) {

 $sqlsales = mysqli_query($conn, "INSERT INTO Sales (SalesDate, StaffID, TotalPrice)
      VALUES ($salesldate, $staffid, $totalprice)");


	foreach($itemid as $a => $b) {
      //SQL statement to insert new record of user
      $sql = "INSERT INTO `Items_Sold` (InvoiceId, ItemID, Qty, Cost)
      VALUES (LAST_INSERT_ID(),$ itemid[$a], $qtybox[$a], $totalbox[$a])";



		$sqlitemsold = mysqli_query($conn, "INSERT INTO `Items_Sold` (InvoiceId, ItemID, Qty, Cost) VALUES (LAST_INSERT_ID(), $itemid[$a], $qtybox[$a], $totalbox[$a])");

		 //$sql = "INSERT INTO `Items_Sold` (InvoiceId, ItemID, Qty, Cost) VALUES (LAST_INSERT_ID(), $itemid[$a], $qtybox[$a], $totalbox[$a])";



		 $sql = "UPDATE Items SET Qty = Qty-'$qtybox[$a]' WHERE ItemID = '$itemid[$a]'";


      if($conn->query($sql) === TRUE){
       echo "Product successfully added.";
      }
      else {
        echo "ERROR: Could not execute insert." . $conn->error;
      }
  }

		//echo $invoiceid[$a];

 //echo "$salesldate - $staffid -  $totalprice- $totalbox[$a] <br />";



?> 
