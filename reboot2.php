<?php
$ssid = "GuGa";
$password = "*9876543210";

$command = "nmcli device wifi connect '$ssid' password '$password'";
$output = shell_exec($command);

if ($output !== null) {
    echo "Command output: $output";
} else {
    echo "Error executing the command.";
}
?>