<?php
$loader = require dirname(__DIR__, 1) . '/vendor/autoload.php';
if (sizeof($argv) == 3) {
    $folderName = $argv[1];
    $fileName = $argv[2];
    try {
        require_once ucfirst($folderName) . '/' . $fileName . '.php';
    } catch (Exception $ex) {
        echo 'File Not Found: ' .
            ucfirst($folderName) .
            '/' .
            $fileName .
            '.php' .
            PHP_EOL;
    }
} else {
    echo 'Missing folder or file name' . PHP_EOL;
}
