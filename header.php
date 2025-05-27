<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ALLINHERE
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
wp_body_open(); 
do_action( 'allinhere_before_site_header' ); // This hook is outside the conditional display of the header.
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'allinhere' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php do_action( 'allinhere_header' ); ?>
		<div class="site-branding">
			<?php
			the_custom_logo();
			// Note: The condition `is_front_page() && is_home()` for H1 might be less relevant if header is hidden on front page.
			// However, keeping it as is, as it might be shown via customizer or other contexts.
			if ( is_front_page() && is_home() ) : 
				?>
				<h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$allinhere_description = get_bloginfo( 'description', 'display' );
			if ( $allinhere_description || is_customize_preview() ) :
				?>
				<p class="site-description" itemprop="description"><?php echo $allinhere_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php do_action( 'allinhere_after_site_branding' ); ?>

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'allinhere' ); ?>">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'allinhere' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		<?php do_action( 'allinhere_after_navigation' ); ?>
	</header><!-- #masthead -->

	<?php do_action( 'allinhere_before_content' ); // This hook is outside the conditional display of the header. ?>
	<div id="content" class="site-content">
