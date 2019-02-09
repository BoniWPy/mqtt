<?php

require_once 'vendor/autoload.php';

$server = "52.74.128.132";     // change if necessary
$port = 1883;                     // change if necessary
$client_id = "phpMQTT-publisher"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL)) {
  $data->pin = $_GET['pin'];
  $data->value = $_GET['value'];

  $mqtt->publish("pin", json_encode($data));
  $mqtt->close();

  $response->status = true;

} else {
  $response->status = false;
  $response->message = "Time out!";
}

echo json_encode($response);
