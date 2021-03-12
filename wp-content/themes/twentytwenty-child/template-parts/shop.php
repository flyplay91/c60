<?php
/**
 * Template Name: Shop Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="shop-page">
	<?php if( have_rows('shop_hero_group')) : 
		$hero_group = get_field('shop_hero_group');
		$hero_img_url = $hero_group['hero_background_image']['url'];
		$hero_img_alt = $hero_group['hero_background_image']['alt'];
		$hero_mobi_img_url = $hero_group['hero_mobile_image']['url'];
		$hero_mobi_img_alt = $hero_group['hero_mobile_image']['alt'];
		$hero_heading = $hero_group['hero_heading'];
		$hero_sub_heading = $hero_group['hero_sub_heading'];
		$hero_arrow_img_url = $hero_group['hero_down_arrow']['url'];
		$hero_arrow_img_alt = $hero_group['hero_down_arrow']['alt'];
		
		while ( have_rows('shop_hero_group')): the_row(); 
			if ($hero_img_url) : ?>
				<section class="shop__hero">
				<style>
					.shop__hero {
						background-image: url(<?php echo $hero_img_url ?>);
					}
					@media(max-width: 500px) {
						.shop__hero {
							background-image: url(<?php echo $hero_mobi_img_url ?>);
						}
					}
				</style>
					<div class="shop__hero-content">
						<h1><?php echo $hero_heading ?></h1>
						<p><?php echo $hero_sub_heading ?></p>
						<img class="shop-hero-down-arrow" src="<?php echo $hero_arrow_img_url ?>" alt="<?php echo $hero_arrow_img_alt ?>">
					</div>
				</section>
			<?php endif; 
		endwhile;
    endif; ?>

<!--	<?php if( have_rows('shop_menu_group')) : ?>
        <?php while ( have_rows('shop_menu_group')): the_row(); ?>
			<section class="shop_nav">
				<ul class="shop-parent-nav">
					<?php if( have_rows('main_menu_repeater') ) :
						while( have_rows('main_menu_repeater') ) : the_row();
						$main_menu_title = get_sub_field('main_menu_title');
                    	$main_menu_link = get_sub_field('main_menu_link');
					?>
						<li>
							<span><a href="<?php echo $main_menu_link ?>"><?php echo $main_menu_title ?></a></span>
							<ul class="shop-child-nav">
								<?php if( have_rows('sub_menu_repeater') ) :
									while( have_rows('sub_menu_repeater') ) : the_row(); 
									$sub_menu_title = get_sub_field('sub_menu_title');
									$sub_menu_link = get_sub_field('sub_menu_link');
								?>
									<li><a href="<?php echo $sub_menu_link ?>"><?php echo $sub_menu_title ?></a></li>
									<?php endwhile;
								endif; ?>
							</ul>
						</li>
						<?php endwhile;
    				endif; ?>
				</ul>
			</section>
		<?php endwhile;
    endif; ?>-->

	<section class="shop-products">

		<div class="shop-products__inner inner-section-1120">
			<div class="shop-sort-breadcrumb">
				<?php if( have_rows('breadcrumb_group')) : 
					$breadcrumb_group = get_field('breadcrumb_group');
					$breadcrumb_text = $breadcrumb_group['breadcrumb_text'];
					
					while ( have_rows('breadcrumb_group')): the_row(); ?>
						<div class="page-breadcrumb">
							<?php echo $breadcrumb_text ?>
						</div>
					<?php endwhile;
				endif; ?>
				<div class="shop-sort__inner">
					<?php 
					if (isset($_POST['sortBtn'])) {
						$filterVal = $_POST['sortBtn'];
						if ($filterVal == 'sort_by_popularity') { ?>
							<label>Sort by popularity</label>
						<?php } else if ($filterVal == 'sort_by_rating') { ?>
							<label>Sort by average rating</label>
						<?php } else if ($filterVal == 'sorty_by_latest') { ?>
							<label>Sort by latest</label>
						<?php } else if ($filterVal == 'sort_by_low_high') { ?>
							<label>Sort by price: low to high</label>
						<?php } else if ($filterVal == 'sort_by_high_low') { ?>
							<label>Sort by price high to low</label>
						<?php } else { ?>
							<label>Default</label>
						<?php }
					} else { ?>
						<label>Default</label>
					<?php }
					?>
					
					<form method="post" id="sort_form">
						<input type="hidden" name="sortBtn" class="sort-btn" value="">
						<ul>
							<li class="default-sort" data-title="sort_by_default">Default</a></li>
							<li data-title="sort_by_popularity">Sort by popularity</a></li>
							<li data-title="sort_by_rating">Sort by average rating</li>
							<li data-title="sorty_by_latest">Sort by latest</li>
							<li data-title="sort_by_low_high">Sort by price: low to high</li>
							<li data-title="sort_by_high_low">Sort by price high to low</li>
						</ul>
					</form>
				</div>
			</div>
			
			<div class="shop-products-block">
				<?php
					if (isset($_POST['sortBtn'])) {
						$sortVal = $_POST['sortBtn'];
						if ($sortVal == 'sort_by_popularity') {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby' => 'popularity'
							);
						} else if ($sortVal == 'sort_by_rating') {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby' => 'rating'
							);
						} else if ($sortVal == 'sorty_by_latest') {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby' => 'date', 
								'order' => 'DEC'
							);
						} else if ($sortVal == 'sort_by_low_high') {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby'        => 'meta_value_num',
								'meta_key'       => '_price',
								'order'          => 'asc'
							);
							
						} else if ($sortVal == 'sort_by_high_low') {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby'        => 'meta_value_num',
								'meta_key'       => '_price',
								'order'          => 'dec'
							);
						} else {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 9999,
								'orderby' => 'date', 
								'order' => 'ASC'
							);
						}
					} else {
						$args = array(
							'post_type'      => 'product',
							'posts_per_page' => 9999,
							'orderby' => 'date', 
							'order' => 'ASC'
						);
					}
					

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						wc_get_template_part( 'content', 'product' );
					endwhile;

					wp_reset_query();
				?>
			</div>
		</div>
	</section>
	
	<!--<?php if( have_rows('shop_image_text_group')) : ?>
		<?php while ( have_rows('shop_image_text_group')): the_row(); ?>
			<section class="shop__image-text">
				<div class="shop__image-text__inner inner-section-1120">
					<?php if( have_rows('image_text_repeater') ) :
						while( have_rows('image_text_repeater') ) : the_row();
						$image_url = get_sub_field('image')['url'];
						$image_alt = get_sub_field('image')['alt'];
						$content_text = get_sub_field('text');
						$image_position = get_sub_field('image_position');
					?>
						<div class="shop__image-text-block <?php if ($image_position[0] == 'left') { echo 'left-img'; } else { echo 'right-img' ;} ?>">
							<img src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>">
							<div class="shop-text"><?php echo $content_text ?></div>
						</div>
						<?php endwhile;
					endif; ?>
				</div>
			</section>
		<?php endwhile;
	endif; ?>-->

<!--	<?php if( have_rows('shop_accordion_group')) : ?>
		<?php while ( have_rows('shop_accordion_group')): the_row(); ?>
			<section class="shop__accordion">
				<div class="shop__accordion__inner inner-section-1120">
					<?php if( have_rows('accordion_repeater') ) :
						while( have_rows('accordion_repeater') ) : the_row();
						$accordion_title = get_sub_field('accordion_title');
					?>
						<div class="shop-accordion-block <?php if (get_row_index() == 1) echo 'first-accordion'; ?>">
							<h3><?php echo $accordion_title ?></h3>
							<div class="accordion-item-block">
								<?php if( have_rows('accordion_item_repeater') ) :
									while( have_rows('accordion_item_repeater') ) : the_row();
									$item_title = get_sub_field('item_title');
									$item_content = get_sub_field('item_content');
								?>
									
									<div class="accordion-item <?php if (get_row_index() == 1) echo 'active'; ?>">
										<h4><?php echo $item_title ?></h4>
										<p><?php echo $item_content ?></p>
									</div>
									
									<?php endwhile;
								endif; ?>
							</div>
						</div>
						<?php endwhile;
					endif; ?>
				</div>
			</section>
		<?php endwhile;
	endif; ?> -->

	<!--<?php if( have_rows('shop_more_group')) : 
		$shop_more_group = get_field('shop_more_group');
		$shop_more_heading = $shop_more_group['more_heading'];
		$shop_more_shortcode = $shop_more_group['more_shortcode'];
	?>
		<?php while ( have_rows('shop_more_group')): the_row(); ?>
			<section class="shop__blog">
				<div class="shop__blog__inner inner-section-1366">
					<h2><?php echo $shop_more_heading ?></h2>
					<?php echo do_shortcode($shop_more_shortcode); ?>
				</div>
			</section>
		<?php endwhile;
	endif; ?> -->


</main>
<?php
get_footer();
