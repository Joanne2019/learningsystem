<?php
      session_start();
$name = "";
$surname = "";
$errors = array();
//connect to database
include_once("config.php");


//if the register button is clicked
if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['fname']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn,$_POST['password2']);

    //ensure form fields are filled properly
    if(empty($name)){
        array_push($errors,"Name is required");
    }
    if(empty($surname)){
        array_push($errors,"Surname is required");
    }
    if(empty($course)){
        array_push($errors,"Course is required");
    }
    if(empty($email)){
        array_push($errors,"Email is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    if($password != $password2){
        array_push($errors,"The two passwords do not match");
    }

    // if there are no errors, save student to database
    if (count($errors) == 0){

        //hash password before storing for security
        $hashedpwd = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO student(fname,surname,course,phone,email,password)
                 VALUES ('$name','$surname','$course','$phone','$email','$hashedpwd')";
        mysqli_query($conn,$sql);
        $_SESSION['fname'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location:index.php'); // redirect to home page

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
    <div class="menu">
        <ul>
            <li><a href="register.php">Register</a> </li>
            <li><a href="index.php">Login</a></li>
        </ul>
    </div>

    <div class="main">
        <h1>E-Learning System - Registration</h1>

        <div class="row">
            <div class="col-sm-4"
            <div class="segment1">
                <img src="images/login.png" height="285" style=" position: relative; left: 30%; border-radius: 9px">
            </div>
            <div class="col-sm-4">
                <div class="segment2">
                    <form action="register.php" method="post">

                        <table class="tbl">
                            <tr>
                                <td>Name</td>
                                <td><input name="fname" type="text" id="firstname"></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input name="surname" type="text" id="surname"></td>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td><input name="course" type="text" id="course"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input name="phone" type="int" id="phone"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" type="text" id="email"></td>
                            </tr>
                            <tr>
                                <td>Password </td>
                                <td><input name="password" type="password" id="password"></td>
                            </tr>
                            <tr>
                                <td>Confirm Password </td>
                                <td><input name="password2" type="password" id="password"></td>
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
            <div class="col-sm-4">
            <!--Display validation errors here-->
            <?php include ('errors.php'); ?>

        </div>
        </div>
    </div>
</div>

<footer class="footeroption">
    <h2> Best of luck in this course!</h2>
</footer>


</body>
</html>



