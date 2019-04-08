<?php
include ("config.php");

if ($conn === false) {
    die("Error: Could not connect");
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

<div class="container-fluid">
    <!--page contents-->
    <div class="menu">
        <ul>
            <li><a href="#">Login</a></li>
        </ul>
    </div>


    <div class="main">
        <h1>E-Learning System - Administrator</h1>



        <div class="row">
            <div class="col-sm-6"
            <div class="segment1">
                <img src="images/admin.jpg" height="245" style=" position: relative; left: 30%;">
            </div>
            <div class="col-sm-6">
                <div class="segment2">
                    <form action="" method="post">
                        <table class="tbl">
                            <tr>
                                <td>Email</td>
                                <td><input name="email" type="text" id="email"></td>
                            </tr>
                            <hr>
                            <tr>
                                <td>Password </td>
                                <td><input name="password" type="password" id="password"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" id="loginsubmit" value="Login">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <span class="empty" style="display: none;">Field must not be empty !</span>
                    <span class="error" style="display: none;">Email or Password not matched !</span>
                    <span class="disable" style="display: none;">User Id disabled !</span>
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



