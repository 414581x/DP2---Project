<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Register</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/index.css" rel="stylesheet" />
</head>
<body>
<?php

session_start();
$default = "";
$default = $_SESSION['$register'];

// define variables and set to empty values
$passwordErr = $firstNameErr = $lastNameErr = $positionErr = $emailErr = "";
$RegPassword = $RegFirstName = $RegLastName = $RegPosition = $RegEmail = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // Check if Password is empty, if empty set to empty values
	if (empty($_POST['lpassword'])) {
		$passwordErr = "Password is required";
	} else {
		 $RegPassword = isset($_POST['lpassword']) ? $_POST['lpassword'] : "";
	}
  // Check if First Name is empty, if empty set to empty values
  if (empty($_POST['firstName'])) {
		$firstNameErr = "First Name is required";
	} else {
		 $RegFirstName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
	}
  // Check if Last Name is empty, if empty set to empty values
  if (empty($_POST['lastName'])) {
		$lastNameErr = "Last Name is required";
	} else {
		$RegLastName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
	}
  // Check if Poisitoin is empty, if empty set to empty values
  if (empty($_POST['position'])) {
		$positionErr = "Position is required";
	} else {
		$RegPosition = isset($_POST['position']) ? $_POST['position'] : "";
	}
  // Check if Email is empty, if empty set to empty values
  if (empty($_POST['email'])) {
		$emailErr = "Email Address is required";
	} else {
		$RegEmail = isset($_POST['email']) ? $_POST['email'] : "";
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
			<form action="" method="POST">
				<div class="form-row"><H1 class="text-center">Register</H1></div>
        <div class="form-fow">
          <label for="firstName">First Name</label>
          <input type="text" class="form-control" name="firstName" id="firstName" /><span class="error"><?php echo $firstNameErr;?></span>
        </div>
        <div class="form-fow">
          <label for="lastName">Last Name</label>
          <input type="text" class="form-control" name="lastName" id="lastName" /><span class="error"><?php echo $lastNameErr;?></span>
        </div>
        <div class="form-fow">
          <label for="position">Position</label>
          <input type="text" class="form-control" name="position" id="position" /><span class="error"><?php echo $positionErr;?></span>
        </div>
        <div class="form-fow">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" /><span class="error"><?php echo $emailErr;?></span>
        </div>
				<div class="form-row">
					<label for="lpassword">Password</label>
					<input type="password" class="form-control" name="lpassword" id="lpassword" /><span class="error"><?php echo $passwordErr;?></span>
				</div>
			  <br/>
				<div class="form-row">
					<button type="submit" class="btn registerbtn" name="createUser">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
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

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ( !empty($_POST['lpassword']) &&
         !empty($_POST['firstName']) &&
         !empty($_POST['lastName']) &&
         !empty($_POST['position']) &&
				 !empty($_POST['email']) )
    {
      $password = $_POST['lpassword'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $position = $_POST['position'];
			$email = $_POST['email'];

      $insertNewUser = "INSERT INTO Staff (FirstName, LastName, Position, Email, Password)
                        VALUES ('$firstName', '$lastName', '$position', '$email', '$password')";

      $result = mysqli_query($connection, $insertNewUser);

      if($conn->query($insertNewUser) === TRUE) {
        echo "User succesfully created.";
				echo "Your Staff ID: " . mysqli_insert_id($conn);
      }
      else {
        echo "User registration failed." . $conn->error;
      }
    $conn->close();
    }
  }
?>
</body>
</HTML>
