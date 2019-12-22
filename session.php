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
		echo "<p>ỉn a tat ca" .$row['username'].'cua nguoi dung</p>';
		echo "<p>ỉn a tat ca" .$row['password'].'cua nguoi dung</p>';
		$_SESSION['currUser'] = $row['username'];
		echo "<p>ỉn a tat ca" .$_SESSION['currUser'].'cua nguoi dung</p>';
		echo "<p>ỉn a tat ca" .$row['roleID'].'cua nguoi dung</p>';
 		if ($row['roleID'] == 1) {
 			$_SESSION['currAdmin'] = $row['roleID'];
 			$_SESSION['accID'] = $row['accountID'];
 			echo "<p>ỉn a tat ca" .$_SESSION['currAdmin'].'cua nguoi dung</p>';
 			header("location:./admin.php");
 		} 
 		else if($row['roleID'] == 2){
 			$_SESSION['accID'] = $row['accountID'];
 			$_SESSION['currAdmin'] = $row['roleID'];
 			echo "<p>ỉn a tat ca" .$_SESSION['currAdmin'].'cua nguoi dung</p>';
 			header("location:teacher.php");
// 			header("location:index.php");
 		}
 		else if($row['roleID'] == 3){
 			$_SESSION['accID'] = $row['accountID'];
 			$_SESSION['currAdmin'] = $row['roleID'];
 			echo "<p>ỉn a tat ca" .$_SESSION['currAdmin'].'cua nguoi dung</p>';
 			header("location:./StudentCourseManagement.php");
// 			header("location:index.php");
 		}
	} else{
		echo "<script> alert('ten dang nhap khong dung')</script>";
	}
}

?>
