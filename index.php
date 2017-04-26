<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/index.css" rel="stylesheet" />
</head>
<body>
<?php
//if SESSION is set as $login_user variable and pass it to request.php
if(isset($_SESSION['$login_user'])){
header("location: addsales.php");
}
// define variables and set to empty values
$staffnoErr = $passwordErr = "";
$LoginNumber = $LoginPassword = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if (empty($_POST['staffno'])) {
		$staffnoErr = "Staff Number is required";
	} else {
		$LoginNumber=isset($_POST['staffno']) ? $_POST['staffno'] : "";
	}
	//statement to see if password field is empty. If it is, populate error variable. If not, put data into password variable
	if (empty($_POST['lpassword'])) {
		$passwordErr = "Password is required";
	} else {
		 $LoginPassword = isset($_POST['lpassword']) ? $_POST['lpassword'] : "";
	}
}
?>

<div class="jumbotron text-center">
	<H1 class="text-center">PHP Inc.</H1>
	<p>Sales Recording and Prediction System</p>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<form action="" method="post">
				<div class="form-row"><H1>Login</H1></div>
				<div class="form-row">
					<label for="staffno">Staff Number</label>
					<input type="text" class="form-control" name="staffno" id="staffno" /><span class="error"><?php echo $staffnoErr;?></span>
				</div>
				<div class="form-row">
					<label for="lpassword">Password</label>
					<input type="password" class="form-control" name="lpassword" id="lpassword" /><span class="error"><?php echo $passwordErr;?></span>
				</div>
			<br/>
				<div class="form-row">
					<button type="submit" class="btn btn-primary" value="Login">Log In</button>
				</div>
				<div class="form-row">
					<p class="text-center">Don't have an account?</p>
					<a href="#" class="btn btn-primary">Create New User</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
//Starting a session
session_start();
//if fields are not empty, execute
if (!empty($LoginNumber) && !empty($LoginPassword))
{
	//include the php file with the connection details
	include 'connection.php';
	//call the function to connect to the database
  	connection();

	//SQL query to select the correct table row where the customer number and password match
	$sql = "SELECT * FROM Staff WHERE StaffID = $LoginNumber AND $LoginPassword = '$LoginPassword'" ;
//if($conn->query($sql) === TRUE){
	$_SESSION['$login_user']=$LoginNumber; // Initializing Session
	header("location: addsales.php"); // Redirecting to addsales.php

	//}
	//else {
		//If no user is found, show error message
		//echo "Staff Number or Password is invalid";
	//}
	$conn->close(); // Closing Connection
}
?>
</body>
</HTML>
