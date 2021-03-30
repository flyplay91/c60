<?php
/**
 * Template Name: What C60 Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="what-c60-page">
    <?php if( have_rows('breadcrumb_group')) : 
        $breadcrumb_group = get_field('breadcrumb_group');
        $breadcrumb_text = $breadcrumb_group['breadcrumb_text'];
        
        while ( have_rows('breadcrumb_group')): the_row(); ?>
            <div class="page-breadcrumb inner-section-1366">
                <?php echo $breadcrumb_text ?>
            </div>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('what_c60_hero_group')) :
        $what_c60_hero_group = get_field('what_c60_hero_group');
        $hero_background_image_url = $what_c60_hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $what_c60_hero_group['hero_background_image']['alt'];
        $hero_heading = $what_c60_hero_group['hero_heading'];
        $hero_down_arrow_image_url = $what_c60_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_image_alt = $what_c60_hero_group['hero_down_arrow']['alt'];
        $hero_sub_heading = $what_c60_hero_group['hero_sub_heading'];
        $hero_description = $what_c60_hero_group['hero_description'];
        $hero_image_url = $what_c60_hero_group['hero_image']['url'];
        $hero_image_alt = $what_c60_hero_group['hero_image']['alt'];
        $hero_sticker_image_url = $what_c60_hero_group['hero_sticker_image']['url'];
        $hero_sticker_image_alt = $what_c60_hero_group['hero_sticker_image']['alt'];
        
        while ( have_rows('what_c60_hero_group')): the_row(); ?>
            <section class="what-c60-hero">
                <img src="<?php echo $hero_background_image_url ?>" alt="<?php echo $hero_background_image_alt ?>" class="what-c60-hero-bg-img">
                <div class="what-c60-hero__inner inner-section-1220">
                    <h1><?php echo $hero_heading ?></h1>
                    <img src="<?php echo $hero_down_arrow_image_url ?>" alt="<?php echo $hero_down_arrow_image_alt ?>" class="what-c60-hero-arrow-img">
                    <div class="what-c60-hero__img-text">
                        <div class="what-c60-hero__text">
                            <h4><?php echo $hero_sub_heading ?></h4>
                            <p><?php echo $hero_description ?></p>
                        </div>
                        <div class="what-c60-hero__img">
                            <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>" class="what-c60-hero-img">
                            <img src="<?php echo $hero_sticker_image_url ?>" alt="<?php echo $hero_sticker_image_alt ?>" class="what-c60-hero-sticker-img">
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('what_c60_top_image_text_group')) :
        while ( have_rows('what_c60_top_image_text_group')): the_row(); ?>
            <section class="what-c60-img-text">
                <div class="what-c60-img-text__inner inner-section-1220">
                    <div class="what-c60-img-text-items">
                        <?php if( have_rows('top_item_image_text_repeater') ) :
                            while( have_rows('top_item_image_text_repeater') ) : the_row();
                            $top_item_image_url = get_sub_field('top_item_image')['url'];
                            $top_item_image_alt = get_sub_field('top_item_image')['alt'];
                            $top_item_text = get_sub_field('top_item_text');
                            $top_image_position = get_sub_field('top_image_position');
                            
                        ?>
                            <div class="what-c60-img-text-item <?php if ($top_image_position == 'left') {echo 'left-img';} else {
                                echo 'right-img'; } ?>">
                                <img src="<?php echo $top_item_image_url ?>" alt="<?php echo $top_item_image_alt ?>">
                                <div class="what-c60-img"><?php echo $top_item_text ?></div>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

<?php if( have_rows('cfo_banner')) :
        $home_cfo_bottom_banner = get_field('cfo_banner');
        $cfo_banner_image_url = $home_cfo_bottom_banner['cfo_image']['url'];
        $cfo_banner_image_alt = $home_cfo_bottom_banner['cfo_image']['alt'];
        $cfo_banner_description = $home_cfo_bottom_banner['cfo_description'];
        $cfo_name = $home_cfo_bottom_banner['cfo_name'];
        $cfo_position = $home_cfo_bottom_banner['cfo_position'];
        while ( have_rows('cfo_banner')): the_row(); ?>
            <section class="home-cfo-bottom-banner">
                <div class="home-cfo-bottom-banner__inner inner-section-1220">
                    
                    <div class="home-cfo-bottom-banner__text">
                    <h2>The Health Benefits of C60</h2>
                        <h3><?php echo $cfo_banner_description ?></h3>
                    </div>

                    <div class="home-cfo-bottom-banner__img">
                        <img src="<?php echo $cfo_banner_image_url ?>" alt="<?php echo $cfo_banner_image_alt ?>">
                        <div class="home-cfo-bottom-banner__user">
                            <label><?php echo $cfo_name ?></label>
                            <span><?php echo $cfo_position ?></span>
                        </div>
                    </div>

                </div>
            </section>
        <?php endwhile;
    endif; ?>



    <?php if( have_rows('what_c60_items_group')) :
        $what_c60_items_group = get_field('what_c60_items_group');
        $items_heading = $what_c60_items_group['items_heading'];
        $items_bottom_text = $what_c60_items_group['items_bottom_text'];
        while ( have_rows('what_c60_items_group')): the_row(); ?>
            <section class="what-c60-items">
                <div class="what-c60-items__inner inner-section-1220">
                    <h3><?php echo $items_heading ?></h3>
                    <div class="what-c60-items-list">
                        <?php if( have_rows('items_repeater') ) :
                            while( have_rows('items_repeater') ) : the_row();
                            $item_left_image_url = get_sub_field('item_left_image')['url'];
                            $item_left_image_alt = get_sub_field('item_left_image')['alt'];
                            $item_left_content = get_sub_field('item_left_content');
                            $item_right_image_url = get_sub_field('item_right_image')['url'];
                            $item_right_image_alt = get_sub_field('item_right_image')['alt'];
                            $item_right_content = get_sub_field('item_right_content');
                        ?>
                            <div class="what-c60-item-list item-<?php echo get_row_index() ?>">
                                <div class="what-c60-item-list__left what-c60-item-list--img-text">
                                    <img class="what-c60-item-list--img" src="<?php echo $item_left_image_url ?>" alt="<?php echo $item_left_image_alt ?>">
                                    <div class="what-c60-item-list--text"><?php echo $item_left_content ?></div>
                                </div>
                                <div class="what-c60-item-list__right what-c60-item-list--img-text">
                                    <img class="what-c60-item-list--img" src="<?php echo $item_right_image_url ?>" alt="<?php echo $item_right_image_alt ?>">
                                    <div class="what-c60-item-list--text"><?php echo $item_right_content ?></div>
                                </div>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                    <p><?php echo $items_bottom_text ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('what_c60_image_text_group')) :
        while ( have_rows('what_c60_image_text_group')): the_row(); ?>
            <section class="what-c60-img-text">
                <div class="what-c60-img-text__inner inner-section-1220">
                    <div class="what-c60-img-text-items">
                        <?php if( have_rows('item_image_text_repeater') ) :
                            while( have_rows('item_image_text_repeater') ) : the_row();
                            $item_image_url = get_sub_field('item_image')['url'];
                            $item_image_alt = get_sub_field('item_image')['alt'];
                            $item_text = get_sub_field('item_text');
                            $image_position = get_sub_field('image_position');
                            
                        ?>
                            <div class="what-c60-img-text-item <?php if ($image_position == 'left') {echo 'left-img';} else {
                                echo 'right-img'; } ?>">
                                <img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                                <div class="what-c60-img"><?php echo $item_text ?></div>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();