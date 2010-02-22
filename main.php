<?php
/*
Plugin Name: Magic Contact
Plugin URI: http://hunk.com.mx
Description: Another contact plugin, After enabling this plugin visit <a href="options-general.php?page=magic-contact.php">the options page</a> to configure code style.
Version: 0.1
Author: hunk
Author URI: http://hunk.com.mx
License: A "Slug" license name e.g. GPL2
*/

register_activation_hook( dirname(__FILE__) . '/main.php', 'magic_contact_activate' );

function magic_contact_activate(){
  if(!get_option('init_contact')){
    update_option( 'recipient_contact', get_bloginfo('admin_email') );
    update_option( 'subject_contact', 'A contactable message' );
    update_option( 'recievedMsg_contact', 'Thank you for your message' );
    update_option( 'notRecievedMsg_contact', 'Sorry, your message could not be sent, try again later' );
    update_option( 'disclaimer_contact', 'Please feel free to get in touch, we value your feedback' );
    
    update_option( 'init_contact', 1 );
 }
}

// Add action links
add_action('plugin_action_links_' . plugin_basename(__FILE__), 'AddPluginActions');

function AddPluginActions($links) {
   $new_links = array();

   $new_links[] = '<a href="options-general.php?page=magic-contact.php">' . __('Settings') . '</a>';

   return array_merge($new_links, $links);
 }

add_action('admin_menu', 'mc_admin_actions');

function mc_admin_actions(){
  add_options_page("Magic Contact", "Magic Contact", 'manage_options',"magic-contact.php", "magic_contact_menu");
}

function magic_contact_menu(){   
  if ( isset($_POST['submit']) ) {
    if ( function_exists('current_user_can') && !current_user_can('manage_options') )
  	  die(__('Cheatin&#8217; uh?'));
  		
  	update_option( 'recipient_contact', $_POST['recipient_contact'] );
  	update_option( 'subject_contact', $_POST['subject_contact'] );
  	update_option( 'recievedMsg_contact', $_POST['recievedMsg_contact'] );
  	update_option( 'notRecievedMsg_contact', $_POST['notRecievedMsg_contact'] );
  	update_option( 'disclaimer_contact', $_POST['disclaimer_contact'] );
  }
  include 'form-admin.php';
}

add_action('template_redirect', 'script_magic_contact');

function script_magic_contact(){

  $base = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); 
  
  wp_enqueue_script( 'jquery.contactable', $base . 'contactable/jquery.contactable.js', array('jquery') , 3.1);
  wp_enqueue_script( 'jquery.validate', $base . 'contactable/jquery.validate.pack.js', array('jquery') , 3.1);
  wp_enqueue_script( 'my_contactable', $base . 'my.contactable.php', array('jquery') , 3.1);
  wp_enqueue_style( 'contactable', $base . 'contactable/contactable.css' );
  
}

add_action('wp_footer','div_magic_contact');

function div_magic_contact(){
  echo '<div id="mycontactform"> </div>';
}

?>