<?php
header("Content-type: application/x-javascript");
if( file_exists('../../../wp-load.php') ) {
	require_once('../../../wp-load.php');
?>
jQuery(document).ready( function($){
    $('#mycontactform').contactable({
        name: 'Name',
        email: 'E-Mail',
        message : 'Message',
        recipient: '<?php echo get_option('recipient_contact'); ?>',
        subject: '<?php echo get_option('subject_contact'); ?>',
        label_name: '<?php echo get_option('label_name_contact'); ?>',
        label_email: '<?php echo get_option('label_email_contact'); ?>',
        label_website: '<?php echo get_option('label_website_contact'); ?>',
        label_feedback: '<?php echo get_option('label_feedback_contact'); ?>',
        label_send: '<?php echo get_option('label_send_contact'); ?>',
        recievedMsg : '<?php echo get_option('recievedMsg_contact'); ?>',
        notRecievedMsg : '<?php echo get_option('notRecievedMsg_contact'); ?>',
        disclaimer: '<?php echo get_option('disclaimer_contact'); ?>',
        hide_email: '<?php echo get_option('hide_email_contact'); ?>',
        hide_website: '<?php echo get_option('hide_website_contact'); ?>',
        side: '<?php echo get_option('side_contact'); ?>',
        fileMail : '<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."contactable/mail.php";?>'
    });
});

<?php } ?>