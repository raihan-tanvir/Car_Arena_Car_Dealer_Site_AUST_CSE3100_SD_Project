<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 20-Jul-18
 * Time: 8:59 PM
 */
if (!isset($_SESSION)) {
    session_start();
}
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

    <title>Sign Up Here!</title>
</head>
<body>

<div class="container">


    <div class="row">

        <div CLASS="col-md-6">
            <h3><strong>WELCOME TO <span style="color: red">SHERAGARI</span></strong></h3>
            <p style="color: orange">============</p>

            <p>Bhalogari is destined to become Bangladesh’s largest portal for vehicle purchase and sale, attracting
                individuals, merchants and corporations. Our proprietary appraisal and enlisting process guarantees
                secure and reliable stock, smooth financial transactions and robust after-sale service. </p>


            <h5>Customer Advantages</h5>

            <ul style="list-style-type:square">

                <li>High-Quality Inventory</li>
                <li> No-Haggle Pricing</li>
                <li>Worry-Free Ownership</li>
                <li>Available Financing</li>

            </ul>
        </div>
        <div class="col-md-6">
            <div>
                <form class="form-group" method="post">
                    Dont have an account?
                    <h2>Create Now...</h2>


                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name:</label>
                            <input type="text" name="firstname" class="form-control" required
                                   placeholder="Enter Your First Name">
                        </div>

                        <div class="col-md-6">
                            <label>Last Name:</label>
                            <input type="text" name="lastname" class="form-control" required
                                   placeholder="Enter Your Last Name">
                        </div>
                    </div>

                    <br>

                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required placeholder="Enter Your Email"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">


                    <br>

                    <label>Phone:</label>
                    <input type="tel" name="phone" class="form-control" required placeholder="Enter Your phone number"
                           pattern="^(((\+|00)?880)|0)(\d){10}$">

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Password:</label>
                            <input type="text" name="password" class="form-control"
                                   required placeholder="Enter Your Password"
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 characters">
                        </div>

                        <div class="col-md-6">
                            <label>Confirm Password:</label>
                            <input type="text" name="confirmpassword" class="form-control"
                                   required placeholder="Re-enter Your Password">
                        </div>
                    </div>

                    <br>
                    <!--
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">Gender: </label>
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" id="radio1" value="male"> Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" id="radio2" value="female">
                                                Female
                                            </label>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="row">

                                            <div class="col-12">
                                                <label>Date Of Birth:</label>
                                                <br>
                                                <input class="form-control" type="date" id="dob">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Privacy Policy:</label>
                                            <textarea class="form-control" disabled id="exampleTextarea"></textarea>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" required >
                                                Check me out
                                            </label>
                                        </div>
                                        <br>
                    -->

                    <div class="form-group">
                        <label>By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.
                            You may receive SMS notifications from us and can opt out at any time.</label>
                    </div>
                    <br>

                    <input type="submit" name="signUpBtn" value="Sign Up" class="btn btn-primary btn-block">

                </form>
            </div>
        </div>

    </div>
    <?php
    include 'footer.php';
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
