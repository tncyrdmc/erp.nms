/**
 * 
 */

function iniciarSpinner(){
	
	var code='<div id="spinner-div"></div>';
	
	$("#content").append(code)
	
	setiniciarSpinner();
			
	}

function setiniciarSpinner(){
	
	var opts = {
			  lines: 12 // The number of lines to draw
			, length: 5 // The length of each line
			, width: 20 // The line thickness
			, radius: 40 // The radius of the inner circle
			, scale: 1 // Scales overall size of the spinner
			, corners: 1 // Corner roundness (0..1)
			, color: '#00b4dc' // #rgb or #rrggbb or array of colors
			, opacity: 0.25 // Opacity of the lines
			, rotate: 0 // The rotation offset
			, direction: 1 // 1: clockwise, -1: counterclockwise
			, speed: 1 // Rounds per second
			, trail: 60 // Afterglow percentage
			, fps: 10 // Frames per second when using setTimeout() as a fallback for CSS
			, zIndex: 2 // The z-index (defaults to 2000000000)
			, className: 'spinner' // The CSS class to assign to the spinner
			, top: '50%' // Top position relative to parent
			, left: '50%' // Left position relative to parent
			, shadow: false // Whether to render a shadow
			, hwaccel: true // Whether to use hardware acceleration
			, position: 'absolute' // Element positioning
			}
			
			var spinner = new Spinner(opts).spin(document.getElementById('spinner-div'));
			$('#spinner-div').attr('class', "div-fade-in");
			
	}

function FinalizarSpinner(){
	
	$("#spinner-div").html('');
	$("#spinner-div").removeClass("modal-backdrop fade in");
	$("#spinner-div").remove();
}