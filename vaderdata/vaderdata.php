<?php

/**
 * Plugin Name: Väderdata
 * Description: Ett plugin som hämtar väderdata för vald plats, som presenteras med lämpliga bilder och färger.
 * Version: 1.0
 * Author: David Kjellson
 **/

// Fetches weather data.
function get_weather()
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
    $celsius = $resp->main->temp - 273.15;
    echo 'Vädret i Göteborg är: ' . $celsius . '°.';
    echo '<img src="http://openweathermap.org/img/wn/' . $resp->weather[0]->icon . '@2x.png">';
  }
}

// Shows weather data.
function show_weather()
{
  $get_weather = get_transient('get_weather');
  if ($get_weather) {
    set_transient('get_weather', 'weather', HOUR_IN_SECONDS);
  }
}

// ACF options
function acf_options()
{
  acf_add_options_page(array(
    'page_title' => 'Väderdata',
    'menu_title' => 'Väderdata'
  ));
}

function display_weather()
{
  $page = get_field('vaderdata');
  if ($page === is_product()) {
    add_action('woocommerce_single_product_summary', 'get_weather');
  }
}

add_action('acf/init', 'acf_options');
add_action('wp_head', 'display_weather');
