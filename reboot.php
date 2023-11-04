<?php
$script_path = './reboot.sh';
$output = shell_exec($script_path);

if ($output !== null) {
    echo "Command executed: $output";
} else {
    echo "Command failed to execute.";
}
?>