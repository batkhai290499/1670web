<!DOCTYPE html>
<html lang="en">
<title> Information Technology University</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
  <script type="text/javascript" >
    function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
  </script>
</head>
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
    <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Course</a>
    <a href="Logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Logout</a>
  </div>

  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
        <h2>ADD TEACHER</h2>
                    <form action="" method="post">
                        <table width="50%" border="10">
            <thead>

                            <tr>
                                <th>Account</th>
                                <td><input type="text" name ="username" size="100%" data-validate = "Enter Username"></td>
                            </tr>

                            <tr>
                                <th>Password</th>
                                <td><input type="text" name ="password" size="100%" data-validate = "Enter Password"></td>
                            </tr>

                            <tr>
                                <th>Role</th>
                                <td><input type="text" name ="roleID" size="100%" data-validate = "Enter Role"></td>
                            </tr>
              
              <tr>
                                <th>Full Name</th>
                                <td><input type="text" name ="aName" size="100%" data-validate = "Enter Full name"></td>
              </tr>
              <tr>
                                <th>Age</th>


                                <td><input type="text" name ="aAge" size="100%" data-validate = "Enter Age"></td>


              </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" size="100%"></td>
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
                  
                  $user = $_POST["username"];
                  $password = $_POST["password"];
                  $roleID = $_POST["roleID"];
                  $aName = $_POST["aName"];
                  $age = $_POST["aAge"];

                  if ($user =="")                               //||$password == ""|| $roleID == ""||  $aName == "" || $age == "") 
                    {
                      echo "Please enter username!";
                    }
                  else if ($password == "")  
                  {
                    echo "Please enter password";
                  }
                  else if ($roleID == "")
                  {
                    echo "Please enter role";
                  }
                  else if($aName == "")
                  {
                    echo "Please enter Full name";
                  }
                  else if($age == "")
                  {
                    echo "Please enter age";
                  }
                  else 
                    {
                      $sql = "select * from account where username= '$user'";
                      $query = mysqli_query($connect, $sql);
                      if(mysqli_num_rows($query)>0)
                      {
                        echo "Account already available!";
                      }
                      else
                      {
                        $sql = "INSERT INTO account( `username`, `password`, `roleID`, `aName`, `aAge`) VALUES('$user', '$password', '$roleID', '$aName', '$age')";
                        mysqli_query($connect,$sql);
                        header("Location: admin.php ");
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


<!-- END MAIN -->
</div>
</body>
</html>