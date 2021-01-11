<?php
/**
 * Template Name: Wholesale Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="wholesale-page">
    <?php if( have_rows('wholesale_hero_group')) :
        $wholesale_hero_group = get_field('wholesale_hero_group');
        $hero_background_image_url = $wholesale_hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $wholesale_hero_group['hero_background_image']['alt'];
        $hero_heading = $wholesale_hero_group['hero_heading'];
        $hero_down_arrow_url = $wholesale_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_alt = $wholesale_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('wholesale_hero_group')): the_row(); ?>
            <section class="wholesale-hero" style="background-image: url(<?php echo $hero_background_image_url ?>)">
                <div class="wholesale-hero__inner">
                    <h1><?php echo $hero_heading ?></h1>
                    <img src="<?php echo $hero_down_arrow_url ?>" alt="<?php echo $hero_down_arrow_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('wholesale_image_text_group')) :
        $wholesale_image_text_group = get_field('wholesale_image_text_group');
        $image_url = $wholesale_image_text_group['image']['url'];
        $image_alt = $wholesale_image_text_group['image']['alt'];
        $text_heading = $wholesale_image_text_group['text_heading'];
        $text_sub_heading = $wholesale_image_text_group['text_sub_heading'];
        $text_description = $wholesale_image_text_group['text_description'];
        $full_description = $wholesale_image_text_group['full_description'];
        while ( have_rows('wholesale_image_text_group')): the_row(); ?>
            <section class="wholesale-img-text">
                <div class="wholesale-img-text__inner inner-section-1220">
                    <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>">
                    <div class="wholesale-text-block">
                        <h2><?php echo $text_heading ?></h2>
                        <h3><?php echo $text_sub_heading ?></h3>
                        <p><?php echo $text_description ?></p>
                    </div>
                </div>
                <div class="wholesale-full-text__inner inner-section-1120">
                    <p><?php echo $full_description ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('wholesale_product_group')) :
        $wholesale_product_group = get_field('wholesale_product_group');
        $product_heading = $wholesale_product_group['product_heading'];
        $product_description = $wholesale_product_group['product_description'];
        $product_left_image_url = $wholesale_product_group['product_left_image']['url'];
        $product_left_image_alt = $wholesale_product_group['product_left_image']['alt'];
        $product_right_image_url = $wholesale_product_group['product_right_image']['url'];
        $product_right_image_alt = $wholesale_product_group['product_right_image']['alt'];
        while ( have_rows('wholesale_product_group')): the_row(); ?>
            <section class="wholesale-product">
                <h3><?php echo $product_heading ?></h3>
                <p><?php echo $product_description ?></p>
                <div class="wholesale-product__images">
                    <img src="<?php echo $product_left_image_url ?>" alt="<?php echo $product_left_image_alt ?>">
                    <img src="<?php echo $product_right_image_url ?>" alt="<?php echo $product_right_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('wholesale_accordion_group')) : ?>
		<?php while ( have_rows('wholesale_accordion_group')): the_row(); ?>
			<section class="wholesale-accordion">
				<div class="wholesale-accordion__inner inner-section-1440">
					<?php if( have_rows('accordion_repeater') ) :
						while( have_rows('accordion_repeater') ) : the_row();
						$accordion_title = get_sub_field('accordion_title');
					?>
						<div class="wholesale-accordion-block <?php if (get_row_index() == 1) echo 'first-accordion'; ?>">
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
    
    <?php if( have_rows('wholesale_form_group')) :
        $wholesale_form_group = get_field('wholesale_form_group');
        $form_heading = $wholesale_form_group['form_heading'];
        $form_image_url = $wholesale_form_group['form_image']['url'];
        $form_image_alt = $wholesale_form_group['form_image']['alt'];
        $form_shortcode = $wholesale_form_group['form_shortcode'];
        while ( have_rows('wholesale_form_group')): the_row(); ?>
            <section class="wholesale-form">
                <h2><?php echo $form_heading ?></h2>
                <div class="wholesale-form__inner inner-section-1440">
                    <div class="wholesale-form-block">
                        <?php echo do_shortcode($form_shortcode); ?>
                    </div>
                    <div class="wholesale-form-img">
                        <img src="<?php echo $form_image_url ?>" alt="<?php echo $form_image_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php
get_footer();