<?php include 'config.php';

session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="CSS/js/bootstrap.bundle.min.js"></script>

    <title>Admin</title>

</head>


<body>

<header class="headeroption">
  <h2>Admin Panel: View Users</h2>
</header>

<div class="container-fluid">
    <div class="row">
    <!--page contents-->
    <div class="col-sm-12">

        <ul class="nav nav-pills nav-justified" style="margin-top: 30px">
            <li class="nav-item" style="font-size: 25px">
                <a class="nav-link" href="admin_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" style="font-size: 25px" href="#">View Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size: 25px" href="notes.php">Add Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size: 25px" href="admin_logout.php">Logout</a>
            </li>
        </ul>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <!--- To see users registered on system -->
   <!--     <div id=" ">
            <div class=" ">
                <table style= cellspacing="10">
                    <thead>
                    <tr>
                        <th class="header1">Index</th>
                        <th class="header2">Name</th>
                        <th class="header3"> Surname</th>
                        <th class="header3"> Course</th>
                        <th class="header3"> Phone</th>
                        <th class="header3"> Email</th>
                    </tr>
                    </thead>
    </div>
        </div>-->

            </table>

            <table class="table table-hover" style="margin-top: 30px">
                <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Course</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>


        <?php

        $sql="select * from student";
        $query= mysqli_query($conn,$sql);
        $num=0;
        $query2 = mysqli_num_rows($query);


        if ($query2 > 0) {

            while ($row = mysqli_fetch_assoc($query)) {
                $num = $num + 1;

              //  echo '<div class="tbody">';
                echo "<tbody>";
                echo '<tr>';
              //  echo '<th scope="row">.</th>';
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['surname'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                $index = $row['student_id'];
                echo '<td><a href="users.php?id=' . $index . '">Delete</a></td>';
                echo '</tr>';
                echo "</tbody>";
                echo '</div>';
            }
        }

        ?>

            </table>



    </div>


    </div>
</div>

<?php
if(isset($_GET['id'])) {

    include("config.php");
    $index = $_GET['id'];

    // select query
    $sql = "delete from student where student_id=$index";
    // execute query
    if (mysqli_query($conn, $sql))
     header("refresh:1,url=users.php");
     else {
         echo "Not deleted";
    }

}

?>


<footer class="footeroption">
    <h2> Copyright © 2019</h2>
</footer>

</body>
</html>