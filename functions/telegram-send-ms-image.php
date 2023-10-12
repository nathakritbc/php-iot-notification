<?php
$token = '6490529602:AAE-zLE1-WuKg00k0mXlAl01ZC3_TPjEJ14';
$chatId = '1322124126';  
 

$stickerPath = '../download.jpg';
 

$telegramUrl = "https://api.telegram.org/bot$token/sendSticker";

$data = [
    'chat_id' => $chatId,
    'sticker' => new CURLFile(realpath($stickerPath)),
];

$ch = curl_init($telegramUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    echo 'Error sending the sticker.';
} else {
    echo 'Sticker sent successfully.';
}
?>