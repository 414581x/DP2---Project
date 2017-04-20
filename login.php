<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/add-sales.css" rel="stylesheet" />
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
          <li><a href="#">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
    <form action="" method="post">
      <div class="form-row"><H1>Login</H1></div>
      <div class="form-row">
        <label for="staffno">Staff Number</label>
        <input type="text" class="form-control" name="staffno" id="staffno" /><span class="error"><?php echo $staffnoErr;?></span> 
      </div>
      <div class="form-row">
        <label for="lpassword">Password</label>
        <input type="text" class="form-control" name="lpassword" id="lpassword" /><span class="error"><?php echo $passwordErr;?></span>
      </div>

  <br/>
      <div class="form-row">
        <button type="submit" class="btn btn-primary" value="Login">Login</button>
      </div>
</form>
 

<?php 
//Starting a session
session_start(); 

//if fields are not empty, execute
if (!empty($LoginNumber) && !empty($LoginPassword))
{

  $servername = "feenix-mariadb.swin.edu.au";
  $username = "s414581x";
  $password = "141083";
  $dbname = "s414581x_db";

  // Create connection
  $conn = mysql_connect($servername, $username, $password);
  $db = mysql_select_db($dbname, $conn);

  //SQL query to select the correct table row where the customer number and password match 
  $query = mysql_query("SELECT * FROM staff where StaffNo='$LoginNumber' and Password='$LoginPassword'", $conn) ;
  $rows = mysql_num_rows($query);
  if ($rows == 1) {
  $_SESSION['$login_user']=$LoginNumber; // Initializing Session
  header("location: addsales.php"); // Redirecting to records.php
  
  }
  else {
    //If no user is found, show error message
    echo "Staff Number or Password is invalid";
  }
  mysql_close($conn); // Closing Connection

}

?>
</body>
</HTML>
