<?php
include_once('./include/session.php');

$configFile = 'config.ini';

$configString = file_get_contents($configFile);
$configBlocks = parse_ini_string($configString, true);

// Update the appropriate block in the config array with the values submitted in the form
foreach ($_POST as $blockName => $blockSettings) {
    foreach ($blockSettings as $key => $value) {
        $configBlocks[$blockName][$key] = $value;
    }
}

// Generate the INI string from the updated config array
$iniString = '';

foreach ($configBlocks as $blockName => $blockSettings) {
    $iniString .= "[{$blockName}]\n";

    foreach ($blockSettings as $key => $value) {
        $iniString .= "{$key} = {$value}\n";
    }

    $iniString .= "\n";
}

// Write the updated INI string back to the config file
file_put_contents($configFile, $iniString);

header('Location: config-manager.php');