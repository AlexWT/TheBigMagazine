/**
 * Custom javascript calls for the news site.
 */

jQuery(function($){
	$(document).ready(function(){	
		// Get the slider height
		resizeNewsSection();

		// Change the size of news section on windows resize;
		$(window).resize(resizeNewsSection);		
	});
});



function resizeNewsSection() {
	var sliderHeight = $('#carousel').height();

	if(sliderHeight >= 275) {
		$('#top-news').css('max-height', sliderHeight + 'px');

		// Console tests
		console.log('var sliderHeight = ' + sliderHeight + 'px');
	} else {
		$('#top-news').css('max-height', 'auto');
	}

}
