<?php
/**
 * Template Name: Affiliate Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="affiliate-page">

    <?php if( have_rows('affiliate_hero_group')) :
        $affiliate_hero_group = get_field('affiliate_hero_group');
        $hero_img_url = $affiliate_hero_group['hero_background_image']['url'];
        $hero_img_alt = $affiliate_hero_group['hero_background_image']['alt'];
        $hero_heading = $affiliate_hero_group['hero_heading'];
        $hero_down_arrow_img_url = $affiliate_hero_group['hero_down_arrow']['url'];
        $hero_down_arrow_img_alt = $affiliate_hero_group['hero_down_arrow']['alt'];
        while ( have_rows('affiliate_hero_group')): the_row(); ?>
            <section class="affiliate-hero" style="background-image: url(<?php echo $hero_img_url ?>)">
                <div class="affiliate-hero__inner">
                    <h1><?php echo $hero_heading ?></h1>
                    <img src="<?php echo $hero_down_arrow_img_url ?>" alt="<?php echo $hero_down_arrow_img_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('affiliate_intro_group')) :
        $affiliate_intro_group = get_field('affiliate_intro_group');
        $intro_image_url = $affiliate_intro_group['intro_image']['url'];
        $intro_image_alt = $affiliate_intro_group['intro_image']['alt'];
        $intro_short_description = $affiliate_intro_group['intro_short_description'];
        $intro_description = $affiliate_intro_group['intro_description'];
        while ( have_rows('affiliate_intro_group')): the_row(); ?>
            <section class="affiliate-intro">
                <div class="affiliate-intro__inner inner-section-1220">
                    <div class="affiliate-intro__img-text">
                        <img src="<?php echo $intro_image_url ?>" alt="<?php echo $intro_image_alt ?>" class="affiliate-intro__img">
                        <div class="affiliate-intro__text"><?php echo $intro_short_description ?></div>
                    </div>
                    <p><?php echo $intro_description ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('affiliate_product_group')) :
        $affiliate_product_group = get_field('affiliate_product_group');
        $product_heading = $affiliate_product_group['product_heading'];
        $product_description = $affiliate_product_group['product_description'];
        $product_left_image_url = $affiliate_product_group['product_left_image']['url'];
        $product_left_image_alt = $affiliate_product_group['product_left_image']['alt'];
        $product_right_image_url = $affiliate_product_group['product_right_image']['url'];
        $product_right_image_alt = $affiliate_product_group['product_right_image']['alt'];
        while ( have_rows('affiliate_product_group')): the_row(); ?>
            <section class="affiliate-products">
                <h3><?php echo $product_heading ?></h3>
                <p><?php echo $product_description ?></p>
                <div class="affiliate-products__images">
                    <img src="<?php echo $product_left_image_url ?>" alt="<?php echo $product_left_image_alt ?>">
                    <img src="<?php echo $product_right_image_url ?>" alt="<?php echo $product_right_image_alt ?>">
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('affiliate_opportunity_group')) :
        $affiliate_opportunity_group = get_field('affiliate_opportunity_group');
        $opportunity_icon_url = $affiliate_opportunity_group['opportunity_icon']['url'];
        $opportunity_icon_alt = $affiliate_opportunity_group['opportunity_icon']['alt'];
        $opportunity_heading = $affiliate_opportunity_group['opportunity_heading'];
        $opportunity_description = $affiliate_opportunity_group['opportunity_description'];
        while ( have_rows('affiliate_opportunity_group')): the_row(); ?>
            <section class="affiliate-opportunity">
                <div class="affiliate-opportunity__inner inner-section-1120">
                    <img src="<?php echo $opportunity_icon_url ?>" alt="<?php echo $opportunity_icon_alt ?>">
                    <h2><?php echo $opportunity_heading ?></h2>
                    <p><?php echo $opportunity_description ?></p>
                    <div class="affiliate-opportunity-items">
                        <?php if( have_rows('opportunity_item_repeater') ) :
                            while( have_rows('opportunity_item_repeater') ) : the_row();
                            $item_image_url = get_sub_field('item_image')['url'];
                            $item_image_alt = get_sub_field('item_image')['alt'];
                            $item_text = get_sub_field('item_text');
                        ?>
                            <div class="affiliate-opportunity-item">
                                <div class="affiliate-opportunity-item__img"><img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>"></div>
                                <label><?php echo $item_text ?></label>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('affiliate_earnings_group')) :
        $affiliate_earnings_group = get_field('affiliate_earnings_group');
        $earning_heading = $affiliate_earnings_group['earning_heading'];
        $earning_content = $affiliate_earnings_group['earning_content'];
        while ( have_rows('affiliate_earnings_group')): the_row(); ?>
            <section class="affiliate-earnings">
                <div class="affiliate-earnings__inner inner-section-1120">
                    <h2><?php echo $earning_heading ?></h2>
                    <p><?php echo $earning_content ?></p>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('affiliate_form_group')) :
        $affiliate_form_group = get_field('affiliate_form_group');
        $form_heading = $affiliate_form_group['form_heading'];
        $form_sub_heading = $affiliate_form_group['form_sub_heading'];
        $form_shortcode = $affiliate_form_group['form_shortcode'];
        $form_image_url = $affiliate_form_group['form_image']['url'];
        $form_image_alt = $affiliate_form_group['form_image']['alt'];
        while ( have_rows('affiliate_form_group')): the_row(); ?>
            <section class="affiliate-form">
                <div class="affiliate-form__inner inner-section-1440">
                    <h2><?php echo $form_heading ?></h2>
                    <h4><?php echo $form_sub_heading ?></h4>
                    <div class="affiliate-form__block">
                        <div class="affiliate-form__content">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                        <img src="<?php echo $form_image_url ?>" alt="<?php echo $form_image_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();