<?php
/**
 * Template Name: Home Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="main" id="site-content">
  <div class="section-home-team">
    <div class="home-team__content">
			<h2 class="desk-view"><?php echo get_field('team_title') ?></h2>
			<p><?php echo get_field('team_content') ?></p>
      <a href="javascript: void(0)"><?php echo get_field('team_button_text') ?></a>
    </div>
    <div class="home-team__image">
    	<h2 class="mobi-view"><?php echo get_field('team_title') ?></h2>
    	<a href="<?php echo get_field('team_image_url')['url']; ?>"><img src="<?php echo esc_url(get_field('team_image')['url']); ?>" alt="<?php echo esc_attr(get_field('team_image')['alt']); ?>" /></a>
    </div>
  </div>

  <div class="section-home-candidate">
    <div class="home-candidate__white-wrapper">
      <div class="home-candidate__light-pink-wrapper">
        <div class="home-candidate__content">
          <div class="home-candidate__content-inner">
          	<h2><?php echo get_field('candidates_title') ?></h2>
            
            <div class="block-circle-persent">
            	<?php
						    while ( have_rows('candidates_percent') ) : the_row(); ?>
						  		<div class="circle-persent-item circle-<?php if (get_row_index() == 1) {echo 'left';} else { echo 'right';} ?>">
	                	<img src="<?php echo get_sub_field('candidates_percent_image')['url']; ?>" alt="<?php echo get_sub_field('candidates_percent_image')['alt'] ?>">
		                <p class="circle-text"><?php echo the_sub_field('candidates_percent_description') ?></p>
		              </div>  	
						    <?php
						  	endwhile;
							?>
            </div>
            <style id="candidates_circle_bar"></style>

            <div class="block-middle-description">
              <p><?php echo get_field('candidates_middle_text') ?></p>
            </div>
            <div class="block-employees-percent">
              <label class="employees-title"><?php echo get_field('candidates_employee_title') ?></label>
              <div class="employees-percent">
              	<img src="<?php echo esc_url(get_field('candidates_extra_image')['url']); ?>" alt="<?php echo esc_url(get_field('candidates_extra_image')['alt']); ?>">
              </div>
              <div class="emplyees-bar employees-bar--happy">
                <label><?php echo get_field('candidates_happy_title') ?></label>
                <img src="<?php echo esc_url(get_field('candidates_happy_image')['url']); ?>" alt="<?php echo esc_url(get_field('candidates_happy_image')['alt']); ?>">
              </div>
              <div class="emplyees-bar emplyees-bar--unhappy">
                <label><?php echo get_field('candidates_unhappy_title') ?></label>
                <img src="<?php echo esc_url(get_field('candidates_unhappy_image')['url']); ?>" alt="<?php echo esc_url(get_field('candidates_unhappy_image')['alt']); ?>">
              </div>
            </div>
            <div class="block-bottom-description">
              <p><?php echo get_field('candidates_bottom_text') ?></p>
            </div>
          </div>
        </div>
        <div class="home-candidate__gallery desk-view">
        	<?php
        	while ( have_rows('candidates_gallery_desktop') ) : the_row(); ?>
			  		<img src="<?php echo get_sub_field('candidate_image')['url']; ?>" alt="<?php echo get_sub_field('candidate_image')['alt'] ?>">
			    <?php
			  	endwhile;
			  	?>
        </div>
        <div class="home-candidate__gallery-mobi mobi-view">
        	<div class="candidate__gallery-up">
        		<?php
	        	while ( have_rows('candidates_gallery_mobile_up') ) : the_row(); ?>
				  		<img src="<?php echo get_sub_field('gallery_mobile_up_image')['url']; ?>" alt="<?php echo get_sub_field('gallery_mobile_up_image')['alt'] ?>">
				    <?php
				  	endwhile;
				  	?>
        	</div>
        	<div class="candidate__gallery-down">
        		<?php
	        	while ( have_rows('candidates_gallery_mobile_down') ) : the_row(); ?>
				  		<img src="<?php echo get_sub_field('gallery_mobile_down_image')['url']; ?>" alt="<?php echo get_sub_field('gallery_mobile_down_image')['alt'] ?>">
				    <?php
				  	endwhile;
				  	?>
        	</div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-home-seeker">
    <div class="home-seeker__left">
      <h3><?php echo get_field('seeker_left_title') ?></h3>
      <img src="<?php echo esc_url(get_field('seeker_left_image')['url']); ?>" alt="<?php echo esc_attr(get_field('seeker_left_image')['alt']); ?>" />
    </div>
    <div class="home-seeker__right">
      <h2><?php echo get_field('seeker_right_title') ?></h2>
      <div class="block-seeker seeker--showcase">
        <h3><span>1</span> <label><?php echo get_field('seeker_showcase_title') ?></label></h3>
        <p><?php echo get_field('seeker_showcase_up_content') ?></p>
        <div class="showcase-positions">
          <label>Available Positions</label>
          <div class="block-showcase-positions">
            <div class="positions-options">
            	<?php

						    while ( have_rows('seeker_showcase_available_position') ) : the_row(); ?>
						  		<div class="positions-items">
		                <div class="positions-item">
		                  <span><?php echo the_sub_field('showcase_position_name') ?></span>
		                  <a href="javascript:void(0)"><?php echo the_sub_field('showcase_position_button_name') ?></a>
		                </div>
		                <div class="positions-content">
		                  <p><?php echo the_sub_field('showcase_position_content') ?></p>
		                </div>
		              </div> 	
						    <?php
						  	endwhile;

							?>
            </div>
            <div class="positions-icons">
            	<?php
						    while ( have_rows('seeker_showcase_position_options') ) : the_row(); ?>
						    	<div class="positions-icon">
		                <img src="<?php echo get_sub_field('showcase_position_option_image')['url']; ?>" alt="<?php echo get_sub_field('showcase_position_option_image')['alt'] ?>">
		                <label><?php echo the_sub_field('showcase_position_option_text') ?></label>
		              </div>
					    	<?php
						  	endwhile;
							?>
            </div>
          </div>
        </div>

        <p><?php echo get_field('seeker_showcase_middle_content') ?></p>

        <div class="showcase-two-circles">
        	<?php
				    while ( have_rows('seeker_showcase_middle_image') ) : the_row(); ?>
				    	<img src="<?php echo get_sub_field('showcase_middle_image')['url']; ?>" alt="<?php echo get_sub_field('showcase_middle_image')['alt'] ?>">
			    	<?php
				  	endwhile;
					?>
        </div>

        <p><?php echo get_field('seeker_showcase_bottom_content') ?></p>

        <div class="seeker-nav-bottom showcase--bottom">
          <label><?php echo get_field('seeker_showcase_we_do_title') ?></label>
          <p><?php echo get_field('seeker_showcase_we_do_content') ?></p>
        </div>
      </div>

      <div class="block-seeker seeker--information">
        <h3><span>2</span> <label><?php echo get_field('seeker_information_title') ?></label></h3>
        <p><?php echo get_field('seeker_information_up_content') ?></p>
        <div class="information-average-travel">
          <div class="average-price">
          	<?php
					    while ( have_rows('seeker_information_price') ) : the_row(); ?>
					  		<div class="average-price__item">
		              <label><?php echo the_sub_field('information_price_value') ?></label>
		              <span><?php echo the_sub_field('information_price_text') ?></span>
		            </div>
					    <?php
					  	endwhile;
						?>
          </div>
          <div class="average-time">
          	<img src="<?php echo esc_url(get_field('seeker_information_travel_time_image')['url']); ?>" alt="<?php echo esc_attr(get_field('seeker_information_travel_time_image')['alt']); ?>" />
            <label><?php echo get_field('seeker_information_travel_time_text') ?></label>
          </div>
          <div class="average-place">
            <label>Terrain | Recreation</label>
            <div class="average-place__image">
            	<?php
						    while ( have_rows('seeker_information_travel_place') ) : the_row(); ?>
						    	<img src="<?php echo get_sub_field('information_travel_place_image')['url']; ?>" alt="<?php echo get_sub_field('information_travel_place_image')['alt'] ?>">
					    	<?php
						  	endwhile;
							?>
            </div>
          </div>
        </div>
        <p><?php echo get_field('seeker_information_middle_content') ?></p>
        <div class="information-other">
          <h4>Other Information Included:</h4>
          <ul>
          	<?php
					    while ( have_rows('seeker_other_included_information') ) : the_row(); ?>
					    	<li><?php echo the_sub_field('other_included_information_text') ?></li>
				    	<?php
					  	endwhile;
						?>
          </ul>
        </div>
        <div class="seeker-nav-bottom information--bottom">
          <label><?php echo get_field('seeker_information_we_do_text') ?></label>
          <p><?php echo get_field('seeker_information_we_do_content') ?></p>
        </div>
      </div>
      <div class="block-seeker-bottom">
        <div class="seeker-bottom_sticker"></div>
        <h3><?php echo get_field('seeker_information_why_need_text') ?></h3>
        <div class="seeker-bottom__content">
          <p><?php echo get_field('seeker_information_why_need_content') ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="section-home-way">
    <div class="home-way__green-wrapper">
      <div class="home-way__white-wrapper">
        <div class="home-way-gallery desk-view">
        	<?php
        	while ( have_rows('new_way_gallery_desk') ) : the_row(); ?>
			  		<img src="<?php echo get_sub_field('new_way_gallery_image')['url']; ?>" alt="<?php echo get_sub_field('new_way_gallery_image')['alt'] ?>">
			    <?php
			  	endwhile;
			  	?>
        </div>
        <div class="home-way-gallery-mobi mobi-view">
        	<div class="way-callery-mobi-up">
        		<?php
	        	while ( have_rows('new_way_gallery_mobi_up') ) : the_row(); ?>
				  		<img src="<?php echo get_sub_field('way_gallery_mobi_up_image')['url']; ?>" alt="<?php echo get_sub_field('way_gallery_mobi_up_image')['alt'] ?>">
				    <?php
				  	endwhile;
				  	?>
        	</div>
        	<div class="way-callery-mobi-down">
        		<?php
	        	while ( have_rows('new_way_gallery_mobi_down') ) : the_row(); ?>
				  		<img src="<?php echo get_sub_field('way_gallery_mobi_down_image')['url']; ?>" alt="<?php echo get_sub_field('way_gallery_mobi_down_image')['alt'] ?>">
				    <?php
				  	endwhile;
				  	?>
        	</div>
        </div>
        <div class="home-way-content">
          <div class="home-way__content-inner">
            <h2><?php echo get_field('new_way_title') ?></h2>
            <label><?php echo get_field('new_way_sub_title') ?></label>
            <div class="home-way-description">
              <p><?php echo get_field('new_way_up_content') ?></p>
              <ul class="block-social">
              	<?php
			        	while ( have_rows('new_way_social') ) : the_row(); ?>
						  		<li><img src="<?php echo get_sub_field('new_way_social_icon_image')['url']; ?>" alt="<?php echo get_sub_field('new_way_social_icon_image')['alt'] ?>"></li>
						    <?php
						  	endwhile;
						  	?>
              </ul>
              <p><?php echo get_field('new_way_bottom_content') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-home-submit">
    <div class="block-home-submit__content">
      
      <div class="home-submit-text">
        <h2><?php echo get_field('get_started_title') ?></h2>
        <p><?php echo get_field('get_started_content') ?></p>
      </div>
    </div>
    <style>
    	.block-home-submit__content {
    		background-image: url('<?php echo get_stylesheet_directory_uri() ?>/assets/images/home_form_bg.jpg');
    	}
    </style>
    <div class="block-home-submit__form">
    	<?php echo do_shortcode(get_field('get_started_form')) ?>
    </div>
  </div>
</main>


<?php get_footer(); ?>
