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
    <div class="post-page__inner inner-section-1440">
        <div class="post-block">
            <div class="post-breadcrumb">
				<nav class="woocommerce-breadcrumb">
					<a href="/">C60 Purple Power</a> / <a href="/blog/">Blog</a> / <?php the_title() ?>
				</nav>
			</div>
            <h1><?php the_title() ?></h1>
            <?php the_content(); ?>
            <?php if( have_rows('post_image_text_group')) : ?>
                <?php while ( have_rows('post_image_text_group')): the_row(); 
                    $post_image_text_group = get_field('post_image_text_group');
                    $img_url = $post_image_text_group['image']['url'];
                    $img_alt = $post_image_text_group['image']['alt'];
                    $content = $post_image_text_group['content'];
                ?>
                <?php if ($img_url) : ?>
                <div class="post-img-text">
                    <div class="post-text">
                        <?php echo $content ?>
                    </div>
                    <div class="post-img" style="background-image:url(<?php echo $img_url ?>)"></div>
                </div>
                <?php endif; ?>
                <?php endwhile;
            endif; ?>

            <?php if( have_rows('post_privacy_group')) : ?>
                <?php while ( have_rows('post_privacy_group')): the_row(); 
                    $post_privacy_group = get_field('post_privacy_group');
                    $privacy_image_url = $post_privacy_group['privacy_image']['url'];
                    $privacy_image_alt = $post_privacy_group['privacy_image']['alt'];
                    $privacy_content = $post_privacy_group['privacy_content'];
                ?>
                <?php if ($privacy_image_url) : ?>
                <div class="post-privacy">
                    <img src="<?php echo $privacy_image_url ?>" alt="<?php echo $privacy_image_alt ?>">
                    <p><?php echo $privacy_content ?></p>
                </div>
                <?php endif; ?>
                <?php endwhile;
            endif; ?>

            <div class="post-pagination">
                
            </div>
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
