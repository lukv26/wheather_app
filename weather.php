<?php
require_once __DIR__.'/vendor/autoload.php';
use Jkanclerz\Weather\OpenWeatherApi;

$http = new \GuzzleHttp\Client();
$api = new OpenWeatherApi($http, 'af319cd969dff7d8c42768f6f0d8c979');

echo sprintf(
  'Teperature in %s is %s Celsius',
  $argv[1],
  $api->getCityTemperature($argv[1])
);
 
