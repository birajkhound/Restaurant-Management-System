<?php
include 'rmsdbcon.php';
session_start();
 if(isset($_SESSION["admin"])){
  $user = $_SESSION["admin"];
  $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
  $row = mysqli_fetch_array($r);
  $i = $row["name"];
 }
 else{
    header("location:rmslogout.php");
}
?>
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
        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <p class="fs-5">
                            <h5>Profile</h5>
                            </p>
                        </div>
                        <a href="admindetails.php"><i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5"><h5>Job-Role</h5></p>
                        </div>
                       <a href="displayjobrole.php"> <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5"><h5>Staff</h5></p>
                        </div>
                       <a href="displaystaff.php"> <i class="far fa-id-card fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>

                            <p class="fs-5">
                            <h5>Category</h5>
                            </p>
                        </div>
                        <a href="displayitemcatagory.php">
                            <i class="fa fa-th-large fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">
                            <h5>Items</h5>
                            </p>
                        </div>
                        <a href="menu.php"> <i class="fa fa-cutlery fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">  <h5>Orders</h5>  </p>
                        </div>
                        <a href="displaytodaysorder.php"><i class="fa fa-clipboard fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">
                            <h5>Tables</h5>
                            </p>
                        </div>
                        <a href="rmsmanagetable.php"><i class="fa fa-braille fs-1 primary-text border rounded-full secondary-bg p-3"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">  <h5>Discount Details</h5> </p>
                        </div>
                      <a href="discountdetails.php"><i class="fa fa-file-text fs-1 primary-text border rounded-full secondary-bg p-3"></i></a> 
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">  <h5>Generate Bill</h5> </p>
                        </div>
                      <a href="billgenerate.php"><i class="	fa fa-file-pdf-o fs-1 primary-text border rounded-full secondary-bg p-3"></i></a> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">  <h5>Instant Report</h5> </p>
                        </div>
                      <a href="dailyreport.php"><i class="fa fa-bar-chart fs-1 primary-text border rounded-full secondary-bg p-3"></i></a> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-5">  <h5>Bill Details</h5> </p>
                        </div>
                      <a href="todaysbill.php"><i class="fa fa-archive fs-1 primary-text border rounded-full secondary-bg p-3"></i></a> 
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>