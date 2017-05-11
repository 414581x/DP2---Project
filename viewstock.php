<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html XMLns="http://www.w3.org/1999/xHTML">
<head>
  <title>View Stock Details</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/add-sales.css" rel="stylesheet" />
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/validation.js"></script>
  <SCRIPT language="javascript" >
     $(function () {
      	$("#viewtable tbody tr td.qty").filter(function () {
      	   return $(this).text() < 20;
        }).parent().addClass('highlite');
      });
  </SCRIPT>
</head>
<body>
  <?php
     $servername = "localhost";
     $username = "dp2";
     $password = "phpdp2";
     $dbname = "dp2php";
     $datatable = "Items"; // MySQL table name
     $results_per_page = 15; // number of results per page

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn === false) { die("Connection failed: " . $conn->connect_error); }
     if (isset($_GET["page"])) { $page = $_GET["page"]; }
     else { $page = 1; };

     $start_from = ($page-1) * $results_per_page;

     $sql = "SELECT ItemID, CategoryDescription, ItemName, Qty, Price
     			FROM ".$datatable.", Category
     			WHERE Items.CategoryID = Category.CategoryID
     			ORDER BY Qty ASC LIMIT $start_from, ".$results_per_page;

     $rs_result = $conn->query($sql);

     session_start();
     $default = "";
     $default = $_SESSION['$login_user'];
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
              <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">SALES <span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu">
                    <li><a href="addsales.php">ADD SALES</a></li>
                    <li><a href="edit.php">EDIT SALES</a></li>
                    <li><a href="viewsales.php">VIEW SALES</a></li>
                 </ul>
              </li>
              <li class="dropdown active">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK <span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu">
                    <li><a href="addstock.php">ADD STOCK ITEM</a></li>
                    <li><a href="viewstock.php">VIEW STOCK ITEMS</a></li>
                    <li><a href="editstock.php">EDIT STOCK ITEMS</a></li>
                 </ul>
              </li>
              <li><a href="#">REPORTING</a></li>
              <li><a href="#">PREDICTION</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $default;?></span> <span class="caret"></span></a>
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
      <div class="row">
        <div class="col-xs-12">
           <h1 class="text-center">View Stock Details</h1>
           <hr>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="viewtable" >
          <thead class="thead-default">
             <tr>
                <th>ItemID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Options</th>
             </tr>
          </thead>
          <tbody>
            <?php while($row = $rs_result->fetch_assoc()) { ?>
             <tr>
              <td><? echo $row["ItemID"]; ?></td>
                <td><? echo $row["CategoryDescription"]; ?></td>
                <td><? echo $row["ItemName"]; ?></td>
                <td class="qty"><? echo $row["Qty"]; ?></td>
                <td><? echo $row["Price"]; ?></td>
                <td><? echo "<a href= 'edit.php?ItemID=$row[ItemID]'>Edit </a><a href= 'delete.php?ItemID=$row[ItemID]'>Delete</a>"; ?></td>
             </tr>
            <?php }; ?>
          </tbody>
        </table>
        <?php
          $navsql = "SELECT COUNT(ItemID) AS total FROM ".$datatable;
          $result = $conn->query($navsql);
          $row = $result->fetch_assoc();
          $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

          for ( $i = 1; $i <= $total_pages; $i++ ) {  // print links for all pages
            echo "<a href='viewstock.php?page=".$i."'";
            if ( $i == $page )  echo " class='curPage'";
            echo ">".$i."</a> ";
          };
        ?>
      </div><!-- /.table -->
  </div><!-- /.container -->
</body>
</html>
