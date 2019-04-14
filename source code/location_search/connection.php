<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "appfuiua_mukta";
  $dbpass = "2lH3G1E*[^*)";
  $dbname = "appfuiua_rover";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
    }
    
?>