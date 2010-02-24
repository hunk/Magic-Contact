<?php
  if( file_exists('../../../../wp-load.php') ) {
  	require_once('../../../../wp-load.php');
  	
  	//funtion clean script/html	
  	function cleanInput($input) {
      $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
      );
      return trim(preg_replace($search, '', $input));
    }
    
  	
	  //declare our assets 
	  $name       = esc_attr(cleanInput($_POST['name']));
	  $emailAddr  = sanitize_email($_POST['email']);
	  $comment    = esc_attr(cleanInput($_POST['comment']));
	  $subject    = esc_attr(cleanInput($_POST['subject']));	
	  $website    = sanitize_url($_POST['website']);
	  $contactMessage = "Message: $comment \r \n From: $name ";
	  if($website != 'http://nothing' ) $contactMessage .= "\r \n Website: $website";
	  if($emailAddr) $contactMessage .= "\r \n Reply to: $emailAddr";
    
    if($emailAddr){
      if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailAddr) ) {
        echo('An invalid email address was entered');
        exit();
      }
    }
    
		$send = wp_mail(get_option('recipient_contact'), $subject, $contactMessage);
		if($send) echo('success'); //return success callback
	  else echo('no send');
	}
?>