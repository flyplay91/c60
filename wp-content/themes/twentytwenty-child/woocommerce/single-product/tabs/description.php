<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
	<h2><?php echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php if( have_rows('breadcrumb_group')) :
	while ( have_rows('breadcrumb_group')): the_row(); ?>
		<div class="product-page-breadcrumb">
			<?php if( have_rows('breadcrumb_repeater') ) :
				while( have_rows('breadcrumb_repeater') ) : the_row();
				$title = get_sub_field('title');
				$link = get_sub_field('link');
			?>
				<a href="<?php echo $link ?>"><?php echo $title ?> <span>/</span> </a>
				<?php endwhile;
			endif; ?>
		</div>
		<?php endwhile;
	endif;
?>

<?php the_content(); ?>
