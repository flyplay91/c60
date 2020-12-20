
$(document).ready(function() {
	$('.header-banner__inner').on('init', function(event, slick){
    	$('.header-banner__inner.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	});

  	$('.header-banner__inner').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrow: true
	});
});
	
