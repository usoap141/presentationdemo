<?php
				session_start();
				require_once("dbcontroller.php");
				$db_handle = new DBController();
				if(!empty($_GET["action"])) {
				switch($_GET["action"]) {
				case "add":
				if(!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
				if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
								}
								} else {
									$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
									}
								} else {
									$_SESSION["cart_item"] = $itemArray;
								}
							}
						break;
						}
						}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

<!--navbar-->
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Nina's Cake House</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="index.php">Product</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" onClick="document.getElementById('login_form').style.display='block'" id="Login_Link"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	  </ul>
    </div>
  </div>
</nav>
<!--end of navbar-->

<!-- Modal -->
  <div class="modal fade" id="login_Modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-user"></span> Member Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
		
		<!--login form-->
			<FORM ACTION=login.php METHOD=POST>
            <div class="form-group">
              <label for="usrname"> Username</label>
              <input type="text" class="form-control" name="usrname" placeholder="Enter email">
			</div>
            <div class="form-group">
              <label for="psw"> Password</label>
              <input type="password" class="form-control" name="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <span class="glyphicon glyphicon-off"></span>
			  <input type="submit" class="btn btn-success btn-block" value="Login">
			</FORM>
		<!--End of login form-->
		
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
  <!--end of modal-->

   <style>

table {
	border-collapse:collapse;
	margin-bottom:15px;
	width:90%;

        -webkit-transition: background 0.5s linear;
        -moz-transition: background 0.5s linear;
        -ms-transition: background 0.5s linear;
        -o-transition: background 0.5s linear;
        transition: background 0.5s linear;
	}

th{vertical-align: top;}

tr { 
  border: solid;
  border-width: 1px 0;

        -webkit-transition: background 0.5s linear;
        -moz-transition: background 0.5s linear;
        -ms-transition: background 0.5s linear;
        -o-transition: background 0.5s linear;
        transition: background 0.5s linear;
}

tr:first-child {
  border-top: none;
}
tr:last-child {
  border-bottom: none;
}

</style>

</head>

<body>
<div class="container">
<h1>List of Products</h1>
<?php

	// default
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phppot_examples";

	// [1] Create a connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// [2] Check the connection
	if ($conn->connect_error) {

    	die("Connection failed: " . $conn->connect_error);
	} 
	else {
	
	// [4] SELECT -> store query's result inside $result
	$sql = "SELECT id, name, code, quantity FROM tblproduct ORDER BY id";
	$result = $conn->query($sql);

	// [5] Display table
	if ($result->num_rows > 0) {
    	
    	echo "<table><tr><th>id</th><thName</th><th>Code</th><th>Quantity</th><th></th></tr>";
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
		echo "<form action='quantity.php?id=".$row["id"]."' method=post>";
			echo "<tr><td><center>".$row["id"]."</center></td><td>".$row["name"]."</td><td><input name='new_quantity' type='number' value=".$row["quantity"]."></td><td></td><td><input type='submit' value='update'></td></tr>";
		echo "</form>";
		
echo "<div class='cd-popup' id='user".$row["id"]."alert' role='alert' style='display:none;'>";
?>
	
</div>
<?php    	}
    	echo "</table>";
	
	}
	else {
	
    	echo "0 results";
	}
}
	
		
	// [5] close connection
	$conn->close();
?>
</div> <!--end of container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
	<script>
$(document).ready(function(){
    $("#Login_Link").click(function(){
        $("#login_Modal").modal();
    });
});
</script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>