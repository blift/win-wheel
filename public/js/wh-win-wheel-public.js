(function( $ ) {
	'use strict';

	$(document).ready(function(){
		
		$.getJSON( '/wp-json/whwinwhell/v1/whell',  wheelImagesJSON );

		function wheelImagesJSON( imagesJSON ){

			let opt = {
				'numSegments'       : imagesJSON.length,                // Specify number of segments.
				'outerRadius'       : 400,              // Set outer radius so wheel fits inside the background.
				'drawText'          : true,             // Code drawn text can be used with segment images.
				'textFontSize'      : 14,               // Set text options as desired.
				'textOrientation'   : 'curved',
				'textAlignment'     : 'inner',
				'textMargin'        : 90,
				'textFontFamily'    : 'monospace',
				'textStrokeStyle'   : 'black',
				'textLineWidth'     : 1,
				'textFillStyle'     : 'white',
				'drawMode'          : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
				segments: imagesJSON,
				'animation' :           // Specify the animation to use.
				{
					'type'     : 'spinToStop',
					'duration' : 4,     // Duration in seconds.
					'spins'    : 8,     // Number of complete spins.
					'callbackFinished' : alertPrize
				}
			};

			let theWheel = new Winwheel( opt );
			let wheelPower    = 0;
			let wheelSpinning = false;
			
			// -------------------------------------------------------
			// Click handler for spin button.
			// -------------------------------------------------------
			document.getElementById('spin_button').onclick = function startSpin()
			{
				// Ensure that spinning can't be clicked again while already running.
				if (wheelSpinning == false) {
					// Based on the power level selected adjust the number of spins for the wheel, the more times is has
					// to rotate with the duration of the animation the quicker the wheel spins.
					if (wheelPower == 1) {
						theWheel.animation.spins = 3;
					} else if (wheelPower == 2) {
						theWheel.animation.spins = 8;
					} else if (wheelPower == 3) {
						theWheel.animation.spins = 15;
					}
	
					// Disable the spin button so can't click again while wheel is spinning.
					//document.getElementById('spin_button').src       = "http://forplugins.local/wp-content/uploads/2020/07/pennant-1.jpg";
					document.getElementById('spin_button').className = "";
	
					// Begin the spin animation by calling startAnimation on the wheel object.
					theWheel.startAnimation();
	
					// Set to true so that power can't be changed and spin button re-enabled during
					// the current animation. The user will have to reset before spinning again.
					wheelSpinning = true;
				}
			}
	
			document.getElementById('spin_reset').onclick = function resetWheel(event)
			{
				event.preventDefault();

				theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
				theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
				theWheel.draw();                // Call draw to render changes to the wheel.
	
				wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
			
			}
	

			function alertPrize(indicatedSegment)
			{
				// Do basic alert of the segment text.

				$('.wh-win-wheel-inner').append('<img id="whWinWheelImg" src="' + indicatedSegment.image + '"/>' );
				$('.wh-win-wheel-text-container').append('<p id="whWinWheelTxt">' + indicatedSegment.text + '</p>');
				$('.wh-win-alert').show();
				confetti.start();

			}

			// Hide alert on click
			$('.wh-win-wheel-close').on('click', function(e){
				e.preventDefault();
				$('.wh-win-alert').hide();
				$('#whWinWheelImg').remove();
				$('#whWinWheelTxt').remove();
				confetti.remove();  
			});
		}
		
	});

})( jQuery );
