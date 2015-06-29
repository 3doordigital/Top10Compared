        jQuery(document).on("click", ".custom_media_upload", function(e) {
			var parent = jQuery(this).parent().parent().parent().parent().parent();
			var parentid = jQuery(parent).attr('id');
			e.preventDefault();
			var custom_uploader = wp.media({
				title: 'Select Image to Use',
				button: {
					text: 'Use Selected Image',
				},
				multiple: false  // Set this to true to allow multiple files to be selected
			})
			.on('select', function() {
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				jQuery('#'+parentid+' .custom_media_image').attr('src', attachment.url);
				jQuery('#'+parentid+' .custom_media_url').val(attachment.url);
			})
			.open();
		});
		jQuery(function() {
			jQuery( "#tabs" ).tabs()
			jQuery("#tabs").show();
		  });
jQuery(function($) {
	var slider = jQuery("#topten_rating").val();
    $( "#slider" ).slider({
      value:slider,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating" ).val( ui.value );
      }
    });
    $( "#topten_rating" ).val( $( "#slider" ).slider( "value" ) );
	
	var slider1 = jQuery("#topten_rating_support").val();
    $( "#slider1" ).slider({
      value:slider1,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating_support" ).val( ui.value );
      }
    });
    $( "#topten_rating_support" ).val( $( "#slider1" ).slider( "value" ) );
	
	var slider2 = jQuery("#topten_rating_price").val();
    $( "#slider2" ).slider({
      value:slider2,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating_price" ).val( ui.value );
      }
    });
    $( "#topten_rating_price" ).val( $( "#slider2" ).slider( "value" ) );
	
	var slider3 = jQuery("#topten_rating_ease").val();
    $( "#slider3" ).slider({
      value:slider3,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating_ease" ).val( ui.value );
      }
    });
    $( "#topten_rating_ease" ).val( $( "#slider3" ).slider( "value" ) );
	
	var slider4 = jQuery("#topten_rating_cred").val();
    $( "#slider4" ).slider({
      value:slider4,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating_cred" ).val( ui.value );
      }
    });
    $( "#topten_rating_cred" ).val( $( "#slider4" ).slider( "value" ) );
	
	var slider5 = jQuery("#topten_rating_features").val();
    $( "#slider5" ).slider({
      value:slider5,
      min: 0,
      max: 5,
      step: 0.5,
      slide: function( event, ui ) {
        $( "#topten_rating_features" ).val( ui.value );
      }
    });
    $( "#topten_rating_features" ).val( $( "#slider5" ).slider( "value" ) );
 });
