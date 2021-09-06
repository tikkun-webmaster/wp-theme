<?php

/**
 * Largo Recent Posts
 */
class tikkun_recent_popular_countdown extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		$widget_ops = array(
			'classname' => 'recent-popular-countdown',
			'description' => __( 'Outputs a two-tab widget to show most recent and most popular posts.', 'largo' )
		);
		parent::__construct(
			'tikkun-recent-popular-countdown', // Base ID
			__( 'Recent and Popular Posts Lists', 'tikkun' ), // Name
			$widget_ops // Args
		);

	}

	/**
	 * Outputs the content of the recent posts widget.
	 *
	 * @param array $args widget arguments.
	 * @param array $instance saved values from databse.
	 * @global $post
	 * @global $shown_ids An array of post IDs already on the page, to avoid duplicating posts
	 * @global $wp_query Used to get posts on the page not in $shown_ids, to avoid duplicating posts
	 */
	function widget( $args, $instance ) {

		global $post,
			$wp_query, // grab this to copy posts in the main column
			$shown_ids; // an array of post IDs already on a page so we can avoid duplicating posts;
		
		// Preserve global $post
		$preserve = $post;

		extract( $args );

		$posts_term = of_get_option( 'posts_term_plural', 'Posts' );

		// Add the link to the title.
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent ' . $posts_term, 'largo' ) : $instance['title'], $instance, $this->id_base );

		echo $before_widget;

		?>

			<ul class="countdown-tabs">
					<li data-tab="#countdown-pop">Most Popular</li>
					<li data-tab="#countdown-recent">Most Recent</li>
				</ul><div id="countdown-pop" class="countdown-content">
					<ol>
						<?php $popular = new WP_Query(array('posts_per_page'=>5, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
						while ($popular->have_posts()) : $popular->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ol>
				</div>
				<div id="countdown-recent" class="countdown-content">
					<ol>
						<?php $args = array( 
							'numberposts' => '5',
							'post_status' => 'publish' 
						);
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
						}
						wp_reset_query();
						?>
					</ol>
				</div>

		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['num_posts'] = intval( $new_instance['num_posts'] );
		$instance['avoid_duplicates'] = ! empty( $new_instance['avoid_duplicates'] ) ? 1 : 0;
		$instance['thumbnail_display'] = sanitize_key( $new_instance['thumbnail_display'] );
		$instance['image_align'] = sanitize_key( $new_instance['image_align'] );
		$instance['excerpt_display'] = sanitize_key( $new_instance['excerpt_display'] );
		$instance['num_sentences'] = intval( $new_instance['num_sentences'] );
		$instance['show_byline'] = ! empty($new_instance['show_byline']);
		$instance['hide_byline_date'] = ! empty($new_instance['hide_byline_date']);
		$instance['show_top_term'] = ! empty($new_instance['show_top_term']);
		$instance['show_icon'] = ! empty($new_instance['show_icon']);
		$instance['cat'] = intval( $new_instance['cat'] );
		$instance['tag'] = sanitize_text_field( $new_instance['tag'] );
		$instance['top_term'] = sanitize_text_field( $new_instance['top_term'] );
		$instance['taxonomy'] = sanitize_text_field( $new_instance['taxonomy'] );
		$instance['term'] = sanitize_text_field( $new_instance['term'] );
		$instance['author'] = intval( $new_instance['author'] );
		$instance['linktext'] = sanitize_text_field( $new_instance['linktext'] );
		$instance['linkurl'] = esc_url_raw( $new_instance['linkurl'] );
		return $instance;
	}

	function form( $instance ) {
		?>

		<p>
			No options, this widget just outputs the Most Recent and Most Popular lists!
		</p>

		

	<?php
	}
}
