(function( $ ) {
	'use strict';
	
$(document).ready(function(){

    var sd = '<div class="btn btn-danger remove-add-more">Remove</div>';
    var max_fields = 255; //maximum input boxes allowed
    var wrapper = $('.wh-win-will-cards'); //Fields wrapper
	var add_button = $('.add-more'); //Add button ID

	var count = 1; //initlal text box count
	
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(count < max_fields){ //max input box allowed
        count++; //text box increment
		var cardClone = $('.wh-win-will-card').first().clone();
		
        $(sd).appendTo(cardClone);
		$(wrapper).append(cardClone);
        
        cardClone.find('#wh-card-number-count').replaceWith(count);
        cardClone.find('#wh-card-hidden-val').val(count);
      }
    });

    $(wrapper).on('click', '.remove-add-more', function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent('.wh-win-will-card').remove();
        $(this).parent('.wh-win-will-card').find('#wh-card-number-count').replaceWith(count++);
        $(this).parent('.wh-win-will-card').find('#wh-card-hidden-val').val(count++);
        $(this).remove();
        count--;
    });
 });


})( jQuery );
