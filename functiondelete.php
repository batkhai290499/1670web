<?php 
	$sever = 'localhost';
	$server_user = 'root';
	$database = 'webofgroup';
	$server_pass = '';
	$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
	require("database.php");
	if(isset($_GET["id"]))
	{	
		$id = $_GET["id"];
		$sql = "DELETE FROM account WHERE accountID=" . $id;
		 //fucking awesome !!! I can't do it :v
		mysqli_query($connect,$sql);
		echo "<script> alert('Delete successful')</script>";
		header("Location: admin.php ");
	}
?>