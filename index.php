<?php


//connect to database
include ("config.php");

//check connection
if ($conn === false) {
    die("Error: Could not connect");
}

session_start();

if (isset($_POST['login'])) {
    // session_start();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql = "SELECT * FROM student WHERE email = '$email'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                header("location:student_home.php");

            } else {
                echo "Error, Login failed";
            }
        }
    }
}


//close connection
mysqli_close($conn);
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
                <li><a href="register.php">Register</a> </li>
                <li><a href="index.php">Login</a></li>
            </ul>
        </div>


<div class="main">
    <h1>E-Learning System - Login</h1>


<div class="row">
    <div class="col-sm-6"
        <div class="segment1">
            <img src="images/login.png" height="245" style=" position: relative; left: 30%; border-radius: 9px">
        </div>
<div class="col-sm-6">
        <div class="segment2">
            <form action="index.php" method="post">
                <table class="tbl">
                    <tr>
                        <td>Email</td>
                        <td><input name="email" type="text" id="email" required></td>
                    </tr>
                    <hr>
                    <tr>
                        <td>Password </td>
                        <td><input name="password" type="password" id="password" required></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" id="loginsubmit" value="Login" name="login">
                        </td>
                    </tr>
                </table>
            </form>
            <p>New User ? <a href="register.php">Signup</a> Free</p>
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



