<?php
session_start();
if(!isset($_SESSION['id'])){
    $_SESSION['id']=1;
    include 'session_var.php';
}

$connect = mysqli_connect("localhost", "root", "", "carena");
//include 'dbConnection.php';

function getFeaturedCar($connect)
{
    $query = "SELECT * FROM product WHERE featured=1 ";
    $result = mysqli_query($connect, $query);
    return $result;
}

function make_slide_indicators($connect)
{
    $output = '';
    $count = 0;
    $result = getFeaturedCar($connect);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
   <li data-target="#featuredCarCarousel" data-slide-to="' . $count . '" class="active"></li>
   ';
        } else {
            $output .= '
   <li data-target="#featuredCarCarousel" data-slide-to="' . $count . '"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}

function setCarouselItem($connect)
{
    $output = '';
    $count = 0;
    $result = getFeaturedCar($connect);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<div class="carousel-item active">';
        } else {
            $output .= '<div class="carousel-item">';
        }
        $output .= '
   <img class="d-block w-100"  src="' . $row["image"] . '" alt="' . $row["maker"] . '" />
   
   <div class="caption">
       <h1><a href="product_details.php?product_id=' . $row["product_id"] . '">' . $row["year_mfg"] . ' ' . $row["maker"] . ' ' . $row["model"] . '</a> </h1>
        <p>PRICE : ' . $row["price"] . '<br>
           Engine :' . $row["engine"] . '<br>
           Capacity: ' . $row["capacity"] . '</p>
   
   </div>
 
  </div>
  ';
        $count = $count + 1;
    }
    return $output;
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
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



</head>
<body>
<?php include "header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="featuredCarCarousel" class="carousel slide" data-ride="carousel">

                <!--ol class="carousel-indicators">
                    <--?php echo make_slide_indicators($connect); ?>
                </ol-->

                <div class="carousel-inner">
                    <?php echo setCarouselItem($connect); ?>
                </div>
                <a class="carousel-control-prev" href="#featuredCarCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" ></span>
                </a>
                <a class="carousel-control-next" href="#featuredCarCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>

        <!--div class="col-md-2"></div-->


        <!--div class="col-md-2"></div-->

    </div>
</div>

<div class="container">
    <div class="row" style="margin-top: -60px; padding: 40px">
        <div class="col-md-4 advantageBox">
            <i class="fa fa-car fa-2x mb-4"></i>
            <p class="font-weight-bold">Largest Dealership of Cars</p>
            <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce more than 10 million vehicles per year</p>
            <p class="underLine"></p>
        </div>
        <div class="col-md-4 advantageBoxCenter">
            <i class="fa fa-money-bill fa-2x mb-4"></i>
            <p class="font-weight-bold">We Offers Lower Cars Prices</p>
            <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce more than 10 million vehicles per year</p>
            <p class="underLine"></p>
        </div>
        <div class="col-md-4 advantageBox">
            <i class="fa fa-check-circle fa-2x mb-4"></i>
            <p class="font-weight-bold">Multipoint Safety Checks</p>
            <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce more than 10 million vehicles per year</p>
            <p class="underLine"></p>
        </div>
    </div>

</div>


<div class="bg-light p-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/1-2.jpeg" class="d-block w-100 h-100">
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h5>We are Trusted Name in Car Sales & Services</h5>
                        <h4 class="font-weight-bold">Used by Million of People Every Month!</h4>

                        <p class="text-justify">Toyota is the world's market leader in sales of hybrid electric vehicles, and one of the largest companies to encourage the mass-market adoption of hybrid vehicles across the globe. Toyota is also a market leader in hydrogen fuel-cell vehicles. Cumulative global sales of Toyota and Lexus hybrid passenger car models achieved the 10 million milestone in January 2017.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5><i class="fa fa-thumbs-up"></i> Trusted By Thousands</h5>
                        <p>Toyota is the world's market leader in sales of hybrid electric vehicles</p>
                    </div>
                    <div class="col-md-6">
                        <h5><i class="fa fa-pie-chart"></i> Wide Range Of Vehicles</h5>
                        <p>Toyota is the world's market leader in sales of hybrid electric vehicles</p>
                    </div>

                    <div class="col-md-6">
                        <h5><i class="fa fa-balance-scale"></i> Professional Dealers</h5>
                        <p>Toyota is the world's market leader in sales of hybrid electric vehicles</p>
                    </div>
                    <div class="col-md-6">
                        <h5><i class="fa fa-money"></i> Faster Buy &amp; Sell</h5>
                        <p>Toyota is the world's market leader in sales of hybrid electric vehicles</p>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>

