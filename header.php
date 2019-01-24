<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 14-Jul-18
 * Time: 12:56 PM
 */
if(isset($_GET['logOut'])){
    $_SESSION['message'] = '';
    $_SESSION['regStatus'] = 0;
    $_SESSION['loginStatus'] = 0;
    $_SESSION['currentUserEmail'] = '';
    $_SESSION['user_rank']='';
    $_SESSION['welcomeMessage']=0;
    $_GET['logOut']=0;
    echo "<script type='text/javascript'>alert('Loggoed Out Successfully')</script>";
}
if (isset($_SESSION['id']) && $_SESSION['welcomeMessage']){
    if ($_SESSION['loginStatus']){
        if($_SESSION['user_rank']==1){
            echo "<script type='text/javascript'>alert('Welcome User')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Welcome Admin')</script>";
        }
        $_SESSION['welcomeMessage']=0;
    }
}
//print_r($_SESSION);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>
    <title></title>


</head>
<body>
<div class="navHolder">

    <div class="container">
        <div class="navbar navbar-expand-lg" role="">
            <a class="navbar-brand" href="index.php">
                <img src="images/audiTronE8.jpg" width="auto" height="25" class="d-inline-block align-top">
                CARENA
            </a>

            <div class="navbar-nav ml-lg-auto">
                <a id='homeNavBtn' class="nav-item nav-link  active" href="index.php">Home</a>
                <a class="nav-item nav-link" href="buy.php">Buy</a>
                <a class="nav-item nav-link" href="contact.php">Contact</a>
                <a class="nav-item nav-link" href="about.php">About</a>
                <?php
                if($_SESSION['loginStatus']== 0) {
                    echo " <a class=\"nav-item nav-link\" href=\"login.php\" id=\"signInBtn\">Login</a>";

                }
                if($_SESSION['loginStatus']== 1){
                    if($_SESSION['user_rank']==0){
                        echo ' <a class="nav-item nav-link" href="admin.php?messages=1">MyPanel</a>';
                    }
                    echo "<div class=\"dropdown\" id=\"signOutBtn\">
                    <a class=\"btn btn-outline-primary btn-sm dropdown-toggle\"  href=\"#\" role=\"button\"
                       data-toggle=\"dropdown\">
                    </a>
                    <div class=\"dropdown-menu\">
                        <a class=\"nav-item nav-link\" href=\"index.php?logOut=1\">Log Out</a>
                    </div>
                </div>";
                }
                ?>
            </div>
        </div>

    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

