<?php
$command = 'sudo reboot';
$output = exec($command);

if ($output !== null) {
    echo "Command executed: $output";
} else {
    echo "Command failed to execute.";
}
?>