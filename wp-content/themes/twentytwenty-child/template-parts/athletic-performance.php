<?php
/**
 * Template Name: Athletic Performance Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>
<?php $page_css_class_name = get_field('page_css_class_name'); ?>
<main class="healthy-page <?php echo $page_css_class_name ?>">

    <?php if( have_rows('healthy_hero')) :
        $healthy_hero_group = get_field('healthy_hero');
        $hero_title = $healthy_hero_group['hero_title'];
        $hero_label = $healthy_hero_group['hero_label'];
        $hero_heading = $healthy_hero_group['hero_heading'];
        $hero_short_description = $healthy_hero_group['hero_short_description'];
        $hero_image_url = $healthy_hero_group['hero_image']['url'];
        $hero_image_alt = $healthy_hero_group['hero_image']['alt'];
        $hero_description = $healthy_hero_group['hero_description'];
        while ( have_rows('healthy_hero')): the_row(); ?>

            <section class="healthy-hero">
                <div class="healthy-hero__inner inner-section-1220">
                    <h1><?php echo $hero_title ?></h1>
                    <div class="healthy-hero__img-text">
                        <div class="healthy-hero__text">
                            <h2><?php echo $hero_label ?></h2>  
                            <h3><?php echo $hero_heading ?></h3>
                            <?php echo $hero_short_description ?>
                        </div>
                        <div class="healthy-hero__img">
                            <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>">
                        </div>
                    </div>  
                    <a href="/shop/" class="healthy-btn">Try C60 Purple Power</a>
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
        while ( have_rows('healthy_way')): the_row(); ?>
            <section class="healthy-way">
                <div class="healthy-way__inner inner-section-1220">
                    <div class="healthy-way__img-text">
                        <img src="<?php echo $way_image_url ?>" alt="<?php echo $way_image_alt ?>">
                        <div class="healthy-way__text">
                            <h3><?php echo $way_heading ?></h3>
                            <p><?php echo $way_description ?></p>
                        </div>
                    </div>
                    
                </div>
            </section>
        <?php endwhile;
    endif; ?>




<?php if( have_rows('healthy_way')) :
        $healthy_way_group = get_field('healthy_way');
        $way_right_image_url = $healthy_way_group['way_right_image']['url'];
        $way_right_image_alt = $healthy_way_group['way_right_image']['alt'];
        $way_right_image_caption = $healthy_way_group['way_right_image']['caption'];
        $way_description_row_2 = $healthy_way_group['way_description_row_2'];
        while ( have_rows('healthy_way')): the_row(); ?>

            <section class="healthy-way healthy-way-2">
                <div class="healthy-way__inner inner-section-1220">
                    <div class="healthy-way__img-text">
                   <div class="healthy-way__img-text-caption">     
                    <img src="<?php echo $way_right_image_url ?>" alt="<?php echo $way_right_image_alt ?>">
                    <span class="img-caption">
                        Tasha Danvers 
                        Olympic Medalist & enthusiastic C60 Purple Power user</span>
                    </div>  
                        <div class="healthy-way__text">  
                        <?php echo $way_description_row_2 ?>
                        </div>
                    </div>
                    
                </div>
            </section>
            <?php endwhile;
    endif; ?>

        <?php if( have_rows('healthy_way')) :
                $healthy_way_group = get_field('healthy_way');
                $way_summary_title = $healthy_way_group['summary_title'];
                $way_summary_description = $healthy_way_group['summary_description'];
                while ( have_rows('healthy_way')): the_row(); ?>
                
                <section class="healthy-summary">
                        <div class="healthy-summary__inner inner-section-1220">
                            <div class="healthy-summary__img-text">
                            
                                <h3><?php echo $way_summary_title ?></h3>
                                

                                <div class="healthy-way__text dark-bg-text">  

                                <?php echo $way_summary_description ?>

                            
                                </div>


                            </div>
                            
                        </div>
                    </section>

                    <?php endwhile;
            endif; ?>


            



    <?php if( have_rows('healthy_video')) :
        $healthy_video_group = get_field('healthy_video');
        $video_heading = $healthy_video_group['video_heading'];
        $learnmore_heading = $healthy_video_group['learnmore_heading'];
        $button_text = $healthy_video_group['button_text'];
        $video_order_link = $healthy_video_group['video_order_link'];
        $product_image_url = $healthy_video_group['product_image']['url'];
        $product_image_alt = $healthy_video_group['product_image']['alt'];
        $blog_image_url = $healthy_video_group['blog_image']['url'];
        $blog_image_alt = $healthy_video_group['blog_image']['alt'];
        $blog_link = $healthy_video_group['blog_link'];

        $video_link = $healthy_video_group['video_link'];
        while ( have_rows('healthy_video')): the_row(); ?>
            <section class="healthy-video">
                <div class="healthy-video__inner inner-section-1220">
                    
                    <h4><?php echo $video_heading ?></h4>

                    <div class="prod_image_custom">
                        <img src="<?php echo $product_image_url ?>" alt="<?php echo $product_image_alt ?>">
                    </div>  

                    <a class="prod_button" href="<?php echo $video_order_link ?>">
                         <?php echo $button_text ?>
                    </a>

                  <!--  <h4><?php echo $learnmore_heading ?></h4>

                    <div class="blog_image_custom">
                        <a href="<?php echo $blog_link ?>">
                            <img src="<?php echo $blog_image_url ?>" alt="<?php echo $blog_image_alt ?>">
                        </a>
                    </div> --> 

                    <?php if( have_rows('customer_testimonials')) :
                        $testimonials_group = get_field('customer_testimonials');
                        $customer_image_url = $testimonials_group['customer_image']['url'];
                        $customer_image_alt = $testimonials_group['customer_image']['alt'];
                        $reviewstars_image_url = $testimonials_group['review_stars']['url'];
                        $reviewstars_image_alt = $testimonials_group['review_stars']['alt'];
                        $customerreview_title = $testimonials_group['customerreview_title'];
                        $customerreview_description = $testimonials_group['customerreview_description'];
                        
                        while ( have_rows('customer_testimonials')): the_row(); ?>

                            <section class="customer-testimonial-block">
                                <div class="customertestimonial__inner inner-section-1220">
                                    <div class="customertestimonial__img-text">
                                    

                                    <div class="customertestimonial__customer" style="background:url(<?php echo $customer_image_url ?>); background-repeat:no-repeat;background-size:cover;background-position:left;">
                                        
                                    </div>      


                                        <div class="customertestimonial__text">  

                                            <img src="<?php echo $reviewstars_image_url ?>" alt="<?php echo $reviewstars_image_alt ?>">
                                                    
                                            <h4><?php echo $customerreview_title ?></h4>

                                            <div class="customer-review-desc">
                                                <?php echo $customerreview_description ?>
                                            </div>

                                        </div>


                                    </div>
                                    
                                </div>
                            </section>
                            <?php endwhile;
                    endif; ?>
                   
                    
                   
                   
                    <div class="healthy-video__source">
                        <label>Sources</label>
                        <div class="healthy-video__source-links">
                            <?php if( have_rows('source_items_repeater') ) :
                                while( have_rows('source_items_repeater') ) : the_row();
                                $item_text = get_sub_field('item_text');
                            ?>
                                <a href="<?php echo $item_text ?>">
                                    <span><?php echo get_row_index() ?></span>
                                    <?php echo $item_text ?>
                                </a>
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