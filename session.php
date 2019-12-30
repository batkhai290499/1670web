<?php  
$con = mysqli_connect('localhost', 'root', '','webofgroup');
if(!$con){
	die('Could not connect: '.mysqli_error());
}
session_start();

function get_user($username, $password){
$con = mysqli_connect('localhost', 'root', '','webofgroup');
if(!$con){
	die('Could not connect: '.mysqli_error());
}
	$sql = mysqli_query($con,"SELECT * FROM account WHERE username= '$username' AND password= '$password'");

	if(mysqli_num_rows($sql) > 0){

		$row = mysqli_fetch_array($sql, MYSQLI_ASSOC );
 		if ($row['roleID'] == 1) {
			$_SESSION['currStudent'] = $row['username'];
 			$_SESSION['currAdmin'] = $row['roleID'];
 			$_SESSION['currTeacher'] = $row['roleID'];
 			$_SESSION['accID'] = $row['accountID'];
 			header("location:admin.php");

 		} 
 		else if($row['roleID'] == 2){
			$_SESSION['currStudent'] = $row['username'];
 			$_SESSION['accID'] = $row['accountID'];
 			$_SESSION['currTeacher'] = $row['roleID'];
 			header("location:teacher.php");
 		}
 		else if($row['roleID'] == 3){
 			$_SESSION['accID'] = $row['accountID'];
 			$_SESSION['currStudent'] = $row['roleID'];

 			header("location:StudentCourseManagement.php");

 		}
	} else{
		echo "<script> alert('Please log in again')</script>";
	}
}

?>
