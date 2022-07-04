<?php
    $command = escapeshellcmd('python automation.py');
    $output = shell_exec($command);
    echo $output;
?>