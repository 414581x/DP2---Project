<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Sales</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<!--<HTML XMLns="http://www.w3.org/1999/xHTML"> -->
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
<H1>Add Sales Record</H1>
<br/>

<form>
	Product code: <input type="text" name="pcode"> <br/>
	Description: <input type="text" name="description"> <br/>
	Quantity: <input type="text" name="quantity"> <br/>
	RRP: <input type="email" name="rrp"> <br/>
	Total: <input type="text" name="total"> <br/><br/>
	<input type="submit" value="Submit" /> <br/>
</form>
</div>
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
<!--</HTML>-->
</html>
