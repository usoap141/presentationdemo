<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="icon/favicon.ico">

<title>User List</title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<link rel="stylesheet" href="../css/bootstrapValidator.css"/>

<script src="../js/ie-emulation-modes-warning.js"></script>
  
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
<h1>List of Users</h1>
<?php

	// default
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nina_cake_house";

	// [1] Create a connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// [2] Check the connection
	if ($conn->connect_error) {

    	die("Connection failed: " . $conn->connect_error);
	} 
	else {
	
	// [4] SELECT -> store query's result inside $result
	$sql = "SELECT User_ID, User_Type, Name, Contact_No, Address, Email FROM member_list ORDER BY User_ID";
	$result = $conn->query($sql);

	// [5] Display table
	if ($result->num_rows > 0) {
    	
    	echo "<table><tr><th>User ID.</th><th>Type</th><th>Name</th><th>Contact No.</th><th>Address</th><th>Email</th><th></th></tr>";
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
    
			echo "<tr><td><center>".$row["User_ID"]."</center></td><td>".$row["User_Type"]."</td><td>".$row["Name"]."</td><td>".$row["Contact_No"]."</td><td>".$row["Address"]."</td><td>".$row["Email"]."</td><td><a href='view_detail.php?id=".$row["User_ID"]."'>View</a></td></tr>";

echo "<div class='cd-popup' id='user".$row["User_ID"]."alert' role='alert' style='display:none;'>";
?>
	
<?php  echo "<div id='user".$row["User_ID"]."alert'  class='popup'>" ?>
<div class="">		<h2>Are you sure you want to delete this element?</h2>
			<a href="#0">Yes</a>
<?php			echo "<a onclick=document.getElementById('user".$row["User_ID"]."alert').style.display='none'>No</a>"	?>
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
<script type="text/javascript" src="../jquery/jquery-1.10.2.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrapValidator.js"></script>
<body>
</html>