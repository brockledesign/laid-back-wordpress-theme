<?php
/**
 * Laid Back Theme Customizer
 *
 * @package Laid_Back
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function laid_back_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'laid_back_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'laid_back_customize_partial_blogdescription',
			)
		);
		/* Custom Settings */
		//
		// Contact Information Section
		//
		$wp_customize->add_section( 'laid_back_contactinfo_settings_section' , array(
		    'title'      => __( 'Laid Back - Contact Information', 'laid-back' ),
		    'priority'   => 30,
		) );
		// Contact Information - Phone Number
		$wp_customize->add_setting( 'contactinfo_phonenumber' , array(
		    'default'   => '0123456789',
		    'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_phonenumber_control', array(
			'label'      => __( 'Phone Number', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_phonenumber',
		) ) );
		// Contact Information - Mobile Number
		$wp_customize->add_setting( 'contactinfo_mobilenumber' , array(
		    'default'   => '0123456789',
		    'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_mobilenumber_control', array(
			'label'      => __( 'Mobile Number', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_mobilenumber',
		) ) );
		// Contact Information - Email Address
		$wp_customize->add_setting( 'contactinfo_email' , array(
		    'default'   => 'contact@email.com',
		    'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_email_control', array(
			'label'      => __( 'Email Address', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_email',
		) ) );
		// Contact Information - Facebook
		$wp_customize->add_setting( 'contactinfo_facebook' , array(
			'default'   => 'https://www.facebook.com/',
			'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_facebook_control', array(
			'label'      => __( 'Facebook', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_facebook',
		) ) );
		// Contact Information - Twitter
		$wp_customize->add_setting( 'contactinfo_twitter' , array(
			'default'   => 'https://www.twitter.com/',
			'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_twitter_control', array(
			'label'      => __( 'Twitter', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_twitter',
		) ) );
		// Contact Information - Instagram
		$wp_customize->add_setting( 'contactinfo_instagram' , array(
			'default'   => 'https://www.instagram.com/',
			'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_instagram_control', array(
			'label'      => __( 'Instagram', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_instagram',
		) ) );
		// Contact Information - LinkedIn
		$wp_customize->add_setting( 'contactinfo_linkedin' , array(
			'default'   => 'https://www.linkedin.com/',
			'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contactinfo_linkedin_control', array(
			'label'      => __( 'LinkedIn', 'laid-back' ),
			'section'    => 'laid_back_contactinfo_settings_section',
			'settings'   => 'contactinfo_linkedin',
		) ) );
		//
		// Header Section
		//
		$wp_customize->add_section( 'laid_back_header_settings_section' , array(
		    'title'      => __( 'Laid Back - Header', 'laid-back' ),
		    'priority'   => 30,
		) );
		// Header Section - Header Link Button Text
		$wp_customize->add_setting( 'headerinfo_headerlink_text' , array(
		    'default'   => '',
		    'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'headerinfo_headerlink_text_control', array(
			'label'      => __( 'Header Link Button - Text', 'laid-back' ),
			'section'    => 'laid_back_header_settings_section',
			'settings'   => 'headerinfo_headerlink_text',
		) ) );
		// Header Section - Header Link Button URL
		$wp_customize->add_setting( 'headerinfo_headerlink_url' , array(
		    'default'   => '',
		    'transport' => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'headerinfo_headerlink_url_control', array(
			'label'      => __( 'Header Link Button - URL', 'laid-back' ),
			'section'    => 'laid_back_header_settings_section',
			'settings'   => 'headerinfo_headerlink_url',
		) ) );
	}
}
add_action( 'customize_register', 'laid_back_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function laid_back_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function laid_back_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function laid_back_customize_preview_js() {
	wp_enqueue_script( 'laid-back-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'laid_back_customize_preview_js' );
