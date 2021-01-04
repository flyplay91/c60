<?php
/**
 * Template Name: About Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="about-page">
    <?php if( have_rows('about_hero_group')) :
        $about_hero_group = get_field('about_hero_group');
        $hero_img_url = $about_hero_group['background_image']['url'];
        $hero_img_alt = $about_hero_group['background_image']['alt'];
        $heading = $about_hero_group['heading'];
        $sub_heading = $about_hero_group['sub_heading'];
        while ( have_rows('about_hero_group')): the_row(); ?>
            <section class="about-hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="about-hero__innner">
                    <h1><?php echo $heading ?></h1>
                    <p><?php echo $sub_heading ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_what_group')) :
        $about_what_group = get_field('about_what_group');
        $what_heading = $about_what_group['what_heading'];
        $what_image_url = $about_what_group['what_image']['url'];
        $what_image_alt = $about_what_group['what_image']['alt'];
        $what_description = $about_what_group['what_description'];
        while ( have_rows('about_what_group')): the_row(); ?>
            <section class="about-what">
                <div class="about-what__inner inner-section-1220">
                    <h3><?php echo $what_heading ?></h3>
                    <div class="about-what-img-text">
                        <div class="about-what__img">
                            <img src="<?php echo $what_image_url ?>" alt="<?php echo $what_image_alt ?>">
                        </div>
                        <div class="about-what__text">
                            <p><?php echo $what_description ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_antioxidant_group')) :
        $about_antioxidant_group = get_field('about_antioxidant_group');
        $antioxidant_heading = $about_antioxidant_group['antioxidant_heading'];
        $antioxidant_description = $about_antioxidant_group['antioxidant_description'];
        $antioxidant_left_image_url = $about_antioxidant_group['antioxidant_left_image']['url'];
        $antioxidant_left_image_alt = $about_antioxidant_group['antioxidant_left_image']['alt'];
        $antioxidant_right_image_url = $about_antioxidant_group['antioxidant_right_image']['url'];
        $antioxidant_right_image_alt = $about_antioxidant_group['antioxidant_right_image']['alt'];
        while ( have_rows('about_antioxidant_group')): the_row(); ?>
            <section class="about-antioxidant">
                <h3><?php echo $antioxidant_heading ?></h3>
                <p><?php echo $antioxidant_description ?></p>
                <div class="about-antioxidant__images">
                    <img src="<?php echo $antioxidant_left_image_url ?>" alt="<?php echo $antioxidant_left_image_alt ?>">
                    <img src="<?php echo $antioxidant_right_image_url ?>" alt="<?php echo $antioxidant_right_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_benefits_group')) :
        $about_benefits_group = get_field('about_benefits_group');
        $benefits_description = $about_benefits_group['benefits_description'];
        $benefits_image_url = $about_benefits_group['benefits_image']['url'];
        $benefits_image_alt = $about_benefits_group['benefits_image']['alt'];
        while ( have_rows('about_benefits_group')): the_row(); ?>
            <section class="about-benefits">
                <div class="about-benefits__inner inner-section-1220">
                    <div class="about-benefits-des">
                        <?php echo $benefits_description ?>
                    </div>
                    <div class="about-benefits-img">
                        <img src="<?php echo $benefits_image_url ?>" alt="<?php echo $benefits_image_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_image_text_group')) :
        while ( have_rows('about_image_text_group')): the_row(); ?>
            <section class="about-image-text">
                <div class="about-image-text__inner inner-section-1220">
                    <?php if( have_rows('image_text_repeater') ) :
                        while( have_rows('image_text_repeater') ) : the_row();
                        $image_url = get_sub_field('image')['url'];
                        $image_alt = get_sub_field('image')['alt'];
                        $text = get_sub_field('text');
                    ?>
                        <div class="about-image-text-item">
                            <img class="about-image-item" src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>">
                            <div class="about-text-item"><?php echo $text ?></div>
                        </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_mission_group')) :
        $about_mission_group = get_field('about_mission_group');
        $mission_description = $about_mission_group['mission_description'];
        while ( have_rows('about_mission_group')): the_row(); ?>
            <section class="about-mission">
                <div class="about-mission__inner inner-section-1220"><?php echo $mission_description ?></div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_team_group')) :
        $about_team_group = get_field('about_team_group');
        $team_sub_heading = $about_team_group['team_sub_heading'];
        $team_heading = $about_team_group['team_heading'];
        $team_image_url = $about_team_group['team_image']['url'];
        $team_image_alt = $about_team_group['team_image']['alt'];
        $team_description = $about_team_group['team_description'];
        $team_short_description = $about_team_group['team_short_description'];
        $team_button_title = $about_team_group['team_button_title'];
        $team_button_link = $about_team_group['team_button_link'];
        while ( have_rows('about_team_group')): the_row(); ?>
            <section class="about-team">
                <div class="about-team__inner inner-section-1220">
                    <h4><?php echo $team_sub_heading ?></h4>
                    <h3><?php echo $team_heading ?></h3>
                    <div class="about-team-img-desc">
                        <img class="about-team-img" src="<?php echo $team_image_url ?>" alt="<?php echo $team_image_alt ?>">
                        <div class="about-team-desc"><?php echo $team_description ?></div>
                    </div>
                    <div class="about-team-short-desc"><?php echo $team_short_description ?></div>
                    <a href="<?php echo $team_button_link ?>" class="btn-meet-team"><?php echo $team_button_title ?></a>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_more_group')) :
        $about_more_group = get_field('about_more_group');
        $more_heading = $about_more_group['more_heading'];
        while ( have_rows('about_more_group')): the_row(); ?>
            <section class="about-more">
                <div class="about-more__inner inner-section-1220">
                    <h3><?php echo $more_heading ?></h3>
                    <div class="about-more-items">
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