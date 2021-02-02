<?php
/**
 * Template Name: Reviews Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="reviews-page">
    <?php if( have_rows('reviews_group')) :
        $reviews_group = get_field('reviews_group');
        $reviews_img_url = $reviews_group['image']['url'];
        $reviews_img_alt = $reviews_group['image']['alt'];
        $heading = $reviews_group['heading'];
        $sub_heading = $reviews_group['sub_heading'];
        $form_shortcode = $reviews_group['form_shortcode'];
        while ( have_rows('reviews_group')): the_row(); ?>
            <section class="reviews__inner inner-section-1366">
                <img src="<?php echo $reviews_img_url ?>" alt="<?php echo $reviews_img_alt ?>">
                <h1><?php echo $heading ?></h1>
                <h3><?php echo $sub_heading ?></h3>
                <?php echo do_shortcode($form_shortcode); ?>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();