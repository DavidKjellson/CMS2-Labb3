<?php

/**
 * Plugin Name: Väderdata
 * Description: Ett plugin som hämtar väderdata för vald plats, som presenteras med lämpliga bilder och färger.
 * Version: 1.0
 * Author: David Kjellson
 **/

function test()
{
  echo "Test!";
}

add_action('woocommerce_single_product_summary', 'test');
