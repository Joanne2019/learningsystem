<?php
//connect to database
include_once("config.php");

if (isset($_POST['register'])) {

    session_start();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

        //hash password before storing for security
        $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
         // check connection
         if ($conn === false) {
             die("Error: Could not connect");
         } else {



        //insert into database
        $sql = "INSERT INTO admin (email, password)
         VALUES ('$email','$hashedpwd')";


        if (mysqli_query($conn, $sql)) {
            header("location:admin.php");
        }
        else{
           echo "Error: Could not Execute";
        }




    }

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

    <div class="main">
        <h1> Registration</h1>

        <div class="row">
            <div class="col-sm-6"
            <div class="segment1">
                <img src="images/login.png" height="285" style=" position: relative; left: 30%; border-radius: 9px">
            </div>
            <div class="col-sm-6">
                <div class="segment2">
                    <form action="admin_reg.php" method="post">
                        <table class="tbl">

                            <tr>
                                <td>Email</td>
                                <td><input name="email" type="text" id="email" required></td>
                            </tr>
                            <tr>
                                <td>Password </td>
                                <td><input name="password" type="password" id="password" required></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" id="regsubmit" value="Signup" name="register">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <p>Already Registered? <a href="admin.php">Login</a> Here </p>
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



