<?php
$token = '6647740488:AAHTtivYIHiR3-S-vVsHlqVzWlmYGloCJfE';
$chatId = '6710994547';  

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