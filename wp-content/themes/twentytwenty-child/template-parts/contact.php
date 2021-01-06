<?php
/**
 * Template Name: Contact Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="contact-page">

    <?php if( have_rows('contact_hero_group')) :
        $contact_hero_group = get_field('contact_hero_group');
        $hero_img_url = $contact_hero_group['hero_background_image']['url'];
        $hero_img_alt = $contact_hero_group['hero_background_image']['alt'];
        $heading = $contact_hero_group['hero_heading'];
        $sub_heading = $contact_hero_group['hero_sub_heading'];
        $hero_arrow_img_url = $contact_hero_group['hero_down_arrow']['url'];
        $hero_arrow_img_alt = $contact_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('contact_hero_group')): the_row(); ?>
            <section class="contact-hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="contact-hero__inner">
                    <h1><?php echo $heading ?></h1>
                    <p><?php echo $sub_heading ?></p>
                    <img src="<?php echo $hero_arrow_img_url ?>" alt="<?php echo $hero_arrow_img_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('contact_information_group')) :
        $contact_information_group = get_field('contact_information_group');
        $information_short_description = $contact_information_group['information_short_description'];
        $contact_form_title = $contact_information_group['contact_form_title'];
        $contact_form_shortcode = $contact_information_group['contact_form_shortcode'];
        while ( have_rows('contact_information_group')): the_row(); ?>
            <section class="contact-content">
                <div class="contact-content__inner inner-section-1220">
                    <div class="contact-content__info">
                        <div class="contact-info__items">
                            <?php if( have_rows('information_repeater') ) :
                                while( have_rows('information_repeater') ) : the_row();
                                $information_title = get_sub_field('information_title');
                                $information_content = get_sub_field('information_content');
                            ?>
                                <div class="contact-info__item">
                                    <label><?php echo $information_title ?></label>
                                    <p><?php echo $information_content ?></p>
                                </div>
                                <?php endwhile;
                            endif; ?>
                        </div>
                        <div class="contact-info_short_desc">
                            <p><?php echo $information_short_description ?></p>
                        </div>
                    </div>
                    <div class="contact-content__form">
                        <h2><?php echo $contact_form_title ?></h2>
                        <div class="contact-form_shortcode">
                            <?php echo do_shortcode($contact_form_shortcode); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();