<?php
$host = "192.168.137.211";
$username = "root";
$password = "Q2iji48vgn";
$database = "upssmart";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}