<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 19-Jul-18
 * Time: 6:06 PM
 */


$host = "localhost";
$user = "root";
$password = "";
$db = "carena";

$link = mysqli_connect($host, $user, $password, $db);
$db_selected = mysqli_select_db($link,$db);

if (mysqli_connect_errno())
{
     "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>


