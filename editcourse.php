<!DOCTYPE html>
<html lang="en">
<title> Information Technology University</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 45px;
  bottom: 0;
  height: inherit;
}

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 2000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<body>

<!-- Navigation bar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="Main.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
    <a href="Course.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Course</a>
    <a href="Login.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Login</a>
  </div>

  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
        <h2>EDIT TEACHER</h2>
                    <form action="" method="post">
                        <table width="50%" border="10">
              <thead>
                <tr>
                  <td>Course ID</td>
                  <td><input type="num" name ="courseID"></td>
                </tr>

                <tr>
                  <td>Course Name</td>
                  <td><input type="text" name ="courseName"></td>
                </tr>

                <tr>
                  <td>Category ID</td>
                  <td><input type="text" name ="categoryID"></td>
                </tr>

                <tr>
                  <td></td>
                  <td><input type="submit" name="submit"></td>
                </tr>
              </thead>
              <?php 
                $sever = 'localhost';
                $server_user = 'root';
                $database = 'webofgroup';
                $server_pass = '';
                $connect = mysqli_connect($sever, $server_user, $server_pass, $database);
                      require("database.php");  
                      if(isset($_POST["submit"]))
                        {
                          $id = $_POST["courseID"];
                          $user = $_POST["courseName"];
                          $password = $_POST["categoryID"];

                          if ($id =="" || $user ==""|| $password == "") 
                            {
                              echo "Please fill the blank!";
                            }
                          else
                            {
                              $sql = "select * from account where username= '$user'";
                              $sql = "UPDATE course SET courseID='$id',courseName='$user',categoryID='$password' WHERE courseID=" . $id;
                              mysqli_query($connect,$sql);
                              header("location: teacher.php ");
                            }
                        }
                    ?>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>


<!-- END MAIN -->
</div>
</body>
</html>