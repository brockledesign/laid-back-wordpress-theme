<?php
/**
 * Widget functions
 *
 * @package laid_back
 */

/**
 * Widget - Projects Loop
 */
class laid_back_projects_loop_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'laid_back_projects_loop_widget',

		// Widget name will appear in UI
		__('Laid Back - Projects Loop', 'laid-back'),

		// Widget description
		array( 'description' => __( 'Show a loop of Projects post type', 'laid-back' ), )
		);
    }

	// Widget Backend
	public function form( $instance ) {
        // White Theme
        $postsAmount = isset ( $instance['postsAmount'] ) ? $instance['postsAmount'] : '4';

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_name('postsAmount'); ?>"><?php _e( 'Number of projects:' ); ?></label>
			<input class="widefat" name="<?php echo $this->get_field_name('postsAmount'); ?>" type="number" value="<?php echo $postsAmount; ?>" />
		</p>
		<?php
    }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['postsAmount'] = ( ! empty( $new_instance['postsAmount'] ) ) ? $new_instance['postsAmount'] : '';
        return $instance;
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

        $postsAmount = $instance[ 'postsAmount' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		?>
		<div class="laid-back-projects-loop-wrapper fade-on-scroll">
			<div class="archive-posts-wrapper">
				<?php
				$custom_posts = new WP_Query();
				$custom_posts->query('post_type=property_projects&posts_per_page=' . $postsAmount);
				while ($custom_posts->have_posts()) : $custom_posts->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php laid_back_post_thumbnail(true); ?>
					</article>
					<?php
				endwhile;
			  	wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}
}
