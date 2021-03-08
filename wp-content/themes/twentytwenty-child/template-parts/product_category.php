<?php
/**
 * Template Name: Product Category Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="product-category-page">
	<div class="product-category__inner">
		
		<div class="shop-products__inner inner-section-1120">
			<div class="shop-sort-breadcrumb">
				<div class="shop-breadcrumb">
					<nav class="woocommerce-breadcrumb">
					<?php $breadcrumb = get_field('breadcrumb'); ?>
					<?php echo $breadcrumb ?> 
					</nav>
				</div>
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
		</div>
			
		<?php if( have_rows('category_heading_short_description_group')) : 
			$category_heading_short_description_group = get_field('category_heading_short_description_group');
			$category_heading = $category_heading_short_description_group['category_heading'];
			$category_short_description = $category_heading_short_description_group['category_short_description'];
			while ( have_rows('category_heading_short_description_group')): the_row(); ?>
			<section class="product-category__title-short-des">
				<div class="product-category__title-short-des__inner inner-section-1120">
					<h1><?php echo $category_heading ?></h1>
					<p><?php echo $category_short_description ?></p>
				</div>
			</section>
			<?php endwhile;
		endif; ?>

		<?php if( have_rows('category_slug_group')) : 
			$category_slug_group = get_field('category_slug_group');
			$category_slug_url = $category_slug_group['slug_url'];
			while ( have_rows('category_slug_group')): the_row(); ?>
				<section class="product-category__products">
					<div class="product-category__products__inner inner-section-1120">
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
									'order' => 'ASC',
									'product_cat' => $category_slug_url
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
				</section>
			<?php endwhile;
		endif; ?>

	<!--	<?php if( have_rows('category_description_group')) : 
			while ( have_rows('category_description_group')): the_row(); ?>
				<section class="product-category__des">
					<div class="product-category__des__inner inner-section-1120">
						<?php if( have_rows('description_repeater') ) :
							while( have_rows('description_repeater') ) : the_row();
							$description_title = get_sub_field('description_title');
							$description_content = get_sub_field('description_content');
						?>
							<div class="product-category__des--item">
								<h2><?php echo $description_title ?></h2>
								<p><?php echo $description_content ?></p>
							</div>
							<?php endwhile;
						endif; ?>
					</div>
				</section>
			<?php endwhile;
		endif; ?>-->

	<!--	<?php if( have_rows('category_accordion_group')) : 
			$category_accordion_group = get_field('category_accordion_group');
			$accordion_title = $category_accordion_group['accordion_title'];
		?>
			<?php while ( have_rows('category_accordion_group')): the_row(); ?>
				<section class="product-category__accordion">
					<div class="product-category__accordion__inner inner-section-1120">
						<h3><?php echo $accordion_title ?></h3>
						<div class="accordion-item-block">
							<?php if( have_rows('item_repeater') ) :
								while( have_rows('item_repeater') ) : the_row();
								$item_title = get_sub_field('accordion_item_title');
								$item_content = get_sub_field('accordion_item_content');
							?>
								
								<div class="accordion-item <?php if (get_row_index() == 1) echo 'active'; ?>">
									<h4><?php echo $item_title ?></h4>
									<p><?php echo $item_content ?></p>
								</div>
								
								<?php endwhile;
							endif; ?>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif; ?>-->
<!--
		<?php if( have_rows('category_more_group')) : 
			$category_more_group = get_field('category_more_group');
			$category_more_heading = $category_more_group['category_more_heading'];
			$category_more_shortcode = $category_more_group['category_more_shortcode'];
		?>
			<?php while ( have_rows('category_more_group')): the_row(); ?>
				<section class="category__blog">
					<div class="category__blog__inner inner-section-1366">
						<h2><?php echo $category_more_heading ?></h2>
						<?php echo do_shortcode($category_more_shortcode); ?>
					</div>
				</section>
			<?php endwhile;
		endif; ?> -->
	</div>
	
</main>

<?php get_footer(); ?>