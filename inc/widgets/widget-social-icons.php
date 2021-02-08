<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Social Icons
 */
class laid_back_social_icons_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_social_icons_widget',

		// Widget name will appear in UI
		__('Laid Back - Social Icons', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Display social media icons (set in Customizer)', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
        // White Theme
        $whiteTheme = (isset( $instance[ 'whiteTheme' ] )) ? $instance[ 'whiteTheme' ] : 'false';
        $alignment = isset ( $instance['alignment'] ) ? $instance['alignment'] : '';

		// Widget admin form
		?>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $whiteTheme, 'on' ); ?> id="<?php echo $this->get_field_id('whiteTheme'); ?>" name="<?php echo $this->get_field_name( 'whiteTheme' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'whiteTheme' ); ?>">White theme?</label>
        </p>
        <p>
			<label for="<?php echo $this->get_field_name('alignment'); ?>">Alignment:</label>
			<select name="<?php echo $this->get_field_name('alignment'); ?>" id="<?php echo $this->get_field_name('alignment'); ?>">
			  <option value="left" <?php selected( $alignment , 'left') ?>>Left</option>
			  <option value="right" <?php selected( $alignment , 'right') ?>>Right</option>
			  <option value="center" <?php selected( $alignment , 'center') ?>>Center</option>
			</select>
        </p>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['whiteTheme'] = ( ! empty( $new_instance['whiteTheme'] ) ) ? strip_tags( $new_instance['whiteTheme'] ) : '';
        $instance['alignment'] = ( ! empty( $new_instance['alignment'] ) ) ? $new_instance['alignment'] : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$whiteTheme = $instance[ 'whiteTheme' ] ? 'true' : 'false';
        $alignment = $instance[ 'alignment' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		?>
        <div class="laid-back-social-icons-wrapper <?php if($whiteTheme == "true") echo 'laid-back-social-icons-wrapper-white'; ?> laid-back-social-icons-wrapper-align-<?php echo $alignment; ?>">
			<?php if(get_theme_mod('contactinfo_facebook') != '') { ?>
				<div class="social-item"><a href="<?php echo get_theme_mod('contactinfo_facebook'); ?>"><i class="fab fa-facebook-square"></i></a></div>
			<?php } ?>
			<?php if(get_theme_mod('contactinfo_twitter') != '') { ?>
				<div class="social-item"><a href="<?php echo get_theme_mod('contactinfo_twitter'); ?>"><i class="fab fa-twitter-square"></i></a></div>
			<?php } ?>
			<?php if(get_theme_mod('contactinfo_instagram') != '') { ?>
				<div class="social-item"><a href="<?php echo get_theme_mod('contactinfo_instagram'); ?>"><i class="fab fa-instagram"></i></a></div>
			<?php } ?>
			<?php if(get_theme_mod('contactinfo_linkedin') != '') { ?>
				<div class="social-item"><a href="<?php echo get_theme_mod('contactinfo_linkedin'); ?>"><i class="fab fa-linkedin"></i></a></div>
			<?php } ?>
        </div>
		<?php

		echo $args['after_widget'];
	}
}
