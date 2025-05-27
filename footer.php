<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ALLINHERE
 */

?>
	</div><!-- #content -->

	<?php do_action( 'allinhere_before_footer_content' ); // This hook is outside the conditional display of the footer. ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action( 'allinhere_footer' ); // This hook is inside, tied to the visual footer. ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'allinhere' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'allinhere' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'allinhere' ), 'ALLINHERE', '<a href="https://m-ibrahim.carrd.co">M.Ibrahim</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php do_action( 'allinhere_after_footer_content' ); // This hook is outside the conditional display of the footer. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
