<?php
/**
 * Template Name: Seen Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="seen-page">

    <?php if( have_rows('seen_hero_group')) :
        $seen_hero_group = get_field('seen_hero_group');
        $hero_heading = $seen_hero_group['hero_heading'];
        $hero_down_arrow_url = $seen_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_alt = $seen_hero_group['hero_down_arrow']['alt'];
        $hero_image_url = $seen_hero_group['hero_image']['url'];
        $hero_image_alt = $seen_hero_group['hero_image']['alt'];
        while ( have_rows('seen_hero_group')): the_row(); ?>
            <section class="seen-hero">
                <h1><?php echo $hero_heading ?></h1>
                <img class="seen-hero__arrow" src="<?php echo $hero_down_arrow_url ?>" alt="<?php echo $hero_down_arrow_alt ?>">
                <img class="seen-hero__img" src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>">
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('seen_items_group')) : ?>
		<?php while ( have_rows('seen_items_group')): the_row(); ?>
            <section class="seen-items">
                <div class="seen-items__inner inner-section-1220">
                    <?php if( have_rows('seen_item_repeater') ) :
						while( have_rows('seen_item_repeater') ) : the_row();
						$item_image_url = get_sub_field('item_image')['url'];
                        $item_image_alt = get_sub_field('item_image')['alt'];
                        $item_heading = get_sub_field('item_heading');
                        $item_sub_heading = get_sub_field('item_sub_heading');
                        $item_description = get_sub_field('item_description');
                        $item_button_link = get_sub_field('item_button_link');
						$image_position = get_sub_field('seen_image_position');
					?>
                        <div class="seen-item <?php if ($image_position == 'left') { echo 'left-img'; } else { echo 'right-img'; } ?>">
                            <img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                            <div class="seen-item__content">
                                <h2><?php echo $item_heading ?></h2>
                                <h4><?php echo $item_sub_heading ?></h4>
                                <p><?php echo $item_description ?></p>
                                <a href="<?php echo $item_button_link ?>">Podcast Link</a>
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