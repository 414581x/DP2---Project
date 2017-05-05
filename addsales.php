<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML" lang="en" data-ng-app="App">
<head>
	<title>Add Sales Records</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body data-ng-controller="myCtrl">

<?php
session_start();
$default = "";
$default = $_SESSION['$login_user'];

	// define variables and set to empty values
	$totalpriceErr = $saledateErr = "";
	$itemcode = $saledate = $totalprice = $rrp = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//statement to see if name field is empty. If it is, populate error variable. If not, put data into name variable

			//$inum = isset($_POST['inum']) ? $_POST['inum'] : "";

	//statement to see if password field is empty. If it is, populate error variable. If not, put data into password variable

		 $rrp = isset($_POST['rrp']) ? $_POST['rrp'] : "";

		 $itemcode = isset($_POST['itemcode']) ? $_POST['itemcode'] : "";

	//statement to see if password confirmation field is empty. If it is, populate error variable. If not, put data into confirmation password variable
 if (empty($_POST['saledate'])) {
			$saledateErr = "Sale Date is required";
		} else {
			$saledate = isset($_POST['saledate']) ? $_POST['saledate'] : "";
	}

	//statement to see if email field is empty. If it is, populate error variable. If not, put data into email variable
 if (empty($_POST['totalprice'])) {
			$totalpriceErr = "Total Price is required";
		} else {
			$totalprice = isset($_POST['totalprice']) ? $_POST['totalprice'] : "";
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $default; ?></span> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="register.php">Create New User</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<form action="" method="post" name="myForm">
		<div class="row">
			<div class="col-xs-12">
				<H1 class="text-center">Add Sales Record</H1>
			</div>
			<div class="col-xs-6">
				<div class="form-row">
						<label for="itemcode">Item Code</label>
						<input type="text" class="form-control" name="itemCode" id="itemCode" data-ng-pattern="itemCode" data-ng-required="true"/>
						<p data-ng-show="myForm.itemCode.$error.pattern">Only number allowed for item code, 6 digits</p>
				</div>
				<div class="form-row">
						<label for="staffno">Item Name</label>
						<input type="text" class="form-control" name="itemName" id="itemName" />
				</div>
				<div class="form-row">
					<label for="CostPrice">Cost Price</label>
					<div class="input-group">
						<input type="number" min="1" step="any" class="form-control" name="CostPrice" id="CostPrice" />
						<p data-ng-show="myForm.pcode.$error.pattern">Only number allowed for price</p>
					</div>
				</div>
				<div class="form-row">
					<label for="RetailPrice">Retal Price</label>
					<div class="input-group">
						<input type="number" min="1" step="any" class="form-control" name="RetailPrice" id="RetailPrice" /><span class="error"><?php echo $totalpriceErr;?></span>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-row">
						<label for="staffno">Staff Number</label>
						<input type="text" class="form-control" name="staffno" id="staffno" value="<?php echo $default; ?>"/>
				</div>
				<div class="form-row">
					<label for="saledate">Date of Sale</label>
					<input type="date" class="form-control" placeholder="YYYY-MM-DD" name="saledate" id="saledate" /><span class="error"><?php echo $saledateErr;?></span>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-row">
				<button type="submit" name="additem" >Additem</button>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</div>
			</div>
		</div>
	</form>
</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
	<!-- client side validation -->
	<script src="js/validation.js"></script>
</body>
<?php
 //
		$servername = "localhost";
		$username = "dp2";
		$password = "phpdp2";
		$dbname = "dp2php";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn === false) {
			die("Connection failed: " . $conn->connect_error);}

	//SQl query to check if user already exists
	//include 'connection.php';

	//connection();

if (isset($_POST['additem'])) {

	$query = "SELECT ProductNumber FROM additem";
	$result = mysqli_query($conn, $query);


	if(empty($result)) {

			$maketemp = "CREATE TEMPORARY TABLE additem (
										`ProductNumber` int NOT NULL,
										`SalePriceTotal` decimal(10, 0),
										`QuantityOrdered` int
									)";

			$queryResult = @mysqli_query($conn, $maketemp)
			Or die ("<p>Unable to query the table.</p>"."<p>Error code ". mysqli_errno($conn). ": ".mysqli_error($conn)). "</p>";
	 //mysql_query($maketemp, connection()) or die ("Sql error : ".mysql_error());
		}

		$inserttemp = "INSERT INTO additem (`ProductNumber`, `SalePriceTotal`, `QuantityOrdered`)
								VALUES ('$itemcode', '$rrp', '$totalprice')";
		 mysqli_query($conn, $inserttemp) or die ("Sql error create : ".mysql_error());

		$SQLstring = "SELECT * FROM additem";

	if ($queryResult = mysqli_query($conn, $SQLstring)) {
		//Display a table with results
	echo "<table width='100%' border='1'>";
	echo "<th>ProductNumber</th><th>SalePriceTotal</th><th>QuantityOrdered</th>";
	$row = mysqli_fetch_row($queryResult);

		while ($row) {
			echo "<tr><td>{$row[0]}</td>";
			echo "<td>{$row[1]}</td>";
			echo "<td>{$row[2]}</td></tr>";

			$row = mysqli_fetch_row($queryResult);
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if(!empty($staffno) && !empty($saledate) && !empty($totalprice)) {
		//SQL statement to insert new record of user
		$sql = "INSERT INTO Sales (SalesDate, StaffNo, TotalPrice)
		VALUES ('$saledate', $staffno, $totalprice)";

		if($conn->query($sql) === TRUE) {
			 echo "Sales Record successfully added.";
		}
		else {
			echo "ERROR: Could not execute insert." . $conn->error;
		}
	$conn->close();
		}
}
	// }
?>
</html>
