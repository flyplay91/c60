<?php
/**
 * Template Name: VCSG Thank You  Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="main thank-you-main" id="site-content">
	<div class="page-thank-you">
		<div class="page-thank-you__inner">
	  	<h5><?php echo get_field('title'); ?></h5>
			<div class="btn-thank-you-cancel">
				<a href="/vcsg">Close</a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>