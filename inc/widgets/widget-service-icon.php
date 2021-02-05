<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Service Icon
 */
class laid_back_service_icon_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_service_icon_widget',

		// Widget name will appear in UI
		__('Laid Back - Service Icon', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Linkable Icon and Title', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
		$title = isset ( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = isset ( $instance['subtitle'] ) ? $instance['subtitle'] : '';
        $serviceImage = isset ( $instance['serviceImage'] ) ? $instance['serviceImage'] : '';

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo htmlentities($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('subtitle'); ?>"><?php _e( 'Subtitle:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo htmlentities($subtitle); ?>" />
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'serviceImage' ); ?>">Image</label>
			<img class="<?= $this->id ?>_img" src="<?= (!empty($instance['serviceImage'])) ? $instance['serviceImage'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
			<input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'serviceImage' ); ?>" value="<?= $instance['serviceImage']; ?>" style="margin-top:5px;" />
			<input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
		</p>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? $new_instance['subtitle'] : '';
        $instance['serviceImage'] = ( ! empty( $new_instance['serviceImage'] ) ) ? $new_instance['serviceImage'] : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$title = $instance[ 'title' ];
		$subtitle = $instance[ 'subtitle' ];
        $serviceImage = $instance[ 'serviceImage' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		?>
		<div class="laid-back-service-icon-wrapper">
			<div class="laid-back-service-icon-image">
				<img src="<?php echo $serviceImage; ?>"/>
			</div>
			<div class="laid-back-service-icon-content-wrapper">
				<div class="laid-back-service-icon-title fade-on-scroll">
					<?php echo $title; ?>
				</div>
				<div class="laid-back-service-icon-subtitle fade-on-scroll">
					<?php echo $subtitle; ?>
				</div>
			</div>
        </div>
		<?php

		echo $args['after_widget'];
	}
}
