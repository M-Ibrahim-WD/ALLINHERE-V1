<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ALLINHERE
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'ALLINHERE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ALLINHERE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'allinhere_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function allinhere_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'allinhere', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'allinhere' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'allinhere_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add support for editor styles.
		 */
		add_theme_support( 'editor-styles' );

		/**
		 * Add support for block styles.
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Add support for responsive embedded content.
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for WooCommerce.
		 */
		add_theme_support( 'woocommerce' );

		/**
		 * Add support for RTL language.
		 */
		add_theme_support( 'rtl-language-support' );

		// Add support for Elementor.
		add_theme_support( 'elementor' );

	}
endif;
add_action( 'after_setup_theme', 'allinhere_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function allinhere_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'allinhere' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'allinhere' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'allinhere_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function allinhere_scripts() {
	wp_enqueue_style( 'allinhere-style', get_stylesheet_uri(), array(), ALLINHERE_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'allinhere_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

/**
 * TGM Plugin Activation.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm-plugin-activation-config.php';

/**
 * Setup default pages on theme activation.
 * Creates Home, About, Contact pages and sets Home as static front page.
 * Runs only on first activation or after re-activation.
 */
function allinhere_setup_pages_on_activation() {
    // Check if we are processing this for the first time after activation
    if ( get_option( 'allinhere_activated_once' ) !== 'yes' ) {

        // Create Home Page
        $home_page_title = __( 'Home', 'allinhere' );
        // $home_page_content = __( 'Welcome to your new Elementor-powered website! You can edit this page with Elementor to get started.', 'allinhere' );
        $home_page_content = __( '<!-- Elementor placeholder -->', 'allinhere' ); // Minimal placeholder
        $home_page_check = get_page_by_title( $home_page_title );
        $home_page_id = 0;

        if ( ! $home_page_check ) {
            $home_page_id = wp_insert_post( array(
                'post_title'   => $home_page_title,
                'post_content' => $home_page_content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1, // Assign to admin user
                'menu_order'   => 0
            ) );
        } else {
            $home_page_id = $home_page_check->ID;
            // Optionally update content of existing page to placeholder if desired
            // wp_update_post(array('ID' => $home_page_id, 'post_content' => $home_page_content));
        }

        if ( $home_page_id ) {
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $home_page_id );
        }

        // About Page Creation Removed/Commented
        /*
        $about_page_title = __( 'About', 'allinhere' );
        $about_page_content = __( 'This is the About page. Edit it with Elementor to tell your story.', 'allinhere' );
        $about_page_check = get_page_by_title( $about_page_title );

        if ( ! $about_page_check ) {
            wp_insert_post( array(
                'post_title'   => $about_page_title,
                'post_content' => $about_page_content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1,
            ) );
        }
        */

        // Contact Page Creation Removed/Commented
        /*
        $contact_page_title = __( 'Contact', 'allinhere' );
        $contact_page_content = __( 'This is the Contact page. Edit it with Elementor to add your contact details or a form.', 'allinhere' );
        $contact_page_check = get_page_by_title( $contact_page_title );

        if ( ! $contact_page_check ) {
            wp_insert_post( array(
                'post_title'   => $contact_page_title,
                'post_content' => $contact_page_content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1,
            ) );
        }
        */
        
        // Mark that this setup has been done
        update_option( 'allinhere_activated_once', 'yes' );
    }
}
add_action( 'after_switch_theme', 'allinhere_setup_pages_on_activation' );

/**
 * Reset 'allinhere_activated_once' option on theme deactivation.
 * This allows the page setup to run again if the theme is reactivated.
 */
function allinhere_deactivation_cleanup() {
    delete_option( 'allinhere_activated_once' );
}
add_action( 'switch_theme', 'allinhere_deactivation_cleanup' );

?>
