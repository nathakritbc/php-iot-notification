<?php
$ssh_command = 'sudo reboot';
$output = shell_exec($ssh_command);

if ($output !== null) {
    echo "Command executed: $output";
} else {
    echo "Command failed to execute.";
}
?>