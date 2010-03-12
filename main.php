<?php
/*
Plugin Name: Magic Contact
Plugin URI: http://blog.hunk.com.mx/magic-contact/
Description: is a simple and Elegant contact form for Wordpress, taking as it bases to <a href="http://theodin.co.uk/blog/ajax/contactable-jquery-plugin.html">Contactable</a> (jQuery Plugin) By <a href="http://theodin.co.uk/">Philip Beel</a>, After enabling this plugin visit <a href="options-general.php?page=magic-contact.php">the options page</a> to configure settings of sending mail.
Version: 0.1
Author: Hunk
Author URI: http://hunk.com.mx

Copyright 2010  Edgar G (email : ing.edgar@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

register_activation_hook( dirname(__FILE__) . '/main.php', 'magic_contact_activate' );

function magic_contact_activate(){
  if(!get_option('init_contact')){
    update_option( 'recipient_contact', get_bloginfo('admin_email') );
    update_option( 'subject_contact', 'A contactable message' );
    
    update_option( 'label_name_contact', 'Name' );
    update_option( 'label_email_contact', 'E-Mail' );
    update_option( 'label_website_contact', 'Website' );
    update_option( 'label_feedback_contact', 'Your Feedback' );
    update_option( 'label_send_contact', 'SEND' );
    update_option( 'recievedMsg_contact', 'Thank you for your message' );
    update_option( 'notRecievedMsg_contact', 'Sorry, your message could not be sent, try again later' );
    update_option( 'disclaimer_contact', 'Please feel free to get in touch, we value your feedback' );
    
    update_option( 'hide_email_contact', 'false' );
    update_option( 'hide_website_contact', 'false' );
    
    update_option( 'side_contact', 'left' );
    
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
  	
  	update_option( 'label_name_contact', $_POST['label_name_contact'] );
    update_option( 'label_email_contact', $_POST['label_email_contact'] );
    update_option( 'label_website_contact', $_POST['label_website_contact'] );
    update_option( 'label_feedback_contact', $_POST['label_feedback_contact'] );
    update_option( 'label_send_contact', $_POST['label_send_contact'] );
    update_option( 'recievedMsg_contact', $_POST['recievedMsg_contact'] );
  	update_option( 'notRecievedMsg_contact', $_POST['notRecievedMsg_contact'] );
  	update_option( 'disclaimer_contact', $_POST['disclaimer_contact'] );
  	
  	if ( isset( $_POST['hide_email_contact'] ) ) update_option( 'hide_email_contact', 'true' ); else update_option( 'hide_email_contact', 'false' );
		if ( isset( $_POST['hide_website_contact'] ) ) update_option( 'hide_website_contact', 'true' ); else update_option( 'hide_website_contact', 'false' );
    
    update_option( 'side_contact', $_POST['side_contact'] );
    
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