<?php
 

include_once("findUserIdLineMSAPI.php");
$input = file_get_contents('php://input'); // รับข้อมูล JSON ที่ส่งมาจาก Line
$data = json_decode($input, true);

 $userId = findOneUser($data);

 echo $userId;