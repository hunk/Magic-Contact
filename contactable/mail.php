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

        $output = preg_replace($search, '', $input);
        return trim($output);
    }
    
  	
	  //declare our assets 
	  $name       = esc_attr(cleanInput($_POST['name']));
	  $emailAddr  = sanitize_email($_POST['email']);
	  $comment    = esc_attr(cleanInput($_POST['comment']));
	  $subject    = esc_attr(cleanInput($_POST['subject']));	
	  $website    = sanitize_url($_POST['website']);
	  $contactMessage = "Message: $comment \r \n From: $name \r \n Website: $website \r \n Reply to: $emailAddr";

	  //validate the email address on the server side
	  if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailAddr) ) {
		  //if successful lets send the message
			$send = wp_mail(get_option('recipient_contact'), $subject, $contactMessage);
		  if($send){
		    echo('success'); //return success callback
	    }else{
	      echo('no send');
	    }
	  }else{
		  echo('An invalid email address was entered'); //email was not valid
	  }
	}
?>