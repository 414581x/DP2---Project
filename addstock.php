<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Add Stock Item</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body>

<?php

  // define variables and set to empty values
  $pnameErr = $descErr = $rpriceErr = $pstockErr = $categoryErr = "";
  $pname = $desc = $rprice = $pstock = $category = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //statement to see if name field is empty. If it is, populate error variable. If not, put data into name variable


  if (empty($_POST['pname'])) {
    $pnameErr = "Product Name is required";
  } else {
     $pname = isset($_POST['pname']) ? $_POST['pname'] : "";
  }

  //statement to see if password field is empty. If it is, populate error variable. If not, put data into password variable
  if (empty($_POST['description'])) {
    $descErr = "Description is required";
  } else {
     $desc = isset($_POST['description']) ? $_POST['description'] : "";
  }

  //statement to see if password confirmation field is empty. If it is, populate error variable. If not, put data into confirmation password variable
  if (empty($_POST['rprice'])) {
    $rpriceErr = "Retail Price is required";
  } else {
     $rprice = isset($_POST['rprice']) ? $_POST['rprice'] : "";
  }

  //statement to see if email field is empty. If it is, populate error variable. If not, put data into email variable
  if (empty($_POST['pstock'])) {
    $pstockErr = "Stock amount is required";
  } else {
     $pstock = isset($_POST['pstock']) ? $_POST['pstock'] : "";
  }

  //statement to see if phone field is empty. If it is, populate error variable. If not, put data into phone variable
  if (empty($_POST['category'])) {
    $categoryErr = "Category is required";
  } else {
    $category = isset($_POST['category']) ? $_POST['category'] : "";
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
			<a class="navbar-brand" href="index.php">PHP Inc.</a>
		</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">SALES <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="addsales.php">ADD SALES</a></li>
					<li><a href="edit.php">EDIT SALES</a></li>
					<li><a href="viewsales.php">DISPLAY SALES</a></li>
				</ul>
			</li>
			<li class="dropdown active">
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
			<div class="form-row"><H1>Add Stock Item</H1></div>
			<div class="form-row">
				<label for="pname">Product Name</label>
				<input type="text" class="form-control" name="pname" id="pname" /><span class="error"><?php echo $pnameErr;?></span>
			</div>
			<div class="form-row">
				<label for="description">Description</label>
				<input type="text" class="form-control" name="description" id="description" /><span class="error"><?php echo $descErr;?></span>
			</div>
			<div class="form-row">
				<label for="rprice">Retail Price</label>
				<input type="text" name="rprice" id="rprice" /><span class="error"><?php echo $rpriceErr;?></span>
			</div>
			<div class="form-row">
				<label for="pstock">Stock</label>

						<input type="number" name="pstock" id="pstock" />
						<span class="error"><?php echo $pstockErr;?></span>

			</div>
			<div class="form-row">
				<label for="category">Category</label>
				<div class="input-group">


      <select name="category">
      <option value="Medecine">Medicine</option>
      <option value="Health Care Products">Health Care Products</option>
      <option value="Accessories">Accessories</option>
      </select> <br/>
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
include 'connection.php';

  connection();
  //SQl query to check if user already exists



  if(!empty($pname) && !empty($desc) && !empty($rprice) && !empty($pstock)) {

  $check="SELECT * FROM products WHERE ProductName = '$pname'";
  $rs = mysqli_query($conn,$check);
  $data = mysqli_fetch_array($rs, MYSQLI_NUM);
  if($data[0] > 1) {
      echo "Product already exists! Please use edit to update the item or add a new item<br/>";
  }
      //SQL statement to insert new record of user
      $sql = "INSERT INTO products (ProductName, ProductDescription, RetailPrice, Stock, Category)
      VALUES ('$pname', '$desc', '$rprice', $pstock, '$category')";


      if($conn->query($sql) === TRUE){
       echo "Product successfully added.";
      }
      else {
        echo "ERROR: Could not execute insert." . $conn->error;
      }

  $conn->close();
    }
  // }
?>
</html>
