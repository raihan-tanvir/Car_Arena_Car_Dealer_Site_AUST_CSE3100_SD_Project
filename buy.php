<?php
if (!isset($_SESSION)) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "carena");
$orderX = '';
$orderIn = '';
if ($_SESSION['loginStatus'] == 1) {
    $viewerShip = 'privacy IN(0,1)';
} else {
    $viewerShip = 'privacy=0';
}


function getProduct($connect, $viewerShip)
{
    $query = "SELECT * FROM product WHERE $viewerShip";
    $result = mysqli_query($connect, $query);
    return $result;
}


function setProductCard($connect, $orderX, $orderIn, $viewerShip)
{
    $output = '';
    $count = 0;
    $result = getProduct($connect, $viewerShip);

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 12;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $total = mysqli_num_rows($result);
    $no_of_pages = ceil($total / $no_of_records_per_page);

    $display_sql = "SELECT * FROM product WHERE $viewerShip ORDER BY $orderX $orderIn LIMIT $offset, $no_of_records_per_page";
    $display_result = mysqli_query($connect, $display_sql);

    $flag = 0;

    $output .= '<div class="row">';

    while ($row = mysqli_fetch_array($display_result)) {
        $output .= '
            <div class="col-md-4 mb-5">
                <div class="productCard">
                    
                    <img src="' . $row["image"] . '" class="d-block w-100">';

        if ($row["privacy"] == 1 && $_SESSION['loginStatus']) {
            $output .= '<span class="premiumLabel align-self-end">Premium</span>';
        }
        $output .= '
                    <div class="mt-4">
                        <a href="product_details.php?product_id=' . $row["product_id"] . '">
                            <h5 class="card-title">' . $row["maker"] . ' ' . $row["model"] . '</h5></a>
                            <p class="text-justify">' . $row["car_desc"] . '</p>                  
                    </div>
                    
                    <p class=\'text-danger font-weight-bold\'> $' . $row["price"] . ' </p>
                    
                   
                    <div class=\'row p-2\'>
                        <div class="col-md-4 border align-content-center">
                             <i class=\'fa fa-cogs fa-1x text-center\'> ' . $row["fuel"] . '</i>
                        </div>                      
                        <div class="col-md-4 border align-content-center">
                             <i class="fa fa-calendar text-center"> ' . $row["year_mfg"] . '</i>
                        </div> 
                        <div class="col-md-4 border align-content-center">
                            <i class=\'fa fa-tachometer text-center\'> ' . $row["mileage"] . '</i>
                        </div>                      
                    </div> 
                </div>
            </div>      
    ';
        $count = $count + 1;
    }

    $output .= '
         </div>

         <div class="row p-4">
            <div class="col-md">
                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';
    if ($pageno > 1) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '<a class="page-link" href="?pageno=' . ($pageno - 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        $output .= '
                    <li class="page-item"><a class="page-link" href="?pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '
                        <a class="page-link " href="?pageno=' . ($pageno + 1) . '">Next</a>
                    </li>
                </ul>
            </nav>

    
            </div>
        </div>
    ';

    return $output;
}

function setProductCardByFilter($connect, $orderX, $orderIn, $maker, $priceRange, $year_mfg, $body_type, $viewerShip)
{
    $output = '';
    $count = 0;
    $result = getProduct($connect, $viewerShip);

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 12;
    $offset = 0;


    $display_sql = "SELECT * FROM product WHERE $viewerShip AND maker='$maker' and price $priceRange AND year_mfg=$year_mfg AND body_type='$body_type' ORDER BY $orderX $orderIn LIMIT $offset, $no_of_records_per_page";
    $display_result = mysqli_query($connect, $display_sql);

    $total = mysqli_num_rows($display_result);
    $no_of_pages = ceil($total / $no_of_records_per_page);
    $flag = 0;

    $output .= '<div class="row">';
    if ($total > 0) {
        while ($row = mysqli_fetch_array($display_result)) {
            $output .= '
            <div class="col-sm-4 mb-5">
                <div class="productCard">
    
                     <img src="' . $row["image"] . '" class="d-block w-100">';

            if ($row["privacy"] == 1 && $_SESSION['loginStatus']) {
                $output .= '<span class="premiumLabel align-self-end">Premium</span>';
            }
            $output .= '
                    <div class="mt-4">
                        <a href="product_details.php?product_id=' . $row["product_id"] . '">
                            <h5 class="card-title">' . $row["maker"] . ' ' . $row["model"] . '</h5></a>
                            <p class="text-justify">' . $row["car_desc"] . '</p>                  
                    </div>
                    <p class=\'text-danger font-weight-bold\'> $' . $row["price"] . ' </p>
    
                    <div class=\'row  p-2\'>
                        <div class="col-md-4 border align-content-center">
                             <i class=\'fa fa-cogs\'> ' . $row["fuel"] . '</i>
                        </div>                      
                        <div class="col-md-4 border align-content-center">
                             <i class="fa fa-calendar"> ' . $row["year_mfg"] . '</i>
                        </div> 
                        <div class="col-md-4 border align-content-center">
                            <i class=\'fa fa-tachometer\'> ' . $row["mileage"] . '</i>
                        </div>                      
                    </div> 
                </div>
            </div>      
    ';
            $count = $count + 1;
        }
    } else {
        echo "<script type='text/javascript'>alert('Sorry!No car found!')</script>";
    }

    $output .= '
         </div>

         <div class="row p-4">
            <div class="col-md">
                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';

    if ($pageno < $no_of_pages) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '
                        <a class="page-link disabled" href="?pageno=' . ($pageno + 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        $output .= '
                    <li class="page-item"><a class="page-link" href="?pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '
                        <a class="page-link disabled" href="?pageno=' . ($pageno + 1) . '">Next</a>
                    </li>';


    return $output;
}

function setProductCardBySearch($connect, $item, $viewerShip)
{
    $output = '';
    $count = 0;
    $result = getProduct($connect, $viewerShip);

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 12;
    $offset = 0;


    $what = explode(' ', $item);
    $q = count($what);

    $display_sql = "SELECT * FROM product WHERE $viewerShip AND ((maker LIKE '%" . $item . "%') OR (model LIKE '%" . $item . "%') OR (CONCAT(maker,' ',model) LIKE '%" . $item . "%')) LIMIT $offset, $no_of_records_per_page";
    $display_result = mysqli_query($connect, $display_sql);

    $total = mysqli_num_rows($display_result);
    $no_of_pages = ceil($total / $no_of_records_per_page);
    $flag = 0;

    $output .= '<div class="row">';
    if ($total > 0) {
        while ($row = mysqli_fetch_array($display_result)) {
            $output .= '
            <div class="col-sm-4 mb-5">
                <div class="productCard">
    
                    <img src="' . $row["image"] . '" class="d-block w-100">';

                    if($row["privacy"]==1 && $_SESSION['loginStatus']){
                        $output.='<span class="premiumLabel align-self-end">Premium</span>';
                    }
                    $output.='<div class="mt-4">
                        <a href="product_details.php?product_id=' . $row["product_id"] . '">
                            <h5 class="card-title">' . $row["maker"] . ' ' . $row["model"] . '</h5></a>
                            <p class="text-justify">' . $row["car_desc"] . '</p>                  
                    </div>
                   
                    <p class=\'text-danger font-weight-bold\'> $' . $row["price"] . ' </p>
    
                    <div class=\'row  p-2\'>
                        <div class="col-md-4 border align-content-center">
                             <i class=\'fa fa-cogs\'> ' . $row["fuel"] . '</i>
                        </div>                      
                        <div class="col-md-4 border align-content-center">
                             <i class="fa fa-calendar"> ' . $row["year_mfg"] . '</i>
                        </div> 
                        <div class="col-md-4 border align-content-center">
                            <i class=\'fa fa-tachometer\'> ' . $row["mileage"] . '</i>
                        </div>                      
                    </div> 
                </div>
            </div>      
    ';
            $count = $count + 1;
        }
    } else {
        echo "<script type='text/javascript'>alert('Sorry!No car found!')</script>";
    }

    $output .= '
         </div>

         <div class="row p-4">
            <div class="col-md">
                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';

    if ($pageno < $no_of_pages) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '
                        <a class="page-link disabled" href="?pageno=' . ($pageno + 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        $output .= '
                    <li class="page-item"><a class="page-link" href="?pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        $output .= '<li class="page-item">';
    } else {
        $output .= '<li class="page-item disabled">';
    }
    $output .= '
                        <a class="page-link disabled" href="?pageno=' . ($pageno + 1) . '">Next</a>
                    </li>';


    return $output;
}

