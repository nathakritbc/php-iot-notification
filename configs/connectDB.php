<?php
$host = "localhost";
$username = "root";
$password = "Q2iji48vgn";
$database = "upssmart";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection

var_dump($conn);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}