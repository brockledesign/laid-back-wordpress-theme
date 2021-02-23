<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Posts Loop
 */
class laid_back_posts_loop_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_posts_loop_widget',

		// Widget name will appear in UI
		__('Laid Back - Posts Loop', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Display posts', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
        $orderby = isset ( $instance['orderby'] ) ? $instance['orderby'] : '';

		// Widget admin form
		?>
		<div class="laid-back-admin-meta-wrapper">
			<div class="laid-back-admin-meta-entry">
				<label for="<?php echo $this->get_field_name('orderby'); ?>">Order:</label>
				<select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_name('orderby'); ?>">
					<option value="DESC" <?php selected( $orderby , 'DESC') ?>>DESC</option>
					<option value="ASC" <?php selected( $orderby , 'ASC') ?>>ASC</option>
				</select>
	        </div>
		</div>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['orderby'] = ( ! empty( $new_instance['orderby'] ) ) ? strip_tags( $new_instance['orderby'] ) : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$orderby = $instance[ 'orderby' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		$articles_args = array(
	        'order' => $orderby,
	        'posts_per_page' => '3',
        );
		$articles_query = new WP_Query($articles_args);
		$articles_posts = $articles_query->posts;
		setup_postdata( $post );
		?>
        <div class="laid-back-articles-loop-container">
			<div class="laid-back-articles-loop-wrapper">
				<?php foreach ($articles_posts as $articles_post) { ?>
					<div class="laid-back-articles-loop-entry-wrapper">
					    <a href="<?php echo get_permalink($articles_post->ID); ?>" class="laid-back-articles-loop-entry-image"><img src="<?php echo get_the_post_thumbnail_url($articles_post->ID); ?>" /></a>
					    <div class="laid-back-articles-loop-entry-contentbox">
					        <!-- Title -->
					        <div class="laid-back-articles-loop-entry-title">
					            <a href="<?php echo get_permalink($articles_post->ID); ?>"><?php echo get_the_title($articles_post->ID); ?></a>
					        </div>
					        <div class="laid-back-articles-loop-entry-content">
					            <?php echo laid_back_get_the_excerpt_id($articles_post->ID, 160); ?>
					        </div>
							<a href="<?php echo get_permalink($articles_post->ID); ?>" class="laid-back-linkbutton">Read More</a>
					    </div>
					</div>
				<?php
				}
				wp_reset_postdata();
				?>
			</div>
        </div>
		<?php

		echo $args['after_widget'];
	}
}
