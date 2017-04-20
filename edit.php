<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Add Sales Recors</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body>

<?php 
$InvoiceNumber = $_GET['InvoiceNumber'];
  // define variables and set to empty values
  $totalpriceErr = "";
  //$InvoiceNumber = "";
  $staffno = $saledate = $totalprice = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //statement to see if name field is empty. If it is, populate error variable. If not, put data into name variable
  
      //$inum = isset($_POST['inum']) ? $_POST['inum'] : "";
  
  		
  //statement to see if password field is empty. If it is, populate error variable. If not, put data into password variable

     $staffno = isset($_POST['staffno']) ? $_POST['staffno'] : "";
  

  //statement to see if password confirmation field is empty. If it is, populate error variable. If not, put data into confirmation password variable
 
     $saledate = isset($_POST['saledate']) ? $_POST['saledate'] : "";
  

  //statement to see if email field is empty. If it is, populate error variable. If not, put data into email variable

     $totalprice = isset($_POST['totalprice']) ? $_POST['totalprice'] : "";
  


}
?>


<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="cover.html">PHP Inc.</a>
		</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown active">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">SALES <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="addsales.php">ADD SALES</a></li>
					<li><a href="edit.php">EDIT SALES</a></li>
					<li><a href="viewsales.php">DISPLAY SALES</a></li>
				</ul>
			</li>
			<li><a href="#">GOODS RECEIVED</a></li>
			<li><a href="#">REPORTING</a></li>
			<li><a href="#">SALES</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Create New User</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
		<form action="" method="post">
			<div class="form-row"><H1>Edit Sales Record</H1></div>
	<div class="form-row">
				<label for="staffno">Staff Number</label>
				<input type="number" class="form-control" name="staffno" id="staffno" />
			</div>
			<div class="form-row">
				<label for="saledate">Date of Sale</label>
				<input type="date" class="form-control" placeholder="YYYY-MM-DD" name="saledate" id="saledate" />
			</div>
			
			<div class="form-row">
				<label for="totalprice">Total Price</label>
				<div class="input-group">
					<input type="number" min="1" step="any" class="form-control" name="totalprice" id="totalprice" />
				</div>
			</div>
			<br/>
			<div class="form-row">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
</body>
<?php
 //if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
  


  if(!empty($staffno) && !empty($saledate) && !empty($totalprice)) {
  
  
      //SQL statement to insert new record of user
      $sql = "UPDATE Sales SET SalesDate = '$saledate', StaffNo = '$staffno', TotalPrice='$totalprice' WHERE InvoiceNumber = $InvoiceNumber";
      
  

      if($conn->query($sql) === TRUE){
       echo "Sales Record successfully updated.";
      }
      else {
        echo "ERROR: Could not execute update." . $conn->error;
      }
 
  $conn->close();
    }
  // }
?>
</html>