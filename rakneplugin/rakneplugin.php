<?php

/**
 * Plugin Name: Räkneplugin
 * Description: Detta är ett plugin som erbjuder en räknefunktion: "is_seven_letters_long".
 * Version: 1.0
 * Author: David Kjellson
 **/

class Counter
{
  function is_seven_letters_long($seven)
  {
    if (strlen($seven) === 7) {
      return true;
    } else {
      return false;
    }
  }
  public function __construct()
  {
    add_action('wp_footer', [$this, 'is_seven_letters_long']);
  }
}

$counter = new Counter();
