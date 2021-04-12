<?php
/**
 * Template Name: Customer Reviews Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="customer-reviews-page">
    <?php if( have_rows('reviews_group')) :
    // $args = array(
    //     'post_type'      => 'product',
    //     'posts_per_page' => 9999,
    //     'orderby' => 'date', 
    //     'order' => 'ASC'
    // );
    // global $product;
        while ( have_rows('reviews_group')): the_row(); ?>
            <section class="reviews-section">
                <div class="reviews-section__inner inner-section-1220">
                <h3>Reviews</h3>
                    <ul>
                        <?php 
                            if( have_rows('reviews_repeater') ) :
                            while( have_rows('reviews_repeater') ) : the_row();
                            $rating_image_url = get_sub_field('rating_image')['url'];
                            $rating_image_alt = get_sub_field('rating_image')['alt'];
                            $review_text = get_sub_field('review_content');
                            $review_user = get_sub_field('review_user');
                            $product_id = get_sub_field('product_id');
                            $product_link = get_permalink( $product_id );
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_link ), 'single-post-thumbnail' );
                        ?>
                            <li>
                                <a href="<?php echo $product_link ?>">
                                    <div class="customer-reviews-img-text">
                                        <div class="customer-product-img">
                                            <img src="<?php echo get_the_post_thumbnail_url($product_id); ?>">
                                            <label><?php echo get_the_title($product_id); ?></label>
                                        </div>
                                        <div class="customer-reviews-text">
                                            <div class="review-rating">
                                                <img src="<?php echo $rating_image_url ?>">
                                            </div>
                                            <div class="review-content"><?php echo $review_text ?></div>
                                            <div class="review-user"><?php echo $review_user ?></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();