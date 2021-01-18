<?php
/**
 * Template Name: Ambassador Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="ambassador-page">

    <?php if( have_rows('ambassador_hero_group')) :
        $ambassador_hero_group = get_field('ambassador_hero_group');
        $hero_img_url = $ambassador_hero_group['hero_background_image']['url'];
        $hero_img_alt = $ambassador_hero_group['hero_background_image']['alt'];
        $hero_heading = $ambassador_hero_group['hero_heading'];
        $hero_sub_heading = $ambassador_hero_group['hero_sub_heading'];
        $hero_down_arrow_img_url = $ambassador_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_img_alt = $ambassador_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('ambassador_hero_group')): the_row(); ?>
            <section class="ambassador-hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="ambassador-hero__inner">
                    <h1><?php echo $hero_heading ?></h1>
                    <p><?php echo $hero_sub_heading ?></p>
                    <img src="<?php echo $hero_down_arrow_img_url ?>" alt="<?php echo $hero_down_arrow_img_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('ambassador_team_group')) :
        $ambassador_team_group = get_field('ambassador_team_group');
        $team_image_url = $ambassador_team_group['team_image']['url'];
        $team_image_alt = $ambassador_team_group['team_image']['alt'];
        $team_short_description = $ambassador_team_group['team_short_description'];
        $team_description = $ambassador_team_group['team_description'];
        while ( have_rows('ambassador_team_group')): the_row(); ?>
            <section class="ambassador-team">
                <div class="ambassador-team__inner inner-section-1220">
                    <div class="ambassador-team__img-text">
                        <img src="<?php echo $team_image_url ?>" alt="<?php echo $team_image_alt ?>" class="ambassador-team__img">
                        <div class="ambassador-team__text"><?php echo $team_short_description ?></div>
                    </div>
                    <p><?php echo $team_description ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('ambassador_product_group')) :
        $ambassador_product_group = get_field('ambassador_product_group');
        $product_heading = $ambassador_product_group['product_heading'];
        $product_description = $ambassador_product_group['product_description'];
        $product_left_image_url = $ambassador_product_group['product_left_image']['url'];
        $product_left_image_alt = $ambassador_product_group['product_left_image']['alt'];
        $product_right_image_url = $ambassador_product_group['product_right_image']['url'];
        $product_right_image_alt = $ambassador_product_group['product_right_image']['alt'];
        while ( have_rows('ambassador_product_group')): the_row(); ?>
            <section class="ambassador-products">
                <h3><?php echo $product_heading ?></h3>
                <p><?php echo $product_description ?></p>
                <div class="ambassador-products__images">
                    <img src="<?php echo $product_left_image_url ?>" alt="<?php echo $product_left_image_alt ?>">
                    <img src="<?php echo $product_right_image_url ?>" alt="<?php echo $product_right_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('ambassador_benefits_group')) : 
        $ambassador_benefits_group = get_field('ambassador_benefits_group');
        $benefits_icon_url = $ambassador_benefits_group['benefits_icon']['url'];
        $benefits_icon_alt = $ambassador_benefits_group['benefits_icon']['alt'];
        $benefits_heading = $ambassador_benefits_group['benefits_heading'];
        $benefits_descriptoin = $ambassador_benefits_group['benefits_descriptoin'];
        while ( have_rows('ambassador_benefits_group')): the_row(); ?>
            <section class="ambassador-benefits">
                <img src="<?php echo $benefits_icon_url ?>" alt="<?php echo $benefits_icon_alt ?>">
                <h2><?php echo $benefits_heading ?></h2>
                <p><?php echo $benefits_descriptoin ?></p>
                <div class="ambassador-benefits__inner inner-section-1220">
                    <?php if( have_rows('benefits_item_repeater') ) :
						while( have_rows('benefits_item_repeater') ) : the_row();
						$item_image_url = get_sub_field('item_image')['url'];
                        $item_image_alt = get_sub_field('item_image')['alt'];
                        $item_heading = get_sub_field('item_heading');
                        $item_sub_heading = get_sub_field('item_sub_heading');
                        $item_description = get_sub_field('item_description');
                        $item_button_link = get_sub_field('item_button_link');
						$image_position = get_sub_field('image_position');
					?>
                        <div class="ambassador-benefit <?php if ($image_position == 'left') { echo 'left-img'; } else { echo 'right-img'; } ?>">
                            <img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                            <div class="ambassador-benefit__content">
                                <h2><?php echo $item_heading ?></h2>
                                <h4><?php echo $item_sub_heading ?></h4>
                                <p><?php echo $item_description ?></p>
                            </div>
                        </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();
