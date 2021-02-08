<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laid_Back
 */

?>
</div><!-- #content -->
	<div class="footer-widgets">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				&copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?> & House Buy Direct <?php echo date("Y"); ?> |
				<?php
					printf( esc_html__( 'Website Designed &amp; Built by %1$s.', 'laid-back' ), '<a href="http://www.brockledesign.co.uk/">Brockle Design</a>' );
				?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
