<?php include 'filesLogic.php';
session_start();
if(!isset($_SESSION['email'])) { //if not yet logged in
    header("Location: index.php");// send to login page
}
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

    <title>E-Learning System</title>

</head>

<body>

<header class="headeroption">
    <h2>Welcome to Intranet Systems Learning Guide</h2>
</header>
<!---Using Bootstap to improve site look and responsiveness-->
<div class="container-fluid">
    <!--page contents-->

    <div class="main">
        <h1>Course Materials</h1>
<!--menu bar --->
        <ul class="nav nav-pills nav-justified" style="margin-top: 30px">
            <li class="nav-item" style="font-size: 25px">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" style="font-size: 25px" href="student_logout.php">Logout</a>
            </li>
        </ul>

        <div class="card border-primary" style="margin-top: 45px; height=500px">
            <div class="card text-center">

                <div class="card-body">
                    <h5 class="card-title">Module Learning Materials</h5>
                    <table>
                        <thead>
                        <th>ID</th>
                        <th>Filename</th>
                        <th>size (in kb)</th>
                        <th>Downloads</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <!--Display uploaded materials-->
                        <?php foreach ($files as $file): ?>
                            <tr>
                                <td><?php echo $file['file_id']; ?></td>
                                <td><?php echo $file['name']; ?></td>
                                <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                                <td><?php echo $file['downloads']; ?></td>
                                <td><a href="student_home.php?id=<?php echo $file['file_id'] ?>">Download</a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


            </div>
        </div>


<footer class="footeroption">
    <h2> Best of luck in this course!</h2>
</footer>


</body>
</html>
