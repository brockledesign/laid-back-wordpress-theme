<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Partner Box
 */
class laid_back_partner_box_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_partner_box_widget',

		// Widget name will appear in UI
		__('Laid Back - Partner Box', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Partner box with icon', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
		$partnerName = isset ( $instance['partnerName'] ) ? $instance['partnerName'] : '';
		$partnerTitle = isset ( $instance['partnerTitle'] ) ? $instance['partnerTitle'] : '';
        $partnerIcon = isset ( $instance['partnerIcon'] ) ? $instance['partnerIcon'] : '';
        $description = isset ( $instance['description'] ) ? $instance['description'] : '';

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_name('partnerName'); ?>"><?php _e( 'Partner Name:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('partnerName'); ?>" type="text" value="<?php echo htmlentities($partnerName); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('partnerTitle'); ?>"><?php _e( 'Partner Title:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('partnerTitle'); ?>" type="text" value="<?php echo htmlentities($partnerTitle); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('description'); ?>"><?php _e( 'Description text:' ); ?></label>
			<textarea class="widefat" name="<?php echo $this->get_field_name('description'); ?>" rows="10"><?php echo htmlentities($description); ?></textarea>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'partnerIcon' ); ?>">Image</label>
			<img class="<?= $this->id ?>_img" src="<?= (!empty($instance['partnerIcon'])) ? $instance['partnerIcon'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
			<input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'partnerIcon' ); ?>" value="<?= $instance['partnerIcon']; ?>" style="margin-top:5px;" />
			<input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
		</p>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['partnerName'] = ( ! empty( $new_instance['partnerName'] ) ) ? $new_instance['partnerName'] : '';
		$instance['partnerTitle'] = ( ! empty( $new_instance['partnerTitle'] ) ) ? $new_instance['partnerTitle'] : '';
        $instance['partnerIcon'] = ( ! empty( $new_instance['partnerIcon'] ) ) ? $new_instance['partnerIcon'] : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$partnerName = $instance[ 'partnerName' ];
		$partnerTitle = $instance[ 'partnerTitle' ];
        $partnerIcon = $instance[ 'partnerIcon' ];
        $description = $instance[ 'description' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		?>
		<div class="laid-back-partner-box-wrapper">
			<div class="laid-back-partner-box-icon">
				<img src="<?php echo $partnerIcon; ?>"/>
			</div>
			<div class="laid-back-partner-box-name fade-on-scroll">
				<?php echo $partnerName; ?>
			</div>
			<div class="laid-back-partner-box-title fade-on-scroll">
				<?php echo $partnerTitle; ?>
			</div>
			<div class="laid-back-partner-box-description fade-on-scroll">
				<?php echo $description; ?>
			</div>
        </div>
		<?php

		echo $args['after_widget'];
	}
}
