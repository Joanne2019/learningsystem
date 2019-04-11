<?php                //Admin login details ---- email = joanne@gmail.com  ----->password = joanne
session_start();

//connect to database
include ("config.php");

//check connection
if ($conn === false) {
    die("Error: Could not connect");
}

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = mysqli_query("SELECT * FROM admin WHERE (email = '$email' && password = '$password')");

    $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    $resultcheck = mysqli_num_rows($result);


    if ($resultcheck == 1){
      //  echo  $_SESSION['guest'] = $username;
        header("location:admin_home.php");
    }
    else{
        echo  "Error, Login failed";
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
                                <td><input type="submit" id="loginsubmit" value="Login" name="login">
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



