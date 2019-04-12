
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

    <style type="text/css">

        .secondrow > .row {
            border: 1px solid #ddd;
            /*padding: 5px 30px;*/
            text-align: center;
            margin: 20px;
            min-height: 50px;
            border-radius: 50%;
        }
        .imgstretch{
            padding: 10px 30px;
        }
        .imgstretch img {
            width: 100%;
            height: 100px;
        }


    </style>
    
</head>
<body>

<header class="headeroption">
    <h2>Welcome to Intranet Systems Learning Guide</h2>
</header>

<div class="container-fluid">
    <!--page contents-->
    
            <h3>Administrator Panel:Welcome <?php echo $_SESSION['NAME'];?></h3>

            <div class="row">
                <div class="col-md-6 secondrow">
                    <div class="row">
                        <a href="<?php echo web_root; ?>admin/modules/lesson/index.php" title="Lessons">
                            <div class="imgstretch">
                                <img src="student2.jpg">
                            </div>
                            <label>Lessons</label>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 secondrow">
                    <div class="row">
                        <a href="<?php echo web_root; ?>admin/modules/exercises/index.php" title="Exercises">
                            <div class="imgstretch">
                                <img src="students.jpg">
                            </div>
                            <label>Exercises</label>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if($_SESSION['TYPE']=="Administrator"){ ?>
                    <div class="col-md-6 secondrow">
                        <div class="row">
                            <a href="<?php echo web_root; ?>admin/modules/user/index.php" title="Manage Users">
                                <div class="imgstretch">
                                    <img src="question.png">
                                </div>
                                <label>Manage Users</label>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-6 secondrow">
                    <div class="row">
                        <a href="<?php echo web_root; ?>admin/modules/report/index.php" title="Reports">
                            <div class="imgstretch">
                                <img src="question-mark.png">
                            </div>
                            <label>Reports</label>
                        </a>
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



