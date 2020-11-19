<?php

/**
 * Plugin Name: Väderdata
 * Description: Ett plugin som hämtar väderdata för vald plats, som presenteras med lämpliga bilder och färger.
 * Version: 1.0
 * Author: David Kjellson
 **/

// Fetches weather data.
function get_weather_from_API()
{
  // Contains secret API Key.
  require 'secret.php';
  // Shows weather for Gbg.
  $url = 'http://api.openweathermap.org/data/2.5/weather?q=Gothenburg,Sweden&APPID=' . $API_KEY;
  $response = wp_remote_get($url);
  if (is_array($response)) {
    $header = $response['headers'];
    $body = $response['body'];
    $resp = json_decode($body);
    set_transient('get_weather_from_API', $resp, HOUR_IN_SECONDS);
  }
  return $resp;
}

// Shows weather data.
function show_weather()
{
  $resp = get_weather_from_db();
  if (!$resp) {
    $resp = get_weather_from_API();
  }
  $celsius = $resp->main->temp - 273.15;
  echo '<div style="display: flex;">Vädret i Göteborg är ' . $celsius . '°.';
  echo '<img src="http://openweathermap.org/img/wn/' . $resp->weather[0]->icon . '@2x.png"></div>';
}

function get_weather_from_db()
{
  return get_transient('get_weather_from_API');
}

function display_weather()
{
  $page = get_field('vaderdata');
  if ($page === is_product()) {
    add_action('woocommerce_single_product_summary', 'show_weather');
  } else if ($page === is_cart()) {
    add_action('woocommerce_before_cart_contents', 'show_weather');
  } else if ($page === is_checkout()) {
    add_action('woocommerce_before_checkout_billing_form', 'show_weather');
  } else if ($page === is_shop()) {
    add_action('woocommerce_before_shop_loop', 'show_weather');
  }
}

add_action('wp_head', 'display_weather');
