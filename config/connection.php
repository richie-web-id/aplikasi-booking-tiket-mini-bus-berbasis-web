<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "mini_bus";

$koneksi = mysqli_connect($hostname,$username,$password,$db_name);

if (mysqli_connect_errno()) 
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>