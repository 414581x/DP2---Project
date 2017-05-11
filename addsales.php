<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html XMLns="http://www.w3.org/1999/xHTML" lang="en" data-ng-app="App">
<head>
  <title>Add Sales Records</title>
  <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/add-sales.css" rel="stylesheet" />
	<link href="css/interfacecolorset.css" rel="stylesheet" />
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.min.js"></script>
  <!-- client side validation -->
  <script src="js/validation.js"></script>
	<SCRIPT language="javascript" >
		function SetDate()
		{
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();

			if (month < 10) month = "0" + month;
			if (day < 10) day = "0" + day;

			var today = year + "-" + month + "-" + day;

			document.getElementById('currentdate').value = today;
		}

    $(document).ready(function() {
      $(".add-row").click(function() {
        var itemname = $("#itemname").val();
        var price = $("#price").val();
        var qty = $("#qty").val();
        var total = $("#total").val();
        var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' name='itemarray[]' value='" + itemname + "'/></td><td><input type='text' name='pricearray[]' value='" + price + "'/></td><td><input type='text' name='qtyarray[]' value='" + qty + "' /></td><td><input type='number' name='totalarray[]' class='tp1' value='" + total + "'/></td></tr>";
        $("table tbody").append(markup);
        var sum = 0;

        $(".tp1").each(function() {
          sum += +$(this).val();
        });

        $(".totalprice").val(sum)
    });

    // Find and remove selected table rows
    $(".delete-row").click(function() {
      $("table tbody").find('input[name="record"]').each(function() {
        if($(this).is(":checked")) {
          $(this).parents("tr").remove();
          var sum = 0;

          $(".tp1").each(function() {
            sum += +$(this).val();
          });

          $(".totalprice").val(sum)
        }
      });
    });
  });

  $(document).ready(function() {
    $('#itemname').on('change', function () {
      $('#price').val($(this[this.selectedIndex]).attr('data-price'));
    });
  });

  // $(document).on("change", ".tp1", function() {
  //
  //     var sum = 0;
  //     $(".tp1").each(function(){
  //        sum += +$(this).val();
  //     });
  //     $(".totalprice").val(sum);
  // });

  function sum() {
    var txtFirstNumberValue = document.getElementById('price').value;
    var txtSecondNumberValue = document.getElementById('qty').value;
    var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
    if (!isNaN(result)) {
      document.getElementById('total').value = result.toFixed(2);
    }
  }
	</SCRIPT>
</head>
<body data-ng-controller="myCtrl" onload="SetDate();">

<?php
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
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">SALES <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="addsales.php">ADD SALES</a></li>
						<li><a href="edit.php">EDIT SALES</a></li>
						<li><a href="viewsales.php">VIEW SALES</a></li>
					</ul>
				</li>
				<li class="dropdown">
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $default; ?></span> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="register.php">Create New User</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<form action="getresults.php" method="post" name="myForm">
		<div class="row">
			<div class="col-xs-12">
				<H1 class="text-center">Add Sales Records</H1><hr>
			</div>
    </div>
    <div class="row">
      <div class="col-xs-6">
      </div>
      <div class="col-xs-3">
        <label for="staffno">Staff ID</label>
				<input type="text" class="form-control" name="staffno" id="staffno" value="<?php echo $default; ?>"/>
      </div>
      <div class="col-xs-3">
        <label for="saledate">Date of Sale</label>
				<input type="text" class="form-control" name="currentdate" id="currentdate" />
      </div>
		</div><hr>
    <div class="row">
      <div class="col-xs-3">
				<label for="TotalPrice">Total Price</label>
				<input type="number" step="0.01" class="form-control totalprice" name="totalprice" id="totalprice" /><span class="error"><?php echo $totalpriceErr;?></span>
      </div>
      <div class="col-xs-3"><!-- empty div for spacing --></div>
      <div class="col-xs-3">
        <button type="button" class="btn btn-success add-row">Add Row</button>
      </div>
      <div class="col-xs-3">
        <button type="button" class="btn btn-danger delete-row">Delete Row</button>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-3">
    	  <label>Item name</label>
          <select class="form-control" name = "itemname" id="itemname">
          <option value='' selected="selected">Select Item Name</option>
          <?php
            include "connection.php"; // Database connection using PDO
            $sql="SELECT ItemID, Price, ItemName FROM Items order by ItemName";

            foreach ($conn->query($sql) as $row) {//Array or records stored in $row
            echo "<option value=$row[ItemID] data-price=$row[Price]>$row[ItemName]</option>";
            /* Option values are added by looping through the array */
            }
            echo "</select>";// Closing of list box
          ?>
      </div>
        <div class="col-xs-3">
          <label>Price</label>
          <input type="text" class="form-control" name="price" id="price" placeholder="Price" onkeyup="sum();">
        </div>
        <div class="col-xs-3">
          <label>Qty</label>
          <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" onkeyup="sum();">
        </div>
        <div class="col-xs-3">
          <label>Total</label>
          <input type="text" class="form-control" name="total" id="total" placeholder="Total">
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
    <table class="table">
        <thead>
            <tr>
                <th>Select</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
      </div>
    </div>

		<div class="row">
			<div class="col-xs-3">
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</div>
		</div>
	</form>
</div><!-- /.form-container -->
<script>
	$('#itemname').on('change', function () {
    $('#price').val($(this[this.selectedIndex]).attr('data-price'));
	});

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
</script>

</body>
</html>
