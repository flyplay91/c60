
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

	$('body').on('click', '.home-product-select-btn', function() {
		$(this).toggleClass('active');
		$(this).closest('.home-product__items-item').find('.home-cart-block').toggleClass('active');
	});

	$('.home-blog__block').on('init', function(event, slick){
		$('.home-blog__block.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	});

	$('.home-blog__block').slick({
		dots: true,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		  	{
				breakpoint: 650,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
		  	},
		  	{
				breakpoint: 480,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
		  	}
		]
	});

	$('.home-hero').on('init', function(event, slick){
		$('.home-hero.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	});

	$('.home-hero').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true,
  		autoplaySpeed: 2000
  	});  


});
	
