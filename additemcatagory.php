<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Item Catagory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
include 'rmsdbcon.php';
session_start();
if (isset($_SESSION["admin"])) {
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
}
else{
  header("location:rmslogout.php");
}
if (isset($_POST['submit'])) {
  $cat = strtoupper($_POST['catagory']);
  $sql = "INSERT INTO `item_catagory`(`name`, `manage_by`) VALUES ('$cat','$user')";
  $q = mysqli_query($con, $sql);
  if ($q > 0) {
?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <?php echo "Catagory Added Successfully"; ?><br>
    </div>
  <?php
  } else {
  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <?php echo "We have found " . mysqli_error($con); ?><br>
    </div>
<?php
  }
}

?>

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
  <!-- /header -->
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
        <h2>Add New Item Catagory</h2>
        <form action="" method="POST">

          <div class="mb-3 mt-3">
            <label for="item">Catagory Name:</label>
            <input type="text" class="form-control" id="item" placeholder="Enter Catagory Name" name="catagory" required>
          </div>
          <!-- <button type="submit" class="btn btn-primary">Save</button> -->
          <input type="submit" name="submit" value="Save" class="btn btn-success"></input>
          <!-- back-button -->
          <a href="displayitemcatagory.php" class="btn btn-success" role="button">Back</a>
        </form>
      </div>
</div></div>
</body>

</html>