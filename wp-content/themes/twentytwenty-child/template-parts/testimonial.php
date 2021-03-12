<?php
/**
 * Template Name: Testimonial Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="testimonial-page">

    <?php if( have_rows('breadcrumb_group')) : 
        $breadcrumb_group = get_field('breadcrumb_group');
        $breadcrumb_text = $breadcrumb_group['breadcrumb_text'];
        
        while ( have_rows('breadcrumb_group')): the_row(); ?>
            <div class="page-breadcrumb inner-section-1366">
                <?php echo $breadcrumb_text ?>
            </div>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('testimonial_hero_group')) :
        $testimonial_hero_group = get_field('testimonial_hero_group');
        $hero_heading = $testimonial_hero_group['hero_heading'];
        $hero_sub_heading = $testimonial_hero_group['hero_sub_heading'];
        $hero_img_url = $testimonial_hero_group['hero_image']['url'];
        $hero_img_alt = $testimonial_hero_group['hero_image']['alt'];
        $hero_down_arrow_img_url = $testimonial_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_img_alt = $testimonial_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('testimonial_hero_group')): the_row(); ?>
            <section class="testimonial-hero">
                <div class="testimonial-hero__inner inner-section-1366">
                    <div class="testimonial-hero__content">
                        <h1><?php echo $hero_heading ?></h1>
                        <p><?php echo $hero_sub_heading ?></p>
                        <img src="<?php echo $hero_down_arrow_img_url ?>" alt="<?php echo $hero_down_arrow_img_alt ?>">
                    </div>
                    <div class="testimonial-hero__image">
                        <img src="<?php echo $hero_img_url ?>" alt="<?php echo $hero_img_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('testimonial_form_group')) :
        $testimonial_form_group = get_field('testimonial_form_group');
        $form_heading = $testimonial_form_group['form_heading'];
        $form_shortcode = $testimonial_form_group['form_shortcode'];
        while ( have_rows('testimonial_form_group')): the_row(); ?>
            <section class="testimonial-form">
                <div class="testimonial-form__inner inner-section-1220">
                    <h3><?php echo $form_heading ?></h3>
                    <?php echo do_shortcode($form_shortcode); ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('testimonial_bottom_group')) :
        $testimonial_bottom_group = get_field('testimonial_bottom_group');
        $bottom_heading = $testimonial_bottom_group['bottom_heading'];
        $bottom_image_url = $testimonial_bottom_group['bottom_image']['url'];
        $bottom_image_alt = $testimonial_bottom_group['bottom_image']['alt'];
        while ( have_rows('testimonial_bottom_group')): the_row(); ?>
            <section class="testimonial-bottom">
                <div class="testimonial-bottom__inner inner-section-1220">
                    <h2><?php echo $bottom_heading ?></h2>
                    <img src="<?php echo $bottom_image_url ?>" alt="<?php echo $bottom_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();