
$(document).ready(function() {
	$('.header-banner__inner').on('init', function(event, slick){
    	$('.header-banner__inner.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	});

  	$('.header-banner__inner').slick({
		autoplay: true,
		autoplaySpeed: 3000,
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
				breakpoint: 1100,
				settings: {
				  slidesToShow: 3,
				  slidesToScroll: 1
				}
		  	},
		  	{
				breakpoint: 800,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
		  	},
		  	{
				breakpoint:550,
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

	var a = 'a.related-product-cart-btn';
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
				
					$('a.related-product-cart-btn[data-class="cart-added"]').text('Added');
					$('a.related-product-cart-btn[data-class="cart-added"]').closest('.related-product__items-item').find('.related-product-cart-block').css('display', 'block');
					setTimeout(function(){ 
						$('a.related-product-cart-btn[data-class="cart-added"]').text('Add to cart');
						$('a.related-product-cart-btn').removeAttr('data-class');
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
	$('.page-template-shop .shop-products-block li').each(function() {
		if ( ($(this).find('.price') != 0) && ($(this).find('.wcsatt-sub-options').length != 0) ) {
			$(this).find('.price').after('<label class="custom-subscription-price">Save 20% With Renewals</label>');
		}
	});

	$('body').on('click', '.shop-hero-down-arrow', function() {
		$('html, body').animate({
			scrollTop: $(".shop_nav").offset().top
		}, 100);
	});

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

	// Shoppage add to cart product when has variants
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

	// Shoppage add to cart product when no variants
	var b = 'a.btn-shop-add-cart-no-variant';
		$(b).on('click', function(e){
		e.preventDefault();
		$(this).attr('data-class', 'cart-added');

		$.ajax({
			type: 'POST',
			url: wc_add_to_cart_params.ajax_url,
			data: {
				'action': 'variation_to_cart',
				'pid'   : $(this).attr('data-product_id'),
				'vid'   : 0,
				'qty'   : 1,
			},
			success: function (response) {
				if(response){
				
					$('a.btn-shop-add-cart-no-variant[data-class="cart-added"]').text('Added');
					setTimeout(function(){ 
						$('a.btn-shop-add-cart-no-variant[data-class="cart-added"]').text('Add to cart');
						$('a.btn-shop-add-cart-no-variant').removeAttr('data-class');
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

	// Product category page change product price
	if ($('.page-template-product_category span.price') != 0) {
		$('.page-template-product_category span.price').html('<span class="custom-subscription-price">Save 20% With Renewals</span>');
	}

	// Mobile menu
	$('body').on('click', '.btn-mobile-nav', function() {
		$(this).toggleClass('active');
		$('.header-mobile-nav').toggleClass('active');
	});

	$('body').on('click', '.header-mobile-nav > li', function() {
		$(this).siblings().removeClass('active');
		$(this).toggleClass('active');
	});

	// Testimonial page add file upload text in form
	$('.testimonial-form__inner .gform_body li.testimonial-file input[type=file]').before('<button class="btn-testimonial-file-upload">Select Files</button>');


});
	
