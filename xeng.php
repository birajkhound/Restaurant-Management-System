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
    if (isset($_SESSION["tn"])) {
        $ti = $_SESSION["tn"];
      }

   ?>
 <html lang="en">

 <head>
     <title>Print Bill</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>

 <body>
     <header>  
       <center>
                 <img src="images/food-mania-logo.png" width="180" height="60" class="d-inline-block align-top" alt="">     
                 </center> 
     </header>
<?php   $date =date('y-m-d');
        $status = "UNPAID";
        $q3 = mysqli_query($con, "SELECT * FROM `bill` WHERE `table_name`='$ti' and `date`='$date' and `payment_status`= '$status'");
        if (mysqli_num_rows($q3) > 0) {
            while($row = mysqli_fetch_array($q3)) {
                $bid = $row['id'] ;
                $btn1 = $row['table_name'];
                $btn2 = $row['customer_name'];
                $btn3 = $row['customer_email'];
                $btn4 = $row['date'];
                $btn5 = $row['total_amount'];
                $btn6 = $row['discount'];
                $btn7 = $row['sgst'];
                $btn8 = $row['cgst'];
                $btn9 = $row['net_payable_amount'];
               // echo " $bid $btn1 $btn2 $btn3 $btn4 $btn5 $btn6 $btn7 $btn8 $btn9";
                $q4 = mysqli_query($con, "UPDATE `bill` SET `payment_status`= 'PAID' WHERE `table_name`='$ti' and `date`='$date' ");
                $q5 = mysqli_query($con, "SELECT * FROM `rms_tables` WHERE `id`='$btn1';");
                $ru = mysqli_fetch_array($q5);
                $tab1 = $ru['name'];
            }?>
<div class="mx-5 my-5">
    <br>
 Bill Id :<?php echo $bid ?>
 <br>
 Table Name : <?php echo $tab1?>
 <br>
 Customer Name : <?php echo $btn2 ?>
 <br>
 Customer Email : <?php echo $btn3 ?>
 <br>
 Date : <?php echo $btn4 ?>
<br>
<?php 
    
$q1 = mysqli_query($con, "SELECT * FROM `rms_order` WHERE `table_name`='$ti' and `order_date`='$date' and `payment_status`= '$status'");

if (mysqli_num_rows($q1) > 0) {?>
    <table class="table">
    <thead>
    <tr>
    <td>Item Name</td>
    <td>Price</td>
    </tr>
</thead>
<?php
    while ($row1 = mysqli_fetch_array($q1)) {
        $p1 = $row1['price'];
        $in = $row1['item'];
        $oi = $row1['id'];
        $q6 = mysqli_query($con, "SELECT * FROM `items` WHERE `id` = $in");
        $rl = mysqli_fetch_array($q6);
        $t = $rl['item_name'];
       // echo "<br>";
       // echo " $p1 $in"; ?>
<tbody>
<tr>
    <td><?php echo $t;?></td>
    <td><?php echo $p1;?></td>
    </tr>
    </tbody>
<?php
        $q2 = mysqli_query($con, "UPDATE `rms_order` SET `payment_status`= 'PAID' WHERE `table_name`='$ti' and `order_date`='$date' ");
        $xs =  mysqli_query($con,"INSERT INTO `rms_has`(`order_id`, `table_id`) VALUES ('$oi','$ti')");
    }
}else{
    echo "there is no any Unpaid order on ";
}
?>
</table>
<br>
Purchase Amount(Rs.) :<?php  echo $btn5 ;?>
<br>
SGST(2.5%) : <?php  echo $btn7 ;?>
<br>
CGST(2.5%) : <?php  echo $btn8 ;?>
<br>
Discount(Rs.) : <?php  echo $btn6  ;?>
<br>
Payable Amount(Rs.) : <?php  echo  $btn9 ;?>
<br>
<?php }
else{
    echo "there is no any Unpaid order on selected table";
} ?>
 </div>
 <div class="row">
     <button onclick="window.print()" style="margin-left: 500px;" class="btn btn-success col-lg-1">Print</button>     
     <a href="index.php" class="btn btn-success col-lg-1" style="margin-left: 10px;" role="button">Home</a>
     </div></body>
 </html>