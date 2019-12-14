<?php
session_start();
header('Refresh: 1; URL=productlist.php');
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php

	// default
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phppot_examples";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// sql to insert entry
	$sql = "UPDATE tblproduct SET quantity=".$_POST['new_quantity']." WHERE id = '".$_GET['id']."'";
	if ($conn->query($sql) == TRUE) {
	
		echo "Update Successful!";
	}
	else echo "not successful!";
	
	$conn->close();	
?>

<body>
</html>