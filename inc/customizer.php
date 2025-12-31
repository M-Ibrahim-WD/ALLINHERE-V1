<?php
/**
 * ALLINHERE Theme Customizer.
 *
 * @package ALLINHERE
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function allinhere_customize_register( $wp_customize ) {
	// Site Title & Tagline (already exists, but ensure transport is postMessage for live preview)
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'allinhere_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'allinhere_customize_partial_blogdescription',
		) );
	}

	// Theme Colors Section
	$wp_customize->add_section( 'allinhere_colors_section', array(
		'title'    => __( 'Theme Colors', 'allinhere' ),
		'priority' => 30,
	) );

	// Primary Color Setting
	$wp_customize->add_setting( 'allinhere_primary_color', array(
		'default'           => '#0073aa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage', // For live preview
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allinhere_primary_color', array(
		'label'    => __( 'Primary Color', 'allinhere' ),
		'section'  => 'allinhere_colors_section',
		'settings' => 'allinhere_primary_color',
	) ) );

	// Link Color Setting
	$wp_customize->add_setting( 'allinhere_link_color', array(
		'default'           => '#005177',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage', // For live preview
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allinhere_link_color', array(
		'label'    => __( 'Link Color', 'allinhere' ),
		'section'  => 'allinhere_colors_section',
		'settings' => 'allinhere_link_color',
	) ) );

}
add_action( 'customize_register', 'allinhere_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function allinhere_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function allinhere_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function allinhere_customize_preview_js() {
	wp_enqueue_script( 'allinhere-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), ALLINHERE_VERSION, true );
}
add_action( 'customize_preview_init', 'allinhere_customize_preview_js' );

/**
 * Output custom CSS to head
 */
function allinhere_customizer_css() {
	?>
	<style type="text/css">
		body {
			/* Example: Using primary color for body text. Adjust as needed. */
			/* color: <?php echo esc_attr( get_theme_mod( 'allinhere_primary_color', '#0073aa' ) ); ?>; */
		}
		a, .site-title a, .entry-title a { /* Added more selectors for link color */
			color: <?php echo esc_attr( get_theme_mod( 'allinhere_link_color', '#005177' ) ); ?>;
		}
		/* Example for primary color - apply to specific elements like headings or accents */
		h1, h2, h3, h4, h5, h6, .widget-title {
		    color: <?php echo esc_attr( get_theme_mod( 'allinhere_primary_color', '#0073aa' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'allinhere_customizer_css' );

?>
