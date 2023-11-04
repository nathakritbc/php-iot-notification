<?php
// ใช้ shell_exec() เรียกคำสั่ง ifconfig เพื่อดึงข้อมูลเครือข่าย
$ifconfigOutput = shell_exec('ifconfig');

// แยกข้อมูลเครือข่ายออกจากผลลัพธ์ของ ifconfig
$ipAddress = '';
$subnetMask = '';
$gateway = '';

// ใช้ preg_match เพื่อค้นหาข้อมูลที่คุณต้องการ
if (preg_match('/inet (\d+\.\d+\.\d+\.\d+).+netmask (\d+\.\d+\.\d+\.\d+).+gateway (\d+\.\d+\.\d+\.\d+)/s', $ifconfigOutput, $matches)) {
    $ipAddress = $matches[1];
    $subnetMask = $matches[2];
    $gateway = $matches[3];
}

// แสดงข้อมูลที่ดึงมา
echo "IP Address: $ipAddress<br>";
echo "Subnet Mask: $subnetMask<br>";
echo "Gateway: $gateway<br>";
?>