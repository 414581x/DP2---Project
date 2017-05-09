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
  $servername = "localhost";
  $username = "dp2";
  $password = "phpdp2";
  $dbname = "dp2php";
  $datatable = "Items"; // MySQL table name
  $results_per_page = 20; // number of results per page
 

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
 	if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);}

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT ItemID, CategoryDescription, Brand, ItemName, Qty, Price FROM ".$datatable.", Category WHERE Items.CategoryID = Category.CategoryID ORDER BY Brand ASC LIMIT $start_from, ".$results_per_page;
		
		$rs_result = $conn->query($sql);
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
			<div class="form-row"><H1>View Stock Items</H1></div>
	<div class="form-row">
				
<div class="form-row">
<table border="1" cellpadding="4">
<tr>
    <td bgcolor="#CCCCCC"><strong>ItemID</strong></td>
    <td bgcolor="#CCCCCC"><strong>Category</strong></td><td bgcolor="#CCCCCC"><strong>Brand</strong></td><td bgcolor="#CCCCCC"><strong>Name</strong></td><td bgcolor="#CCCCCC"><strong>Qty</strong></td><td bgcolor="#CCCCCC"><strong>Price</strong></td><td bgcolor="#CCCCCC"><strong>Options</strong></td></tr>
<?php 
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><? echo $row["ItemID"]; ?></td>
            <td><? echo $row["CategoryDescription"]; ?></td>
            <td><? echo $row["Brand"]; ?></td>
            <td><? echo $row["ItemName"]; ?></td>
            <td><? echo $row["Qty"]; ?></td>
            <td><? echo $row["Price"]; ?></td>
            <td><? echo "<a href= 'edit.php?ItemID=$row[ItemID]'>Edit </a><a href= 'delete.php?ItemID=$row[ItemID]'>Delete</a>"; ?></td>
            </tr>
<?php 
}; 
?> 
</table>
</div>


			</div>
			<br/>
			<div class="form-row">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		<form method="get" action="csv.php">
		<p>Export as CSV:<input id="submit" type="submit" value="Export"/></p>
	</form>
</div><!-- /.form-container -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>

	<?php 
$sql = "SELECT COUNT(ItemID) AS total FROM ".$datatable;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='viewstock2.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 
?>
</body>
<?php 

 

?>
</html>