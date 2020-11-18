<?php

/**
 * Plugin Name: Väderdata
 * Description: Ett plugin som hämtar väderdata för vald plats, som presenteras med lämpliga bilder och färger.
 * Version: 1.0
 * Author: David Kjellson
 **/
function get_weather()
{
  include 'secret.php';
  $url = 'http://api.openweathermap.org/data/2.5/weather?q=Gothenburg,Sweden&APPID=' . $API_KEY;
  $response = wp_remote_get($url);
  if (is_array($response)) {
    $header = $response['headers'];
    $body = $response['body'];
    $resp = json_decode($body);
    $celsius = $resp->main->temp - 273.15;
    echo 'Vädret i Göteborg är: ' . $celsius . '°.';
    echo '<img src="http://openweathermap.org/img/wn/' . $resp->weather[0]->icon . '@2x.png">';
  }
}

add_action('woocommerce_single_product_summary', 'get_weather');
