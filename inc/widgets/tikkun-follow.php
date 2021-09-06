<?php
/*
 * tikkun Follow Widget
 *
 * @package tikkun
 */
class tikkun_follow_widget extends largo_follow_widget {

	function __construct() {
		/* Widget settings. */
		$widget_ops = array(
			'classname' 	=> 'tikkun-follow',
			'description' 	=> __('Display links to social media sites set in tikkun theme options', 'tikkun'),
		);

		/* Create the widget. */
		parent::__construct( 'tikkun-follow-widget', __('tikkun Follow', 'tikkun'), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title',  $instance['title'], $instance, $this->id_base);

		echo $before_widget;

		if ( is_single() && isset($id) && $id == 'article-bottom' ) {
			// display the post social bar
			//tikkun_post_social_links();
		} else {
			// Display the widget title if one was input
			if ( $title ) echo $before_title . $title . $after_title;
			
			// Display the usual buttons and whatnot
			$networks = array(
				'facebook' => 'Like us on Facebook',
				'twitter' => 'Follow us on Twitter',
				'gplus' => 'Follow us on Google+',
				'youtube' => 'Follow us on YouTube',
				'instagram' => 'Follow us on Instagram',
				'linkedin' => 'Find us on LinkedIn',
				'tumblr' => 'Follow us on Tumblr',
				'pinterest' => 'Follow us on Pinterest',
				'github' => 'Find us on GitHub',
				'flickr' => 'Follow us on Flickr',
				'rss' => 'Subscribe via RSS'
			);
			$networks = apply_filters( 'tikkun_additional_networks', $networks );
			
			foreach ( $networks as $network => $btn_text ) {
				if ( $network == 'rss' ) {
					$link = of_get_option( 'rss_link' ) ? esc_url( of_get_option( 'rss_link' ) ) : get_feed_link();
				} else {
					$link = esc_url( of_get_option( $network . '_link' ) );
				}
				
				if ( $link ) {
					printf( __( '<a class="%1$s subscribe btn social-btn" href="%2$s"><i class="icon-%1$s"></i>%3$s</a>', 'tikkun'),
						$network,
						$link,
						$btn_text
					);
				}
			}
		}

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => sprintf( __('Follow %s', 'tikkun'), get_bloginfo('name') ) );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'tikkun'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:90%;" />
		</p>

	<?php
	}
}