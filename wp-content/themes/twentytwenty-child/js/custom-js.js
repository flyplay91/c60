$(document).ready(function(){
	$('.mini-instagram-slider').on('init', function(event, slick){
    $('.mini-instagram-slider.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
  });

  $('.mini-instagram-slider').slick({
	  dots: false,
	  infinite: true,
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
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

  var leftCirclePercent = $('.block-circle-persent .circle-persent-item.circle-left .circle-item span').text();
  var leftCircleAngle = leftCirclePercent/100*360;
  var rightCirclePercent = $('.block-circle-persent .circle-persent-item.circle-right .circle-item span').text();
  var rightCircleAngle = rightCirclePercent/100*360;
	
	var circleBarText = '.home main .section-home-candidate .home-candidate__white-wrapper .home-candidate__light-pink-wrapper .home-candidate__content .home-candidate__content-inner .block-circle-persent .circle-persent-item .circle-item .bar.bar-percent--left:after {-webkit-transform: rotate(' +leftCircleAngle+'deg);-ms-transform: rotate(' +leftCircleAngle+'deg);transform: rotate(' +leftCircleAngle+ 'deg);}.home main .section-home-candidate .home-candidate__white-wrapper .home-candidate__light-pink-wrapper .home-candidate__content .home-candidate__content-inner .block-circle-persent .circle-persent-item .circle-item .bar.bar-percent--right:after {-webkit-transform: rotate(' +rightCircleAngle+'deg);-ms-transform: rotate(' +rightCircleAngle+'deg);transform: rotate(' +rightCircleAngle+'deg);}'
	$('#candidates_circle_bar').html(circleBarText);

	$('body').on('click', '.vcsg-job-item span', function() {
		$(this).closest('.vcsg-position-item').siblings().removeClass('active');
		$(this).closest('.vcsg-position-item').toggleClass('active');
	});

	$('.section-vcsg-apply a').on('click', function() {
		$('html, body').animate({
        scrollTop: $('.section-vcsg-veterinary-group').offset().top
    }, 1000);
	});

	$('.home-team__content a').on('click', function() {
		$('html, body').animate({
        scrollTop: $('.section-home-candidate').offset().top
    }, 1000);
	});

	var videoHeight = $('.vcsg-gallery__right').height();
	$('.vcsg-gallery__left iframe').height(videoHeight);
	
	$( window ).resize(function() {
	  var resizeVideoHeight = $('.vcsg-gallery__right').height();
		$('.vcsg-gallery__left iframe').height(resizeVideoHeight);
	});

	$('.gallery__slider-main').on('init', function(event, slick){
    $('.gallery__slider-main.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
  });

  $('.gallery__slider-thumb').on('init', function(event, slick){
    $('.gallery__slider-thumb.slick-initialized').css({'opacity': '1', 'visibility': 'visible'});
  });

 	$('.gallery__slider-main').slick({
		pauseOnHover: true,
		arrows: true,
		dots: false,
		infinite: true,
		fade: true,
		asNavFor: '.gallery__slider-thumb'
	});
	$('.gallery__slider-thumb').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		infinite: true,
		focusOnSelect: true,
		asNavFor: '.gallery__slider-main',
	});

	$('body').on('click', '.vcsg-gallery-more a', function() {
		$('.section-vcsg-gallery-slider').addClass('active');
	});

	$('body').on('click', '.btn-cancel-vcsg-gallery a', function() {
		$('.section-vcsg-gallery-slider').removeClass('active');
	});

	$('body').on('click', '.btn-more-positions a', function() {
		$(this).closest('.btn-more-positions').css('display', 'none');
		$('.vcsg-positions').addClass('active');
	});

	$('body').on('click', '.vcsg-position-item a', function() {
		var vcsgPosition = $(this).siblings().text();
		$('.vcsg-positions-popup').addClass('active');
		$('.vcsg-positions-popup .vcsg-position-name').text(vcsgPosition);
		
	});

	$('body').on('click', '.btn-vcsg-position-cancel a', function() {
		$('.vcsg-positions-popup').removeClass('active');
	});

	$('.vcsg-positions .vcsg-position-item').each(function() {
		if (($(this).find('.vcsg-job-item span').text().indexOf('Nurse') != -1) || ($(this).find('.vcsg-job-item span').text().indexOf('Radiologist') != -1) || ($(this).find('.vcsg-job-item span').text().indexOf('Criticalist') != -1)) {
			$(this).addClass('has-nurse');
		}
	});
	
	$('body').on('click', '.btn-vcsg-position-success-cancel a', function() {
		$('.vcsg-positions-popup-success').removeClass('active');
	});

	$('body').on('change', '.quote-upload-button', function() {
		$('.quoter-upload-resume > label').remove();
		if (this.files && this.files[0]) {
			$(this).closest('.quote-file').after('<label style="position: absolute; top: 5px; color: white; left: calc(100% + 20px); white-space: nowrap;">' + this.files[0].name + '</label>');
		} else {
			$(this).closest('.quote-file').after('<label style="position: absolute; top: 5px; color: white; left: calc(100% + 20px); white-space: nowrap;">No uploaded.</label>');
		}
		
	});

	
});

document.addEventListener( 'wpcf7mailsent', function( event ) {
	var currentUrl = window.location.href;

	if (currentUrl.indexOf('vcsg') >= 0) {
		$('.btn-vcsg-position-cancel a').trigger('click');
		window.location.replace('/vcsg/thank-you');
	} else {
		window.location.replace('/thank-you');
	}
  
  // $('.vcsg-positions-popup-success').addClass('active');
}, false );
