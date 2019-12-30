<?php 
 require("session.php");
 if (!isset($_SESSION['currStudent'])) {
  header("location:login.php");
 }
 else{
 if(!isset($_SESSION['currTeacher'])){
  header("location:login.php");
 } 
}
 ?>
<!DOCTYPE html>
<html lang="en">
<title>Student's Course Management</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  * {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: ##000000;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ffffff;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 5px;
  margin-top: 8px;
  font-size: 15px;
  border: none;
  color: white;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 45px;
  bottom: 0;
  height: inherit;

}

/* unvisited link */
a:link {
  color: white;
}
.bodyRight {
    border: 1px solid #D3C3C3;
    padding: 5px;
    width: 100%;
    height: auto;
    text-align: left !important;
}
.image-block {
  float: left;
  text-align: center;
  position: relative;
  display: inline-block;
}
.image-block img {
  display: inline-block;
  vertical-align: bottom; 
}

.content-des {
  padding: 10px;
  position: absolute;
  left: 16px;
  right: 15px;
  bottom: 14px;
  top: 70%;
  background: rgba(122, 122, 122, 0.5);
  color: black;
}

</style>
<body>

<!-- Navigation bar -->
<div class="topnav">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="Main.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
    <a href="StudentCourseManagement.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Course</a>
    <a href="category.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Category</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Logout</a>

    <div class="search-container">
    <form action="/search.php">
      <input type="text" placeholder="Search course.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <div class="w3-sidebar w3-bar-block w3-black">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-white w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b> Your Course</b></h4>
  <?php
      $hostname='localhost';
      $username = 'root';
      $password = '';
      $dbname = 'webofgroup';

      // Create connection
      $conn = mysqli_connect($hostname, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      //$accountID = $_POST['accID'];
      $sql = "SELECT * FROM course join account_course_detail on course.courseID = account_course_detail.courseID where accountID = '".$_SESSION['accID']."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              ?>
              <a href="./activity.php?courseID=<?php echo $row["courseID"]?>" target="_blank"><?php echo $row["courseName"]?></a>  
      <?php
          }
      }
  ?>
 
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
    <h1 class="w3-text-teal">Your Activity</h1>
    <?php
      require_once './database.php';
      $courseID = $_GET['courseID'];
      $sql = "SELECT * FROM activity where courseID=".$courseID."";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              ?>
              <a href="./activitydetail.php?activityID=<?php echo $row["activityID"]?>" style="color: black;" class="bodyRight">
                <h2><span class="glyphicon glyphicon-list-alt"></span><?php echo $row['activityName']?></h2>
                <button type="button" class="btn btn-success"><?php echo $row['deadline']?></button> 
            </a>  
      <?php
          }
      }
  ?>
     
  </div>
<!-- END MAIN -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
