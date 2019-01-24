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
$_SESSION['message'] = '';
$_SESSION['regStatus'] = 0;
$_SESSION['loginStatus'] = 0;
$_SESSION['currentUserEmail'] = '';
$_SESSION['user_rank']='';
$_SESSION['welcomeMessage']=0;
$link = mysqli_connect("localhost", "root", "", "carena");

if (isset($_POST['loginBtn'])) {
    $email = $_POST['loginEmail'];
    $password = md5($_POST['loginPassword']);
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount != 0) {
        if ($password == $row['password']) {
            $_SESSION['loginStatus']=1;
            $_SESSION['currentUserEmail'] = $email;
            $_SESSION['user_rank']=$row['user_type'];
            $_SESSION['welcomeMessage']=1;

            if ($row['user_type'] == 0) {
                header("location:admin.php?messages=1");
                echo "<script type='text/javascript' class='alert-success'>alert('Welcome Admin!')</script>";
            } else {
                header("location:index.php");
                echo "<script type='text/javascript' class='alert-success'>alert('Welcome User!')</script>";
            }
        } else {
            $_SESSION['message']='Incorrect Password!';
            echo "<script type='text/javascript' class='alert-success'>alert('Incorrect Password!')</script>";
        }
    } else {
        $_SESSION['message']='Invalid email or password!';
        echo "<script type='text/javascript' class='alert-success'>alert('Invalid Username or Password!')</script>";

    }

}

if (isset($_POST['signUpBtn'])) {
    $reTry=1;
    if ($_POST['password'] == $_POST['confirmpassword']) {
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $password = md5($_POST['password']);

            $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($link, $_POST['lastname']);

            $phone = mysqli_real_escape_string($link, $_POST['phone']);

            $user_type = 1;

            $check1st = "SELECT * FROM user";
            $checkResult = mysqli_query($link, $check1st);
            $checkResultCount = mysqli_num_rows($checkResult);

            if ($checkResultCount == 0) {
                $user_type = 0;
            }

            $query = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($link, $query);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount == 0) {

                $sql = "INSERT INTO user (email,password,firstname,lastname,phone,user_type) VALUES ('$email', '$password','$firstname','$lastname','$phone','$user_type')";

                if (mysqli_query($link, $sql) === true) {
                    $_SESSION['message'] = "Registration successful!"
                        . "Added $email to the database!";
                    $_SESSION['regStatus'] = 1;
                    $reTry=0;
                } else {
                    $_SESSION['message'] = "Server Error! Try Later";
                    $_SESSION['regStatus'] = 2;
                }
            } else {
                $_SESSION['message'] = "Already Registered!";
                $_SESSION['regStatus'] = 3;
            }
        } else {
            $_SESSION['regStatus'] = 4;
            $_SESSION['message'] = "Password Didn't Match!";
        }
        if($reTry==1){
            header('location:login.php');
        }
    }
?>