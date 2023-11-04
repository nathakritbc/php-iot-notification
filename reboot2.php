<?php
$command = "sudo reboot";
$output = exec($command);

echo $output;