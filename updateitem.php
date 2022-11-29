<?php
include_once 'rmsdbcon.php';
session_start();
 if(isset($_SESSION["admin"])){
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
 }else{
    header("location:rmslogout.php");
}
if (count($_POST) > 0) {
    mysqli_query($con, "UPDATE `items` SET `item_name` ='" .strtoupper($_POST["name1"]) . "',`item_description`='" . $_POST["description"] ."' ,`item_price`= '" . $_POST["price"] ."',`item_catagory`= '" . $_POST["Item_catagory"] ."',`status`= '" . $_POST["status"] ."' WHERE id ='" . $_POST["item_id"] . "'");
    header("location:menucatagoriwise.php");
}
$result = mysqli_query($con, "SELECT * FROM `items` WHERE id ='". $_GET["id"]."'");
$row = mysqli_fetch_array($result);
$val= $row["item_catagory"];
$state = $row["status"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <i class="fa fa-logout p-2" aria-hidden="true"></i>Logout</a> 

            </div>
        </div>
        <!-- sidebar -->
        <div class="container-fluid">
<div class="container mt-3">
  <h2>Update Item Catagory</h2>
    <form name="" method="POST" action="">
    <div class="row">
        <input type="hidden" value="<?php echo $row["id"];?>" name="item_id">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Item Name:</label>
                <input type="text" class="form-control" id="name" value="<?php echo $row["item_name"];?>" name="name1">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Item Description:</label>
                <input type="description" class="form-control" id="description" value="<?php echo $row["item_description"];?>" name="description">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="price" class="form-control" id="price" value="<?php echo $row["item_price"];?>" name="price">
            </div>
            
            <div class="mb-3">
                <label for="catagory" class="form-label">Item_catagory:</label>
                  <select class="form-select" name="Item_catagory" required>
                  <?php $cat = mysqli_query($con,"SELECT * FROM `item_catagory`");
                  $k =0;
                  while($roww = mysqli_fetch_array($cat)){
                    $id = $roww["id"];
                    $name = $roww["name"];
            ?>
                   <option value="<?php echo $id;?>" <?PHP if($val == $id){ echo "selected";} ?>
                   ><?php echo $name;?></option>'<?php } 
                   $k++;?>
            
                  </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                  <select class="form-select" name="status">
                  <option <?PHP if($state == "Not Available"){ echo "selected";} ?>>Not Available</option>
                    <option <?PHP if($state == "Available"){ echo "selected";} ?>>Available</option>
                  </select>
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-success mt-3" value="Update">
    </form>
</div>
                  </div></div>
</body>
</html>