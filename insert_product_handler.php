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
$_SESSION['insertStatus'] = 0;
$_SESSION['fileError'] = 0;
$_SESSION['inputError'] = 0;


$link = mysqli_connect("localhost", "root", "", "carena");

if (isset($_POST['insertBtn'])) {
    $maker = $_POST['maker'];
    $model = strtoupper($_POST['model']);
    $bodytype = $_POST['bodytype'];
    $engine = $_POST['engine'];
    $fuel = $_POST['fuel'];
    $mileage = $_POST['mileage'];
    $year = $_POST['year'];
    $capacity = $_POST['capacity'];
    $transmission = $_POST['transmission'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $carDesc = $_POST['carDesc'];
    $status = 1;
    $fileOk=0;
    $imgPath='';

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (!empty($_FILES['fileToUpload']['name'])) {

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script type='text/javascript'>alert('Only JPG, JPEG & PNG are allowed.')</script>";
        } else {
            $fileOk=1;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imgPath = "images/" . basename($_FILES["fileToUpload"]["name"]);
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                // echo "Sorry, there was an error uploading your file.";
                echo "<script type='text/javascript'>alert('Error uploading your file.Try Again!')</script>";
            }
        }
    } else {
        $fileOk=0;
        $_SESSION['fileError'] = 1;
    }

    $currUSER=$_SESSION['currentUserEmail'];

    if ($maker != '...' && $bodytype != '...' && $engine != '...' && $capacity != '...' && $transmission != '...' && $fileOk) {
        $model = mysqli_real_escape_string($link, $model);
        $carDesc = mysqli_real_escape_string($link, $carDesc);
        $price = mysqli_real_escape_string($link, $price);
        $imgPath = "images/" . basename($_FILES["fileToUpload"]["name"]);

        $sql = "INSERT INTO product (maker,model,price,body_type,year_mfg,capacity,color,mileage,fuel,engine,transmission,status,image,car_desc,added_by)
VALUES ('$maker','$model','$price','$bodytype','$year','$capacity','$color','$mileage','$fuel','$engine','$transmission','$status','$imgPath','$carDesc','$currUSER')";

        if (mysqli_query($link, $sql) === true) {
            $_SESSION['insertStatus'] = 1;
            echo "<script type='text/javascript'>alert('Added to Stock!')</script>";
           // header('location:admin.php?product_table=1&insert_form=1');

        } else {
            $_SESSION['insertStatus'] = 2;
            echo "<script type='text/javascript'>alert('failed!')</script>";
        }

    } else {
        $_SESSION['inputError'] = 1;
        echo "<script type='text/javascript'>alert('Please fill all the inputs')</script>";
    }

}

?>