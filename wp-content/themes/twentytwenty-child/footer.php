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
			<div class="footer__inner inner-section-1366">
				
				<!-- <div class="footer-newsletter">
					<img src="<?php echo $newsleeter_img_url ?>" alt="<?php echo $newsleeter_img_alt ?>">
					<h3 class="footer-newsletter__subtitle"><?php echo $newsletter_subtitle ?></h3>
					<h2 class="footer-newsletter__title"><?php echo $newsletter_title ?></h2>
					<div class="footer-newsletter__form"><?php echo $newsletter_form_shortcode ?></div>
				</div> -->
				
				
				<div class="footer-nav">
					<div class="footer-menu-block">
						<?php if( have_rows('footer_logo_group', 'option')) : 
							while ( have_rows('footer_logo_group', 'option')): the_row(); ?>
								<div class="footer-logo">
									<a href="https://c60purplepower.com" title="C60 Purple Power">
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

					<?php if( have_rows('footer_badge_group', 'option')) : 
							while ( have_rows('footer_badge_group', 'option')): the_row(); ?>
								<div class="footer-logo footer-badge">
									
										<?php if ( have_rows('logo_repeater', 'option')) :
											while (have_rows('logo_repeater', 'option')) : the_row(); 
												$logo_img_url = get_sub_field('logo_image')['url'];
												$logo_img_alt = get_sub_field('logo_image')['alt'];
											?>
												<img src="<?php echo $logo_img_url ?>" alt="<?php echo $logo_img_alt ?>">
											<?php endwhile;
										endif; ?>		
									
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
						
					</div>

					<div class="footer-des"><?php echo $description ?></div>
				</div>
			</div>
		</footer>

	<?php wp_footer(); ?>

	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f7e322bf0e7167d0017134a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

		

	</body>
</html>
