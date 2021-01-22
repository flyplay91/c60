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
    <sectoin class="blog-article-hero">
        <div class="blog-article-hero__inner">
            <div class="blog-article-hero__text">
                <nav class="blog-article__breadcrumb">
                    <a href="/">C60 Blog > </a>LONGEVITY
                </nav>
                <h1>Avocado oil for skin:<br> Eight benefits and<br> how to use it.</h1>
                <p>While avocado oil is best known for its uses in cooking, it can also contribute to skin care. The oil is an ingredient in many types of creams, moisturizers, and sunscreens.</p>
                <div class="blog-article__user">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blog_article_user_1.png" alt="">
                    <label>by Elliana Palacios, Dermatologist</label>
                </div>
            </div>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blog_article_1_hero.png" alt=""><img src="" alt="">
        </div>
    </sectoin>
</main>

<?php get_footer();