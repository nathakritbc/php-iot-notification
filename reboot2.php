<?php
$ssid = "GuGa";
$password = "*9876543210";

$command = "nmcli dev wifi connect 'A71D15B' password 'wroi5742' ";
$output = shell_exec($command);

if ($output !== null) {
    echo "Command output: $output";
} else {
    echo "Error executing the command.";
}
?>