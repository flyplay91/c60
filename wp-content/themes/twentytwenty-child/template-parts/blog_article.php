<?php
/**
 * Template Name: Blog Article Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="blog-article-page">
    <?php if( have_rows('article_hero_group')) :
        $article_hero_group = get_field('article_hero_group');
        $hero_title = $article_hero_group['hero_title'];
        $hero_description = $article_hero_group['hero_description'];
        $hero_user_image_url = $article_hero_group['hero_user_image']['url'];
        $hero_user_image_alt = $article_hero_group['hero_user_image']['alt'];
        $hero_user_name = $article_hero_group['hero_user_name'];
        $hero_image_url = $article_hero_group['hero_image']['url'];
        $hero_image_alt = $article_hero_group['hero_image']['alt'];
        while ( have_rows('article_hero_group')): the_row(); ?>
            <sectoin class="blog-article-hero">
                <div class="blog-article-hero__inner">
                    <div class="blog-article-hero__text">
                        <nav class="blog-article__breadcrumb">
                            <a href="/">C60 Blog > </a>LONGEVITY
                        </nav>
                        <h1><?php echo $hero_title ?></h1>
                        <p><?php echo $hero_description ?></p>
                        <div class="blog-article__user">
                            <img src="<?php echo $hero_user_image_url ?>" alt="<?php echo $hero_user_image_alt ?>">
                            <label><?php echo $hero_user_name ?></label>
                        </div>
                    </div>
                    <img src="<?php echo $hero_image_url ?>" alt="<?php echo $hero_image_alt ?>">
                </div>
            </sectoin>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('article_description_group')) :
        $article_description_group = get_field('article_description_group');
        $description_video = $article_description_group['description_video'];
        $description_image_url = $article_description_group['description_image']['url'];
        $description_image_alt = $article_description_group['description_image']['alt'];
        $description_content = $article_description_group['description_content'];
        while ( have_rows('article_description_group')): the_row(); ?>
            <section class="blog-article-content">
                <div class="blog-article-video-img inner-section-1366">
                    <?php if ($description_video) : ?>
                        <iframe width="420" height="315" src="<?php echo $description_video ?>" frameborder="0" allowfullscreen></iframe>
                    <?php endif; ?>
                    
                    <?php if ($description_image_url) : ?>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blog_article_1.jpg" alt="">
                    <?php endif; ?>
                </div>

                <div class="blog-article-description inner-section-1120">
                    <p><?php echo $description_content ?></p>
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

    <?php if( have_rows('article_related_group')) :
        $article_related_group = get_field('article_related_group');
        $description_video = $article_related_group['description_video'];
        $description_image_url = $article_related_group['description_image']['url'];
        $description_image_alt = $article_related_group['description_image']['alt'];
        $description_content = $article_related_group['description_content'];
        while ( have_rows('article_related_group')): the_row(); ?>
            <section class="blog-article-related">
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