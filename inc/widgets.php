<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

// Queue stylesheet
function laid_back_widgets_stylesheet() {
	wp_enqueue_style( 'laid-back-widgets-style', get_template_directory_uri() . '/widgets.css' );
}
add_action( 'wp_enqueue_scripts', 'laid_back_widgets_stylesheet' );

// Register Widgets
function laid_back_custom_widgets_init() {
    register_widget( 'laid_back_section_title_widget' );
    register_widget( 'laid_back_service_icon_widget' );
    register_widget( 'laid_back_partner_box_widget' );
}
add_action( 'widgets_init', 'laid_back_custom_widgets_init' );

/**
 * Load widget scripts
 */
require get_template_directory() . '/inc/widgets/widget-section-title.php';
require get_template_directory() . '/inc/widgets/widget-service-icon.php';
require get_template_directory() . '/inc/widgets/widget-partner-box.php';
