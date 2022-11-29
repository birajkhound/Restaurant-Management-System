<?php
include "rmsdbcon.php";
$q1 = mysqli_query($con, "SELECT * FROM `bill` WHERE `payment_status`= 'PAID' and `date`= CURRENT_DATE();");
session_start();
 if(isset($_SESSION["admin"])){
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
 }
 else{
    header("location:rmslogout.php");
}?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard</title>
</head>

<body>
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


 <center> 
 <div class="col-lg-6 mt-5">
    <div class="card bg-white mb-3 text-center shadow p-3 mb-3 rounded h-50">
    <p> <h3>Daily Sales Report</h3> 
<strong>(Till Current Time)</strong>
</p> <hr>
        <br>
        Date : <?php $date=date('y-m-d'); echo $date; ?><?PHP
$q2 = mysqli_query($con, "SELECT COUNT(id) FROM `rms_order` where `order_date` = CURRENT_DATE() and `payment_status` = 'PAID';");
$row1=mysqli_fetch_array($q2);

if(mysqli_num_rows($q1)>0){
    $p = 0; $q= 0;
 while($row=mysqli_fetch_array($q1)){
    $p1 = $row['net_payable_amount'];
    $in = $row['discount'];
    $p = $p + $p1 ;
    $q = $q + $in;
 }?>

                <br>
                Discount We Have Given Today(Rs.) : <?php echo $q; ?>
<br>
Cash We Have Earn Today(Rs.) : <?php  echo $p; ?>

<?PHP }?>
<br>
Total Number Of Orders We have served Today :  <?php echo $row1[0]; ?>
<br>
Reported By : <?php echo $i ;?>
</div></div>
</center> 
<center>
<a href="index.php" class="btn btn-success col-lg">Home</a>
<button onclick="window.print()" style="margin-left: 300px;" class="btn btn-success col-lg">Print</button>
</center>
</body>

</html>