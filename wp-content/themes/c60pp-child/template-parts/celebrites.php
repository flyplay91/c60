<?php
/**
 * Template Name: Celebrities Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="celebrities-page">
    <?php if( have_rows('celebrities_hero_group')) : 
        $celebrities_hero_group = get_field('celebrities_hero_group');
        $hero_heading = $celebrities_hero_group['hero_heading'];
        $hero_description = $celebrities_hero_group['hero_description'];
		$hero_img_url = $celebrities_hero_group['hero_image']['url'];
		$hero_img_alt = $celebrities_hero_group['hero_image']['alt'];
		$hero_arrow_img_url = $celebrities_hero_group['hero_down_arrow']['url'];
		$hero_arrow_img_alt = $celebrities_hero_group['hero_down_arrow']['alt'];
        
        while ( have_rows('celebrities_hero_group')): the_row(); ?>
            <section class="celebrities-hero">
                <div class="celebrities-hero__inner inner-section-1440">
                    <div class="celebrities-hero__heading">
                        <h1><?php echo $hero_heading ?></h1>
                        <p><?php echo $hero_description ?></p>
                        <img src="<?php echo $hero_arrow_img_url ?>" alt="<?php echo $hero_arrow_img_alt ?>">
                    </div>
                    <div class="celebrities-hero__img">
                        <img src="<?php echo $hero_img_url ?>" alt="<?php echo $hero_img_alt ?>">
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

    <?php if( have_rows('celebrities_item_group')) : ?>
        <?php while ( have_rows('celebrities_item_group')): the_row(); ?>
            <section class="celebrities-users">
                <div class="celebrities-users__inner inner-section-1220">
                    <?php if( have_rows('item_repeater') ) :
						while( have_rows('item_repeater') ) : the_row();
                        $item_image_url = get_sub_field('item_image')['url'];
                        $item_image_alt = get_sub_field('item_image')['alt'];
                        $item_user_name = get_sub_field('item_user_name');
                        $item_user_role = get_sub_field('item_user_role');
                        $item_social_link = get_sub_field('item_social_link');
                        $item_social_image_url = get_sub_field('item_social_image')['url'];
                        $item_social_image_alt = get_sub_field('item_social_image')['alt'];
                        $item_description = get_sub_field('item_description');
					?>
                        <div class="celebrities-user">
                            <img class="celebrities-user-img" src="<?php echo $item_image_url ?>" alt="<?php echo $item_image_alt ?>">
                            <div class="celebrities-user-name-instagram">
                                <div class="celebrities-user-name">
                                    <label><?php echo $item_user_name ?></label>
                                    <span><?php echo $item_user_role ?></span>
                                </div>
                                <a href="<?php echo $item_social_link ?>"><img src="<?php echo $item_social_image_url ?>" alt="<?php echo $item_social_image_alt ?>"></a>
                            </div>
                            <p><?php echo $item_description ?></p>
                        </div>
                    <?php endwhile;
                endif; ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>
</main>

<?php get_footer();