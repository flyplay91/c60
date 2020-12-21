<?php
/**
 * Template Name: Home Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();

    $hero_group = get_field('home_hero');
    $hero_img = $hero_group['background_image']['url']; 
    $hero_title = $hero_group['title'];
    $hero_subtitle = $hero_group['subtitle'];
    $hero_shop_link = $hero_group['shop_button_link'];

    $seen_group = get_field('home_seen');
    $seen_title = $seen_group['title'];

    $product_group = get_field('home_product');
    $product_title = $product_group['title'];
    $product_shortcode = $product_group['shortcode'];

    $why_group = get_field('home_why');
    $why_subtitle = $why_group['subtitle'];
    $why_title = $why_group['title'];

    $benefits_group = get_field('home_benefits');
    $benefits_subtitle = $benefits_group['subtitle'];
    $benefits_title = $benefits_group['title'];
    $benefits_des = $benefits_group['description'];
    
    $pets_group = get_field('home_pets');
    $pets_subtitle = $pets_group['subtitle'];
    $pets_title = $pets_group['title'];
    $pets_title_link = $pets_group['title_link'];
    $pets_des = $pets_group['description'];
    $pets_btn_text = $pets_group['button_text'];
    $pets_btn_link = $pets_group['button_link'];
    $pets_img_url = $pets_group['image']['url'];
    $pets_img_alt = $pets_group['image']['alt'];

    $more_group = get_field('home_more');
    $more_title = $more_group['title'];
    $more_shortcode = $more_group['shortcode'];
?>

<main class="home-page">
    <?php if( have_rows('home_hero')) : ?>
        <?php while ( have_rows('home_hero')): the_row(); ?>
        <section class="home-hero" style="background-image: url(<?php echo $hero_img ?>)">
            <div class="home-hero__inner">
                <h1 class="home-hero__title"><?php echo $hero_title ?></h1>
                <h4 class="home-hero__subtitle"><?php echo $hero_subtitle ?></h4>
                <div class="home-hero__btns">
                    <a href="<?php echo $hero_shop_link ?>" class="home-hero-btn-shop">Shop Now</a>
                    <a href="javascript: void(0)" class="home-hero-btn-more">Learn More</a>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_seen')) : ?>
        <?php while ( have_rows('home_seen')): the_row(); ?>
        <section class="home-seen">
            <div class="inner-section-1220 home-seen__inner">
                <h2 class="home-seen__title"><?php echo $seen_title ?></h2>
                <div class="home-seen__imgs">
                    <?php if( have_rows('image_repeater') ) :
                    
                        while( have_rows('image_repeater') ) : the_row();
                            $main_img = get_sub_field('main_image')['url'];
                            $hover_img = get_sub_field('hover_image')['url'];
                        ?>
                            <div class="home-seen__imgs-item">
                                <img src="<?php echo  $main_img ?>">
                                <img src="<?php echo $hover_img ?>">
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_product')) : ?>
        <?php while ( have_rows('home_product')): the_row(); ?>
        <section class="home-product">
            <div class="inner-section-1220 home-prduct__inner">
                <h2 class="home-product__title"><?php echo $product_title ?></h2>
                <?php echo do_shortcode($product_shortcode); ?>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_why')) : ?>
        <?php while ( have_rows('home_why')): the_row(); ?>
        <section class="home-why">
            <div class="inner-section-1440 home-why__inner">
                <h4 class="home-why__subtitle"><?php echo $why_subtitle ?></h4>
                <h2 class="home-why__title"><?php echo $why_title ?></h2>
                <div class="home-why__block">
                    <?php if( have_rows('why_repeater') ) :
                        
                        while( have_rows('why_repeater') ) : the_row();
                            $why_img_url = get_sub_field('image')['url'];
                            $why_img_alt = get_sub_field('image')['alt'];
                            $why_heading = get_sub_field('heading');
                            $why_content = get_sub_field('content');
                        ?>
                            <div class="home-why__block-item">
                                <img src="<?php echo $why_img_url ?>" alt="<?php echo $why_img_alt ?>">
                                <label><?php echo $why_heading ?></label>
                                <span><?php echo $why_content ?></span>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_benefits')) : ?>
        <?php while ( have_rows('home_benefits')): the_row(); ?>
        <section class="home-benefits">
            <h4 class="home-benefits__subtitle"><?php echo $benefits_subtitle ?></h4>
            <h2 class="home-benefits__title"><?php echo $benefits_title ?></h2>
            <p class="home-benefits__des"><?php echo $benefits_des ?></p>
            <div class="home-health__type">
                <?php if( have_rows('benefits_repeater') ) :
                        
                    while( have_rows('benefits_repeater') ) : the_row();
                        $benefits_img_url = get_sub_field('image')['url'];
                        $benefits_img_alt = get_sub_field('image')['alt'];
                    ?>
                        <div class="home-health__type-item">
                            <img src="<?php echo $benefits_img_url ?>" alt="<?php echo $benefits_img_alt ?>">
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_pets')) : ?>
        <?php while ( have_rows('home_pets')): the_row(); ?>
        <section class="home-pets">
            <div class="inner-section-1440 home-pets__inner">
                <h4 class="home-pets__subtitle"><?php echo $pets_subtitle ?></h4>
                <h2 class="home-pets__title">
                    <a href="<?php echo $pets_title_link ?>"><?php echo $pets_title ?></a>
                </h2>
                <div class="home-pets__block">
                    <div class="home-pets__block-left">
                        <p><?php echo  $pets_des ?></p>
                        <a href="<?php echo $pets_btn_link ?>"><?php echo $pets_btn_text ?></a>
                    </div>
                    <div class="home-pets__block-right">
                        <img src="<?php echo $pets_img_url ?>" alt="$pets_img_alt">
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>
  
    <?php if( have_rows('home_more')) : ?>
        <?php while ( have_rows('home_more')): the_row(); ?>
        <section class="home-more">
            <h2 class="home-more__title"><?php echo $more_title ?></h2>
            <?php echo do_shortcode($more_shortcode); ?>
        </section>
        <?php endwhile;
    endif; ?>
</main>


<?php get_footer(); ?>
