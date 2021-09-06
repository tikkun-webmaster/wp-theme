<?php
/**
 * Child theme funcitons for mwcir
 */
 define('INN_MEMBER',true);

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 160, 160, true ); 
add_image_size( 'homepage-thumb', 1000, 300, true );


function largo_child_require_files() {
	require_once( get_stylesheet_directory() . '/homepages/layouts/tikkun.php' );
}
$includes = array(
		'/inc/custom-sidebars.php',
	);
foreach ( $includes as $include ) {
		require_once( get_stylesheet_directory() . $include );
	}
add_action( 'after_setup_theme', 'largo_child_require_files' );


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
function tikkun_largo_header_before_largo_header() {
	?>
	<div id="engagement-buttons"><a href="/donate/"><button id="home-donate">Donate</button></a><a href="/purchase-or-renew-a-subscription-to-tikkun"><button id="home-subscribe">Subscribe</button></a><a href="/join-our-movement"><button id="home-community">Join our Activist Community</button></a></div>

	<?php
}
add_action( 'largo_header_before_largo_header', 'tikkun_largo_header_before_largo_header' );


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



