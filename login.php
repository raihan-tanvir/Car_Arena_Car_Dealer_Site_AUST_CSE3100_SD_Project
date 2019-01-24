<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 20-Jul-18
 * Time: 8:59 PM
 */

session_start();

if ($_SESSION['regStatus'] == 1) {
    echo "<script type='text/javascript' class='alert-success'>alert('Registered successfully!')</script>";
}
if ($_SESSION['regStatus'] == 2) {
    echo "<script type='text/javascript'>alert('Server Error!')</script>";
}
if ($_SESSION['regStatus'] == 3) {
    echo "<script type='text/javascript'>alert('Already Registered with this email!')</script>";
}
if ($_SESSION['regStatus'] == 4) {
    echo "<script type='text/javascript'>alert('Password Mismatched!')</script>";
}
include 'authenticator.php';
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
    <link rel="stylesheet" href="css/sign_up.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>


    <title>Sign Up Here!</title>
</head>
<body>
<div class="navHolder">

    <div class="container pb-1 pt-1">
        <div class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php">
                <img src="images/audiTronE8.jpg" width="auto" height="25" class="d-inline-block align-top"
                     alt="">
                AUTO CHOICE
            </a>

            <div class="navbar-nav ml-auto">
                <form class="form-inline" method="post">
                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <i class="fa fa-envelope icon-l"></i>
                        </div>
                        <input type="email" name="loginEmail" class="form-control rounded-0" required
                               placeholder="Eg: example@gmail.com">
                    </div>
                    <div class="input-group  mr-3">
                        <div class="input-group-prepend">
                            <i class="fa fa-key icon-l"></i>
                        </div>
                        <input type="password" name="loginPassword" class="form-control rounded-0" required
                               placeholder="Enter Your Password">
                    </div>
                    <div class="input-group ">
                        <input type="submit" name="loginBtn" class="btn btn-danger rounded-0 setMidHorizontal"
                               value="Login">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pb-5 bg-light">

        <div class="col-md-6 signUpPromo p-5 mb-5">
            <div class="setMidHorizontal">
                <header class="signUpHeader pt-5 mt-5">Sign Up To View All Exclusive Cars</header>
                <h4 class="text-white">Advantages Of Signing Up</h4>
                <ul class="fa-ul text-white">
                    <li><i class="fa-li fa fa-spinner fa-spin"></i>Unlimited Access to Stock</li>
                    <li><i class="fa-li fa fa-spinner fa-spin"></i>Amazing Offers on Various Occasions</li>
                    <li><i class="fa-li fa fa-spinner fa-spin"></i>Huge Discount & Gifts on First Transaction</li>
                    <li><i class="fa-li fa fa-spinner fa-spin"></i>Extended Warranty Service</li>
                    <li><i class="fa-li fa fa-spinner fa-spin"></i>Many More</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6  p-5 mb-5">
            Dont have an account?
            <h2>Create Now...</h2>
            <form class="form-group pt-3" method="post">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" name="firstname" class="form-control rounded-0" required
                           placeholder="First Name" pattern="[A-Za-z]{1,10}" title="Only letters are allowed with minimum 1 to max 10 character">
                    <input type="text" name="lastname" class="form-control rounded-0" required
                           placeholder="Last Name" pattern="[A-Za-z]{1,10}" title="Only letters are allowed with minimum 1 to max 10 character">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="email" name="email" class="form-control rounded-0" required
                           placeholder="Eg: example@gmail.com"">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone No.</span>
                    </div>
                    <input type="tel" name="phone" class="form-control rounded-0" required
                           placeholder="Eg: +8801500000000"
                           pattern="^((\+880)|0)(\d){10}$" title="valid format +880XXXXXXXXXX or 0XXXXXXXXXX">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Passoword</span>
                    </div>
                    <input type="password" name="password" class="form-control rounded-0" required
                           placeholder="Enter Your Password" pattern="(?=.*\d)(?=.*[a-zA-z]).{6,25}"
                           title="only alphaneumeric characters are allowed with at least 1 digit & 1 character and 6 characters">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Confirm Password</span>
                    </div>
                    <input type="password" name="confirmpassword" class="form-control rounded-0" required
                           placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-zA-z]).{6,25}"
                           title="only alphaneumeric characters are allowed with at least 1 digit & 1 character and 6 characters">
                </div>
                <label class="p-3 userAgrr">By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.
                    You may receive SMS notifications from us and can opt out at any time.</label>
                <input type="submit" name="signUpBtn" class="btn btn-info rounded-0 setMidHorizontal  mb-3"
                       value="Sign Up">
            </form>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
