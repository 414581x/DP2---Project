<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Add Sales</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body>
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
					<li><a href="add-sales.html">ADD SALES</a></li>
					<li><a href="edit-sales.html">EDIT SALES</a></li>
					<li><a href="display-sales.html">DISPLAY SALES</a></li>
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
					<li><a href="#">Log Out</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
		<form>
			<div class="form-row"><H1>Add Sales Record</H1></div>
			<div class="form-row">
				<label for="pcode">Product code</label>
				<input type="text" class="form-control" name="pcode" id="pcode" />
			</div>
			<div class="form-row">
				<label for="description">Description</label>
				<input type="text" class="form-control" name="description" id="description" />
			</div>
			<div class="form-row">
				<label for="description">Quantity</label>
				<input type="number" class="form-control" name="quantity" id="quantity" />
			</div>
			<div class="form-row">
				<label for="rrp">RRP</label>
				<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" pattern="[0-9]+([,\.][0-9]+)?" placeholder="0" min="0" step="0.05" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="rrp" />
				</div>
			</div>
			<div class="form-row">
				<label for="total">Total</label>
				<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" pattern="[0-9]+([,\.][0-9]+)?" placeholder="0" min="0" step="0.05" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="total" />
				</div>
			</div>
			<br/>
			<div class="form-row">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
</body>
<?php
	$servername = "feenix-mariadb.swin.edu.au";
	$username = "s414581x";
	$password = "141083";
	$dbname = "s414581x_db";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}
		if(isset($_GET['name']) && isset($_GET['password']))
		{
			$RegisterName = $_GET['name'];
			$RegisterPassword = $_GET['password'];
			$RegisterEmail = $_GET['email'];
			$RegisterPhone = $_GET['phone'];
	$sql = "INSERT INTO customer (name, password, email, phone)
	VALUES ('$RegisterName', '$RegisterPassword', '$RegisterEmail', '$RegisterPhone')";
	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
	} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
		}
		//else {
		//  echo "<p>Please enter your name and phone number and click the Register button.</p>";
		//}
?>
</html>
