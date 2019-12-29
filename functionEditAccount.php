<?php 
	$sever = 'localhost';
	$server_user = 'root';
	$database = 'webofgroup';
	$server_pass = '';
	$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
				require("database.php");  
				if(isset($_POST["submit"]))
					{
						
						$user = $_POST["username"];
						$password = $_POST["password"];
						$roleID = $_POST["roleID"];
						$full_name = $_POST["full_name"];
						$Description = $_POST["Description"];

						if ( $user ==""|| $password == "" || $roleID == "" || $full_name == ""|| $Description == "") 
							{
				  				echo "Please fill the blank!";
  							}
  						else
  							{
	  							$sql = "select * from account where username= '$user'";
	  							$sql = "UPDATE account SET username='$user',password='$password',roleID='$roleID',full_name='$full_name',Description='$Description' WHERE accountID=" . $id;
								mysqli_query($connect,$sql);
							}
					}
			?>