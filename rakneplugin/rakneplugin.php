<?php

/**
 * Plugin Name: Räkneplugin
 * Description: Detta är ett plugin som erbjuder en räknefunktion: "is_seven_letters_long".
 * Version: 1.0
 * Author: David Kjellson
 **/

function is_seven_letters_long($seven)
{
  if (strlen($seven) === 7) {
    return true;
  } else {
    return false;
  }
}
