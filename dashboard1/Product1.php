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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Product</a></li>
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">PRICE</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="Product1.php">RM 10.00</a></li>
            <li><a href="Product2.php">RM 20.00</a></li>
            <li><a href="Product3.php">RM 30.00</a></li>
            <li><a href="Product4.php">RM 40.00</a></li>
			<li><a href="index.php">All</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-md-10 main">
          <h1 class="page-header">Product</h1>

          <div class="row placeholders">
		  <?php
	$product_array = $db_handle->runQuery("SELECT * FROM `tblproduct` WHERE Price=10.0");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
            <div class="col-xs-3 col-sm-3 placeholder">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "RM".$product_array[$key]["price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
          </div>
        </div>
      </div>
    </div>

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