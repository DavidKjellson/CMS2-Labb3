<?php

/**
 * Plugin Name: Testplugin/addon
 * Description: Test-pluginet innehåller en testfunktion för att testa räknefunktionen "is_seven_letters_long".
 * Version: 1.0
 * Author: David Kjellson
 **/

class TestCounter
{
  function testfunction($strangen_som_ska_testas, $forvantat_returvarde)
  {
    $testcount = new Counter();
    $isworking = $testcount->is_seven_letters_long($strangen_som_ska_testas);
    if ($isworking === $forvantat_returvarde) {
      echo '<p style="color: green;">Lyckat test!</p>';
    } else {
      echo '<p style="color: red;">Test misslyckades...</p>';
    }
  }

  function runtest()
  {
    $six = '123456';
    $seven = '1234567';
    $nine = '123456789';
    $this->testfunction($seven, true);
    $this->testfunction($six, false);
    $this->testfunction($nine, false);
  }

  public function __construct()
  {
    add_action('init', [$this, 'runtest']);
  }
}
$test = new TestCounter();
