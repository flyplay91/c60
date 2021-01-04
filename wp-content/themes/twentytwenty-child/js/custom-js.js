
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
  		autoplaySpeed: 8000
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
					$('a.home-product-cart-btn[data-class="cart-added"]').closest('.home-product__items-item').find('.home-cart-block').css('display', 'block');
					setTimeout(function(){ 
						$('a.home-product-cart-btn[data-class="cart-added"]').text('Add to cart');
						$('a.home-product-cart-btn').removeAttr('data-class');
					}, 3000);
				
				
					var currentCartCount = parseInt($('.header-cart span').attr('data-cart-total'));
					$('.header-cart span').attr('data-cart-total', currentCartCount + 1);
					$('.header-cart span').html(currentCartCount + 1);
				}
			},
			error: function (error) {
			console.log(error);
			}
		});
	});

	// Shoppage change product price
	if ($('.page-template-shop span.price') != 0) {
		$('.page-template-shop span.price').html('<span class="custom-subscription-price">Save 20% With Renewals</span>');
	}

	// Shoppage accordion
	$('body').on('click', '.accordion-item > h4', function() {
		$('.accordion-item').removeClass('active');
		$('.accordion-item p').hide();
		$('.accordion-item ul').hide();
		$(this).closest('.accordion-item').siblings().find('p').slideUp(350);
		$(this).closest('.accordion-item').siblings().find('ul').slideUp(350);
		$(this).next().slideDown(350);
		$(this).closest('.accordion-item').addClass('active');
	});

	// Shoppage add to cart product
	var a = 'a.btn-shop-add-cart';
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
				
					$('a.btn-shop-add-cart[data-class="cart-added"]').text('Added');
					setTimeout(function(){ 
						$('a.btn-shop-add-cart[data-class="cart-added"]').text('Add to cart');
						$('a.btn-shop-add-cart').removeAttr('data-class');
					}, 3000);
				
				
					var currentCartCount = parseInt($('.header-cart span').attr('data-cart-total'));
					$('.header-cart span').attr('data-cart-total', currentCartCount + 1);
					$('.header-cart span').html(currentCartCount + 1);
				}
			},
			error: function (error) {
				console.log(error);
			}
		});
	});


});
	
