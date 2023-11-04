<?php
// รันคำสั่ง ifconfig เพื่อดึงข้อมูลเครือข่าย
$ifconfigOutput = shell_exec('ifconfig');

// ใช้ preg_match เพื่อค้นหาเลข IP address จากผลลัพธ์ของ ifconfig
if (preg_match('/inet (\d+\.\d+\.\d+\.\d+)/', $ifconfigOutput, $matches)) {
    $ipAddress = $matches[1];
    echo "Your IP Address is: $ipAddress";
} else {
    echo "Unable to retrieve IP Address.";
}
?>