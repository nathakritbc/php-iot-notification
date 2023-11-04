<?php
$command = 'sudo /sbin/reboot';
$output = shell_exec($command);

if ($output !== null) {
    echo "Command executed: $output";
} else {
    echo "Command failed to execute.";
}
?>