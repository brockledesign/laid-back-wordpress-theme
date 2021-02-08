<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laid_Back
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'text_domain' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="align-vertical">
					<div class="navbar-header page-scroll">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link">
							<img src="<?php echo esc_url( $custom_logo_url ); ?>" class="custom-logo" alt="<?php bloginfo( 'name' ); ?>" />
						</a>
						<?php
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$bencurrie_description = get_bloginfo( 'description', 'display' );
						if ( $bencurrie_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $bencurrie_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776;</button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s navbar-right">%3$s</ul>',
					) );
					?>
					<?php if(get_theme_mod('headerinfo_headerlink_text') != '') { ?>
						<a href="<?php echo get_theme_mod('headerinfo_headerlink_url'); ?>" class="laid-back-header-headerlink"><?php echo get_theme_mod('headerinfo_headerlink_text'); ?></a>
					<?php } ?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
