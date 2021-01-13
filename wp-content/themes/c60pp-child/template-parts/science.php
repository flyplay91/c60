<?php
/**
 * Template Name: Science Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();

?>

<main class="science-page">
    <?php if( have_rows('science_hero_group')) :
        $science_hero_group = get_field('science_hero_group');
        $hero_img_url = $science_hero_group['hero_background_image']['url'];
        $hero_img_alt = $science_hero_group['hero_background_image']['alt'];
        $hero_heading = $science_hero_group['hero_heading'];
        $hero_arrow_image_url = $science_hero_group['hero_arrow_image']['url'];
        $hero_arrow_image_alt = $science_hero_group['hero_arrow_image']['alt'];
        while ( have_rows('science_hero_group')): the_row(); ?>
            <section class="science__hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="science__hero-inner">
                    <h1><?php echo $hero_heading ?></h1>
                    <img src="<?php echo $hero_arrow_image_url ?>" alt="<?php echo $hero_arrow_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <section class="science__breadcrumb">
        <div class="science__breadcrumb__inner inner-section-1220">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </section>

    <?php if( have_rows('science_item_group')) :
        while ( have_rows('science_item_group')): the_row(); ?>
            <section class="science__items">
                <div class="science__items__inner inner-section-1220">
                    <?php if( have_rows('item_repeater') ) :
                        while( have_rows('item_repeater') ) : the_row();
                        
                        $item_image_url = get_sub_field('item_image')['url'];
                        $item_image_alt = get_sub_field('item_image')['alt'];
                        $item_title = get_sub_field('item_title');
                    ?>
                        <div class="science__item">
                            <img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                            <h3><?php echo $item_title ?></h3>
                            <div class="sceince__item_links">
                                <?php if( have_rows('item_link_repeater') ) :
                                    while( have_rows('item_link_repeater') ) : the_row();
                                    $item_text = get_sub_field('item_text');
                                ?>
                                    <span><?php echo $item_text ?></span>
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
</main>

<?php get_footer();