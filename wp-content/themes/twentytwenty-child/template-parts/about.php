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
    <?php if( have_rows('breadcrumb_group')) : 
        $breadcrumb_group = get_field('breadcrumb_group');
        $breadcrumb_text = $breadcrumb_group['breadcrumb_text'];
        
        while ( have_rows('breadcrumb_group')): the_row(); ?>
            <div class="page-breadcrumb inner-section-1366">
                <?php echo $breadcrumb_text ?>
            </div>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_hero_group')) :
        $about_hero_group = get_field('about_hero_group');
        $hero_background_image_url = $about_hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $about_hero_group['hero_background_image']['alt'];
        $hero_heading = $about_hero_group['hero_heading'];
        $hero_image_url = $about_hero_group['hero_image']['url'];
        $hero_image_alt = $about_hero_group['hero_image']['alt'];
        $hero_content = $about_hero_group['hero_content'];
        while ( have_rows('about_hero_group')): the_row(); ?>
            <section class="about-hero">
                <div class="about-hero__inner inner-section-1366">
                    <img class="about-hero-bg-img" src="<?php echo $hero_background_image_url ?>" alt="<?php echo $hero_background_image_alt ?>">
                    <h1><?php echo $hero_heading ?></h1>
                    <div class="about-hero-content">
                        <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>">
                        <div class="about-hero-description">
                            <?php echo $hero_content ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('about_team_group')) :
        $about_team_group = get_field('about_team_group');
        $team_heading = $about_team_group['team_heading'];
        $team_down_arrow_image_url = $about_team_group['team_down_arrow']['url'];
        $team_down_arrow_image_alt = $about_team_group['team_down_arrow']['alt'];
        $team_ceo_image_image_url = $about_team_group['team_ceo_image']['url'];
        $team_ceo_image_image_alt = $about_team_group['team_ceo_image']['alt'];
        $team_ceo_short_description = $about_team_group['team_ceo_short_description'];
        $team_ceo_description = $about_team_group['team_ceo_description'];
        
        while ( have_rows('about_team_group')): the_row(); ?>
            <section class="about-team">
                <div class="about-team-ceo">
                    <div class="about-team-ceo__inner inner-section-1366">
                        <h1><?php echo $team_heading ?></h1>
                        <img src="<?php echo $team_down_arrow_image_url ?>" alt="<?php echo $team_down_arrow_image_alt ?>">
                        <div class="team-ceo-img-text">
                            <img class="team-ceo-img" src="<?php echo $team_ceo_image_image_url ?>" alt="<?php echo $team_ceo_image_image_alt ?>">
                            <div class="team-ceo-text">
                                <?php echo $team_ceo_short_description ?>

                                <?php echo $team_ceo_description ?>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="about-team__inner inner-section-1366">
                    <div class="about-team-items">
                        <?php if( have_rows('team_member_repeater') ) :
                            while( have_rows('team_member_repeater') ) : the_row();
                            $member_image_url = get_sub_field('member_image')['url'];
                            $member_image_alt = get_sub_field('member_image')['alt'];
                            $member_short_description = get_sub_field('member_short_description');
                            $member_description = get_sub_field('member_description');
                            $member_image_position = get_sub_field('member_image_position');
                        ?>
                            <div class="about-team-item">
                                <div class="team-img-text <?php if ($member_image_position == 'left') { echo 'left-img'; } else { echo 'right-img'; } ?>">
                                    <img class="team-img" src="<?php echo $member_image_url ?>" alt="<?php echo $member_image_alt ?>">
                                    <div class="team-text"><?php echo $member_short_description ?></div>
                                </div>
                                <p><?php echo $member_description ?></p>
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