<?php
// Your Viber bot's access token
$accessToken = '51c9e9822527e2a0-fc3e88d40f9356d-341c1e08b811f98f';

// Recipient user's ID
$recipient = '0611033102';

// Message content
$message = [
    'type' => 'text',
    'text' => 'Hello from your Viber bot!',
];

// Prepare the message data
$data = [
    'receiver' => $recipient,
    'type' => 'text',
    'text' => 'Hello from your Viber bot!',
];

// Convert the message data to JSON
$jsonData = json_encode($data);

// Viber REST API URL
$apiUrl = 'https://chatapi.viber.com/pa/send_message';

// Create cURL request
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-Viber-Auth-Token: ' . $accessToken,
]);

// Execute the cURL request
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Check the response
if ($response) {
    // Message sent successfully
    echo "Message sent successfully!";
} else {
    // There was an error
    echo "Error sending message.";
}
?>