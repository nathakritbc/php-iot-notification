<?php
$command = 'sudo reboot';
$output = shell_exec($command);
echo "Rebooting server...";

// You can optionally add error handling to check if the command was executed successfully.
if ($output === null) {
    echo "Command failed to execute.";
} else {
    echo "Command executed successfully.";
}
?>