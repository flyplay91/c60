<?php
/**
 * Template Name: Health Benefits Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>
<main class="health-benefits-page">
<?php
    if( have_rows('health_benefits_group')) :
    $benefits_group = get_field('health_benefits_group');
    $benefits_logo_url = $benefits_group['logo']['url'];
    $benefits_logo_alt = $benefits_group['logo']['alt'];
    $benefits_title = $benefits_group['title'];
    while ( have_rows('health_benefits_group')): the_row(); ?>
    <section class="home-benefits">
        <div class="home-benefits__inner inner-section-1366">
            <img src="<?php echo $benefits_logo_url ?>" alt="<?php echo $benefits_logo_alt ?>">
            <h3 class="home-benefits__title"><?php echo $benefits_title ?></h3>
            <div class="home-benefits__items">
                <?php if( have_rows('benefits_repeater') ) :
                    while( have_rows('benefits_repeater') ) : the_row();
                        $benefits_img_url = get_sub_field('image')['url'];
                        $benefits_img_alt = get_sub_field('image')['alt'];
                        $benefits_heading = get_sub_field('heading');
                        $benefits_description = get_sub_field('description');
                        $benefits_button_link = get_sub_field('button_link');
                    ?>
                        <div class="home-benefits__item--img-text">
                            <a href="<?php echo $benefits_button_link ?>"><img src="<?php echo $benefits_img_url ?>" alt="<?php echo $benefits_img_alt ?>"></a>
                            <div class="home-benefits__item--text">
                                <h3><a href="<?php echo $benefits_button_link ?>"><?php echo $benefits_heading ?></a></h3>
                                <p><?php echo $benefits_description ?></p>
                                <a href="<?php echo $benefits_button_link ?>" class="home-benefits-btn">Read More</a>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <?php endwhile;
endif; ?>
</main>
<?php get_footer(); ?>