<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Turismo_InterOceánico
 */

?>
	<div class="wrapfooter">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1-sidebar' ) ) : ?>
    					<?php dynamic_sidebar( 'footer-1-sidebar' ); ?>
					<? endif; ?>
					
					<?php if ( is_active_sidebar( 'footer-2-sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2-sidebar' ); ?>
					<? endif; ?>

					<div class="col-md-4">
					<!-- Menu Social -->
					<?php get_template_part('template-parts/menu', 'social'); ?>
					<?php if ( is_active_sidebar( 'footer-3-sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3-sidebar' ); ?>
					<? endif; ?>
					</div>
				</div>
			</div><!-- End Container -->
		</footer>
		<div class="container">
			<div class="credits row">
				<?php imgd_credits(); ?>
			</div>
		</div>
	</div> <!-- #wrapfooter -->

<?php wp_footer(); ?>
</div><!-- end Page -->
</body>
</html>
