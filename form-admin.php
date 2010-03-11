<?php if ( !empty($_POST['submit'] ) ) : ?>
  <div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>

<div class="wrap">
  <h2><?php _e('Magic Contact Configuration'); ?></h2>
  <div class="narrow magic_contact">
    <form action="" method="post" id="akismet-conf" style="margin: auto; width: 600px; ">
      
      <p><?php printf(__('For the correct operation of Magic Contact is necessary to verify some information')); ?></p>

      <p><h3>Settings mail</h3></p>
      
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
      
      
      <div class="clear"></div>
      <p><h3>Settings contact form</h3></p>
      
      
      <div class="contactleft">
        <label for="label_name_contact"><?php _e('Label for name'); ?></label>
      </div>
      
      <div class="contactright">
        <input id="label_name_contact" name="label_name_contact" type="text" class="magic_contact" value="<?php echo get_option('label_name_contact'); ?>" />
      </div>
      
      <div class="contactleft">
        <label for="label_email_contact"><?php _e('Label for Email'); ?></label>
      </div>
      
      <div class="contactright">
        <input id="label_email_contact" name="label_email_contact" type="text" class="magic_contact" value="<?php echo get_option('label_email_contact'); ?>" />
      </div>
      
      <div class="contactleft">
        <label for="label_website_contact"><?php _e('Label for Website'); ?></label>
      </div>
      
      <div class="contactright">
        <input id="label_website_contact" name="label_website_contact" type="text" class="magic_contact" value="<?php echo get_option('label_website_contact'); ?>" />
      </div>
      
      <div class="contactleft">
        <label for="label_feedback_contact"><?php _e('Label for Feedback'); ?></label>
      </div>
      
      <div class="contactright">
        <input id="label_feedback_contact" name="label_feedback_contact" type="text" class="magic_contact" value="<?php echo get_option('label_feedback_contact'); ?>" />
      </div>
      
      <div class="contactleft">
        <label for="label_send_contact"><?php _e('Label for button (send)'); ?></label>
      </div>
      
      <div class="contactright">
        <input id="label_send_contact" name="label_send_contact" type="text" class="magic_contact" value="<?php echo get_option('label_send_contact'); ?>" />
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
      
      <div class="clear"></div>
      <p><h3>Hide fields form</h3></p>
      
      <div class="contactleft">
        <label for="hide_email_contact"><?php _e('Hide Email field'); ?></label>
      </div>

      <div class="contactright">
        <input name="hide_email_contact" id="hide_email_contact" value="true" type="checkbox" <?php if ( get_option('hide_email_contact') == 'true' ) echo ' checked="checked" '; ?>
      </div>
      
      <div class="contactleft">
        <label for="hide_website_contact"><?php _e('Hide website field'); ?></label>
      </div>

      <div class="contactright">
        <input name="hide_website_contact" id="hide_website_contact" value="true" type="checkbox" <?php if ( get_option('hide_website_contact') == 'true' ) echo ' checked="checked" '; ?>
      </div>
      
      <div class="clear"></div>
      <p><h3>Side form</h3></p>
      
      <div class="contactleft">
        <label for="side_contact"><?php _e('Side Contact Form'); ?></label>
      </div>
      
      <div class="side_contact">
        <select name="side_contact" id="side_contact" >
          <option <?php if(get_option('side_contact') == 'left'){ echo 'selected="selected"'; } ?> value="left">Left</option>
          <option <?php if(get_option('side_contact') == 'right'){ echo 'selected="selected"'; } ?> value="right">Right</option>
        </select>
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