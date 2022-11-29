<!DOCTYPE html>
<?php
include "rmsdbcon.php";
session_start();
if (isset($_SESSION["admin"])) {
    $user = $_SESSION["admin"];
    $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
    $row = mysqli_fetch_array($r);
    $i = $row["name"];
}else{
    header("location:rmslogout.php");
}
$sql = "SELECT * FROM `bill`;";
$q = mysqli_query($con, $sql);
?>
<html lang="en">

<head>
    <title>Bill-all</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
</head>

<body>

    <!-- header -->
    <header>
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand" href="#">
                <img src="images/food-mania-logo.png" width="180" height="60" class="d-inline-block align-top" alt="">

            </a>

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i><?php echo "Hello " . $i; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li><a class="dropdown-item" href="rmslogout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </nav>
    </header>
    <div class="row my-3 mx-3">
        <div class="col">
            <h5>Bill Details</h5>
        </div>
        <div class="col">
        <a href="Todaysbill.php" class="btn btn-success ml-3" style="margin-left:700px ;"role="button">Back</a></div>
    </div>

    <div>
        <?php
        if (mysqli_num_rows($q) > 0) {
        ?>
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Table-Name</th>
                            <th scope="col">Customer-Name</th>
                            <th scope="col">Customer-Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Purchase-Amount</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Discount-Type</th>
                            <th scope="col">SGST(2.5%)</th>
                            <th scope="col">CGST(2.5%)</th>
                            <th scope="col">Net-Payabl-Amount</th>
                            
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    while ($roww = mysqli_fetch_array($q)) {
                       $di= $roww["discount_type"];
                       $q1 = mysqli_query($con,"SELECT * FROM `rms_discount` where id = $di");
                       $r = mysqli_fetch_array($q1);
                       $tni= $roww["table_name"];
                       $q2 = mysqli_query($con,"SELECT * FROM `rms_tables` where id = $tni");
                       $r2 = mysqli_fetch_array($q2);
                    ?>
                        <tr>
                            <td><?php echo $roww["id"]; ?></td>
                            <td><?php echo $r2["name"]; ?></td>
                            <td><?php echo $roww["customer_name"]; ?></td>
                            <td><?php echo $roww["customer_email"]; ?></td>
                            <td><?php echo $roww["date"]; ?></td>
                            <td><?php echo $roww["total_amount"]; ?></td>
                            <td><?php echo $roww["discount"]; ?></td>
                            <td><?php echo $r["name"]; ?></td>
                            <td><?php echo $roww["sgst"]; ?></td>
                            <td><?php echo $roww["cgst"]; ?></td>
                            <td><?php echo $roww["net_payable_amount"]; ?></td>
                            </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>
        <?php
        } else {
            echo "No Record Found";
        }
        ?>
    </div>
</body>

</html>