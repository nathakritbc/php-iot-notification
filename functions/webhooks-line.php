<?php  

require '../vendor/autoload.php'; // Import Guzzle

$httpClient = new \GuzzleHttp\Client();
$channelAccessToken = '5wqu3azcx5r+sUZ33uk/HHX005Tb9THOorY5icTJXaq+LaF78ijiG58toiGA0adcVGkw8z+s+nzmpwppDG64I6CboR7BtM9Z/qeUG37x7cA7gQRSNphxP74V6e1zPMxBMBUgohjEdiJqmTWCl2bHLgdB04t89/1O/w1cDnyilFU=';

$input = file_get_contents('php://input'); // รับข้อมูล JSON ที่ส่งมาจาก Line
$data = json_decode($input, true);
 

// ตรวจสอบว่าข้อมูลมาจาก Line
if (isset($data['events'])) {
    // foreach ($data['events'] as $event) {
    //     if ($event['type'] === 'message' && $event['message']['type'] === 'text') {
    //         // $text = $event['message']['text'];
    //         // $userId = $event['source']['userId'];

    //         // // ประมวลผลข้อความ
    //         // // ในตัวอย่างนี้เราจะเพียงแสดงข้อความที่ได้รับ
    //         // echo "User ID: $userId\n";
    //         // echo "Message: $text\n";
    //         echo  $event['type'];
    //     }
    // }
//    echo var_dump($data['events']);
    // $userId = $data['events'][0]["source"]["userId"];
    $jsonData = json_encode($data['events'][0] );

    echo $jsonData; 
    // echo $userId;
} else {
    echo 'ไม่พบข้อมูลจาก Line';
}