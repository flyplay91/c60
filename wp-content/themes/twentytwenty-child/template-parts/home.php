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
    $seen_group = get_field('home_seen');
    $seen_title = $seen_group['title'];

    $more_group = get_field('home_more');
    $more_title = $more_group['title'];
?>

<main class="home-page">
    <?php if( have_rows('home_hero')) : ?>
        <?php while ( have_rows('home_hero')): the_row(); ?>
        <sectoin class="home-hero">
            <?php if( have_rows('carousel_repeater') ) :
                while( have_rows('carousel_repeater') ) : the_row();
                    $img_url = get_sub_field('background_image')['url'];
                    $img_mobi_url = get_sub_field('mobile_image')['url'];
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $shop_btn_link = get_sub_field('shop_button_link');
                    $learn_more_btn_link = get_sub_field('learn_more_button_link');
                ?>
                    <div class="home-hero__carousel">
                        <div class="home-hero__inner">
                            <h1 class="home-hero__title"><?php echo $title ?></h1>
                            <h4 class="home-hero__subtitle"><?php echo $subtitle ?></h4>
                            <div class="home-hero__btns">
                                <a href="<?php echo $shop_btn_link ?>" class="home-hero-btn-shop">Shop Now</a>
                                <a href="<?php echo $learn_more_btn_link ?>" class="home-hero-btn-more">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <style>
                        .home-hero__carousel {
                            background-image: url('<?php echo $img_url ?>');
                        }
                        @media(max-width:767px) {
                            .home-hero__carousel {
                                background-image: url('<?php echo $img_mobi_url ?>');
                            }
                        }
                    </style>
                <?php endwhile;
            endif; ?>
        </sectoin>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_what_c60')) :
        $home_what_c60_group = get_field('home_what_c60');
        $what_c60_heading = $home_what_c60_group['heading'];
        $what_c60_left_heading = $home_what_c60_group['left_heading'];
        $what_c60_left_description = $home_what_c60_group['left_description'];
        $what_c60_image_url = $home_what_c60_group['image']['url'];
        $what_c60_image_alt = $home_what_c60_group['image']['alt'];
        $what_c60_right_heading = $home_what_c60_group['right_heading'];
        $what_c60_right_description = $home_what_c60_group['right_description'];
        while ( have_rows('home_what_c60')): the_row(); ?>
            <section class="home-what-c60">
                <div class="home-what-c60__inner inner-section-1220">
                    <h1><?php echo $what_c60_heading ?></h1>
                    <div class="home-what-c60__img-text">
                        <div class="home-what-c60__img">
                            <h3><?php echo $what_c60_left_heading ?></h3>
                            <p><?php echo $what_c60_left_description ?></p>
                        </div>
                        <img class="whatisturn" src="<?php echo $what_c60_image_url ?>" alt="<?php echo $what_c60_image_alt ?>">
                        <div class="home-what-c60__img">
                            <h3><?php echo $what_c60_right_heading ?></h3>
                            <p><?php echo $what_c60_right_description ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_why_c60')) :
        $home_why_c60_group = get_field('home_why_c60');
        $why_c60_heading = $home_why_c60_group['why_c60_heading'];
        $why_c60_sub_heading = $home_why_c60_group['why_c60_sub_heading'];
        $why_c60_description = $home_why_c60_group['why_c60_description'];
        $why_c60_image_url = $home_why_c60_group['why_c60_image']['url'];
        $why_c60_image_alt = $home_why_c60_group['why_c60_image']['alt'];
        while ( have_rows('home_why_c60')): the_row(); ?>
            <section class="home-why-c60">
                <div class="home-why-c60__inner inner-section-1366">
                    <div class="home-why-c60__img-text">
                        <div class="home-why-c60__text">
                            <h2><?php echo $why_c60_heading ?></h2>
                            <h3><?php echo $why_c60_sub_heading ?></h3>
                            <h3><?php echo $why_c60_description ?></h3>
                        </div>
                        <img class="home-why-c60__img" src="<?php echo $why_c60_image_url ?>" alt="<?php echo $why_c60_image_alt ?>">
                    </div>
                    <div class="home-why-c60__items">
                        <?php if( have_rows('why_c60_item_repeater') ) :
                            while( have_rows('why_c60_item_repeater') ) : the_row();
                            $item_image_url = get_sub_field('item_image')['url'];
                            $item_image_alt = get_sub_field('item_image')['alt'];
                            $item_content = get_sub_field('item_content');
                            
                        ?>
                            <div class="home-why-c60__item">
                                <img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                                <?php echo $item_content ?>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_seen')) : ?>
        <?php while ( have_rows('home_seen')): the_row(); ?>
        <section class="home-seen">
            <div class="inner-section-1366 home-seen__inner">
                <h2 class="home-seen__title"><?php echo $seen_title ?></h2>
                <div class="home-seen__imgs">
                    <?php if( have_rows('image_repeater') ) :
                    
                        while( have_rows('image_repeater') ) : the_row();
                            $main_img_url = get_sub_field('main_image')['url'];
                            $main_img_alt = get_sub_field('main_image')['alt'];
                            $hover_img_url = get_sub_field('hover_image')['url'];
                            $hover_img_alt = get_sub_field('hover_image')['alt'];
                        ?>
                            <div class="home-seen__imgs-item">
                                <img class="home-seen__imgs-item--mian-img" src="<?php echo  $main_img_url ?>" alt="<?php echo $main_img_alt ?>">
                                <img class="home-seen__imgs-item--hover-img" src="<?php echo $hover_img_url ?>" alt="<?php echo $hover_img_alt ?>">
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_products')) : 
        $home_products_group = get_field('home_products');
        $products_first_tab_title = $home_products_group['products_first_tab_title'];
        $products_second_tab_title = $home_products_group['products_second_tab_title'];
        $products_button_link = $home_products_group['products_button_link'];
        while ( have_rows('home_products')): the_row(); ?>
            <section class="home-products">
                <div class="home-products__inner inner-section-1220">
                    <div class="tabset">
                        
                        <!-- Tab 1 -->
                        <input type="radio" name="tabset" id="tab1" aria-controls="most-popular" checked>
                        <label for="tab1"><?php echo $products_first_tab_title ?></label>
                        <!-- Tab 2 -->
                        <input type="radio" name="tabset" id="tab2" aria-controls="beginner">
                        <label for="tab2"><?php echo $products_second_tab_title ?></label>
                        
                        <div class="tab-panels">
                            <div id="most-popular" class="tab-panel">
                                <div class="product-items">
                                    <?php if( have_rows('products_first_repeater') ) :
                                        while( have_rows('products_first_repeater') ) : the_row();
                                        $product_image_url = get_sub_field('product_image')['url'];
                                        $product_image_alt = get_sub_field('product_image')['alt'];
                                        $product_url = get_sub_field('product_link');
                                        $product_title = get_sub_field('product_title');
                                        $product_star_image_url = get_sub_field('product_star_image')['url'];
                                        $product_star_image_alt = get_sub_field('product_star_image')['alt'];
                                        $product_sale = get_sub_field('is_sale');
                                    ?>
                                        <div class="product-item product-item--<?php echo get_row_index() ?> <?php if ($product_sale == 'yes') { echo 'product-item--sale'; } ?>">
                                            <a href="<?php echo $product_url ?>">
                                                <img src="<?php echo $product_image_url ?>" alt="<?php echo $product_image_alt ?>">
                                                <label><?php echo $product_title ?></label>
                                            </a>
                                            <div class="product-rating-price">
                                                <img src="<?php echo $product_star_image_url ?>" alt="<?php echo $product_star_image_alt ?>">
                                            </div>
                                        </div>
                                        <?php endwhile;
                                    endif; ?>
                                </div>
                                <h3><a class="btn-home-product" href="<?php echo $products_button_link ?>">Shop Now</a></h3>
                            </div>
                           
                           <!-- Disabled -->
                            <div id="beginner" class="tab-panel">
                                <div class="product-items">
                                    <?php if( have_rows('products_second_repeater') ) :
                                        while( have_rows('products_second_repeater') ) : the_row();
                                        $product_image_url = get_sub_field('product_image')['url'];
                                        $product_image_alt = get_sub_field('product_image')['alt'];
                                        $product_url = get_sub_field('product_link');
                                        $product_title = get_sub_field('product_title');
                                        $product_star_image_url = get_sub_field('product_star_image')['url'];
                                        $product_star_image_alt = get_sub_field('product_star_image')['alt'];
                                        $product_price = get_sub_field('product_price');
                                        $product_sale = get_sub_field('is_sale');
                                    ?>
                                        <div class="product-item product-item--<?php echo get_row_index() ?> <?php if ($product_sale == 'yes') { echo 'product-item--sale'; } ?>">
                                            <a href="<?php echo $product_url ?>">
                                                <img src="<?php echo $product_image_url ?>" alt="<?php echo $product_image_alt ?>">
                                                <label><?php echo $product_title ?></label>
                                            </a>
                                            <div class="product-rating-price">
                                                <img src="<?php echo $product_star_image_url ?>" alt="<?php echo $product_star_image_alt ?>">
                                                <span><?php echo $product_price ?></span>
                                            </div>
                                        </div>
                                        <?php endwhile;
                                    endif; ?>
                                </div>
                                <a class="btn-home-product" href="<?php echo $products_button_link ?>">Shop Now</a>
                            </div>
                            <!-- End Disabled -->
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_benefits')) :
        $benefits_group = get_field('home_benefits');
        $benefits_logo_url = $benefits_group['logo']['url'];
        $benefits_logo_alt = $benefits_group['logo']['alt'];
        $benefits_title = $benefits_group['title'];
        while ( have_rows('home_benefits')): the_row(); ?>
        <section class="home-benefits">
            <div class="home-benefits__inner inner-section-1366">
                <img src="<?php echo $benefits_logo_url ?>" alt="<?php echo $benefits_logo_alt ?>">
                <h3 class="home-benefits__title"><?php echo $benefits_title ?></h3>
                <div class="home-benefits__items">
                    <?php if( have_rows('benefits_repeater') ) :
                        while( have_rows('benefits_repeater') ) : the_row();
                            $benefits_img_url = get_sub_field('image')['url'];
                            $benefits_img_alt = get_sub_field('image')['alt'];
                            $benefits_heading = get_sub_field('heading');
                            $benefits_description = get_sub_field('description');
                            $benefits_button_link = get_sub_field('button_link');
                        ?>
                            <div class="home-benefits__item--img-text">
                                <a href="<?php echo $benefits_button_link ?>"><img src="<?php echo $benefits_img_url ?>" alt="<?php echo $benefits_img_alt ?>"></a>
                                <div class="home-benefits__item--text">
                                    <h3><a href="<?php echo $benefits_button_link ?>"><?php echo $benefits_heading ?></a></h3>
                                    <p><?php echo $benefits_description ?></p>
                                    <a href="<?php echo $benefits_button_link ?>" class="home-benefits-btn">Read More</a>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_cfo_banner')) :
        $home_cfo_banner = get_field('home_cfo_banner');
        $cfo_banner_text = $home_cfo_banner['cfo_banner_text'];
        $cfo_image_url = $home_cfo_banner['cfo_image']['url'];
        $cfo_image_alt = $home_cfo_banner['cfo_image']['alt'];
        $cfo_name = $home_cfo_banner['cfo_name'];
        $cfo_position = $home_cfo_banner['cfo_position'];
        while ( have_rows('home_cfo_banner')): the_row(); ?>
            <section class="home-cfo">
                <div class="home-cfo__inner inner-section-1120">
                    <h4><?php echo $cfo_banner_text ?></h4>
                    <div class="home-cfo__img-position">
                        <img src="<?php echo $cfo_image_url ?>" alt="<?php echo $cfo_image_alt ?>">
                        <div class="home-cfo__position">
                            <label><?php echo $cfo_name ?></label>
                            <span><?php echo $cfo_position ?></span>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_new_product')) :
        $home_new_product = get_field('home_new_product');
        $new_product_banner = $home_new_product['new_product_banner'];
        $new_product_heading = $home_new_product['new_product_heading'];
        $new_product_description = $home_new_product['new_product_description'];
        $new_product_link = $home_new_product['new_product_link'];
        $new_product_image_url = $home_new_product['new_product_image']['url'];
        $new_product_image_alt = $home_new_product['new_product_image']['alt'];
        while ( have_rows('home_new_product')): the_row(); ?>
            <section class="home-new-product">
                <div class="home-new-product__inner inner-section-1220">
                    <label><?php echo $new_product_banner ?></label>
                    <div class="home-new-product__img-text">
                        <div class="home-new-product__text">
                            <h3><?php echo $new_product_heading ?></h3>
                            <p><?php echo $new_product_description ?></p>
                            <a href="<?php echo $new_product_link ?>">Shop Now</a>
                        </div>
                        <a href="<?php echo $new_product_link ?>"><img src="<?php echo $new_product_image_url ?>" alt="<?php echo $new_product_image_alt ?>"></a>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_lives')) :
        $home_lives = get_field('home_lives');
        $lives_heading = $home_lives['lives_heading'];
        while ( have_rows('home_lives')): the_row(); ?>
            <section class="home-lives">
                <div class="home-lives__inner inner-section-1366">
                    <h2><?php echo $lives_heading ?></h2>
                    <div class="home-lives-carousel">
                        <?php if( have_rows('lives_repeater') ) :
                            while( have_rows('lives_repeater') ) : the_row();
                            ?>
                            <div>
                                <div class="home-lives__items">
                                    <?php if( have_rows('lives_item_repeater') ) :
                                        while( have_rows('lives_item_repeater') ) : the_row();
                                        $item_image_url = get_sub_field('item_image')['url'];
                                        $item_image_alt = get_sub_field('item_image')['alt'];
                                        $item_title = get_sub_field('item_title');
                                        $item_link = get_sub_field('item_link');
                                        $item_description = get_sub_field('item_description');
                                        $item_star_image_url = get_sub_field('item_star_image')['url'];
                                        $item_star_image_alt = get_sub_field('item_star_image')['alt'];
                                        $item_user_name = get_sub_field('item_user_name');
                                    ?>
                                        <div class="home-lives__item lives-item--<?php echo get_row_index() ?>">
                                            <a href="<?php echo $item_link ?>"><img src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>"></a>
                                            <h4><a href="<?php echo $item_link ?>"><?php echo $item_title ?></a></h4>
                                            <p><?php echo $item_description ?></p>
                                            <div class="lives__item-star-user">
                                                <img src="<?php echo $item_star_image_url ?>" alt="<?php echo $item_star_image_alt ?>">
                                                <label><?php echo $item_user_name ?></label>
                                            </div>
                                        </div>
                                        <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('home_cfo_bottom_banner')) :
        $home_cfo_bottom_banner = get_field('home_cfo_bottom_banner');
        $cfo_banner_image_url = $home_cfo_bottom_banner['cfo_banner_image']['url'];
        $cfo_banner_image_alt = $home_cfo_bottom_banner['cfo_banner_image']['alt'];
        $cfo_banner_description = $home_cfo_bottom_banner['cfo_banner_description'];
        $cfo_name = $home_cfo_bottom_banner['cfo_name'];
        $cfo_position = $home_cfo_bottom_banner['cfo_position'];
        while ( have_rows('home_cfo_bottom_banner')): the_row(); ?>
            <section class="home-cfo-bottom-banner">
                <div class="home-cfo-bottom-banner__inner inner-section-1220">
                    <div class="home-cfo-bottom-banner__img">
                        <img src="<?php echo $cfo_banner_image_url ?>" alt="<?php echo $cfo_banner_image_alt ?>">
                        <div class="home-cfo-bottom-banner__user">
                            <label><?php echo $cfo_name ?></label>
                            <span><?php echo $cfo_position ?></span>
                        </div>
                    </div>
                    <div class="home-cfo-bottom-banner__text">
                        <h3><?php echo $cfo_banner_description ?></h3>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
  
    <?php if( have_rows('home_more')) : ?>
        <?php while ( have_rows('home_more')): the_row(); ?>
        <section class="home-more">
            <div class="home-more__inner inner-section-1366">
                <h2 class="home-more__title"><?php echo $more_title ?></h2>
                <div class="home-blog__block">
                    <?php if( have_rows('video_repeater') ) :
                        while( have_rows('video_repeater') ) : the_row();
                            $video_image_url = get_sub_field('video_image')['url'];
                            $video_image_alt = get_sub_field('video_image')['alt'];
                            $video_url = get_sub_field('video_url');
                        ?>
                            <div class="home-blog__block-item">
                                <a class="popup-youtube" href="<?php echo $video_url ?>">
                                    <img src="<?php echo $video_image_url ?>">
                                </a>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;
    endif; ?>
</main>


<?php get_footer(); ?>
