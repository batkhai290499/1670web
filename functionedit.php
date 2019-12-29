<?php 
  $sever = 'localhost';
  $server_user = 'root';
  $database = 'webofgroup';
  $server_pass = '';
  $connect = mysqli_connect($sever, $server_user, $server_pass, $database);
        require("database.php");  
        if(isset($_POST["submit"]))
          {
            $id = $_POST["accountID"];
            $user = $_POST["username"];
            $password = $_POST["password"];
            $roleID = $_POST["roleID"];
            $Description = $_POST["Description"];

            if ($id =="" || $user ==""|| $password == "" || $roleID == "" || $Description == "") 
              {
                  echo "Please fill the blank!";
                }
              else
                {
                  $sql = "select * from account where username= '$user'";
                  $sql = "UPDATE account SET accountID='$id',username='$user',password='$password',roleID='$roleID',Description='$Description' WHERE accountID=" . $id;
                mysqli_query($connect,$sql);
              }
          }
      ?>