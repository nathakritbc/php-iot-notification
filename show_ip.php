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
$ipconfigOutput = shell_exec('ipconfig /all');

// Extract and display DNS server information
if (preg_match_all('/DNS Servers.*?(\d+\.\d+\.\d+\.\d+)/s', $ipconfigOutput, $matches)) {
    $dnsServers = $matches[1];
    echo "DNS Servers:\n";
    foreach ($dnsServers as $server) {
        echo "$server\n";
    }
} else {
    echo "Unable to retrieve DNS server information.";
}
?>