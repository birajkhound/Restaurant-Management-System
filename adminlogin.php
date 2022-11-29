<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["admin"])) {
  header("location:index.php");
}
include 'rmsdbcon.php';?>

        

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- for bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,900&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="styles.css" /> -->
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <title>Admin-Log-In</title>
  <style>
    .main {
      background-position: center;
      background-repeat: no-repeat;
      background-blend-mode: lighten;
      background-size: cover;
      /* opacity: 0.8; */
      z-index: -1;
      position: absolute;

    }
    .icon {
      padding: 10px;
      background: dodgerblue;
      color: white;
      min-width: 50px;
      text-align: center;
    }

    .input-container {
      display: -ms-flexbox;
      display: flex;
      width: 90%;
    }
  </style>
</head>

<body style="font-family: 'Merienda', cursive; font-family: 'Playfair Display', serif;">
  <!-- <div style=" background-image: url('images/backimg.jpg');"> -->

    <header>
      <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">

          <a class="navbar-brand px-3" href="#">
            <img src="images/food-mania-logo.png" width="150" height="50" class="d-inline-block align-top" alt="">
          </a>
          <nav class="navbar navbar-expand-sm me-4">
            <div class="container-fluid">
              <ul class="navbar-nav">
                <li class="nav-item">
                </li>
              </ul>
            </div>
          </nav>
      </nav>
    </header>
  <?php  if (isset($_POST['r6'])) {
  $username = strtoupper($_POST['r1']);
  $pass = $_POST['r2'];
  $qry = "SELECT * FROM `rms_admin` WHERE 	email  = '$username'";
  $rslt = mysqli_query($con, $qry);
  ;
  if (mysqli_num_rows($rslt)>0) {
    while($row = mysqli_fetch_array($rslt)){
    if ($row['password']==$pass){
        $_SESSION["admin"] = $row['id'];
        header("location:index.php");
      } else {?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div><?php echo $username . " your password is wrong"; ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div><?php
 } }}else {
 ?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
 <div><?php echo  "User Not Found"; ?></div>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
   }
 }?> 
    <!-- <div class="container bg-white">
      <form action="" method="post">
        <center>
          <h3>Log-In Here</h3>
        </center>
        <div class="mb-3">
          <label for="email">Usename:</label>
          <div class="input-container">
            <i class="fa fa-envelope icon"></i>

            <input type="email" class="form-control" id="email" placeholder="Enter Username" name="r1">
          </div>
        </div>
        <div class="mb-3">
          <label for="pwd">Password:</label>
          <div class="input-container">
            <i class="fa fa-key icon" aria-hidden="true"></i>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="r2">
          </div>
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" required> I am a human being.
          </label>
        </div>

        <center>
          <p> <input type="submit" value="Login" name="r6" class="btn-success"> </p>
        </center>
 -->

 <div class="main">
    <img style="width:100%; height:500px;" src="images/img/dish.jpeg">
  </div><br><br><br>
  <div style="background-color: ;" id="wrapper">
      <form action="" method="post">
      <div style="width:400px;margin-left:auto; margin-right:auto;" class="my-3 px-3 py-4 bg-light">
                <h5 style="font-family:'Courier New', font-size:18px;" class=" d-flex justify-content-center">
                    <i class="bi bi-person-plus-tick mb-3 fs-2 me-3"></i><b>Log-in Here</b>
                </h5>
        <div class="col-md mb-3">
          <label for="email">Usename:</label>
          <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input type="email" class="form-control" id="email" placeholder="Enter Username" name="r1">
          </div>
        </div>
        <div class="col-md mb-3">
          <label for="pwd">Password:</label>
          <div class="input-container">
            <i class="fa fa-key icon" aria-hidden="true"></i>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="r2">
          </div>
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" required> I am a human being.
          </label>
        </div>
      

        <center>
          <p> <input type="submit" value="Login" name="r6" class="btn-success"> </p>
        </center>
        </div>
      </form>
    </div>
  </div>
  <br>
  <br>
  <!-- footer part -->
  <footer class="footer bg-dark">
    <div class="">
      <div class="text-light">
        <div class="row p-3">
          <div class="col-6 payment-options">
            <h5>Payment Options</h5>
            <ul>
              <li>
                <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
              </li>
              <li>
                <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
              </li>
              <li>
                <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
              </li>
              <li>
                <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
              </li>
              <li>
                <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
              </li>
            </ul>
          </div>
          <div class="col-6 ">
            <h5>Address</h5>
            <p>Assam Trunk Rd,<br> opp. SBI Jorhat Main Branch,<br> Malow Ali, Jorhat,<br> Assam 785001 <br>Phone: +91 6000090117</p>

          </div>
        </div>

      </div>
  </footer>
</body>

</html>