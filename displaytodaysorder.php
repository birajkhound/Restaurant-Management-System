<?php
include 'rmsdbcon.php';
session_start();
if (isset($_SESSION["admin"])) {
    $user = $_SESSION["admin"];
    $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
    $row = mysqli_fetch_array($r);
    $i = $row["name"];
}else{
    header("location:rmslogout.php");
}

$_result = mysqli_query($con, "SELECT * FROM `rms_order` WHERE `payment_status`= 'UNPAID';");
if (isset($_GET['idd'])) {
    $id = $_GET['idd'];
    $delete = mysqli_query($con, "DELETE FROM `rms_order` WHERE `id`= '$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Unpaid Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                    <i class="fas fa-user me-2"></i><?php echo "Hello " . $i ?>
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
    <!-- Sidebar -->
    <div style="background-color: azure; height: 650px;" class="d-flex" id="wrapper">
        <div style="background-color: #354259; width: 200px;" class="" id="sidebar-wrapper">


            <div class="list-group list-group-flush my-3 ">

                <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-tachometer p-2" aria-hidden="true"></i>Dashboard</a>


                <a href="admindetails.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-user p-2" aria-hidden="true"></i>Profile</a>


                <a href="displaystaff.php" class="list-group-item list-group-item-action bg-transparent text-white second-text">
                    <i class="fa fa-users p-2" aria-hidden="true"></i>Staff</a>

                <a href="displayjobrole.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-th-large p-2" aria-hidden="true"></i>Job Role</a>


                <a href="displayitemcatagory.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-th-large p-2" aria-hidden="true"></i>Category</a>

                <a href="menu.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-cutlery p-2" aria-hidden="true"></i>Items</a>

                <a href="rmsmanagetable.php" class="list-group-item list-group-item-action bg-transparent text-white second-text">
                    <i class="fa fa-braille p-2" aria-hidden="true"></i>Tables</a>


                <a href="displaytodaysorder.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-clipboard p-2" aria-hidden="true"></i>Orders</a>

                <a href="dailyreport.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-money p-2" aria-hidden="true"></i>Instant Report</a>


                <a href="billgenerate.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-money p-2" aria-hidden="true"></i>Generate Bill</a>

                <a href="rmslogout.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-sign-out p-2" aria-hidden="true"></i>Logout</a>

            </div>
        </div>

        <!-- sidebar -->
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row g-3 my-2">
                    <div class="col-md">

                        <a href="alltimesorder.php" class="btn btn-success" role="button" style="margin-left: 0px;">All Orders</a>
                    </div>
                    <div class="col-md">
                        <a href="displaytodayspaidorder.php" class="btn btn-success " role="button" style="margin-left: 0px;">Today's Order</a>
                    </div>
                    <div class="col-md" style="margin-left: 100px;">
                        <h4>Unpaid-Order</h4>
                    </div>
                    <div class="col-md">
                        <a href="index.php" class="btn btn-success" role="button" style="margin-left: 200px;">Home</a>
                    </div>
                    <div class="col-md">
                        <a href="orderselecttable.php" class="btn btn-success" role="button" style="margin-left: 110px;">Add Order</a>
                    </div>
                </div>
            </div>



            <!-- table -->
            <?php
            if (mysqli_num_rows($_result) > 0) {
            ?>
                <div class="container-fluid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">table_name</th>
                                <th scope="col">item</th>
                                <th scope="col">quantity</th>
                                <th scope="col">price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        while ($row1 = mysqli_fetch_array($_result)) {
                            $ni = $row1["table_name"];
                            $nq = mysqli_query($con, "SELECT * FROM `rms_tables` WHERE `id`='$ni'");
                            $r = mysqli_fetch_array($nq);
                            $ix = $r["name"];
                            $nn = $row1["item"];
                            $nh = mysqli_query($con, "SELECT * FROM `items` WHERE `id`='$nn'");
                            $rx = mysqli_fetch_array($nh);
                            $is = $rx["item_name"];
                        ?>
                            <tr>
                                <td><?php echo $row1["id"]; ?></td>
                                <td><?php echo $ix; ?></td>
                                <td><?php echo $is; ?></td>
                                <td><?php echo $row1["quantity"]; ?></td>
                                <td><?php echo $row1["price"]; ?></td>
                                <td>
                                    <a href="displaytodaysorder.php?idd=<?php echo $row1["id"]; ?>" class="btn btn-success ml-3" role="button">Delete</a>
                                    <!-- <a href="index.php" class="btn btn-success ml-3" role="button">Back</a> -->
                                </td>
                                <td></td>

                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
            <?php
            } else { ?>
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Paid!</h4>
                        <p>All Your Orders Have Been Paid.</p>
                        <hr>
                        <p class="mb-0">You Don't Have Any Pending Order.</p>
                    </div>
                </div>
            <?php
            }
            ?>
            </table></div></div>
</body>

</html>