<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<?php
	$instagram_link = get_field('instagram_link', 'option');
	$youtube_link = get_field('youtube_link', 'option');
	$twitter_link = get_field('twitter_link', 'option');
	$facebook_link = get_field('facebook_link', 'option');
	$pinterest_link = get_field('pinterest_link', 'option');
	$podcast_link = get_field('podcast_link', 'option');

	$logo_img = get_field('logo_image', 'option')['url'];
	$logo_alt = get_field('logo_image', 'option')['alt'];

	$newsletter_group = get_field('newsletter_group', 'option');
	$newsleeter_img_url = $newsletter_group['image']['url'];
	$newsleeter_img_alt = $newsletter_group['image']['alt'];
	$newsletter_title = $newsletter_group['title'];
	$newsletter_subtitle = $newsletter_group['subtitle'];
	$newsletter_form_shortcode = $newsletter_group['form_shortcode'];

	$description_group = get_field('footer_description_group', 'option');
	$description = $description_group['description'];

	$contact_group = get_field('footer_contact_group', 'option');
	$contact_phone = $contact_group['contact_phone'];
	$contact_work_hours = $contact_group['contact_work_hours'];
	$contact_email = $contact_group['contact_email'];
?>
		<footer class="site-footer">
			<div class="footer__inner inner-section-1220">
				
				<div class="footer-newsletter">
					<img src="<?php echo $newsleeter_img_url ?>" alt="<?php echo $newsleeter_img_alt ?>">
					<h3 class="footer-newsletter__subtitle"><?php echo $newsletter_subtitle ?></h3>
					<h2 class="footer-newsletter__title"><?php echo $newsletter_title ?></h2>
					<div class="footer-newsletter__form"><?php echo $newsletter_form_shortcode ?></div>
				</div>
				
				
				<div class="footer-nav">
					<div class="footer-menu-block">
						<?php if( have_rows('footer_logo_group', 'option')) : 
							while ( have_rows('footer_logo_group', 'option')): the_row(); ?>
								<div class="footer-logo">
									<a href="/">
										<?php if ( have_rows('logo_repeater', 'option')) :
											while (have_rows('logo_repeater', 'option')) : the_row(); 
												$logo_img_url = get_sub_field('logo_image')['url'];
												$logo_img_alt = get_sub_field('logo_image')['alt'];
											?>
												<img src="<?php echo $logo_img_url ?>" alt="<?php echo $logo_img_alt ?>">
											<?php endwhile;
										endif; ?>		
									</a>
								</div>
							<?php endwhile;
						endif; ?>

						<?php if( have_rows('footer_logo_&_menu_group', 'option')) : 
							$footer_logo_menu_group = get_field('footer_logo_&_menu_group', 'option');
							?>
        					<?php while ( have_rows('footer_logo_&_menu_group', 'option')): the_row(); ?>
								<?php if ( have_rows('menu_repeater', 'option')) :
									while (have_rows('menu_repeater', 'option')) : the_row(); ?>
									<div class="footer-menu__item">
										<h5><?php echo get_sub_field('menu_label', 'option') ?></h5>
										<ul>
											<?php if ( have_rows('menu_items_repeater', 'option')) :
												while (have_rows('menu_items_repeater', 'option')) : the_row(); ?>
												<li><a href="<?php echo get_sub_field('menu_link') ?>"><?php echo get_sub_field('menu_title') ?></a></li>
												<?php endwhile;
											endif; ?>
										</ul>
									</div>
									<?php endwhile;
								endif; ?>
							<?php endwhile;
						endif; ?>

						<?php if( have_rows('footer_newsletter_group', 'option')) : 
							while ( have_rows('footer_newsletter_group', 'option')): the_row(); 
							$nav_newsletter_group = get_field('footer_newsletter_group', 'option');
							$nav_newsletter_title = $nav_newsletter_group['newsletter_title'];
							$nav_newsletter_shortcode = $nav_newsletter_group['newsletter_shortcode'];
						?>
								<div class="footer-nav-newsletter">
									<h3><?php echo $nav_newsletter_title ?></h3>
									<?php echo do_shortcode($nav_newsletter_shortcode); ?>
								</div>
							<?php endwhile;
						endif; ?>
					</div>

					
					<div class="footer-contact-social">
						<div class="footer-cs-item">
							<span class="footer-work-time"><?php echo $contact_work_hours ?></span>
						</div>
						<div class="footer-cs-item">
							<a class="footer-mobile" href="tel:<?php echo $contact_phone ?>"><?php echo $contact_phone ?></a>
						</div>
						<div class="footer-cs-item">
							<a class="footer-mail" href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>
						</div>
						<div class="footer-cs-item">
							<ul class="footer-social">
								<?php if ($instagram_link) : ?>
									<li class="footer-instagram">
										<a href="<?php echo $instagram_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="26" height="26"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
										</a>
									</li>
								<?php endif; ?>

								<?php if ($youtube_link) : ?>
									<li class="footer-youtube">
										<a href="<?php echo $youtube_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="26" height="26"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
										</a>
									</li>
								<?php endif; ?>

								<?php if ($twitter_link) : ?>
									<li class="footer-twitter">
										<a href="<?php echo $twitter_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="26" height="26"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
										</a>
									</li>
								<?php endif; ?>

								<?php if ($facebook_link) : ?>
									<li class="footer-facebook">
										<a href="<?php echo $facebook_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="26" height="26"><path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg>
										</a>
									</li>
								<?php endif; ?>

								<?php if ($pinterest_link) : ?>
									<li class="footer-pinterest">
										<a href="<?php echo $pinterest_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="26" height="26"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg>
										</a>
									</li>
								<?php endif; ?>

								<?php if ($podcast_link) : ?>
									<li class="footer-podcast">
										<a href="<?php echo $podcast_link ?>" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="26" height="26"><path d="M267.429 488.563C262.286 507.573 242.858 512 224 512c-18.857 0-38.286-4.427-43.428-23.437C172.927 460.134 160 388.898 160 355.75c0-35.156 31.142-43.75 64-43.75s64 8.594 64 43.75c0 32.949-12.871 104.179-20.571 132.813zM156.867 288.554c-18.693-18.308-29.958-44.173-28.784-72.599 2.054-49.724 42.395-89.956 92.124-91.881C274.862 121.958 320 165.807 320 220c0 26.827-11.064 51.116-28.866 68.552-2.675 2.62-2.401 6.986.628 9.187 9.312 6.765 16.46 15.343 21.234 25.363 1.741 3.654 6.497 4.66 9.449 1.891 28.826-27.043 46.553-65.783 45.511-108.565-1.855-76.206-63.595-138.208-139.793-140.369C146.869 73.753 80 139.215 80 220c0 41.361 17.532 78.7 45.55 104.989 2.953 2.771 7.711 1.77 9.453-1.887 4.774-10.021 11.923-18.598 21.235-25.363 3.029-2.2 3.304-6.566.629-9.185zM224 0C100.204 0 0 100.185 0 224c0 89.992 52.602 165.647 125.739 201.408 4.333 2.118 9.267-1.544 8.535-6.31-2.382-15.512-4.342-30.946-5.406-44.339-.146-1.836-1.149-3.486-2.678-4.512-47.4-31.806-78.564-86.016-78.187-147.347.592-96.237 79.29-174.648 175.529-174.899C320.793 47.747 400 126.797 400 224c0 61.932-32.158 116.49-80.65 147.867-.999 14.037-3.069 30.588-5.624 47.23-.732 4.767 4.203 8.429 8.535 6.31C395.227 389.727 448 314.187 448 224 448 100.205 347.815 0 224 0zm0 160c-35.346 0-64 28.654-64 64s28.654 64 64 64 64-28.654 64-64-28.654-64-64-64z"></path></svg>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>

					<div class="footer-des"><?php echo $description ?></div>
				</div>
			</div>
		</footer>

	<?php wp_footer(); ?>

	</body>
</html>
