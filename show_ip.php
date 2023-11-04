<?php
// รันคำสั่ง ifconfig wlan0 เพื่อดึงข้อมูลเครือข่ายสำหรับอินเตอร์เฟส wlan0
$ifconfigOutput = shell_exec('ifconfig wlan0');

// ใช้ preg_match เพื่อค้นหาเลข IP address จากผลลัพธ์ของ ifconfig
if (preg_match('/inet (\d+\.\d+\.\d+\.\d+)/', $ifconfigOutput, $matches)) {
    $ipAddress = $matches[1];
    echo "Your IP Address for wlan0 is: $ipAddress";
} else {
    echo "Unable to retrieve IP Address for wlan0.";
}
?>