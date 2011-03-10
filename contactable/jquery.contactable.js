/*
 * contactable 1.2.1 - jQuery Ajax contact form
 *
 * Copyright (c) 2009 Philip Beel (http://www.theodin.co.uk/)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Revision: $Id: jquery.contactable.js 2010-01-18 $
 *
 */
 
//extend the plugin
(function($){


  if (window.location.hash) {
    if(window.location.hash == '#contact'){
      	setTimeout(function(){$("body").prepend('<div class="m-overlay"></div>');$('div#contactable').click();},1000);
      	
    }
  }
  
  
	//define the new for the plugin ans how to call it	
	$.fn.contactable = function(options) { 
		//set default options  
		var defaults = {
			name: 'Name',
			email: 'Email',
			message : 'Message',
			subject : 'A contactable message',
			label_name: 'Name',
      label_email: 'E-Mail',
      label_website: 'Website',
      label_feedback: 'Your Feedback',
      label_send: 'SEND',
			recievedMsg : 'Thankyou for your message',
			notRecievedMsg : 'Sorry but your message could not be sent, try again later',
			disclaimer: 'Please feel free to get in touch, we value your feedback',
			hide_email: 'false',
      hide_website: 'false',
			fileMail: 'mail.php',
			side: 'left',
			hideOnSubmit: true
		};

		//call in the default otions
		var options = $.extend(defaults, options);
		//act upon the element that is passed into the design    
		return this.each(function(options) {
			//construct the form
			conf_side = "class='contactable_l'";
			if(defaults.side == "right") conf_side = "class='contactable_r'"; 
			
			div_form = '<div id="contactable" '+conf_side+' ></div><form '+conf_side+' id="contactForm" method="" action=""><div id="loading"></div><div id="callback"></div><div class="holder">';
			div_form += '<p><label for="name">'+defaults.label_name+' <span class="red"> * </span></label><br /><input id="name_mc" class="contact" name="name" /></p>';
			if(defaults.hide_email == 'false'){
			  div_form += '<p><label for="email">'+defaults.label_email+' <span class="red"> * </span></label><br /><input id="email_mc" class="contact" name="email" /></p>';
		  }
		  if(defaults.hide_website == 'false'){
			  div_form += '<p><label for="email">'+defaults.label_website+' <span class="red"> * </span></label><br /><input id="website_mc" class="contact" name="url" /></p>';
		  }
			div_form += '<p><label for="comment">'+defaults.label_feedback+' <span class="red"> * </span></label><br /><textarea id="comment_mc" name="comment" class="comment" rows="4" cols="30" ></textarea></p>';
			div_form += '<p><input class="submit" type="submit" value="'+defaults.label_send+'"/></p>';
			div_form += '<p class="disclaimer">'+defaults.disclaimer+'</p></div></form>';
			
			$(this).html(div_form);
			//show / hide function
			$('div#contactable').toggle(function() {
			  $('#callback').hide().empty();
			  $('.holder').show();
				$('#loading').hide();
				
			  if ($('div.m-overlay').length == 0) {
			    $("body").prepend('<div class="m-overlay"></div>');
		    }
				$('#overlay').css({display: 'block'});
				if(defaults.side == "right"){
				  $(this).animate({"marginRight": "-=5px"}, "fast"); 
				  $('#contactForm').animate({"marginRight": "-=0px"}, "fast");
				  $(this).animate({"marginRight": "+=387px"}, "slow"); 
				  $('#contactForm').animate({"marginRight": "+=390px"}, "slow");
		    }else{
		      $(this).animate({"marginLeft": "-=5px"}, "fast"); 
  				$('#contactForm').animate({"marginLeft": "-=0px"}, "fast");
  				$(this).animate({"marginLeft": "+=387px"}, "slow"); 
  				$('#contactForm').animate({"marginLeft": "+=390px"}, "slow");
		    }
			}, 
			function() { $('div.m-overlay').remove();
			  if(defaults.side == "right"){
				  $('#contactForm').animate({"marginRight": "-=390px"}, "slow");
				  $(this).animate({"marginRight": "-=387px"}, "slow").animate({"marginRight": "+=5px"}, "fast"); 
				}else{
				  $('#contactForm').animate({"marginLeft": "-=390px"}, "slow");
				  $(this).animate({"marginLeft": "-=387px"}, "slow").animate({"marginLeft": "+=5px"}, "fast");
				}
				$('#overlay').css({display: 'none'});
			});
			
			//validate the form 
			$("#contactForm").validate({
				//set the rules for the fild names
				rules: {
					name: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					url: {
						required: true,
						url: true
					},
					comment: {
						required: true
					}
				},
				//set messages to appear inline
					messages: {
						name: "",
						email: "",
						url: "",
						comment: ""
					},			

				submitHandler: function() {
					$('.holder').hide();
					$('#loading').show();
					name_val = $('#contactForm #name_mc').val();
					if(defaults.hide_email == 'false') email_val = $('#contactForm #email_mc').val();
					else email_val = 'nothing';
					if(defaults.hide_website == 'false') website_val = $('#contactForm #website_mc').val();
					else website_val = 'nothing';
					comment_val = $('#contactForm #comment_mc').val();
					$.post(defaults.fileMail,{subject:defaults.subject, name: name_val, email: email_val, website: website_val, comment:comment_val, action:defaults.action},
					function(data){
						$('#loading').css({display:'none'}); 
						data = jQuery.trim(data);
						if( data == 'success') {
							$('#callback').show().append(defaults.recievedMsg);
							if(defaults.hideOnSubmit == true) {
								//hide the tab after successful submition if requested
								setTimeout(function(){$('div#contactable').click();},1200);
                $('#comment_mc').val('');
								$('#overlay').css({display: 'none'});	
							}
						} else {
							$('#callback').show().append(defaults.notRecievedMsg);
							setTimeout(function(){$('div#contactable').click();},1500);
						}
					});		
				}
			});
		});
	};
	$(document).ready(function(){
    $('a[href=#contact]').click(function(){
        $('div#contactable').click();
    });
    $('.m-overlay').live('click',function(){
      $('div#contactable').click();
    });
  });
})(jQuery);

