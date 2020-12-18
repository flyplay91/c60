<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="footer__inner">
					<div class="footer-logo">
						<img src="<?php echo get_field('footer_logo', 'option')['url'] ?>">
					</div>

					<div class="footer-address"><?php the_field('footer_address', 'option'); ?></div>

					<?php if( have_rows('footer_social', 'option') ): ?>
				    <ul class="footer-social">
				    <?php while( have_rows('footer_social', 'option') ): the_row(); ?>
			        <li><img src="<?php echo get_sub_field('footer_social_image')['url']; ?>"></li>
				    <?php endwhile; ?>
				    </ul>
					<?php endif; ?>
				</div>

			</footer>

		<?php wp_footer(); ?>

	</body>
</html>
