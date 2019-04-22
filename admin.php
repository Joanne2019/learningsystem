<?php                //Admin login details ---- email = joanne@gmail.com  ----->password = joanne

//connect to database
include ("config.php");

//check connection
if ($conn === false) {
    die("Error: Could not connect");
}
session_start();

// check session
 /*if(isset($_SESSION['email'])) { // if already login
    header("location:admin_home.php"); // send to home page
} */

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM admin WHERE email = '$email'";

    $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                header("location:admin_home.php");

            } else {
                echo "Error, Login failed";
            }
        }
    }

    /*if(mysqli_num_rows($result) == 1){
        header("location:admin_home.php");
    }
    else{
        echo  "Error, Login failed";
    }*/

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

    <title>Admin</title>

</head>
<body>

<header class="headeroption">
    <h2>Intranet Systems Learning Guide</h2>
</header>

<div class="container-fluid">
    <!--page contents-->


    <div class="main">
        <h1>E-Learning System - Administrator</h1>


        <div class="row">
            <div class="col-sm-6"
            <div class="segment1">
                <img src="images/admin.jpg" alt="admin icon" height="245" style=" position: relative; left: 30%;">
            </div>
            <div class="col-sm-6">
                <div class="segment2">
                    <form action="admin.php" method="post">
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
    </div>

<footer class="footeroption">
    <h2> Best of luck in this course!</h2>
</footer>


</body>
</html>



