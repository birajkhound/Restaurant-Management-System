<?php
include 'rmsdbcon.php';
session_start();
 if(isset($_SESSION["admin"])){
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
 }else{
    header("location:rmslogout.php");
}
 $d=date('y-m-d');
$_result = mysqli_query($con,"SELECT * FROM `rms_order`;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orders Of All Time</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text text-white" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo "Hello ".$i?>
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
<!-- <div class="container-fluid">
<div class="row g-3 my-2">
<div class="col-md-3"><h3>Order-Details</h3></div>
<div class="col-md">
<a href="displaytodaysorder.php" class="btn btn-success" role="button" style="margin-left: 950px;" >Back</a></div></div></div> -->

<div class="container-fluid">
        <div class="row g-3 my-2">
            <div class="col">
                <h3>Order-Details</h3>
            </div>
            <div class="col">
                <a href="displaytodaysorder.php" class="btn btn-success btn-lg-3" role="button" style="margin-left: 760px;">Back</a>
            </div>
        </div>
<!--  -->

<!-- ./ -->

<!-- table -->
<?php
if (mysqli_num_rows($_result)>0){
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
      <th scope="col">order-date</th>
      <th scope="col">payment-status</th>
    </tr>
  </thead>
  <?php
$i=0;
while($row1=mysqli_fetch_array($_result)){
    $ni=$row1["table_name"];
    $nq= mysqli_query($con, "SELECT * FROM `rms_tables` WHERE `id`='$ni'");
    $r = mysqli_fetch_array($nq);
    $ix = $r["name"];
    $nn= $row1["item"];
    $nh= mysqli_query($con, "SELECT * FROM `items` WHERE `id`='$nn'");
    $rx = mysqli_fetch_array($nh);
    $is = $rx["item_name"];
    ?>
    <tr>
    <td><?php echo $row1["id"];?></td>
    <td><?php echo $ix;?></td>
    <td><?php echo $is;?></td>
    <td><?php echo $row1["quantity"];?></td>
    <td><?php echo $row1["price"];?></td>
    <td><?php echo $row1["order_date"];?></td>
    <td><?php echo $row1["payment_status"];?></td>

    </tr>
    <?php
    $i++;
}
?>
</table>
</div>
<?php
}
else{
    echo"No Record Found";
}
?>
</table>
</body>
</html>
