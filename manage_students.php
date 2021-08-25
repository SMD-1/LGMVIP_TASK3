<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" type='text/css' href="manage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Dashboard</title>
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

    <div class="main" style="width: 70%; margin: 0 auto; padding: 2% 5%">
      <?php
          include('init.php');
          include('session.php');

          $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              echo "<table>
              <caption>Manage Students</caption>
              <tr>
              <th>NAME</th>
              <th>ROLL NO</th>
              <th>CLASS</th>
              </tr>";

              while($row = mysqli_fetch_array($result))
                {
                  echo "<tr>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['rno'] . "</td>";
                  echo "<td>" . $row['class_name'] . "</td>";
                  echo "</tr>";
                }

              echo "</table>";
          } else {
              echo "0 Students";
          }
      ?>
    </div>
</body>
</html>
