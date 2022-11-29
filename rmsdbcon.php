<?php
 $host = "localhost";
 $username = "root";
 $pass = "";
 $db = "rms";
//query for connecting the file with database
 $con = mysqli_connect( $host,$username,$pass,$db);
//to check the connection 
//  if($con){
//      echo "connected to the database succesfull";
//  }
//  else{
//     die("sorry".mysqli_connect_error());
//  }
