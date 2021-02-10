<?php
/**
 * Template Name: Blog Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="blog-page">
    <?php if( have_rows('hero_group')) :
        $hero_group = get_field('hero_group');
        $hero_background_image_url = $hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $hero_group['hero_background_image']['alt'];
        $hero_heading = $hero_group['hero_heading'];
        $hero_description = $hero_group['hero_description'];
        $hero_read_more_button_link = $hero_group['hero_read_more_button_link'];
        while ( have_rows('hero_group')): the_row(); ?>
            <section class="blog-hero" style="background-image: url(<?php echo $hero_background_image_url ?>)">
                <div class="blog-hero__inner">
                   <label><a href="https://c60purplepower.com/blog" title="C60 Purple Power Blog">Blog</a> | Most Popular</label>
                    <h1><?php echo $hero_heading ?></h1>
                    
                    <p><?php echo $hero_description ?></p>
                    <a href="<?php echo $hero_read_more_button_link ?>">Read More</a>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <section class="blog-post-list">
        <div class="blog-post-list__inner inner-section-1366">
            <?php
                $attachments = get_posts( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 500,
                    'post_status'    => 'publish',
                    'post_parent'    => null
                ) );
                 
                if ( $attachments ) {
                    foreach ( $attachments as $post ) { 
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $post_date = get_the_date( 'F j, Y' );
                        ?>
                        <div class="blog-post-item">
                            <a class="post-item-image" href="<?php the_permalink(); ?>">
                                <img src="<?php echo $featured_img_url ?>">
                            </a>
                            <a class="post-item-title" href="<?php the_permalink(); ?>">
                                <h2><?php echo the_title() ?></h2>
                            </a>
                            
                            <p class="post-item-excerpt">
                                <?php echo wp_trim_words( the_excerpt(), 10, '...' ); ?>
                            </p>
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                }
            ?>
        </div>
    </section>
</main>

<?php get_footer();