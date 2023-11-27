<?php

// รันคำสั่ง ifconfig eth0 เพื่อดึงข้อมูลเครือข่ายสำหรับอินเตอร์เฟส eth0
// $ifconfigOutput = shell_exec('ifconfig eth0');

// // ใช้ preg_match เพื่อค้นหาเลข IP address จากผลลัพธ์ของ ifconfig
// if (preg_match('/inet (\d+\.\d+\.\d+\.\d+)/', $ifconfigOutput, $matches)) {
//     $ipAddress = $matches[1];
//     echo "Your IP Address for eth0 is: $ipAddress";
// } else {
//     echo "Unable to retrieve IP Address for eth0.";
// }

 


// // รันคำสั่ง ifconfig wlan0 เพื่อดึงข้อมูลเครือข่ายสำหรับอินเตอร์เฟส wlan0
$ifconfigOutput = shell_exec('ifconfig wlan0');
$ipAddress="";
$netmask="";

// ใช้ preg_match เพื่อค้นหาเลข IP address จากผลลัพธ์ของ ifconfig
// if (preg_match('/inet (\d+\.\d+\.\d+\.\d+)/', $ifconfigOutput, $matches)) {
//     $ipAddress = $matches[1];
//     echo "Your IP Address for wlan0 is: $ipAddress";
// } else {
//     echo "Unable to retrieve IP Address for wlan0.";
// }

// if (preg_match('/netmask (\d+\.\d+\.\d+\.\d+)/', $ifconfigOutput, $matches)) {
//     $netmask = $matches[1];
//     echo "Your IP Address for wlan0 is: $netmask";
// } else {
//     echo "Unable to retrieve IP Address for wlan0.";
// } 
// รันคำสั่ง ip route เพื่อดึงข้อมูลเส้นทางและ Default Gateway
// $ipRouteOutput = shell_exec('ip route');

// // ใช้ preg_match เพื่อค้นหา Default Gateway จากผลลัพธ์ของ ip route
// if (preg_match('/default via (\d+\.\d+\.\d+\.\d+)/', $ipRouteOutput, $matches)) {
//     $defaultGateway = $matches[1];
//     echo "Default Gateway IP Address: $defaultGateway";
// } else {
//     echo "Unable to retrieve Default Gateway IP Address.";
// } 

 
// Execute the command to get DNS server information using ipconfig
 
// Execute the command to read the DNS configuration from /etc/resolv.conf
 
// Execute the command to read the DNS configuration from /etc/resolv.conf on Linux/Unix-like systems
// $dnsConfig = shell_exec('cat /etc/resolv.conf');

// // Extract and display the first DNS server IP address
// if (preg_match('/nameserver\s+(\d+\.\d+\.\d+\.\d+)/', $dnsConfig, $matches)) {
//     $dnsServer = $matches[1];
//     echo "DNS Server IP Address: $dnsServer";
// } else {
//     echo "Unable to retrieve DNS server information.";
// }
 
// รันคำสั่ง ifconfig เพื่อดึงข้อมูลเครือข่าย
 
// อ่านเนื้อหาของไฟล์ /etc/network/interfaces
// Get the user's IP address from X-Forwarded-For header
$userIP = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

// Display the IP address
echo "Your IP Address is: " . $userIP;
?>