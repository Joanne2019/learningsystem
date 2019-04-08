<?php
//connect to database
include ("config.php");

if ($conn === false) {
    die("Error: Could not connect");
}
//
if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
//    $password2 = mysqli_real_escape_string($conn,$_POST['password2']);

    //hash password before storing for security
    $hashedpwd = password_hash($password,PASSWORD_DEFAULT);


    //errror handlers



    //insert into database
    $sql = "INSERT INTO student(name,surname,course,phone,email,password)
         VALUES ('$name','$surname','$course','$phone','$email','$hashedpwd')";

  $sql = mysqli_query($conn,$sql);

    if ($sql) {
    header("location/index.php");
    }
    else{
        echo "Error: Could not Execute";
    }
}

 /*   if (mysqli_query($conn, $sql)) {
        header('location/index.php');
    } else {
        echo "Error: Could not Execute" . mysqli_error($conn);
    }
}*/
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
            <li><a href="#">Register</a> </li>
            <li><a href="#">Login</a></li>
        </ul>
    </div>

    <div class="main">
        <h1>E-Learning System - Registration</h1>

        <div class="row">
            <div class="col-sm-6"
            <div class="segment1">
                <img src="images/login.png" height="285" style=" position: relative; left: 30%; border-radius: 9px">
            </div>
            <div class="col-sm-6">
                <div class="segment2">
                    <form action="index.php" method="post">
                        <table class="tbl">
                            <tr>
                                <td>Name</td>
                                <td><input name="name" type="text" id="firstname" required></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input name="surname" type="text" id="surname" required></td>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td><input name="course" type="text" id="course" required></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input name="phone" type="int" id="phone" required></td>
                            </tr>
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
                    <p>Already Registered? <a href="index.php">Login</a> Here </p>
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



