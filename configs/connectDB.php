<?php
$host = "127.0.0.1";
$username = "root";
$password = "Q2iji48vgn";
$database = "upssmart";
$port = "3306";
// Create connection
$conn = mysqli_connect($host, $username, $password, $database,$port);
// Check connection

var_dump($conn);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}