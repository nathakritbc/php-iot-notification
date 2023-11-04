<?php
$interface = 'eth0';
$ipAddress = '192.168.1.101';
$netmask = '255.255.255.0';

// คำสั่ง ifconfig เพื่อกำหนดที่อยู่ IP แบบคงที่
$command = "sudo ifconfig $interface $ipAddress netmask $netmask";

// ใช้ shell_exec() เรียกคำสั่ง
$result = shell_exec($command);

// แสดงผลลัพธ์
echo "<pre>$result</pre>";
?>