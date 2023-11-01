<?php
$apiUrl = 'https://api.twilio.com/2010-04-01/Accounts/Your_Account_SID/Messages.json';
$authToken = '0veoo3d6iel4voub';

$data = array(
    'To' => 'whatsapp:+1234567890',  // Recipient's phone number
    'From' => 'whatsapp:+0987654321',  // Your WhatsApp Business phone number
    'Body' => 'Hello, this is a WhatsApp message from PHP.'
);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_USERPWD, "Your_Account_SID:$authToken");

$response = curl_exec($ch);
curl_close($ch);

echo "WhatsApp message sent successfully.";
?>