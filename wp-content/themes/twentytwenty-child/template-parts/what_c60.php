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
        while ( have_rows('what_c60_hero_group')): the_row(); ?>
            <section class="what-c60-hero">
                <div class="what-c60-hero__inner inner-section-1120">
                    <img src="<?php echo $hero_background_image_url ?>" alt="<?php echo $hero_background_image_alt ?>" class="what-c60-hero-bg-img">
                    <h1><?php echo $hero_heading ?></h1>
                    <img src="<?php echo $hero_down_arrow_image_url ?>" alt="<?php echo $hero_down_arrow_image_alt ?>" class="what-c60-hero-arrow-img">
                    <h4><?php echo $hero_sub_heading ?></h4>
                    <p><?php echo $hero_description ?></p>
                    <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>" class="what-c60-hero-img">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('what_c60_history_group')) :
        $what_c60_history_group = get_field('what_c60_history_group');
        $history_heading = $what_c60_history_group['history_heading'];
        $history_sub_heading = $what_c60_history_group['history_sub_heading'];
        $history_description = $what_c60_history_group['history_description'];
        $history_image_heading = $what_c60_history_group['history_image_heading'];
        $history_image_sub_heading = $what_c60_history_group['history_image_sub_heading'];
        $history_image_image_url = $what_c60_history_group['history_image']['url'];
        $history_image_image_alt = $what_c60_history_group['history_image']['alt'];
        $history_content_heading = $what_c60_history_group['history_content_heading'];
        $history_more_text = $what_c60_history_group['history_more_text'];
        while ( have_rows('what_c60_history_group')): the_row(); ?>
            <section class="what-c60-history">
                <div class="what-c60-history__heading-block inner-section-1120">
                    <h2><?php echo $history_heading ?></h2>
                    <h4><?php echo $history_sub_heading ?></h4>
                    <p><?php echo $history_description ?></p>
                </div>
                <div class="what-c60-history__content-block inner-section-1220">
                    <div class="what-c60-history__content-img-text">
                        <div class="what-c60-history__content-text">
                            <h2><?php echo $history_image_heading ?></h2>
                            <p><?php echo $history_image_sub_heading ?></p>
                        </div>
                        <div class="what-c60-history__content-img">
                            <img src="<?php echo $history_image_image_url ?>" alt="<?php echo $history_image_image_alt ?>">
                        </div>
                    </div>
                    <div class="what-c60-history__content">
                        <label><?php echo $history_content_heading ?></label>
                        <ul>
                            <?php if( have_rows('history_content_repeater') ) :
                                while( have_rows('history_content_repeater') ) : the_row();
                                $history_content_title = get_sub_field('history_content_title');
                            ?>
                                <li>
                                    <span><?php echo $history_content_title ?></span>
                                    <ul>
                                        <?php if( have_rows('history_content_item_repeater') ) :
                                            while( have_rows('history_content_item_repeater') ) : the_row();
                                            $history_content_item_text = get_sub_field('history_content_item_text');
                                        ?>
                                            <li><?php echo $history_content_item_text ?></li>
                                            <?php endwhile;
                                        endif; ?>
                                    </ul>
                                </li>
                                <?php endwhile;
                            endif; ?>
                        </ul>
                    </div>
                    <p><?php echo $history_more_text ?></p>
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