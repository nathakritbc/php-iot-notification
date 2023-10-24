<?php

function sendLineNotify($message, $accessToken) {
    $url = "https://notify-api.line.me/api/notify";
    $message = [
        "message" => $message,
    ];

    $headers = [
        "Content-Type: application/x-www-form-urlencoded",
        "Authorization: Bearer " . $accessToken,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($message));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if ($result === false) {
        echo "Line Notify Error: " . curl_error($ch);
    }

    curl_close($ch);

    return $result;
}


function sendLineNotifyWithFlex($message, $flexContent, $accessToken) {
    $url = 'https://notify-api.line.me/api/notify';
    
    $headers = [
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $accessToken,
    ];

    $messageData = [
        'message' => $message,
        'notificationDisabled' => false,
        'messageType' => 14, // 14 indicates a Flex Message
        'flexContent' => $flexContent,
    ];

    $postData = http_build_query($messageData);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Line Notify Error: ' . curl_error($ch);
    }

    curl_close($ch);

    return $response;
}

// Example Flex Message content
$flexMessage = [
    "type" => "flex",
    "altText" => "This is a Flex Message",
    "contents" => [
        "type" => "bubble",
        "body" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [
                [
                    "type" => "text",
                    "text" => "Hello, this is a Flex Message",
                    "weight" => "bold",
                    "size" => "lg"
                ]
            ]
        ]
    ]
];

// Convert the PHP array to a JSON string
$flexContent = json_encode($flexMessage);
 

$message = "Hello, this is a Line Notify notification from PHP!";
$accessToken = "YYROlJURuBnUg99K2l66p5gj6Mel2PnDNU4kGNPgRpj"; // Replace with your Line Notify access token

$response = sendLineNotify($message, $accessToken);

// $response2 = sendLineNotifyWithFlex($message,   $flexContent,  $accessToken);

// Handle the response (optional)
// You can inspect the $response variable to check if the notification was sent successfully.