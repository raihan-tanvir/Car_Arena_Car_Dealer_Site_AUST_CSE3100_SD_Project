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
if ($_SESSION['messageSent']==1) {
    $_SESSION['messageSent'] = 0;
   echo "<script type='text/javascript'>alert('Message Sent')</script>";
}
$link = mysqli_connect("localhost", "root", "", "carena");

if(isset($_POST['queryBtn'])) {
    $message = trim($_POST['message']);

    if($_POST['subject']!='...' && $message!='') {
        $name=$_POST['firstName'].' '.$_POST['lastName'];
        $name=strtoupper($name);
        $name = mysqli_real_escape_string($link, $name);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $subject = mysqli_real_escape_string($link, $_POST['subject']);
        $message = mysqli_real_escape_string($link, $_POST['message']);

        $sql = "INSERT INTO contact_messages(uname,email,phone,subject,message)
                VALUES ('$name','$email','$phone','$subject','$message')";

        if (mysqli_query($link, $sql) === true) {
            $_SESSION['messageSent'] = 1;

            header('location:contact.php');

        } else
            echo "<script type='text/javascript'>alert('failed!')</script>";
        die();
    }
    else
        echo "<script type='text/javascript'>alert('All fields are required')</script>";

}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <link rel="stylesheet" href="css/buy.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <title>Contact Us!</title>
</head>
<body>
<?php
include 'header.php'
?>
<div class="container">
    <div class="row carListingHeader justify-content-center">
        <p class="hdr">CONTACT US</p>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-6 contactInfo">
            <div class="setMid">
                <header class="inforHdr"><span><i class="fa fa-map-marker" style="margin-right: 5px" ></i></span>Address</header>
                <p class="infoP" style="color: greenyellow">140,141 Love Road<br>Tejagaon I/A, Dhaka 1212</p>

                <header class="inforHdr"><span><i class="fa fa-phone" style="margin-right: 5px" ></i></span>Call Now</header>
                <p style="color: greenyellow">+880 1832803540</p>

                <header class="inforHdr"><span><i class="fa fa-envelope" style="margin-right: 5px" ></i></span>General Support</header>
                <p style="color:greenyellow;">support@carena.com</p>

            </div>
        </div>
        <div class="col-md-6 pl-5">
            <h2 align="center">Send Us A Message</h2>
            <div>
                <form class="form-group mt-5"  method="post" >
                    <input class="form-control rounded-0 border-bottom-0" value="Tell Us Your Name *" disabled>
                    <div class="input-group mb-3">
                        <input type="text" name="firstName" class="form-control rounded-0" required placeholder="First Name" pattern="[A-Za-z\s]{1,10}" title="Only letters are allowed with minimum 1 to max 10 character">
                        <input type="text" name="lastName" class="form-control rounded-0" required placeholder="Last Name" pattern="[A-Za-z\s]{1,10}" title="Only letters are allowed with minimum 1 to max 10 character">
                    </div>

                    <input class="form-control rounded-0 border-bottom-0" value="Enter Your Email Address *" disabled></input>
                    <input type="email" name="email" class="form-control rounded-0 mb-3" required placeholder="Eg: example@gmail.com">

                    <input class="form-control rounded-0 border-bottom-0" placeholder="Enter Your Phone Number *" disabled>
                    <input type="tel" name="phone" class="form-control rounded-0 mb-3" required placeholder="Eg: +8801500000000"
                           pattern="^((\+880)|0)(\d){10}$" title="valid format +880XXXXXXXXXX or 0XXXXXXXXXX"><br>

                    <input class="form-control rounded-0 border-bottom-0" value="Select Your Message Subject *" disabled></input>
                    <select class="form-control rounded-0 mb-3" required name="subject">
                        <option value="">...</option>
                        <option>Purchasing a car</option>
                        <option>Repair/Maintenance</option>
                        <option>Others</option>
                    </select>

                    <input class="form-control rounded-0 border-bottom-0" value="Message*" disabled>
                    <textarea class="form-control rounded-0 mb-3" type="text" name="message" rows="6" required placeholder="Write your query"></textarea>

                    <input type="submit" name="queryBtn" value="Send Message"  class="btn btn-success rounded-0 setMidHorizontal">

                </form>
            </div>
        </div>
    </div>

    <div class="row pt-5 mb-5" style="margin-bottom: 10px;margin-top: 10px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1825.7694195881147!2d90.40579115785688!3d23.7638190961457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77decb5f845%3A0xc2eadd2f3b867792!2z4KaG4Ka54KeN4Kab4Ka-4Kao4KaJ4Kay4KeN4Kay4Ka-4Ka5IOCmrOCmv-CmnOCnjeCmnuCmvuCmqCDgppMg4Kaq4KeN4Kaw4Kav4KeB4KaV4KeN4Kak4Ka_IOCmrOCmv-CmtuCnjeCmrOCmrOCmv-CmpuCnjeCmr-CmvuCmsuCmr-CmvA!5e0!3m2!1sbn!2sbd!4v1533312250878" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
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
