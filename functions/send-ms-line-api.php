<?php
 
$userId = "Ue217d8ff527b548487a39e9531c1dafd";
$access_token="5wqu3azcx5r+sUZ33uk/HHX005Tb9THOorY5icTJXaq+LaF78ijiG58toiGA0adcVGkw8z+s+nzmpwppDG64I6CboR7BtM9Z/qeUG37x7cA7gQRSNphxP74V6e1zPMxBMBUgohjEdiJqmTWCl2bHLgdB04t89/1O/w1cDnyilFU=";


$api_url = 'https://api.line.me/v2/bot/message/push';

  

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$data = [
    'to' =>  $userId , // Replace with the user's Line user ID
    'messages' => [
        [
            'type' => 'text',
            'text' => 'This is a push message from your PHP application!',
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
    echo 'Push message sent successfully!';
}