<?php include 'filesLogic.php';

session_start();

if(!isset($_SESSION['email'])) { //if not yet logged in
    header("Location: admin.php");// send to login page
}

?>

<?php include 'config.php';
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

    <title>Notes</title>

</head>


<body>

<header class="headeroption">
    <h2>Add Lecture Materials</h2>
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
                    <a class="nav-link" style="font-size: 25px" href="users.php">View Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="font-size: 25px" href="#">Add Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 25px" href="admin_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

             <div class="row segment3">
                <form action="admin_home.php" method="post" enctype="multipart/form-data" >
                    <h3 style="color: #0f6674">Upload Lecture Notes</h3>
                    <input type="file" name="myfile"> <br>
                    <button type="submit" name="save">Upload</button>

                </form>

            </div>


          <!--  <table class="table table-hover" style="margin-top: 30px">
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
            </table>-->


                <table class="table table-sm table-active" style="margin-top: 9px">
                    <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Filename</th>
                    <th scope="col">size (in kb)</th>
                    <th scope="col">Downloads</th>
                    <th scope="col">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td><?php echo $file['file_id']; ?></td>
                            <td><?php echo $file['name']; ?></td>
                            <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                            <td><?php echo $file['downloads']; ?></td>
                            <td><a href="notes.php?file_id=<?php echo $file['id'] ?>">Delete</a></td>
                                                    </tr>
                                                <?php endforeach;?>

                                                </tbody>
                                            </table>



                                          <!--  --><?php
                            /*
                                            $sql="select * from student";
                                            $query= mysqli_query($conn,$sql);
                                            $num=0;
                                            $query2 = mysqli_num_rows($query);


                                            if ($query2 > 0) {

                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    $num = $num + 1;
                                                    echo "<tbody>";
                                                    echo '<tr>';
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

                                            */?>





        </div>


    </div>
</div>

<?php
if(isset($_GET['id'])) {

    include("config.php");
    $index = $_GET['id'];

    // select query
    $sql = "delete from files where file_id=$index";
    // execute query
    if (mysqli_query($conn, $sql))
        header("refresh:1,url=notes.php");
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