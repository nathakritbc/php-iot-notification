<?php

$access_token = '5wqu3azcx5r+sUZ33uk/HHX005Tb9THOorY5icTJXaq+LaF78ijiG58toiGA0adcVGkw8z+s+nzmpwppDG64I6CboR7BtM9Z/qeUG37x7cA7gQRSNphxP74V6e1zPMxBMBUgohjEdiJqmTWCl2bHLgdB04t89/1O/w1cDnyilFU=';
include_once("findUserIdLineMSAPI.php");

$input = file_get_contents('php://input'); // รับข้อมูล JSON ที่ส่งมาจาก Line
$data = json_decode($input, true);
 

 $userId = findOneUser($data);

// $reply_token = 'REPLY_TOKEN_FROM_INCOMING_MESSAGE';
$reply_token = $data['events'][0]['replyToken'];

$api_url = 'https://api.line.me/v2/bot/message/reply';

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$data = [
    'replyToken' => $reply_token,
    'messages' => [
        [
            'type' => 'text',
            'text' => "Hello, this is a reply message from your PHP application! userId : {$userId}"  ,
        ],
    ],
];

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

// You can check the response for any errors
if ($result === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    echo 'Message sent successfully!';
}