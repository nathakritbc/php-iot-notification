<?php
// รับข้อมูล JSON จาก Webhook
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

// ตรวจสอบเหตุการณ์และรับ Recipient ID จากเหตุการณ์ "conversation_started"
if ($data['event'] === 'conversation_started') {
    $recipientId = $data['user']['id'];
    
    // ทำอะไรกับ Recipient ID ตามที่คุณต้องการ
    echo "Recipient ID: " . $recipientId;
}
?>