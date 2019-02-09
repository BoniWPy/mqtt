<?php

require_once 'vendor/autoload.php';

$server = "52.74.128.132";     // change if necessary
$port = 1883;                     // change if necessary
$client_id = "phpMQTT-publisher"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL)) {
	$mqtt->publish("pin", $_GET['message'] . ' ' . $_GET['value']);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
