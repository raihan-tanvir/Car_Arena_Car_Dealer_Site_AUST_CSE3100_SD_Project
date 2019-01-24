<?php
    session_start();
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 21-Jul-18
 * Time: 10:33 AM
 */

    $link = mysqli_connect("localhost", "root", "", "carena");

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $query = "SELECT * FROM product WHERE product_id=" . $product_id;
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        } else {
        echo "failed";
    }
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/product_details.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


</head>
<body class="">
<?php
include 'header.php'
?>


<div class="container">
    <div class="row p-5 mb-5 justify-content-center " style="background: url('images/regBG3.jpg')">
        <p class="hdr"><?php echo $row['maker'],' ',$row['model']?></p>
    </div>

    <div class="row mb-4 justify-content-between">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <p class="border-bottom"><span class="productTitle"><?php echo $row['maker'],' ',$row['model']?></span><br>
                        <span class="productSubTitle"><?php echo $row['transmission'],' ',$row['body_type'],' ',$row['year_mfg'] ;?></span></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo $row['image']?>" class="d-block w-100">

                    <ul class="nav nav-tabs mt-4 detailsTab p-2 w-auto" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" data-toggle="tab" href="#description">Vehicle Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#details">Technical Details</a>
                        </li>
                    </ul>

                    <div class="tab-content d-block">
                        <div id=description class="container tab-pane active"><br>
                            <h3>The New Bugatti Chiron Sport</h3>
                            <p class="text-justify">Toyota received its first Japanese Quality Control Award at the start of the 1980s and began participating in a wide variety of motorsports. Due to the 1973 oil crisis, consumers in the lucrative US market began turning to make small cars with better fuel economy. American car manufacturers had considered small economy cars to be an entry-level product, and their small vehicles employed a low level of quality to keep the price low. Conservative Toyota held on to rear-wheel-drive designs for longer than most; while a clear first in overall production they were only third in production of front-wheel-drive cars in 1983, behind Nissan and Honda. In part due to this, Nissan's Sunny managed to squeeze by the Corolla in numbers built that year.[33]
                                In 1982, the Toyota Motor Company and Toyota Motor Sales merged into one company, the Toyota Motor Corporation. Two years later, Toyota entered into a joint venture with General Motors called the New United Motor Manufacturing, Inc, NUMMI, operating an automobile-manufacturing plant in Fremont, California. The factory was an old General Motors plant that had been closed for two years. It is currently the site of Tesla, Inc.'s assembly plant. Toyota then started to establish new brands at the end of the 1980s, with the launch of their luxury division Lexus in 1989.
                            </p>
                        </div>
                        <div id="features" class="container tab-pane fade"><br>
                            <h3>Car Equipement</h3>
                            <ul>
                                <li>Air Conditioning</li>
                                <li>Leather Interior</li>
                                <li>Xenon</li>
                                <li>Parking Sensors</li>
                                <li>Alloy Wheels</li>
                                <li>Cruise Control</li>
                                <li>ABS</li>
                                <li>ESP</li>
                            </ul>
                        </div>
                        <div id="details" class="container tab-pane fade"><br>
                            <h3>Technical Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul style="list-style-type:square">
                                        <li>Drivetrain Oil Cooler: Auxiliary</li>
                                        <li>Engine Alternator: 160 Amps</li>
                                        <li>Exterior Mirrors Manual Folding</li>
                                        <li>Seatbelts Seatbelt Warning Sensors</li>
                                        <li>Front Headrests Adjustable</li>
                                        <li>Cruise Control System</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul style="list-style-type:square">
                                        <li>Crumple Zones Front</li>
                                        <li>Roll Stability Control</li>
                                        <li>Multi-Function Display</li>
                                        <li>ABS Brakes (4-Wheel)</li>
                                        <li>Audio System 6 Speakers</li>
                                        <li>Electronic Brakeforce Distribution</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="row mb-3 justify-content-center p-2" style="background-color: #ce0000;">
                <header class="specHdr">Vehicle Specification</header>
            </div>
            <div class="row bg-light">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item bg-light">Maker <span class="float-right"><?php echo $row['maker']?></span> </li>
                        <li class="list-group-item bg-light">Model <span class="float-right"><?php echo $row['model']?></span> </li>
                        <li class="list-group-item bg-light">Status <span class="float-right"><?php if($row['status']==1){echo "In Stock";} else{echo "Out Of Stock";} ?></span> </li>
                        <li class="list-group-item bg-light">Made Year <span class="float-right"><?php echo $row['year_mfg']?></span> </li>
                        <li class="list-group-item bg-light">Mileage <span class="float-right"><?php echo $row['mileage']?></span> </li>
                        <li class="list-group-item bg-light">Fuel <span class="float-right"><?php echo $row['fuel']?></span> </li>
                        <li class="list-group-item bg-light">Engine <span class="float-right"><?php echo $row['engine']?></span> </li>
                        <li class="list-group-item bg-light">Transmission <span class="float-right"><?php echo $row['transmission']?></span> </li>
                        <li class="list-group-item bg-light">Color <span class="float-right"><input class="colorBox"  style="background: <?php echo $row['color'] ?>" disabled></input></span> </li>
                        <li class="list-group-item bg-light">Price <span class="float-right">BDT. <?php echo $row['price']?></span> </li>
                        <li class="list-group-item bg-light">Warranty <span class="float-right">Yes</span> </li>
                    </ul>
                </div>
            </div>

            <div class="row vLabel">
                <div class="col-md-8">
                    <i class="fas fa-gas-pump fa-lg"> Economy</i>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-end">
                        <header class="text-danger font-weight-bold">2000 KMPL</header>
                    </div>
                </div>
            </div>

            <div class="row vLabel justify-content-between">
                <div class="col-md-8">
                    <i class="fas fa-car fa-lg"> Demand</i>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-end">
                        <header class="text-danger font-weight-bold">High</header>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

