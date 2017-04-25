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

 $servername = "feenix-mariadb.swin.edu.au";
  $username = "s414581x";
  $password = "141083";
  $dbname = "s414581x_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
	 if ($conn === false) {
	die("Connection failed: " . $conn->connect_error);}



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
			</div>
			<br/>
			<div class="form-row">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	<button>Export as CSV</button>
</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
</body>
<?php
$result = mysqli_query($con, 'SELECT * FROM table');
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$fp = fopen('file.csv', 'w');

foreach ($row as $val) {
	fputcsv($fp, $val);
}

fclose($fp);


?>
</html>
