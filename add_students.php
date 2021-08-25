<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" type="text/css" href="form.css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Add Students</title>
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

  <div class="main" style="width: 70%; margin: 0 auto; padding: 5%">
    <form action="" method="post">
      <legend>Add Student</legend>
      <input type="text" name="student_name" placeholder="Student Name">
      <input type="text" name="roll_no" placeholder="Roll No">
      <?php
        include('init.php');
        include('session.php');
        
        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
            echo '<select name="class_name">';
            echo '<option selected disabled>Select Class</option>';
        while($row = mysqli_fetch_array($class_result)){
            $display=$row['name'];
            echo '<option value="'.$display.'">'.$display.'</option>';
        }
        echo'</select>'
      ?>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>

<?php

  if(isset($_POST['student_name'],$_POST['roll_no'])) {
      $name=$_POST['student_name'];
      $rno=$_POST['roll_no'];
      if(!isset($_POST['class_name']))
          $class_name=null;
      else
          $class_name=$_POST['class_name'];

      // validation
      if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
          if(empty($name))
              echo '<p class="error">Please enter name</p>';
          if(empty($class_name))
              echo '<p class="error">Please select your class</p>';
          if(empty($rno))
              echo '<p class="error">Please enter your roll number</p>';
          if(preg_match("/[a-z]/i",$rno))
              echo '<p class="error">Please enter valid roll number</p>';
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                  echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                }
          exit();
      }
      
      $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
      $result=mysqli_query($conn,$sql);
      
      if (!$result) {
          echo '<script language="javascript">';
          echo 'alert("Invalid Details")';
          echo '</script>';
      }
      else{
          echo '<script language="javascript">';
          echo 'alert("Successful")';
          echo '</script>';
      }

  }
?>