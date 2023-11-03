<?php
$token = '6490529602:AAE-zLE1-WuKg00k0mXlAl01ZC3_TPjEJ14';

$phone = '0611033102';  // ใส่หมายเลขโทรศัพท์เซลล์ที่คุณต้องการส่งไป

$message = 'สวัสดีจาก PHP!';

$apiUrl = "https://api.telegram.org/bot$token/sendMessage?chat_id=$phone&text=" . urlencode($message);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// ตรวจสอบคำตอบจาก Telegram API
if ($response === false) {
    echo "ส่งข้อความผิดพลาด: " . curl_error($ch);
} else {
    echo "ส่งข้อความสำเร็จ!";
}
?>