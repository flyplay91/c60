<?php
/**
 * Template Name: Blog Post Template
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
        $hero_breadcrumbs = $post_hero_group['breadcrumbs'];
        $hero_title = $post_hero_group['hero_title'];
        $post_date = $post_hero_group['post_date'];
        $author_name = $post_hero_group['author_name'];
        $title_about_the_author = $post_hero_group['title_about_the_author'];
        $about_the_author_description = $post_hero_group['about_the_author_description'];
        $overview_title = $post_hero_group['overview_title'];
        $overview_description = $post_hero_group['overview_description'];
        $video_embed_code = $post_hero_group['video_embed_code'];
      
        //$podcast_title = $post_hero_group['podcast_title'];
        //$podcast_embed_code = $post_hero_group['podcast_embed_code'];
        //$summary_title = $post_hero_group['summary_title'];
        //$summary_description = $post_hero_group['summary_description'];
        //$research_title = $post_hero_group['research_title'];
        //$research_description = $post_hero_group['research_description'];

        $author_image_url = $post_hero_group['author_image']['url'];
        $author_image_alt = $post_hero_group['author_image']['alt'];

        $hero_image_url = $post_hero_group['hero_image']['url'];
        $hero_image_alt = $post_hero_group['hero_image']['alt'];

        while ( have_rows('post_hero_group')): the_row(); ?>
            
            <section class="post-hero">
                <div class="post-hero__inner inner-section-1120">
                    <nav class="post-hero__breadcrumb">
                        <?php echo $hero_breadcrumbs ?>
                    </nav>
                    <h1><?php echo $hero_title ?></h1>
                    <!--<div class="featured-image">
                    <?php echo get_the_post_thumbnail(); ?>
                    </div>-->
                   
                    <div class="post-hero__user">
                        <div class="post_date">
                           Date: <?php echo $post_date ?>
                        </div>
                        <span class="date-sep"> // </span> 
                            <?php echo $author_name ?>
                        
                        <!--<?php
                            $user_info = get_userdata(2);
                            $user_name = $user_info->display_name;
                        ?>
                        <img src="<?php echo $hero_user_image_url ?>" alt="<?php echo $hero_user_image_alt ?>"> 
                        <img src="<?php print get_avatar_url($user->ID, ['size' => '40']); ?>">
                        <label>by <?php echo $user_name ?></label> -->

                    </div>

                    <?php social_warfare();?>


                </div>
            </section>
        


        <section class="about-author-section">
                <div class="post-about-section inner-section-1120">
                    <div class="about-img">
                        <img src="<?php echo $author_image_url ?>" alt="<?php echo $author_image_alt ?>">
                    </div>
                        <div class="about-desc">
                            <h4><?php echo $title_about_the_author ?></h4>
                            
                            <div class="about-author">
                            <?php echo $about_the_author_description ?>

                            <div>
                        </div>
                </div>
        </section>



        <section>
        <div class="post-overview-section inner-section-1120">
                <h4><?php echo $overview_title ?></h4>
                <p><?php echo $overview_description ?></p>

                </div>
        </section>



        <section>
            <div class="post-video-section inner-section-1120">
            <?php echo $video_embed_code ?>
            </div>
        </section>

        <?php endwhile;
    endif; ?>

<?php 
$podcast_title = $post_hero_group['podcast_title'];
$podcast_embed_code = $post_hero_group['podcast_embed_code'];

if ( $podcast_title !== '' && $podcast_embed_code !=='' ): ?>

        <section>
            <div class="post-podcast-section inner-section-1120">
                <h4><?php echo $podcast_title ?></h4>
                
                <br />
            <?php echo $podcast_embed_code ?>
            <br />
            If you like the show, please review it on <a href="https://podcasts.apple.com/us/podcast/the-c60-show/id1466120483">iTunes</a>
            </div>
        </section>
<?php endif; ?>


<?php 
$summary_title = $post_hero_group['summary_title'];
$summary_description = $post_hero_group['summary_description'];

if ( $summary_title !== '' && $summary_description !=='' ): ?>

        <section>
            <div class="post-summary-section inner-section-1120">
                <h4><?php echo $summary_title ?></h4>
                <br />
            <?php echo $summary_description ?>
            </div>
        </section>
 <?php endif; ?>

 <?php 
$research_title = $post_hero_group['research_title'];
$research_description = $post_hero_group['research_description'];

if ( $research_title !== '' && $research_description !=='' ): ?>
        <section>
            <div class="post-research-section inner-section-1120">
                <h4><?php echo $research_title ?></h4>
                <br />
            <?php echo $research_description ?>
            </div>
        </section>

<?php endif; ?>



     


    <?php
        the_content();
    ?>

    <section class="">
        <div class="post-description post-tags inner-section-1120">
        <p><strong>Tags</strong></p>
            <ul>
                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach($posttags as $tag) { ?>
                        <li><a href="<?php echo get_tag_link($tag) ?>"><?php echo $tag->name ?></a></li>
                    <?php }
                }
                ?>
            </ul>

        </div>

        <div class="post-tags post-categories inner-section-1120">
            <p><strong>Categories</strong></p>
            <ul>
                <?php
                    $categories = get_categories( array(
                        'orderby' => 'none',
                        'order'   => 'ASC'
                    ) );
 
                if ($categories) {
                    foreach($categories as $category) { ?>
                    <?php $category_link = esc_url( get_category_link( $category->term_id )); ?>
                        <li>
                            <a href="<?php echo $category_link ?>"><?php echo $category->name ?></a>
                        </li>
                    <?php }
                } ?>
</ul>
        </div>

    </section>

    <section class="">
        <div class="post-disclaimer inner-section-1120">
                <?php social_warfare();?>

                <hr />


               <p>You can also send your questions to <a href="mailto:questions@c60purplepower.com">questions@c60purplepower.com</a> for our next webinar! We have a webinar every 2nd and 4th Wednesday of the Month at 7:00 pm MST.</p>

<p><strong>Disclaimer:</strong><br /> C60 Purple Power products are not meant to diagnose, treat or cure any health condition, nor make or imply any health claims.</p>


        </div>
    </section>

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
                            <a href="<?php echo $related_read_more_button_link ?>"><h2><?php echo $related_title ?></h2></a>
                              <!--  <ul>
                                    <li><?php echo $related_likes_count ?> likes</li>
                                    <li><?php echo $related_comments_count ?> comments</li>
                                    <li><?php echo $related_mins_count ?> mins read</li>
                                </ul>-->
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
