<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['insertStatus']) {
    $_SESSION['insertStatus'] = 0;
    "<script type='text/javascript'>alert('Successfully Added to Stock')</script>";
}

if ($_SESSION['inputError']) {
    $_SESSION['inputError'] = 0;
    "<script type='text/javascript'>alert('Please Fill All the input')</script>";
}
if ($_SESSION['fileError']) {
    $_SESSION['fileError'] = 0;
    "<script type='text/javascript'>alert('Select A file first')</script>";
}

if ($_SESSION['deleteStatus'] == 1) {
    $_SESSION['deleteStatus'] = 0;
    echo "<script type='text/javascript'>alert('Deleted!')</script>";
}

$connect = mysqli_connect("localhost", "root", "", "carena");

function setProductTable($connect)
{
    $output = '';
    $count = 0;

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 20;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $query = "SELECT * FROM product";
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);

    $no_of_pages = ceil($total / $no_of_records_per_page);

    $sql = "SELECT * FROM product ORDER BY maker LIMIT $offset, $no_of_records_per_page";
    $display_result = mysqli_query($connect, $sql);

    echo
    "
            <table class=\"table table-striped  table-responsive table-hover \" style=''>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Maker</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Engine</th>
                            <th>Transmission</th>
                            <th>Status</th>
                            <th>Privacy</th>
                            <th>Cover</th>
                            <th>Added By</th>
                            <th>Updated By</th>
                        </tr>
                    </thead>
        <tbody>
    ";

    while ($row = mysqli_fetch_array($display_result)) {
        $id = $row['product_id'];
        if ($row['status']) {
            $status = 'In Stock';
        } else $status = 'Out of Stock';

        if ($row['privacy']) {
            $privacy = 'Yes';
        } else $privacy = 'No';

        if ($row['featured']) {
            $featured = 'Yes';
        } else $featured = 'No';

        echo
            "
        <tr onclick=\"document.location='update_product.php?product_id=$id'\" style=\"cursor:grab;\">
             <td>" . $row['product_id'] . "</td>
             <td>" . $row['maker'] . "</td>
             <td>" . $row['model'] . "</td>
             <td>" . $row['price'] . "</td>
             <td>" . $row['body_type'] . "</td>
             <td>" . $row['engine'] . "</td>
             <td>" . $row['transmission'] . "</td>
             <td>$status</td>
             <td>$privacy</td>
             <td>$featured</td>
             <td>" . $row['added_by'] . "</td>
             <td>" . $row['updated_by'] . "</td>
        </tr>
        ";
    }
    echo
    "
            </tbody>
            </table>
    ";

    echo
    '

                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';
    if ($pageno > 1) {
        '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '<a class="page-link" href="?product_table=1&pageno=' . ($pageno - 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        echo '
                    <li class="page-item"><a class="page-link" href="?product_table=1&pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        echo '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '
          <a class="page-link disabled" href="?product_table=1&pageno=' . ($pageno + 1) . '">Next</a>
           </li>
        </ul>
      </nav>

        ';

}

function setUserTable($connect)
{
    $output = '';
    $count = 0;

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $query = "SELECT * FROM user";
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);

    $no_of_pages = ceil($total / $no_of_records_per_page);

    $sql = "SELECT * FROM user  LIMIT $offset, $no_of_records_per_page";
    $display_result = mysqli_query($connect, $sql);

    echo "
        <table class=\"table table-striped  table-hover\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User Type</th>
                    <th>Status</th>
                </tr>
                </thead>
        <tbody>
    ";

    while ($row = mysqli_fetch_array($display_result)) {

        if ($row['user_type'] == 0) {
            $user_type = 'Admin';
        }
        if ($row['user_type'] == 1) {
            $user_type = 'User';
        }
        if ($row['status'] == 0) {
            $status = 'Pending';
        } else if ($row['status'] == 1) {
            $status = 'Active';
        } else {
            $status = 'Banned';
        }
        echo
            "
        <tr>
             <td>" . $row['user_id'] . "</td>
             <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
             <td>" . $row['email'] . "</td>
             <td>" . $row['phone'] . "</td>
             <td>$user_type</td>
            <td>$status</td>            
        </tr>
        ";
    }
    echo "
            </tbody>
        </table>
    ";


    echo '

                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';
    if ($pageno > 1) {
        echo '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '<a class="page-link" href="?user_table=1&pageno=' . ($pageno - 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        echo '
                    <li class="page-item"><a class="page-link" href="?user_table=1&pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        echo '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '
          <a class="page-link disabled" href="?user_table=1&pageno=' . ($pageno + 1) . '">Next</a>
           </li>
        </ul>
      </nav>

        ';

}

