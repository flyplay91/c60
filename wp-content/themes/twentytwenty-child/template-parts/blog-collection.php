<?php
/**
 * Template Name: Blog Collection Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="blog-collection-page">

    <?php if( have_rows('blog_collection_hero')) :
        $blog_collection_hero_group = get_field('blog_collection_hero');
        $hero_background_image_url = $blog_collection_hero_group['hero_background_image']['url'];
        $hero_background_image_alt = $blog_collection_hero_group['hero_background_image']['alt'];
        $hero_heading = $blog_collection_hero_group['hero_heading'];
        $hero_description = $blog_collection_hero_group['hero_description'];
        $hero_read_more_button_link = $blog_collection_hero_group['hero_read_more_button_link'];
        while ( have_rows('blog_collection_hero')): the_row(); ?>
            <section class="blog-collection-hero" style="background-image: url(<?php echo $hero_background_image_url ?>)">
                <div class="blog-collection-hero__inner">
                    <label>Blog | Most Popular</label>
                    <h1><?php echo $hero_heading ?></h1>
                    <ul>
                        <li>52 likes</li>
                        <li>16 comments</li>
                        <li>3 mins read</li>
                    </ul>
                    <p><?php echo $hero_description ?></p>
                    <a href="<?php echo $hero_read_more_button_link ?>">Read More</a>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <section class="blog-collection-categories">
        <ul class="blog-collection-categories-title">
            <li>Newest</li>
            <li>Most Popular</li>
            <li>Immunity</li>
            <li>Women's Health</li>
            <li>Men's Health</li>
            <li>Longevity</li>
            <li>Inflammation</li>
            <li>Examples</li>
        </ul>
        <div class="blog-collection-categories-content">
            <div class="blog-collection-category-content inner-section-1120">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-4.jpg" alt="">
                <h2>What to know about<br>  coconut oil.</h2>
                <ul>
                    <li>52 likes</li>
                    <li>16 comments</li>
                    <li>3 mins read</li>
                </ul>
                <p>Coconut oil has grown in popularity in recent years, amid claims that it can do everything from supporting weight loss to slowing the progression of Alzheimer’s disease.</p>
                <a href=""><span>Read More</span><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right_arrow_triangle.png"></a>
            </div>

            <div class="blog-collection-posts inner-section-1220">
                <div class="blog-collection-post post--1">
                    <h2>Other health benefits of avocado oil</h2>
                    <ul>
                        <li>52 likes</li>
                        <li>16 comments</li>
                        <li>3 mins read</li>
                    </ul>
                    <p>Research suggests that avocado oil can help to prevent several health issues, including diabetes and high cholesterol.</p>
                    <a href=""><span>Read More</span><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right_arrow_triangle_white.png"></a>
                </div>
                <div class="blog-collection-post post--2">
                    <h2>What to know about coconut oil.</h2>
                    <ul>
                        <li>52 likes</li>
                        <li>16 comments</li>
                        <li>3 mins read</li>
                    </ul>
                    <p>Coconut oil has grown in popularity in recent years, amid claims that it can do everything from supporting weight loss to slowing the progression of Alzheimer’s disease.</p>
                    <a href=""><span>Read More</span><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right_arrow_triangle.png"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-collection-bottom" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/blog_collection_bottom_img.jpg)">
        <div class="blog-collection-bottom__inner">
            <h2>Avocado oil for skin:<br> Eight benefits and<br> how to use it.</h2>
            <ul>
                <li>52 likes</li>
                <li>16 comments</li>
                <li>3 mins read</li>
            </ul>
            <p>While avocado oil is best known for its uses in cooking, it can also contribute to skin care. The oil is an ingredient in many types of creams, moisturizers, and sunscreens.</p>
            <a href=""><span>Read More</span><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right_arrow_triangle.png"></a>
        </div>
    </section>
</main>

<?php get_footer();