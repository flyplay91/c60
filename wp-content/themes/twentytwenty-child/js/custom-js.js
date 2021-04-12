
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
		slidesToScroll: 2,
		arrows: false,
		responsive: [
			{
				breakpoint: 1100,
				settings: {
				  slidesToShow: 3
				}
		  	},
		  	{
				breakpoint: 800,
				settings: {
				  slidesToShow: 2
				}
		  	},
		  	{
				breakpoint:550,
				settings: {
				  slidesToShow: 1
				}
		  	}
		]
	});

	$('.home-blog__block').magnificPopup({
		delegate: '.carousel-link',
		gallery:{enabled:true},
		type: 'image',
		callbacks: {
		  	elementParse: function(item) {
				if (item.el[0].classList.contains('video-link')) {
					item.type = 'iframe';
				} else {
					item.type = 'image';
				}
		  	}
		}
	});

	$('.home-lives-carousel').on('init', function(event, slick){
		$('.home-lives-carousel.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	});

	$('.home-lives-carousel').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		autoplay: true,
  		autoplaySpeed: 4500
	});

	

	// $('.home-hero').on('init', function(event, slick){
	// 	$('.home-hero.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
	// });

	// $('.home-hero').slick({
	// 	dots: false,
	// 	infinite: true,
	// 	slidesToShow: 1,
	// 	slidesToScroll: 1,
	// 	arrows: false,
	// 	autoplay: true,
  	// 	autoplaySpeed: 8000
	// });
	  
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

	// Shoppage sort
	$('body').on('click', '.shop-sort__inner > label', function() {
		$('.shop-sort__inner form').toggleClass('opened');
	});

	$('body').on('click', '.shop-sort__inner ul li', function() {
		// var currentSelectedVal = $('.shop-sort__inner > label').text();
		// var newSelectedSortVal = $(this).text();
		// console.log(currentSelectedVal, newSelectedSortVal)
		var selectedVal = $(this).data('title');
		$('.sort-btn').val(selectedVal);
		$('#sort_form').submit();
	});

	if ($('.shop-sort__inner label').text() == 'Default') {
		$('.default-sort').css('display', 'none');
	} else {
		$('.default-sort').css('display', 'block');
	}

	// Shoppage change product price
	$('.page-template-shop .shop-products-block li').each(function() {
		if ( ($(this).find('.price') != 0) && ($(this).find('.wcsatt-sub-options').length != 0) ) {
			$(this).find('.price').after('<label class="custom-subscription-price">Save 20% - Start a subscription</label>');
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

	homeUrl = window.location.origin;

	// Shoppage add to cart product when has variants
	var a = 'a.btn-shop-add-cart';
		$(a).on('click', function(e){
		e.preventDefault();
		$(this).attr('data-class', 'cart-added');
		// $('.loading-icon').addClass('active');

		$.ajax({
			type: 'POST',
			url: wc_add_to_cart_params.ajax_url,
			data: {
				'action': 'variation_to_cart',
				'pid'   : $(this).attr('data-product_id'),
				'vid'   : $(this).attr('data-variant_id'),
				'qty'   : 1,
			},
			success: function (response) {
				// $('.loading-icon').removeClass('active');
				if(response){
				
					$('a.btn-shop-add-cart[data-class="cart-added"]').text('Added');
					setTimeout(function(){ 
						$('a.btn-shop-add-cart[data-class="cart-added"]').text('Add to cart');
						$('a.btn-shop-add-cart').removeAttr('data-class');
					}, 3000);
				
				
					var currentCartCount = parseInt($('.header-cart span').attr('data-cart-total'));
					$('.header-cart span').attr('data-cart-total', currentCartCount + 1);
					$('.header-cart span').html(currentCartCount + 1);

					
					window.location.replace(homeUrl + '/cart/');
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
		// $('.loading-icon').addClass('active');

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
				// $('.loading-icon').removeClass('active');
				if(response){
				
					$('a.btn-shop-add-cart-no-variant[data-class="cart-added"]').text('Added');
					setTimeout(function(){ 
						$('a.btn-shop-add-cart-no-variant[data-class="cart-added"]').text('Add to cart');
						$('a.btn-shop-add-cart-no-variant').removeAttr('data-class');
					}, 3000);
				
				
					var currentCartCount = parseInt($('.header-cart span').attr('data-cart-total'));
					$('.header-cart span').attr('data-cart-total', currentCartCount + 1);
					$('.header-cart span').html(currentCartCount + 1);
					
					window.location.replace(homeUrl + '/cart/');
				}
			},
			error: function (error) {
				console.log(error);
			}
		});
	});


	// Auto Renew loading in my account page
	if (('.subscription-auto-renew-toggle-mod').length != 0) {
		$('.subscription-auto-renew-toggle-mod').on('click', function() {
			if ($(this).hasClass('subscription-auto-renew-toggle--on')) {
				$(this).append("<span>Pausing your subscription..</span>");
				$.cookie('clickBtn', 'on', {path: '/'});
				$.cookie('renew', 'off', {
					path: '/'
				});
			} else {
				$(this).append("<span>Renewing your subscription..</span>");
				$.cookie('clickBtn', 'on', {path: '/'});
				$.cookie('renew', 'on', {
					path: '/'
				});
			}

		});
	}

	// if ((typeof($.cookie('renew')) !== 'undefined') && (typeof($.cookie('clickBtn')) !== 'undefined')) {
	// 	if ($.cookie('renew') == 'on') {
	// 		$('.subscription-auto-renew-toggle-mod').append('<span>Subscription Actived</span>');
	// 		setTimeout(function() { 
	// 			$('.subscription-auto-renew-toggle-mod span').remove();
	// 		}, 5000);
			
	// 	} else if ($.cookie('renew') == 'off') {
	// 		$('.subscription-auto-renew-toggle-mod').append('<span>Subscription Paused</span>');
	// 		setTimeout(function() { 
	// 			$('.subscription-auto-renew-toggle-mod span').remove();
	// 		}, 5000);
	// 	}
	// }

	// $.removeCookie('renew', { path: '/' });
	// $.removeCookie('clickBtn', { path: '/' });
	// End Auto Renew loading in my account page 


	// Product category page change product price
	$('.page-template-product_category .product-category__products__inner li').each(function() {
		if ( ($(this).find('.price') != 0) && ($(this).find('.wcsatt-sub-options').length != 0) ) {
			$(this).find('.price').after('<label class="custom-subscription-price">Save 20% - Start a subscription</label>');
		}
	});

	$('.archive .product-category__products__inner li').each(function() {
		if ( ($(this).find('.price') != 0) && ($(this).find('.wcsatt-sub-options').length != 0) ) {
			$(this).find('.price').after('<label class="custom-subscription-price">Save 20% - Start a subscription</label>');
		}
	});

	if ($('.product-image-summary__inner').length != 0) {
		if ($('.product-image-summary__inner .price .wcsatt-sub-options').length != 0) {
			$('.product-image-summary__inner .price').css('display', 'none');
		} else {
			$('.product-image-summary__inner .price').css('opacity', '1');
		}
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

	// Product page
	$('body').on('click', '.btn-write-comment', function() {
		$('#review_form_wrapper').toggleClass('opened');
	});

	// Product page changing variant text
	setTimeout(function(){ 
		if ($('.wcsatt-options-product').lenght != 0) {
			$('.wcsatt-options-product li').each(function() {
				if ($(this).find('input').prop("checked")) {
					if ($(this).hasClass('one-time-option')) {
						$('.single_add_to_cart_button').html('Buy Now');
						$('.extra-variant-text').html('Free shipping in the US and<br>100% satisfaction guaranteed.');
					} else {
						$('.single_add_to_cart_button').html('Subscribe Now');
						$('.extra-variant-text').html('Free shipping in the US, cancel anytime, <br>satisfaction guaranteed.');
					}
				}
			});

			var regularPrice = $('.subscription-option .subscription-price del .woocommerce-Price-amount  bdi').text();
			var regularPriceVal = parseInt(regularPrice.split('$')[1]);
			var salePrice = $('.one-time-option-details .woocommerce-Price-amount bdi:first-child').text();
			var salePriceVal = parseInt(salePrice.split('$')[1]);

			if (regularPriceVal > salePriceVal) {
				$('.one-time-option-details .woocommerce-Price-amount bdi').before('<bdi class="subscription-regular-price"><span>' + regularPrice +'</span> — </bdi>');
			}
		}	

		if ($('.ast-stock-detail').length > 0 && $('.product-image-summary__inner .onsale').length > 0) {
			// $('.product-image-summary__inner .onsale').hide();
			// $('.product-image-summary__inner').append('<span class="low-qty-badget"></span>');
		} else if ($('.ast-stock-detail').length > 0 && $('.product-image-summary__inner .onsale').length == 0) {
			$('.product-image-summary__inner').append('<span class="low-qty-badget"></span>');
		}
	
		$('.shop-products-block li').each(function() {
			let $this = $(this);
			if ($this.find('.single-qty').length > 0 && $this.find('.onsale').length > 0) {
				// $this.find('.onsale').hide();
				// $this.find('.woocommerce-LoopProduct-link').append('<span class="low-qty-badget"></span>');
			} else if ($this.find('.single-qty').length > 0 && $this.find('.onsale').length == 0) {
				$this.find('.woocommerce-LoopProduct-link').append('<span class="low-qty-badget"></span>');
			}
		});
	}, 1000);

	/*
	$(".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
	    // Fired when the user selects all the required dropdowns / attributes
	    // and a final variation is selected / shown
	    debugger;
	    console.log(event);
	});
	*/

	$('body').on('change', '#select-size', function() {
		if ($('.wcsatt-options-product').length > 0) {
			$('.wcsatt-options-product li').each(function() {
				if ($(this).find('input').prop("checked")) {
					if ($(this).hasClass('one-time-option')) {
						$('.single_add_to_cart_button').html('Buy Now');
						$('.extra-variant-text').html('Free shipping in the US and<br>100% satisfaction guaranteed.');
					} else {
						$('.single_add_to_cart_button').html('Subscribe Now');
						$('.extra-variant-text').html('Free shipping in the US, cancel anytime, <br>satisfaction guaranteed.');
					}
				}
			});

			var regularPrice = $('.subscription-option .subscription-price del .woocommerce-Price-amount  bdi').text();
			var regularPriceVal = parseInt(regularPrice.split('$')[1]);
			var salePrice = $('.one-time-option-details .woocommerce-Price-amount bdi:first-child').text();
			var salePriceVal = parseInt(salePrice.split('$')[1]);

			if (regularPriceVal > salePriceVal) {
				$('.one-time-option-details .woocommerce-Price-amount bdi').before('<bdi class="subscription-regular-price"><span>' + regularPrice +'</span> — </bdi>');
			}
			
		}
	});
	

	$('body').on('click', '.wcsatt-options-product li input', function() {
		if ($(this).closest('li').hasClass('one-time-option')) {
			$('.single_add_to_cart_button').html('Buy Now');
			$('.extra-variant-text').html('Free shipping in the US<br />and satisfaction guaranteed.');
		} else {
			$('.single_add_to_cart_button').html('Subscribe Now');
			$('.extra-variant-text').html('Free shipping in the US, cancel anytime,<br>satisfaction guaranteed.');
		}
	});

	// Testimonial page
	$('body').on('click', '.testimonial-hero__content img', function() {
		$('html, body').animate({
			scrollTop: ($('.testimonial-form__inner').offset().top)
		},100);
	});
	// affiliate-area
	$('body').on('click', '.affiliate-hero__inner img', function() {
		$('html, body').animate({
			scrollTop: ($('.affiliate-form').offset().top)
		},100);
	});

});
	
