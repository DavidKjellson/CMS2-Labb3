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
    <form action="<?php echo admin_url('admin-ajax.php'); ?>">
      <input type="text" name="namn">
      <input type="submit" value="Skicka">
      <input type="hidden" name="action" value="dk_contactform">
    </form>
  </div>
<?php }

function receivemessage()
{
  echo 'Tack för ditt meddelande ' . $_REQUEST['namn'] . '!';
  die();
  // die($_REQUEST['namn']);
}

function insertpost()
{
  // Skapa en post  
  // Namn, innehåll, avsändarens epost
  wp_insert_post(
    [
      'post_title' => 'Dave',
      'post_content' => 'Jag är bäst!!',
      'post_type' => 'meddelanden'
    ]
  );
}

add_action('wp_ajax_dk_contactform', 'receivemessage');

// Creates post types of messages.
function messages()
{
  register_post_type('meddelanden', [
    'labels' => [
      'name' => 'Meddelanden',
      'singular_name' => 'Meddelande'
    ],
    'public' => true,
    'has_archive' => true
  ]);
}

add_action('init', 'messages');
add_action('', 'insertpost');
// do_action('save_post_{$post->messages}');
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