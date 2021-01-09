<?php
/**
 * Template Name: Why C60 Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="why-c60-page">
    <?php if( have_rows('why_c60_hero_group')) :
        $why_c60_hero_group = get_field('why_c60_hero_group');
        $hero_img_url = $why_c60_hero_group['background_image']['url'];
        $hero_img_alt = $why_c60_hero_group['background_image']['alt'];
        $heading = $why_c60_hero_group['heading'];
        $sub_heading = $why_c60_hero_group['sub_heading'];
        while ( have_rows('why_c60_hero_group')): the_row(); ?>
            <section class="why-c60-hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="why-c60-hero__innner">
                    <h1><?php echo $heading ?></h1>
                    <p><?php echo $sub_heading ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_what_group')) :
        $why_c60_what_group = get_field('why_c60_what_group');
        $what_heading = $why_c60_what_group['what_heading'];
        $what_image_url = $why_c60_what_group['what_image']['url'];
        $what_image_alt = $why_c60_what_group['what_image']['alt'];
        $what_description = $why_c60_what_group['what_description'];
        while ( have_rows('why_c60_what_group')): the_row(); ?>
            <section class="why-c60-what">
                <div class="why-c60-what__inner inner-section-1220">
                    <h3><?php echo $what_heading ?></h3>
                    <div class="why-c60-what-img-text">
                        <div class="why-c60-what__img">
                            <img src="<?php echo $what_image_url ?>" alt="<?php echo $what_image_alt ?>">
                        </div>
                        <div class="why-c60-what__text">
                            <p><?php echo $what_description ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_antioxidant_group')) :
        $why_c60_antioxidant_group = get_field('why_c60_antioxidant_group');
        $antioxidant_heading = $why_c60_antioxidant_group['antioxidant_heading'];
        $antioxidant_description = $why_c60_antioxidant_group['antioxidant_description'];
        $antioxidant_left_image_url = $why_c60_antioxidant_group['antioxidant_left_image']['url'];
        $antioxidant_left_image_alt = $why_c60_antioxidant_group['antioxidant_left_image']['alt'];
        $antioxidant_right_image_url = $why_c60_antioxidant_group['antioxidant_right_image']['url'];
        $antioxidant_right_image_alt = $why_c60_antioxidant_group['antioxidant_right_image']['alt'];
        while ( have_rows('why_c60_antioxidant_group')): the_row(); ?>
            <section class="why-c60-antioxidant">
                <h3><?php echo $antioxidant_heading ?></h3>
                <p><?php echo $antioxidant_description ?></p>
                <div class="why-c60-antioxidant__images">
                    <img src="<?php echo $antioxidant_left_image_url ?>" alt="<?php echo $antioxidant_left_image_alt ?>">
                    <img src="<?php echo $antioxidant_right_image_url ?>" alt="<?php echo $antioxidant_right_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_benefits_group')) :
        $why_c60_benefits_group = get_field('why_c60_benefits_group');
        $benefits_description = $why_c60_benefits_group['benefits_description'];
        $benefits_image_url = $why_c60_benefits_group['benefits_image']['url'];
        $benefits_image_alt = $why_c60_benefits_group['benefits_image']['alt'];
        while ( have_rows('why_c60_benefits_group')): the_row(); ?>
            <section class="why-c60-benefits">
                <div class="why-c60-benefits__inner inner-section-1220">
                    <div class="why-c60-benefits-des">
                        <?php echo $benefits_description ?>
                    </div>
                    <div class="why-c60-benefits-img">
                        <img src="<?php echo $benefits_image_url ?>" alt="<?php echo $benefits_image_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_image_text_group')) :
        while ( have_rows('why_c60_image_text_group')): the_row(); ?>
            <section class="why-c60-image-text">
                <div class="why-c60-image-text__inner inner-section-1220">
                    <?php if( have_rows('image_text_repeater') ) :
                        while( have_rows('image_text_repeater') ) : the_row();
                        $image_url = get_sub_field('image')['url'];
                        $image_alt = get_sub_field('image')['alt'];
                        $text = get_sub_field('text');
                    ?>
                        <div class="why-c60-image-text-item">
                            <img class="why-c60-image-item" src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>">
                            <div class="why-c60-text-item"><?php echo $text ?></div>
                        </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_mission_group')) :
        $why_c60_mission_group = get_field('why_c60_mission_group');
        $mission_description = $why_c60_mission_group['mission_description'];
        while ( have_rows('why_c60_mission_group')): the_row(); ?>
            <section class="why-c60-mission">
                <div class="why-c60-mission__inner inner-section-1220"><?php echo $mission_description ?></div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_team_group')) :
        $why_c60_team_group = get_field('why_c60_team_group');
        $team_sub_heading = $why_c60_team_group['team_sub_heading'];
        $team_heading = $why_c60_team_group['team_heading'];
        $team_image_url = $why_c60_team_group['team_image']['url'];
        $team_image_alt = $why_c60_team_group['team_image']['alt'];
        $team_description = $why_c60_team_group['team_description'];
        $team_short_description = $why_c60_team_group['team_short_description'];
        $team_button_title = $why_c60_team_group['team_button_title'];
        $team_button_link = $why_c60_team_group['team_button_link'];
        while ( have_rows('why_c60_team_group')): the_row(); ?>
            <section class="why-c60-team">
                <div class="why-c60-team__inner inner-section-1220">
                    <h4><?php echo $team_sub_heading ?></h4>
                    <h3><?php echo $team_heading ?></h3>
                    <div class="why-c60-team-img-desc">
                        <img class="why-c60-team-img" src="<?php echo $team_image_url ?>" alt="<?php echo $team_image_alt ?>">
                        <div class="why-c60-team-desc"><?php echo $team_description ?></div>
                    </div>
                    <div class="why-c60-team-short-desc"><?php echo $team_short_description ?></div>
                    <a href="<?php echo $team_button_link ?>" class="btn-meet-team"><?php echo $team_button_title ?></a>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('why_c60_more_group')) :
        $why_c60_more_group = get_field('why_c60_more_group');
        $more_heading = $why_c60_more_group['more_heading'];
        while ( have_rows('why_c60_more_group')): the_row(); ?>
            <section class="why-c60-more">
                <div class="why-c60-more__inner inner-section-1220">
                    <h3><?php echo $more_heading ?></h3>
                    <div class="why-c60-more-items">
                        <?php if( have_rows('more_item_repeater') ) :
                            while( have_rows('more_item_repeater') ) : the_row();
                            $item_title = get_sub_field('item_title');
                            $item_link = get_sub_field('item_link');
                        ?>
                            <div class="more-item">
                                <a href="<?php echo $item_link ?>"><?php echo $item_title ?></a>
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