<?php
/**
 * Child theme funcitons for Tikkun
 */
 define('INN_MEMBER',false);


function largo_child_require_files() {
	require_once( get_stylesheet_directory() . '/homepages/layouts/tikkun.php' );
}
$includes = array(
		'/inc/custom-sidebars.php',
		'/inc/widgets/tikkun-posts-by-top-tag.php',
		'/inc/widgets/tikkun-recent-popular-countdown.php',
		'/inc/post-social.php',
	);
foreach ( $includes as $include ) {
		require_once( get_stylesheet_directory() . $include );
	}
add_action( 'after_setup_theme', 'largo_child_require_files' );




/* custom widgets */
function tikkun_widgets() {
	$register = array(
		'tikkun_posts_by_top_tag' => '/inc/widgets/tikkun-posts-by-top-tag.php',
		'tikkun_recent_popular_countdown' => '/inc/widgets/tikkun-recent-popular-countdown.php'
	);

	foreach ( $register as $key => $val ) {
		require_once( get_stylesheet_directory() . $val );
		register_widget( $key );
	}
}
add_action( 'widgets_init', 'tikkun_widgets', 1 );


/**
 * Include compiled style.css
 */
function tikkun_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );
	$suffix = (LARGO_DEBUG)? '' : '.min';
	wp_enqueue_style( 'tikkun', get_stylesheet_directory_uri() . '/css/child' . $suffix . '.css' );
	wp_enqueue_style( 'tikkun', get_stylesheet_directory_uri() . 'homepages/assets/css/homepage' . $suffix . '.css' );
}
add_action( 'wp_enqueue_scripts', 'tikkun_stylesheet', 20 );


/**
 * get other scripts
 */
 function tikkun_enqueue() {
	wp_enqueue_script( 'inn-tools', get_stylesheet_directory_uri() . '/js/tikkun.js', array( 'jquery' ), '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'tikkun_enqueue' );



/**
 * Replace Largo's sticky navigation JS with one that doesn't hide on scroll
 * @link https://github.com/INN/largo/blob/v0.5.5.3/inc/enqueue.php#L35-L42
 */
function tikkun_navigation_js() {
	wp_dequeue_script( 'largo-navigation' );
	wp_enqueue_script(
		'tikkun-navigation',
		get_stylesheet_directory_uri(). '/js/navigation.js',
		array( 'largoCore' ),
		largo_version(),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'tikkun_navigation_js', 20 );






// function to track most popular posts, per https://digwp.com/2016/03/diy-popular-posts/
function tikkun_popular_posts($post_id) {
	$count_key = 'popular_posts';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function tikkun_track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	tikkun_popular_posts($post_id);
}
add_action('wp_head', 'tikkun_track_posts');




/**
 * Header actions for newsletter signup form
 * @since Largo 0.5.5
 */
function tikkun_largo_header_after_largo_header() {
	?>
	<span class="tagline" itemprop="description">
	<?php
		echo get_bloginfo( 'description');
	?>
	</span>

	<?php
}
add_action( 'largo_header_after_largo_header', 'tikkun_largo_header_after_largo_header' );


/* remove unused widget area options from widgets page in admin*/
function tikkun_sidebar_cleanup(){

	unregister_sidebar( 'single-sidebar' );
	unregister_sidebar( 'homepage-alert' );
}
add_action( 'widgets_init', 'tikkun_sidebar_cleanup', 11 );



/* allow HTML in author bios */
remove_filter('pre_user_description', 'wp_filter_kses');

/* custom meta boxes */
add_filter( 'rwmb_meta_boxes', 'tikkun_register_meta_boxes' );

function tikkun_register_meta_boxes( $meta_boxes ) {
    $prefix = 'tikkun_meta_box_';

    $meta_boxes[] = [
        'title'   => esc_html__( 'Social Media Share Links', 'online-generator' ),
        'id'      => 'social_media_share_links',
        'context' => 'normal',
        'fields'  => [
            [
                'type'  => 'url',
                'name'  => esc_html__( 'Facebook Url', 'online-generator' ),
                'id'    => $prefix . 'facebook_url',
                'desc'  => esc_html__( 'Link to the Facebook post you want users to share from.', 'online-generator' ),
                'size'  => 64,
                'class' => 'facebook_share',
            ],
            [
                'type'  => 'url',
                'name'  => esc_html__( 'Twitter Url', 'online-generator' ),
                'id'    => $prefix . 'twitter_url',
                'desc'  => esc_html__( 'Link to the Tweet you want users to share from.', 'online-generator' ),
                'size'  => 64,
                'class' => 'facebook_share',
            ],
            [
                'type'  => 'url',
                'name'  => esc_html__( 'LinkedIn Url', 'online-generator' ),
                'id'    => $prefix . 'linkedin_url',
                'desc'  => esc_html__( 'Link to the LinkedIn post you want users to share from.', 'online-generator' ),
                'size'  => 64,
                'class' => 'facebook_share',
            ],
        ],
    ];

    return $meta_boxes;
}