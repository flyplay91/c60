<?php
/**
 * Template Name: Healthy Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="healthy-page">

    <?php if( have_rows('healthy_hero')) :
        $healthy_hero_group = get_field('healthy_hero');
        $hero_label = $healthy_hero_group['hero_label'];
        $hero_heading = $healthy_hero_group['hero_heading'];
        $hero_short_description = $healthy_hero_group['hero_short_description'];
        $hero_image_url = $healthy_hero_group['hero_image']['url'];
        $hero_image_alt = $healthy_hero_group['hero_image']['alt'];
        $hero_description = $healthy_hero_group['hero_description'];
        while ( have_rows('healthy_hero')): the_row(); ?>
            <section class="healthy-hero">
                <div class="healthy-hero__inner inner-section-1220">
                    <label><?php echo $hero_label ?></label>
                    <div class="healthy-hero__img-text">
                        <div class="healthy-hero__text">
                            <h2><?php echo $hero_heading ?></h2>
                            <?php echo $hero_short_description ?>
                        </div>
                        <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>">
                    </div>
                    <p><?php echo $hero_description ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('healthy_way')) :
        $healthy_way_group = get_field('healthy_way');
        $way_image_url = $healthy_way_group['way_image']['url'];
        $way_image_alt = $healthy_way_group['way_image']['alt'];
        $way_heading = $healthy_way_group['way_heading'];
        $way_description = $healthy_way_group['way_description'];
        $way_summary_description = $healthy_way_group['way_summary_description'];
        while ( have_rows('healthy_way')): the_row(); ?>
            <section class="healthy-way">
                <div class="healthy-way__inner inner-section-1220">
                    <div class="healthy-way__img-text">
                        <img src="<?php echo $way_image_url ?>" alt="<?php echo $way_image_alt ?>">
                        <div class="healthy-way__text">
                            <h2><?php echo $way_heading ?></h2>
                            <p><?php echo $way_description ?></p>
                        </div>
                    </div>
                    <div class="healthy-way__summary">
                        <h3>Summary</h3>
                        <p><?php echo $way_summary_description ?></p>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('healthy_video')) :
        $healthy_video_group = get_field('healthy_video');
        $video_heading = $healthy_video_group['video_heading'];
        $video_order_link = $healthy_video_group['video_order_link'];
        $video_link = $healthy_video_group['video_link'];
        while ( have_rows('healthy_video')): the_row(); ?>
            <section class="healthy-video">
                <div class="healthy-video__inner inner-section-1220">
                    <h2><?php echo $video_heading ?></h2>
                    <a href="<?php echo $video_order_link ?>">Order Today!</a>
                    <iframe width="580" height="326" src="<?php echo $video_link ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-origwidth="580" data-origheight="326" style="width: 989px; height: 555.886px;"></iframe>
                    <div class="healthy-video__source">
                        <label>Sources</label>
                        <div class="healthy-video__source-links">
                            <?php if( have_rows('source_items_repeater') ) :
                                while( have_rows('source_items_repeater') ) : the_row();
                                $item_text = get_sub_field('item_text');
                            ?>
                                <a href="<?php echo $item_text ?>"><span>[<?php echo get_row_index() ?>]</span><?php echo $item_text ?></a>
                                <?php endwhile;
                            endif; ?>
                        </div>
                    </div>     
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();