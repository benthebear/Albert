$(document).ready(function() {

	function elementResize() {
		var contentwidth = $(window).width();
		if ((contentwidth) < '990'){
		    $('#block-teaserimage-0, .volleBreitseite').addClass('schmal');
				$('#block-teaserimage-0, .volleBreitseite').removeClass('breit');
		} else {
		    $('#block-teaserimage-0, .volleBreitseite').removeClass('schmal');
				$('#block-teaserimage-0, .volleBreitseite').addClass('breit');
		}
	}

	elementResize();	

	$(window).bind("resize", function(){
		elementResize();
	});
	
});