function setMessages($connect)
{
    $output = '';
    $count = 0;

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $query = "SELECT * FROM user";
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);

    $no_of_pages = ceil($total / $no_of_records_per_page);

    $sql = "SELECT * FROM contact_messages ORDER BY message_id DESC  LIMIT $offset, $no_of_records_per_page ";
    $display_result = mysqli_query($connect, $sql);

    echo "
        <table class=\"table table-striped table-responsive table-hover\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>
        <tbody>
    ";

    while ($row = mysqli_fetch_array($display_result)) {
        $status = 0;
        if ($row['status'] == 0) {
            $status = 'Pending';
        }
        if ($row['status'] == 1) {
            $status = 'Responded';
        }
        $id = $row['message_id'];
        echo
            "
          <tr onclick=\"document.location='admin.php?messages=1&view_message=1&message_id=$id'\" style=\"cursor:grab;\">
             <td >" . $row['message_id'] . "</td>
             <td>" . $row['uname'] . "</td>
             <td>" . $row['email'] . "</td>
             <td>" . $row['phone'] . "</td>
             <td>" . $row['subject'] . "</td>
             <td>$status</td>
             <td>" . $row['date_added'] . "</td>
        </tr>
        ";
    }
    echo "
            </tbody>
        </table>
    ";


    echo '

                <nav aria-label="pagination">
                <ul class="pagination justify-content-center">';
    if ($pageno > 1) {
        echo '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '<a class="page-link" href="?messages=1&pageno=' . ($pageno - 1) . '">Previous</a>
                    </li>';

    for ($i = 1; $i <= $no_of_pages; $i++) {
        echo '
                    <li class="page-item"><a class="page-link" href="?messages=1&pageno=' . $i . '"> ' . $i . '</a></li>';
    }
    if ($pageno < $no_of_pages) {
        echo '<li class="page-item">';
    } else {
        echo '<li class="page-item disabled">';
    }
    echo '
          <a class="page-link disabled" href="?messages=1&pageno=' . ($pageno + 1) . '">Next</a>
           </li>
        </ul>
      </nav>

        ';

}

function getMessageCount($connect)
{
    $message_sql = "SELECT message_id FROM contact_messages where status=0";
    $message_count = mysqli_query($connect, $message_sql);
    $num_message = mysqli_num_rows($message_count);
    echo $num_message;
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
    <link rel="stylesheet" href="css/admin_panel.css"/>
    <link rel="stylesheet" href="fa/fontawesome.min.css"/>
    <link rel="stylesheet" href="fa/fontawesome.css"/>
    <link rel="stylesheet" type="text/css" href="css/buy.css"/>

</head>
<body>
<?php
include 'header.php';
?>
<div id="#messageModal" class="modal show fade focus" style="width: 50%;left: 25%" role="dialog">
    <div class="modal-dialog" role="dialog">
        <form class="modal-content form-group" style="background-color: ghostwhite" method="post">
            <div class="modal-title p-4 bg-danger text-white">
                <h5 class="text-white">Delete Product?</h5>
                <span onclick="document.getElementById('#messageModal').style.display='none'"
                      class="close font-weight-bold"
                      title="Close">&timesbar;</span>
            </div>
            <div class="modal-body justify-content-center">
                <label class="form-checkbox-inline" style="font-weight: bold;font-size: 20px">Confirm To Delete:
                    <input type="checkbox" required
                           class="form-check form-check-inline rounded-0 font-weight-bold"
                           style="border: solid 5px">
                </label>
            </div>
            <div class="modal-footer">
                <input class="btn btn-outline-danger ml-auto mr-auto" type="submit" value="Delete"
                       name="deleteBtn">
            </div>
        </form>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 bg-light border-right " id="sidebar">
            <ul class="list-unstyled">
                <a href="?overview=1">
                    <li><i class="fa fa-home"></i> Overview</li>
                </a>
                <a href="?messages=1">
                    <li><i class="fa fa-envelope"></i> Messages<span
                                class="ml-2 badge badge-info"><?php getMessageCount($connect); ?></span></li>
                </a>
                <a href="?product_table=1">
                    <li><i class="fa fa-car"></i> Products</li>
                </a>
                <a href="?user_table=1">
                    <li><i class="fa fa-user"></i> Users</li>
                </a>
                <a href="?developer=1">
                    <li><i class="fa fa-phone"></i> Developer</li>
                </a>
            </ul>
        </div>

        <div class="col-md-10 bg-light" id="contentSection">
            <?php
            if (isset($_GET['overview'])) {

                echo "<style>#contentSection{padding:0;}</style>
<img src='images/under-construction-page-background-file-eps-format-29834255.jpg' class='d-block w-100 h-100'>";

            }
            if (isset($_GET['product_table']) && !isset($_GET['insert_form'])) {
                echo '<div class="row p-2">
                <div class="col-md-6">
                    <h4 style="font-weight: bold">Product List</h4>
                </div>
                <div class="col-md-6">    
                    <a href="admin.php?product_table=1&insert_form=1" role="button" class="btn  toEnd">
                         <i class="fa fa-plus-square fa-lg pr-1" ></i>Add New
                    </a>
                    </div>
                </div>
            ';
                echo setProductTable($connect);

            }
            if (isset($_GET['product_table']) && isset($_GET['insert_form'])) {
                include 'insert_product.php';
            }

            if (isset($_GET['user_table'])) {
                echo '<div class="row p-2">
                <div class="col-md-12">
                    <h4 style="font-weight: bold">User List</h4>
                </div>
                </div>';
                echo setUserTable($connect);
            }
            if (isset($_GET['messages']) && !isset($_GET['view_message'])) {
                echo '<div class="row p-2">
                <div class="col-md-12">
                    <h4 style="font-weight: bold">Contact Messages</h4>
                </div>
                </div>';
                echo setMessages($connect);
            }
            if (isset($_GET['messages']) && isset($_GET['view_message'])) {
                include 'view_message.php';
            }
            if (isset($_GET['developer'])) {

                echo "<style>#contentSection{padding:0;}</style>
<img src='images/under-construction-page-background-file-eps-format-29834255.jpg' class='d-block w-100 h-100'>";

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