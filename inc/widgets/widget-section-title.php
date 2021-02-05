<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Section Title
 */
class laid_back_section_title_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_section_title_widget',

		// Widget name will appear in UI
		__('Laid Back - Section Title', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Section title and subtitle text', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
        // White Theme
        $whiteTheme = (isset( $instance[ 'whiteTheme' ] )) ? $instance[ 'whiteTheme' ] : 'false';
        $alignment = isset ( $instance['alignment'] ) ? $instance['alignment'] : '';
        $title = isset ( $instance['title'] ) ? $instance['title'] : 'Title';
        $subtitle = isset ( $instance['subtitle'] ) ? $instance['subtitle'] : '';
        $buttonURL = isset ( $instance['buttonURL'] ) ? $instance['buttonURL'] : '';
        $buttonText = isset ( $instance['buttonText'] ) ? $instance['buttonText'] : '';

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
        <p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo htmlentities($title); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_name('subtitle'); ?>"><?php _e( 'Subtitle text:' ); ?></label>
			<textarea class="widefat" name="<?php echo $this->get_field_name('subtitle'); ?>" rows="10"><?php echo htmlentities($subtitle); ?></textarea>
		</p>
        <p>
			<label for="<?php echo $this->get_field_name('buttonURL'); ?>"><?php _e( 'Button URL:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('buttonURL'); ?>" type="text" value="<?php echo $buttonURL; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_name('buttonText'); ?>"><?php _e( 'Button Text (Optional):' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('buttonText'); ?>" type="text" value="<?php echo $buttonText; ?>" />
		</p>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['whiteTheme'] = ( ! empty( $new_instance['whiteTheme'] ) ) ? strip_tags( $new_instance['whiteTheme'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
        $instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? $new_instance['subtitle'] : '';
        $instance['alignment'] = ( ! empty( $new_instance['alignment'] ) ) ? $new_instance['alignment'] : '';
        $instance['buttonURL'] = ( ! empty( $new_instance['buttonURL'] ) ) ? $new_instance['buttonURL'] : '';
        $instance['buttonText'] = ( ! empty( $new_instance['buttonText'] ) ) ? $new_instance['buttonText'] : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$whiteTheme = $instance[ 'whiteTheme' ] ? 'true' : 'false';
        $title = $instance[ 'title' ];
        $subtitle = $instance[ 'subtitle' ];
        $alignment = $instance[ 'alignment' ];
        $buttonURL = $instance[ 'buttonURL' ];
        $buttonText = $instance[ 'buttonText' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		?>
        <div class="laid-back-section-title-wrapper <?php if($whiteTheme == "true") echo 'laid-back-section-title-wrapper-white'; ?> laid-back-section-title-wrapper-align-<?php echo $alignment; ?>">
            <div class="laid-back-section-title fade-on-scroll">
                <?php echo $title; ?>
            </div>
            <?php if($subtitle != '') { ?>
                <div class="laid-back-section-title-subtitle fade-on-scroll">
                    <?php echo wpautop($subtitle); ?>
                </div>
            <?php } ?>
            <?php if($buttonURL != '') { ?>
                <a class="laid-back-link-button <?php if($whiteTheme == "true") echo "laid-back-button-white"; ?> fade-on-scroll" href="<?php echo $buttonURL; ?>"><?php if($buttonText != '') { echo $buttonText; } else { echo 'More info'; }; ?></a>
            <?php } ?>
        </div>
		<?php

		echo $args['after_widget'];
	}
}
