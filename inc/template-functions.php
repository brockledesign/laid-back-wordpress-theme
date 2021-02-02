<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Laid_Back
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function laid_back_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'laid_back_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function laid_back_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'laid_back_pingback_header' );
/**
 * Add fonts
 */
function add_theme_fonts() {
	wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap', false, null);
	wp_enqueue_style( 'scroll-fade-style', get_template_directory_uri() . '/js/scroll-fade.css' );
	wp_enqueue_script( 'fontawesome-js', 'https://kit.fontawesome.com/cd65db4b5f.js', false, null);
}
add_action( 'wp_enqueue_scripts', 'add_theme_fonts' );

/**
 * Add scripts
 */
function add_theme_scripts() {
	wp_enqueue_script( 'CbpAnimatedHeader', get_template_directory_uri() . '/js/CbpAnimatedHeader.js', array ( 'jquery' ));
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array ( 'jquery' ));
	wp_enqueue_script( 'scroll-fade', get_template_directory_uri() . '/js/scroll-fade.js', array ( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * Add admin scripts
 */
add_action('admin_enqueue_scripts', 'add_theme_admin_scripts');
function add_theme_admin_scripts() {
	// Media uploader
    wp_enqueue_media();
    wp_enqueue_script('custom-media-upload-admin', get_template_directory_uri() . '/js/custom-media-upload.js', false, '1.0.0', true);
	// Color picker
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script('custom-color-picker-admin', get_template_directory_uri() . '/js/custom-color-picker.js', false, '1.0.0', true);
	// Admin styles
	wp_enqueue_style( 'laid-back-admin-style', get_template_directory_uri() . '/admin-style.css', false, null);
}

/**
 * Footer Sidebar
 */
function footer_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Footer Area', 'theme_text_domain' ),
            'id' => 'footer-sidebar',
            'description' => __( 'Add widgets for footer here.', 'theme_text_domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'footer_sidebar' );
