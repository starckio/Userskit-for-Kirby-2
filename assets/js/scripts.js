$(document).ready( function() {

	$('.toggle').click(function(){
	    $(this).toggleClass('active');
	    $('.menu').toggleClass('active');
	});

	$(window).resize(function() {
		if ($(window).width() > 480) {
		    $('.toggle').removeClass('active');
		    $('.menu').removeClass('active');
		}
	});

});