function show_details($connect)
{
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['id'];
        echo $product_id;
    } else {
        echo "failed";
    }
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
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/buy.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


</head>
<body>
<?php
include 'header.php'
?>

<div class="container">

    <!-- Example single danger button -->
    <div class="row carListingHeader justify-content-center">
        <p class="hdr">Buy Your Dream Car...</p>
    </div>

    <div class="row pt-5">
        <div class="col-md-2 bg-light h-100">
            <div class="row">
                <p class="filterBar">Filter By</p>

                <div class="row">
                    <div class="col-md-12 ml-2">
                        <form class="form-group" method="post">

                            <label>By Maker:</label>
                            <ul class="list-unstyled ml-3">
                                <li><input type="radio" name="vendor" value="." checked hidden></li>
                                <?php
                                $query = "SELECT distinct maker FROM product order by maker";
                                $result = mysqli_query($connect, $query);

                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                        <li><input type=\"radio\" class=\"form-check-inline\" name=\"vendor\" value=" . $row["maker"] . ">" . $row["maker"] . "</li>";
                                    $i++;
                                }
                                ?>
                            </ul>

                            <label>Price Range</label>
                            <select name="priceRange" class="" required>
                                <option value="between 500000 AND 1000000">5-10 Lakh</option>
                                <option value="between 1000000 and 2500000">10-25 Lakh</option>
                                <option value="between 2500000 and 5000000">25-50 Lakh</option>
                                <option value=">=5000000">50 Lakh&Higher</option>

                            </select>

                            <label class="mt-2">Year of MFG</label>
                            <input type="number" value="2018" name="year_mfg" class="d-block w-75" required>

                            <label class="mt-2 mb-2">Body Type</label>
                            <ul class="list-unstyled ml-3">
                                <li><input type="radio" name="body_type" value="." checked hidden></li>
                                <?php
                                $query = "SELECT distinct body_type FROM product order by body_type";
                                $result = mysqli_query($connect, $query);

                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                        <li><input type=\"radio\" name='body_type' class=\"form-check-inline\" value=" . $row["body_type"] . ">" . $row["body_type"] . "</li>";
                                    $i++;
                                }
                                ?>
                            </ul>

                            <button type="submit" class="btn btn-info rounded-0 ml-2" name="filterBtn">Filter</button>
                            <button type="reset" class="btn btn-secondary rounded-0 ml-4" name="resetBtn">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 pl-4">
            <div class="row sortbar">
                <form class="form-group form-inline" method="post">
                    <label><strong>Sort By:</strong></label>
                    <select class="ml-3 form-control rounded-0" name="selectVendor">
                        <option>Maker</option>
                        <option>Price</option>
                        <option>Capacity</option>
                        <option value="year_mfg">Year of Mfg.</option>
                        <option>Transmission</option>
                        <option>Fuel</option>
                    </select>
                    <select class="ml-2 form-control rounded-0" name="selectOrder">
                        <option>ASC</option>
                        <option>DESC</option>
                    </select>
                    <button type="submit" class="btn btn-info ml-3 pl-4 pr-4 rounded-0" name="sortBtn">Sort</button>
                </form>

                <form class="form-group form-inline ml-auto pr-2" method="post">
                    <input type="text" class="form-control rounded-0" name="searchItem"
                           placeholder="search by maker/model">
                    <button type="submit" class="btn btn-danger rounded-0 ml-3 pl-4 pr-4" name="searchBtn">Search
                    </button>
                </form>
            </div>

            <?php
            if (isset($_POST['sortBtn'])) {
                $X = $_POST['selectVendor'];
                $Y = $_POST['selectOrder'];
            } else {
                $X = 'maker';
                $Y = 'ASC';
            }
            if (isset($_POST['searchBtn'])) {
                $item = $_POST['searchItem'];
                if ($item == '') {
                    echo "<script type='text/javascript'>alert('Enter a valid search!')</script>";
                    echo setProductCard($connect, $X, $Y, $viewerShip);
                } else {
                    echo setProductCardBySearch($connect, $item, $viewerShip);
                }
            }
            if (isset($_POST['filterBtn'])) {
                $maker = $_POST['vendor'];
                $priceRange = $_POST['priceRange'];
                $year_mfg = $_POST['year_mfg'];
                $body_type = $_POST['body_type'];

                if ($maker !== '.' && $priceRange != '' && $year_mfg != '' && $body_type != '.') {
                    echo setProductCardByFilter($connect, $X, $Y, $maker, $priceRange, $year_mfg, $body_type, $viewerShip);
                } else {
                    echo setProductCard($connect, $X, $Y, $viewerShip);
                    echo "<script type='text/javascript'>alert('All parameters are required!')</script>";
                }
            }

            if (!(isset($_POST['searchBtn']) || isset($_POST['filterBtn']) || isset($_POST['sorthBtn']))) {
                echo setProductCard($connect, $X, $Y, $viewerShip);
            }

            ?>

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