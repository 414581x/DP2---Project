<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML">
<head>
	<title>Add Stock item</title>
	<SCRIPT language="javascript">

		
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}

	</SCRIPT>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
</head>
<body>

<?php 

  // define variables and set to empty values
  $nameErr = $brandErr = $qtyErr = $priceErr = $itemideErr = "";
  $name = $category = $brand = $qty = $price = $itemid = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //statement to see if name field is empty. If it is, populate error variable. If not, put data into name variable
    

    if (empty($_POST['itemid'])) {
    $itemideErr = "Item ID is required";
  } else {
     $itemid = isset($_POST['itemid']) ? $_POST['itemid'] : "";
  }

  $category = isset($_POST['category']) ? $_POST['category'] : "";

  if (empty($_POST['name'])) {
    $pnameErr = "Product Name is required";
  } else {
     $name = isset($_POST['name']) ? $_POST['name'] : "";
  }

  //statement to see if password field is empty. If it is, populate error variable. If not, put data into password variable
  if (empty($_POST['brand'])) {
    $brandErr = "Brand is required";
  } else {
     $brand = isset($_POST['brand']) ? $_POST['brand'] : "";
  }

  //statement to see if password confirmation field is empty. If it is, populate error variable. If not, put data into confirmation password variable
  if (empty($_POST['qty'])) {
    $qtyErr = "Retail Price is required";
  } else {
     $qty = isset($_POST['qty']) ? $_POST['qty'] : "";
  }

  //statement to see if email field is empty. If it is, populate error variable. If not, put data into email variable
  if (empty($_POST['price'])) {
    $priceErr = "Stock amount is required";
  } else {
     $price = isset($_POST['price']) ? $_POST['price'] : "";
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
			<div class="col-xs-12">
				<H1 class="text-center">Add Stock Items</H1>
			</div>
			<div class="col-xs-12">
			<div class="form-row">
				<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" /> <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

					<TABLE id="dataTable" cellspacing="10">
					<p>
						<TR>
							<TD><INPUT type="checkbox" name="chk[]"/></TD>
							<TD><label>Item ID</label><INPUT type="text" name="itemid[]"/></TD>
							<TD >
							<label>Brand</label>
								<SELECT name="category[]">
								<OPTION value=''>Choose a Category</OPTION>
									<OPTION value="1">Medicine</OPTION>
									<OPTION value="2">Health care products</OPTION>
									<OPTION value="3">Accessories</OPTION>
								</SELECT>
							</TD>
							<TD><label>Brand</label><INPUT type="text" name="brand[]"/></TD>
							<TD><label>Name</label><INPUT type="text" name="name[]"/></TD>
							<TD ><label>Qty</label><INPUT type="number" size="5" name="qty[]"/></TD>
							<TD ><label>Price</label><INPUT type="text" name="price[]"/></TD>
							
							
						</TR>
						</p>
					</TABLE>
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
<?php
//include 'connection.php';

  //connection();
  //SQl query to check if user already exists
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

	$check="SELECT * FROM Items WHERE ItemName = '$name'";
  $rs = mysqli_query($conn,$check);
  $data = mysqli_fetch_array($rs, MYSQLI_NUM);
  if($data[0] > 1) {
      echo "Product already exists! Please use edit to update the item or add a new item<br/>";
  }
  else {
  if(!empty($name) && !empty($price) && !empty($qty)) {
 
  foreach($itemid as $a => $b) {
      //SQL statement to insert new record of user
      $sql = "INSERT INTO Items (ItemID, CategoryID, Brand, ItemName, Qty, Price)
      VALUES ($itemid[$a], $category[$a], '$brand[$a]', '$name[$a]', $qty[$a], $price[$a])";
  

      if($conn->query($sql) === TRUE){
       echo "Product successfully added.";
      }
      else {
        echo "ERROR: Could not execute insert." . $conn->error;
      }
 }
  $conn->close();
    }
  }
?>
</body>

</html>