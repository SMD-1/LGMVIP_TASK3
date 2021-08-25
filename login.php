<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="title">
    <span>Student Result Management System</span>
  </div>
  <div class="main">
    <div class="login">
      <form action="" method="post" name="login">
          <div class="heading">Admin Login</div>
          <input type="text" name="userid" placeholder="Email" autocomplete="off">
          <input type="password" name="password" placeholder="Password" autocomplete="off">
          <input type="submit" value="Login">
      </form>    
    </div>
    <div class="search">
      <form action="./student.php" method="get">
          <div class="heading">For Students</div>
          <?php
            include('init.php');

            $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                echo '<select name="class">';
                echo '<option selected disabled>Select Class</option>';
            while($row = mysqli_fetch_array($class_result)){
                $display=$row['name'];
                echo '<option value="'.$display.'">'.$display.'</option>';
            }
            echo'</select>'
          ?>
          <input type="text" name="rn" placeholder="Roll No">
          <input type="submit" value="Get Result">
      </form>
    </div>
  </div>

</body>
</html>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>

