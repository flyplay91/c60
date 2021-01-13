<?php
/**
 * Template Name: Post Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main class="post-page">
    <div class="post-page__inner inner-section-1220">
        <div class="post-block">
            <?php the_content(); ?>
        </div>

        <div class="post-sidebar">
            <div class="recent-post-list">
                <h3>Recent Posts</h3>
                <ul>
                    <?php $posts_query = new WP_Query('posts_per_page=5');
                        while ($posts_query->have_posts()) : $posts_query->the_post();
                    ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php get_footer();
