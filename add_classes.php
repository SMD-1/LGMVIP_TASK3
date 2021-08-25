<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Add Class</title>
</head>
<body>
        
    <div class="title">
      <div class="heading">Dashboard </div>
      <div class="logo"> Logout
      <a href="logout.php"><i class="fas fa-sign-out-alt" style="color: #fff; margin-left: 10px" ></i></a>
      </div>
    </div>

    <div class="nav">
      <ul>
        <li class="dropdown" onclick="toggleDisplay('1')">
          <a href="" class="dropbtn">Classes &nbsp
            <span class="fa fa-angle-down"></span>
          </a>
          <div class="dropdown-content" id="1">
            <a href="add_classes.php">Add Class</a>
            <a href="manage_classes.php">Manage Class</a>
          </div>
        </li>
        <li class="dropdown" onclick="toggleDisplay('2')">
          <a href="#" class="dropbtn">Students &nbsp
            <span class="fa fa-angle-down"></span>
          </a>
          <div class="dropdown-content" id="2">
            <a href="add_students.php">Add Students</a>
            <a href="manage_students.php">Manage Students</a>
          </div>
        </li>
        <li class="dropdown" onclick="toggleDisplay('3')">
          <a href="#" class="dropbtn">Results &nbsp
            <span class="fa fa-angle-down"></span>
          </a>
          <div class="dropdown-content" id="3">
            <a href="add_results.php">Add Results</a>
            <a href="manage_results.php">Manage Results</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="main" style="width: 80%; margin: 0 auto">
      <form action="" method="post" style="margin-bottom: 50px; padding: 5%">
        <legend>Add Class</legend>
        <input type="text" name="class_name" placeholder="Class Name">
        <input type="text" name="class_id" placeholder="Class ID">
        <input type="submit" value="Submit" class="submit">  
      </form>
    </div>
</body>
</html>

<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        // validation
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>