<div class=" pt-3">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 align="center">Latest Vehicles</h2>
                <p align="center">Toyota was the world's first automobile manufacturer</p>
                <p align="center" style="color: coral">=======</p>
            </div>
        </div>

        <div class="row">
            <?php
            $query = "SELECT * FROM product WHERE status=1 ORDER BY product_id DESC LIMIT 4";
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_array($result)) {
                $id = $row["product_id"];
                echo "<div class=\"col-md-3 mb-4\">
                                <div>
                                <a href=\"product_details.php?product_id=$id\">
                                    <img class=\"d-block w-100\" src=" . $row["image"] . "></a>
                               </div>
                               
                               <div class='bg-white p-1'>
                                   <p align='center'><b>" . $row["maker"] . "</b>
                                   <br>" . $row["model"] . "<br>
                                   <span class='text-danger font-weight-bold' align='center'>" . $row["price"] . "$</p>
                               </div>
                               
                               
                                 <div class='text-white bg-info' style=''>
                                    <div class='row p-2'>
                                        <div class='col-md-6 border-right'>
                                                <i class='fa fa-cogs text-center d-block'> " .$row["fuel"] ."</i>
                                        </div>
                                        
                                        <div class='col-md-6 '>
                                                <i class='fa fa-tachometer text-center d-block'> " . $row["mileage"] . "</i>
                                        </div>
                                   
                                    </div>
                                </div>                                    
                             </div>
                      ";
            }
            ?>

        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="buy.php">
                    <button class="btn btn-secondary rounded-0 float-right">View All >></button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="mt-5 pt-2 bg-light">
    <div class="container weOffer pt-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 align="center" style="color: white">Our Services</h2>
                <p align="center" style="color: gainsboro">Toyota was the world's first automobile manufacturer</p>
            </div>
        </div>
    </div>

</div>
<div class="pt-5 mb-5">
    <div class="container">
        <div class="row" style="margin-top: -280px; padding: 40px">
            <div class="col offerBox">
                <i class="fa fa-car fa-2x mb-4"></i>
                <p class="font-weight-bold">Largest Stock Of Cars</p>
                <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce</p>
            </div>
            <div class="col offerBox">
                <i class="fa fa-money-bill fa-2x mb-4"></i>
                <p class="font-weight-bold">Buy Car on Installment</p>
                <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce</p>
            </div>
            <div class="col offerBox">
                <i class="fa fa-server fa-2x mb-4"></i>
                <p class="font-weight-bold">Smart Customer Service</p>
                <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce</p>
            </div>
            <div class="col offerBox">
                <i class="fa fa-wrench fa-2x mb-4"></i>
                <p class="font-weight-bold">Warranty Service</p>
                <p class="text-justify"style="font-size: 14px">Toyota is the world's second-largest automotive manufacturer. Toyota was the world's first automobile manufacturer to produce</p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h2 class="text-danger text-center">3874</h2>
                <p>VEHICLES STOCK</p>
            </div>
            <div class="col text-center">
                <h2 class="text-danger">300</h2>
                <p>DEALERS SERVED</p>
            </div>
            <div class="col text-center">
                <h2 class="text-danger text-center">6421</h2>
                <p>HAPPY CUSTOMERS</p>
            </div>
            <div class="col text-center">
                <h2 class="text-danger text-center">1405</h2>
                <p>VEHICLES ON SALE</p>
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