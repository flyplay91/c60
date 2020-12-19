<?php
/**
 * Template Name: VCSG Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="main vcsg-main" id="site-content">
	<div class="section-vcsg-gallery">
		<div class="vcsg-gallery__left">
			<iframe width="100%" src="<?php echo get_field('gallery_left_image') ?>'&amp;modestbranding=1&amp;showinfo=0'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="vcsg-gallery__right">
			<?php
				$repeater = get_field('gallery_right_block');
				$order = array();

				foreach( $repeater as $i => $row ) { 
					if ($i > 3) break;
					$order[ $i ] = $row['gallery_right_image']['url']; 
				?>
					<img src="<?php echo $order[ $i ]; ?>">
				<?php
				}
	  	?>
		</div>
		<div class="vcsg-gallery-more">
			<a href="javascript: void(0)">View Photos</a>
		</div>


	</div>

	<div class="section-vcsg-gallery-slider">
		<div class="vcsg-gallery-slider__inner">
			<div class="btn-cancel-vcsg-gallery">
				<a href="javascript:void(0)">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/icon_cancel_btn.png">
				</a>
			</div>
			<div class="gallery__slider-main">
				<?php
			    while ( have_rows('gallery_right_block') ) : the_row(); ?>
					<div>
						<img src="<?php echo get_sub_field('gallery_right_image')['url']; ?>" alt="<?php echo get_sub_field('gallery_right_image')['alt'] ?>">
					</div>
					<?php
			  	endwhile;
				?>
			</div>
			<div class="gallery__slider-thumb">
				<?php
			    while ( have_rows('gallery_right_block') ) : the_row(); ?>
					<div>
						<img src="<?php echo get_sub_field('gallery_right_image')['url']; ?>" alt="<?php echo get_sub_field('gallery_right_image')['alt'] ?>">
					</div>
					<?php
			  	endwhile;
				?>
			</div>
		</div>
	</div>

	<div class="section-vcsg-veterinary-group">
		<h3 class="desk-view"><?php echo get_field('vcsg_veterinary_specialty_title') ?></h3>
		<h3 class="mobi-view"><?php echo get_field('vcsg_veterinary_specialty_title_mobile') ?></h3>
		<div class="block-vcsg-veterinary">
			<h4><?php echo get_field('vcsg_veterinary_title') ?></h4>
			<h5>Available Positions</h5>

			<div class="vcsg-positions vcsg-positions--less">
				<?php
					$vcsg_positions_repeater = get_field('vcsg_veterinary_positions');
					$vcsg_positions_order = array();

					foreach( $vcsg_positions_repeater as $i => $row ) {
						if ($i > 3) break;
						$vcsg_positions_order[ $i ] = $row['veterinary_position_title']; 
						$vcsg_positions_content[ $i ] = $row['veterinary_position_content']; 
					?>
						<div class="vcsg-position-item">
		          <div class="vcsg-job-item">
		            <span><?php echo $vcsg_positions_order[ $i ] ?></span>
		            <a href="javascript: void(0)">Apply Now</a>
		          </div>
		          <div class="vcsg-job-content">
		          	<p><?php echo $vcsg_positions_content[ $i ] ?></p>
		          </div>
		        </div>
					<?php
					}
		  	?>
      </div>

			<div class="vcsg-positions vcsg-positions--more">
				<?php
			    while ( have_rows('vcsg_veterinary_positions') ) : the_row(); ?>
			  		<div class="vcsg-position-item">
		          <div class="vcsg-job-item">
		            <span><?php echo the_sub_field('veterinary_position_title') ?></span>
		            <a href="javascript: void(0)">Apply Now</a>
		          </div>
		          <div class="vcsg-job-content">
		          	<p><?php echo the_sub_field('veterinary_position_content') ?></p>
		          </div>
		        </div>
			    <?php
			  	endwhile;
				?>
      </div>
			
      <div class="btn-more-positions">
      	<a href="javascript: void(0)">More Positions</a>
      </div>

      <div class="vcsg-positions-popup">
      	<div class="vcsg-positions-popup__inner">
      		<div class="btn-vcsg-position-cancel">
      			<a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/icon_cancel_white_btn.png"></a>
      		</div>
	      	<h4 class="vcsg-position-name">Name of Position</h4>
	    		<?php echo do_shortcode(get_field('vcsg_veterinary_position_form')) ?>
	    	</div>
      </div>

      <!-- <div class="vcsg-positions-popup-success">
      	<div class="vcsg-positions-popup-success__inner">
	      	<h5>Thank you very much<br>for your application and interest in<br>Veterinary Care and Specialty Group!</h5>
	    		<div class="btn-vcsg-position-success-cancel">
      			<a href="javascript:void(0)">Close</a>
      		</div>
	    	</div>
      </div> -->
		</div>

		<div class="block-vcsg-group">
			<h4><?php echo get_field('vcsg_specialty_title') ?></h4>
			<ul>
				<?php
			    while ( have_rows('vcsg_specialty_group_options') ) : the_row(); ?>
					<li>
						<img src="<?php echo get_sub_field('specialty_option_image')['url']; ?>" alt="<?php echo get_sub_field('specialty_option_image')['alt'] ?>">
						<span><?php echo the_sub_field('specialty_option_title') ?></span>
					</li>
					<?php
			  	endwhile;
				?>
			</ul>
			<div class="vcsg-group-content-features">
				<div class="vcsg-group-content">
					<p><?php echo get_field('vcsg_specialty_description') ?></p>
				</div>
				<div class="vcsg-group-features">
					<label>Job Features</label>
					<ul>
						<?php
					    while ( have_rows('vcsg_specialty_job_features') ) : the_row(); ?>
					    	<li><?php echo the_sub_field('specialty_job_item') ?></li>
				    	<?php
					  	endwhile;
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="block-vcsg-instagram">
			<h4><?php echo get_field('vcsg_instagram_title') ?></h4>
			<div class="vcsg-instagram-items">
				<?php echo do_shortcode(get_field('vcsg_instagram_username')) ?>
			</div>
		</div>
	</div>

	<div class="section-vcsg-city">
		<h4><?php echo get_field('vcsg_city_title') ?></h4>
		<div class="section-vcsg-city__inner">
			<div class="block-vcsg-city-map mobi-view">
				<h4>Location</h4>
				<img src="<?php echo esc_url(get_field('vcsg_location_map')['url']); ?>" alt="<?php echo esc_attr(get_field('vcsg_location_map')['alt']); ?>" />
			</div>
			<div class="block-vcsg-city-left">
				<div class="vcsg-terrain">
					<h4>Terrain</h4>
					<ul>
						<?php
			      	while ( have_rows('vcsg_terrain') ) : the_row(); ?>
					  		<li>
					  			<img src="<?php echo get_sub_field('terrain_image')['url']; ?>" alt="<?php echo get_sub_field('terrain_image')['alt'] ?>">
					  			<label><?php echo get_sub_field('terrain_label'); ?></label>

					  		</li>
					    <?php
					  	endwhile;
				  	?>
					</ul>
				</div>
				<div class="vcsg-major">
					<h4>Major Attractions</h4>
					<ul>
						<?php
					    while ( have_rows('vcsg_major_attractions') ) : the_row(); ?>
					    	<li><?php echo the_sub_field('major_attraction_item') ?></li>
				    	<?php
					  	endwhile;
						?>
					</ul>
				</div>
				<div class="vcsg-weather">
					<h4>Weather</h4>
					<ul class="vcsg-weather-table">
						<?php
					    while ( have_rows('vcsg_weather_table') ) : the_row(); ?>
					    	<li>
					    		<span><?php echo the_sub_field('weather_table_temperature') ?></span>
					    		<label><?php echo the_sub_field('weather_table_number') ?></label>
					    	</li>
				    	<?php
					  	endwhile;
						?>
					</ul>
					<ul class="vcsg-weather-box">
						<?php
					    while ( have_rows('vcsg_weather_box') ) : the_row(); ?>
					    	<li>
					    		<label class="high-temp"><?php echo the_sub_field('weather_box_high_temperature') ?></label>
					    		<span>High</span>
					    		<label class="low-temp"><?php echo the_sub_field('weather_box_low_temperature') ?></label>
					    		<span>Low</span>
					    		<hr>
					    		<label class="season-name"><?php echo the_sub_field('weather_box_season') ?></label>
					    		<span>Avg Temp</span>
					    	</li>
				    	<?php
					  	endwhile;
						?>
					</ul>
				</div>
			</div>
			<div class="block-vcsg-city-right">
				<div class="vcsg-map desk-view">
					<h4>Location</h4>
					<img src="<?php echo esc_url(get_field('vcsg_location_map')['url']); ?>" alt="<?php echo esc_attr(get_field('vcsg_location_map')['alt']); ?>" />
				</div>
				<div class="vcsg-population">
					<div class="vcsg-population__content">
						<h4>Populations</h4>
						<p><?php echo get_field('vcsg_population_content') ?></p>
					</div>
					<div class="vcsg-population__value">
						<?php
						while ( have_rows('vcsg_population_value') ) : the_row(); ?>
				    	<div class="vcsg-population--item">
				    		<label><?php echo the_sub_field('population_value_number') ?></label>
								<span><?php echo the_sub_field('population_value_text') ?></span>
				    	</div>
			    	<?php
				  	endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section-vcsg-graphic">
		<h4><?php echo get_field('vcsg_graphics_title') ?></h4>
		<label><?php echo get_field('vcsg_graphics_sub_title') ?></label>
		<div class="block-vcsg-graphic-race">
			<div class="graphic-race-circle">
				<div class="race-circle">
					<div class="race-circle__left">
						<img src="<?php echo esc_url(get_field('vcsg_graphics_circle_image')['url']); ?>" alt="<?php echo esc_attr(get_field('vcsg_graphics_circle_image')['alt']); ?>" />
					</div>
					<div class="race-circle__right">
						<ul>
							<?php
						    while ( have_rows('vcsg_graphics_percent') ) : the_row(); ?>
						  		<li>
										<label><?php echo the_sub_field('graphics_percent_title') ?></label>
										<span><?php echo the_sub_field('graphics_percent_number') ?></span>
									</li>
						    <?php
						  	endwhile;
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="graphic-race-table">
				<ul>
					<?php
				    while ( have_rows('vcsg_graphics_age_percent') ) : the_row(); ?>
				  		<li>
								<label><?php echo the_sub_field('graphics_age_percent_title') ?></label>
								<span><?php echo the_sub_field('graphics_age_percent_number') ?></span>
							</li>
				    <?php
				  	endwhile;
					?>
				</ul>
			</div>
		</div>
		<div class="block-vcsg-graphic-sex">
			<?php
		    while ( have_rows('vcsg_graphic_gender_percent') ) : the_row(); ?>
		  		<div class="vcsg-graphic-sex-item">
						<label><?php echo the_sub_field('gender_percent_number') ?></label>
						<span><?php echo the_sub_field('gender_percent_title') ?></span>
					</div>
		    <?php
		  	endwhile;
			?>
		</div>
		<div class="block-vcsg-graphic-marital">
			<label>Marital Status</label>
			<div class="vcsg-graphic-marital">
				<?php
		    	while ( have_rows('vcsg_graphic_marital_status') ) : the_row(); ?>
					<div class="vcsg-graphic-marital-item">
						<label><?php echo the_sub_field('marital_status_title') ?></label>
						<img src="<?php echo get_sub_field('marital_status_image')['url']; ?>" alt="<?php echo get_sub_field('marital_status_image')['alt'] ?>">
					</div>
					<?php
			  	endwhile;
				?>
			</div>
		</div>
	</div>

	<div class="section-vcsg-education">
		<h4><?php echo get_field('vcsg_education_income_emplyment_title') ?></h4>
		<div class="block-vcsg-education-poverty">
			<div class="vcsg-education">
				<label><?php echo get_field('vcsg_education_title') ?></label>
				<ul>
					<?php
			    	while ( have_rows('vcsg_education_option') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('education_option_title') ?></label>
							<span><?php echo the_sub_field('education_option_value') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
			<div class="vcsg-poverty">
				<label><?php echo get_field('vcsg_poverty_title') ?></label>
				<ul>
					<?php
			    	while ( have_rows('vcsg_poverty_option') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('poverty_option_title') ?></label>
							<span><?php echo the_sub_field('poverty_option_value') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
		</div>
		<div class="block-vcsg-income">
			<label><?php echo get_field('vcsg_income_title') ?></label>
			<img class="desk-view" src="<?php echo esc_url(get_field('vcsg_income_image')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_income_image')['alt']) ?>">
			<img class="mobi-view" src="<?php echo esc_url(get_field('vcsg_income_image_mobile')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_income_image_mobile')['alt']) ?>">
		</div>
		<div class="block-vcsg-employment">
			<label><?php echo get_field('vcsg_employment_title') ?></label>
			<img class="desk-view" src="<?php echo esc_url(get_field('vcsg_employment_image')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_employment_image')['alt']); ?>">
			<img class="mobi-view" src="<?php echo esc_url(get_field('vcsg_employment_image_mobile')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_employment_image_mobile')['alt']); ?>">
		</div>
	</div>

	<div class="section-vcsg-housing">
		<h4><?php echo get_field('vcsg_housing_title') ?></h4>
		<div class="block-vcsg-housing__up block-vcsg--housing">
			<div class="vcsg-housing-median">
				<label><?php echo get_field('vcsg_housing_first_median_price') ?></label>
				<span><?php echo get_field('vcsg_housing_first_median_text') ?></span>
			</div>
			<div class="vcsg-housing-type-box">
				<div class="housing-type-box-household">
					<label>HouseHold Types</label>
					<ul>
						<?php
				    	while ( have_rows('vcsg_housing_types') ) : the_row(); ?>
							<li><?php echo the_sub_field('housing_type_name') ?></li>
							<?php
					  	endwhile;
						?>
					</ul>
				</div>
				<div class="housing-type-box-owner">
					<label>Owner</label>
					<ul>
						<?php
				    	while ( have_rows('vcsg_housing_types') ) : the_row(); ?>
							<li><?php echo the_sub_field('housing_type_owner') ?></li>
							<?php
					  	endwhile;
						?>
					</ul>
				</div>
				<div class="housing-type-box-renter">
					<label>Renter</label>
					<ul>
						<?php
				    	while ( have_rows('vcsg_housing_types') ) : the_row(); ?>
							<li><?php echo the_sub_field('housing_type_renter') ?></li>
							<?php
					  	endwhile;
						?>
					</ul>
				</div>
			</div>
			<div class="vcsg-housing-type-table desk-view">
				<ul>
					<?php
			    	while ( have_rows('vcsg_housing_sizes') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('housing_size_title') ?></label>
							<span><?php echo the_sub_field('housing_size_value') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
		</div>

		<div class="block-vcsg-housing__down block-vcsg--housing">
			<div class="vcsg-housing-median">
				<label><?php echo get_field('vcsg_housing_second_median_price') ?></label>
				<span><?php echo get_field('vcsg_housing_second_median_text') ?></span>
			</div>
			<div class="vcsg-housing-owner-renter-percent">
				<ul>
					<?php
			    	while ( have_rows('vcsg_housing_owners_percent') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('housing_owner_percent') ?></label>
							<span><?php echo the_sub_field('housing_owner_percent_title') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
			<div class="vcsg-housing-type-table mobi-view">
				<ul>
					<?php
			    	while ( have_rows('vcsg_housing_sizes') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('housing_size_title') ?></label>
							<span><?php echo the_sub_field('housing_size_value') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
			<div class="vcsg-housing-graphic">
				<label><?php echo get_field('vcsg_housing_type_title') ?></label>
				<img src="<?php echo esc_url(get_field('vcsg_housing_type_image')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_housing_type_image')['alt']); ?>">
				<ul>
					<?php
			    	while ( have_rows('vcsg_housing_type_options') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('housing_type_option') ?></label>
							<span><?php echo the_sub_field('housing_type_option_percent') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="section-vcsg-transportation">
		<h4><?php echo get_field('vcsg_transportation_title') ?></h4>
		<div class="block-available-transportation">
			<div class="available-transportation-time">
				<p><?php echo get_field('vcsg_transportation_content') ?></p>
				<img src="<?php echo esc_url(get_field('vcsg_transportation_clock_image')['url']); ?>" alt="<?php echo esc_url(get_field('vcsg_transportation_clock_image')['alt']); ?>">
			</div>
			<div class="available-transportation-public">
				<label>Available Public Transportation</label>
				<ul>
					<?php
			    	while ( have_rows('vcsg_available_transportation') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('available_transportation_text') ?></label>
						</li>
						<?php
				  	endwhile;
					?>
				</ul>
			</div>
		</div>
		<div class="block-airports-transportation">
			<label>Airports</label>
			<ul>
				<?php
		    	while ( have_rows('vcsg_transportation_airports') ) : the_row(); ?>
					<li>
						<img src="<?php echo get_sub_field('transportation_airport_image')['url']; ?>" alt="<?php get_sub_field('transportation_airport_image')['alt']; ?>">
						<ul>
							<li><?php echo the_sub_field('transportation_airport_first_text') ?></li>
							<li><?php echo the_sub_field('transportation_airport_second_text') ?></li>
							<li><?php echo the_sub_field('transportation_airport_third_text') ?></li>
						</ul>
					</li>
					<?php
			  	endwhile;
				?>
			</ul>
		</div>
	</div>

	<div class="section-vcsg-school">
		<div class="block-vcsg-school">
			<h4><?php echo get_field('vcsg_school_title') ?></h4>
			<ul>
				<?php
			    	while ( have_rows('vcsg_scholl_options') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('school_option_title') ?></label>
							<span><?php echo the_sub_field('school_option_value') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
			</ul>
		</div>
		<div class="block-vcsg-top-school">
			<h4><?php echo get_field('vcsg_top_school_title') ?></h4>
			<ul>
				<?php
			    	while ( have_rows('vcsg_top_school_options') ) : the_row(); ?>
						<li>
							<label><?php echo the_sub_field('top_school_option_value') ?></label>
							<span><?php echo the_sub_field('top_school_option_title') ?></span>
						</li>
						<?php
				  	endwhile;
					?>
			</ul>
		</div>
	</div>

	<div class="section-vcsg-news">
		<h4><?php echo get_field('vcsg_news_title') ?></h4>
		<ul>
			<?php
	    	while ( have_rows('vcsg_news_options') ) : the_row(); ?>
				<li>
					<label><?php echo the_sub_field('news_option_title') ?></label>
					<a target="_blank" href="<?php echo the_sub_field('news_option_button_url') ?>">View Story</a>
				</li>
				<?php
		  	endwhile;
			?>
		</ul>
	</div>

	<div class="section-vcsg-event">
		<h4><?php echo get_field('vcsg_events_title') ?></h4>
		<ul>
			<?php
	    	while ( have_rows('vcsg_events_options') ) : the_row(); ?>
				<li>
					<a target="_blank" href="<?php echo the_sub_field('events_option_url') ?>"><?php echo the_sub_field('events_option_title') ?></a>
				</li>
				<?php
		  	endwhile;
			?>
		</ul>
	</div>

	<div class="section-vcsg-apply">
		<a href="javascript: void(0)">Apply Now</a>
	</div>
</main>


<?php get_footer(); ?>