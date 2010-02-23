<?php if ( !empty($_POST['submit'] ) ) : ?>
  <div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>

<div class="wrap">
  <h2><?php _e('Magic Contact Configuration'); ?></h2>
  <div class="narrow magic_contact">
    <form action="" method="post" id="akismet-conf" style="margin: auto; width: 600px; ">
      <p><?php printf(__('For the correct operation of Magic Contact is necessary to verify some information')); ?></p>

      <div class="contactleft">
        <label for="recipient_contact"><?php _e('Recipient of the email'); ?></label>
      </div>
      <div class="contactright">
        <input id="recipient_contact" name="recipient_contact" type="text" class="magic_contact" value="<?php echo get_option('recipient_contact'); ?>" />
      </div>

      <div class="contactleft">
        <label for="subject_contact"><?php _e('Subject for email'); ?></label>
      </div>
      <div class="contactright">
        <input id="subject_contact" name="subject_contact" type="text" class="magic_contact" value="<?php echo get_option('subject_contact'); ?>" />
      </div>

      <div class="contactleft">
        <label for="recievedMsg_contact"><?php _e('Recieved message'); ?></label>
      </div>
      <div class="contactright">
        <input id="recievedMsg_contact" name="recievedMsg_contact" type="text" class="magic_contact" value="<?php echo get_option('recievedMsg_contact'); ?>" />
      </div>

      <div class="contactleft">
        <label for="notRecievedMsg_contact"><?php _e('Not recieved messsage'); ?></label>
      </div>
      <div class="contactright">
        <input id="notRecievedMsg_contact" name="notRecievedMsg_contact" type="text" class="magic_contact" value="<?php echo get_option('notRecievedMsg_contact'); ?>" />
      </div>

      <div class="contactleft">
        <label for="disclaimer_contact"><?php _e('disclaimer'); ?></label>
      </div>
      <div class="contactright">
        <input id="disclaimer_contact" name="disclaimer_contact" type="text" class="magic_contact" value="<?php echo get_option('disclaimer_contact'); ?>" />
      </div>

	    <div class="contactright">
	      <input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" />
	    </div>
    </form>
  </div>
</div>

<style>
input.magic_contact{
width:300px;
}
.contactleft {
clear:both;
display:inline;
float:left;
margin:4px 0;
padding:4px;
text-align:right;
width:25%;
}
.contactright {
display:inline;
float:right;
padding:4px;
text-align:left;
width:70%;
}
</style>