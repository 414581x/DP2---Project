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
$ItemID = $_GET['ItemID'];

 $servername = "localhost";
  $username = "dp2";
  $password = "phpdp2";
  $dbname = "dp2php";
 

  // Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
 	if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);}

	$query = "SELECT * from Items where ItemID='".$ItemID."'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
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
		<form name = "form" action="" method="post">
			<div class="form-row"><H1>Edit Product Item</H1></div>
			<?php
			$status = "";
			
			if(isset($_POST['new']) && $_POST['new']==1) {

			
				$itemid =$_REQUEST['itemid'];
				$category =$_REQUEST['category'];
			
				$itemname =$_REQUEST['itemname'];
				$qty =$_REQUEST['qty'];
				$price =$_REQUEST['price'];
				$update="UPDATE Items SET ItemID='".$itemid."', CategoryID='".$category."', ItemName='".$itemname."', Qty='".$qty."', Price='".$price."' where ItemID='".$ItemID."'";

			mysqli_query($conn, $update) or die(mysqli_error());

			$status = "Record Updated Successfully. </br></br><a href='viewstock.php'>Back to view stock page</a>";
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			}
			else {
            ?>
	<div class="form-row">
			    <input type="hidden" name="new" value="1" />
				<label for="itemid">Item ID</label>
				<input name="itemid" type="text" value="<?php echo $row['ItemID'];?>" />
			</div>
			<div class="form-row">
				<label for="category">Category</label>
				<input type="text" name="category" placeholder="Enter Category" required value="<?php echo $row['CategoryID'];?>" />
			</div>
			<div class="form-row">
				<label for="itemname">Item Name</label>
				<input type="text" name="itemname" placeholder="Enter Item Name" required value="<?php echo $row['ItemName'];?>" />
			</div>
			<div class="form-row">
				<label for="qty">Qty</label>
				<input type="text" name="qty" placeholder="Enter Qty" required value="<?php echo $row['Qty'];?>" />
			</div>
			<div class="form-row">
				<label for="price">Price</label>
				<input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['Price'];?>" />
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
	<?php
}

?>
</body>

</html>