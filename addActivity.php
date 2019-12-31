<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
				<h2>ADD Course</h2>
                    <form method="post">
					
                        <table width="50%" border="10" >
						<thead>	
                            <tr>
                                <td>Activity ID</td>
                                <td><input type="num" name ="activityID" value=""></td>
                            </tr>

                            <tr>
                                <td>Activity Name</td>
                                <td><input type="text" name ="activityName"></td>
                            </tr>

                            <tr>
                                <td>Deadline</td>
                                <td><input type="datetime-local" name ="deadline"></td>
                            </tr>
                            <tr>
                                <td>Course ID</td>
                                <td><input type="deadtime" name ="courseID"></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><input type="deadtime" name ="Description"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit"></td>
                            </tr>
						</thead>
						<?php 
                                $sever = 'localhost';
                                $server_user = 'root';
                                $database = 'webcdmm2';
                                $server_pass = '';
                                $connect = mysqli_connect($sever, $server_user, $server_pass, $database);
									require("database.php");  
									if(isset($_POST["submit"]))
										{
											
											$id = $_POST["activityID"];
											$name = $_POST["activityName"];
                                            $deadline = $_POST["deadline"];
                                            $courseID = $_POST["courseID"];
                                            $description = $_POST["Description"];

											if ($id ==""||$name ==""||$deadline == ""||$courseID ==""|| $description == "") 
												{
													echo "Please fill the blank!";
												}
											else
												{
													$sql = "select * from course where courseID = '$id'";
													$query = mysqli_query($connect, $sql);
													if(mysqli_num_rows($query)>0)
													{
														echo "Account already available!";
													}
													else
													{
														$sql = "INSERT INTO activity`(activityID`, activityName, deadline, courseID, Description) VALUES ('$id','$name','$deadline','$courseID','$description')";
														echo $sql;
														mysqli_query($connect,$sql);
														header("Location: http://localhost:8090/webofgroupkhai/WebOfGroup-khai/teacher/viewcourse.php?id=1");
													}
												}
										}
								?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>