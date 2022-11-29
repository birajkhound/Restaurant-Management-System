 <!DOCTYPE html>
 <?php
    include "rmsdbcon.php";
    session_start();
    if (isset($_SESSION["admin"])) {
        $user = $_SESSION["admin"];
        $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
        $roww = mysqli_fetch_array($r);
        $n = $roww["name"];
    }else{
        header("location:rmslogout.php");
    }
    if (isset($_POST['submit'])) {
        $ti = ($_POST['table']);
        $cname =  $_POST['cn'];
        $cemail =  $_POST['ce'];
        $status = "UNPAID";
        $dc = $_POST['disc'];
        $q1 = mysqli_query($con, "SELECT * FROM `rms_order` WHERE `table_name`='$ti' and `payment_status`= '$status'");

        if (mysqli_num_rows($q1) > 0) {
            $p = 0;
            while ($row = mysqli_fetch_array($q1)) {
                $p1 = $row['price'];
                $in = $row['item'];
                $p = $p + $p1;
            }
            $ta = $p;
            $q4 = mysqli_query($con, "SELECT * FROM `rms_discount` WHERE `id` =$dc");
            $rowd = mysqli_fetch_array($q4);
            $dx = $rowd["percentage"];
            $da = $rowd["purchese amount"];
            $lx = $dx / 100;
            if ($ta > $da) {
                $dis = $ta * $lx;
                $kh = $ta - $dis;
            } else {
                $dis = 0;
                $kh = $ta;
            }
            $sgst = $kh * 0.025;
            $cgst = $kh * 0.025;
            $tpa = $cgst + $sgst + $kh;
            $date = date('y-m-d');
            $q3 = mysqli_query($con, "INSERT INTO `bill`( `table_name`, `customer_name`, `customer_email`, `date`, `total_amount`, `discount`, `sgst`, `cgst`, `net_payable_amount`,`discount_type`,`payment_status`) VALUES ('$ti','$cname','$cemail','$date','$ta','$dis','$sgst','$cgst','$tpa','$dc','$status')");

            if ($q3 > 0) {
                $_SESSION["tn"] = $_POST["table"];
                header("location: xeng.php");

    ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 <?php echo " Added To The Table Bill" ?><br>
             </div>
         <?php  } else { ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 <?php echo "We have found " . mysqli_error($con); ?><br>
             </div>
         <?php }
        } else { ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             <?php echo "There is not any pending bill on this Table id."; ?><br>
         </div><?php
            }
        }
                ?>
 <html lang="en">

 <head>
     <title>Generate Bill</title>
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
                                     <i class="fas fa-user me-2"></i><?php echo "Hello " . $n; ?>
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
                    <i class="fas fa-user-graduate p-2" aria-hidden="true"></i>Job Role</a>


                <a href="displayitemcatagory.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-th-large p-2" aria-hidden="true"></i>Category</a>

                <a href="menu.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-cutlery p-2" aria-hidden="true"></i>Items</a>

                <a href="rmsmanagetable.php" class="list-group-item list-group-item-action bg-transparent text-white second-text">
                    <i class="fa fa-braille p-2" aria-hidden="true"></i>Tables</a>


                <a href="displaytodaysorder.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-clipboard p-2" aria-hidden="true"></i>Orders</a>

                    <a href="dailyreport.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-bar-chart p-2" aria-hidden="true"></i>Instant Report</a>


                <a href="billgenerate.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-file-pdf-o p-2" aria-hidden="true"></i>Generate Bill</a>
 
                <a href="rmslogout.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                <i class="fa fa-sign-out p-2" aria-hidden="true"></i>Logout</a> 

            </div>
        </div>
        <!-- sidebar -->

         <div class="container-fluid">
             <center>
                 <div class="col-lg-6 mt-5">
                     <div class="card bg-white mb-3 text-center shadow p-3 mb-3 rounded h-50">
                         <div class="container-fluid mt-3">

                             <form action="" method="POST">
                                 <div class="mb-3">
                                     <label for="table" class="form-label">Select Table</label>
                                     <select class="form-select" name="table" required>
                                         <?php $tab = mysqli_query($con, "SELECT * FROM `rms_tables`");
                                            $k = 0;
                                            while ($ro = mysqli_fetch_array($tab)) {
                                                $id1 = $ro["id"];
                                                $name1 = $ro["name"];
                                            ?>
                                             <option value=<?php echo $id1; ?>><?php echo $name1; ?></option>'<?php }
                                                                                                            $k++; ?>

                                     </select>
                                 </div>
                                 <div class="mb-3 mt-3">
                                     <label for="name" class="form-label">Customer Name:</label>
                                     <input type="text" class="form-control" id="name" placeholder="Enter Customer Name" name="cn" required>
                                 </div>
                                 <div class="mb-3 mt-3">
                                     <label for="name" class="form-label">Customer Email:</label>
                                     <input type="text" class="form-control" id="name" placeholder="Enter Customer Email" name="ce">
                                 </div>
                                 <div class="mb-3">
                                     <label for="table" class="form-label">Select Discount</label>
                                     <select class="form-select" name="disc" required>
                                         <?php $tab = mysqli_query($con, "SELECT * FROM `rms_discount`");
                                            $k = 0;
                                            while ($ro = mysqli_fetch_array($tab)) {
                                                $id2 = $ro["id"];
                                                $name2 = $ro["name"];
                                            ?>
                                             <option value=<?php echo $id2;?>>
                                             <?php echo $name2; ?>
                                             </option><?php } $k++; ?>
                   

                                     </select>
                                 </div>
                                 <div class="row" style="margin-left:30px ;">
                                     <div class="form-group col-md-4 ml-5">
                                         <input type="submit" style="margin-left: 100px;" class="btn btn-success mt-3" name="submit" value="GENERATE">
                                     </div>
                             </form>
                             <a style="margin-left:80px ;" href="index.php" class="btn btn-success col-lg-2 mt-3" role="button">Back</a>
                         </div>
                     </div>
                 </div>
                </center>
         </div>
     </div>
 </body>

 </html>