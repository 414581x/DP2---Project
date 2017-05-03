<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>View Sales Records</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// define variables and set to empty values
	$adate = $amonth = $aday = $ayear = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	//If set, put data into month variable
	$amonth = $_POST['amonth'];

	//If set, put data into day variable
	$aday = $_POST['aday'];

	//If set, put data into year variable
	$ayear = $_POST['ayear'];

	//Concat 3 variables into 1 variable
	$adate = $ayear. "-" .$amonth. "-" .$aday;

include 'connection.php';

  connection();



		$SQLstring = "SELECT InvoiceNumber, SalesDate, StaffNo , TotalPrice FROM Sales where SalesDate = '$adate'";

		$queryResult = @mysqli_query($conn, $SQLstring)
		Or die ("<p>Unable to query the table.</p>"."<p>Error code ". mysqli_errno($conn). ": ".mysqli_error($conn)). "</p>";

		//Display a table with results
	echo "<table width='100%' border='1'>";
	echo "<th>Invoice Number</th><th>Sales Date</th><th>Staff Number</th><th>Total Price</th><th>Options</th>";
	$row = mysqli_fetch_row($queryResult);

	while ($row) {
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td><a href= 'edit.php?InvoiceNumber=$row[0]'>Edit </a><a href= 'delete.php?InvoiceNumber=$row[0]'>Delete</a></td></tr>";

		$row = mysqli_fetch_row($queryResult);
	}





	mysqli_close($conn);

}
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
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="addstock.php">ADD STOCK ITEM</a></li>
					<li><a href="#">STOCK COUNT</a></li>
				</ul>
			</li>
			<li><a href="#">REPORTING</a></li>
			<li><a href="#">PREDICTION</a></li>
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
			<div class="form-row"><H1>View Sales Records</H1></div>
	<div class="form-row">
				<label for="staffno">Day</label>
				<select name="aday" value=''><option>Day</option>
	<?php for ($i = 1; $i <= 31; $i++) : ?>
  	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  	<?php endfor; ?></select>

			</div>
			<div class="form-row">
				<label for="saledate">Month</label>
				<select name="amonth" value=''><option>Month</option>
	<option value='01'>January</option>
	<option value='02'>February</option>
	<option value='03'>March</option>
	<option value='04'>April</option>
	<option value='05'>May</option>
	<option value='06'>June</option>
	<option value='07'>July</option>
	<option value='08'>August</option>
	<option value='09'>September</option>
	<option value='10'>October</option>
	<option value='11'>November</option>
	<option value='12'>December</option>
	</select>
			</div>

			<div class="form-row">
				<label for="totalprice">Year</label>
				<div class="input-group">
					<select name="ayear">
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	</select>
				</div>
				<div class="form-row">
				Select Date Item for Retrieve: <input type="radio" name="rdate" value="rdate">Request Date &nbsp; <input type="radio" name="pdate" value="pdate">Pick-up Date <br/>
				</div
			</div>
			<br/>
			<div class="form-row">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

		</form>
<form method="get" action="csv.php">
		<p>Export as CSV:<input id="submit" type="submit" value="Export"/></p>
	</form>

</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
</body>
<?php



?>
</html>
