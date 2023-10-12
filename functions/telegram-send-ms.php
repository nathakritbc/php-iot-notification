<?php
$token = '6490529602:AAE-zLE1-WuKg00k0mXlAl01ZC3_TPjEJ14';
$chatId = '1322124126'; // The chat ID of the user or group you want to send a message to.
$message = 'สวัสดีครับ Hello, this is a message from your bot!';

$telegramUrl = "https://api.telegram.org/bot$token/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
];

$stickerPath = '../dow';

$ch = curl_init($telegramUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Message sent!';
}
?>