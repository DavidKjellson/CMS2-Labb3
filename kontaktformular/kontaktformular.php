<?php

/**
 * Plugin Name: Kontaktformulär
 * Description: Detta plugin skall kunna skriva ut ett kontaktformulär.
 * Version: 1.0
 * Author: David Kjellson
 **/

function contact()
{ ?>
  <div class="container">
    <form action="/action_page.php">
      <label for="name">Namn</label>
      <input type="text" id="name" name="firstname" placeholder="Namn" value="<?php isset($_POST['name']); ?>">

      <label for="email">E-mail</label>
      <input type="text" name="email" id="email" placeholder="E-mail" value="<?php isset($_POST['email']); ?>">

      <label for="message">Meddelande</label>
      <textarea id="message" name="message" placeholder="Meddelande" value="<?php isset($_POST['message']); ?>" style="height:200px"></textarea>

      <input type="submit" name="submit" value="Skicka">
    </form>
  </div>
<?php }

// Creates post types of messages.
function messages()
{
  register_post_type('meddelanden', [
    'labels' => [
      'name' => __('Meddelanden'),
      'singular_name' => __('Meddelande')
    ],
    'public' => true,
    'has_archive' => true
  ]);
}

add_action('init', 'messages');
add_action('woocommerce_after_main_content', 'contact'); ?>

<style>
  input[type=text],
  select,
  textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
</style>