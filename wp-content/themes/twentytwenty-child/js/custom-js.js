
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
	  
	// Homepage Product Cart
	if ( typeof wc_add_to_cart_params === 'undefined' ) return false;

	var a = 'a.home-product-cart-btn';
		$(a).on('click', function(e){
		e.preventDefault();
		$(this).attr('data-class', 'cart-added');

		$.ajax({
			type: 'POST',
			url: wc_add_to_cart_params.ajax_url,
			data: {
				'action': 'variation_to_cart',
				'pid'   : $(this).attr('data-product_id'),
				'vid'   : $(this).attr('data-variation_id'),
				'qty'   : 1,
			},
			success: function (response) {
				if(response){
				
					$('a.home-product-cart-btn[data-class="cart-added"]').text('Added');
					setTimeout(function(){ 
						$('a.home-product-cart-btn[data-class="cart-added"]').text('Add to cart');
						$('a.home-product-cart-btn').removeAttr('data-class');
					}, 3000);
				
				
					var currentCartCount = parseInt($('.header-cart span').attr('data-cart-total'));
					$('.header-cart span').attr('data-cart-total', currentCartCount + 1);
				}
			},
			error: function (error) {
			console.log(error);
			}
		});
	});


});
	
