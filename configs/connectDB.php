<?php
// $host = "localhost";
// $username = "root";
// $password = "Q2ijj48vgn";
// $database = "upssmart";
// $port = "3306";
// // Create connection
// $conn = mysqli_connect($host, $username, $password, $database,$port);
// // Check connection

// // var_dump($conn);

// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

 
$host = "localhost";
$username = "root";
$password = "";
$database = "test";
$port = "3306";
// Create connection
$conn = mysqli_connect($host, $username, $password, $database,$port);
// Check connection

// var_dump($conn);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}