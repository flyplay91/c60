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
                            <span class="post-date">
                                <?php echo $post_date ?>
                            </span>
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