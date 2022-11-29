<?php
include_once'rmsdbcon.php';
session_start();
 if(isset($_SESSION["admin"])){
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
 }else{
    header("location:rmslogout.php");
}
if(count($_POST)>0){
    mysqli_query($con,"UPDATE `rms_admin` SET `name`='".$_POST["name"]."',`email`='".strtoupper($_POST["email"])."' ,`mobile_no`='".$_POST["mobile_no"]."',`gender`='".$_POST["Gender"]."',`address`='".$_POST["address"]."',password ='".$_POST["password"]."' WHERE 	id ='".$_POST["id"]."'");	 
    header("location:admindetails.php");
	$message="Record Modified Successfully";
}
$result= mysqli_query($con,"SELECT * FROM `rms_admin` WHERE id ='".$_GET["id"]."'");
$row = mysqli_fetch_array($result);
$gen = $row["gender"] ;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> -->
<!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,900&display=swap" rel="stylesheet">
	<title>Update Data</title>
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
                                    <i class="fas fa-user me-2"></i><?php echo "Hello ".$i ?>
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
  	<div><?php if (isset($message)){ echo $message;} ?></div>
  
  <div class="col-lg-6 mt-5 container-fluid">
            <div class="card bg-white mb-3 text-center shadow p-3 mb-3 rounded h-60">
			<h5 class='text-center'>Update Your Data</h5>
       
			<form action="" method="POST"> 
      <br>
            <input name='id' type="hidden" value="<?php echo $row['id'];?>">
            <div class="row">
                <div class="mb-3 ">
                    <label for="name"> Name:</label>
                    <input style="font-size: 12px;" class="input-group input-group-sm p-1" type="text" name="name" class="form-control" id="" required value="<?php echo $row["name"];?>">
                </div><br>
                <div class="form-group ">
                    <label for="email" class="">Email:</label>
                    <input style="font-size: 12px;" class="input-group input-group-sm p-1" type="email" name="email" class="form-control" id="" required value="<?php echo $row["email"];?>">
                </div>
<br>
                <div class="form-group ">
                    <label for="mobile_no" class="">Mobile Number:</label>
                    <input style="font-size: 12px;" class="input-group input-group-sm p-1" type="number" name="mobile_no" class="form-control" id="" required value="<?php echo $row["mobile_no"];?>">
                </div>
<br>
                <div class="form-group ">
                    <label for="Gender" class="">Gender:</label>
                    
                        Male<input type="radio" id="Gender" name="Gender" class="Gender" value="Male" <?php if($gen == "Male"){
                          echo "checked";
                        }
                        ?>>
                        Female<input type="radio" id="Gender" name="Gender" class="Gender" value="Female" <?php if($gen == "Female"){
                          echo "checked";
                        }?>>
                        Other<input type="radio" id="Gender" name="Gender" class="Gender" value="Other"  <?php if($gen == "Other"){
                          echo "checked";
                        }?>>
                        
                </div>
<br>
                <div class="form-group">
                    <label for="address" class="">Address :</label>
                    <input style="font-size: 12px;" class="input-group input-group-sm p-1" type="textarea" name="address" class="form-control" id="" value="<?php echo $row["address"];?>">
                </div>
<br>
                <div class="form-group">
                    <label for="password" class="">Password :</label>
                    <input style="font-size: 12px;" class="input-group input-group-sm p-1" type="textarea" name="password" class="form-control" id="" value="<?php echo $row["password"];?>">
                </div>
                                        
            </div>
                     <br>               
            <div class="row">
                <center>
                    <p> <input type="submit" value="Update Data" name="submit" class="btn-success col-lg-3"> </p>
                </center>
            </div>
            
        </form>
</div>
</div>

</body>
</html>
