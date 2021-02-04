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
    <?php if( have_rows('post_hero_group')) :
        $post_hero_group = get_field('post_hero_group');
        $hero_title = $post_hero_group['hero_title'];
        $hero_description = $post_hero_group['hero_description'];
        $hero_user_image_url = $post_hero_group['hero_user_image']['url'];
        $hero_user_image_alt = $post_hero_group['hero_user_image']['alt'];
        $hero_user_name = $post_hero_group['hero_user_name'];
        $hero_image_url = $post_hero_group['hero_image']['url'];
        $hero_image_alt = $post_hero_group['hero_image']['alt'];
        while ( have_rows('post_hero_group')): the_row(); ?>
            <sectoin class="post-hero" style="background-image: url(<?php echo $hero_image_url ?>)">
                <div class="post-hero__inner">
                    <nav class="post-hero__breadcrumb">
                        <a href="/">C60 Blog > </a>LONGEVITY
                    </nav>
                    <h1><?php echo $hero_title ?></h1>
                    <p><?php echo $hero_description ?></p>
                    <div class="post-hero__user">
                        <img src="<?php echo $hero_user_image_url ?>" alt="<?php echo $hero_user_image_alt ?>">
                        <label><?php echo $hero_user_name ?></label>
                    </div>
                </div>
            </sectoin>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('post_description_group')) :
        $post_description_group = get_field('post_description_group');
        $description_video = $post_description_group['description_video'];
        $description_image_url = $post_description_group['description_image']['url'];
        $description_image_alt = $post_description_group['description_image']['alt'];
        $description_content = $post_description_group['description_content'];
        while ( have_rows('post_description_group')): the_row(); ?>
            <section class="post-content">
                <div class="post-video-img inner-section-1120">
                    <?php if ($description_video) : ?>
                        <iframe width="420" height="220" src="<?php echo $description_video ?>" frameborder="0" allowfullscreen></iframe>
                    <?php endif; ?>
                    
                    <?php if ($description_image_url) : ?>
                        <img src="<?php echo$description_image_url ?>" alt="<?php echo $description_image_alt ?>">
                    <?php endif; ?>
                </div>

                <div class="post-description inner-section-1120">
                    <div class="post-content"><?php echo $description_content ?></div>
                    <ul>
                        <?php if( have_rows('description_option_repeater') ) :
                            while( have_rows('description_option_repeater') ) : the_row();
                                $option_title = get_sub_field('option_title');
                                $option_link = get_sub_field('option_link');
                            ?>
                                <li><a href="<?php echo $option_link ?>"><?php echo $option_title ?></a></li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('post_related_group')) :
        $post_related_group = get_field('post_related_group');
        $description_video = $post_related_group['description_video'];
        $description_image_url = $post_related_group['description_image']['url'];
        $description_image_alt = $post_related_group['description_image']['alt'];
        $description_content = $post_related_group['description_content'];
        while ( have_rows('post_related_group')): the_row(); ?>
            <section class="post-related">
                <div class="blog-collection-posts inner-section-1366">
                    <?php if( have_rows('article_related_repeater') ) :
                        while( have_rows('article_related_repeater') ) : the_row();
                            $related_title = get_sub_field('related_title');
                            $related_likes_count = get_sub_field('related_likes_count');
                            $related_comments_count = get_sub_field('related_comments_count');
                            $related_mins_count = get_sub_field('related_mins_count');
                            $related_description = get_sub_field('related_description');
                            $related_read_more_button_link = get_sub_field('related_read_more_button_link');
                        ?>
                            <div class="blog-collection-post post--<?php echo get_row_index() ?>">
                                <h2><?php echo $related_title ?></h2>
                                <ul>
                                    <li><?php echo $related_likes_count ?> likes</li>
                                    <li><?php echo $related_comments_count ?> comments</li>
                                    <li><?php echo $related_mins_count ?> mins read</li>
                                </ul>
                                <p><?php echo $related_description ?></p>
                                <a href="<?php echo $related_read_more_button_link ?>"><span>Read More</span></a>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();
