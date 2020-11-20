<?php

/**
 * Plugin Name: Kontaktformulär
 * Description: Detta plugin skall kunna skriva ut ett kontaktformulär.
 * Version: 1.0
 * Author: David Kjellson
 **/
class Contact
{
  function contact()
  { ?>
    <div class="container">
      <form action="<?php echo admin_url('admin-ajax.php'); ?>">
        <label for="namn">Namn</label>
        <input type="text" name="namn">
        <label for="email">E-post</label>
        <input type="email" name="email">
        <label for="meddelande">Meddelande</label>
        <input type="text" name="meddelande">
        <input type="submit" value="Skicka">
        <input type="hidden" name="action" value="dk_contactform">
      </form>
    </div>
<?php
    if (isset($_REQUEST['sent'])) {
      echo 'Tack för ditt meddelande!';
    }
  }

  function insertpost()
  {
    $post_id = wp_insert_post(
      [
        'post_title' => $_REQUEST['namn'],
        'post_content' => $_REQUEST['meddelande'],
        'post_type' => 'meddelanden'
      ]
    );
    update_post_meta($post_id, 'e-post', $_REQUEST['email']);
    wp_redirect($_SERVER['HTTP_REFERER'] . '?sent=true');
    die();
  }

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

  public function __construct()
  {
    add_action('init', [$this, 'messages']);
    add_action('wp_ajax_dk_contactform', [$this, 'insertpost']);
    add_action('woocommerce_after_main_content', [$this, 'contact']);
  }
}
$contact = new Contact();
?>

<style>
  input[type=text],
  input[type=email],
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