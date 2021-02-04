<?php
/**
 * Template Name: FAQ Backup Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="faq-page">

    <?php if( have_rows('faq_hero_group')) :
        $faq_hero_group = get_field('faq_hero_group');
        $hero_background_image_url = $faq_hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $faq_hero_group['hero_background_image']['alt'];
        $hero_heading = $faq_hero_group['hero_heading'];
        $hero_description = $faq_hero_group['hero_description'];
        $hero_down_arrow_img_url = $faq_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_img_alt = $faq_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('faq_hero_group')): the_row(); ?>
            <section class="faq-hero" style="background-image: url(<?php echo $hero_background_image_url ?>)">
                <div class="faq-hero__inner">
                    <h1><?php echo $hero_heading ?></h1>
                    <p><?php echo $hero_description ?></p>
                    <img src="<?php echo $hero_down_arrow_img_url ?>" alt="<?php echo $hero_down_arrow_img_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('faq_accordion_group')) : ?>
		<?php while ( have_rows('faq_accordion_group')): the_row(); ?>
			<section class="faq-accordion">
				<div class="faq-accordion__inner inner-section-1220">
					<?php if( have_rows('accordion_repeater') ) :
						while( have_rows('accordion_repeater') ) : the_row();
						$accordion_title = get_sub_field('accordion_title');
					?>
						<div class="faq-accordion-block <?php if (get_row_index() == 1) echo 'first-accordion'; ?>">
							<h3><?php echo $accordion_title ?></h3>
							<div class="accordion-item-block">
								<?php if( have_rows('accordion_item_repeater') ) :
									while( have_rows('accordion_item_repeater') ) : the_row();
									$item_title = get_sub_field('item_title');
									$item_content = get_sub_field('item_content');
								?>
									
									<div class="accordion-item <?php if (get_row_index() == 1) echo 'active'; ?>">
										<h4><?php echo $item_title ?></h4>
										<p><?php echo $item_content ?></p>
									</div>
									
									<?php endwhile;
								endif; ?>
							</div>
						</div>
						<?php endwhile;
					endif; ?>
				</div>
			</section>
		<?php endwhile;
    endif; ?>
    
    <?php if( have_rows('faq_contact_group')) :
        $faq_contact_group = get_field('faq_contact_group');
        $contact_form_heading = $faq_contact_group['contact_form_heading'];
        $contact_form_shortcode = $faq_contact_group['contact_form_shortcode'];
        while ( have_rows('faq_contact_group')): the_row(); ?>
            <section class="faq-contact">
                <div class="faq-contact__inner">
                    <h2><?php echo $contact_form_heading ?></h2>
                    <?php echo do_shortcode($contact_form_shortcode); ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

</main>

<?php get_footer();