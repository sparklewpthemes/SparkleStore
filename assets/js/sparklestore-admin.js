jQuery(document).ready(function($){

	var sparklestore_upload;
	var sparklestore_selector;
    function sparklestore_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		sparklestore_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( sparklestore_upload ) {
			sparklestore_upload.open();
		} else {
			// Create the media frame.
			sparklestore_upload = wp.media.frames.sparklestore_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			sparklestore_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = sparklestore_upload.state().get('selection').first();
				sparklestore_upload.close();
                sparklestore_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					sparklestore_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				sparklestore_selector.find('.upload-button-wdgt').unbind().addClass('remove-file').removeClass('upload-button-wdgt').val(sparklestore_remove.remove);
				sparklestore_selector.find('.of-background-properties').slideDown();
				sparklestore_selector.find('.remove-image, .remove-file').on('click', function() {
					sparklestore_remove_file( $(this).parents('.section') );
				});
			});
		}
		// Finally, open the modal.
		sparklestore_upload.open();
	}

	function sparklestore_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button-wdgt').removeClass('remove-file').val(sparklestore_remove.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button-wdgt').remove();
		}
		selector.find('.upload-button-wdgt').on('click', function(event) {
			sparklestore_add_file(event, $(this).parents('.section'));
            
		});
	}

	$('body').on('click','.remove-image, .remove-file', function() {
		sparklestore_remove_file( $(this).parents('.section') );
    });

    $(document).on('click', '.upload-button-wdgt', function( event ) {
    	sparklestore_add_file(event, $(this).parents('.section'));
    });

});