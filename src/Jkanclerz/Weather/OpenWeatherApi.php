<?php

namespace Jkanclerz\Weather;

class OpenWeatherApi implements CurrentWeather
{
  const END_POINT = 'http://api.openweathermap.org/data/2.5/weather';
  private $apiKey;
  private $http; 
  public function __construct($http, $apiKey)
  {
     $this->apiKey = $apiKey;
     $this->http = $http;
  }  

  public function getCityTemperature($city)
  {
    $weatherUrl = sprintf(
      '%s?q=%s&APPID=%s&units=metric',
      self::END_POINT,
      $city,
      $this->apiKey
    );

    $weatherData = json_decode(
      $this->http->request('GET', $weatherUrl)->getBody(),
      true
    );
    
    return $weatherData['main']['temp'];
  }
}
 
