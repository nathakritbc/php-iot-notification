<?php 
$channelAccessToken = '5wqu3azcx5r+sUZ33uk/HHX005Tb9THOorY5icTJXaq+LaF78ijiG58toiGA0adcVGkw8z+s+nzmpwppDG64I6CboR7BtM9Z/qeUG37x7cA7gQRSNphxP74V6e1zPMxBMBUgohjEdiJqmTWCl2bHLgdB04t89/1O/w1cDnyilFU=';
require '../vendor/autoload.php'; // Import Guzzle

$httpClient = new \GuzzleHttp\Client();

function findOneUser($data)   {
 
// $input = file_get_contents('php://input'); // รับข้อมูล JSON ที่ส่งมาจาก Line
// $data = json_decode($input, true);

// ตรวจสอบว่าข้อมูลมาจาก Line
if (isset($data['events'])) { 
    $userId = $data['events'][0]["source"]["userId"]; 
    return $userId;
} else {
    return 0;
}
}