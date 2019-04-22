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
    // check if input characters are valid



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

<?php
//form validation

// define variables and set to empty values
$fname = $email = $surname =  "";
$nameErr = $emailErr =  $surnameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $surname = test_input($_POST["surname"]);
    $email = test_input($_POST["email"]);
}
// security mechanism by stripping special characters to prevent storing special characters in database
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// make input fields required

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $nameErr = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["surname"])) {
        $surnameErr = "surname is required";
    } else {
        $surname = test_input($_POST["fname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                        <table class="tbl">
                            <tr>
                                <td>Name</td>
                                <td><input name="fname" type="text" id="firstname"></td>
                             <span class="error1">* <?php echo $nameErr;?></span>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input name="surname" type="text" id="surname"></td>
                                <span class="error1">* <?php echo $surnameErr;?></span>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td><input name="course" type="text" id="course"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input name="phone" type="number" pattern="^[0-9]" min="0"  maxlength="12" id="phone"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" type="text" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></td>
                                <span class="error1">* <?php echo $emailErr;?></span>
                            </tr>
                            <tr>
                                <td>Password </td>
                                <td><input name="password" type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"></td>
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



