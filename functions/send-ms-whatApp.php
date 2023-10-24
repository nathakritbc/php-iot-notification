<?php

$api_key = '51c9e9822527e2a0-fc3e88d40f9356d-341c1e08b811f98f';
$receiver_id = '+66649194885'; // รหัสผู้รับของ Viber User
// $receiver_id = '0649194885'; // รหัสผู้รับของ Viber User

$message = 'ข้อความที่คุณต้องการส่ง';

// $data = [
//     'recipient' => "$receiver_id",
//     'type' => 'text',
//     'text' => $message,
// ];

$data = [
    'recipient' => "viper",
    'content' => 'text', 
];

$post_data = json_encode($data);

// $api_url = 'https://chatapi.viber.com/pa/send_message';
$api_url="https://chatapi.viber.com/pa/send_message" ;

$ch = curl_init($api_url);

// $headers = [
//     'Content-Type: application/json',
//     'X-Viber-Auth-Token: ' . $api_key,
// ];

$headers = [
    'Content-Type: application/json',
    'Authorization: ' . "Bearer 51c9e9822527e2a0-fc3e88d40f9356d-341c1e08b811f98f",
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'เกิดข้อผิดพลาด: ' . curl_error($ch);
} else {
    echo 'ส่งข้อความสำเร็จ';
}

curl_close($ch);
?>