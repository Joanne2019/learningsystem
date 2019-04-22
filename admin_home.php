<?php include 'filesLogic.php'; //database connection

session_start();

if(!isset($_SESSION['email'])) { //if not yet logged in
    header("Location: admin.php");// send to login page
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="CSS/js/bootstrap.bundle.min.js"></script>

    <title>Admin</title>


</head>

<body>

<header class="headeroption">
    <h2>Admin Panel</h2>
</header>

<!---Using Bootstap to improve site look and responsiveness-->
<div class="container-fluid">

    <div class="col-sm-12">

        <ul class="nav nav-pills nav-justified" style="margin-top: 30px">
            <li class="nav-item" style="font-size: 25px">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size: 25px" href="users.php">View Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size: 25px" href="notes.php">Add Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size: 25px" href="admin_logout.php">Logout</a>
            </li>
        </ul>

        <?php
         //session
        if (!isset($_SESSION['email'])){
        echo "you are not logged in";
        header("admin.php");
        }
?>



        <div class="card border-primary" style="margin-top: 45px; height=500px">
        <div class="card text-center">
            <div class="card-header">
                <p></p>
            </div>
            <div class="card-body">
                <h3 class="card-title">Welcome to Control Admin Panel</h3>
                <p class="card-text"><h5>This is your admin panel, <br>where you can manage users and files content.....</h5></p>

            </div>
        </div>
        </div>

    </div>
</div>

<footer class="footeroption">
    <h2> Copyright © 2019</h2>
</footer>

</body>
</html>



